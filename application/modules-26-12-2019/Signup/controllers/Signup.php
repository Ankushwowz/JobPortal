<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends MX_Controller {
	
	/**********Signup user ***************/
	public function index(){
		if(!empty($_POST['Signup'])){
                //'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.please try other email id'
        ));
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('index');
			}else{
				}
			}			
		}else{
			$this->load->view('index');
		}
	}
		
	/********** End here*************************/
	
	
	
	
}