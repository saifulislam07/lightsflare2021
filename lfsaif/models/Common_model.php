<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function all_booking_info() {
        $this->db->select('*')
                ->from('booking_basic_info')
                ->join('booking_plot_info', 'booking_plot_info.basic_id=booking_basic_info.basic_id')
                ->join('booking_payment_info', 'booking_payment_info.basic_id=booking_basic_info.basic_id');
        return $this->db->get()->result();
    }

    function all_details_booking_info($id) {
        $this->db->select('*')
                ->from('booking_basic_info')
                ->where('applicentAutoId', $id)
                ->join('booking_plot_info', 'booking_plot_info.basic_id=booking_basic_info.basic_id')
                ->join('booking_payment_info', 'booking_payment_info.basic_id=booking_basic_info.basic_id')
                ->join('booking_reference_info', 'booking_reference_info.basic_id=booking_basic_info.basic_id')
                ->join('booking_nominee_info', 'booking_nominee_info.basic_id=booking_basic_info.basic_id');
        return $this->db->get()->row();
    }

    function getTotalSumbmission($value) {
        $this->db->select('COUNT(id) AS counts')
                ->where('user_id', $value);
        return $this->db->get('submissions')->row();
    }
    function getUserBalance($value) {
      $this->db->select('sum(payment_gross) AS amountTotal')
                ->where('user_id', $value);
        return $this->db->get('payments')->row()->amountTotal;
    }
    function countTotalSubmit($id) {
      $this->db->select('count(user_id) AS ttlimages')
                ->where('user_id', $id);
        return $this->db->get('submissions')->row()->ttlimages;
    }

    function getTotalSumbmissionAmountChk($value) {
        $this->db->select('sum(amount) AS amounts')
                ->where('user_id', $value);
        return $this->db->get('payments')->row();
    }

    function getTotalSumbmissionAmount($value) {
        $this->db->select('sum(payment_gross) AS amount')
                ->where('user_id', $value)
                ->where('payment_status', 'Completed');
        return $this->db->get('payments')->row();
    }

    function getTotalSumbmissionAmountbd($value) {
        $this->db->select('sum(amount) AS amount')
                ->where('payment_status', 'Completed')
                ->where('user_id', $value);

        return $this->db->get('payments')->row();
    }

    function get_total_plot_details($tbl_name, $column_name, $value) {
        $this->db->select('COUNT(plot_id) AS count')
                ->where($column_name, $value);
        return $this->db->get($tbl_name)->row();
    }

    function getUserEmail() {
        $this->db->select('email');
        $this->db->where('status', 'Active');
        return $this->db->get('admin')->result();
    }

    function getAccountsDetails($tbl_name, $column_name, $value) {
        $this->db->select('sum(debit) AS totalincome')
                ->where_in($column_name, $value);
        return $this->db->get($tbl_name)->row();
    }

    function getAccountsDetails2($tbl_name, $column_name, $value) {
        $this->db->select('sum(credit) AS totalexp')
                ->where_in($column_name, $value);
        return $this->db->get($tbl_name)->row();
    }

    public function getTotalCollect($param, $cid) {
        $this->db->select('sum(collection + advancePrice) AS totalCol')
                ->where('booking_id', $param)
                ->where('customer_id', $cid);
        return $this->db->get('tbl_booking_history')->row();
    }

    function get_total_plot_details_reserved($tbl_name, $column_name, $value) {
        $this->db->select('*')
                ->where($column_name, $value);
        return $this->db->get($tbl_name)->result();
    }

    public function get_ordered_info_by_date($start_date, $end_date) {
        $this->db->select("*")
                ->from('pro_item')
                ->join('tbl_employee', 'tbl_employee.e_id = pro_item.accountId')
                ->join('production', 'production.production_id = pro_item.production_id')
                ->where('production.p_date >=', $start_date)
                ->where('production.p_date <=', $end_date)
                ->group_by('employee.e_id');

        return $this->db->get()->result();
    }

    function get_total_payed_sum($empid) {
        $this->db->select('sum(pay) as totalPay')
                ->from('tbl_commission')
                ->where('employee_id', $empid);
        $result = $this->db->get()->row();
        return $result->totalPay;
    }
 function getDataListByJoin() {
        $this->db->select('*,exhibition.name as uname')
                ->from('exhibition')
                ->join('category', 'category.id = exhibition.category')
                ->join('country', 'country.id = exhibition.country');
        return $this->db->get()->result();
    }

  function getDataListByJoinMain() {
         $array = array( '1', '2','3','4' );
        $this->db->select('*,exhibition.name as uname')
                ->from('exhibition')
                ->where('exhibition.status','1')
               ->where_in('exhibition.type',$array)
                ->order_by('exhibition.exhibition_id', 'RANDOM')
                ->join('category', 'category.id = exhibition.category')
                ->join('country', 'country.id = exhibition.country');
        return $this->db->get()->result();
    }
     function getDataListByJoinMainExhi() {
        $this->db->select('*,exhibition.name as uname')
                ->from('exhibition')
                ->where('exhibition.status','1')
                ->order_by('exhibition.exhibition_id', 'RANDOM')
                ->join('category', 'category.id = exhibition.category')
                ->join('country', 'country.id = exhibition.country');
        return $this->db->get()->result();
    }
    function getFreeVehicle($vid, $journyDate, $returnDate) {

        $startTime = strtotime($journyDate);
        $endTime = strtotime($returnDate);

        $sql = "SELECT * FROM tbl_booking_details AS bd
                WHERE vehicle_id = '$vid'  AND e_time >= '$startTime' AND s_time <= '$endTime'";

//        
//        $sql = "SELECT * FROM tbl_booking_details AS bd
//                WHERE vehicle_id = '$vid'  AND (s_time >= '$startTime' AND s_time <= '$endTime') OR
//                (e_time >= '$startTime' AND e_time <= '$endTime')";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
        /* $this->db->select('*')
          ->from('tbl_vehicle_setup')
          ->where('vehicle_id', $vid)
          ->where('start_time <=', $journyDate)
          ->where('end_time <=', $returnDate);
          return $result = $this->db->get()->row();
         * *
         */
    }

    function get_comission_ledger($empid) {
        $this->db->select('*')
                ->from('tbl_commission')
                ->where('employee_id', $empid);
        return $result = $this->db->get()->result();
    }

    public function get_inventory_list() {
        $this->db->select('*,sum(qty) as qty')
                ->from('tbl_stock')
                ->join('tbl_product', 'tbl_product.product_id = tbl_stock.product_id')
                ->join('tbl_category', 'tbl_category.category_id = tbl_stock.category_id')
                ->group_by('tbl_stock.product_id');
        return $this->db->get()->result();
    }

    public function getDataListOfComission() {
        $this->db->select('*');
        $this->db->from('tbl_commission');
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id = tbl_commission.basicid');
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_commission.employee_id');
        $this->db->join('admin', 'admin.admin_id = tbl_commission.created_by');
        return $this->db->get()->result();
    }

    public function get_search_data_list($productId) {

        $this->db->select('*,sum(qty) as qty');
        $this->db->from('tbl_stock');
        $this->db->join('tbl_product', 'tbl_product.product_id = tbl_stock.product_id');
        $this->db->join('tbl_category', 'tbl_category.category_id = tbl_stock.category_id');
//        if (!empty($projectId) && $projectId != 'all') {
//            $this->db->where('tbl_stock.project_id', $projectId);
//        }
        if ($productId != 'all') {
            $this->db->where('tbl_stock.product_id', $productId);
        }
        $this->db->group_by('tbl_stock.product_id');

        return $this->db->get()->result();
    }

    public function get_data_list_group() {
        $this->db->select("*,sum(total)as gtotal,sum(qty)as totalqty")
                ->from('tbl_purchase')
                ->group_by('invoice');
        return $this->db->get()->result();
    }

    public function get_data_list_by_group() {
        $this->db->select("submissions.user_id,admin.name,admin.phone,admin.email")
                ->from('submissions')
                ->join('admin', 'admin.admin_id = submissions.user_id')
                ->group_by('submissions.user_id')
                ->order_by('submissions.user_id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_data_list_group_issue() {
        $this->db->select("*,sum(total)as gtotal,sum(qty)as totalqty")
                ->from('tbl_issue')
                ->group_by('invoice');
        return $this->db->get()->result();
    }

    public function get_all_list_by_invoice($invoice) {
        $this->db->select('*')
                ->from('tbl_purchase')
                ->join('tbl_category', 'tbl_category.category_id = tbl_purchase.category_id')
                ->join('tbl_subcategory', 'tbl_subcategory.subcategory_id = tbl_category.category_id')
                ->join('tbl_product', 'tbl_product.product_id = tbl_purchase.product_id')
                ->where('tbl_purchase.invoice', $invoice);
        return $this->db->get()->result();
    }

    public function get_all_list_by_invoice_issue($invoice) {
        $this->db->select('*')
                ->from('tbl_issue')
                ->join('tbl_category', 'tbl_category.category_id = tbl_issue.category_id')
                ->join('tbl_subcategory', 'tbl_subcategory.subcategory_id = tbl_category.category_id')
                ->join('tbl_product', 'tbl_product.product_id = tbl_issue.product_id')
                ->where('tbl_issue.invoice', $invoice);
        return $this->db->get()->result();
    }

    public function get_data_list_by_search($productId, $start_date, $end_date) {
        $this->db->select('*,sum(qty) as qty');
        $this->db->from('tbl_stock');
        $this->db->join('tbl_product', 'tbl_product.product_id = tbl_stock.product_id');
        $this->db->join('tbl_category', 'tbl_category.category_id = tbl_stock.category_id');
        $this->db->where('tbl_stock.date >=', $start_date);
        $this->db->where('tbl_stock.date <=', $end_date);

//        if (!empty($projectId) && $projectId != 'all') {
//            $this->db->where('tbl_stock.project_id', $projectId);
//        }
        if ($productId != 'all') {
            $this->db->where('tbl_stock.product_id', $productId);
        }
        $this->db->group_by('tbl_stock.product_id');

        return $this->db->get()->result();
    }

    public function get_data_list_by_search_expense($headId, $subheadId, $start_date, $end_date) {
        $this->db->select('*');
        $this->db->from('tbl_expense');
        $this->db->join('tbl_expense_head', 'tbl_expense_head.expense_hd_id = tbl_expense.expense_hd_id');
        $this->db->join('tbl_expense_sub_head', 'tbl_expense_sub_head.exp_sub_hd_id = tbl_expense.exp_sub_hd_id');
        $this->db->where('tbl_expense.date >=', $start_date);
        $this->db->where('tbl_expense.date <=', $end_date);

        if (!empty($headId) && $headId != 'all') {
            $this->db->where('tbl_expense.expense_hd_id', $headId);
        }
        if ($subheadId != 'all') {
            $this->db->where('tbl_expense.exp_sub_hd_id', $subheadId);
        }
        //$this->db->group_by('tbl_stock.product_id');

        return $this->db->get()->result();
    }

    public function get_data_list_by_search_supplier_ledger($supplierID, $start_date, $end_date) {
        $this->db->select('*');
        $this->db->from('supledger');
        $this->db->join('tbl_supplier', 'tbl_supplier.supplier_id = supledger.suplierId');
        $this->db->where('supledger.date >=', $start_date);
        $this->db->where('supledger.date <=', $end_date);
//        if (!empty($projectID) && $projectID != 'all') {
//            $this->db->where('supledger.projectID', $projectID);
//        }
        if ($supplierID != 'all') {
            $this->db->where('supledger.suplierId', $supplierID);
        }
        return $this->db->get()->result();
    }

    public function get_data_list_by_search_purchse($productID, $start_date, $end_date) {
        $this->db->select('*');
        $this->db->from('tbl_purchase_item');
        $this->db->join('tbl_purchase', 'tbl_purchase.purchase_id = tbl_purchase_item.invoiceId');
        $this->db->join('tbl_supplier', 'tbl_supplier.supplier_id = tbl_purchase.suplierId');
        $this->db->order_by("tbl_purchase.purchase_id", "asc");
        $this->db->where('tbl_purchase.date >=', $start_date);
        $this->db->where('tbl_purchase.date <=', $end_date);
        if (!empty($productID) && $productID != 'all') {
            $this->db->where('tbl_purchase_item.productId', $productID);
        }


        return $this->db->get()->result();
    }

    public function get_data_list_by_adminid($admin_id, $start_date, $end_date) {
        $this->db->select('*');
        $this->db->join('admin', 'admin.admin_id = tbl_transaction.created_by');
        $this->db->join('tbl_account', 'tbl_account.account_id = tbl_transaction.account_id');
        $this->db->where('tbl_transaction.date >=', $start_date);
        $this->db->where('tbl_transaction.date <=', $end_date);

        if (!empty($admin_id) && $admin_id != 'all') {
            $this->db->where('tbl_transaction.created_by', $admin_id);
            $this->db->where_in('tbl_transaction.transaction_type', array('5', '7'));
        } else {
            $this->db->where_in('tbl_transaction.transaction_type', array('5', '7'));
            $this->db->group_by('tbl_transaction.created_by');
        }

        return $this->db->get('tbl_transaction')->result();
    }

    public function getReceiveAmountByAdmin($id, $start_date, $end_date) {
        $this->db->select('sum(tbl_transaction.amount) as total');
        $this->db->where('tbl_transaction.date >=', $start_date);
        $this->db->where('tbl_transaction.date <=', $end_date);
        $this->db->where('tbl_transaction.created_by', $id);
        $this->db->where_in('tbl_transaction.transaction_type', array('5', '7'));
        //$this->db->group_by('tbl_transaction.created_by');
        return $this->db->get('tbl_transaction')->row();
    }

    public function get_all_sup_payment() {
        $this->db->select('*');
        $this->db->from('supledger');
        $this->db->join('tbl_supplier', 'tbl_supplier.supplier_id = supledger.suplierId');
        $this->db->where('type', 2);

        return $this->db->get()->result();
    }

    public function get_first_week_ordered_info_by_date($start_date, $end_date, $type) {

        $this->db->select("*")
                ->from('emp_payment')
                ->join('tbl_employee', 'tbl_employee.e_id = emp_payment.emp_id')
                ->join('pro_item', 'tbl_employee.e_id = pro_item.accountId')
                ->join('production', 'production.production_id = pro_item.production_id')
                ->where('emp_payment.pay_date >=', $start_date)
                ->where('emp_payment.pay_date <=', $end_date)
                ->where('emp_payment.type', $type)
                ->group_by('tbl_employee.e_id');
        return $this->db->get()->result();


//        $this->db->select("*")
//                ->from('pro_item')
//                ->join('employee', 'employee.e_id = pro_item.accountId')
//                //->join('production', 'production.production_id = pro_item.production_id')
//                ->join('emp_payment', 'employee.e_id = emp_payment.emp_id')
//                ->where('emp_payment.pay_date >=', $start_date)
//                ->where('emp_payment.pay_date <=', $end_date)
//                ->group_by('employee.e_id');
//
//        return $this->db->get()->result();
    }

    public function get_total_Payment_summary($emp_id, $start_date, $end_date) {
        $this->db->select("*")
                ->from('emp_payment')
                ->where('emp_payment.pay_date >=', $start_date)
                ->where('emp_payment.pay_date <=', $end_date)
                ->where('emp_id', $emp_id);

        return $this->db->get()->result();
    }

    public function get_salary_ordered_info_by_date($start_date, $end_date) {
        $this->db->select("*")
                ->from('pro_item')
                ->join('tbl_employee', 'tbl_employee.e_id = pro_item.accountId')
                ->join('production', 'production.production_id = pro_item.production_id')
                ->where('production.p_date >=', $start_date)
                ->where('production.p_date <=', $end_date)
                ->group_by('tbl_employee.e_id');

        return $this->db->get()->result();
    }

    function getAccountHead() {
        $this->db->select('parentId');
        $this->db->group_by('parentId');
        $this->db->order_by('rootId', 'ASC');
        $result = $this->db->get('generalData')->result();

        foreach ($result as $key => $eachID) {
            $condition = array(
                'dist_id' => $this->dist_id,
                'parentId' => $eachID->parentId,
            );
            $data[$eachID->parentId]['parentName'] = $this->get_single_data_by_single_column('chartofaccount', 'chart_id', $eachID->parentId)->title;
            $data[$eachID->parentId]['Accountledger'] = $this->get_data_list_by_many_columns('generaldata', $condition);
        }
        return $data;
    }

    function getAccountListByRoodId($rootId) {
        $this->db->select('parentId');
        $this->db->where('rootId', $rootId);
        $this->db->where('dist_id', $this->dist_id);
        $this->db->group_by('parentId');
        $this->db->order_by('rootId', 'ASC');
        $result = $this->db->get('generalData')->result();

        foreach ($result as $key => $eachID) {
            $condition = array(
                'dist_id' => $this->dist_id,
                'parentId' => $eachID->parentId,
            );
            $data[$eachID->parentId]['parentName'] = $this->get_single_data_by_single_column('chartofaccount', 'chart_id', $eachID->parentId)->title;
            $data[$eachID->parentId]['Accountledger'] = $this->get_data_list_by_many_columns('generaldata', $condition);
        }
        return $data;
    }

    function getAccountLedger() {
        $condition = array(
            'dist_id' => $this->dist_id,
            'status' => 1,
        );
        //$this->db->where_in('parentId', array('1'));
        $this->db->where_in('parentId', array('1', '2', '3', '4'));
        $getParentList = $this->Common_model->get_data_list_by_many_columns('chartofaccount', $condition);
        foreach ($getParentList as $key => $eachAccount):


            // dumpVar($eachAccount);


            $thirdAccountList = $this->Common_model->get_data_list_by_single_column('chartofaccount', 'parentId', $eachAccount->chart_id);

            foreach ($thirdAccountList as $ky => $forthAccount) {


                $getAccountList = $this->Common_model->get_data_list_by_single_column('chartofaccount', 'parentId', $forthAccount->chart_id);
                $getArrayData = $this->Common_model->get_data_list_by_single_column('chartofaccount', 'chart_id', $forthAccount->chart_id);
                //dumpVar($data['accountList'][$forthAccount->chart_id]);
                if (!empty($getAccountList)) {
                    // unset($data['accountList']);
                    $finalArray[][$forthAccount->chart_id] = $data['accountList'][$forthAccount->chart_id] = $getAccountList;
                } else {

                    $finalArray[][$forthAccount->parentId] = $data['accountList'][$forthAccount->parentId] = $getArrayData;
                    //$finalArray[]=$data['accountList'][$forthAccount->parentId];
                }
            }
        endforeach;
        // dumpVar($finalArray);

        return $finalArray;
    }

    function getSupplierID($distributorid) {
        $supOriId = $this->db->where('dist_id', $distributorid)->count_all_results('supplier') + 1;
        $supplierGeneratedID = "SID" . date("y") . date("m") . str_pad($supOriId, 4, "0", STR_PAD_LEFT);
        return $supplierGeneratedID;
    }

    public function checkDuplicateSupID($supplierGeneratedID, $distributorid) {
        $checkExits = $this->db->get_where('supplier', array('dist_id' => $distributorid, 'supID' => $supplierGeneratedID))->row();
        if (!empty($checkExits)) {
            $supOriId = $this->db->where('dist_id', $distributorid)->count_all_results('supplier') + 1;
            return $newID = "SID" . date("y") . date("m") . str_pad($supOriId + 1, 4, "0", STR_PAD_LEFT);
        } else {
            if (!empty($supplierGeneratedID)) {
                return $supplierGeneratedID;
            }
        }
    }

    function get_bd_amount_in_text($amount) {

        $output_string = '';

        $tokens = explode('.', $amount);
        $current_amount = $tokens[0];
        $fraction = '';
        if (count($tokens) > 1) {
            $fraction = (double) ('0.' . $tokens[1]);
            $fraction = $fraction * 100;
            $fraction = round($fraction, 0);
            $fraction = (int) $fraction;
            $fraction = $this->translate_to_words($fraction) . ' Poisa';
            $fraction = ' Taka & ' . $fraction;
        }

        $crore = 0;
        if ($current_amount >= pow(10, 7)) {
            $crore = (int) floor($current_amount / pow(10, 7));
            $output_string .= $this->translate_to_words($crore) . ' crore ';
            $current_amount = $current_amount - $crore * pow(10, 7);
        }

        $lakh = 0;
        if ($current_amount >= pow(10, 5)) {
            $lakh = (int) floor($current_amount / pow(10, 5));
            $output_string .= $this->translate_to_words($lakh) . ' lakh ';
            $current_amount = $current_amount - $lakh * pow(10, 5);
        }

        $current_amount = (int) $current_amount;
        $output_string .= $this->translate_to_words($current_amount);

        $output_string = $output_string . $fraction . ' only';
        $output_string = ucwords($output_string);
        return $output_string;
    }

    function translate_to_words($number) {

        /*         * ***
         * A recursive function to turn digits into words
         * Numbers must be integers from -999,999,999,999 to 999,999,999,999 inclussive.
         */

        // zero is a special case, it cause problems even with typecasting if we don't deal with it here
        $max_size = pow(10, 18);
        if (!$number)
            return "zero";
        if (is_int($number) && $number < abs($max_size)) {
            $prefix = '';
            $suffix = '';
            switch ($number) {
                // setup up some rules for converting digits to words
                case $number < 0:
                    $prefix = "negative";
                    $suffix = $this->translate_to_words(-1 * $number);
                    $string = $prefix . " " . $suffix;
                    break;
                case 1:
                    $string = "one";
                    break;
                case 2:
                    $string = "two";
                    break;
                case 3:
                    $string = "Three";
                    break;
                case 4:
                    $string = "four";
                    break;
                case 5:
                    $string = "five";
                    break;
                case 6:
                    $string = "six";
                    break;
                case 7:
                    $string = "seven";
                    break;
                case 8:
                    $string = "eight";
                    break;
                case 9:
                    $string = "nine";
                    break;
                case 10:
                    $string = "ten";
                    break;
                case 11:
                    $string = "eleven";
                    break;
                case 12:
                    $string = "twelve";
                    break;
                case 13:
                    $string = "thirteen";
                    break;
                // fourteen handled later
                case 15:
                    $string = "fifteen";
                    break;
                case $number < 20:
                    $string = $this->translate_to_words($number % 10);
                    // eighteen only has one "t"
                    if ($number == 18) {
                        $suffix = "een";
                    } else {
                        $suffix = "teen";
                    }
                    $string .= $suffix;
                    break;
                case 20:
                    $string = "twenty";
                    break;
                case 30:
                    $string = "Thirty";
                    break;
                case 40:
                    $string = "forty";
                    break;
                case 50:
                    $string = "fifty";
                    break;
                case 60:
                    $string = "sixty";
                    break;
                case 70:
                    $string = "seventy";
                    break;
                case 80:
                    $string = "eighty";
                    break;
                case 90:
                    $string = "ninety";
                    break;
                case $number < 100:
                    $prefix = $this->translate_to_words($number - $number % 10);
                    $suffix = $this->translate_to_words($number % 10);
                    //$string = $prefix . "-" . $suffix;
                    $string = $prefix . " " . $suffix;
                    break;
                // handles all number 100 to 999
                case $number < pow(10, 3):
                    // floor return a float not an integer
                    $prefix = $this->translate_to_words(intval(floor($number / pow(10, 2)))) . " hundred";
                    if ($number % pow(10, 2))
                        $suffix = " and " . $this->translate_to_words($number % pow(10, 2));
                    $string = $prefix . $suffix;
                    break;
                case $number < pow(10, 6):
                    // floor return a float not an integer
                    $prefix = $this->translate_to_words(intval(floor($number / pow(10, 3)))) . " thousand";
                    if ($number % pow(10, 3))
                        $suffix = $this->translate_to_words($number % pow(10, 3));
                    $string = $prefix . " " . $suffix;
                    break;
            }
        } else {
            echo "ERROR with - $number Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
        }
        return $string;
    }

    function getTransactionType($transactionid) {
        $transactioninfo = $this->get_single_data_by_single_column('tbl_transaction', 'transaction_id', $transactionid);
        // dumpVar($transactioninfo);
        if ($transactioninfo->transaction_type == 1) {
            return "Opening Balance Added.";
        } else if ($transactioninfo->transaction_type == 2) {
            if (!empty($transactioninfo->credit) && $transactioninfo->credit != '0.00') {
                $fromAccount = $this->get_single_data_by_single_column('tbl_account', 'account_id', $transactioninfo->from_account)->account_name;
                $toAccount = $this->get_single_data_by_single_column('tbl_account', 'account_id', $transactioninfo->to_account)->account_name;
                echo 'Transfer ' . $fromAccount . ' To ' . $toAccount;
            } else {

                $fromAccount = $this->get_single_data_by_single_column('tbl_account', 'account_id', $transactioninfo->from_account)->account_name;
                $toAccount = $this->get_single_data_by_single_column('tbl_account', 'account_id', $transactioninfo->to_account)->account_name;
                echo 'Receive ' . $toAccount . ' From ' . $fromAccount;
            }
        } else if ($transactioninfo->transaction_type == 3) {
            return "Expense.";
        }
    }

    function tableRow($table, $column, $columnValue) {
        return $this->db->get_where($table, array($column => $columnValue))->row();
    }

    public function get_plot_list($basicID, $sector, $block, $lane) {

        $this->db->select('float_id');
        $this->db->from('booking_plot_info');
        $this->db->where('basic_id', $basicID);
        $this->db->where('section_id', $sector);
        $this->db->where('block_id', $block);
        $this->db->where('line_id', $lane);

        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function get_plot_list_details($basicid, $sector, $block, $line) {
        $this->db->select('plotNO');
        $this->db->where('bookingID', $basicid);
        $this->db->where('section_id', $sector);
        $this->db->where('block_id', $block);
        $this->db->where('line_id', $line);
        $this->db->where('regiStatus', 0);
        return $this->db->get("tbl_plot")->result();
    }

    function get_regiCheck_value($basicid, $sector, $block, $line) {
        $this->db->select('plotNO');
        $this->db->where('bookingID', $basicid);
        $this->db->where('section_id', $sector);
        $this->db->where('block_id', $block);
        $this->db->where('line_id', $line);
        $this->db->where('regiStatus', 0);
        return $this->db->get("tbl_plot")->result();
    }

    function get_bury_value($basicid, $sector, $block, $line) {
        $this->db->select('plotNO');
        $this->db->where('bookingID', $basicid);
        $this->db->where('section_id', $sector);
        $this->db->where('block_id', $block);
        $this->db->where('line_id', $line);
        $this->db->where('bookStatus', 4);
        return $this->db->get("tbl_plot")->result();
    }

    function totalInstallmentPaid($detailsid, $bookingid) {
        $this->db->select('SUM(booking_payment_details.payAmount) as paid , COUNT(booking_payment_details.details_id) as ttlid');
        $this->db->from('booking_payment_details');
        $this->db->where('booking_payment_details.mantaininceStatus !=', 1);
        $this->db->where('basic_id', $bookingid);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    function get_data_list_by_main_menu_id($parent_id, $admin_id) {
        $this->db->where('parent_id', $parent_id);
        $this->db->where('admin_id', $admin_id);
        //$this->db->order_by('orderBy','ASC');
        return $this->db->get("admin_role")->result_array();
    }

    function get_data_list_by_sub_menu_id($navigation_id, $admin_id) {
        $this->db->where('navigation_id', $navigation_id);
        $this->db->where('user_id', $admin_id);
        return $this->db->get("access_setting")->result_array();
    }

    // add new data into a database table
    function insert_data($table_name, $data) {
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    public function bankavailableblance($bid) {
        $this->db->select('SUM(amount) as bavbalance', FALSE);
        $this->db->from('tbl_transaction');
        $this->db->where('transaction_id', $bid);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    // update data by id of a database table
    function update_data($table_name, $data, $column_name, $column_value) {
        $this->db->where($column_name, $column_value);
        $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    }

    function update_data2($table_name, $data, $where) {
        $this->db->where($where);
        $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    }

    // delete data by id of a database table
    function delete_data($table_name, $column_name, $column_value) {
        $this->db->where($column_name, $column_value);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    }

    public function get_order_info_by_id($orderID) {
        $this->db->select('*')
                ->from('pro_order')
                ->join('buyer', 'buyer.b_id = pro_order.buyer_id')
                ->join('style', 'style.s_id = pro_order.style_id')
                ->join('section', 'section.s_id = pro_order.section_id')
                ->where('pro_order.o_id', $orderID);

        return $this->db->get()->row();
    }

    public function get_all_data_list_for_donor_ledger() {
        $this->db->select('*')
                ->from('donate_ledger')
                ->join('admin', 'admin.admin_id = donate_ledger.donate_user_id')
                ->join('tbl_account', 'tbl_account.account_id = donate_ledger.account_id')
                ->join('donate_category', 'donate_category.don_cat_id = donate_ledger.don_cat_id')
                ->where('donate_ledger.payment_type !=', 0);
        return $this->db->get()->result();
    }

    public function invoiceNumber($id) {
        $this->db->select('*');
        $this->db->from('donation_use');
        $this->db->where('don_use_id', $id);

        return $this->db->get()->row();
    }

    public function getDataListBySingleColumn() {
        $this->db->select('*');
        $this->db->from('tbl_vehicle_setup');
        // $this->db->where('status !=', 0);

        return $this->db->get()->result();
    }

    public function getDonationHistory($id) {

        $this->db->select('*')
                ->from('donation_use')
                ->join('tbl_account', 'tbl_account.account_id = donation_use.account_id')
                ->join('donation_use_history', 'donation_use_history.don_use_id = donation_use.don_use_id')
                ->join('admin', 'admin.admin_id = donation_use_history.donate_user_id')
                ->join('donate_category', 'donate_category.don_cat_id = donation_use_history.don_cat_id')
                ->where('donation_use.don_use_id', $id);
        return $this->db->get()->result();
    }

    public function getLastIdoFLedger() {
        $this->db->select('*');
        $this->db->from('donate_ledger');
        return $this->db->get()->num_rows();
    }

    public function get_due_amount_info_by_id1($emp_id) {


        $this->db->select_sum('netttls')
                ->from('pro_item')
                ->where('accountId', $emp_id);

        return $this->db->get()->row();
    }

    public function get_due_amount_info_by_id2($emp_id) {


        $this->db->select_sum('amount')
                ->from('emp_payment')
                ->where('emp_id', $emp_id);

        return $this->db->get()->row();
    }

    public function get_orderQty_info_by_id($orderID) {

        $this->db->select('sum(o_qty) as o_qty')
                ->from('pro_order')
                ->where('pro_order.o_id', $orderID);

        return $this->db->get()->row();
    }

    public function getProductQty($id) {
        $this->db->select('sum(qty) as rQty')
                ->from('tbl_stock')
                ->where('product_id', $id);
        return $this->db->get()->row();
    }

    public function get_reMorderQty_info_by_id($orderID) {
        $this->db->select('sum(ttlqty) as ttlqty')
                ->from('pro_item')
                ->where('pro_item.production_id', $orderID);

        return $this->db->get()->row();
    }

    public function vehicleUseInfo($empID) {
        $this->db->select('*,')
                ->from('transportation_manage')
                ->where('transportation_manage.driver_id', $empID)
                ->join('tbl_vehicle_setup', 'tbl_vehicle_setup.vehicle_id = transportation_manage.vehicle_id')
                ->join('tbl_employee', 'tbl_employee.employee_id = transportation_manage.helper_id');

        return $this->db->get()->result();
    }

    // get data list by single column of a database table
    function get_data_list_by_single_column($table_name, $column_name, $column_value, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL) {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->result();
    }

    function get_data_list_by_single_row($table_name, $column_name, $column_value, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL) {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->row();
    }

    function get_data_list_by_two_column($sectorID, $blockID, $laneID) {
        $this->db->select('*')
                ->from('tbl_plot')
                ->where('section_id', $sectorID)
                ->where('block_id', $blockID)
                ->where('line_id', $laneID);
        //->where('type_id', $type);
//                ->where('bookStatus !=', 2);
        //->where('type_id', $type);
        return $this->db->get()->result();
    }

    public function get_data_list_with_details($basicid, $sectorID, $blockID, $laneID) {
        $this->db->select('*')
                ->from('tbl_plot')
                ->where('section_id', $sectorID)
                ->where('block_id', $blockID)
                ->where('line_id', $laneID)
                ->where('bookingID', $basicid)
                // ->where(array('bookStatus !=' => 5, 'bookStatus !=' => 6));
                ->where(array('bookStatus !=' => 5));
        return $this->db->get()->result();
    }

    public function get_data_list_with_details_re($basicid, $sectorID, $blockID, $laneID) {
        $this->db->select('*')
                ->from('tbl_plot')
                ->where('section_id', $sectorID)
                ->where('block_id', $blockID)
                ->where('line_id', $laneID)
                ->where('bookingID', $basicid)
                ->where_in('bookStatus', array('5', '6'));
        return $this->db->get()->result();
    }

    public function get_burid_info_with_join() {
        $this->db->select('*');
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id = tbl_graved_history.basic_id');
        $this->db->join('booking_nominee_info', 'booking_nominee_info.basic_id = tbl_graved_history.basic_id');
        return $this->db->get('tbl_graved_history')->result();
    }

    public function get_regi_info_with_join() {
        $this->db->select('*');
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id = grave_reqistration_history.basic_id');
        $this->db->join('booking_nominee_info', 'booking_nominee_info.basic_id = grave_reqistration_history.basic_id');
        return $this->db->get('grave_reqistration_history')->result();
    }

    public function getTaskInfojoin($id) {
        $this->db->select('*,tbl_task.status as tskstatus');
        $this->db->from('tbl_task');
        $this->db->where('task_id', $id);
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_task.employee_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_task.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_task.createdBy');
        return $this->db->get()->row();
    }

    function table_info($table, $column_name, $column_value) {
        $query = $this->db->get_where($table, array($column_name => $column_value));
        return $query->row();
    }

    function table_info_condition($table, $array) {
        $query = $this->db->get_where($table, $array);
        return $query->row();
    }

    function table_data_info($table) {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get()->row();
    }

    function get_data_list_join() {
        $this->db->select('*')
                ->from('unit');
        return $this->db->get()->result();
    }

    // get all data list of a database table
    function get_data_list($table_name, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL) {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        return $this->db->get($table_name)->result();
    }

    function transportation_manage_info() {
        $this->db->select('*');
        $this->db->from('transportation_manage');
        $this->db->where('transportation_manage.status', 0);
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = transportation_manage.driver_id');
        return $this->db->get()->result();
    }

    function get_data_list_by_single_column_join() {
        $this->db->select('*,use_details.country');
        $this->db->from('admin');
        $this->db->where('admin.type', 'User');
        $this->db->join('use_details', 'use_details.user_id = admin.admin_id');
        return $this->db->get()->result();
    }

    public function getVehicleList() {
        $this->db->select('*');
        $this->db->from('transportation_manage');
        $this->db->join('tbl_vehicle_setup', 'tbl_vehicle_setup.vehicle_id = transportation_manage.vehicle_id');
        return $this->db->get()->result();
    }

    function dataList($id) {
        $this->db->select('*');
        $this->db->from('demo_purchase');
        $this->db->join('demo_purchase_item', 'demo_purchase_item.invoiceId = demo_purchase.demo_purchase_id');
        return $this->db->get()->result();
    }

    function getProjectDetails() {
        $this->db->select('*,tbl_client.name as c_name,tbl_project_manage.createdBy as p_createdBy,tbl_project_manage.name as p_name,admin.name as adminName');
        $this->db->from('tbl_project_manage');
        $this->db->join('tbl_client', 'tbl_client.client_id = tbl_project_manage.client_id');
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_project_manage.employee_id');
        $this->db->join('admin', 'admin.admin_id = tbl_project_manage.createdBy');
        return $this->db->get()->result();
    }

    function allMeetingList() {
        $this->db->select('*,tbl_meeting.created_at as m_create');
        $this->db->from('tbl_meeting');
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_meeting.employee_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_meeting.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_meeting.created_by');
        return $this->db->get()->result();
    }

    public function allTicketList() {
        $this->db->select('*');
        $this->db->from('tbl_ticket');
        $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_ticket.customer_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_ticket.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_ticket.createdBy');
        return $this->db->get()->result();
    }

    public function ticketview($param) {
        $this->db->select('*');
        $this->db->from('tbl_ticket');
        $this->db->where('tbl_ticket.ticket_id', $param);
        $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_ticket.customer_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_ticket.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_ticket.createdBy');
        return $this->db->get()->row();
    }

    function singleDataList($adminID) {
        $this->db->select('*,tbl_meeting.created_at as m_create');
        $this->db->from('tbl_meeting');
        $this->db->where('tbl_meeting.employee_id', $adminID);
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_meeting.employee_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_meeting.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_meeting.created_by');
        return $this->db->get()->result();
    }

    function singleDataListEach($meetingID) {
        $this->db->select('*,tbl_meeting.created_at as m_create');
        $this->db->from('tbl_meeting');
        $this->db->where('tbl_meeting.meeting_id', $meetingID);
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_meeting.employee_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_meeting.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_meeting.created_by');
        return $this->db->get()->row();
    }

    function get_plot_info_by_column($section, $block, $line) {
        $this->db->select('plotNO,bookStatus');
        $this->db->from('tbl_plot');
        $this->db->where('section_id', $section);
        $this->db->where('block_id', $block);
        $this->db->where('line_id', $line);
        return $this->db->get()->result();
    }

    function get_plot_info_by_column_owner($section, $block, $line) {

        $this->db->select('*');
        $this->db->from('tbl_plot');
        $this->db->where('tbl_plot.section_id', $section);
        $this->db->where('tbl_plot.block_id', $block);
        $this->db->where('tbl_plot.line_id', $line);
        $this->db->where('tbl_plot.bookingID !=', 0);
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id =tbl_plot.bookingID');
        $this->db->join('booking_nominee_info', 'booking_nominee_info.basic_id =tbl_plot.bookingID');
        $this->db->group_by('tbl_plot.bookingID');
        return $this->db->get()->result();
    }

    public function getDonateHistory() {
        $this->db->select('*');
        $this->db->from('donation_use');
        $this->db->join('tbl_account', 'tbl_account.account_id = donation_use.account_id');

        return $this->db->get()->result();
    }

    function get_due_installment_details($clientID, $type) {
        $this->db->select('*');
        $this->db->from('instalmentinfo');
        if ($clientID != 'all') {
            $this->db->where('bookingId', $clientID);
        }

        if (($type != 'all') && ($type <= 3)) {
            $this->db->where('paymentType', $type);
        }

        if (($type == 4) || ($type == 5)) {
            $id = 0;
            if ($type == 4) {
                $id = 2;
                $this->db->where('numberOfInstall', $id);
            } elseif ($type == 5) {
                $id = 3;
                $this->db->where('numberOfInstall', $id);
            }
        }


        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id = instalmentinfo.bookingId');
        return $this->db->get()->result();
        //echo $this->db->last_query();die;
    }

    function getTotalPayInstallment($id) {
        $this->db->select('COUNT(installmentledger.installmentLedgerid) as ttlid');
        $this->db->where('customerid', $id);
        $this->db->where('tr_type', 'Installment');
        return $this->db->get('installmentledger')->row();
    }

    public function get_data_list_by_single_column_by_join($id) {
        $this->db->select('*')
                ->from('donate_ledger')
                ->join('admin', 'admin.admin_id = donate_ledger.donate_user_id')
                ->where('donate_ledger.don_cat_id', $id)
                ->where('donate_ledger.payment_type !=', 0);
        return $this->db->get()->result();
    }

    function get_data_list_all() {

        $this->db->select('*')
                ->from('tbl_expense')
                ->join('tbl_expense_head', 'tbl_expense_head.expense_hd_id = tbl_expense.expense_hd_id')
                ->join('tbl_expense_sub_head', 'tbl_expense_sub_head.exp_sub_hd_id = tbl_expense.exp_sub_hd_id')
                ->join('tbl_account', 'tbl_account.account_id = tbl_expense.account_id');
        return $this->db->get()->result();
    }

    function get_data_list_by_join() {
        $this->db->select('*')
                ->from('pro_order')
                ->join('buyer', 'buyer.b_id = pro_order.buyer_id')
                ->join('section', 'section.s_id = pro_order.section_id');
        return $this->db->get()->result();
    }

    function get_data_list_by_join_user() {
        $this->db->select('*,payments.admin_id as receiver_id,admin.name,admin.phone,admin.email,payments.created_at as paytime')
                ->from('payments')
                ->order_by('payments.payment_id', 'desc')
                ->join('admin', 'admin.admin_id = payments.user_id');
        return $this->db->get()->result();
    }

    function get_data_list_by_join_all() {
        $this->db->select('*')
                ->from('tbl_customer')
                ->join('tbl_bangladesh_divisions', 'tbl_bangladesh_divisions.id = tbl_customer.division_id')
                ->join('tbl_bangladesh_districts', 'tbl_bangladesh_districts.district_id = tbl_customer.district_id')
                ->join('tbl_bangladesh_upazilas', 'tbl_bangladesh_upazilas.upazila_id = tbl_customer.upazila_id')
                ->join('tbl_employee', 'tbl_employee.employee_id = tbl_customer.seler_id');
        return $this->db->get()->result();
    }

    function get_data_list_join_all() {
        $this->db->select('*')
                ->from('tbl_plot')
                ->join('section', 'section.section_id = tbl_plot.section_id')
                ->join('block', 'block.block_id = tbl_plot.block_id')
                ->join('line', 'line.line_id = tbl_plot.line_id')
                ->join('plot_type', 'plot_type.type_id = tbl_plot.type_id');
        return $this->db->get()->result();
    }

    function get_payment_data_list_by_join() {
        $this->db->select('*')
                ->from('emp_payment')
                ->join('tbl_employee', 'tbl_employee.e_id = emp_payment.emp_id');
        //->join('section', 'section.s_id = pro_order.section_id');
        return $this->db->get()->result();
    }

    function get_order_data_list_by_join() {
        $this->db->select('*')
                ->from('production');
        return $this->db->get()->result();
    }

    public function get_single_data_by_single_column_order($id) {
        $this->db->select('*')
                ->from('production')
                ->join('floor', 'floor.f_id = production.floor_id')
                ->join('line', 'line.l_id = production.line_id')
                ->where('production_id', $id);
        return $this->db->get()->row();
    }

    public function get_single_data_by_single_column_individul($id) {
        // dumpVar($id);
        $this->db->select('*')
                ->from('pro_item')
                ->join('tbl_employee', 'tbl_employee.e_id = pro_item.accountId')
                ->join('items', 'items.i_id = pro_item.itemName')
                ->where('pro_item.production_id', $id);
        return $this->db->get()->result();
    }

    // get single data by single column of a database table
    function get_single_data_by_single_column($table_name, $column_name, $column_value) {
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->row();
    }

    function getBookinDataById($param) {
        $this->db->select('*')
                //->join('tbl_booking_details', 'tbl_booking_details.booking_id = tbl_booking.bookin_id')
                ->join('tbl_booking_history', 'tbl_booking_history.booking_id = tbl_booking.bookin_id')
                ->where('tbl_booking_history.booking_id', $param)
                ->from('tbl_booking');
        return $this->db->get()->result();
    }

    function get_data_by_all_join($id) {
        $this->db->select('*,tbl_client.name as c_name,tbl_project_manage.createdBy as p_createdBy,tbl_project_manage.name as p_name,admin.name as adminName');
        $this->db->from('tbl_project_manage');
        $this->db->where('tbl_project_manage.project_id', $id);
        $this->db->join('tbl_client', 'tbl_client.client_id = tbl_project_manage.client_id');
        $this->db->join('tbl_employee', 'tbl_employee.employee_id = tbl_project_manage.employee_id');
        $this->db->join('tbl_designation', 'tbl_designation.designation_id = tbl_project_manage.designation_id');
        $this->db->join('admin', 'admin.admin_id = tbl_project_manage.createdBy');
        return $this->db->get()->row();
    }

    function get_single_data_by_single_columne($table_name, $column_name, $column_value) {
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->result();
    }

    function getDonarListbyid() {
        $this->db->select('*');
        $this->db->from('admin');
        $admin_acces_type = $this->session->userdata['accessType'];

        if ($admin_acces_type == 4) {
            $this->db->where('admin_id', $this->session->userdata['admin_id']);
        }
        $this->db->where('admin.accessType', 4);
        return $this->db->get()->result();
    }

    function totalAtCashBalance() {
        $this->db->select("sum(tbl_transaction.debit - tbl_transaction.credit) as totalBalance");
        $this->db->from("tbl_transaction");
        $this->db->where('tbl_transaction.account_id', 3);
        return $result = $this->db->get()->row()->totalBalance;
    }

    function totalAtBankBalance() {
        $this->db->select("sum(tbl_transaction.debit - tbl_transaction.credit) as totalBalanceBank");
        $this->db->from("tbl_transaction");
        $this->db->where('tbl_transaction.account_id !=', 3);
        return $result = $this->db->get()->row()->totalBalanceBank;
    }

    function totalAtExp() {
        $this->db->select("sum(tbl_transaction.credit) as totalExp");
        $this->db->from("tbl_transaction");
        $this->db->where('tbl_transaction.transaction_type', 4);
        return $result = $this->db->get()->row()->totalExp;
    }

    function get_single_data_by_multi_column($table_name, $column_name, $column_value) {
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->result();
    }

    function get_data_list_by_meny_where($sector, $block, $line) {
        $this->db->select('*')
                ->from('tbl_plot')
                ->where('section_id', $sector)
                ->where('block_id', $block)
                ->where('line_id', $line)
                ->where('bookStatus != ', 2);
        return $this->db->get()->result();
    }

    function get_single_data_by_single_column_by_field($table, $column, $column_value, $where, $confition) {
        $this->db->where($column, $column_value);
        $this->db->where($where, $confition);
        return $this->db->get($table)->row();
    }

    // get single data by many columns of a database table
    function get_data_list_by_many_columns($table_name, $column_array, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL) {
        $this->db->where($column_array);
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        return $this->db->get($table_name)->result();
    }

    function get_data_list_by_many_columnss($table_name, $column_array, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL) {
        $this->db->where($column_array);
        // if (isset($order_column_name) && isset($order))
        $this->db->order_by('id', 'RANDOM');
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        return $this->db->get($table_name)->result();
    }

    // get single data by many columns of a database table
    function get_single_data_by_many_columns($table_name, $column_array, $order_column_name = null, $order = null) {
        $this->db->where($column_array);
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        $result = $this->db->get($table_name)->row();
        return $result;
    }

    function get_singe_data_by_many_column($section_id, $block_id, $line_id) {
        $this->db->select('*')
                ->from('plotlayout')
                ->where('sector_id', $section_id)
                ->where('block_id', $block_id)
                ->where('lane_id', $line_id);
        return $this->db->get()->row();
    }

    function getBookingStauts($section_id, $block_id, $line_id, $plot) {
        $this->db->select('bookStatus')
                ->from('tbl_plot')
                ->where('section_id', $section_id)
                ->where('block_id', $block_id)
                ->where('line_id', $line_id)
                ->where('plotNO', $plot);
        return $this->db->get()->row();
    }

    // get number of rows of a database table
    function count_all_data($table_name) {
        return $this->db->count_all($table_name);
    }

    function get_data_list_for_line($sectorId) {
        $this->db->select('*');
        $this->db->from('setup_line');
        if ($sectorId == 1 || $sectorId == 2) {
            $this->db->where('line_id >=', 1);
            $this->db->where('line_id <=', 24);
        } elseif ($sectorId == 3 || $sectorId == 4) {
            $this->db->where('line_id >=', 25);
            $this->db->where('line_id <=', 48);
        } elseif ($sectorId == 5 || $sectorId == 6) {
            $this->db->where('line_id >=', 49);
            $this->db->where('line_id <=', 72);
        } elseif ($sectorId == 7 || $sectorId == 8) {
            $this->db->where('line_id >=', 73);
            $this->db->where('line_id <=', 96);
        }

        return $this->db->get()->result();
    }

    public function getTotalInstallments($id) {
        $this->db->select("*");
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id=installmentledger.customerid');
        if ($id != 'all') {
            $this->db->where('installmentledger.customerid', $id);
        }
        $this->db->group_by('booking_basic_info.basic_id');
        $this->db->order_by('booking_basic_info.basic_id', 'DESC');
        $this->db->where('installmentledger.MantainStatus !=', 1);
        return $this->db->get('installmentledger')->result();
    }

    public function getDataLedger($id) {
        $this->db->select("*");
        $this->db->from('tbl_transaction');
        $this->db->join('donate_category', 'donate_category.don_cat_id = tbl_transaction.don_cat_id');
        //$this->db->group_by('booking_basic_info.basic_id');
        //$this->db->order_by('booking_basic_info.basic_id', 'DESC');
        $this->db->where('tbl_transaction.donate_user_id ', $id);
        return $this->db->get()->result();
    }

    public function getTotalInstallmentsadmin($id) {
        $this->db->select("*");
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id=installmentledger.customerid');
        if ($id != 'all') {
            $this->db->where('installmentledger.createdBy', $id);
        }
        $this->db->order_by('installmentledger.date', 'DESC');
        $this->db->where('installmentledger.MantainStatus !=', 1);
        return $this->db->get('installmentledger')->result();
    }

    public function getDataByAdmin($id) {

        $this->db->select("*");
        $this->db->join('admin', 'admin.admin_id=tbl_transaction.donate_user_id');
        $this->db->join('donate_category', 'donate_category.don_cat_id=tbl_transaction.don_cat_id');
        $this->db->join('tbl_account', 'tbl_account.account_id=tbl_transaction.account_id');
        $this->db->where('tbl_transaction.transaction_type', 8);
        return $this->db->get('tbl_transaction')->result();
    }

    public function getDataByAdmin2($id) {

        $this->db->select("*");
        $this->db->join('admin', 'admin.admin_id=tbl_transaction.donate_user_id');
        $this->db->join('donate_category', 'donate_category.don_cat_id=tbl_transaction.don_cat_id');
        $this->db->join('tbl_account', 'tbl_account.account_id=tbl_transaction.account_id');
        if ($id != 'all') {
            $this->db->where('tbl_transaction.created_by', $id);
        }
//        $admin_acces_type = $this->session->userdata['accessType'];
//        if ($admin_acces_type == 3) {
//            $this->db->where('tbl_transaction.created_by', $this->session->userdata['admin_id']);
//        }
        $this->db->where('tbl_transaction.transaction_type', 8);
        return $this->db->get('tbl_transaction')->result();
    }

    public function getTotalInstallmentbyAdmin() {
        $this->db->select("*");
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id=installmentledger.customerid');
        $this->db->order_by('installmentledger.date', 'DESC');

        $admin_acces_type = $this->session->userdata['accessType'];

        if ($admin_acces_type == 3) {
            $this->db->where('createdBy', $this->session->userdata['admin_id']);
        }

        $this->db->where('installmentledger.MantainStatus !=', 1);
        return $this->db->get('installmentledger')->result();
    }

    public function getTotaldonationByAdmins() {
        $this->db->select("*");
        $this->db->join('donate_user', 'donate_user.donate_user_id=tbl_transaction.donate_user_id');
        $this->db->join('donate_category', 'donate_category.don_cat_id=tbl_transaction.don_cat_id');
        $this->db->join('tbl_account', 'tbl_account.account_id=tbl_transaction.account_id');
//        $this->db->join('admin', 'admin.admin_id=tbl_transaction.created_by');
//        $this->db->order_by('installmentledger.date', 'DESC');
        $admin_acces_type = $this->session->userdata['accessType'];
        if ($admin_acces_type == 3) {
            $this->db->where('tbl_transaction.created_by', $this->session->userdata['admin_id']);
        }
        $this->db->where('tbl_transaction.transaction_type', 8);
        return $this->db->get('tbl_transaction')->result();
    }

    public function getTotalInstallment() {
        $this->db->select("*");
        $this->db->join('booking_basic_info', 'booking_basic_info.basic_id=installmentledger.customerid');
        $this->db->group_by('booking_basic_info.basic_id');
        $this->db->order_by('booking_basic_info.basic_id', 'DESC');
        $this->db->where('installmentledger.MantainStatus !=', 1);
        return $this->db->get('installmentledger')->result();
    }

    public function getTotalCatLedger() {
        $this->db->select("*,sum(tbl_transaction.debit) as totaldr,sum(tbl_transaction.credit) as totalcr");
        $this->db->join('donate_category', 'donate_category.don_cat_id=tbl_transaction.don_cat_id');
        $this->db->join('admin', 'admin.admin_id = tbl_transaction.donate_user_id');

        //  $this->db->group_by('donate_category.don_cat_id');
        // $this->db->order_by('booking_basic_info.basic_id', 'DESC');
        // $this->db->where('installmentledger.MantainStatus !=', 1);

        return $this->db->get('tbl_transaction')->result();
    }

    public function getDataLedgerforCategory($id) {
        $this->db->select("*");
        $this->db->join('donate_category', 'donate_category.don_cat_id=tbl_transaction.don_cat_id');
        $this->db->join('admin', 'admin.admin_id = tbl_transaction.donate_user_id');
        if ($id != 'all') {
            $this->db->where('tbl_transaction.don_cat_id', $id);
        }
        //$this->db->group_by('donate_category.don_cat_id');
        //$this->db->order_by('booking_basic_info.basic_id', 'DESC');
        //$this->db->where('installmentledger.MantainStatus !=', 1);

        return $this->db->get('tbl_transaction')->result();
    }

    public function getTotalAmount($basicid) {
        $this->db->select("sum(installmentledger.debit) as totalDabit , sum(installmentledger.credit) as totalCredit");
        $this->db->where('installmentledger.customerid', $basicid);
        $this->db->where('installmentledger.MantainStatus !=', 1);
        return $this->db->get('installmentledger')->row();
    }

    public function get_data_list_by_where_id($admin_access) {
        $this->db->select("*");
        $this->db->from("admin");
        if ($admin_access == 3) {
            $this->db->where('admin_id', $this->session->userdata['admin_id']);
        }
        return $this->db->get()->result();
    }

    public function total_submissin_count() {
        $this->db->select('COUNT(id) AS total');
        return $this->db->get('submissions')->row();
    }

    public function total_collect_by_bkash() {
        $this->db->select('SUM(amount) AS totaltk');
        $this->db->where('currency_code', 'TK')->where('payment_status', 'Completed');
        return $this->db->get('payments')->row();
    }

    public function total_collect_by_paypal() {
        $this->db->select('SUM(payment_gross) AS totalusd');
        $this->db->where('currency_code', 'USD')->where('payment_status', 'Completed');
        return $this->db->get('payments')->row();
    }

    public function total_user_registration() {
        $this->db->select('count(id) AS userregi');
        return $this->db->get('use_details')->row();
    }

    public function total_country_submission() {

        $sql = "SELECT c.name,count(c.id) as totalcounty FROM submissions as s
left JOIN country as c ON c.id=s.country
GROUP by c.id ORDER by count(c.id) DESC";
        $result = $this->db->query($sql)->result();

        return $result;
    }

    public function total_categori_wise_submission() {

        $sql = "SELECT s.category_id,c.title,count(c.id) as totalImge FROM submissions as s
                left JOIN category as c ON c.id=s.category_id
               
                WHERE (s.disabled = 2 AND s.deleted = 0)
                GROUP by c.id ORDER by count(c.id) DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    /*
      public function total_country_submission() {
      $this->db->select('submissions.country,country.name');
      $this->db->group_by('submissions.country');
      $this->db->join('country', 'country.id = submissions.country');
      return $this->db->get('submissions')->result();
      } */

    public function total_user_submission() {
        $this->db->select('COUNT(id) as ttlusersubmit');
        $this->db->group_by('user_id');
        return $this->db->get('submissions')->num_rows();
    }

    public function count_country_submission($id) {
        $this->db->select('count(id) as totalsub');
        $this->db->where('country', $id);
        return $this->db->get('submissions')->row();
    }

    public function count_category_submission($id) {
        $this->db->select('count(id) as totalcatsub');
        $this->db->where('category_id', $id);
        return $this->db->get('submissions')->row();
    }

    public function get_user_amount($uid) {
        $this->db->select('sum(totoal_img) as totalamount');
        $this->db->where('user_id', $uid);
        return $this->db->get('products')->row();
    }

    public function get_user_pay($uid) {
        $this->db->select('sum(payment_gross) as totalpay');
        $this->db->where('user_id', $uid);
        return $this->db->get('payments')->row();
    }

    public function getUserList() {
        $this->db->select('submissions.id,submissions.user_id,use_details.name,use_details.user_id');
        $this->db->group_by('submissions.user_id');
        $this->db->order_by('submissions.id', 'DESC');
        $this->db->join('use_details', 'use_details.user_id = submissions.user_id');
        return $this->db->get('submissions')->result();
    }

    public function getTotalMailCount($id) {
        $this->db->select('count(id) as ttlidcount');
        $this->db->where('user_id', $id)->where('type', 1);
        return $this->db->get('confirmation_email')->row();
    }

    public function totalUnreadQuerys() {
        $this->db->select('count(id) as ttlidcount');
        $this->db->where('status', 'unread');
        return $this->db->get('contact_us')->row()->ttlidcount;
    }

    public function getTotalMarkCount($cat_id, $judge_id) {
        $this->db->select('count(category_id) as ttlidCount');
        $this->db->where('judge_id', $judge_id)->where('category_id', $cat_id);
//        $this->db->where('judge_id', $judge_id)->where('category_id',$cat_id);
        return $this->db->get('marking')->row()->ttlidCount;
    }

    public function getAwardedDetails() {

        $sqldata = "SELECT m.note,cu.nicename,u.email,u.name,s.image,c.title,m.category_id,m.photo_id,sum(m.marks) totalMarks,GROUP_CONCAT(m.judge_id) as indivi_judge,GROUP_CONCAT(m.marks) as indivi_marks FROM marking as m
left JOIN category as c ON c.id=m.category_id
left JOIN submissions as s ON s.id=m.photo_id
left JOIN use_details as u ON u.user_id=s.user_id
left JOIN country as cu ON cu.id=s.country
WHERE m.award=1
GROUP BY  m.photo_id
ORDER BY m.category_id ASC,totalMarks DESC";

        $result = $this->db->query($sqldata)->result();

        return $result;


//        $this->db->select('country.nicename,use_details.name,use_details.email,use_details.country,category.title,submissions.image,marking.category_id,marking.category_id,marking.photo_id,marking.judge_id,marking.note,marking.marks,sum(marks) totalMarks');
//        $this->db->group_by('marking.photo_id'); 
//        //$this->db->group_by(array("marking.photo_id", "marking.judge_id"));
//        $this->db->order_by('totalMarks', 'DESC');
//        $this->db->join('submissions', 'submissions.id = marking.photo_id');
//        $this->db->join('category', 'category.id = marking.category_id');
//        $this->db->join('use_details', 'use_details.user_id = submissions.user_id');
//        $this->db->join('country', 'country.id = use_details.country');
//        $this->db->where('marking.award !=', 0);
//        return $this->db->get('marking')->result();
    }

    public function topPhotographs() {
        $sqldata = "SELECT m.judge_id,m.category_id,m.photo_id,m.judge_id,GROUP_CONCAT(m.judge_id) AS individual_judge,GROUP_CONCAT(m.marks) AS individual_marks,sum(m.marks) as totalMarks,c.title,s.image,u.name,u.email,u.country,cu.nicename FROM marking as m
                    left JOIN category as c ON c.id = m.category_id
                    left JOIN submissions as s ON s.id = m.photo_id
                    left JOIN use_details as u on u.user_id = s.user_id
                    left JOIN country as cu on cu.id = s.country
                 
                    GROUP BY m.photo_id
                    ORDER BY m.category_id ASC,totalMarks DESC
                  LIMIT 3000";
        $result = $this->db->query($sqldata)->result();
        return $result;
    }

    public function getPhotosByCategory($category_id) {
        $this->db->select('*');
        $this->db->where('category_id',$category_id)->where('disabled',2)->where('deleted',0);
        return $this->db->get('submissions')->result();
    }

}

?>
