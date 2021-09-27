<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function login_check() {
        $admin_id = $this->session->userdata('admin_id');

        if (!empty($admin_id)) {
            redirect(site_url('dashboard'));
        }
        $this->load->view('admin/pages/login');
    }

    function fileCheck() {
        $fileName = $this->input->post('fileName');
        $basicExt = pathinfo($fileName, PATHINFO_EXTENSION);

        if ((strtolower($basicExt) == 'jpg') || (strtolower($basicExt) == 'jpeg')) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function login() {
        $user_type = $this->input->post('user_type');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        $data['status'] = 'Active';
        $userInfo = $this->Common_model->get_single_data_by_many_columns('admin', $data);

      //  dumpVar($userInfo);
        
        if (empty($userInfo)) {
            $this->session->set_flashdata('msg', 'Undefined Username OR Password!');
            if ($user_type == 'user'):
                redirect(site_url('user-signin'));
            else:
                redirect(site_url('admin'));
            endif;
        } elseif (!empty($userInfo) && $userInfo->status == 'Inactive') {
            //$this->session->set_flashdata('msg', 'Your Are inactive Distributor.Please Contact with admin to active your account.');
            if ($user_type == 'user'):
                redirect(site_url('user-signin'));
            else:
                redirect(site_url('admin'));
            endif;
        } else {
            $this->session->set_userdata('admin_id', $userInfo->admin_id);
            $this->session->set_userdata('type', $userInfo->type);
            $this->session->set_userdata('username', $userInfo->name);
            $this->session->set_userdata('loginTime', time());
            // unset($userInfo);
            redirect(site_url('dashboard'));
        }
    }

    public function signout() {
        $usertype = $this->session->userdata('type');

        // dumpVar($usertype);

        if ($usertype == 'Admin'):
            $this->session->unset_userdata('admin_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('loginTime');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('category_id');
            $this->session->sess_destroy();
            redirect(site_url('admin'));
        else:
            $this->session->unset_userdata('admin_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('loginTime');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('category_id');
            $this->session->sess_destroy();
            redirect(site_url('home'));
        endif;
    }

}
