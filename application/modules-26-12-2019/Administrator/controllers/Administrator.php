<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Administrator extends MX_Controller {
	public function __construct() {
	parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model("Administrator_model");
		Modules::run('Job/Job_model');
	//$this->load->module("dashboard");
	$this->load->library('paypal_lib');
	}
	public function index(){
		//echo "<pre>"; print_r("I am Here"); die;
		if(!empty($_POST['login'])){
			$this->session->set_userdata('name','test');	
			$this->form_validation->set_rules('email', 'Email','trim|valid_email|required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('index');
			}else{
				$result = $this->Administrator_model->admin_user();
				//echo "<pre>"; print_r($result); die;
					if($result==1){
					redirect('admin-dashboard');
				}else{
					$this->session->set_flashdata('danger', 'Invaild login credentials.Please try vaild credentials');
					$this->load->view('index');
				}
			}			
		}else{
			$this->load->view('index');
		}
	}



	public function dashboard(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['total_jobs'] = $this->Administrator_model->getTotaljob();
		$data['assign_jobs'] = $this->Administrator_model->getAssignedjob();
		$data['complete_jobs'] = $this->Administrator_model->getCompletejob();
		$data['accept_jobs'] = $this->Administrator_model->getAcceptjob();
		$data['reject_jobs'] = $this->Administrator_model->getRejectjob();
		$data['main_content'] = 'dashboard';
		//echo "<pre>"; print_r($data['user']); die;
		$this->load->view('backend/backend-admin-layout.php',$data);
	}
	
	public function rejectedJobs(){		
	    $data['user'] = $this->Administrator_model->getAdmin();
		$data['RejectedList'] =$this->Administrator_model->rejectedJobs();
		$data['main_content'] = 'rejected-jobs';
		$this->load->view('backend/backend-admin-layout.php', $data);
	}

	public function completedJobs(){
	    $data['user'] = $this->Administrator_model->getAdmin();
		$data['CompletedList'] =$this->Administrator_model->completedJobs();
		$data['main_content'] = 'completed-jobs';
		$this->load->view('backend/backend-admin-layout.php', $data);
	}

	public function assignedJobs(){	
	    $data['user'] = $this->Administrator_model->getAdmin();
		$data['AssignedList'] =$this->Administrator_model->assignedJobs();
		$data['main_content'] = 'assigned-jobs';
		$this->load->view('backend/backend-admin-layout.php', $data);
	}


	public function orders(){
	    $data['user'] = $this->Administrator_model->getAdmin();
	    $data['payment'] =$this->Administrator_model->get_alltransaction();
	    $data['main_content'] = 'orders';
	    //echo "<pre>"; print_r($data['payment']); die;
	   $this->load->view('backend/backend-admin-layout.php', $data);
	}

	public function Userslisting(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['users'] = $this->Administrator_model->getUsers();
		//echo "<pre>"; print_r($data['users']); die;
		$data['title'] = 'Users Listing';
		$data['main_content'] = 'userslist';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}


	public function delete(){			
			$id =$this->input->post('userid');
			$this->Administrator_model->user_delete($id);        
			echo 1;
		}

	public function change_status()	{
		$id =$this->input->post('userid');
		$this->Administrator_model->change_status($id);        
		echo 1;
	}


	public function EditProfile(){
		$data['user'] = $this->Administrator_model->getAdmin();
		//$data['usersdata'] = $this->Administrator_model->getAdmin();
		//echo "<pre>"; print_r($data['usersdata']); die;
		$data['title'] = 'dashboard';
		$data['main_content'] = 'editprofile';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}



	public function AddCategory(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['title'] = 'Add Category';
		$data['main_content'] = 'addcategory';
		if(!empty($_POST['add_category'])){
		  $this->form_validation->set_rules('category_name', 'Category Name','required|is_unique[category.category_name]',array('is_unique'     => 'This %s already exists.please try other category'));
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{

				$config['upload_path'] = './assets/img/category';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
					$this->resizeImage($_FILES['userfile']['name']);
				}

				$result = $this->Administrator_model->AddCategory($post_image);
				if($result==1){
					$this->session->set_flashdata('success', 'Category has been added successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('add-category');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php',$data);
		}

	}



	public function resizeImage($filename){
	$source_path = $_SERVER['DOCUMENT_ROOT'] . '/getwork.global/assets/img/category/' . $filename;
	$target_path = $_SERVER['DOCUMENT_ROOT'] . '/getwork.global/assets/img/category/thumbnail/';
	 
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




	public function ViewCategory(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['categories'] = $this->Administrator_model->getCategory();
		$data['title'] = 'Category Listing';
		$data['main_content'] = 'viewcategory';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}


	public  function categorydelete(){
			$id =$this->input->post('categoryid');
			$this->Administrator_model->category_delete($id);        
			echo 1;
	}

	public function EditCategory($id){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['categories'] = $this->Administrator_model->getSingleCategory($id);
		$data['title'] = 'Edit Category';
		$data['main_content'] = 'editcategory';	
		if(!empty($_POST['edit_category'])){
		  $this->form_validation->set_rules('category_name', 'Category Name', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{	
				
				$config['upload_path'] = './assets/img/category';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					//$post_image = 'noimage.jpg';
					$post_image = $this->input->post('olduserfile');
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
					$this->resizeImage($_FILES['userfile']['name']);
				}

				$result = $this->Administrator_model->EditCategory($post_image,$id);
				if($result==1){
					$this->session->set_flashdata('success', 'Category has been edited successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('view-category');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}

	}


	public function AddSubCategory(){
			$data['user'] = $this->Administrator_model->getAdmin();
			$data['categories'] = $this->Administrator_model->getCategory();
			$data['title'] = 'Add Sub Category';
			$data['main_content'] = 'addsubcategory';
			if(!empty($_POST['add_category'])){
			  $this->form_validation->set_rules('category_name', 'Category Name', 'required');
			  $this->form_validation->set_rules('subcategory_name', 'Sub Category Name', 'required');
				if($this->form_validation->run() === FALSE){
					$this->load->view('backend/backend-admin-layout.php', $data);
				}else{
					$result = $this->Administrator_model->AddSubCategory();
					if($result==1){
						$this->session->set_flashdata('success', 'Sub Category has been added successfully.');
					}else{
						//$this->session->set_flashdata('danger', 'current password does not match with password');
					}
					redirect('add-subcategory');
				}			
			}
			else{
				$this->load->view('backend/backend-admin-layout.php',$data);
			}

		}


		public function ViewSubCategory(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['subcategories'] = $this->Administrator_model->getSubCategory();
		$data['title'] = 'Sub Category Listing';
		$data['main_content'] = 'viewsubcategory';
		$this->load->view('backend/backend-admin-layout.php',$data);
		}


		public  function subcategorydelete(){
			$id =$this->input->post('subcategoryid');
			$this->Administrator_model->subcategory_delete($id);        
			echo 1;
		}



		public function EditSubCategory($id){
		//echo "<pre>"; print_r($id); die;
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['categories'] = $this->Administrator_model->getCategory();
		$data['subcategories'] = $this->Administrator_model->getSingleSubCategory($id);
		$data['title'] = 'Edit Sub Category';
		$data['main_content'] = 'editsubcategory';	
		if(!empty($_POST['edit_category'])){
		  $this->form_validation->set_rules('subcategory_name', 'Sub Category Name', 'required');
		  $this->form_validation->set_rules('category_name', 'Category Name', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{			
				$result = $this->Administrator_model->EditSubCategory($id);
				if($result==1){
					$this->session->set_flashdata('success', 'Sub Category has been edited successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('view-subcategory');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}

	}



	public function AddPage(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['title'] = 'Add Page';
		$data['main_content'] = 'addpage';
		//$data['main_content'] = 'aboutus';
		//$this->load->view('backend/backend-admin-layout.php',$data);

		if(!empty($_POST['add_page'])){
		  $this->form_validation->set_rules('page_title', 'Page Title', 'required');
		  $this->form_validation->set_rules('description', 'About Description', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{
				$result = $this->Administrator_model->AddPage();
				if($result==1){
					$this->session->set_flashdata('success', 'Page has been added successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('add-page');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php',$data);
		}

	}

	public function ViewPages(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['pages'] = $this->Administrator_model->getPages();
		$data['title'] = 'Pages Listing';
		$data['main_content'] = 'viewpages';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}

	public  function pagedelete(){
			$id =$this->input->post('pageid');
			$this->Administrator_model->page_delete($id);        
			echo 1;
	}



	public function EditPage($id){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['pageData'] = $this->Administrator_model->getSinglePage($id);
		$data['title'] = 'Edit Page';
		$data['main_content'] = 'editpage';	
		if(!empty($_POST['edit_page'])){
		  $this->form_validation->set_rules('page_title', 'Page Title', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{			
				$result = $this->Administrator_model->EditPage($id);
				if($result==1){
					$this->session->set_flashdata('success', 'Page has been edited successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('view-pages');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}

	}




	public function AddSkills(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['title'] = 'Add Skills';
		$data['main_content'] = 'addskill';

		if(!empty($_POST['add_skill'])){			
		  $this->form_validation->set_rules('skill_name', 'Skill Name','required|is_unique[skills.skill_name]',array('is_unique'     => 'This %s already exists.please try other skill'));
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{
				$result = $this->Administrator_model->AddSkills();
				if($result==1){
					$this->session->set_flashdata('success', 'Skill has been added successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('add-skills');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php',$data);
		}

	}


	public function ViewSkills(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['skills'] = $this->Administrator_model->getSkills();
		$data['title'] = 'Skills Listing';
		$data['main_content'] = 'viewskills';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}


	public  function skilldelete(){
			$id =$this->input->post('skillid');
			$this->Administrator_model->skill_delete($id);        
			echo 1;
		}


	public function EditSkill($id){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['skills'] = $this->Administrator_model->getSingleSkill($id);
		$data['title'] = 'Edit Skill';
		$data['main_content'] = 'editskill';	
		if(!empty($_POST['edit_skill'])){
		  $this->form_validation->set_rules('skill_name', 'Skill Name', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{			
				$result = $this->Administrator_model->EditSkill($id);
				if($result==1){
					$this->session->set_flashdata('success', 'Skill has been edited successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('view-skills');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}

	}



	public function AddLanguage(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['title'] = 'Add Languages';
		$data['main_content'] = 'addlanguage';

		if(!empty($_POST['add_language'])){			
		  $this->form_validation->set_rules('language_name', 'Language Name','required|is_unique[language.language_name]',array('is_unique'     => 'This %s already exists.please try other language'));
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{
				$result = $this->Administrator_model->AddLanguage();
				if($result==1){
					$this->session->set_flashdata('success', 'Language has been added successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('add-language');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php',$data);
		}

	}


	public function ViewLanguage(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['languages'] = $this->Administrator_model->getLanguages();
		$data['title'] = 'Languages Listing';
		$data['main_content'] = 'viewlanguages';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}


	public function languagedelete(){
			$id =$this->input->post('languageid');
			$this->Administrator_model->language_delete($id);        
			echo 1;
		}


	public function EditLanguage($id){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['languages'] = $this->Administrator_model->getSingleLanguage($id);
		$data['title'] = 'Edit Language';
		$data['main_content'] = 'editlanguage';	
		if(!empty($_POST['edit_language'])){
			$this->form_validation->set_rules('language_name', 'Language Name','required|is_unique[language.language_name]',array('is_unique'     => 'This %s already exists.please try other language'));;
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{			
				$result = $this->Administrator_model->EditLanguage($id);
				if($result==1){
					$this->session->set_flashdata('success', 'Language has been edited successfully.');
				}else{
					//$this->session->set_flashdata('danger', 'current password does not match with password');
				}
				redirect('view-languages');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}

	}	


	/**************Job List Start Here****************/

	public function Joblist(){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['jobs'] = $this->Administrator_model->getjobs();
		$data['title'] = 'Jobs Listing';
		$data['main_content'] = 'jobs/listjobs';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}

	public function Viewjob($id){
		$data['user'] = $this->Administrator_model->getAdmin();
		$data['Jobs'] = $this->Administrator_model->viewjob($id);
		//echo "<pre>"; print_r($data['Jobs']); die;
		$data['JobSkills'] = $this->Job_model->JobSkills($id);
		$data['main_content'] = 'jobs/viewjobs';
		$this->load->view('backend/backend-admin-layout.php',$data);
	}

	public function Change_Jobstatus(){
		$id =$this->input->post('jobid');
		$this->Administrator_model->Change_Jobstatus($id);        
		echo 1;
	}


	public function editJobs($id=NULL){
	$data['user'] = $this->Administrator_model->getAdmin();
	$data['JobType'] =$this->Job_model->jobType();
	$data['JobSkills'] =$this->Job_model->JobSkills($id);
	$data['JobCategory'] =$this->Job_model->jobCategory();
	$data['Jobs'] =$this->Job_model->getJobsById($id);
	$data['main_content'] = 'jobs/edit_jobs';
	if(!empty($_POST['postJob'])){
	
		  $this->form_validation->set_rules('job_title', 'Job Title', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{
				if(!empty($_FILES['userfile']["name"])){
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
				}

				/*if(!empty($_FILES['userfile']['name'])){
            		$filesCount = count($_FILES['userfile']['name']);
           		 	for($i = 0; $i < $filesCount; $i++){
					$ext = pathinfo($_FILES['userfile']["name"][$i]);
					$fileName = rand().'-'.time().'.'.$ext['extension'];
					$_FILES['userfile']["name"][$i]= 'job-post_'.$fileName;
					$_FILES['userFile']['name'] = $_FILES['userfile']['name'][$i];
	                $_FILES['userFile']['type'] = $_FILES['userfile']['type'][$i];
	                $_FILES['userFile']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
	                $_FILES['userFile']['error'] = $_FILES['userfile']['error'][$i];
	                $_FILES['userFile']['size'] = $_FILES['userfile']['size'][$i];
					$uploadPath = './assets/img/jobs/';
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
	                    $uploadFile[$i]['file_name'] = $fileData['file_name'];
					}
				  }
				}else{
					$uploadFile = $this->input->post('oldUploadFile');	
				}*/
				
				$result = $this->Job_model->EditJob($uploadFile,$id);
				if($result==1){
					$this->session->set_flashdata('success', 'job has been update successfully.');
				}
				redirect('joblist');
			}			
		}
		else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}
	}

	/**************Job List End Here****************/
	
	
	//Admin Escrow Setting
	public function escrowSettings(){
		$data['main_content'] = 'escrow-user-settings';
		$data['user'] =getUser();
		if(!empty($_POST['escrowSubmit'])){
			$this->form_validation->set_rules('escrow-email', 'Current Password', 'required');
			$this->form_validation->set_rules('escrow-pass', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('backend/backend-admin-layout.php', $data);
			}else{
				$result = $this->Administrator_model->escrowSetting();
				//echo "<pre>"; print_r($result); die;
				if($result){
					$this->session->set_flashdata('success', 'Escrow details has been update successfully.');
				}
				$this->load->view('backend/backend-admin-layout.php', $data);
				redirect('escrow-settings');
			}			
		}else{
			$this->load->view('backend/backend-admin-layout.php', $data);
		}
	}


	function logout() {
		session_start(); 
		session_destroy();
		unset($_SESSION);
		session_regenerate_id(true);
		redirect('');
	}	



}