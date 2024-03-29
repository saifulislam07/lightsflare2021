<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    //get and return product rows
    public function getProducts($id = ''){
        $this->db->select('user_id,totoal_img,price');
        $this->db->from('products');
        if($id){
            $this->db->where('user_id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('user_id','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
 
    //insert transaction data
    public function storeTransaction($data = array()){
        
    
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
}