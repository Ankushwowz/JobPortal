<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Message extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('form_validation');
		$this->load->model("Message_model");
	}
	public function index(){
		if(!empty($this->session->userdata('Session_data'))){
			$data['main_content'] = 'index';
			$data['user'] =getUser();
			$data['ChatUser'] =$this->Message_model->ChatUser();
			$this->load->view('frontend/frontend-admin-layout.php', $data);
		}else{
			redirect('');
		}
	}
	//Get Chat
	public function getChat(){
		
	$result =$this->Message_model->getChat();
	 echo json_encode($result);
	}
	//Add New Chat
	/*public function sendChat(){
	if(!empty($_FILES['imgFiles']['name'])){
            $filesCount = count($_FILES['imgFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
				$ext = pathinfo($_FILES['imgFiles']["name"][$i]);
				//$fileName = rand().'-'.time().'.'.$ext['extension'];
			//	$_FILES['imgFiles']["name"][$i]= 'reply_message_files_'.$fileName;
			
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
	 
	 
	 
	 	if(empty($array['error'])){
			echo $MessageId =$this->Message_model->sendChat();
			
			if($MessageId){
				if(!empty($uploadData)){
					foreach($uploadData as $uploadFile){
						$data = array(
							'message_id' => $MessageId,
							'files' => $uploadFile['file_name'],
							'created_at' => date('Y-m-d H:i:s')
						);
						$this->db->insert('messages_upload_files', $data);
					}
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
	 
	 
	}*/
	
	
		public function sendChat(){
	/*if(!empty($_FILES['imgFiles']['name'])){
            $filesCount = count($_FILES['imgFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
				$ext = pathinfo($_FILES['imgFiles']["name"][$i]);
				//$fileName = rand().'-'.time().'.'.$ext['extension'];
			//	$_FILES['imgFiles']["name"][$i]= 'reply_message_files_'.$fileName;
			
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
	 
	 */
	 if(!empty($this->input->post('uploadfilesName'))){
					$uploadFile =$this->input->post('uploadfilesName');
				}
				
	 
	 	//if(empty($array['error'])){
			$MessageId =$this->Message_model->sendChat();
			
			if($MessageId){
				if(!empty($uploadFile)){
					$job_id = $this->input->post('message_job_id');
					//foreach($uploadData as $uploadFile){
						$data = array(
							'message_id' => $MessageId,
							//'files' => $uploadFile['file_name'],
							'files' => $uploadFile,
							'job_id' => $job_id,
							'created_at' => date('Y-m-d H:i:s')
						);
						$this->db->insert('messages_upload_files', $data);
					//}
					$array['fileUpload'] =1;
				}else{
					$array['fileUpload'] =0;
				}
				$array['msg'] =1;
				
			}else{
				$array['msg'] =0;
			}
			$array['error'] ='';
		//}
		echo json_encode($array);
	 
	 
	}
	public function getuserInfo(){
	 echo $result =$this->Message_model->getuserInfo();
	}
	public function searchChatUser(){
	 $result =$this->Message_model->searchChatUser();
	 echo $result;
	}
	
	public function uploadfiles(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$folderpath = base_url()."assets/img/jobs/replymessage/";
		if(!empty($_FILES['userfile']["name"])){
					$ext = pathinfo($_FILES['userfile']["name"]);
					$fileName = rand().'-'.time().'.'.$ext['extension'];
					$fileName = $ext['filename'].'-'.rand().'.'.$ext['extension'];
					$_FILES['userfile']["name"]= $fileName;
					//Upload Image
					$config['upload_path'] = './assets/img/jobs/replymessage/';
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