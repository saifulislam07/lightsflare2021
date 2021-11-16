<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FrontendController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('Common_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}




	public function index()
	{
		$data['title'] = 'Home';
		$data['mainContent'] = $this->load->view('frontend/pages/home', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function jurys()
	{
		$data['title'] = 'JURY';
		$data['mainContent'] = $this->load->view('frontend/pages/jurys', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function submission_rules()
	{
		$data['title'] = 'Rules';
		$data['mainContent'] = $this->load->view('frontend/pages/submission_rules', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function user_signin()
	{
		$data['title'] = 'Login';
		$data['mainContent'] = $this->load->view('frontend/pages/signin', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function ambassadors()
	{
		$data['title'] = 'Ambassadors';
		$data['mainContent'] = $this->load->view('frontend/pages/ambassadors', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function user_signup()
	{

		if (isPostBack()) {
			$myIp = $this->input->ip_address();
			//dumpVar($_POST);
			$randomcode = $this->input->post('randomcode');
			$sessionrandcode = $this->input->post('sessionrandcode');

			if ($randomcode != $sessionrandcode) :
				$this->session->set_flashdata('error', 'Invalid Captcha Code!');
				redirect('user-signup');
			endif;

			$data['name'] = $this->input->post('name');
			if (strlen($this->input->post('name')) > 35 || strlen($this->input->post('name')) < 5) :
				$this->session->set_flashdata('error', 'Name should be minimum 6 & maximum 35 characters!!');
				redirect('user-signup');
			endif;

			$data['email'] = $this->input->post('email');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[use_details.email]');
			// other rule if any.
			//validate form input
			if ($this->form_validation->run() == FALSE) :
				$this->session->set_flashdata('error', 'Invalid Email address!');
				redirect('user-signup');
			endif;

			if (empty($this->input->post('email'))) :
				$this->session->set_flashdata('error', 'Email address can not be empty!');
				redirect('user-signup');
			endif;

			$data['password'] = md5($this->input->post('password'));
			if (strlen($this->input->post('password')) > 12 || strlen($this->input->post('password')) < 6) :
				$this->session->set_flashdata('error', 'Password should be minimum 6 & maximum 12 characters!!');
				redirect('user-signup');
			endif;

			if (strlen($this->input->post('re_password')) > 12 || strlen($this->input->post('re_password')) < 6) :
				$this->session->set_flashdata('error', 'Confirm Password should be minimum 6 & maximum 12 characters!!');
				redirect('user-signup');
			endif;

			if ($this->input->post('password') != $this->input->post('re_password')) {
				$this->session->set_flashdata('error', 'Confirm Password Did not match !');
				redirect('user-signup');
			}



			$data['type'] = 'User';
			$data['ipAddress'] = $myIp;
			$insertId = $this->Common_model->insert_data('admin', $data);
			$info['user_id'] = $insertId;
			$info['name'] = $data['name'];
			$info['email'] = $data['email'];
			$info['country'] = $this->input->post('country');
			if (empty($this->input->post('country'))) :
				$this->session->set_flashdata('error', 'Country can not be empty!');
				redirect('user-signup');
			endif;
			$insertId = $this->Common_model->insert_data('use_details', $info);
			if (isset($insertId)) {
				redirect('user-signin');
			}
		}

		$length = 5;
		$data['randcode'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
		$this->session->set_userdata('randcodes', $data['randcode']);
		$data['countrys'] = $this->Common_model->get_data_list('country');
		$data['title'] = 'Signup';
		$data['mainContent'] = $this->load->view('frontend/pages/singup', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function contact_us()
	{
		$data['title'] = 'Contact Us';
		$length = 5;
		$data['randcode'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
		$data['mainContent'] = $this->load->view('frontend/pages/contact_us', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}
	public function twentytwentywinners()
	{
		$data['title'] = '2020 Winners';
		$data['allExhibitionData'] = $this->Common_model->getDataListByJoinMain();
		// dumpVar($data);
		$data['mainContent'] = $this->load->view('frontend/pages/winners/twentytwentywinners', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	/* exhibisition */

	public function twentytwentyexhibition()
	{

		$data['allExhibitionDataExhi'] = $this->Common_model->getDataListByJoinMainExhi();
		//        dumpVar($data);
		$data['title'] = '2020 Exhibition';
		$data['mainContent'] = $this->load->view('frontend/pages/exhibition/twentytwentyexhibition', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}
	// /* winners */

	// public function twentytwentywinners() {
	//     $data['title'] = '2020 Winners';
	//     $data['mainContent'] = $this->load->view('frontend/pages/winners/twentytwentywinners', $data, true);
	//     $this->load->view('frontend/include/masterTemp', $data);
	// }

	// /* exhibisition */

	// public function twentytwentyexhibition() {

	//     $data['title'] = '2020 Exhibition';
	//     $data['mainContent'] = $this->load->view('frontend/pages/exhibition/twentytwentyexhibition', $data, true);
	//     $this->load->view('frontend/include/masterTemp', $data);
	// }

	public function frequently_asked_questions()
	{
		$data['title'] = 'FAQ';
		$data['mainContent'] = $this->load->view('frontend/pages/frequently_asked_questions', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function reset_password()
	{
		if (isPostBack()) {
			$admin_id = $this->input->post('admin_id');
			$randcode = $this->input->post('randcode');
			$user_details = $this->Common_model->get_single_data_by_single_column('admin', 'admin_id', $admin_id);


			$data['password'] = md5($this->input->post('password'));
			if ($this->input->post('password') != $this->input->post('r_password')) {
				$this->session->set_flashdata('msg', 'Confirm Password Did not match !');
				redirect('reset-password/' . $admin_id . '/' . $randcode);
			}


			if (!empty($user_details->randcode) && $user_details->randcode == $randcode) {
				$updatedid = $this->Common_model->update_data('admin', $data, 'admin_id', $admin_id);
				if ($updatedid) {
					$info['randcode'] = '';
					$updatedid = $this->Common_model->update_data('admin', $info, 'admin_id', $admin_id);
					$this->session->set_flashdata('msg', 'Password change successfully !');
					redirect('user-signin');
				} else {
					$this->session->set_flashdata('msg', 'Failed, Please try again !');
					redirect('reset-password/' . $admin_id . '/' . $randcode);
				}
			} else {
				$this->session->set_flashdata('msg', 'Reset Password time expired, Please try again !');
				redirect('reset-password/' . $admin_id . '/' . $randcode);
			}
		}

		$data['title'] = 'Reset Password';
		$data['mainContent'] = $this->load->view('frontend/pages/reset_password', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	public function forgot_password()
	{

		if (isPostBack()) {
			$email = $this->input->post('email');
			if (empty($email)) {
				$this->session->set_flashdata('msg', 'Please entry your email address !');
				redirect('forgot-password');
			}
			$que = $this->db->query("select password,email,admin_id from admin where email='$email'");
			$row = $que->row();


			if ($row) {
				$user_email = $row->email;
				$admin_id = $row->admin_id;

				//                $pagedata['title'] = 'hello';
				//                $pagedata['url'] = base_url('reset-password');
				//    
				//                $msg = $this->load->view('frontend/include/email_template', $pagedata, TRUE);
				//
				//                $this->load->library('email');
				//                $config['protocol'] = 'smtp';
				//                $config['smtp_host'] = 'mail.lightsflare.com';
				//                $config['smtp_port'] = '465';
				//                $config['smtp_user'] = 'info@lightsflare.com';
				//                $config['smtp_pass'] = 'admin123@#';
				//                $config['charset'] = 'iso-8859-1';
				//                $config['type'] = 'html';
				//                $config['wordwrap'] = TRUE;
				//
				//                $this->email->initialize($config);
				//                $this->email->from('info@lightsflare.com', 'lightsflare.com');
				//                $this->email->to($user_email);
				//                $this->email->subject('Reset Password link');
				//                $this->email->message($msg);
				//                $this->email->set_mailtype('html');
				//                $this->email->send();
				//                $this->email->clear(TRUE);



				$length = 5;
				$rand_code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
				$user_email = $row->email;
				$admin_id = $row->admin_id;
				$url = base_url('reset-password/' . $admin_id . '/' . $rand_code);
				$datas['url'] = $url;
				$mesg = $this->load->view('frontend/include/email_template', $datas, TRUE);
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'info@lightsflare.com', // change it to yours
					'smtp_pass' => '123@#admin@#', // change it to yours
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				);
				//
				//
				//                dumpVar($mesg);
				//
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('info@lightsflare.com'); // change it to yours
				$this->email->to($user_email); // change it to yours
				$this->email->subject('Reset Password link');
				$this->email->message($mesg);
				$this->email->set_mailtype('html');
				if ($this->email->send()) {
					$data['randcode'] = $rand_code;
					$this->Common_model->update_data('admin', $data, 'admin_id', $admin_id);
					$this->session->set_flashdata('msg', 'Check your email inbox or spam.');
					redirect('forgot-password');
				} else {
					$this->session->set_flashdata('msg', 'try again !');
					redirect('forgot-password');
				}
			} else {
				$this->session->set_flashdata('msg', 'Invalid Email ID !');
				redirect('forgot-password');
			}
		}

		$data['title'] = 'Forgot Password';
		$data['mainContent'] = $this->load->view('frontend/pages/forgot_password', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}

	function duplicate_email_check()
	{

		$email = $this->input->post('email');
		if (!empty($email)) :
			$condition = array(
				'email' => $email,
				'status' => 'Active',
				'type' => 'User'
			);
			$exitsSup = $this->Common_model->get_single_data_by_many_columns('admin', $condition);
			if (!empty($exitsSup)) {
				echo "1";
			} else {
				echo 2;
			}
		else :
			echo 2;
		endif;
	}

	public function contact_data()
	{


		$vcode = $this->input->post('vcode');
		$genaratedvcode = $this->input->post('genaratedvcode');


		if ($vcode != $genaratedvcode) :
			$this->session->set_flashdata('msg', 'Wrong validation code !!!');
			redirect('contact-us');
		endif;

		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['subject'] = $this->input->post('subject');
		$data['message'] = $this->input->post('message');
		$data['status'] = 'unread';

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|min_length[5]|max_length[50]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', 'Validation failed');
			redirect('contact-us');
		}


		$conditionList = array(
			'<?php', 'post', 'unescape', 'javascript', 'document.write', '$_SERVER', 'DOCUMENT_ROOT', '$_FILES', '$_POST', 'is_writable', 'HTTP_HOST', 'submit',
			'php_uname', 'src', 'url',
			'tmp_name'
		);
		$fileDta = explode(' ', $data['message']);

		foreach ($fileDta as $key => $value) :
			if (in_array($value, $conditionList)) {
				$data['message'] = 'Not allawod text';
				// exit;
			}
		endforeach;




		//   dumpVar($conditionList);
		//
		//        foreach ($conditionList as $key => $value):
		//           echo $result = strstr(strval($fileDta[$key]), $value);
		//            if ($value == $fileDta[$key]):
		//                $data['message'] = 'Not allawod text';
		//                exit;
		//            endif;
		//        endforeach;
		//        echo die;



		if (empty($data['name'])) :
			$this->session->set_flashdata('msg', 'Name field is required');
			redirect('contact-us');
		elseif (empty($data['email'])) :
			$this->session->set_flashdata('msg', 'Email field is required');
			redirect('contact-us');
		elseif (empty($data['subject'])) :
			$this->session->set_flashdata('msg', 'Subject field is required');
			redirect('contact-us');
		elseif (empty($data['message'])) :
			$this->session->set_flashdata('msg', 'Message field is required');
			redirect('contact-us');
		else :
			$insrtid = $this->Common_model->insert_data('contact_us', $data);
			if ($insrtid) :
				$this->session->set_flashdata('success', 'Received your message, We will contact to you ASAP');
				redirect('contact-us');

			else :
				$this->session->set_flashdata('msg', 'Try again');
				redirect('contact-us');

			endif;

		endif;
	}
	public function checkNumber()
	{
		$data['title'] = 'Check Number';
		$data['mainContent'] = $this->load->view('frontend/pages/newsub/checkNumber', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}
	public function uploadImages2021()
	{
		$data['title'] = 'Upload Image';
		$data['mainContent'] = $this->load->view('frontend/pages/newsub/uploadimages', $data, true);
		$this->load->view('frontend/include/masterTemp', $data);
	}
}
