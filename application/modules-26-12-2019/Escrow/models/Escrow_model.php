<?php
class Escrow_Model extends CI_Model{

  
	function createTransaction($jobid,$transactionid){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'job_id' => $this->input->post('job_id'),
						'from_user_id' => $user_ID,
						'to_user_id' => base64_decode($this->input->post('user_id')),
						'transaction_id' => $transactionid,
						'amount' => $this->input->post('amount'),
						'created_at' => date('Y-m-d H:i:s')
						
					);
	    $this->db->insert('orders', $data);
		$orderId =  $this->db->insert_id();
		return $orderId;
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
			$this->db->where('orders.order_status', '0');
		}
		
		$this->db->order_by("order_id", "desc");
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function updateStatus($jobid,$transactionid){
	$UserData = $this->session->userdata('Session_data');
	$user_ID = $UserData['id'];
	$data = array(
	"order_status" =>'1'
	);
	$this->db->where('from_user_id', $user_ID['id']);
	$this->db->where('job_id', $jobid);
	$this->db->where('transaction_id', $transactionid);
	$this->db->update('orders', $data);	
	}
	
	
 }
?>