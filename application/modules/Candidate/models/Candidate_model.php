<?php
class Candidate_model extends CI_Model{
	// Get Candidates
	function getCandidates(){
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
		if(!empty($_GET['c'])){ $this->db->where('users.categoryID',$_GET['c']); }
		if(!empty($_GET['jt'])){ $this->db->where_in('users.user_availability	', $_GET['jt']); }
		if(!empty($_GET['ex'])){ $this->db->where_in('users.user_experience	', $_GET['ex']); }
		if(!empty($_GET['g'])){ $this->db->where_in('users.gender	', $_GET['g']); }
		
		$this->db->where('users.role', 1);
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
	// GET Candidate Education
	function candidateEducation($id){
		$this->db->select('education.*,countries.name as CountryName,');
		$this->db->from('education');
		$this->db->join('countries', 'countries.id = education.country_id');
		$this->db->where('education.user_id', $id);
		$query=$this->db->get();
		return $query->result_array();
	}
		
	// GET Candidate Language
	function  candidateLanguage($id){
		$this->db->select('user_language.*,language.language_name,language_level.language_name as language_level');
		$this->db->from('user_language');
		$this->db->join('language_level', 'language_level.languages_level_id = user_language.languageLevel_id');
		$this->db->join('language', ' language.language_id = user_language.languageID');
		$this->db->where('user_language.user_id', $id);
		$query=$this->db->get();
		return $query->result_array();
	}
	// GET Candidate Skill
	function  candidateSkill($id){
		$this->db->select('user_skills.*,skills_level.skill_level_name,skills.skill_name');
		$this->db->from('user_skills');
		$this->db->join('skills', 'skills.skill_id = user_skills.skill_id');
		$this->db->join('skills_level', ' skills_level.skill_level_id = user_skills.skill_level_id');
		$this->db->where('user_skills.user_id', $id);
		$query=$this->db->get();
		return $query->result_array();
	}
	// GET Candidate Certification
	function  candidateCertification($id){
		$this->db->where('certification.user_id', $id);
		$query=$this->db->get('certification');
		return $query->result_array();
	}
	// GET Candidate Portfolio
	function  CandidatePortfolio($id){
		$this->db->where('portfolio.user_id', $id);
		$query=$this->db->get('portfolio');
		return $query->result_array();
	}
	
	// GET invitation By Employer
	function  inviteByEmployer($JobStatus){
		$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		$role = $UserData['role'];
		$this->db->select('invite_user.*,job.job_id,job.job_title,job.job_amount,job.project_status,users.fullname,users.id,users.image,category.category_name,job_type.job_type_name');
		$this->db->from('invite_user');
		$this->db->join('job', 'job.job_id = invite_user.project_id');
		if($role==1){ $this->db->join('users', 'users.id = invite_user.employer_id');}
		if($role==2){ $this->db->join('users', 'users.id = invite_user.candidate_id');}
		$this->db->join('category', 'category.category_id = job.job_category');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		if($role==1){ $this->db->where('invite_user.candidate_id', $user_id);}
		if($role==2){$this->db->where('invite_user.employer_id', $user_id);}
		$this->db->where('invite_user.job_status', $JobStatus);
		$this->db->order_by("invite_user_id", "desc");
		$query=$this->db->get();
		return $query->result_array();
	}
	
	//Add ApplyJob
	function offerAcceptReject(){
	$UserData = $this->session->userdata('Session_data');
	$candidate_id = $UserData['id'];
	$project_id = $this->input->post('JobId');
	$data = array(
				'job_status' => $this->input->post('jobstatus')
				
				);
	$this->db->where('project_id', $project_id);
	$this->db->where('candidate_id', $candidate_id);
	return  $this->db->update('invite_user', $data);

	}
	//Complete Job By Candiate
	function completeJob(){
		$UserData = $this->session->userdata('Session_data');
		$candidate_id = $UserData['id'];
		$id = $this->input->post('ID');
		
		//Get Data For Message
		$this->db->select('users.fullname,users.id,users.image,invite_user.*');
		$this->db->from('invite_user');
		$this->db->where('invite_user_id', $id);
		$this->db->join('users', 'users.id = invite_user.employer_id');
		$queryMessage=$this->db->get();
		$DataResult = $queryMessage->row_array();
		$message =$DataResult['fullname']." has  assigned new job  .please check it";
		$created = date('Y-m-d h:i:s');
		$dataInsert = array(
				'from_id' => $DataResult['employer_id'],
				'to_id' => $DataResult['candidate_id'],
				'job_id' => $DataResult['job_id'],
				'message' => $message,
				'created_at' => $created
				);
	
         $this->db->insert('messages', $dataInsert);
		// End Here//
		
		$job_status = $this->input->post('job_status');
		$data = array(
					'job_status' => $job_status,
					'candidate_status' => 2
					);
		$this->db->where('invite_user_id', $id);
		///$this->db->where('candidate_id', $candidate_id);
		$result = $this->db->update('invite_user', $data);
		
		//Update Status On Job Table
		
		$dataUpdate = array(
					'project_status' => '1'
					);
		$this->db->where('job_id', $DataResult['project_id']);
		$this->db->update('job', $dataUpdate);
		
		if($result){ return 1;}else{return 0;}

	}
	
	//Read Status assign job
	function readJobStatus(){
		$UserData = $this->session->userdata('Session_data');
		$candidate_id = $UserData['id'];
		$role = $UserData['role'];
		$job_status = $this->input->post('job_status');
		if($role==1){
			$data = array(
					'candidate_status' => 3
					);
		$this->db->where('candidate_id', $candidate_id);
		}
		if($role==2){
			$data = array(
					'employe_status' => 2
					);
		$this->db->where('employer_id', $candidate_id);
		}
		
		$result = $this->db->update('invite_user', $data);
		if($result){ return 1;}else{return 0;}

	}
	
	
	function giveRatting(){
		$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		$role = $UserData['role'];
		$to_id = base64_decode($this->input->post('to_id'));
		$job_id = base64_decode($this->input->post('job_id'));
		$average_ratting = ($this->input->post('answer1') + $this->input->post('answer2') + $this->input->post('answer3') + $this->input->post('answer4'))/4;
		$data = array( 
				'from_id' => $user_id,
				'to_id' => $to_id,
				'job_id' => $job_id,
				'question1' => $this->input->post('answer1'),
				'question2' => $this->input->post('answer2'),
				'question3' => $this->input->post('answer3'),
				'question4' => $this->input->post('answer4'),
				'average_ratting' => $average_ratting,
				'general_feedback' => $this->input->post('general_feedback'),
				'created_at' => date('Y-m-d H:i:s')
			);
			if($role==1){
				$data['candidate_status'] =1;
				
					$dataUpdate = array(
					'candidate_status' => 1
					);
					$this->db->where('job_id', $job_id);
					$result = $this->db->update('ratting', $dataUpdate);
				}
			$result = $this->db->insert('ratting', $data);
			if($result){return 1;}else{return 0;}
	}
	
	function  getInviteUserById(){
		$id = base64_decode($this->uri->segment(3));
		$this->db->where('invite_user_id', $id);
		$query=$this->db->get('invite_user');
		return $query->row_array();
	}
	function  getrattingByUser($jobId){
		$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		$this->db->where('job_id', $jobId);
		$this->db->where('from_id', $user_id);
		$query=$this->db->get('ratting');
		return $query->num_rows();
	}
	function  getrattingById($jobId){
		$id = base64_decode($jobId);
		$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		$this->db->where('job_id', $id);
		$this->db->where('from_id', $user_id);
		$query=$this->db->get('ratting');
		return $query->row_array();
	}
	function  getrattingByCanUser($jobId){
		$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		$this->db->where('job_id', $jobId);
		$this->db->where('to_id', $user_id);
		$this->db->where('candidate_status', 0);
		$query=$this->db->get('ratting');
		return $query->num_rows();
	}
		function  ViewrattingByCanUser($jobId){
		$UserData = $this->session->userdata('Session_data');
		$user_id = $UserData['id'];
		$this->db->where('job_id', $jobId);
		$this->db->where('from_id', $user_id);
		$this->db->where('candidate_status', 1);
		$query=$this->db->get('ratting');
		return $query->num_rows();
	}
	function  CandidateProjectRatting($id){
		$this->db->select('ratting.*,job.job_id,job.job_title');
		$this->db->from('ratting');
		$this->db->join('job', ' job.job_id = ratting.job_id');
		$this->db->where('to_id', $id);
		$this->db->where('candidate_status', 1);
		$query=$this->db->get();
		return $query->result_array();
	}
	function readjobNotification($JobStatus){
	$UserData = $this->session->userdata('Session_data');
	$candidate_id = $UserData['id'];
	$data = array(
				'candidate_status' => 1
				);
	$this->db->where('job_status', $JobStatus);
	$this->db->where('candidate_id', $candidate_id);
	return  $this->db->update('invite_user', $data);

	}
	
	
		function resendJob(){
		$UserData = $this->session->userdata('Session_data');
		$candidate_id = $UserData['id'];
		$id = $this->input->post('ID');
		$job_status = $this->input->post('job_status');
		$data = array(
					'job_status' => $job_status,
					'candidate_status' => 0,
					'employe_status' => 0
					);
		$this->db->where('invite_user_id', $id);
		///$this->db->where('candidate_id', $candidate_id);
		$result = $this->db->update('invite_user', $data);
		if($result){ return 1;}else{return 0;}

	}
	
	function assigned_again(){
		$UserData = $this->session->userdata('Session_data');
		$candidate_id = $UserData['id'];
		$id = $this->input->post('ID');
		$job_status = $this->input->post('job_status');
		$data = array(
					'job_status' => $job_status,
					'candidate_status' => 2,
					'employe_status' => 1
					);
		$this->db->where('invite_user_id', $id);
		///$this->db->where('candidate_id', $candidate_id);
		$result = $this->db->update('invite_user', $data);
		if($result){ return 1;}else{return 0;}

	}
	
	function assign_job_by_response(){
		$UserData = $this->session->userdata('Session_data');
		$Empoyer_id = $UserData['id'];
		$candidate_id = base64_decode($this->input->post('UserId'));
		$job_id = base64_decode($this->input->post('job_id'));
		$job_status = $this->input->post('job_status');
		$created = date('Y-m-d h:i:s');
		
		
		$this->db->where('project_id', $job_id);
		$this->db->where('candidate_id', $candidate_id);
		$query=$this->db->get('invite_user');
		$countResult = $query->num_rows();
		if($countResult >0){
			$data = array(
					'job_status' => $job_status,
					'candidate_status' => 2,
					'employe_status' => 1
					);
		$this->db->where('candidate_id', $candidate_id);
		$this->db->where('project_id', $job_id);
		$result = $this->db->update('invite_user', $data);
		
		$dataUpdate = array(
					'project_status' => '1'
					);
		$this->db->where('job_id', $job_id);
		$this->db->update('job', $dataUpdate);
		
		if($result){ return 1;}else{return 0;}
		}else{
			$data = array(
					'employer_id' => $Empoyer_id,
					'candidate_id' => $candidate_id,
					'job_status' => $job_status,
					'project_id' => $job_id,
					'candidate_status' => 2,
					'employe_status' => 1,
					'created_at' => $created
					);
		$result = $this->db->insert('invite_user', $data);
		}
		
		if($result){ return 1;}else{return 0;}

	}
	
	function readcompleteJobStatus(){
		$UserData = $this->session->userdata('Session_data');
		$candidate_id = $UserData['id'];
		$role = $UserData['role'];
		$job_status = $this->input->post('job_status');
		if($role==1){
			$data = array(
					'candidate_status' => 4
					);
		$this->db->where('candidate_id', $candidate_id);
		}
		if($role==2){
			$data = array(
					'employe_status' => 3
					);
		$this->db->where('employer_id', $candidate_id);
		}
		
		$result = $this->db->update('invite_user', $data);
		if($result){ return 1;}else{return 0;}

	}
	
}
?>