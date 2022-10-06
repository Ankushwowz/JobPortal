<?php

class Paypal_model extends CI_Model{

	function getOrder($id){
		$this->db->select('orders.*,
			job.job_id,job.job_title,job.job_amount');
		$this->db->from('orders');
		$this->db->join('job', 'job.job_id = orders.job_id');
		
		$this->db->where('order_id',$id);
		$query=$this->db->get();
		return $query->row_array();
	}

	function businessEmail($user_ID){
	//load databse library
	  	$this->db->select('email,fullname,image,phoneNo,country,state,city,address,gender,tagline,description,user_availability,user_experience,categoryID,subcategoryID,hourly_rate,escrow_email,escrow_password,paypal_id');
		$this->db->where('id',$user_ID);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	function paymentByAdmin($orderId,$amount,$tx,$status,$paypalInfo){
	$UserData = $this->session->userdata('Session_data');
	$user_ID = $UserData['id'];
		//Get Orders//
		$this->db->select('orders.*');
		$this->db->where('order_id',$orderId);
		$query = $this->db->get('orders');
		$getOrder = $query->row_array();
		
		$created = date('y-m-d h:i:s');
			$dataInsert = array(
				'admin_id' => $user_ID,
				'employer_id' => $getOrder['from_user_id'],
				'candidate_id' => $getOrder['to_user_id'],
				'job_id' => $getOrder['job_id'],
				'amount' => $amount,
				'transactionId' => $tx,
				'status' => $status,
				'payment_info' => json_encode($paypalInfo),
				'created_at' => $created
				);
	
         $this->db->insert('paymentby_admin_to_seller', $dataInsert);

         $data = array(
				'order_status' => '2'
				);
		$this->db->where('order_id', $orderId);
		return  $this->db->update('orders', $data);
	}

	public function insertTransaction($data = array()){

		$data1 = array(
				'payment_info' => json_encode($data)
				);
            $insert = $this->db->insert('paymentby_admin_to_seller',$data1);
            return $insert?true:false;
        }
	
}
?>