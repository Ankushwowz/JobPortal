<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {
public function __construct() {
	parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		 $this->load->model("Profile_model");
		 //$this->load->model("Job/Job_model");
	}

	/**********Edit Profile Information***************/

	public function index(){
	$data['main_content'] = 'index';
	$data['user'] =getUser();
	$data['Country'] =getCounty();
	$data['Languagelevel'] =getLanguagelevel();
	$data['UserLanguage'] =$this->Profile_model->getUserLanguage();
	$data['Experience'] =getExperience();
	$data['UserSkills'] =$this->Profile_model->getUserSkills();
	$data['getDegree'] =$this->Profile_model->getDegree();
	$data['UserEducation'] =$this->Profile_model->getUserEducation();
	$data['UserCertification'] =$this->Profile_model->getUserCertification();
	$data['JobType'] =jobType();
	$data['Category'] =getCategory();
	$data['UserPortfolio'] =$this->Profile_model->getUserPortfolio();
	
	
	if(!empty($_POST['edit_profie'])){
		  $this->form_validation->set_rules('fullname', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				
				/*if(!empty($_FILES['userfile']["name"])){
					$ext = pathinfo($_FILES['userfile']["name"]);
					$fileName = rand().'-'.time().'.'.$ext['extension'];
					$_FILES['userfile']["name"]= 'profile-'.$fileName;
					//Upload Image
					$config['upload_path'] = './assets/img/profileimage/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						$data['error'] = $errors;
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$profileImage = $_FILES['userfile']['name'];
					}
				}else{
					$profileImage = $this->input->post('oldProfileImage');	
				}*/
			
				$result = $this->Profile_model->EditProfile();
				if($result==1){
					$this->session->set_flashdata('success', 'profile information has been edited successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('edit-profile');
				//$this->load->view('frontend/frontend-admin-layout.php', $data);
			}			
		}
		else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
		
		if(!empty($_POST['paymentModeBtn'])){
			$result = $this->Profile_model->addPaymentMode();
				if($result==1){
					$this->session->set_flashdata('success', 'Payment mode has been added successfully.');
					redirect('edit-profile');
				}
		}
	}
	//Get Insert TagLine
	public function changeTagline(){
	$data['main_content'] = 'index';
	if(!empty($_POST['save-changes'])){
		
			$this->form_validation->set_rules('tagline', 'Story', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/frontend-admin-layout.php', $data);
			}else{
				$result = $this->Profile_model->ChangeTagline();
				if($result==1){
					$this->session->set_flashdata('success', 'Tagline has been edited successfully.');
				}
				redirect('edit-profile');
			}			
		}
		else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
	}
	// Get Language
	function getLanguage(){
		$Language =getLanguage();
		echo json_encode($Language);
	}
	// Add Language
	function addLanguage(){
		$result = $this->Profile_model->addLanguage();
		echo $result;
	}
	// Delete Language
    function deleteLanguage(){
		$result = $this->Profile_model->deleteLanguage();
		echo $result;
	}
	
	// Get Skills
	function getSkill(){
		$Skill =getSkill();
		echo json_encode($Skill);
	}
   // Add Skills
	function addSkills(){
		$result = $this->Profile_model->addSkills();
		echo $result;
	}
	// Delete Skills
    function deleteskill(){
		$result = $this->Profile_model->deleteskill();
		echo $result;
	}
	// Add Education
    function addEducation(){
		$result = $this->Profile_model->addEducation();
		echo $result;
	}
	// Delete Education
    function deleteEducation(){
		$result = $this->Profile_model->deleteEducation();
		echo $result;
	}
	// Add Education
    function addCertificate(){
		$result = $this->Profile_model->addCertificate();
		echo $result;
	}	
	// Delete Certificate
    function deleteCertification(){
		$result = $this->Profile_model->deleteCertification();
		echo $result;
	}
	// Upload User Image
function uploadUserImage(){
		$array = array();
		if(!empty($_FILES['userfile']["name"])){
			$ext = pathinfo($_FILES['userfile']["name"]);
			$fileName = rand().'-'.time().'.'.$ext['extension'];
			$_FILES['userfile']["name"]= 'profile-'.$fileName;
			//Upload Image
			$config['upload_path'] = './assets/img/profileimage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('userfile')){
				$errors =  array('error' => $this->upload->display_errors());
				$data['error'] = $errors;
				//echo $errors;
				$array['error'] = $errors;
				$array['result'] = '';
			}else{
				$data =  array('upload_data' => $this->upload->data());
				$profileImage = $_FILES['userfile']['name'];
				$this->resizeProfileImage($_FILES['userfile']['name']);
			}
		}
if(!empty($profileImage)){
			$result = $this->Profile_model->uploadUserImage($profileImage);
			//echo $result;
			$array['result'] = $result;
		}
		echo json_encode($array);
		
	}
	// Get getSubCategory By Category
	function getSubCategory(){
		$SubCategory =getSubCategory();
		echo $SubCategory;
	}
	
	//Get Insert portfolio
	public function portfolio(){
		$data['main_content'] = 'index';
		if(!empty($_POST['addPortfolio'])){
			if(!empty($_FILES['uploadPortfolio']["name"])){
				$ext = pathinfo($_FILES['uploadPortfolio']["name"]);
				$fileName = rand().'-'.time().'.'.$ext['extension'];
				$_FILES['uploadPortfolio']["name"]= 'portfolio-'.$fileName;
				//Upload Image
				$config['upload_path'] = './assets/img/portfolio/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('uploadPortfolio')){
					$errors =  array('error' => $this->upload->display_errors());
					$data['error'] = $errors;
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$PortfolioImage = $_FILES['uploadPortfolio']['name'];
					 $this->resizeImage($_FILES['uploadPortfolio']['name']);
					 $result = $this->Profile_model->uploadPortfolio($PortfolioImage);
					if($result==1){
						$this->session->set_flashdata('success', 'Image has been added successfully in Portfolio.');
					}
					 
				}
			}
			redirect('edit-profile');
		}
		else{
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}
	}
	
	public function resizeImage($filename){
	$source_path = $_SERVER['DOCUMENT_ROOT'] . '/getwork.global/assets/img/portfolio/' . $filename;
	$target_path = $_SERVER['DOCUMENT_ROOT'] . '/getwork.global/assets/img/portfolio/thumbnail/';
	 
	// $source_path = './assets/img/portfolio/' . $filename;
	 //$target_path =  './assets/img/portfolio/thumbnail/';

      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );

		$this->load->library('image_lib',$config_manip);
		$this->image_lib->initialize($config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
		$this->image_lib->clear();
   }
   // Delete Portfolio
    function deletePortfolio(){
		$result = $this->Profile_model->deletePortfolio();
		echo $result;
	}
	
	public function resizeProfileImage($filename){
	$source_path = $_SERVER['DOCUMENT_ROOT'] . '/getwork.global/assets/img/profileimage/' . $filename;
	$target_path = $_SERVER['DOCUMENT_ROOT'] . '/getwork.global/assets/img/profileimage/thumbnail/';
	 
	$config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );

		$this->load->library('image_lib',$config_manip);
		$this->image_lib->initialize($config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
		$this->image_lib->clear();
   }
/********** End here*************************/
}

