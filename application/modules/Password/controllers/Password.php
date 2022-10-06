<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends MX_Controller {public function __construct() {	parent::__construct();		$this->load->library("session");		$this->load->helper('url');		$this->load->helper('common');		$this->load->library('form_validation');		 $this->load->model("Password_model");	}
	/**********Signup user ***************/
	public function index(){	$data['main_content'] = 'index';	$data['user'] =getUser();	if(!empty($_POST['ChangePassword'])){			$this->form_validation->set_rules('current-password', 'Current Password', 'required');			$this->form_validation->set_rules('password', 'Password', 'required');			if($this->form_validation->run() === FALSE){				$this->load->view('frontend/frontend-admin-layout.php', $data);			}else{				$result = $this->Password_model->ChangePassword();				if($result==1){					$this->session->set_flashdata('success', 'password has been update successfully.');				}else{					$this->session->set_flashdata('danger', 'current password does not match with password');				}				$this->load->view('frontend/frontend-admin-layout.php', $data);			}					}else{			$this->load->view('frontend/frontend-admin-layout.php', $data);		}	}	
/********** End here*************************/}
