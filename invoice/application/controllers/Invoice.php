<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, OPTIONS");
class Invoice extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('InvoiceModel');
	}

	public function index(){
		$this->load->view('index');
	}

	public function lineshow(){
		$invoiceno = $this->input->post('invoiceno');
		$data=$this->InvoiceModel->showline($invoiceno);
		echo json_encode($data);
	}
	public function savesales(){
		$data = array(
				'invoiceno'		=> $this->input->post('invoiceno'),
				'po'			=> $this->input->post('po'),
				'salename' 		=> $this->input->post('salename'),
				'shipdate'			=> $this->input->post('shipdate'),
				'shipvia'			=> $this->input->post('shipvia'),
				'terms'			=> $this->input->post('terms'),
				'duedate'			=> $this->input->post('duedate'),
		);
		$invoiceno = $this->input->post('invoiceno');
		$result=$this->InvoiceModel->savesales($data,$invoiceno);
		if($result == 1){
			echo 1;
		}
		else{
			echo json_encode($data);
		}
	}
	public function savelines(){
		$data = array(
				'productid'			=> $this->input->post('productid'),
				'description' 		=> $this->input->post('description'),
				'quantity'			=> $this->input->post('quantity'),
				'unitprice'			=> $this->input->post('unitprice'),
				'invoiceno'			=> $this->input->post('invoiceno'),
		);
		$result=$this->InvoiceModel->savelines($data);
		echo json_encode($result);
	}
	public function invoiceinform()
	{
		$data = array(
				'invoiceno'		  => $this->input->post('invoiceno'),
				'firstname'       => $this->input->post('firstname'),
				'lastname'		  => $this->input->post('lastname'),
				'email'			  => $this->input->post('address'),
				'city'			  => $this->input->post('city'),
				'state'			  => $this->input->post('state'),
				'zip'			  => $this->input->post('zip'),
				'shippingaddress' => $this->input->post('shippingaddress'),
				'shippingcity'	  => $this->input->post('shippingcity'),
				'shippingstate'	  => $this->input->post('shippingstate'),
				'shippingzip'	  => $this->input->post('shippingzip'),
				'telephone'		  => $this->input->post('shippingtelephone'),
				'date'			  => $this->input->post('date')
		);
		$data1 = array(
				'invoiceno'		  => $this->input->post('invoiceno'),
				'date'			  => $this->input->post('date'),
				'shippingcost'	  => $this->input->post('shipping'),
				'taxpercentage'	  => $this->input->post('tax'),
				'subtotal'		  => $this->input->post('subtotal'),
				'grandtotal'	  => $this->input->post('total')	
		);
		$data2 = array(
				'invoiceno'		  => $this->input->post('invoiceno'),
				'customer'		  => $this->input->post('firstname'),
				'createdate'	  => $this->input->post('date'),
				'totalitems'	  => $this->input->post('totalitems'),
				'totalprice'	  => $this->input->post('total')
		);
		$this->InvoiceModel->savecustomer($data);
		$this->InvoiceModel->saveordertable($data1);
		$this->InvoiceModel->savecustom($data2);
		redirect('custom');
	}

}
?>