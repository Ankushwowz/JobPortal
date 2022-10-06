<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paypal extends MX_Controller {
	public function __construct() {
			parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->library('form_validation');
		Modules::run('Job/Job_model');
	   //$this->load->module("dashboard");
		Modules::run('Administrator/Administrator_model');
		$this->load->library('paypal_lib');
		$this->load->model("Paypal_model");

	}


 public function payment($id){

 		$order_id = base64_decode($id);
 		$data['user'] = $this->Administrator_model->getAdmin();
 		$getOrder = $this->Paypal_model->getOrder($order_id);
        $businessEmail = $this->Paypal_model->businessEmail($getOrder['to_user_id']);

        //Set variables for paypal form
        $returnURL = base_url().'payment/success'; //payment success url
        $cancelURL = base_url().'payment/cancel'; //payment cancel url
        $notifyURL = base_url().'payment/ipn'; //ipn url
        $userID = 1; //admin id
        $logo = base_url().'assets/images/codexworld-logo.png';
        $this->paypal_lib->add_field('business',$businessEmail['paypal_id']);
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Payment of this ".$getOrder['job_title']);
        $this->paypal_lib->add_field('custom', $order_id);
         
        $this->paypal_lib->add_field('item_number', "1");
        $this->paypal_lib->add_field('amount',  $getOrder['job_amount']);  
        $this->paypal_lib->add_field('notify_url', $notifyURL);      
        //$this->paypal_lib->image($logo);
        
        //$this->paypal_lib->paypal_auto_form();
          if(!empty($businessEmail['paypal_id'])){
         $this->paypal_lib->paypal_auto_form();   
     }else{
        $this->session->set_flashdata('danger', 'admin have not paypalid of this candidate');
        redirect('orders');
     }
       
    }


	 function success(){
	 	
            //get the transaction data

           $data['user'] = $this->Administrator_model->getAdmin();
            $paypalInfo = $_REQUEST;
             $data['item_number'] = $paypalInfo['item_number']; 
            $txn_id= $paypalInfo["txn_id"];
            $payment_amt= $paypalInfo["payment_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $status = $paypalInfo["payment_status"];
            $orderid = $paypalInfo['custom'];
            $result = $this->Paypal_model->paymentByAdmin($orderid,$payment_amt,$txn_id,$status,$paypalInfo);
            
            //pass the transaction data to view
            //$this->load->view('paypal/success', $data);
            $data['txn_id'] = $txn_id;
            $data['main_content'] = 'success';
			$this->load->view('backend/backend-admin-layout.php', $data);
         }
         
         function cancel(){
         	$data['user'] = $this->Administrator_model->getAdmin();
         	$data['main_content'] = 'cancel';
			$this->load->view('backend/backend-admin-layout.php', $data);
            //$this->load->view('paypal/cancel');
            //die('fff');
         }
         
         function ipn(){
            //paypal return transaction details array
            $paypalInfo    = $this->input->post();
            
            $data['user_id'] = $paypalInfo['custom'];
            $data['product_id']    = $paypalInfo["item_number"];
            $data['txn_id']    = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["payment_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status']    = $paypalInfo["payment_status"];

            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            
            //check whether the payment is verified
            if(preg_match("/VERIFIED/i",$result)){
                //insert the transaction data into the database
               // $this->product->insertTransaction($data);

                $result = $this->Paypal_model->insertTransaction($data);
            }
        }
}