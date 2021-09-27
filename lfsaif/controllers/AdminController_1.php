<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    private $timestamp;
    private $admin_id;

    public function __construct() {
        parent::__construct();

        $this->load->model('Common_model');
        $admin_id = $this->session->userdata('admin_id');
        //  dumpVar($admin_id);
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

        if (empty($admin_id)) {
            redirect(site_url('home'));
        }
        $this->timestamp = date('Y-m-d H:i:s');
        $this->admin_id = $this->session->userdata('admin_id');
    }

    public function dashboard() {
        $usertype = $this->session->userdata('type');

        $data['title'] = ' Dashboard';
        $data['heading'] = ' Dashboard';

        $admin_id = $this->session->userdata('admin_id');


        $data['totalsubmission'] = $this->Common_model->total_submissin_count();

        $data['bkash'] = $this->Common_model->total_collect_by_bkash();
        $data['paypal'] = $this->Common_model->total_collect_by_paypal();
        $data['registered'] = $this->Common_model->total_user_registration();
        $data['countrysubmission'] = $this->Common_model->total_country_submission();
        $data['usersubmission'] = $this->Common_model->total_user_submission();
        $data['categorys'] = $this->Common_model->get_data_list('category');
        //   dumpVar($data['usersubmission']);

        if ($usertype == 'User'):
            $data['country_check'] = $this->Common_model->table_info('use_details', 'user_id', $admin_id)->country;
        endif;
        $data['mainContent'] = $this->load->view('admin/pages/dashboard', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function home_slider() {
        $data['title'] = ' Home Slider';
        $data['mainContent'] = $this->load->view('admin/pages/home_slider', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function profile_update() {
        if (isPostBack()) {
            $config = [];
            $this->db->trans_start();
            $this->load->helper("security");
            $config['upload_path'] = './assets/admin/user/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 500;
            $config['min_size'] = 50;

            $this->load->library('upload', $config);

            $admin_id = $this->session->userdata('admin_id');
            $data['name'] = $this->input->post('name');
            $data['title'] = $this->input->post('title');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['bio'] = $this->input->post('bio');
            $data['age'] = $this->input->post('age');

            if (!empty($_FILES['image']['name'])):
                $fileName = $_FILES['image']['tmp_name'];
                // $mimeResult = mime_content_type($fileName);
                $conditionList = array(
                    'php', '<?php', 'post', 'script','unescape','javascript','document.write','$_SERVER', 'DOCUMENT_ROOT', '$_FILES', '$_POST', 'is_writable', 'HTTP_HOST', 'submit',
                    'php_uname',
                    'tmp_name'
                );
                $fileDta = file_get_contents($_FILES['image']['tmp_name'], "r");


                //   echo $fileDta;die("stop here");
                foreach ($conditionList as $key => $value):
                    $result = strstr(strval($fileDta), $value);  // Displays "llo, there!"
                    if ($result):
                        //    echo $value;die("hello");
                        notification('Sorry you are upload invalid file.');
                        redirect('my-profile');
                    endif;


                endforeach;

        
                $data['image'] = $_FILES['image']['name'];
                // file_get_contents();
                $img = Image::make($_FILES['image']['tmp_name']);
                // $img->fit($config['max_size'], $config['min_size']);
                $img->save('assets/admin/user/' . $data['image']);
                redirect('my-profile');
            else :
                $photoBasic['image'] = $this->input->post('old_image');
            endif;
            $data['country'] = $this->input->post('country');

            if (empty($data['country'])):
                notification('Country Can not be empty!!');
                redirect('my-profile');
            endif;
            $data['updated_at'] = date("Y-m-d h:i:sa");
            $data = $this->security->xss_clean($data);
            if ($this->security->xss_clean($data)) {
                $updateData = $this->Common_model->update_data('use_details', $data, 'user_id', $admin_id);
                $_POST = array();
                $datas['name'] = $data['name'];
                $datas['phone'] = $data['phone'];

                $this->Common_model->update_data('admin', $datas, 'admin_id', $admin_id);
            } else {
                notification('please try again');
                redirect('my-profile');
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                notification("Something wrong! please contact with mail ( info@lightsflare.com )!");
                redirect('all-submission');
            } else {

                $image = $this->security->xss_clean($_FILES);
                if ($this->security->xss_clean($data)) {

                    if (!$this->upload->do_upload('image')) {
                        notification('please try again');
                        redirect('my-profile');
                    } else {
                        message('successfully updated');
                        redirect('my-profile');
                    }
                    message("Your Photo Deleted successfully !");
                    redirect('all-submission');
                } else {
                    notification('please try again');
                    redirect('my-profile');
                }
            }

        }
    }

    public function home_sliders() {


        $output = $this->gc
                ->set_table('home_slider')
                ->set_theme('datatables')
                ->required_fields('title', 'image', 'status')
                ->set_subject('Home Slider')
                ->set_field_upload('image', 'assets/admin/')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function home_about() {
        $data['title'] = ' Home About';
        $data['mainContent'] = $this->load->view('admin/pages/home_about', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function home_abouts() {


        $output = $this->gc
                ->set_table('home_about')
                ->set_subject('Home About')
                ->required_fields('left_side_title', 'right_side_title', 'right_side_description', 'status')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function home_watch() {
        $data['title'] = ' Home Watch';
        $data['mainContent'] = $this->load->view('admin/pages/home_watch', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function home_watchs() {
        $output = $this->gc
                ->set_table('home_watch')
                ->set_subject('Home Watch')
                ->required_fields('title', 'description', 'embaded_video', 'status')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function category() {
        $data['title'] = ' Home Category';
        $data['mainContent'] = $this->load->view('admin/pages/category', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function categorys() {
        $output = $this->gc
                ->set_table('category')
                ->set_subject('Category')
                ->required_fields('title', 'status')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function ambassador() {
        $data['title'] = 'Ambassadors';
        $data['mainContent'] = $this->load->view('admin/pages/ambassador', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function ambassadors() {
        $output = $this->gc
                ->set_table('ambassador')
                ->set_subject('Ambassadors')
                ->required_fields('name', 'image', 'season', 'type', 'status')
                ->set_field_upload('image', 'assets/admin/ambassador/')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function jury() {
        $data['title'] = 'Jury';
        $data['mainContent'] = $this->load->view('admin/pages/jury', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function jurys() {
        $output = $this->gc
                ->set_table('jury')
                ->set_subject('Jury')
                ->required_fields('name', 'title', 'bio', 'image', 'status', 'season')
                ->set_field_upload('image', 'assets/admin/jurys/')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function rule() {
        $data['title'] = 'Rules';
        $data['mainContent'] = $this->load->view('admin/pages/rule', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function rules() {
        $output = $this->gc
                ->set_table('rules')
                ->set_subject('Rules')
                ->required_fields('details', 'status', 'season')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function calendar() {
        $data['title'] = 'Calendar';
        $data['mainContent'] = $this->load->view('admin/pages/calendar', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function calendars() {
        $output = $this->gc
                ->set_table('calendar')
                ->set_subject('Calendar')
                ->required_fields('details', 'status', 'season')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    public function question_answers() {
        $data['title'] = 'Rules';
        $data['mainContent'] = $this->load->view('admin/pages/faq', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function question_answerss() {
        $output = $this->gc
                ->set_table('faq')
                ->set_subject('FAQ')
                ->required_fields('details', 'status', 'season')
                ->set_theme('datatables')
                ->render();
        $this->load->view('admin/frame', $output);
    }

    function userList() {

        $data['title'] = 'User List';
        $data['userList'] = $this->Common_model->get_data_list_by_single_column('admin', 'type', 'Admin');
        //$data['userList'] = $this->Common_model->get_data_list_by_single_column('admin', 'admin_id', $this->dist_id);
        $data['mainContent'] = $this->load->view('admin/adminsetup/userList', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    function addUser() {
        if (isPostBack()) {

            $data['name'] = $this->input->post('name');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['status'] = 'Active';
            $data['type'] = 'Admin';

            if ($this->input->post('password') != $this->input->post('re_password')) {
                notification('Confirm Password Did not match !!');
                redirect('add-User');
            }

            $data['password'] = md5($this->input->post('password'));

            $data['updated_by'] = $this->admin_id;
            $insertId = $this->Common_model->insert_data('admin', $data);
            if (!empty($insertId)) {
                message("New User Created successfully.");
                redirect(site_url('user-List'));
            }
        }
        $data['title'] = 'Add User';
        //$data['branch_info'] = $this->Common_model->get_data_list('tbl_branch');
        $data['userList'] = $this->Common_model->get_data_list('admin');
        //$data['userList'] = $this->Common_model->get_data_list_by_single_column('admin', 'admin_id', $this->dist_id);
        $data['mainContent'] = $this->load->view('admin/adminsetup/addUser', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    function editUser($editId) {
        if (isPostBack()) {

            $data['name'] = $this->input->post('name');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $password = $this->input->post('password');

            if (!empty($password)):
                $data['password'] = md5($this->input->post('password'));
            endif;

            $data['updated_by'] = $this->admin_id;
            $this->Common_model->update_data('admin', $data, 'admin_id', $editId);
            message("User update successfully.");
            redirect(site_url('userList'));
        }
        $data['title'] = 'User List';
        //$data['branch_info'] = $this->Common_model->get_data_list('tbl_branch');
        $data['userList'] = $this->Common_model->get_data_list('admin');
        $data['editInfo'] = $this->Common_model->get_single_data_by_single_column('admin', 'admin_id', $editId);
        $data['userList'] = $this->Common_model->get_data_list_by_single_column('admin', 'admin_id', $editId);
        $data['mainContent'] = $this->load->view('admin/adminsetup/editUser', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    function all_user() {
        $data['title'] = 'User List';
        $data['userList'] = $this->Common_model->get_data_list_by_single_column_join();
        $data['mainContent'] = $this->load->view('admin/usersetup/userList', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    function new_use() {
        if (isPostBack()) {
            $this->db->trans_start();

            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['type'] = 'User';

            if ($this->input->post('password') != $this->input->post('re_password')) {
                notification('Confirm Password Did not match !!');
                redirect('new-use');
            }

            $insertId = $this->Common_model->insert_data('admin', $data);
            //   dumpVar($insertId);
            $info['user_id'] = $insertId;
            $info['name'] = $data['name'];
            $info['email'] = $data['email'];
            $info['country'] = $this->input->post('country');

            //   dumpVar($info);

            $this->Common_model->insert_data('use_details', $info);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                notification("User Data Not inserted !!");
                redirect(site_url('new-use'));
            } else {
                message('User Created successfully!!');
                redirect('all-user');
            }
        }

        $data['title'] = 'Add User';
        $data['country'] = $this->Common_model->get_data_list('country');
        $data['userList'] = $this->Common_model->get_data_list('admin');
        $data['mainContent'] = $this->load->view('admin/usersetup/addUser', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function userStatusChange() {


        $userId = $this->input->post('userId');
        $data['status'] = $this->input->post('status');


        $this->Common_model->update_data('admin', $data, 'admin_id', $userId);
        message("User Status successfully change");
        echo 1;
        redirect(site_url('all-user'));
    }

    public function all_details() {
        $data['title'] = 'User Payments';
        $data['submission_details'] = $this->Common_model->get_data_list_by_join_user();

        $data['mainContent'] = $this->load->view('admin/pages/payment_details', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function queries() {
        $data['title'] = 'Queries';
        $data['user_queries'] = $this->Common_model->get_data_list('contact_us');

        $data['mainContent'] = $this->load->view('admin/pages/queries', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function reject_reply($id) {
        $data['admin_id'] = $this->session->userdata('admin_id');
        $data['status'] = 'replied';
        $updatedid = $this->Common_model->update_data('contact_us', $data, 'id', $id);

        if ($updatedid) {
            message("Query replied.");
            redirect(site_url('queries'));
        }
    }

    public function reply_query($id) {
        $data['admin_id'] = $this->session->userdata('admin_id');
        $data['status'] = 'unread';
        $updatedid = $this->Common_model->update_data('contact_us', $data, 'id', $id);

        if ($updatedid) {
            notification("Reject reply.");
            redirect(site_url('queries'));
        }
    }

    public function accept_paymnet($id) {
        $data['admin_id'] = $this->session->userdata('admin_id');
        $data['payment_status'] = 'Completed';
        $updatedid = $this->Common_model->update_data('payments', $data, 'payment_id', $id);

        if ($updatedid) {
            message("Payment Received.");
            redirect(site_url('all-detail'));
        }
    }

    public function reject_paymnet($id) {
        $data['admin_id'] = $this->session->userdata('admin_id');
        $data['payment_status'] = 'Pending';
        $updatedid = $this->Common_model->update_data('payments', $data, 'payment_id', $id);

        if ($updatedid) {
            notification("Reject Payment.");
            redirect(site_url('all-detail'));
        }
    }

    public function all_photos() {
        $data['title'] = 'All Photos';
        $data['allsubmission'] = $this->Common_model->getUserList();
        // dumpVar($data);
        $data['mainContent'] = $this->load->view('admin/pages/all_photos', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function user_pass_change() {

        $updateIde = $this->input->post('updateIde');
        $data['password'] = md5($this->input->post('password'));

        if ($this->input->post('password') != $this->input->post('c_password')) {
            notification('Confirm Password Did not match !!');
            redirect('all-user');
        }
        $data['updated_by'] = $this->admin_id;
        $updateid = $this->Common_model->update_data('admin', $data, 'admin_id', $updateIde);
        if ($updateid) {
            message('User Password Change Successfully !!!');
            redirect('all-user');
        }
    }

    public function confirm_email() {
        if (isPostBack()) {
            $data['user_id'] = $this->input->post('userid');
            $data['u_name'] = $this->input->post('u_name');
            $data['mail_details'] = $this->input->post('detailsmail');
            $data['email'] = $this->input->post('email');
            $data['admin_id'] = $this->admin_id;



            $user_email = $data['email'];
            $mesg = $this->load->view('admin/include/email_template_user', $data, TRUE);
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'info@lightsflare.com', // change it to yours
                'smtp_pass' => '123@#admin@#', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('info@lightsflare.com'); // change it to yours
            $this->email->to($user_email); // change it to yours
            $this->email->subject('Sumbission and Payment Confirmation');
            $this->email->message($mesg);
            $this->email->set_mailtype('html');
            if ($this->email->send()) {
                $this->Common_model->insert_data('confirmation_email', $data);
                message('confirmation email mail Send !!!');
                redirect('all-submission');
            } else {
                notification('Mail Failed !');
                redirect('all-submission');
            }
        }
    }

    public function get_single_data_by_id() {
        $userid = $this->input->post('userid');
        $data['userdetails'] = $this->Common_model->get_single_data_by_single_column('use_details', 'user_id', $userid);

        if (!empty($data['userdetails'])):
            return $this->load->view('user/ajaxuserdetails', $data);
        else:
            echo '<span style="color: red;">No Data Record </span>';
        endif;
    }

}
