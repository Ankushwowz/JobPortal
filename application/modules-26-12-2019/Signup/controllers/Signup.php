<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends MX_Controller {	public function __construct() {	parent::__construct();	$this->load->library("session");	$this->load->helper('url');	$this->load->library('form_validation');	$this->load->model("Signup_model");			}
	
	/**********Signup user ***************/
	public function index(){	
		if(!empty($_POST['Signup'])){			$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|is_unique[users.email]', 			array(
                //'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.please try other email id'
        ));
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('index');
			}else{				$lastId = $this->Signup_model->create();				if($lastId){					$data['lastId'] = $lastId;					$subject ="Email Verifation";					$htmltemplate = modules::run("Email/registrationEmailTemplate",$data['lastId']);											modules::run('Email/registrationEmail',$this->input->post('email'),$subject,$htmltemplate);					$this->session->set_flashdata('success', 'Thank you for registration. Please check your email to verify your account');					//$this->load->view('index');					redirect('login');
				}
			}			
		}else{
			$this->load->view('index');
		}
	}
		
	/********** End here*************************/
	
	
	
	
}
