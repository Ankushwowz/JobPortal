<?php
class Job_Model extends CI_Model{

   // Get Job Type
	function jobType(){
		$query = $this->db->get('job_type');
		return $query->result_array();
	}
	// Get Job Category
	function jobCategory(){
		$query = $this->db->get('category');
		return $query->result_array();
	}
	function createJob($uploadFile){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'job_title' => $this->input->post('job_title'),
						'user_id' => $user_ID,
						'job_type' => $this->input->post('job_type'),
						'job_category' => $this->input->post('job_category'),
						'job_amount' => $this->input->post('job_amount'),
						'job_description' => $this->input->post('job_description'),
						'job_file' => $uploadFile,
						'created_at' => date('Y-m-d H:i:s')
						
					);
	    $this->db->insert('job', $data);
		$jobID =  $this->db->insert_id();
		
		if(!empty($_POST['skill_array'])){
			$_POST['skill_array'] = explode(',',$_POST['skill_array']);
			foreach($_POST['skill_array'] as $skill_array){
			$data = array(
			'job_id' => $jobID,
			'user_id' => $user_ID,
			'skill_id' =>$skill_array ,
			'created_at' => date('Y-m-d H:i:s')

			);
			  $this->db->insert(' job_skill', $data);
			}
			
		}
		return $jobID;
	}
	// Get Job Type
	function jobList(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('category.category_name,job_type.job_type_name,job.*');
		//$this->db->where('user_id',$user_ID);
		$this->db->from('job');
		$this->db->join('category', 'category.category_id = job.job_category');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		$this->db->where('job.user_id', $user_ID);
		$query=$this->db->get();
		return $query->result_array();
	}
	 // Get Jobs
	function getJobsById($id){
		$Job_Id = base64_decode($id);
		$this->db->select('category.category_name,job_type.job_type_name,job.*');
		$this->db->where('job.job_id',$Job_Id);
		$this->db->from('job');
		$this->db->join('category', 'category.category_id = job.job_category');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
	    $query=$this->db->get();
		return $query->row_array();
	}
	//Edit Job
	function EditJob($uploadFile,$id){
		$Job_Id = base64_decode($id);
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
			$data = array(	'job_title' => $this->input->post('job_title'),
						'job_type' => $this->input->post('job_type'),
						'job_category' => $this->input->post('job_category'),
						'job_amount' => $this->input->post('job_amount'),
						'job_description' => $this->input->post('job_description'),
						'job_file' => $uploadFile
					);
		 $this->db->where('job_id', $Job_Id);
		return  $this->db->update('job', $data);
	}
	//Delete Job
	function deleteJob(){
		$jobID = $this->input->post('jobID');
		$this->db->where('job_id', $jobID);
		return $this->db->delete('job');
	}
	// Get Jobs
	function getJobs(){
		$this->db->select('category.category_name,job_type.job_type_name,job.*');
		$this->db->from('job');
		$this->db->join('category', 'category.category_id = job.job_category');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		if(!empty($_GET['q'])){
			//$where = "job.job_title LIKE '%".$_GET['q']."%'";
			$where =  " MATCH (job.job_title,job.job_description) AGAINST ('".$_GET['q']."' IN NATURAL LANGUAGE MODE)";
			$this->db->where($where);
		}
		$this->db->where('job.status', 'A');
		$this->db->where('job.project_status', '0');
		if(!empty($_GET['c'])){ $this->db->where('job.job_category',$_GET['c']); }
		if(!empty($_GET['jt'])){ $this->db->where_in('job.job_type', $_GET['jt']); }
		if(!empty($_GET['s']) && $_GET['s']=='asc'){ $this->db->order_by("job.job_id", "asc");}
		if(!empty($_GET['s']) && $_GET['s']=='desc'){ $this->db->order_by("job.job_id", "desc");} 
		if(!empty($_GET['s']) && $_GET['s']=='rand'){ $this->db->order_by("job.job_id", "RANDOM"); }
		$this->db->order_by("job_id", "desc");
		$query=$this->db->get();
		return $query->result_array();
			//echo $this->db->last_query();
		//die();
	}
	//Add Skills
	function addSkills(){
		if($this->input->post('skillID')==0){
			$skill_name = ucfirst(strtolower($this->input->post('addSkill')));
			$skillData = array( 'skill_name' => $skill_name );
			$this->db->insert('skills', $skillData);
			$skillID =  $this->db->insert_id();			
		}else{
			$skillID = $this->input->post('skillID');
		}
		
	$query = $this->db->where('skill_id',$skillID)->get('skills');
	return $result = $query->row_array();	
	}
	// Get Job Skills
	function JobSkills($id){
		$Job_Id = base64_decode($id);
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('skills.skill_name,job_skill.*');
		$this->db->from('job_skill');
		$this->db->join('skills', 'skills.skill_id = job_skill.skill_id');
		//$this->db->where('job_skill.user_id', $user_ID);
		$this->db->where('job_skill.job_id', $Job_Id);
		$query=$this->db->get();
		return $query->result_array();
	}
	//Delete skill
	function deletesJobskill(){
		$skillID = $this->input->post('skillID');
		$this->db->where('job_skill_id', $skillID);
		return $this->db->delete('job_skill');
	}
	//Add Skills
	function editSkills(){
		if($this->input->post('skillID')==0){
			$skill_name = ucfirst(strtolower($this->input->post('addSkill')));
			$skillData = array( 'skill_name' => $skill_name );
			$this->db->insert('skills', $skillData);
			$skillID =  $this->db->insert_id();			
		}else{
			$skillID = $this->input->post('skillID');
		}
		
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$job_id = $this->input->post('jobid');
		
		$data = array(
						'user_id' => $user_ID,
						'job_id' => $job_id,
						'skill_id' => $skillID,
						'created_at' => date('Y-m-d')
					);
	$this->db->insert('job_skill', $data);
	
	$this->db->select('job_skill.*,skills.skill_name');
	$this->db->from('job_skill');
	$this->db->join('skills', 'skills.skill_id = job_skill.skill_id');
	$this->db->where('job_skill.user_id', $user_ID);
	$this->db->where('job_skill.job_id', $job_id);
	$query=$this->db->get();
	$result = $query->result_array();

	$html ='<div id="skill-div"><ul class="items-list" id="skill-div-ul">';
	foreach($result as $result){
		$html .='<li id="jobsskill_'.$result['job_skill_id'].'"><span class="title">'.$result['skill_name'].'</span> <span class="delete-lan delete-icon-btn"><i class="fa fa-trash job-delete-skill" rel="'.$result['job_skill_id'].'"></i></span></li>';
		
	}
	$html .='</ul></div>';
	return $html;
	
	}
	//Add ApplyJob
	function ApplyJob($id){
	$Job_Id = base64_decode($id);
	$UserData = $this->session->userdata('Session_data');
	$user_ID = $UserData['id'];
	$description = $this->input->post('description');
	$data = array( 
			'user_id' => $user_ID,
			'job_id' => $Job_Id,
			'description' => $description,
			'created_at' => date('Y-m-d h:i:s')
	);
	return $this->db->insert('apply_job', $data);
	}
	
	// Get applyJobsCountByUser
	function applyJobsCountByUser($id){
		$Job_Id = base64_decode($id);
	
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->where('user_id',$user_ID);
		$this->db->where('job_id',$Job_Id);
		$query = $this->db->get('apply_job');
		return $query->num_rows();
		
	}
	// Get Job Reswponse
	function getResponseJobs(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('apply_job.*,COUNT(apply_job.user_id) as total,job.job_id as jobID,job.job_title,job.job_amount,job.user_id,category.category_name');
		$this->db->group_by('apply_job.job_id'); 
		$this->db->order_by('apply_job.apply_job_id', 'desc'); 
	    $this->db->join('job', 'job.job_id = apply_job.job_id','left');  
	    $this->db->join('category', 'category.category_id =job.job_category','left');  
	   
	    $this->db->having('job.user_id',$user_ID);
		$query = $this->db->get('apply_job');
		return $query->result_array();
		//echo $this->db->last_query();
		//die();
	}
	// Get Particular Response Jobs
	function viewParticularResponseJobs($id){
		$Job_Id = base64_decode($id);
		$data = array(	'status' => '1');
		$this->db->where('job_id', $Job_Id);
		$this->db->update('apply_job', $data);
		
		
		
		
		$this->db->select('job.job_title,apply_job.*,users.fullname,users.image,users.user_availability,users.hourly_rate,users.user_experience,job_type.job_type_name');
		$this->db->from('apply_job');
		$this->db->join('job', 'job.job_id = apply_job.job_id');
		$this->db->join('users', 'users.id = apply_job.user_id');
		$this->db->join('job_type', 'job_type.job_type_id = users.user_availability');
		$this->db->where('apply_job.job_id', $Job_Id);
		$query=$this->db->get();
		return $result = $query->result_array();
		
	
	}
	//Applied Jobs
	function getAppliedJobs(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('job.*,apply_job.description,apply_job.created_at,category.category_name');
		$this->db->from('apply_job');
		$this->db->join('job', 'job.job_id = apply_job.job_id');
		$this->db->join('category', 'category.category_id =job.job_category');  	
		$this->db->where('apply_job.user_id', $user_ID);
		$query=$this->db->get();
		return $query->result_array();
	}
	// Get Job Count
	function jobsPosted(){
		$query = $this->db->get('job');
		return $query->num_rows();
	}
	
	// Get HomeCategory
	function getHomeCategory(){
		$this->db->select('COUNT(job.job_category) as jobtotal,category.category_id,category.category_name,category.image,job.*');
		$this->db->group_by('category.category_id'); 
		$this->db->join('job', 'category.category_id=job.job_category','left');  		
		$query = $this->db->get('category');
		return $query->result_array();
		
	}
	// Get Home RecentJobs
	function getRecentJobs($page){
		$array = array();
		$limit = 10;
		$GetJobsQuery = "select * from job";
		$queryCount =$this->db->query($GetJobsQuery)->num_rows();
		if($queryCount >0){
			$numPages = ceil($queryCount/$limit);
		}
		
		$offset = $limit*($page-1);
		$sql ="SELECT `category`.`category_name`, `job_type`.`job_type_name`, `job`.* FROM `job` JOIN `category` ON `category`.`category_id` = `job`.`job_category` JOIN `job_type` ON `job_type`.`job_type_id` = `job`.`job_type` WHERE `job`.`status` = 'A' ORDER BY `job`.`job_id` DESC LIMIT $offset ,$limit";
		$query['recentJob'] =$this->db->query($sql)->result_array();
		$array['numPages'] =$numPages;
		return array_merge($query,$array);
	}
	function replyUser(){
		$Job_Id = base64_decode($this->input->post('job_id'));
		$to_ID = base64_decode($this->input->post('user_id'));
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'from_id' => $user_ID,
						'to_id' => $to_ID,
						'job_id' => $Job_Id,
						'message' => $this->input->post('reply_message'),
						'created_at' => date('Y-m-d H:i:s')
					);
	    $this->db->insert('messages', $data);
		return $last_id =  $this->db->insert_id();
	}
	function counter_replay($jobid,$id){
		$job_ID = base64_decode($jobid);
		$to_ID = base64_decode($id);
		$this->db->where('job_ID',$job_ID);
		$this->db->where('to_id',$to_ID);
		$query=$this->db->get('messages');
		return $query->num_rows();
	}
	function already_assign_job($jobid,$id){
		$job_ID = base64_decode($jobid);
		$candidate_id = base64_decode($id);
		$this->db->where('project_id',$job_ID);
		
		//$this->db->where('job_status',3);
		$where ="(job_status=3 OR job_status=5)";
		$this->db->where($where);
		$query=$this->db->get('invite_user');
		return $query->num_rows();
	}
	function already_assign_job_user($jobid,$id){
		$job_ID = base64_decode($jobid);
		$candidate_id = base64_decode($id);
		$this->db->where('project_id',$job_ID);
		$this->db->where('candidate_id',$candidate_id);
		//$this->db->where('job_status',3);
		$where ="(job_status=3 OR job_status=5)";
		$this->db->where($where);
		$query=$this->db->get('invite_user');
		return $query->row_array();
	}
	
	function getFirstMessage(){
		$Job_Id = base64_decode($this->input->post('job_id'));
		$to_ID = base64_decode($this->input->post('user_id'));
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('description');
		$this->db->where('job_id',$Job_Id);
		$this->db->where('user_id',$to_ID);
		$query=$this->db->get('apply_job');
		$message = $query->row_array();

		$data = array(
						'from_id' => $to_ID,
						'to_id' => $user_ID,
						'job_id' => $Job_Id,
						'message' => $message['description'],
						'created_at' => date('Y-m-d H:i:s')
					);
	    $this->db->insert('messages', $data);
		return $last_id =  $this->db->insert_id();
	}
	
 }
?>