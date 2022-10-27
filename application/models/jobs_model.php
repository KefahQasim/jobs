<?php

class jobs_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function add_new_job()
	{
		$data = array(
			'job_name' 		=> $this->input->post('job_name'),
			'annual_tax' 	=> $this->input->post('annual_tax'),
			'cleaningFees' 	=> $this->input->post('cleaningFees'),
		);
		$query = $this->db->insert('annual_tax',$data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	function update_job($id)
	{
		$data = array(
			'job_name' 		=> $this->input->post('job_name'),
			'annual_tax' 	=> $this->input->post('annual_tax')

		);

		$this->db->where('id', $id);
		$query = $this->db->update('annual_tax', $data);

		if($query){
			return true;
		} else {
			return false;
		}
	}
	function delete_job($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->delete('annual_tax');

		if($query){
			return true;
		} else {
			return false;
		}
	}
	//اضافة بيانات الفاتورة والمكلفين
	function add_job_bill()
	{
		$data = array(
			'cust_name' 		=> $this->input->post('cust_name'),
			'card_id' 	=> $this->input->post('card_id'),
			'profession_name' 	=> $this->input->post('profession_name'),
			'job_name' 	=> $this->input->post('job_name'),
			'job_code' 	=> $this->input->post('job_name'),
			'job_status' 	=> $this->input->post('job_status'),
			'cust_address' 	=> $this->input->post('cust_address'),
			'profession_address' 	=> $this->input->post('profession_address'),
			'mobile' 	=> $this->input->post('mobile'),
			'openFile_date' 	=> date("Y/m/d"),
			'file_num' 	=> $this->input->post('file_num'),
			'street_No' 	=> $this->input->post('street_No'),
			'building_No' 	=> $this->input->post('building_No'),
		);

		$query = $this->db->insert('subscribers',$data);

		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function get_jobs(){
		$query = $this->db->get("annual_tax");
		return $query->result();

	}

	public function get_jobs_info(){
		$query = $this->db->get("subscribers");
		return $query->result();
	}

	function store_new_prosedure()
	{
		$data = array(
			'procedure_type' 		=> $this->input->post('procedure_type'),
			'file_number' 	=> $this->input->post('file_number'),
			'job_id' 	=> $this->input->post('job_id'),
			'procedure_date' 	=> $this->input->post('procedure_date'),
		);
		//( $data);
		//die();
		$query = $this->db->insert('procedures',$data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	//استرجاع بيانات الحركات على الحرفة
	public function get_procedure(){
		$query = $this->db->get("procedures");
		return $query->result();
	}




	public function get_invoice_info($id=0)
	{
		$query =$this->db->select('*')
			->from('subscribers')
			->where('subscribers.id', $id)
			//->join('procedures', 'procedures.file_number ='.$file_number)
			->get();
		if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return $query->result_array();
		}
	}

	public function get_annual_tax($job_code=0)
	{
		$query =$this->db->select('*')
			->from('annual_tax')
			->where('annual_tax.id', $job_code)
			->get();
		if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return $query->result_array();
		}
	}


	function update_subscriber($id)
	{
		$data = array(
			'cust_name' 		=> $this->input->post('cust_name'),
			'card_id' 		=> $this->input->post('card_id'),
			'profession_name' 		=> $this->input->post('profession_name'),
			'job_code' 		=> $this->input->post('job_code'),
			'job_name' 		=> $this->input->post('job_name'),
			'job_status' 		=> $this->input->post('job_status'),
			'cust_address' 	=> $this->input->post('cust_address'),
			'profession_address' => $this->input->post('profession_address'),
			'mobile' 	=> $this->input->post('mobile'),
			'openFile_date' 	=> $this->input->post('openFile_date'),
			'file_num' 	=> $this->input->post('file_num'),
			'street_No' 	=> $this->input->post('street_No'),
			'building_No' 	=> $this->input->post('building_No'),
		);

		$this->db->where('id', $id);
		$query = $this->db->update('subscribers', $data);

		if($query){
			return true;
		} else {
			return false;
		}
	}


}
