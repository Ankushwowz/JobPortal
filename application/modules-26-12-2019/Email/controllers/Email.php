<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		$this->load->model("Email_model");
		$config = array(
			'protocol' => $this->config->item('protocol'), // 'mail', 'sendmail', or 'smtp'
			'smtp_host' => $this->config->item('smtp_host'), 
			'smtp_port' => $this->config->item('smtp_port'),
			'smtp_user' => $this->config->item('smtp_user'),
			'smtp_pass' => $this->config->item('smtp_pass'),
			'smtp_crypto' => $this->config->item('smtp_crypto'), //can be 'ssl' or 'tls' for example
			//'mailtype' => $this->config->item('mailtype'), //plaintext 'text' mails or 'html'
			'smtp_timeout' => $this->config->item('smtp_timeout'), //in seconds
			'charset' => $this->config->item('charset'),
			'wordwrap' => $this->config->item('wordwrap')
		);
	  $this->load->library('email', $config);

	}
	
	function registrationEmail($email,$subject, $message) {
		$from = $this->config->item('smtp_user');
		$to = $email;
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
     	$this->email->subject($subject);
		$this->email->message($message);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

		if ($this->email->send()) {
			// echo 'Your Email has successfully been sent.';
		} else {
			show_error($this->email->print_debugger());
		}
    }
	
	function registrationEmailTemplate($lastId) { 
		$data['lastId'] = $lastId;
        $this->load->view('email-verification.php',$data);           
	}
	
	public function verifyaccount($Id) { 
		$userId = base64_decode($Id);
		$result = $this->Email_model->verifyAccount($userId); 
		if($result){
		 $this->session->set_flashdata('success', 'You account has been verify successfully.Now you can login with your vaild credentials');	
		 redirect('login');
		}
	}
	function forgotEmailTemplate($pass) { 
		$data['password'] = $pass;
        $this->load->view('forgot-password.php',$data);           
	}
	
	
	
	
}