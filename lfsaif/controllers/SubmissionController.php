<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

defined('BASEPATH') OR exit('No direct script access allowed');

class SubmissionController extends CI_Controller {

    private $timestamp;
    private $admin_id;

    public function __construct() {
        parent::__construct();

        $this->load->model('Common_model');
        $admin_id = $this->session->userdata('admin_id');
        $type = $this->session->userdata('type');

        $this->load->database();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('grocery_CRUD');
        $this->load->model('grocery_crud_model');

        $this->gc = new grocery_CRUD();
        $this->gc->unset_print()->unset_export()->unset_delete()->unset_clone();
        if ($this->session->userdata('user_type') == 'Super') {
            $this->gc->unset_edit();
        }


        $this->timestamp = date('Y-m-d H:i:s');
        $this->admin_id = $this->session->userdata('admin_id');
    }

    public function new_submit2021() {
        if (isPostBack()) {
            
        }
        $data['title'] = 'New Submission';
        $data['heading'] = 'New Submission';
        $data['mainContent'] = $this->load->view('user/new2021/newsubmission', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function category_wise_submit() {
        if (isPostBack()) {
            // dumpVar($_POST);
            $data['category_id'] = $this->input->post('category_id');
            $agreerules = $this->input->post('agreerules');
            if (empty($agreerules)) {
                notification('If you agree with the rules, click on the check box !');
                redirect('category-wise');
            }
            if ($data['category_id']) {
                $this->session->set_userdata('category_id', $data['category_id']);
                redirect('new-submit');
            } else {
                notification('Please Select Category !');
                redirect('category-wise');
            }
        }
        $data['categorys'] = $this->Common_model->get_data_list('category');
        $data['title'] = 'Category';
        $data['heading'] = 'Category';
        $data['mainContent'] = $this->load->view('user/category_select', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function submit_photos() {

        $this->load->helper("security");
        if (isPostBack()) {

            if (!empty($_FILES['file']['name'])) {
                $conditionList = array('<?php', 'post', 'POST', 'unescape', 'javascript', 'document.write', '$_SERVER', 'DOCUMENT_ROOT', '$_FILES', '$_POST', '$_POST', 'is_writable', 'HTTP_HOST', 'submit',
                    'php_uname',
                    'tmp_name'
                );

                //   dumpVar($_FILES['file']['name']);

                $fileDta = file_get_contents($_FILES['file']['tmp_name'], "r");
                foreach ($conditionList as $key => $value):
                    $result = strstr(strval($fileDta), $value);  // Displays "llo, there!"
                    if ($result):
                        //  echo $value;die;
                        echo '200';
                        die;
                    endif;
                endforeach;

                $numberOfImage = $this->input->post('categoryID');
                $category_id = $this->session->userdata('category_id');
                $config['upload_path'] = 'assets/admin/all_submissions_2021/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['file_name'] = str_replace(' ', '', $_FILES['file']['name']);

                $data['category_id'] = $category_id;
                $data['image'] = $config['file_name'];
                $data['user_id'] = $this->session->userdata('admin_id');


                $oldData = $this->Common_model->get_single_data_by_single_column('products', 'user_id', $data['user_id']);

                $info['user_id'] = $data['user_id'];
                $info['totoal_img'] = 1;
                $info['price'] = 1;


                $data['image'] = $_FILES['file']['name'];
                $img = Image::make($_FILES['file']['tmp_name']);
                $data = $this->security->xss_clean($data);


                $this->load->library('upload', $config);
                // if ($this->upload->do_upload('file')) {
                if ($img->save('assets/admin/all_submissions_2021/' . $data['image'])) {
                    $uploadData = $this->upload->data();
                    if (empty($oldData)):
                        $this->Common_model->insert_data('products', $info);
                    else:
                        $info['totoal_img'] = $oldData->totoal_img + 1;
                        $info['price'] = $oldData->price + 1;
                        $this->Common_model->update_data('products', $info, 'user_id', $data['user_id']);
                    endif;
                    $data['country'] = $this->Common_model->table_info('use_details', 'user_id', $data['user_id'])->country;
                    $insertid = $this->Common_model->insert_data('submissions', $data);
                } else {
                    echo '200';
                    die;
                }
            }
        }

        $data['title'] = 'New Submission';
        $data['heading'] = 'New Submission';
        $data['products'] = $this->Common_model->get_data_list('product');
        $data['mainContent'] = $this->load->view('user/new2021/new_submit', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function fileUpload2021() {
        $this->load->helper("security");
        $userid = $this->session->userdata('admin_id');


        if (!empty($_FILES['file']['name'])) {
            $ttlsubmit = $this->Common_model->countTotalSubmit($userid);
            $ttlbal = $this->Common_model->getUserBalance($userid);
            // dumpVar($ttlbal);
            if ($ttlbal == 0) {
                echo 00;
                exit;
            } elseif ($ttlbal == 15 && $ttlsubmit == 1) {
                echo 11;
                exit;
            } elseif ($ttlbal == 30 && $ttlsubmit == 3) {
                echo 11;
                exit;
            } elseif ($ttlbal == 40 && $ttlsubmit == 6) {
                echo 11;
                exit;
            } 

            $conditionList = array('<?php', 'post', 'POST', 'unescape', 'javascript', 'document.write', '$_SERVER', 'DOCUMENT_ROOT', '$_FILES', '$_POST', '$_POST', 'is_writable', 'HTTP_HOST', 'submit',
                'php_uname',
                'tmp_name'
            );
            $fileDta = file_get_contents($_FILES['file']['tmp_name'], "r");
            foreach ($conditionList as $key => $value):
                $result = strstr(strval($fileDta), $value);  // Displays "llo, there!"
                if ($result):
                    echo '222';
                    die;
                endif;
            endforeach;


            // $category_id = $this->session->userdata('category_id');
            //  dumpVar($category_id);
            // Set preference
            $config['upload_path'] = 'assets/admin/all_submissions/';
            $config['allowed_types'] = 'jpg|jpeg';
            $config['file_name'] = str_replace(' ', '', $_FILES['file']['name']);
//            $config['max_size'] = 1024;
//            $config['min_size'] = 100;
            // $data['category_id'] = $category_id;
            $data['image'] = $config['file_name'];
            $data['user_id'] = $this->session->userdata('admin_id');

            $oldData = $this->Common_model->get_single_data_by_single_column('products', 'user_id', $data['user_id']);

            $info['user_id'] = $data['user_id'];
            $info['totoal_img'] = 1;
            $info['price'] = 1;


            $data['image'] = $_FILES['file']['name'];
            $img = Image::make($_FILES['file']['tmp_name']);
            $data = $this->security->xss_clean($data);


            $this->load->library('upload', $config);
            // if ($this->upload->do_upload('file')) {
            if ($img->save('assets/admin/all_submissions/' . $data['image'])) {
                $uploadData = $this->upload->data();
                if (empty($oldData)):
                    $this->Common_model->insert_data('products', $info);
                else:
                    $info['totoal_img'] = $oldData->totoal_img + 1;
                    $info['price'] = $oldData->price + 1;
                    $this->Common_model->update_data('products', $info, 'user_id', $data['user_id']);
                endif;
                $data['country'] = $this->Common_model->table_info('use_details', 'user_id', $data['user_id'])->country;
                $insertid = $this->Common_model->insert_data('submissions', $data);
                 echo '200';
                die;
            } else {
                echo '111';
                die;
            }
        }

        // dumpVar($insertid);
    }

    public function fileUpload() {
        $this->load->helper("security");
        if (!empty($_FILES['file']['name'])) {
            $conditionList = array('<?php', 'post', 'POST', 'unescape', 'javascript', 'document.write', '$_SERVER', 'DOCUMENT_ROOT', '$_FILES', '$_POST', '$_POST', 'is_writable', 'HTTP_HOST', 'submit',
                'php_uname',
                'tmp_name'
            );
            $fileDta = file_get_contents($_FILES['file']['tmp_name'], "r");
            foreach ($conditionList as $key => $value):
                $result = strstr(strval($fileDta), $value);  // Displays "llo, there!"
                if ($result):
                    //  echo $value;die;
                    echo '200';
                    die;
                endif;
            endforeach;


            $category_id = $this->session->userdata('category_id');
            //  dumpVar($category_id);
            // Set preference
            $config['upload_path'] = 'assets/admin/all_submissions/';
            $config['allowed_types'] = 'jpg|jpeg';
            $config['file_name'] = str_replace(' ', '', $_FILES['file']['name']);
//            $config['max_size'] = 1024;
//            $config['min_size'] = 100;


            $data['category_id'] = $category_id;
            $data['image'] = $config['file_name'];
            $data['user_id'] = $this->session->userdata('admin_id');

            $oldData = $this->Common_model->get_single_data_by_single_column('products', 'user_id', $data['user_id']);

            $info['user_id'] = $data['user_id'];
            $info['totoal_img'] = 1;
            $info['price'] = 1;


            $data['image'] = $_FILES['file']['name'];
            $img = Image::make($_FILES['file']['tmp_name']);
            $data = $this->security->xss_clean($data);


            $this->load->library('upload', $config);
            // if ($this->upload->do_upload('file')) {
            if ($img->save('assets/admin/all_submissions/' . $data['image'])) {
                $uploadData = $this->upload->data();
                if (empty($oldData)):
                    $this->Common_model->insert_data('products', $info);
                else:
                    $info['totoal_img'] = $oldData->totoal_img + 1;
                    $info['price'] = $oldData->price + 1;
                    $this->Common_model->update_data('products', $info, 'user_id', $data['user_id']);
                endif;
                $data['country'] = $this->Common_model->table_info('use_details', 'user_id', $data['user_id'])->country;
                $insertid = $this->Common_model->insert_data('submissions', $data);
            } else {
                echo '200';
                die;
            }
        }

        // dumpVar($insertid);
    }

    public function all_submit() {
        $type = $this->session->userdata('type');
        $admin_id = $this->session->userdata('admin_id');
        if ($type == 'User'):
            $data['allsubmission'] = $this->Common_model->get_data_list_by_single_column('submissions', 'user_id', $admin_id);
        else:
            $data['allsubmission'] = $this->Common_model->get_data_list_by_group();
        endif;

//        dumpVar($data);

        $data['title'] = 'All Submission';
        $data['heading'] = 'All Submission';
        $data['mainContent'] = $this->load->view('user/all_submit', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }
    public function all_submit2021() {
        $type = $this->session->userdata('type');
        $admin_id = $this->session->userdata('admin_id');
        if ($type == 'User'):
            $data['allsubmission'] = $this->Common_model->get_data_list_by_single_column('submissions', 'user_id', $admin_id);
        else:
            $data['allsubmission'] = $this->Common_model->get_data_list_by_group();
        endif;

//        dumpVar($data);

        $data['title'] = 'All Submission';
        $data['heading'] = 'All Submission';
        $data['mainContent'] = $this->load->view('user/new2021/all_submit', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function delete_image($id) {

        $this->db->trans_start();


        $userid = $this->Common_model->get_single_data_by_single_column('submissions', 'id', $id)->user_id;

        $admin_id = $this->session->userdata('admin_id');

        if ($userid != $admin_id):
            notification("Illegal action you want to accicute !");
            redirect('all-submission');
        endif;

        $totalimage = $this->Common_model->get_single_data_by_single_column('products', 'user_id', $userid);
        $data['totoal_img'] = $totalimage->totoal_img - 1;
        $data['price'] = $totalimage->price - 1;
        $this->Common_model->delete_data('submissions', 'id', $id);
        $this->Common_model->update_data('products', $data, 'user_id', $totalimage->user_id);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            notification("Something wrong! please contact with mail ( info@lightsflare.com )!");
            redirect('all-submission_2021');
        } else {
            message("Your Photo Deleted successfully !");
            redirect('all-submission_2021');
        }
    }

    public function my_profile() {
        if (isPostBack()) {
            
        }

        $admin_id = $this->session->userdata('admin_id');
        $data['paymentstatus'] = $this->Common_model->get_data_list_by_single_column('payments', 'user_id', $admin_id);

        $data['userInfo'] = $this->Common_model->get_single_data_by_single_column('use_details', 'user_id', $admin_id);
        // dumpVar($data);
        $data['countrys'] = $this->Common_model->get_data_list('country');
        $data['title'] = 'All Submission';
        $data['heading'] = 'All Submission';
        $data['mainContent'] = $this->load->view('user/myprofile', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function payment_details() {
        if (isPostBack()) {
            
        }
        $data['title'] = 'Payments Details';
        $data['heading'] = 'Payments Details';
        $data['mainContent'] = $this->load->view('user/payment_details', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function new_payment() {
        $admin_id = $this->session->userdata('admin_id');
        if (isPostBack()) {
            $data['user_id'] = $admin_id;
            $data['txn_id'] = $this->input->post('txn_id');
            $data['number'] = $this->input->post('number');
            $data['amount'] = $this->input->post('amount');
            $data['reference'] = $this->input->post('reference');
            $data['currency_code'] = 'TK';
            $data['payment_status'] = 'Pending';

            $insertid = $this->Common_model->insert_data('payments', $data);
            if ($insertid) {
                $this->session->set_flashdata('success', "Data save successfull, Please wait for admin confirmation !!");
                redirect('new-payment');
            }
        }
        $data['country_check'] = $this->Common_model->table_info('use_details', 'user_id', $admin_id)->country;
        $data['countrys'] = $this->Common_model->get_data_list('country');
        $data['submission_details'] = $this->Common_model->get_data_list_by_single_column('payments', 'user_id', $admin_id);
        $data['title'] = 'New Payment';
        $data['heading'] = 'New Payment';
        $data['mainContent'] = $this->load->view('user/new_payment', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function update_country() {
        $admin_id = $this->session->userdata('admin_id');
        $data['country'] = $this->input->post('country');
        $this->Common_model->update_data('use_details', $data, 'user_id', $admin_id);
        redirect('new-payment');
    }

}
