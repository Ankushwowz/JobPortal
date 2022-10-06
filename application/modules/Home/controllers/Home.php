<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
    
   public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		//$this->load->module('Job/Job_model');
		Modules::run('Job/Job_model');
	}
	public function index(){
	   //$this->load->view('index');
		$data['user'] =getUser();
		$data['jobsPosted'] =$this->Job_model->jobsPosted();
		$data['EmployerCount'] =employerCount();
		$data['CandidateCount'] =candidateCount();
		$data['HomeCategory'] =$this->Job_model->getHomeCategory();
		$page = 1;
		$RecentJobs =$this->Job_model->getRecentJobs($page);
		$data['RecentJobs'] = $RecentJobs;
		$data['main_content'] = 'index';
		$this->load->view('frontend/layout', $data);
	}
	
	
	public function RecentJobs(){
	  //Get Load More Recent Jobs
		$page =  $_GET['page'];
		$RecentJobs =$this->Job_model->getRecentJobs($page);
		$array = array();
		if(!empty($RecentJobs['recentJob'])){
		$html='';
		foreach($RecentJobs['recentJob'] as $recentJobs){
		    if(strlen($recentJobs['job_title']) > 100) 
		{ 
			$stringjob = substr($recentJobs['job_title'],0,80).'.......'; 
		} else{ 
			  $stringjob = $recentJobs['job_title'];
		}
		    
			$html .='<div class="job-box home-recentjobs">
						   <div class="description">
							  <div class="float-left">
								 <h5 class="title"><a href="'.base_url().'job-details/'.base64_encode($recentJobs['job_id']).'">'.$stringjob.'</a></h5>
								 <div class="candidate-listing-footer">
									<ul>
									   <li><i class="flaticon-work"></i>'.$recentJobs['category_name'].'</li>
									   <li><i style="font-size:14px" class="fa"></i>'.$recentJobs['job_amount'].'</li>
									   <li><i class="flaticon-time"></i>'.$recentJobs['job_type_name'].'</li>
									</ul>
								</div>
							  </div>
							  <div class="div-right">
								 <a href="'.base_url().'job-details/'.base64_encode($recentJobs['job_id']).'" class="apply-button">Apply Now</a>
								<!-- <a href="#"><i class="flaticon-heart favourite"></i></a>-->
							  </div>
						   </div>
				</div>';
		}
		
		}
		
		
		$array['html'] = $html;
		$array['numPages'] = $RecentJobs['numPages'];
		echo json_encode($array);
		
	}
		
}
