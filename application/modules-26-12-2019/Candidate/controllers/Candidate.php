<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Candidate extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		$this->load->model("Candidate_model");
		Modules::run('Job/Job_model');
	}
	public function CandidateList(){
		//$this->load->view('index');
		$data['user'] =getUser();
		$data['County'] =getCounty();
		$data['Category'] =getCategory();
		$data['CandidateList'] =$this->Candidate_model->getCandidates();
		//$data['JobType'] =$this->Job_model->jobType();
		$data['JobType'] =jobType();
		$data['main_content'] = 'candidate-list';
		$this->load->view('frontend/layout.php', $data);
	}
	public function viewProfile($id=Null){
		$cid =base64_decode($id);
		$data['user'] =getUser();
		$data['CandidateProfile'] =$this->Candidate_model->viewProfile($cid);
		$data['CandidateEducation'] =$this->Candidate_model->candidateEducation($cid);
		$data['Candidatelanguage'] =$this->Candidate_model->candidateLanguage($cid);
		$data['CandidateSkill'] =$this->Candidate_model->candidateSkill($cid);
		$data['CandidateCertification'] =$this->Candidate_model->candidateCertification($cid);
		$data['CandidatePortfolio'] =$this->Candidate_model->CandidatePortfolio($cid);
		$data['CandidateProjectRatting'] =$this->Candidate_model->CandidateProjectRatting($cid);
		//Get Employer All Project 
		$data['projectlist'] =$this->Job_model->jobList();
		$data['main_content'] = 'candidate-detail';
		$this->load->view('frontend/layout.php', $data);
	}
	
	// Get all invitation By Employer
	public function invitationByEmployer(){
		$data['user'] =getUser();
		$JobStatus =4;
		$data['JobsList'] =$this->Candidate_model->inviteByEmployer($JobStatus);
		$this->Candidate_model->readjobNotification($JobStatus);
		$data['main_content'] = 'invitation';
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	
	// Get offer Accept Reject
	public function offerAcceptReject(){
		$result =$this->Candidate_model->offerAcceptReject();
		
	}
	
	// Get all accepted Job 
	public function acceptedJob(){
		$data['user'] =getUser();
		$JobStatus =1;
		$data['JobsList'] =$this->Candidate_model->inviteByEmployer($JobStatus);
		$data['main_content'] = 'accepted-job';
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	// Get all Rejected Job 
	public function rejectedJob(){
		$data['user'] =getUser();
		$JobStatus =2;
		$data['JobsList'] =$this->Candidate_model->inviteByEmployer($JobStatus);
		$data['main_content'] = 'rejected-job';
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	
	public function completeJob(){
		$result =$this->Candidate_model->completeJob();
		
	}
	public function completedJob(){
		$data['user'] =getUser();
		$JobStatus =5;
		$data['JobsList'] =$this->Candidate_model->inviteByEmployer($JobStatus);
		$this->Candidate_model->readcompleteJobStatus($JobStatus);
		$data['main_content'] = 'completed-job';
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	public function assignedJob(){
		$data['user'] =getUser();
		$JobStatus =3;
		$data['JobsList'] =$this->Candidate_model->inviteByEmployer($JobStatus);
		$this->Candidate_model->readJobStatus($JobStatus);
		$data['main_content'] = 'assigned-job';
		$this->load->view('frontend/frontend-admin-layout.php', $data);
	}
	public function giveRatting($jobid){
		$data['user'] =getUser();
		$data['JobsList'] =$this->Job_model->getJobsById($jobid);
		$data['inviteUser'] =$this->Candidate_model->getInviteUserById();
		$data['main_content'] = 'give-ratting';
		$this->load->view('frontend/frontend-admin-layout.php', $data);	
	}
	
	public function sendRatting(){
		 $result =$this->Candidate_model->giveRatting();
		 echo $result;
	}
	
	public function viewRatting($jobid){
		$data['user'] =getUser();
		$data['JobsList'] =$this->Job_model->getJobsById($jobid);
		$data['ratting'] =$this->Candidate_model->getrattingById($jobid);
		$data['main_content'] = 'view-ratting';
		$this->load->view('frontend/frontend-admin-layout.php', $data);	
	}
	
	public function resendJob(){
		$result =$this->Candidate_model->resendJob();
		
	}
	
	public function assigned_again(){
		$result =$this->Candidate_model->assigned_again();
		
	}
	public function assign_job_by_response(){
		$result =$this->Candidate_model->assign_job_by_response();
		
	}
	
	
}