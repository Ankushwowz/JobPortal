<?php
class Employer_model extends CI_Model{
	// Get Candidates
	function getEmployers(){
		$this->db->select('category.category_name,job_type.job_type_name,users.id as userID,users.fullname,users.hourly_rate,users.image,users.tagline,countries.name as CountryName,subcategory.subcategory_name');
		$this->db->from('users');
		$this->db->join('category', 'category.category_id = users.categoryID','left');
		$this->db->join('subcategory', 'subcategory.subcategory_id = users.subcategoryID','left');
		$this->db->join('job_type', 'job_type.job_type_id = users.user_availability','left');
		$this->db->join('countries', 'countries.id = users.country','left');
		if(!empty($_GET['q'])){
			$where = "users.fullname LIKE '%".$_GET['q']."%'";
			$this->db->where($where);
		}
		if(!empty($_GET['l'])){ $this->db->where('users.country',$_GET['l']); }
		if(!empty($_GET['g'])){ $this->db->where_in('users.gender	', $_GET['g']); }
		
		$this->db->where('users.role', 2);
		if(!empty($_GET['s']) && $_GET['s']=='asc'){ $this->db->order_by("users.id", "asc");}
		if(!empty($_GET['s']) && $_GET['s']=='desc'){ $this->db->order_by("users.id", "desc");}
		if(!empty($_GET['s']) && $_GET['s']=='rand'){ $this->db->order_by("users.id", "RANDOM"); }
		$query=$this->db->get();
		return $query->result_array();
	}
	
	//Get Profile
	function viewProfile($id){
		$this->db->select('category.category_name,job_type.job_type_name,users.id as userID,users.fullname,users.hourly_rate,users.image,users.tagline,users.description,users.gender,users.user_availability,users.user_experience,users.hourly_rate,countries.name as CountryName,subcategory.subcategory_name');
		$this->db->from('users');
		$this->db->join('category', 'category.category_id = users.categoryID','left');
		$this->db->join('subcategory', 'subcategory.subcategory_id = users.subcategoryID','left');
		$this->db->join('job_type', 'job_type.job_type_id = users.user_availability','left');
		$this->db->join('countries', 'countries.id = users.country','left');
		$this->db->where('users.id', $id);
		$query=$this->db->get();
		return $query->row_array();
	}
	// send Invitation to Candidate
	function  sendInvitation(){
		
		$candidate_user_id = base64_decode($this->input->post('candidate_user_id'));
		$projectId = base64_decode($this->input->post('projectId'));
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		
		$this->db->where('employer_id',$user_ID);
		$this->db->where('project_id',$projectId);
		$this->db->where('candidate_id',$candidate_user_id);
		$query = $this->db->get('invite_user');
		$num_row = $query->num_rows();
		if($num_row > 0){
			return 1;
		}else{
			$data = array(
						'employer_id' => $user_ID,
						'candidate_id' => $candidate_user_id,
						'project_id' => $projectId,
						'created_at' => date('Y-m-d H:i:s')
						
					);
	      $result = $this->db->insert('invite_user', $data);
		  if($result){ return 2;}else{  return 3;}
		 
		}
	}
	
	// Get Invite UserFor Project
	function InviteUserForProject(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('invite_user.*,COUNT(invite_user.candidate_id) as total,job.job_id as jobID,job.job_title,job.job_amount,job.user_id,category.category_name');
		$this->db->group_by('invite_user.project_id'); 
		$this->db->order_by('total', 'desc'); 
	    $this->db->join('job', 'job.job_id = invite_user.project_id','left');  
	    $this->db->join('category', 'category.category_id =job.job_category','left');  		
		$this->db->having('job.user_id',$user_ID);
		$query = $this->db->get('invite_user');
		return $query->result_array();
		//echo $this->db->last_query();
		//die();
	}
	// Get Particular Response Jobs
	function viewInviteParticularResponseJobs($id){
		$Job_Id = base64_decode($id);
		$this->db->select('job.job_id,job.job_title,invite_user.*,users.fullname,users.image,users.user_availability,users.hourly_rate,users.user_experience,job_type.job_type_name');
		$this->db->from('invite_user');
		$this->db->join('job', 'job.job_id = invite_user.project_id');
		$this->db->join('users', 'users.id = invite_user.candidate_id');
		$this->db->join('job_type', 'job_type.job_type_id = users.user_availability','left');
		$this->db->where('invite_user.project_id', $Job_Id);
		$query=$this->db->get();
	     return $result = $query->result_array();
		//echo $this->db->last_query();
		//die();
	}
	
	function checkAssignCount($id){
		$Job_Id = base64_decode($id);
		$this->db->where('project_id', $Job_Id);
		$this->db->where('job_status',3);
		$query=$this->db->get('invite_user');
		return $NumRow = $query->num_rows();
	}
	function readInvitionProject(){
	$UserData = $this->session->userdata('Session_data');
	$user_id = $UserData['id'];
	$project_id = $this->input->post('JobId');
	$data = array('employe_status' => 1
				);
	
	$this->db->where('employer_id', $user_id);
	$where ="(job_status=1 OR job_status=2)";
	$this->db->where($where);
	return  $this->db->update('invite_user', $data);

	}


}
?>