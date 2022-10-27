<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

 public function __construct()
       {

           parent::__construct();
             $this->load->helper('date');
		   $this->load->helper('url');
		   $this->load->helper('string');
		   $this->load->helper('form');
		  $this->load->model('users_m');
		  $this->load->library('session');
		  $this->load->library('form_validation');

		
     }
	   
	   
	public function index()
	{
		$data['pagename'] = 'login_form';
		$data['titlename'] = 'برنامج الحرف والمهن والصناعات ';

        $this->load->view('login_form');

	}

	


	/*public function login_form(){


	        	// Get username
				$user_name = $this->input->post('user_name');
				// Get and encrypt the password
				$password = $this->input->post('password');


				
				$user_id = $this->users_m->getUser_id($user_name, $password);
			 // $dep_id=$this->users_m->get_dep_id($user_name, $password);

	     //    $mun_id=$this->users_m->getMun_id($user_name, $password);

			//	$dep_id =  $this->users_m->login($user_name, $password)['dep_id'];
				//var_dump($user_id);die();
				// Login user
				$this->users_m->login($user_name , $password);
				


				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'user_name' => $user_name,
						'password' => true,
						'dep_id' => $dep_id,
						'mun_id' => $mun_id
					);

					 var_dump($user_data);die();
					
					$this->session->set_userdata($user_data);
					//$this->session->set_flashdata('user_loggedin', 'You are now logged in');
                    $this->session->set_flashdata(array("type"=>"success","msg"=>'You are now logged in'));
					redirect('Court_c');
					} else {
					// Set message
					//$this->session->set_flashdata('login_failed', 'Login is invalid');
                    $this->session->set_flashdata(array("type"=>"error","msg"=>'Login is invalid'));
					redirect('users');
				}		

	
			}*/

			public function login_form(){
	// Get username
	$user_name = $this->input->post('user_name');
	// Get and encrypt the password
	$password = $this->input->post('password'); 
	
	// Login user
	$is_login = $this->users_m->login($user_name , $password); 

	if($is_login){
		// Create session
		$user_data = array(
			'user_id'	=> $is_login->user_id,
			'user_name' => $is_login->user_name
		);

		/*
			var_dump($is_login); 
			die();
		*/
		$this->session->set_userdata($user_data);
		//$this->session->set_flashdata('user_loggedin', 'You are now logged in');
		$this->session->set_flashdata(array("type"=>"success", "msg"=>'You are now logged in'));
		redirect('jobs_c');
	} else {
		// Set message
		//$this->session->set_flashdata('login_failed', 'Login is invalid');
		$this->session->set_flashdata(array("type"=>"error","msg"=>'Login is invalid'));
		redirect('users');
	}  
}


		

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_name');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('users');
			
		}





































	}
/* End of file users.php */
/* Location: ./application/controllers/welcome.php */
?>
