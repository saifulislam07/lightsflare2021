<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ServerFilterController extends CI_Controller
{

	public $admin_id;

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Common_model', 'Finane_Model', 'Inventory_Model', 'Sales_Model');
		$this->load->model('Common_model');
		$this->load->model('ServerFilterModel', 'Filter_Model');
		$this->admin_id = $this->session->userdata('admin_id');
	}

	public function userList()
	{

		$this->Filter_Model->filterData('use_details', array('use_details.name', 'use_details.email', 'admin.status', 'country.name'), array('use_details.name', 'use_details.email', 'admin.status', 'country.name'), array('use_details.name', 'use_details.email', 'admin.status', 'country.name'));
		$users = $this->Filter_Model->get_datatables_user();

		//   echo $this->db->last_query();die;


		$data = array();
		$no = $_POST['start'];
		foreach ($users as $user) {

			$check_submition = $this->db->get_where('submissions', array('user_id' => $user->admin_id))->row();
			// echo $this->db->last_query();
			// die;
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $user->uname . ' <i style="color: blue; font-size: 8px">(' . $user->join . ')</i>';
			$row[] = $user->email;
			$row[] = $user->cname;

			if ($user->status == 'Active') :

				$row[] = '<a style="font-size: 10px; color: white"  onclick="userStatusChanges(' . $user->admin_id . ',2)" class="btn btn-success btn-xs btn-labeled">
                    <i class="ace-icon fa fa-fire bigger-110"></i>
                    Active</a>';
			else :
				$row[] = '<a style="font-size: 10px; color: white" onclick="userStatusChanges(' . $user->admin_id . ',1)" class="btn btn-danger btn-xs btn-labeled">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Inactive
                </a>';
			endif;

			//($check_submition);
			// if (count($check_submition) < 1 && $user->status == 'Active') :
			if ($user->status == 'Active') :
				$row[] = '
    <a data-toggle="modal" data-target="#user-pass-change" class="btn btn-info btn-xs" href="javascript:void(0)" onclick="getDataRe(' . $user->admin_id . ')">
    <i class="ace-icon fa fa-key bigger-110"></i> Password</a>
    
<a data-toggle="modal" data-target="#user-mail" class=" btn btn-success btn-xs" href="javascript:void(0)" onclick="getUsrData(\'' . $user->admin_id . '\',\'' . $user->uname . '\',\'' . $user->email . '\');">
   <i class="ace-icon fa fa-envelope bigger-110"></i></a>';
			else :
				$row[] = '
    <a data-toggle="modal" data-target="#user-pass-change" class="btn btn-info btn-xs" href="javascript:void(0)" onclick="getDataRe(' . $user->admin_id . ')">
   <i class="ace-icon fa fa-key bigger-110"></i> Password</a>';
			endif;





			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Filter_Model->count_all_user(),
			"recordsFiltered" => $this->Filter_Model->count_filtered_user(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function allUsersPhotos()
	{

		$this->Filter_Model->filterData('submissions', array('submissions.image', 'admin.name'), array('submissions.image', 'admin.name'), array('submissions.image', 'admin.name'));
		$photos = $this->Filter_Model->get_photos_user();
		// echo $this->db->last_query();die;
		// dumpVar($photos);
		//  echo $this->db->last_query();die;


		$data = array();
		$no = $_POST['start'];
		foreach ($photos as $user_p) {




			$userAllPhotos = $this->db->get_where('submissions', array('user_id' => $user_p->user_id, 'deleted' => 0))->result();
			// dumpVar($userAllPhotos);
			$imag = '';
			foreach ($userAllPhotos as $key => $value) :
				$imag .= '<img class="" width="500px" alt="' . $value->image . '" class="blue" src="' . base_url('assets/admin/all_submissions/' . $value->image) . '"><div class="checkbox">
  <label>
  <input onclick="primaryJudgint(' . $value->id . ')" type="checkbox" value="' . $value->id . '" ><b style="color:red"> Remove<b> </label>
</div>';

			endforeach;


			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $user_p->name;
			$row[] = $imag;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Filter_Model->count_all_photo(),
			"recordsFiltered" => $this->Filter_Model->count_filtered_photo(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	//
	//    public function brandList() {
	//        $this->Filter_Model->filterData('brand', array('brandName'), array('brandName'), array('brandName'), $this->dist_id);
	//        $list = $this->Filter_Model->get_datatables();
	//
	//
	//
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $brands) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $brands->brandName;
	//            if ($brands->dist_id != 1):
	//                $row[] = '<a class="blue" href="' . site_url('brandEdit/' . $brands->brandId) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteBrand(' . $brands->brandId . ')">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>';
	//            else:
	//                $row[] = '';
	//            endif;
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered(),
	//            "data" => $data,
	//        );
	//        //output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function productCatList() {
	//        $this->Filter_Model->filterData('productcategory', array('title'), array('title'), array('title'), $this->dist_id);
	//        $list = $this->Filter_Model->get_productCat_datatables();
	//
	//
	//
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $productCat) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $productCat->title;
	//            if ($productCat->dist_id != 1):
	//                $row[] = '<a class="blue inventoryEditPermission" href="' . site_url('updateProductCat/' . $productCat->category_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteProductCategory(' . $productCat->category_id . ')">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>';
	//            else:
	//                $row[] = '';
	//            endif;
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_productCat(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_productCat(),
	//            "data" => $data,
	//        );
	//        //output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function unitList() {
	//        $this->Filter_Model->filterData('unit', array('unitTtile', 'code'), array('unitTtile', 'code'), array('unitTtile', 'code'), $this->dist_id);
	//        $list = $this->Filter_Model->get_datatables_unit();
	//
	//
	//
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $unit) {
	//
	//
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $unit->unitTtile;
	//            $row[] = $unit->code;
	//            if ($unit->dist_id != 1):
	//                $row[] = '<a class="blue inventoryEditPermission" href="' . site_url('unitEdit/' . $unit->unit_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteUnit(' . $unit->unit_id . ')">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>';
	//            else:
	//                $row[] = '';
	//            endif;
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_unit(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_unit(),
	//            "data" => $data,
	//        );
	//        //output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function supplierList() {
	//        $this->Filter_Model->filterData('supplier', array('supID', 'supName', 'supEmail', 'supPhone', 'supAddress', 'status'), array('supID', 'supName', 'supEmail', 'supPhone', 'supAddress', 'status'), array('supID', 'supName', 'supEmail', 'supPhone', 'supAddress', 'status'), $this->dist_id);
	//        $list = $this->Filter_Model->get_sup_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $supplier) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $supplier->supID;
	//            $row[] = $supplier->supName;
	//            $row[] = $supplier->supEmail;
	//            $row[] = $supplier->supPhone;
	//            $row[] = $supplier->supAddress;
	//            if ($supplier->status == 1):
	//                $row[] = '<a href="javascript:void(0)" onclick="supplierStatusChange(' . $supplier->sup_id . ',2)" class="label label-danger arrowed">
	//                    <i class="ace-icon fa fa-fire bigger-110"></i>
	//                    Inactive</a>';
	//            else:
	//                $row[] = '<a href="javascript:void(0)" onclick="supplierStatusChange(' . $supplier->sup_id . ',1)" class="label label-success arrowed">
	//                    <i class="ace-icon fa fa-check bigger-110"></i>
	//                    Active
	//                </a>';
	//            endif;
	//            $row[] = '<a class="blue inventoryEditPermission" href="' . site_url('supplierUpdate/' . $supplier->sup_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteSupplier(' . $supplier->sup_id . ',2)">
	//                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
	//                                                </a>';
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function customerList() {
	//        $this->Filter_Model->filterData('customer', array('customerID', 'customerName', 'customerPhone', 'customerEmail', 'customerAddress'), array('customerID', 'customerName', 'customerPhone', 'customerEmail', 'customerAddress',), array('customerID', 'customerName', 'customerPhone', 'customerEmail', 'customerAddress',), $this->dist_id);
	//        $list = $this->Filter_Model->get_cus_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $customer) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $this->Common_model->tableRow('customertype', 'type_id', $customer->customerType)->typeTitle;
	//            $row[] = $customer->customerID;
	//            $row[] = $customer->customerName;
	//            $row[] = $customer->customerPhone;
	//            $row[] = $customer->customerEmail;
	//            $row[] = $customer->customerAddress;
	//
	//            if ($customer->status == 1):
	//                $row[] = '<a href="javascript:void(0)" onclick="customerStatusChange(' . $customer->customer_id . ',2)" class="label label-danger arrowed">
	//                    <i class="ace-icon fa fa-fire bigger-110"></i>
	//                    Inactive</a>';
	//            else:
	//                $row[] = '<a href="javascript:void(0)" onclick="customerStatusChange(' . $customer->customer_id . ',1)" class="label label-success arrowed">
	//                    <i class="ace-icon fa fa-check bigger-110"></i>
	//                    Active
	//                </a>';
	//            endif;
	//            $row[] = '<a class="blue inventoryEditPermission" href="' . site_url('editCustomer/' . $customer->customer_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteCustomer(' . $customer->customer_id . ',1)">
	//                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
	//                                                </a>';
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_cus(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_cus(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function productList() {
	//        $this->Filter_Model->filterData('product', array('productcategory.title', 'brand.brandName', 'product.product_code', 'product.productName', 'product.purchases_price', 'product.retailPrice', 'product.salesPrice', 'product.status'), array('productcategory.title', 'brand.brandName', 'product.product_code', 'product.productName', 'product.purchases_price', 'product.retailPrice', 'product.salesPrice', 'product.status'), array('productcategory.title', 'brand.brandName', 'product.product_code', 'product.productName', 'product.purchases_price', 'product.retailPrice', 'product.salesPrice', 'product.status'), $this->dist_id);
	//        $list = $this->Filter_Model->get_product_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $products) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $products->title;
	//            $row[] = $products->brandName;
	//            $row[] = $products->product_code;
	//            $row[] = $products->productName;
	//            $row[] = $products->purchases_price;
	//            $row[] = $products->retailPrice;
	//            $row[] = $products->salesPrice;
	//            if ($products->dist_id != 1):
	//                if ($products->status == 1):
	//                    $row[] = '<a href="javascript:void(0)" onclick="productStatusChange(' . $products->product_id . ',2)" class="label label-danger arrowed">
	//                    <i class="ace-icon fa fa-fire bigger-110"></i>
	//                    Inactive</a>';
	//                else:
	//                    $row[] = '<a href="javascript:void(0)" onclick="productStatusChange(' . $products->product_id . ',1)" class="label label-success arrowed">
	//                    <i class="ace-icon fa fa-check bigger-110"></i>
	//                    Active
	//                </a>';
	//                endif;
	//            else:
	//                $row[] = '';
	//            endif;
	//            if ($products->dist_id != 1):
	//                $row[] = '<a class="blue inventoryEditPermission" href="' . site_url('updateProduct/' . $products->product_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteProduct(' . $products->product_id . ',2)">
	//          <i class="ace-icon fa fa-trash-o bigger-130"></i>
	//        </a>';
	//            else:
	//                $row[] = '';
	//            endif;
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_product(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_product(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function salesList() {
	//
	//        $saleEditCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '111',
	//        );
	//        $saleEditPermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $saleEditCondition);
	//        $saleDeleteCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '112',
	//        );
	//        $saleDeletePermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $saleDeleteCondition);
	//
	//        $this->Filter_Model->filterData('generals', array('generals.date', 'generals.voucher_no', 'form.name', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), $this->dist_id);
	//        $list = $this->Filter_Model->get_sales_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $sale) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($sale->date));
	//            $row[] = '<a title="view invoice" href="' . site_url('salesInvoice_view/' . $sale->generals_id) . '">' . $sale->voucher_no . '</a>';
	//            $row[] = $sale->name;
	//            $row[] = '<a title="View Customer Dashboard" href="' . site_url('customerDashboard/' . $sale->customer_id) . '">' . $sale->customerID . ' [ ' . $sale->customerName . ' ] ' . '</a>';
	//            $row[] = $sale->narration;
	//            $row[] = number_format((float) $sale->debit, 2, '.', ',');
	//            $row[] = number_format((float) $this->Sales_Model->getGpAmountByInvoiceId($this->dist_id, $sale->generals_id), 2, '.', ',');
	//
	//
	//
	//            if (empty($saleDeletePermition) && !empty($saleEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('salesInvoice_view/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green saleEditPermission" href="' . site_url('salesInvoice_edit/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a> ';
	//            } elseif (!empty($saleDeletePermition) && empty($saleEditPermition)) {
	//
	//
	//                $row[] = '<a class="blue" href="' . site_url('salesInvoice_view/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//
	//
	//    <a class="saleDeletePermission red " href="' . site_url('saleDelete/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>
	//    ';
	//            } else if (!empty($saleDeletePermition) && !empty($saleEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('salesInvoice_view/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green saleEditPermission" href="' . site_url('salesInvoice_edit/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    <a class="saleDeletePermission red " href="' . site_url('saleDelete/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>
	//    ';
	//            } else {
	//                $row[] = '<a class="blue" href="' . site_url('salesInvoice_view/' . $sale->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            }
	//
	//
	//
	//
	//
	//
	//
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_sales(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_sales(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function purchasesList() {
	//
	//        $inventoryDeleteCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '118',
	//        );
	//
	//        $inventoryDeletePermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $inventoryDeleteCondition);
	//
	//
	//        $inventoryEditCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '117',
	//        );
	//
	//        $inventoryEditPermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $inventoryEditCondition);
	//
	//
	//        $this->Filter_Model->filterData('generals', array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'generals.narration', 'generals.debit'), $this->dist_id);
	//        $list = $this->Filter_Model->get_purchases_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $purchases) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($purchases->date));
	//            $row[] = '<a title="view Voucher" href="' . site_url('viewPurchases/' . $purchases->generals_id) . '">' . $purchases->voucher_no . '</a></td>';
	//            $row[] = $purchases->name;
	//            $row[] = '<a title="View Supplier Dashboard" href="' . site_url('supplierDashboard/' . $purchases->sup_id) . '">' . $purchases->supID . ' [ ' . $purchases->supName . ' ] ' . '</a>';
	//            $row[] = $purchases->narration;
	//            $row[] = number_format((float) $purchases->debit, 2, '.', ',');
	//
	//
	//            if (empty($inventoryDeletePermition) && !empty($inventoryEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('viewPurchases/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green inventoryEditPermission" href="' . site_url('purchases_edit/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a> ';
	//            } elseif (!empty($inventoryDeletePermition) && empty($inventoryEditPermition)) {
	//
	//                $row[] = '<a class="blue" href="' . site_url('viewPurchases/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//
	//
	//    <a class="inventoryDeletePermission red " href="' . site_url('purchasesDelete/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>
	//    ';
	//            } else if (!empty($inventoryDeletePermition) && !empty($inventoryEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('viewPurchases/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green inventoryEditPermission" href="' . site_url('purchases_edit/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//
	//    <a class="inventoryDeletePermission red " href="' . site_url('purchasesDelete/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>
	//    ';
	//            } else {
	//                $row[] = '<a class="blue" href="' . site_url('viewPurchases/' . $purchases->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            }
	//
	//
	//
	//
	//
	//
	//
	//
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_purchases(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_purchases(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function paymentList() {
	//
	//        $financeEditCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '114',
	//        );
	//
	//        $financeEditPermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $financeEditCondition);
	//        $financeDeleteCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '115',
	//        );
	//        $financeDeletePermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $financeDeleteCondition);
	//
	//        $this->Filter_Model->filterData('generals', array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), $this->dist_id);
	//        $list = $this->Filter_Model->get_payment_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $payment) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($payment->date));
	//            $row[] = '<a title="View Payment Voucher" href="' . site_url('paymentVoucherView/' . $payment->generals_id) . '">' . $payment->voucher_no . '</a></td>';
	//            $row[] = $payment->name;
	//
	//            if (!empty($payment->customer_id)) {
	//                $row[] = '<a title="View Customer  Dashboard" href="' . site_url('customerDashboard/' . $payment->customer_id) . '">' . $payment->customerID . ' [ ' . $payment->customerName . ' ] ' . '</a>';
	//            } else if (!empty($payment->supplier_id)) {
	//                $row[] = '<a title="View Supplier  Dashboard" href="' . site_url('supplierDashboard/' . $payment->supplier_id) . '">' . $payment->supID . ' [ ' . $payment->supName . ' ] ' . '</a>';
	//            } else {
	//                $row[] = $payment->miscellaneous;
	//            }
	//
	//            $row[] = $payment->narration;
	//            $row[] = number_format((float) $payment->debit, 2, '.', ',');
	//
	//            if (empty($financeDeletePermition) && !empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('paymentVoucherView/' . $payment->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('paymentVoucherEdit/' . $payment->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a> ';
	//            } elseif (!empty($financeDeletePermition) && empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('paymentVoucherView/' . $payment->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//
	//    ';
	//            } else if (!empty($financeDeletePermition) && !empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('paymentVoucherView/' . $payment->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('paymentVoucherEdit/' . $payment->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//
	//    ';
	//            } else {
	//                $row[] = '<a class="blue" href="' . site_url('paymentVoucherView/' . $payment->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            }
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_payment(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_payment(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function receiveList() {
	//
	//        $financeEditCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '114',
	//        );
	//        $financeEditPermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $financeEditCondition);
	//        $financeDeleteCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '115',
	//        );
	//        $financeDeletePermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $financeDeleteCondition);
	//        $this->Filter_Model->filterData('generals', array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), $this->dist_id);
	//        $list = $this->Filter_Model->get_receive_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $receive) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($receive->date));
	//            $row[] = '<a title="View Payment Voucher" href="' . site_url('paymentVoucherView/' . $receive->generals_id) . '">' . $receive->voucher_no . '</a></td>';
	//            $row[] = $receive->name;
	//            if (!empty($receive->customer_id)) {
	//                $row[] = '<a title="View Customer  Dashboard" href="' . site_url('customerDashboard/' . $receive->customer_id) . '">' . $receive->customerID . ' [ ' . $receive->customerName . ' ] ' . '</a>';
	//            } else if (!empty($receive->supplier_id)) {
	//                $row[] = '<a title="View Supplier  Dashboard" href="' . site_url('supplierDashboard/' . $receive->supplier_id) . '">' . $receive->supID . ' [ ' . $receive->supName . ' ] ' . '</a>';
	//            } else {
	//                $row[] = $receive->miscellaneous;
	//            }
	//
	//            $row[] = $receive->narration;
	//            $row[] = number_format((float) $receive->debit, 2, '.', ',');
	//
	//            if (empty($financeDeletePermition) && !empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('receiveVoucherView/' . $receive->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('receiveVoucherEdit/' . $receive->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a> ';
	//            } elseif (!empty($financeDeletePermition) && empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('receiveVoucherView/' . $receive->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//
	//    ';
	//            } else if (!empty($financeDeletePermition) && !empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('receiveVoucherView/' . $receive->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('receiveVoucherEdit/' . $receive->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//
	//    ';
	//            } else {
	//                $row[] = '<a class="blue" href="' . site_url('receiveVoucherView/' . $receive->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            }
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_receive(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_receive(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function journalList() {
	//
	//        $financeEditCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '114',
	//        );
	//        $financeEditPermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $financeEditCondition);
	//        $financeDeleteCondition = array(
	//            'admin_id' => $this->admin_id,
	//            'navigation_id' => '115',
	//        );
	//        $financeDeletePermition = $this->Common_model->get_single_data_by_many_columns('admin_role', $financeDeleteCondition);
	//
	//
	//
	//        $this->Filter_Model->filterData('generals', array('generals.date', 'generals.voucher_no', 'form.name', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'generals.narration', 'generals.debit'), $this->dist_id);
	//        $list = $this->Filter_Model->get_journal_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $journal) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($journal->date));
	//            $row[] = '<a title="View Payment Voucher" href="' . site_url('paymentVoucherView/' . $journal->generals_id) . '">' . $journal->voucher_no . '</a></td>';
	//            $row[] = $journal->name;
	//            $row[] = $journal->narration;
	//            $row[] = number_format((float) $journal->debit, 2, '.', ',');
	//
	//
	//            if (empty($financeDeletePermition) && !empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('journalVoucherView/' . $journal->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('journalVoucherEdit/' . $journal->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a> ';
	//            } elseif (!empty($financeDeletePermition) && empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('journalVoucherView/' . $journal->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//
	//    ';
	//            } else if (!empty($financeDeletePermition) && !empty($financeEditPermition)) {
	//                $row[] = '<a class="blue" href="' . site_url('journalVoucherView/' . $journal->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('journalVoucherEdit/' . $journal->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//
	//    ';
	//            } else {
	//                $row[] = '<a class="blue" href="' . site_url('journalVoucherView/' . $journal->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            }
	//
	//
	//
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_journal(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_journal(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function billVoucherList() {
	//
	//        $this->Filter_Model->filterData('generals', array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), array('generals.date', 'generals.voucher_no', 'form.name', 'supplier.supID', 'supplier.supName', 'customer.customerID', 'customer.customerName', 'generals.narration', 'generals.debit'), $this->dist_id);
	//        $list = $this->Filter_Model->get_bill_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $bill) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($bill->date));
	//            $row[] = '<a title="View Payment Voucher" href="' . site_url('paymentVoucherView/' . $bill->generals_id) . '">' . $bill->voucher_no . '</a></td>';
	//            $row[] = $bill->name;
	//
	//            if (!empty($bill->customer_id)) {
	//                $row[] = '<a title="View Customer  Dashboard" href="' . site_url('customerDashboard/' . $bill->customer_id) . '">' . $bill->customerID . ' [ ' . $bill->customerName . ' ] ' . '</a>';
	//            } else if (!empty($bill->supplier_id)) {
	//                $row[] = '<a title="View Supplier  Dashboard" href="' . site_url('supplierDashboard/' . $bill->supplier_id) . '">' . $bill->supID . ' [ ' . $bill->supName . ' ] ' . '</a>';
	//            } else {
	//                $row[] = $bill->miscellaneous;
	//            }
	//            $row[] = $bill->narration;
	//            $row[] = number_format((float) $bill->debit, 2, '.', ',');
	//            $row[] = '<a class="blue" href="' . site_url('billInvoice_view/' . $bill->generals_id) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>
	//    <a class="green financeEditPermission" href="' . site_url('billInvoice_edit/' . $bill->generals_id) . '">
	//    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//    ';
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_bill(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_bill(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function cusPayList() {
	//
	//        $this->Filter_Model->filterData('moneyreceit', array('moneyreceit.date', 'moneyreceit.receitID', 'moneyreceit.moneyReceitid', 'moneyreceit.totalPayment', 'moneyreceit.checkStatus', 'moneyreceit.paymentType', 'customer.customerID', 'customer.customerName'), array('moneyreceit.date', 'moneyreceit.receitID', 'moneyreceit.moneyReceitid', 'moneyreceit.totalPayment', 'moneyreceit.checkStatus', 'moneyreceit.paymentType', 'customer.customerID', 'customer.customerName'), array('moneyreceit.date', 'moneyreceit.receitID', 'moneyreceit.moneyReceitid', 'moneyreceit.totalPayment', 'moneyreceit.checkStatus', 'moneyreceit.paymentType', 'customer.customerID', 'customer.customerName'), $this->dist_id);
	//        $list = $this->Filter_Model->get_cusPay_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $cusPay) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($cusPay->date));
	//            $row[] = '<a title="View Money Receit" href="' . site_url('viewMoneryReceipt/' . $cusPay->moneyReceitid) . '">' . $cusPay->receitID . '</a></td>';
	//
	//            $row[] = '<a title="View Customer  Dashboard" href="' . site_url('customerDashboard/' . $cusPay->customer_id) . '">' . $cusPay->customerID . ' [ ' . $cusPay->customerName . ' ] ' . '</a>';
	//
	//            if ($cusPay->paymentType == 1):
	//                $row[] = "Cash";
	//            else:
	//                if ($cusPay->checkStatus == 1):
	//                    $row[] = '<p style="color:red;"> Bank &nbsp; <i class="fa fa-refresh fa-spin fa-fw"></i></p>';
	//                else:
	//                    $row[] = '<p style="color:green;"> Bank &nbsp;<i class="fa fa-check"></i></p>';
	//                endif;
	//            endif;
	//            $row[] = number_format((float) $cusPay->totalPayment, 2, '.', ',');
	//            $row[] = '<a class="blue" href="' . site_url('viewMoneryReceipt/' . $cusPay->moneyReceitid) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_cusPay(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_cusPay(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function supPayList() {
	//
	//        $this->Filter_Model->filterData('moneyreceit', array('moneyreceit.date', 'moneyreceit.receitID', 'moneyreceit.moneyReceitid', 'moneyreceit.totalPayment', 'moneyreceit.checkStatus', 'moneyreceit.paymentType', 'supplier.supID', 'supplier.supName'), array('moneyreceit.date', 'moneyreceit.receitID', 'moneyreceit.moneyReceitid', 'moneyreceit.totalPayment', 'moneyreceit.checkStatus', 'moneyreceit.paymentType', 'supplier.supID', 'supplier.supName'), array('moneyreceit.date', 'moneyreceit.receitID', 'moneyreceit.moneyReceitid', 'moneyreceit.totalPayment', 'moneyreceit.checkStatus', 'moneyreceit.paymentType', 'supplier.supID', 'supplier.supName'), $this->dist_id);
	//        $list = $this->Filter_Model->get_supPay_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//
	//        foreach ($list as $supPay) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = date('M d, Y', strtotime($supPay->date));
	//            $row[] = '<a title="View Money Receit" href="' . site_url('viewMoneryReceiptSup/' . $supPay->moneyReceitid) . '">' . $supPay->receitID . '</a></td>';
	//
	//            $row[] = '<a title="View Supplier  Dashboard" href="' . site_url('supplierDashboard/' . $supPay->sup_id) . '">' . $supPay->supID . ' [ ' . $supPay->supName . ' ] ' . '</a>';
	//
	//            if ($supPay->paymentType == 1):
	//                $row[] = "Cash";
	//            else:
	//                if ($supPay->checkStatus == 1):
	//                    $row[] = '<p style="color:red;"> Bank &nbsp; <i class="fa fa-refresh fa-spin fa-fw"></i></p>';
	//                else:
	//                    $row[] = '<p style="color:green;"> Bank &nbsp;<i class="fa fa-check"></i></p>';
	//                endif;
	//            endif;
	//            $row[] = number_format((float) $supPay->totalPayment, 2, '.', ',');
	//            $row[] = '<a class="blue" href="' . site_url('viewMoneryReceiptSup/' . $supPay->moneyReceitid) . '">
	//    <i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_supPay(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_supPay(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function productTypeList() {
	//        $this->Filter_Model->filterData('product_type', array('product_type.product_type_name'), array('product_type.product_type_name'), array('product_type.product_type_name'), $this->dist_id);
	//        $list = $this->Filter_Model->get_product_type_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $products) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $products->product_type_name;
	//
	//            if ($products->dist_id != 1):
	//                if ($products->is_active == "Y"):
	//                    $row[] = '<a href="javascript:void(0)" onclick="productTypeStatusChange(' . $products->product_type_id . ',0)" class="label label-danger arrowed">
	//                    <i class="ace-icon fa fa-fire bigger-110"></i>
	//                    Inactive</a>';
	//                else:
	//                    $row[] = '<a href="javascript:void(0)" onclick="productTypeStatusChange(' . $products->product_type_id . ',1)" class="label label-success arrowed">
	//                    <i class="ace-icon fa fa-check bigger-110"></i>
	//                    Active
	//                </a>';
	//                endif;
	//            else:
	//                $row[] = '';
	//            endif;
	//            if ($products->dist_id != 1):
	//                $row[] = '<a class="blue inventoryEditPermission" href="' . site_url('editproductType/' . $products->product_type_id) . '">
	//                <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//                <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteProductType(' . $products->product_type_id . ',2)">
	//                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
	//                </a>';
	//            else:
	//                $row[] = '';
	//            endif;
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_productType(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_product_type(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
	//
	//    public function productPackageList() {
	//        $this->Filter_Model->filterData('package', array('package.package_name'), array('package.package_name'), array('package.package_name'), $this->dist_id);
	//        $list = $this->Filter_Model->get_product_package_datatables();
	//        //$list = $this->Filter_Model->get_product_type_datatables();
	//        $data = array();
	//        $no = $_POST['start'];
	//        foreach ($list as $products) {
	//            $no++;
	//            $row = array();
	//            $row[] = $no;
	//            $row[] = $products->package_name;
	//
	//            if ($products->dist_id != 1):
	//                if ($products->is_active == "Y"):
	//                    $row[] = '<a href="javascript:void(0)" onclick="productPackageStatusChange(' . $products->package_id . ',0)" class="label label-danger arrowed">
	//                    <i class="ace-icon fa fa-fire bigger-110"></i>
	//                    Inactive</a>';
	//                else:
	//                    $row[] = '<a href="javascript:void(0)" onclick="productPackageStatusChange(' . $products->package_id . ',1)" class="label label-success arrowed">
	//                    <i class="ace-icon fa fa-check bigger-110"></i>
	//                    Active
	//                </a>';
	//                endif;
	//            else:
	//                $row[] = '';
	//            endif;
	//            if ($products->dist_id != 1):
	//                $row[] = '<a class="inventoryEditPermission" href="' . site_url('productPackageView/' . $products->package_id) . '">
	//                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
	//                    </a>
	//                    <a class="blue inventoryEditPermission" href="' . site_url('productPackageEdit/' . $products->package_id) . '">
	//                <i class="ace-icon fa fa-pencil bigger-130"></i></a>
	//                <a class="red inventoryDeletePermission" href="javascript:void(0)" onclick="deleteProductpackage(' . $products->package_id . ',2)">
	//                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
	//                </a>';
	//            else:
	//                $row[] = '';
	//            endif;
	//            $data[] = $row;
	//        }
	//
	//        $output = array(
	//            "draw" => $_POST['draw'],
	//            "recordsTotal" => $this->Filter_Model->count_all_productPackage(),
	//            //"recordsTotal" => $this->Filter_Model->count_all_productType(),
	//            "recordsFiltered" => $this->Filter_Model->count_filtered_product_package(),
	//            //"recordsFiltered" => $this->Filter_Model->count_filtered_product_type(),
	//            "data" => $data,
	//        );
	////output to json format
	//        echo json_encode($output);
	//    }
}
