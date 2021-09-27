<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JudgingController extends CI_Controller {

    private $timestamp;
    private $admin_id;

    public function __construct() {
        parent::__construct();

        $this->load->model('Common_model');
        $admin_id = $this->session->userdata('admin_id');
        //  dumpVar($admin_id);
        $this->load->database();
        $this->load->helper('url');
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

 public function duplicateChaeck() {
        $allResult = $this->Common_model->get_data_list('submissions');
        
        
        $double_image = array();
        $last_row = array();
        $first_row = array();
        foreach($allResult as $each):
            $condition = array(
                'judge_id' => 1336,
                'photo_id' => $each->id
                );
          $total_image =   $this->Common_model->get_data_list_by_many_columns('marking',$condition);
            
        //     echo $this->db->last_query();die();
        //      echo "<pre>";
        //   print_r($total_image);
        //   die();
            
          if(count($total_image) == 2):
              $double_image[]= $total_image[1]->judge_id;
              $last_row[] = $total_image[1]->marking_id;
              $first_row[] = $total_image[0]->marking_id;
          endif;
        endforeach;
        
           echo "<pre>";
           print_r($double_image);
           print_r($last_row);
           print_r($first_row);
           
       
       
       foreach($last_row as $key => $value):
           
           $this->Common_model->delete_data('marking','marking_id',$value);
           
      endforeach;
       
       die();
       
    }




    public function judges_marking() {
        $data['title'] = 'Marking';
        $data['categorys'] = $this->Common_model->get_data_list('category');
        $data['mainContent'] = $this->load->view('judges/judges_marking', $data, true);
        $this->load->view('admin/include/adminMasterTemp', $data);
    }

    public function CatWisePhotoViewFrom() {
        $category_id = $this->input->post('category_id');

        $data['catWisePhotos'] = $this->Common_model->getPhotosByCategory($category_id);

        if (!empty($data['catWisePhotos'])):
            return $this->load->view('judges/markingForm', $data);
        else:
            echo '<span style="color: red;">No Data Record </span>';
        endif;
    }

    public function primaryMarkingUpdate() {
        $photoid = $this->input->post('pid');
        $data['deleted'] = 1;
        $this->Common_model->update_data('submissions', $data, 'id', $photoid);
        
        echo 'done';
    }

    public function save_data() {
        // dumpVar($_POST);
        $admin_id = $this->session->userdata('admin_id');
        $photo_id = $this->input->post('photo_id');
        $dataArray = array(
            "judge_id" => $admin_id,
            "photo_id" => $photo_id,
        );
        $olddata = $this->Common_model->table_info_condition('marking', $dataArray);


        $data['photo_id'] = $photo_id;
        $data['marks'] = $this->input->post('marks');
        $award = $this->input->post('awarded');
        if ($this->input->post('awarded') == 'true'):
            $data['award'] = 1;
        elseif ($this->input->post('awarded') == 'false'):
            $data['award'] = 0;
        endif;


        $data['note'] = $this->input->post('note');
        $data['category_id'] = $this->input->post('category_id');
        $data['judge_id'] = $admin_id;


  if (empty($olddata) && count($olddata) == 0){
            $this->Common_model->insert_data('marking', $data);
        } else {
            $data['updated_at'] = date("Y-m-d");
            $this->Common_model->update_data('marking', $data, 'marking_id', $olddata->marking_id);
        }
        
        
        // if (empty($olddata)) {

        //     $this->Common_model->insert_data('marking', $data);
        // } else {

        //     $data['updated_at'] = date("Y-m-d");
        //     $this->Common_model->update_data('marking', $data, 'photo_id', $photo_id);
        // }
    }

}
