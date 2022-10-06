<?php

class Administrator_model extends CI_Model{

    function admin_user(){

		$encrypt_password = md5($this->input->post('password')); 

		$this->db->select('id,email,role');

		$this->db->where('email', $this->input->post('email'));

		$this->db->where('password', $encrypt_password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {

			$userData = $result->row_array();

			$Session_data = array(

							"id" =>$userData['id'],
							"email" =>$userData['email'],
							"role" =>$userData['role']

					);			

			$this->session->set_userdata('Session_data',$Session_data);		

			return 1;

		}else{

			return 0;

		}	

	}


	function getAdmin(){

		$UserData = $this->session->userdata('Session_data');

		$user_ID = $UserData['id'];

		$this->db->select('email,fullname');

		$this->db->where('id',$user_ID);

		$query = $this->db->get('users');

		return $query->row_array();

	}
	
	public function getTotaljob(){
		$query = $this->db->get('invite_user');
		return $query->num_rows(); 
	}

	public function getAssignedjob(){
		$this->db->where('job_status',3);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}

	public function getCompletejob(){
		$this->db->where('job_status',5);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}

	public function getAcceptjob(){
		$this->db->where('job_status',1);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}

	public function getRejectjob(){
		$this->db->where('job_status',2);
		$query = $this->db->get('invite_user');
		return $query->num_rows();
	}


	public function rejectedJobs(){
		$this->db->select('invite_user.*,job_type.*,
			job.job_id,job.job_title,job.job_amount,JobcreatedBy.fullname as JobcreatedUser,RejectedBy.fullname as RejectedByUser');
		$this->db->from('invite_user');
		$this->db->join('job', 'job.job_id = invite_user.project_id');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		$this->db->join('users as JobcreatedBy', 'JobcreatedBy.id = invite_user.employer_id');
		$this->db->join('users as RejectedBy', 'RejectedBy.id = invite_user.candidate_id');
		$this->db->where('invite_user.job_status', 2);
		$query=$this->db->get();
		return $query->result_array();
	}



	public function completedJobs(){
		$this->db->select('invite_user.*,job_type.*,
			job.job_id,job.job_title,job.job_amount,JobcreatedBy.fullname as JobcreatedUser,CompletedBy.fullname as CompletedByUser');
		$this->db->from('invite_user');
		$this->db->join('job', 'job.job_id = invite_user.project_id');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		$this->db->join('users as JobcreatedBy', 'JobcreatedBy.id = invite_user.employer_id');
		$this->db->join('users as CompletedBy', 'CompletedBy.id = invite_user.candidate_id');
		$this->db->where('invite_user.job_status', 5);
		$query=$this->db->get();
		return $query->result_array();
	}

	public function assignedJobs(){
		$this->db->select('invite_user.*,job_type.*,
			job.job_id,job.job_title,job.job_amount,JobcreatedBy.fullname as JobcreatedUser,AssignedBy.fullname as AssignedByUser');
		$this->db->from('invite_user');
		$this->db->join('job', 'job.job_id = invite_user.project_id');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		$this->db->join('users as JobcreatedBy', 'JobcreatedBy.id = invite_user.employer_id');
		$this->db->join('users as AssignedBy', 'AssignedBy.id = invite_user.candidate_id');
		$this->db->where('invite_user.job_status', 3);
		$query=$this->db->get();
		return $query->result_array();
	}

public function get_alltransaction(){

		$this->db->select('orders.*,
			job.job_id,job.job_title,TransactionFrom.fullname as Fromuser,TransactionTo.fullname as Touser,TransactionTo.payment_mode as payment_mode');
		$this->db->from('orders');
		$this->db->order_by("order_id", "desc");
		$this->db->join('job', 'job.job_id = orders.job_id');
		$this->db->join('users as TransactionFrom', 'TransactionFrom.id = orders.from_user_id');
		$this->db->join('users as TransactionTo', 'TransactionTo.id = orders.to_user_id');
		$where ="orders.order_status='1' or orders.order_status='2'";
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result_array();
	}

	public function getUsers(){
	    $this->db->where('role!=','3');
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function user_delete($id){
		return $this->db->where('id', $id)->delete('users');			 
	}


	/* User Status Change Start Here*/

	public function change_status(){		 
		$userid = $this->input->post('userid');
		$statusid = $this->input->post('statusid');
		$data = array(
				'status' => $statusid					  
			 	    );
	    $this->db->where('id', $userid);
		return $this->db->update('users', $data);
	}
	
	/* User Status Change End Here*/


	/***** Add Category Start Here ******/

	public function AddCategory($post_image){
		$data = array(
						'category_name' => $this->input->post('category_name'),
						'image' => $post_image,
					);
		//echo "<pre>"; print_r($data); die;
		 //$this->db->where('id', $user_ID);
		return  $this->db->insert('category', $data);
	}

	public function getCategory(){
		$query = $this->db->get('category');
		return $query->result_array();
	}


	public function getSubCategory(){
		$this->db->select('*')->from('subcategory');
		$this->db->join('category', 'category.category_id = subcategory.category_id');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function category_delete($id){
		return $this->db->where('category_id', $id)->delete('category');			 
	}

	public function getSingleCategory($id){
		$query = $this->db->where('category_id',$id)->get('category');
		return $result = $query->row_array();
	}

	function EditCategory($post_image,$id){
		//$id = base64_decode($id);		
			$userData = array(
							'category_name' => $this->input->post('category_name'),							
							'image' => $post_image,							
						);
			$this->db->where('category_id',$id);
			return $this->db->update('category', $userData);

	}


	public function AddSubCategory(){
		$data = array(
						'category_id' => $this->input->post('category_name'),
						'subcategory_name' => $this->input->post('subcategory_name')
					);
		//echo "<pre>"; print_r($data); die;
		 //$this->db->where('id', $user_ID);
		return  $this->db->insert('subcategory', $data);
	}


	public function subcategory_delete($id){
		return $this->db->where('subcategory_id', $id)->delete('subcategory');			 
	}

	public function getSingleSubCategory($id){
		$query = $this->db->where('subcategory_id',$id)->get('subcategory');
		return $result = $query->row_array();
	}

	function EditSubCategory($id){
		//$id = base64_decode($id);		
			$userData = array(
							'category_id' => $this->input->post('category_name'),							
							'subcategory_name' => $this->input->post('subcategory_name')							
						);
			$this->db->where('subcategory_id',$id);
			return $this->db->update('subcategory', $userData);

	}	

	/***** Add Category End Here ******/

   /*******Add About Us Page *******************/
   public function AddPage(){
		$data = array(
						'page_title' => $this->input->post('page_title'),
						'description' => $this->input->post('description')
					);
		return  $this->db->insert('page_contents', $data);
	}

	public function getPages(){
		$query = $this->db->get('page_contents');
		return $query->result_array();
	}

	public function page_delete($id){
		return $this->db->where('id', $id)->delete('page_contents');			 
	}

	public function getSinglePage($id){
		$pageid = base64_decode($id);
		$query = $this->db->where('id',$pageid)->get('page_contents');
		return $result = $query->row_array();
	}

	public function EditPage($id){
		$pageid = base64_decode($id);		
			$pageData = array(
							'page_title' => $this->input->post('page_title'),
							'description' => $this->input->post('description')
						);
			$this->db->where('id',$pageid);
			return $this->db->update('page_contents', $pageData);

	}

   /*******Add About Us Page *******************/

    /*******Add Skills *******************/
   public function AddSkills(){
		$data = array(
						'skill_name' => $this->input->post('skill_name')
					);
		return  $this->db->insert('skills', $data);
	}
  

	public function getSkills(){
		$query = $this->db->get('skills');
		return $query->result_array();
	}

	public function skill_delete($id){
		return $this->db->where('skill_id', $id)->delete('skills');			 
	}

	public function getSingleSkill($id){
		$skillid = base64_decode($id);
		$query = $this->db->where('skill_id',$skillid)->get('skills');
		return $result = $query->row_array();
	}

	public function EditSkill($id){
		$skillid = base64_decode($id);		
			$skillData = array(
							'skill_name' => $this->input->post('skill_name')
						);
			$this->db->where('skill_id',$skillid);
			return $this->db->update('skills', $skillData);

	}

   /*******Add Skills End *******************/

   /************ Add Language Start ******/
   public function AddLanguage(){
		$data = array(
						'language_name' => $this->input->post('language_name')
					);
		return  $this->db->insert('language', $data);
	}

	public function getLanguages(){
		$query = $this->db->get('language');
		return $query->result_array();
	}

	public function language_delete($id){
		return $this->db->where('language_id', $id)->delete('language');			 
	}


	public function getSingleLanguage($id){
		$languageid = base64_decode($id);
		$query = $this->db->where('language_id',$languageid)->get('language');
		return $result = $query->row_array();
	}

	public function EditLanguage($id){
		$languageid = base64_decode($id);		
		$languageData = array(
							'language_name' => $this->input->post('language_name')
						);
			$this->db->where('language_id',$languageid);
			return $this->db->update('language', $languageData);

	}
   /************ Add Language End ******/

   /********Jobs Start Here********/

   public function getjobs(){
   		$this->db->select('job.*,users.fullname,job_type.job_type_name,category.category_name');
   		$this->db->from('job');
		$this->db->join('users', 'users.id = job.user_id');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		$this->db->join('category', 'category.category_id = job.job_category');
		$query = $this->db->get();
		return $query->result_array();
   }


   public function viewjob($id){
	   	$jobid = base64_decode($id);
	  	$this->db->select('job.*,users.fullname,job_type.job_type_name,category.category_name');
   		$this->db->from('job');
		$this->db->join('users', 'users.id = job.user_id');
		$this->db->join('job_type', 'job_type.job_type_id = job.job_type');
		$this->db->join('category', 'category.category_id = job.job_category');
		$this->db->where('job.job_id',$jobid);
		$query=$this->db->get();
		return $result = $query->row_array();
   }

   /********Jobs End Here********/

   /* Job Status Change Start Here*/

	public function Change_Jobstatus(){		 
		$jobid = $this->input->post('jobid');
		$jobstatusid = $this->input->post('jobstatusid');
		$jobdata = array(
				'status' => $jobstatusid					  
			 	    );
	    $this->db->where('job_id', $jobid);
		return $this->db->update('job', $jobdata);
	}
	
	/* Job Status Change End Here*/
	
	//Escrow Setting
	function escrowSetting(){
		$UserData = $this->session->userdata('Session_data');
		//echo "<pre>"; print_r($UserData); die;
		$user_ID = $UserData['id'];
		$data = array(
						'escrow_email' => $this->input->post('escrow-email'),
						'escrow_password' => $this->input->post('escrow-pass')
						
					);
		 $this->db->where('id', $user_ID);
		return  $this->db->update('users', $data);
	}



}



?>