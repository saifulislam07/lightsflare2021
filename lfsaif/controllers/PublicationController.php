<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

defined('BASEPATH') or exit('No direct script access allowed');

class PublicationController extends CI_Controller
{

	private $timestamp;
	private $admin_id;

	public function __construct()
	{
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

	public function publications()
	{
		if (isPostBack()) {
			$data['tile'] = $this->input->post('title');
			$data['url'] = $this->input->post('url');
			$data['description'] = $this->input->post('description');
			// $data['logo'] = $this->input->post('logo');

			if (!$data['tile']) {
				notification('Title Validation faild !!!!');
				redirect('publications');
			}
			if (!$data['url']) {
				notification('URL Validation faild !!!!');
				redirect('publications');
			}
			if (empty($_FILES['logo']['name'])) {
				notification('Logo Validation faild !!!!');
				redirect('publications');
			}


			$lastID = $this->Common_model->insert_data('publications', $data);

			$logoData['logo'] = $lastID . '_' . date('d-m-y') . '_' . $_FILES['logo']['name'];
			if (!empty($logoData['logo'])) {
				move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/publication/' . $logoData['logo']);
				$this->db->where('publication_id', $lastID);
				$this->db->update('publications', $logoData);
			}
		}
		$data['title'] = 'Publications';
		$data['heading'] = 'Publications';
		$data['mainContent'] = $this->load->view('user/new2021/publications', $data, true);
		$this->load->view('admin/include/adminMasterTemp', $data);
	}
	public function publications_list()
	{

		$data['publicationslist'] = $this->Common_model->get_data_list('publications');
		$data['title'] = 'Publications List';
		$data['heading'] = 'Publications List';
		$data['mainContent'] = $this->load->view('user/new2021/publications_list', $data, true);
		$this->load->view('admin/include/adminMasterTemp', $data);
	}
	public function edit_publication($id)
	{

		if (isPostBack()) {
			$data['tile'] = $this->input->post('title');
			$data['url'] = $this->input->post('url');
			$data['description'] = $this->input->post('description');


			if (!$data['tile']) {
				notification('Title Validation faild !!!!');
				redirect('publications');
			}
			if (!$data['url']) {
				notification('URL Validation faild !!!!');
				redirect('publications');
			}


			$lastID = $this->Common_model->update_data('publications', $data, 'publication_id', $id);

			// dumpVar($_FILES['logo']['name']);

			if ($_FILES['logo']['name']) {
				$logoData['logo'] = $lastID . '_' . date('d-m-y') . '_' . $_FILES['logo']['name'];
				if (!empty($logoData['logo'])) {
					move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/publication/' . $logoData['logo']);
					$this->db->where('publication_id', $lastID);
					$this->db->update('publications', $logoData);
				}
			} else {
				$data['logo'] = $this->input->post('oldLogo');
			}


			message('publications data updated !!!!');
			redirect('publications_list');
		}
		$data['publicationsDetails'] = $this->Common_model->get_single_data_by_single_column('publications', 'publication_id', $id);
		$data['title'] = 'Publications Edit';
		$data['heading'] = 'Publications Edit';
		$data['mainContent'] = $this->load->view('user/new2021/publications_edit', $data, true);
		$this->load->view('admin/include/adminMasterTemp', $data);
	}
	public function delete_publication($id)
	{

		$this->db->where('publication_id', $id);
		$this->db->delete('publications');
		message('publications data Deleted !!!!');
		redirect('publications_list');
	}
}
