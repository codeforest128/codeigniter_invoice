<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, OPTIONS");
class Custom extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('InvoiceModel');
	}

	public function index(){
		$this->load->view('total_view');
	}

	public function customshow(){
		$data=$this->InvoiceModel->customshow();
		echo json_encode($data);
	}
	public function updatecustom(){
		$data=$this->InvoiceModel->updatecustom();
		echo json_encode($data);
	}
	public function deletecustom(){
		$data=$this->InvoiceModel->deletecustom();
		echo json_encode($data);
	}
}
?>