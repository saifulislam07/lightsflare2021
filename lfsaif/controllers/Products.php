<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product');
    }

    function index() {
        $data = array();
        //get products data from database
        //    $data['products'] = $this->product->getRows();
        //pass the products data to view
        $this->load->view('products/index', $data);
    }

    function buy($id) {
        $admin_id = $this->session->userdata('admin_id');
        //  dumpVar($_GET);
        if ($id == 1):
            $product = 1;
            $price = 15;
            $name = 'package 1';
        elseif ($id == 2):
            $product = 2;
            $price = 30;
            $name = 'package 2';
        elseif ($id == 3):
            $product = 3;
            $price = 40;
            $name = 'package 3';
        else:
            $this->session->set_flashdata('error', 'Something Wrong !! Please Try Again !!');
            redirect('submit-photos');
        endif;
        //Set variables for paypal form
        $returnURL = base_url() . 'Products/paymentSuccess'; //payment success url
        $cancelURL = base_url() . 'Products/cancel'; //payment cancel url
        // $returnURL = base_url() . 'submit-photos'; //payment success url
        $cancelURL = base_url() . 'check-Number'; //payment cancel url
        $notifyURL = base_url() . 'Products/ipn'; //ipn url
        //get particular product data
        //$product = $this->product->getRows($id);

        $userID = 1; //current user id
        //$logo = base_url() . 'assets/images/logo_dark_red.png';
          $logo = base_url() . 'assets/frontend/images/logo_dark_red.png';

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
       // $this->paypal_lib->add_field('item_name', $name);
        $this->paypal_lib->add_field('custom', $userID);
      //  $this->paypal_lib->add_field('item_number', $product);
        $this->paypal_lib->add_field('amount', $price);
        $this->paypal_lib->image($logo);
        $this->paypal_lib->paypal_auto_form();
    }

    function paymentSuccess() {
        $admin_id = $this->session->userdata('admin_id');
    
        $paypalInfo = $_REQUEST;

        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_amt'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['status'] = $paypalInfo["payment_status"];

        if (!empty($admin_id)):
            $this->session->set_flashdata('susscess', 'Payment Done !!');
            redirect('submit-photos');
        else:
            redirect('https://www.lightsflare.com/');
        endif;
    }

    function cancel() {
        $admin_id = $this->session->userdata('admin_id');
        //if transaction cancelled
        //$this->load->view('paypal/paymentFail');
        if (!empty($admin_id)): 
            $this->session->set_flashdata('fail', 'Payment Done !!');
            redirect('submit-photos');
        else:
            redirect('https://www.lightsflare.com/');
        endif;
    }

    function ipn() {
        //paypal return transaction details array
        // $paypalInfo = $this->input->post();
        $paypalInfo = $_REQUEST;
        //dumpVar($paypalInfo);
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
