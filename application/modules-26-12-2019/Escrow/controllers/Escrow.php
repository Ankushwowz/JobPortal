<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escrow extends MX_Controller {
public function __construct() {
	parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		Modules::run('Job/Job_model');
		Modules::run('Profile/Profile_model');
		$this->load->model("Escrow_model");
	}
	

/**********CreateJob***************/

	public function createPayment($id){
	$data['main_content'] = 'create-payment';
	$data['user'] =getUser();
	$data['admin'] =getAdmin();
	$data['jobs'] =$this->Job_model->getJobsById($id);
	$data['payment'] =$this->Escrow_model->get_transaction($id);

	if(!empty($_POST['buyNow'])){
		
		  $this->form_validation->set_rules('amount', 'Amount', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				//Create Transaction 
		    	$adminemail =$data['admin']['escrow_email'];
				//$adminemail ="ramesh@wowzunited.com";
				$escrow_email =$this->input->post('escrow-email');
				$escrow_pass =$this->input->post('escrow-pass');
				$amount =$this->input->post('amount');
				if(!empty($data['user']['escrow_email']) &&  !empty($data['user']['escrow_password'])){
					$loginDetails = $data['user']['escrow_email'].':'.$data['user']['escrow_password'];
				}else{
					$loginDetails = "";
				}
				
				
						$curl = curl_init();
						curl_setopt_array($curl, array(
						CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction',
						CURLOPT_RETURNTRANSFER => 1,
						//CURLOPT_USERPWD => 'robin@wowzunited.com:Google2019wowz',
						//CURLOPT_USERPWD => 'harsh.wowz@gmail.com:Google2019wowz',
						CURLOPT_USERPWD => $loginDetails,
						CURLOPT_HTTPHEADER => array(
							'Content-Type: application/json'
						),
						CURLOPT_POSTFIELDS => json_encode(
						array(
						'currency' => 'usd',
						'items' => array(
						array(
							'description' => 'Payment By this account only '.$adminemail,
							'schedule' => array(
								array(
									'payer_customer' => 'me',
									'amount' => $amount,
									'beneficiary_customer' => $adminemail,
								),
							),
							'title' => 'Payment By this account',
							'inspection_period' => '259200',
							'type' => 'domain_name',
							'quantity' => '1',
						),
						),
						'description' => 'The sale of johnwick.com',
						'parties' => array(
						array(
							'customer' => 'me',
							'role' => 'buyer',
						),
							array(
								'customer' => $adminemail,
								'role' => 'seller',
							),
						),
						)
						)
						));

						$output = curl_exec($curl);
						$ResultData = json_decode($output);
						curl_close($curl);
						
						if(!empty($ResultData->id)){
							$jobid = $this->input->post('job_id');
							$transactionid = $ResultData->id;
							$result = $this->Escrow_model->createTransaction($jobid,$transactionid);
								redirect('escrow-transaction/'.base64_encode($this->input->post('job_id')).'/'.$transactionid);
						}
						else{
							$this->session->set_flashdata('danger', 'Escrow details are invaild Please add vaild escrow details <a href="'.base_url().'escrow-setting"><b style="color:#007bff;">Click to Add</b></a>');
							$this->load->view('frontend/frontend-admin-layout.php', $data);
						}
				
		    	//End Here
			}			
		}
		else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
	}
	public function escrowTransaction($jobid,$transactionid){
		$data['user'] =getUser();
		if(!empty($data['user']['escrow_email']) &&  !empty($data['user']['escrow_password'])){
			$loginDetails = $data['user']['escrow_email'].':'.$data['user']['escrow_password'];
		}else{
			$loginDetails = "";
		}
				
		$transactionID = $this->uri->segment(3);
		$jobID = $this->uri->segment(2);
		if(!empty($_POST['buyNow'])){
			
			if($_POST['payment_method']=='wire_transfer'){
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/'.$transactionID.'/payment_methods/'.$_POST['payment_method'],
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_USERPWD => $loginDetails,
					CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
					),
						CURLOPT_CUSTOMREQUEST => 'POST'
				));
				$output = curl_exec($curl);
				$GetResult = json_decode($output);
				
				
				//echo"<pre>";
				//print_r($GetResult);
				//die();
				if(!empty($GetResult->error)){
				   //$this->session->set_flashdata('danger', $GetResult->error);
					//redirect('escrow-transaction/'.$jobid.'/'.$transactionID );
					redirect('escrow-transaction/'.$jobid.'/'.$transactionID.'?v=1' );
				
				}else{
				
				  		$result = $this->Escrow_model->updateStatus($jobid,$transactionid);
						if($result){
						redirect('order');
						}

				}
				curl_close($curl);
				
			}
			
			if($_POST['payment_method']=='credit_card'){
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/'.$transactionID.'/payment_methods/'.$_POST['payment_method'],
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_USERPWD => $loginDetails,
					CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
					),
						CURLOPT_POSTFIELDS => json_encode(
							array(
								'return_url' => base_url().'order',
							)
						)
					));
				$output = curl_exec($curl);
				$GetResult = json_decode($output);
				
				//echo"<pre>";
				//print_r($GetResult);
				//die();
				if(!empty($GetResult->error)){
					//$this->session->set_flashdata('danger', $GetResult->error);
				    redirect('escrow-transaction/'.$jobid.'/'.$transactionID.'?v=1' );
				}
				if(!empty($GetResult->landing_page)){
					?>
					<script>window.location.href = "<?php echo $GetResult->landing_page;?>";</script>
					<?php 
				}
				curl_close($curl);
			}
			
			if($_POST['payment_method']=='paypal'){
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/'.$transactionID.'/payment_methods/'.$_POST['payment_method'],
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_USERPWD => $loginDetails,
					CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
					),
						CURLOPT_POSTFIELDS => json_encode(
							array(
								'return_url' => base_url().'order',
							)
						)
					));
				$output = curl_exec($curl);
				$GetResult = json_decode($output);
				
				
				if(!empty($GetResult->error)){
				//	$this->session->set_flashdata('danger', $GetResult->error);
			    	redirect('escrow-transaction/'.$jobid.'/'.$transactionID.'?v=1' );
				}
				
				if(!empty($GetResult->landing_page)){
					?>
					<script>window.location.href = "<?php echo $GetResult->landing_page;?>";</script>
					<?php 
				}
				
				curl_close($curl);
				
			}
		}else{
				
				if(!empty($this->uri->segment(3))){
				$transactionID = $this->uri->segment(3);
				
				$curlTrans = curl_init();
				curl_setopt_array($curlTrans, array(
				CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/'.$transactionID.'/payment_methods',
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_USERPWD => $loginDetails,
				CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
				),
				));

				$outputTrans = curl_exec($curlTrans);
				$ResultTrans = json_decode($outputTrans);
				curl_close($curlTrans);
				$data['ResultTrans'] =$ResultTrans;
				}
				
		}
		$data['main_content'] = 'create-transaction';
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	
	//User Escrow Setting
	public function escrowSetting(){
		$data['main_content'] = 'escrow-user-setting';
		$data['user'] =getUser();
		if(!empty($_POST['escrowSubmit'])){
			$this->form_validation->set_rules('escrow-email', 'Current Password', 'required');
			$this->form_validation->set_rules('escrow-pass', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				
				
				$result = $this->Profile_model->escrowSetting();
				if($result){
					$this->session->set_flashdata('success', 'Escrow details has been update successfully.');
				}
				$this->load->view('frontend/frontend-admin-layout.php', $data);
				redirect('escrow-setting');
			}			
		}else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
	}
	
}

