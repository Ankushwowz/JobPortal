<?php

class Stripe_model extends CI_Model{

	function createOrder($amount){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		//$amount  = $this->input->post('amount');
		$Job_Id = base64_decode($this->input->post('job_id'));
		$candidate_id = base64_decode($this->input->post('candidate_id'));
		
		$data = array(
						'job_id' => $Job_Id,
						'from_user_id' => $user_ID,
						'to_user_id' => base64_decode($this->input->post('candidate_id')),
						'amount' => $amount,
						'created_at' => date('Y-m-d H:i:s')
						
					);
					
	    $this->db->insert('orders', $data);
		$orderId =  $this->db->insert_id();
		if($orderId){$lastid= $orderId;}else{ $lastid= 0;}
		return $lastid;
	}
	
	function update_order($order_id,$transaction_id,$array_details){
		$data = array(	'transaction_id' => $transaction_id,
						'order_status' =>'1',
						'payment_details' =>json_encode($array_details)
					);
		 $this->db->where('order_id', $order_id);
		$this->db->update('orders', $data);

		//Update Project Status //
		$this->db->select('orders.job_id');
		$this->db->where('order_id', $order_id);
	    $query=$this->db->get('orders');
        $getResult =  $query->row_array();

        
	    $dataUpdate = array(
					'project_status' => '2'
					);
		$this->db->where('job_id', $getResult['job_id']);
		return $this->db->update('job', $dataUpdate);


	}

function getStripeData($user_ID){
	$this->db->select('stripe_key,stripe_secret');
	$this->db->where('id',$user_ID);
	$query = $this->db->get('users');
	return $query->row_array();
}


function getOdersByJobid($id){
	
	$jobid = base64_decode($id);
	$this->db->where('job_id',$jobid);
	//$this->db->where('transaction_id',$jobid);
	$query = $this->db->get('orders');
	return $query->row_array();
}
	

function createOrderForCandidate($amount,$orderId){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		//$amount  = $this->input->post('amount');
		$Job_Id = base64_decode($this->input->post('job_id'));
		$candidate_id = base64_decode($this->input->post('candidate_id'));
		//echo $orderId = base64_decode($orderid);
		$this->db->select('orders.*');
		$this->db->where('order_id',$orderId);
		$query = $this->db->get('orders');
		$getOrder = $query->row_array();
		$data = array(
						'admin_id' => $user_ID,
						'job_id' => $Job_Id,
						'employer_id' => $getOrder['from_user_id'],
						'candidate_id' => base64_decode($this->input->post('candidate_id')),
						'amount' => $amount,
						'created_at' => date('Y-m-d H:i:s')
						
					);
					
	    $this->db->insert('paymentby_admin_to_seller', $data);
		$orderId =  $this->db->insert_id();
		if($orderId){$lastid= $orderId;}else{ $lastid= 0;}
		return $lastid;
	}

	function update_order_by_admin($buyerOrderId,$order_id,$transaction_id,$array_details){
		$data = array(	'transactionId' => $transaction_id,
						
						'payment_info' =>json_encode($array_details)
					);
		 $this->db->where('paybyId', $order_id);
		$this->db->update('paymentby_admin_to_seller', $data);

		
         $data = array(
				'order_status' => '2'
				);
		$this->db->where('order_id', $buyerOrderId);
		return  $this->db->update('orders', $data);


	}

}
?>