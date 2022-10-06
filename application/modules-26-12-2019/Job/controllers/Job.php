<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends MX_Controller {
public function __construct() {
	parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		$this->load->model("Job_model");
	}
	
	public function jobList(){
		$data['main_content'] = 'index';
		$data['user'] =getUser();
		$data['JobsList'] =$this->Job_model->jobList();
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
/**********CreateJob***************/

	public function createJob(){
	$data['main_content'] = 'create_job';
	$data['user'] =getUser();
	$data['JobType'] =$this->Job_model->jobType();
	$data['JobCategory'] =$this->Job_model->jobCategory();
	if(!empty($_POST['postJob'])){
		  $this->form_validation->set_rules('job_title', 'Job Title', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				/*if(!empty($_FILES['userfile']["name"])){
					$ext = pathinfo($_FILES['userfile']["name"]);
					$fileName = rand().'-'.time().'.'.$ext['extension'];
					$_FILES['userfile']["name"]= 'job-post_'.$fileName;
					//Upload Image
					$config['upload_path'] = './assets/img/jobs/';
					$config['allowed_types'] = '*';
					$config['max_size'] = '2048';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						$data['error'] = $errors;
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$uploadFile = $_FILES['userfile']['name'];
					}
				}else{
					$uploadFile ='';
				}*/
				
				if(!empty($this->input->post('uploadfilesName'))){
					$uploadFile =$this->input->post('uploadfilesName');
				}
				else{
					$uploadFile ='';
				}
				
				$result = $this->Job_model->createJob($uploadFile);
		    	if($result){
					$this->session->set_flashdata('success', 'Job have been successfully posted.');
					redirect('viewjob/'.base64_encode($result));
				}
			}			
		}
		else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
	}
	
	
	public function editJob($id=NULL){
	$data['main_content'] = 'edit_job';
	$data['user'] =getUser();
	$data['JobType'] =$this->Job_model->jobType();
	$data['JobSkills'] =$this->Job_model->JobSkills($id);
	$data['JobCategory'] =$this->Job_model->jobCategory();
	$data['Jobs'] =$this->Job_model->getJobsById($id);
	if(!empty($_POST['postJob'])){
	
		  $this->form_validation->set_rules('job_title', 'Job Title', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				/*if(!empty($_FILES['userfile']["name"])){
					$ext = pathinfo($_FILES['userfile']["name"]);
					$fileName = rand().'-'.time().'.'.$ext['extension'];
					$_FILES['userfile']["name"]= 'job-post_'.$fileName;
					//Upload Image
					$config['upload_path'] = './assets/img/jobs/';
					$config['allowed_types'] = '*';
					$config['max_size'] = '2048';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						$data['error'] = $errors;
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$uploadFile = $_FILES['userfile']['name'];
					}
				}else{
					$uploadFile = $this->input->post('oldUploadFile');	
				}*/
				if(!empty($this->input->post('uploadfilesName'))){
					$uploadFile =$this->input->post('uploadfilesName');
				}
				else{
					$uploadFile =$this->input->post('oldUploadFile');
				}
				$result = $this->Job_model->EditJob($uploadFile,$id);
				if($result==1){
					$this->session->set_flashdata('success', 'job has been update successfully.');
				}
				redirect('manage-jobs');
			}			
		}
		else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
	}
	// Delete Job
    function deleteJob(){
		$result = $this->Job_model->deleteJob();
		echo $result;
	}
	//View Job
	public function viewjob($id=NULL){
		$data['main_content'] = 'view_job';
		$data['user'] =getUser();
		$data['Jobs'] =$this->Job_model->getJobsById($id);
		$data['JobSkills'] =$this->Job_model->JobSkills($id);
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	// Get all Jobs
	public function getJobs(){
		$data['user'] =getUser();
		$data['County'] =getCounty();
		$data['Category'] =getCategory();
		$data['jobs'] =$this->Job_model->getJobs();
		$data['JobType'] =jobType();
		$data['main_content'] = 'job-list';
		$this->load->view('frontend/layout.php', $data);
	}
	// Jon Details
	public function jobDetail($id=Null){
		$data['user'] =getUser();
		$data['Jobs'] =$this->Job_model->getJobsById($id);
		$data['JobSkills'] =$this->Job_model->JobSkills($id);
		$data['applyJobsCount'] =$this->Job_model->applyJobsCountByUser($id);
		$data['main_content'] = 'job-details';
		$this->load->view('frontend/layout.php', $data);
	}
	
	// Get Skills
	function addSkills(){
		$Skill =$this->Job_model->addSkills();
		echo json_encode($Skill);
	}
	// Delete Skills
    function deletesJobskill(){
		$result = $this->Job_model->deletesJobskill();
		echo $result;
	}
		// Edit Skills
	function editSkills(){
		$Skill =$this->Job_model->editSkills();
		echo $Skill;
	}
	// Apply Job
	public function jobApplyNow($id =NULL){
		$data['user'] =getUser();
		$data['Jobs'] =$this->Job_model->getJobsById($id);
		$data['main_content'] = 'job-apply-form';
		if(!empty($_POST['applyJobPost'])){
			$this->form_validation->set_rules('description', 'Description', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				$result = $this->Job_model->ApplyJob($id);
				if($result==1){
					$this->session->set_flashdata('success', 'your job application has been submitted successfully.');
					redirect('job-details/'.$id);
				}
			}			
		}
		else{
			$this->load->view('frontend/layout.php', $data);
		}
	}
	// Get Response Job
	public function ResponseJobs(){
		$data['main_content'] = 'response-jobs';
		$data['user'] =getUser();
		$data['ResponseJobs'] =$this->Job_model->getResponseJobs();
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	public function viewParticularResponseJobs($id=NULL){
		$data['main_content'] = 'view-response-jobs';
		$data['user'] =getUser();
		$data['ResponseJobs'] =$this->Job_model->viewParticularResponseJobs($id);
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	//Get Applied Jobs
	public function AppliedJobs(){
		$data['main_content'] = 'applied-jobs';
		$data['user'] =getUser();
		$data['AppliedJobs'] =$this->Job_model->getAppliedJobs();
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	//View Job
	public function viewParticularAppliedJobs($id=NULL){
		$data['main_content'] = 'view-applied-jobs';
		$data['user'] =getUser();
		$data['Jobs'] =$this->Job_model->getJobsById($id);
		$data['JobSkills'] =$this->Job_model->JobSkills($id);
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	
	
	//Reply Candidate of Particular Job	
public function replyUser(){
		$array = array();
		$Job_Id = base64_decode($this->input->post('job_id'));
		$to_ID = base64_decode($this->input->post('user_id'));
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		if(!empty($_FILES['imgFiles']['name'])){
            $filesCount = count($_FILES['imgFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
				$ext = pathinfo($_FILES['imgFiles']["name"][$i]);
				//$fileName = rand().'-'.time().'.'.$ext['extension'];
				//$_FILES['imgFiles']["name"][$i]= 'reply_message_files_'.$fileName;
				
				$fileName = $ext['filename'].'-'.rand().'.'.$ext['extension'];
				$_FILES['imgFiles']["name"][$i]= $fileName;
				$_FILES['userFile']['name'] = $_FILES['imgFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['imgFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['imgFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['imgFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['imgFiles']['size'][$i];
				$uploadPath = './assets/img/jobs/replymessage/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';
				$config['max_size'] = '1024';
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if(!$this->upload->do_upload('userFile')){
					$errors =  array('error' => $this->upload->display_errors());
					$array['error'] = $errors;
					
				}else{
					 $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
				}
			}
		}

			if(!empty($this->input->post('uploadfilesName'))){
					$uploadFile =$this->input->post('uploadfilesName');
				}
				else{
					$uploadFile ='';
				}
		if(empty($array['error'])){
		  $this->Job_model->getFirstMessage();

			$MessageId = $this->Job_model->replyUser();
			if($MessageId){
				//if(!empty($uploadData)){
				if(!empty($uploadFile)){
					/*foreach($uploadData as $uploadFile){
						$data = array(
							'message_id' => $MessageId,
							'files' => $uploadFile['file_name'],
							'created_at' => date('Y-m-d H:i:s')
						);
						$this->db->insert('messages_upload_files', $data);
					}*/

					$data = array(
							'message_id' => $MessageId,
							'files' => $uploadFile,
							'created_at' => date('Y-m-d H:i:s')
						);
						$this->db->insert('messages_upload_files', $data);
					$array['fileUpload'] =1;
				}else{
					$array['fileUpload'] =0;
				}
				$array['msg'] =1;
				
			}else{
				$array['msg'] =0;
			}
			$array['error'] ='';
		}
		echo json_encode($array);
		
	}
	
		public function uploadfiles(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$folderpath = base_url()."assets/img/jobs/";
		if(!empty($_FILES['userfile']["name"])){
					$ext = pathinfo($_FILES['userfile']["name"]);
					$fileName = rand().'-'.time().'.'.$ext['extension'];
					$fileName = $ext['filename'].'-'.rand().'.'.$ext['extension'];
					$_FILES['userfile']["name"]= $fileName;
					//Upload Image
					$config['upload_path'] = './assets/img/jobs/';
					$config['allowed_types'] = '*';
					$config['max_size'] = '8289384';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						$data['error'] = $errors;
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$uploadFile = $_FILES['userfile']['name'];
					}
					
					   ///echo '<img src="' . $folderPath . "" . $_FILES["userfile"]["name"] . '">';
					   echo $_FILES['userfile']["name"];
				}
		
	}
}

