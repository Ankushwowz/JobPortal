<?php

class Dashboard_model extends CI_Model{

	function getUser(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('email,fullname');
		$this->db->where('id',$user_ID);
		$query = $this->db->get('users');
		return $query->row_array();
	}


	function userOffileLine(){
	$UserData = $this->session->userdata('Session_data');
	$user_ID = $UserData['id'];
	$data = array(
			"lastloginstatus" =>0
	);
	$this->db->where('id', $user_ID);
	$this->db->update('users', $data);	
	}
	
	
	function active_job(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		if($role==2){
			$this->db->where('employer_id',$user_ID);
		}
		if($role==1){
			$this->db->where('candidate_id',$user_ID);
		}
		$this->db->where('job_status',4);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}
	function assigned_job(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		if($role==2){
			$this->db->where('employer_id',$user_ID);
		}
		if($role==1){
			$this->db->where('candidate_id',$user_ID);
		}
		$this->db->where('job_status',3);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}
	
	function total_job(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		$this->db->where('user_id',$user_ID);
		$query = $this->db->get('job');
		return $query->num_rows();
	}
	function completed_job(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		if($role==2){
			$this->db->where('employer_id',$user_ID);
		}
		if($role==1){
			$this->db->where('candidate_id',$user_ID);
		}
		$this->db->where('job_status',5);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}
	function accepted_job(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		if($role==2){
			$this->db->where('employer_id',$user_ID);
		}
		if($role==1){
			$this->db->where('candidate_id',$user_ID);
		}
		$this->db->where('job_status',1);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}
	function rejected_job(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		if($role==2){
			$this->db->where('employer_id',$user_ID);
		}
		if($role==1){
			$this->db->where('candidate_id',$user_ID);
		}
		$this->db->where('job_status',2);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}
   
   
   function get_transaction(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		$this->db->select('job.job_title,orders.*,users.fullname');
		//$this->db->where('user_id',$user_ID);
		$this->db->from('orders');
		$this->db->join('users', 'users.id = orders.to_user_id');
		$this->db->join('job', 'job.job_id = orders.job_id');
		if($role==2){
			$this->db->where('orders.from_user_id', $user_ID);
		}
		if($role==1){
			$this->db->where('orders.to_user_id', $user_ID);
		}
		$where = " order_status ='1' OR order_status='2'";
		$this->db->where($where);
		$this->db->order_by("order_id", "desc");
		$query=$this->db->get();
		return $query->result_array();
	}
	function get_transaction_candidate(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		$this->db->select('job.job_title,orders.*,users.fullname');
		//$this->db->where('user_id',$user_ID);
		$this->db->from('orders');
		$this->db->join('users', 'users.id = orders.from_user_id');
		$this->db->join('job', 'job.job_id = orders.job_id');
		$this->db->where('orders.to_user_id', $user_ID);
		$where = " order_status ='1' OR order_status='2'";
		$this->db->where($where);
		$this->db->order_by("order_id", "desc");
		$query=$this->db->get();
		return $query->result_array();
	}
   
   function userSwitch(){
	$UserData = $this->session->userdata('Session_data');
	$user_ID = $UserData['id'];
	$role = $UserData['role'];
	if($role==1){
		$newrole = '2';
	}
	if($role==2){
		$newrole = '1';
	}
	$data = array(
			"role" =>$newrole
	);
	$this->db->where('id', $user_ID);
	$update = $this->db->update('users', $data);	
	if($update){

		$this->db->select('id,role,email,status');
		$this->db->where('id', $user_ID);
		
		$result = $this->db->get('users');
		$userData = $result->row_array();

		if(!empty($userData['id'])){
				$Session_data = array(
						"id" =>$userData['id'],
						"role" =>$newrole,
						"email" =>$userData['email']
						

						
				);
		return $this->session->set_userdata('Session_data',$Session_data);
		}
	
	}
		
	}


public function paymentby_admin_to_seller($id){
	    $this->db->where('job_id',$id);
		$query = $this->db->get('paymentby_admin_to_seller');
		return $query->row_array();
	}

}
?>