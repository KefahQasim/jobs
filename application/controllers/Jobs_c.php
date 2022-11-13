<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_c extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->helper('string');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('jobs_model');

			if(!$this->session->userdata('user_id')){
				redirect('users');
			}

	}

	public function index()
	{
		$data=array();
		$data['content'] = 'index';
		$data['TITLE'] = 'قسم الحرف والمهن والصناعات';
		$data['main_title'] = 'الخدمات الاكترونية';
		$data['sub_title'] = 'الحرف والمهن';
		$data['sub_of_title'] = 'الرئيسية';
		$this->load->view('templete',$data);
	}
	public function get_jobs( )
	{
		$jobs_name = $this->jobs_model->get_jobs();
		echo json_encode($jobs_name);
	}

	public function create_new_job()
	{
		$data=array();
		$data['pagename'] = 'new_job';
		$data['titlename'] = 'إضافة حرفة جديدة';
		$this->load->view('new_job',$data);
	}
	public function jobs_info()
	{
		$data=array();
		$data['TITLE'] = 'بيانات الحرفة والمكلفين';
		$data['content'] = 'add_subscriber';
		$data['jobsName']= $this->jobs_model->get_jobs();
		$data['procedurs']= $this->jobs_model->get_procedure();
		$data['main_title'] = 'الخدمات الاكترونية';
		$data['sub_title'] = 'الحرف والمهن';
		$data['sub_of_title'] = 'اضافة بيانات المكلفين والحرفة ';
		$this->load->view('templete',$data);
	}
	public function job_name()
	{
		$data['TITLE'] = 'أسماء الحرف والصناعات في دير البلح';
		$data['jobsName']= $this->jobs_model->get_jobs();
		$data['content'] = 'jobs_name';
		$data['main_title'] = 'الخدمات الاكترونية';
		$data['sub_title'] = 'الحرف والمهن';
		$data['sub_of_title'] = 'حرفة جديدة';
		$this->load->view('templete', $data);
	}

	public function viewJobInfo()
	{
		$data['TITLE'] = 'عرض بيانات المكلفين والحرف';
		$data['jobsinfo']= $this->jobs_model->get_jobs_info();
		$data['content'] = 'view_jobs_info';
		$data['main_title'] = 'الخدمات الاكترونية';
		$data['sub_title'] = 'الحرف والمهن';
		$data['jobs_name'] = $this->jobs_model->get_jobs();
		$data['sub_of_title'] = 'بيانات الحرف والمكلفين';
		$this->load->view('templete', $data);
	}

	public function invoice($id=0)
	{
		$data['TITLE'] = 'فاتورة الحرف والمهن والصناعات';
		$data['content'] = 'invoice';
		$data['main_title'] = '';
		$data['sub_title'] = '';
		//die(var_dump($file_number));
		//$file_number = $this->input->post('file_number');
		$data['invoceInfo']= $this->jobs_model->get_invoice_info($id);

		$job_name = $this->jobs_model->get_invoice_info($id);
		$data['taxInfo']= $this->jobs_model->get_annual_tax($job_name[0]['job_code']);

		//var_dump($data['invoceInfo']);die();
		$data['sub_of_title'] = '';
		//die(var_dump($data['invoceInfo'][0]['file_num']));
	//	$data['jobs_name'] = $this->jobs_model->get_jobs();
		$this->load->view('invoice_templete', $data);
	}

	public function store_new_job()
	{
		$this->load->model('jobs_model');
		$masseg= $this->jobs_model->add_new_job();
		if ($masseg == true)
			return redirect('jobs_c/job_name');
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}
	public function update_job($id)
	{
		$this->load->model('jobs_model');
		$masseg= $this->jobs_model->update_job($id);
		if ($masseg == true)
			return redirect('jobs_c/job_name');
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}
	public function delete_job($id)
	{
		$this->load->helper('url');
		$this->load->model('jobs_model');
		$masseg= $this->jobs_model->delete_job($id);
		if ($masseg == true)
			return redirect('jobs_c/job_name');
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}
	public function store_job_info()
	{
		$this->load->helper('url');
		$this->load->model('jobs_model');
		$masseg= $this->jobs_model->add_job_bill();
		if ($masseg == true)
			return redirect('jobs_c/viewJobInfo');
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}

	public function store_new_prosedure()
	{
		$this->load->model('jobs_model');
		$file_number = $this->input->post('file_number');
		$file_number1 = (int)$file_number;
		$id = $this->input->post('job_id');
		$procedure_type = $this->input->post('procedure_type');
		$masseg= $this->jobs_model->store_new_prosedure();
		if ($this->input->post('procedure_type') == "تجديد") {
			return redirect('jobs_c/invoice/'.$id);
		}
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}

	public function update_subscriber($id)
	{
		$this->load->model('jobs_model');
		$masseg= $this->jobs_model->update_subscriber($id);
		if ($masseg == true)
			return redirect('jobs_c/viewJobInfo');
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}

	public function delete_subscriber($id)
	{
		$this->load->helper('url');
		$this->load->model('jobs_model');
		$masseg= $this->jobs_model->delete_subscriber($id);
		if ($masseg == true)
			return redirect('jobs_c/viewJobInfo');
		elseif ($masseg == false)
			echo json_encode( "failed!!");
	}
}
