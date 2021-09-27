<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** Upal */
class Datatable extends CI_Model {

    var $table, $column_order, $column_search, $order, $where;

//    var $table = 'customer';
//    var $column_order = array(null, 'FirstName','LastName','phone','address','city','country'); //set column field database for datatable orderable
//    var $column_search = array('FirstName','LastName','phone','address','city','country'); //set column field database for datatable searchable
//    var $order = array('id' => 'asc'); // default order
//    var $where = array('FirstName' => 'Jhon')

    public function __construct($table, $column_order, $coumn_search, $order) {
        parent::__construct();
    }

    public function initial_data($table, $column_order, $coumn_search, $order) {
      
        $this->load->database();
        $this->table = $table;
        $this->column_order = $column_order;
        $this->column_search = $coumn_search;
        $this->order = $order;
    }

    public function dataTOJson() {
       
        $result = $this->get_datatables();
         
        $data = array();
        $no = $_POST['start'];
        foreach ($result as $row) {
            $no++;
           // $select_array = $this->column_order;
            
           // foreach ($select_array as $select) {
                
               // $list[] = $row->$select;
           // }
           //$list[] = $row->brandName;
            
            //$data[] = $row;
            $data[] = $row->brandName;
        }

       
      //  dumpVar($data);
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->count_all(),
            "recordsFiltered" => $this->count_filtered(),
            "data" => $data,
        );
        
        
        
        //output to json format
        echo json_encode($output);
    }

    private function _get_datatables_query() {

        
        $this->db->from($this->table);
//        $this->db->where($this->where);
        $i = 0;

        foreach ($this->column_search as $item) { // loop column
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function get_datatables() {
       
        $this->_get_datatables_query();
      
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
         
        return $query->result();
    }

    private function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}