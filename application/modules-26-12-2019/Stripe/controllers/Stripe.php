<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stripe extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		$this->load->model("Stripe_model");
		Modules::run('Job/Job_model');
		Modules::run('Administrator/Administrator_model');
	}
	public function index(){
      if(!empty($this->session->userdata('Session_data'))){
      	$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		 $role = $UserData['role'];

      	    $jobid = $this->uri->segment(2);
      	
			$data['main_content'] = 'index';
			$data['user'] =getUser();
			$data['jobamount'] =$this->Job_model->getJobsById($jobid);

			if($role==3){
				$userid = base64_decode($this->uri->segment(3));
				$data['stripe'] =$this->Stripe_model->getStripeData($userid);
				$data['orderid'] =$this->Stripe_model->getOdersByJobid($jobid);
                
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{
				
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}
			
		}else{
			redirect('');
		}
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost(){

		//$amount  = $this->input->post('amount');
		$carduserName =$this->input->post('userName');
		$Job_Id = base64_decode($this->input->post('job_id'));
		$candidate_id = base64_decode($this->input->post('candidate_id'));
		
		$jobDetails =$this->Job_model->getJobsById($this->input->post('job_id'));
        $amount =$jobDetails['job_amount'];
        $UserData = $this->session->userdata('Session_data');
		$role = $UserData['role'];
		if($role==3){
			    $orderid = base64_decode($this->input->post('orderid'));
				 $order_id =$this->Stripe_model->createOrderForCandidate($amount,$orderid);
		}else{
			 $order_id =$this->Stripe_model->createOrder($amount);
		}
       

		if($order_id >0){
			if($amount!=''){

			$stripe_secret =$this->input->post('stripe_secret_code');	

			require_once('application/libraries/stripe-php/init.php');
    if($role==3){
        \Stripe\Stripe::setApiKey($stripe_secret);
         $charge = \Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "USD",
                "source" => $this->input->post('stripeToken'),
                "description" => "Payment from getwork.global" ,
				 "metadata" => array("order_id" =>$order_id,'carduserName' => $carduserName)
				]);
			   $chargeJson = $charge->jsonSerialize();
					
     }else{
     	\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     	 $charge = \Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "USD",
                "source" => $this->input->post('stripeToken'),
                "description" => "Payment from getwork.global" ,
				 "metadata" => array("order_id" =>$order_id,'carduserName' => $carduserName)
				]);
			   $chargeJson = $charge->jsonSerialize();
					

     }
						 
				if($chargeJson!==''){
				     
				   	  $order_id_by_Payment = $chargeJson['metadata']['order_id'];
					  $array_details = array(
						'carduserName' =>$chargeJson['metadata']['carduserName'],
						'paid' =>$chargeJson['paid'],
						'payment_method' =>$chargeJson['payment_method'],
						'payment_method_details' =>$chargeJson['payment_method_details']
					
					);
					 if($order_id==$order_id_by_Payment){
						 $transaction_id= $chargeJson['balance_transaction'];
						  if($role==3){
						  	$buyerOrderId = base64_decode($this->input->post('orderid'));
						  	 $Result =$this->Stripe_model->update_order_by_admin($buyerOrderId,$order_id,$transaction_id,$array_details);
						  }else{
						  	 $Result =$this->Stripe_model->update_order($order_id,$transaction_id,$array_details);
						  }
						
						 if($Result){
							  //$this->session->set_flashdata('success', 'Payment made successfully.');
							 if($role==3){
							 	redirect('orders');
							 }else{
							 	redirect('order');
							 }
							  
						 }
					 }	
			   } else{
				   $this->session->set_flashdata('danger', 'Please enter amount1');
				   redirect('payment/'.base64_encode($this->input->post('job_id')).'/'.base64_encode($this->input->post('candidate_id')));
			   }


			}else{
				 $this->session->set_flashdata('danger', 'Please enter amount');
				redirect('payment/'.$this->input->post('job_id').'/'.$this->input->post('candidate_id'));
			}			   
		}else{
			
			redirect('payment/'.$this->input->post('job_id').'/'.$this->input->post('candidate_id'));
		}
		
		}
}