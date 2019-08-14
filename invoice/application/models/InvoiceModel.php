<?php
class InvoiceModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function showline($invoiceno){
		$result = $this->db->query("select * from lineprice where invoiceno='$invoiceno'");
		return $result->result_array();
	}
	function saleshow($invoiceno){
		$result = $this->db->query("select * from sale where invoiceno='$invoiceno'");
		return $result->result_array();
	}

	function savesales($data,$invoiceno){
		$check = $this->db->query("select * from sale where invoiceno='$invoiceno'");
		$count = $check->num_rows();
		if($count == 1)
		{
			return $count;
		}
		else{
			$result = $this->db->insert('sale',$data);
			return 2;
		}
	}
	function savelines($data){
		$result = $this->db->insert('lineprice',$data);
		return $result;
	}
	function savecustomer($data){
		$result = $this->db->insert('customer',$data);
	}
	function saveordertable($data){
		$result = $this->db->insert('ordertable',$data);
	}
	function savecustom($data){
		$result = $this->db->insert('custom', $data);
	}
	function customshow(){
		$result = $this->db->query("select * from custom");
		return $result->result_array();
	}
	function deletecustom()
	{
		$invoiceno=$this->input->post('invoiceno');

		$this->db->where('invoiceno',$invoiceno);
		$result=$this->db->delete('custom');
		$this->db->delete('customer', array('invoiceno' => $invoiceno));
		$this->db->delete('sale', array('invoiceno' => $invoiceno));
		$this->db->delete('ordertable', array('invoiceno' => $invoiceno));
		$this->db->delete('lineprice', array('invoiceno' => $invoiceno));
		return $result;
	}
	function updatecustom(){
		$id = $this->input->post('id');
		$invoiceno = $this->input->post('invoiceno');
		$customer = $this->input->post('customer');
		$createdate = $this->input->post('createdate');
		$totalitems = $this->input->post('totalitems');
		$totalprice = $this->input->post('totalprice');
		$this->db->set('invoiceno',$invoiceno);
		$this->db->set('customer', $customer);
		$this->db->set('createdate', $createdate);
		$this->db->set('totalitems',$totalitems);
		$this->db->set('totalprice',$totalprice);
		$this->db->where('id', $id);
		$result=$this->db->update('custom');
		return $result;
	}
}
?>