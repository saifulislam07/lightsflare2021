<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
        $admin_id = $this->session->userdata('admin_id');
        $this->load->library('paypal_lib');
        $this->load->model('product');
        $this->load->database();
    }

    function index() {
        $data = array();
        //get products inforamtion from database table
        $data['products'] = $this->product->getProducts();
        //loav view and pass the products information to view
        $this->load->view('products/index', $data);
    }

    function buyProduct($id) {
        //Set variables for paypal form
        $returnURL = base_url() . 'Products/paymentSuccess'; //payment success url
        $failURL = base_url() . 'Products/fail'; //payment fail url
        $notifyURL = base_url() . 'Products/ipn'; //ipn url
        //get particular product data
        $product = $this->product->getProducts($id);

        $dueamount = $this->Common_model->get_user_amount($id);
        $paymentttl = $this->Common_model->get_user_pay($id);
        $totaldue = $dueamount->totalamount - $paymentttl->totalpay;
//           dumpVar($product);
        // $userID = 1; //current user id
        $logo = base_url() . 'Your_logo_url';

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('fail_return', $failURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        // $this->paypal_lib->add_field('item_name', $product['name']);
        $this->paypal_lib->add_field('custom', $product['user_id']);
        //  $this->paypal_lib->add_field('item_number',  $product['user_id']);
        //  $this->paypal_lib->add_field('amount', $product['price']);
        $this->paypal_lib->add_field('amount', $totaldue);
        // $this->paypal_lib->image($logo);

        $this->paypal_lib->paypal_auto_form();
    }

    function paymentSuccess() {
        $admin_id = $this->session->userdata('admin_id');
        //get the transaction data
        //$paypalInfo = $this->input->request();
        $paypalInfo = $_REQUEST;

        //dumpVar($paypalInfo);
        //$data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_amt'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['status'] = $paypalInfo["payment_status"];
        //  dumpVar($data);
        //pass the transaction data to view
        // $this->load->view('paypal/paymentSuccess', $data);
//        $this->load->view('new-payment');
        if (!empty($admin_id)):
            redirect('new-payment');
        else:
            redirect('https://www.lightsflare.com/');
        endif;
    }

    function paymentFail() {
        $admin_id = $this->session->userdata('admin_id');
        //if transaction cancelled
        //$this->load->view('paypal/paymentFail');
        if (!empty($admin_id)):
            redirect('new-payment');
        else:
            redirect('https://www.lightsflare.com/');
        endif;
    }

    function ipn() {
        //paypal return transaction details array
        // $paypalInfo = $this->input->post();
        $paypalInfo = $_REQUEST;
//         dumpVar($paypalInfo);

        $data['user_id'] = $paypalInfo['custom'];
        //  $data['product_id'] = $paypalInfo["item_number"];
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status'] = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);

        //check whether the payment is verified
        if (preg_match("/VERIFIED/i", $result)) {
            //insert the transaction data into the database
            $this->product->storeTransaction($data);
        }
    }

    
}
