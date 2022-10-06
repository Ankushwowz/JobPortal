<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		$this->load->model("Dashboard_model");
	}
	public function index(){
		//$this->load->view('index');
		if(!empty($this->session->userdata('Session_data'))){
			$data['main_content'] = 'index';
			$data['user'] =getUser();
			$data['total_job'] =$this->Dashboard_model->total_job();
			$data['active_job'] =$this->Dashboard_model->active_job();
			$data['assigned_job'] =$this->Dashboard_model->assigned_job();
			$data['completed_job'] =$this->Dashboard_model->completed_job();
			$data['accepted_job'] =$this->Dashboard_model->accepted_job();
			$data['rejected_job'] =$this->Dashboard_model->rejected_job();
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}else{
			redirect('');
		}
	}
	function logout() {
	    $result =$this->Dashboard_model->userOffileLine();
      
		//session_start(); 
		session_destroy();
		unset($_SESSION);
		//session_regenerate_id(true);
		redirect('');
     
	}
	function getState(){
		$state =getState();
		echo $state;
	}
	function getCity(){
		$city =getCity();
		echo $city;
	}
	public function order(){

		//$this->load->view('index');
		if(!empty($this->session->userdata('Session_data'))){
			$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		    
			$data['main_content'] = 'orders';
		    $data['user'] =getUser();
		    if($role==2){
		   	 $data['payment'] =$this->Dashboard_model->get_transaction();
		    }
		      if($role==1){
		   	 $data['payment'] =$this->Dashboard_model->get_transaction_candidate();
		    }
		   $this->load->view('frontend/frontend-admin-layout.php', $data);
		}else{
			redirect('');
		}
	}
	public function Messages(){
		//$this->load->view('index');
		if(!empty($this->session->userdata('Session_data'))){
			$data['main_content'] = 'message';
			$data['user'] =getUser();
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}else{
			redirect('');
		}
	}

	public function userSwitch(){
		
		if(!empty($this->session->userdata('Session_data'))){
			$this->Dashboard_model->userSwitch();
			redirect('dashboard');

		}else{
			redirect('');
		}
	}
}