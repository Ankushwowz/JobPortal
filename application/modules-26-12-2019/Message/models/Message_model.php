<?php

class Message_model extends CI_Model{
    function ChatUser(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$role = $UserData['role'];
		$role = $UserData['role'];
		 $query_Sql = "SELECT messages.*,job.job_title,senderUser.image as senderImage,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image as receiverImage  FROM  messages 
		left join users as senderUser on senderUser.id =  messages.from_id
		left join users as receiverUser on receiverUser.id =  messages.to_id
		left join  job on  job.job_id =  messages.job_id
		";
		if($role==2){ 
			$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND to_id!='".$user_ID."'  group by messages.to_id ";

			//$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND to_id!='".$user_ID."'  group by messages.job_id ";
		}
		if($role==1){ 
			$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND from_id!='".$user_ID."'  group by messages.from_id";

			//$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND to_id!='".$user_ID."'  group by messages.job_id ";
		}
	
		$query = $this->db->query($SqlUser);
		$AllUser = $query->result_array();
	
	return $AllUser;
		
		
	}
	
	function getChat(){

		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$senderId = $this->input->post('senderId');
		$receiverId = $this->input->post('receiverId');
		$message_job_id = $this->input->post('message_job_id');
		
		//Read message//
		
		$ReadMessage ="update messages set messagestatus=1 WHERE (from_id='".$receiverId."' AND to_id='".$senderId."')   And job_id='".$message_job_id."'";
		$this->db->query($ReadMessage);
		
		 $query_Sql = "SELECT messages.*,job.job_title,senderUser.image as senderImage,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image as receiverImage  FROM  messages 
		left join users as senderUser on senderUser.id =  messages.from_id
		left join users as receiverUser on receiverUser.id =  messages.to_id
		left join  job on  job.job_id =  messages.job_id

		";
		$query= $query_Sql ." WHERE ((from_id='".$senderId."' AND to_id='".$receiverId."') OR (from_id='".$receiverId."' AND to_id='".$senderId."')) AND messages.job_id='".$message_job_id."'";
		//$query= $query_Sql ." WHERE ((from_id='".$senderId."' AND to_id='".$receiverId."') OR (from_id='".$receiverId."' AND to_id='".$senderId."')) ";
		
		$result = $this->db->query($query)->result_array();
		$html='<ul id="ul_message">';
		foreach($result as $result){
				if(!empty($result['senderImage'])){
					$imagepath =  base_url().'/assets/img/profileimage/'.$result['senderImage'];
				}else{
					$imagepath =  base_url().'/assets/img/avatar/avatar-1.jpg';
				}
				if(!empty($result['message'])){
					if($user_ID==$result['from_id']){
					 $html .='<li class="sent">
							  <img src="'.$imagepath.'" alt="" />
							  <p>'.nl2br($result['message']).'</p>
								</li>';
					}else{
						
						$html .='<li class="replies">
							   <img src="'.$imagepath.'" alt="" />
							  <p>'.nl2br($result['message']).'</p>
								</li>';
					}
				}			
		}
		$html .='</ul>';
		//Get Login User //
		$LoginUserArray = array();
		$CurrentDate = date('Y-m-d');
		$this->db->select('id');
		$this->db->where('lastloginstatus','1'); 
		$this->db->where('lastlogindate',$CurrentDate); 
		$queryGetUser = $this->db->get('users');
		if($queryGetUser->num_rows() > 0) {
		  $Row = $queryGetUser->result_array();
		  foreach($Row as $RowInfo){
			$LoginUserArray[] =  $RowInfo['id']; 
		  }
		 
		}
		$role = $UserData['role'];
		if($role==2){ 
			$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND to_id!='".$user_ID."'  group by messages.to_id , messages.job_id ";


			//$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND to_id!='".$user_ID."' group by messages.job_id ";
		}
		if($role==1){ 
			$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND from_id!='".$user_ID."'  group by messages.from_id,messages.job_id";


			//$SqlUser = $query_Sql." WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND from_id!='".$user_ID."'  group by messages.job_id ";
		}
	
	    $query = $this->db->query($SqlUser);
		$AllUser = $query->result_array();


		$userHtml ='<ul id="online_user_list">';
		foreach($AllUser as $AllUserInfo){

			if(strlen($AllUserInfo['job_title']) > 20) 
					{ 
						$stringjob = substr($AllUserInfo['job_title'],0,20).'.......'; 
					} else{ 
						$stringjob =$AllUserInfo['job_title'];
					}

			if($role==1){
				
				$UnreadQuery = "SELECT COUNT(messages.from_id) as UnreadMessage, messages.*,senderUser.image as senderImage,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image as receiverImage FROM messages left join users as senderUser on senderUser.id = messages.from_id left join users as receiverUser on receiverUser.id = messages.to_id 

				left join  job on  job.job_id =  messages.job_id
				WHERE  to_id='".$user_ID."' AND from_id='".$AllUserInfo['from_id']."' AND messages.messagestatus=0 and messages.job_id ='".$AllUserInfo['job_id']."' group by messages.job_id ";
				$getQuery = $this->db->query($UnreadQuery);
				$AllUserCount = $getQuery->result_array();
				if(!empty($AllUserCount)){
					$Unread = $AllUserCount[0]['UnreadMessage'];
					$classUnread ="unreadMessagecls";
					
				}else{
					$Unread ='';
					$classUnread ="";
				}
				
				
				if(!empty($AllUserInfo['senderImage'])){
					$imagepath =  base_url().'/assets/img/profileimage/'.$AllUserInfo['senderImage'];
				}else{
					$imagepath =  base_url().'/assets/img/avatar/avatar-1.jpg';
				}				
				if(in_array($AllUserInfo['from_id'],$LoginUserArray) ) { $class="online";}else{$class="offline";}	
					$userHtml .='<li class="contact"><div class="wrap" onclick="singleChat('.$user_ID.','.$AllUserInfo['from_id'].','.$AllUserInfo['job_id'].'),getUserInfo('.$AllUserInfo['from_id'].')"><span class="contact-status '.$class.'"></span>
					<img id="profile-img" src="'.$imagepath.'" alt="profile-photo"><div class="meta"><p class="name">'.ucfirst($AllUserInfo['sender']).'<p class="jobtitle">'.$stringjob.'</p></p><p class="'.$classUnread.'">'.$Unread.'</p></div></div></li>';
			}
			if($role==2){

			  //Unread Message//
					$UnreadQuery = "SELECT COUNT(messages.to_id) as UnreadMessage, messages.*,senderUser.image as senderImage,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image as receiverImage FROM messages 
				left join users as senderUser on senderUser.id = messages.from_id 
				left join users as receiverUser on receiverUser.id = messages.to_id 
				left join  job on  job.job_id =  messages.job_id
				WHERE  to_id='".$user_ID."' AND from_id='".$AllUserInfo['to_id']."' AND messages.messagestatus=0  and messages.job_id ='".$AllUserInfo['job_id']."' group by messages.job_id ";
				$getQuery = $this->db->query($UnreadQuery);
				$AllUserCount = $getQuery->result_array();
				if(!empty($AllUserCount)){
					$Unread = $AllUserCount[0]['UnreadMessage'];
					$classUnread ="unreadMessagecls";
				}else{
					$Unread ='';
					$classUnread ="";
				}
				
				if(!empty($AllUserInfo['receiverImage'])){
					$imagepath =  base_url().'/assets/img/profileimage/'.$AllUserInfo['receiverImage'];
				}else{
					$imagepath =  base_url().'/assets/img/avatar/avatar-1.jpg';
				}
				if(in_array($AllUserInfo['to_id'],$LoginUserArray) ) { $class="online";}else{$class="offline";}

					


				$userHtml .='<li class="contact"><div class="wrap" onclick="singleChat('.$user_ID.','.$AllUserInfo['to_id'].','.$AllUserInfo['job_id'].'),getUserInfo('.$AllUserInfo['to_id'].')"><span class="contact-status '.$class.'"></span>
				<img id="profile-img" src="'.$imagepath.'" alt="profile-photo "><div class="meta"><p class="name">'.ucfirst($AllUserInfo['receiver']).'</p><p class="jobtitle">'.$stringjob.'</p><p class="'.$classUnread.'">'.$Unread.'</p></div></div></li>';
			}
			
		}
		$userHtml .='</ul>';
		//End Here //
		
		// Upload File Array//
		
		$SqlUpload = "SELECT messages_upload_files.files,messages.*,senderUser.image,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image FROM  messages_upload_files 
		left join messages  on messages.message_id =  messages_upload_files.message_id
		left join users as senderUser on senderUser.id =  messages.from_id
		left join users as receiverUser on receiverUser.id =  messages.to_id
		left join  job on  job.job_id =  messages.job_id
		WHERE ((from_id='".$senderId."' AND to_id='".$receiverId."') OR (from_id='".$receiverId."' AND to_id='".$senderId."'))   AND   messages.job_id='".$message_job_id."'";
		$resultUpload = $this->db->query($SqlUpload)->result_array();
		// End Here
		$uploadFilesHtml ='<ul id="upload_files">';
		foreach($resultUpload as $resultUploadInfo){
			$PathUrl =  base_url().'assets/img/jobs/replymessage/'.$resultUploadInfo['files'];
		     $uploadFilesHtml .='<li><a download target="_blank" href="'.$PathUrl.'"><img   src="http://oxeenit.com/getwork.global/assets/img/img-1.jpg" class="img-responsive" alt="#"/> <span class="file_span"><img src="http://oxeenit.com/getwork.global/assets/img/download.png" alt="#"/></span><p class="file-n">'.$resultUploadInfo['files'].'</p></a></li>';
		}
		$uploadFilesHtml .='</ul>';
		
		//Unread Count Show//
		
		$this->db->select('message_id');
		$this->db->where('to_id',$user_ID);
		//$this->db->where('job_id1',$message_job_id);
		$this->db->where('messagestatus','0');
		$query = $this->db->get('messages');
		$resultUnreadCount = $query->num_rows();
		$UnreadCount ='<span class="badge messagecount">'.$resultUnreadCount.'</span>';
		
		//Respone Jobs
		/*$this->db->select('apply_job.*,COUNT(apply_job.user_id) as total,job.job_id as jobID,job.job_title,job.job_amount,job.user_id,category.category_name');
		$this->db->group_by('apply_job.job_id'); 
		$this->db->order_by('total', 'desc'); 
	    $this->db->join('job', 'job.job_id = apply_job.job_id','left');  
	    $this->db->join('category', 'category.category_id =job.job_category','left');
        $where ="job.user_id ='".$user_ID."' AND apply_job.status=0" ;		
		$this->db->having($where);
		$queryc = $this->db->get('apply_job');
		$countrow = $queryc->num_rows();*/
		
		$this->db->select('apply_job.*,job.job_id as jobID,job.job_title,job.job_amount,job.user_id,category.category_name');
		$this->db->join('job', 'job.job_id = apply_job.job_id','left');  
		$this->db->join('category', 'category.category_id =job.job_category','left');
		$where ="job.user_id ='".$user_ID."' AND apply_job.status=0" ;
		//$this->db->order_by('total', 'desc');		
		$this->db->where($where);
		$this->db->group_by('apply_job.job_id'); 
		$queryc = $this->db->get('apply_job');
		$countrow = $queryc->num_rows();
	
		$UnreadResponeCount ='<span class="badge responejobcount">'.$countrow.'</span>';
		
		
		//Assigned Job Status
	    if($role==1){
		$this->db->select('invite_user_id');
		$this->db->where('job_status','3');
		$this->db->where('candidate_id',$user_ID);
		$this->db->where('candidate_status',2);
		$queryJob = $this->db->get('invite_user');
		$resultUnreadAssignedJob = $queryJob->num_rows();
		$UnreadAssignedJob ='<span class="badge countcls assignedJobcount">'.$resultUnreadAssignedJob.'</span>';
		}
		if($role==2){
		$this->db->select('invite_user_id');
		$this->db->where('job_status','3');
		$this->db->where('employer_id',$user_ID);
		$this->db->where('employe_status',1);
		$queryJob = $this->db->get('invite_user');
		$resultUnreadAssignedJob = $queryJob->num_rows();
		$UnreadAssignedJob ='<span class="badge countcls assignedJobcount">'.$resultUnreadAssignedJob.'</span>';
		}
		
		if($role==1){
		$this->db->select('invite_user_id');
		$this->db->where('job_status','5');
		$this->db->where('candidate_id',$user_ID);
		$this->db->where('candidate_status',3);
		$queryJob = $this->db->get('invite_user');
		$resultUnreadcompletedJob = $queryJob->num_rows();
		$UnreadCompletedJob ='<span class="badge countcls completedJobcount">'.$resultUnreadcompletedJob.'</span>';
		}
		if($role==2){
		$this->db->select('invite_user_id');
		$this->db->where('job_status','5');
		$this->db->where('employer_id',$user_ID);
		$this->db->where('employe_status',2);
		$queryJob = $this->db->get('invite_user');
		$resultUnreadcompletedJob = $queryJob->num_rows();
		$UnreadCompletedJob ='<span class="badge countcls completedJobcount">'.$resultUnreadcompletedJob.'</span>';
		}

		
		//JoB Invitation//
		$this->db->select('invite_user_id');
		$this->db->where('job_status','4');
		$this->db->where('candidate_id',$user_ID);
		$this->db->where('candidate_status',0);
		$queryJobInvation = $this->db->get('invite_user');
		$resultUnreadInvitationJob = $queryJobInvation->num_rows();
		$UnreadInvitationJob ='<span class="badge countcls invitationJob">'.$resultUnreadInvitationJob.'</span>';
		
		
		//JoB Accepted//
		$this->db->select('invite_user_id');
		$whereacp = "(job_status=1 OR job_status=2)";
		$this->db->where($whereacp);
		$this->db->where('employer_id',$user_ID);
		$this->db->where('employe_status',0);
		$queryJobAccpted = $this->db->get('invite_user');
		$resultUnreadAcceptedJob = $queryJobAccpted->num_rows();
		$UnreadAcceptedJob ='<span class="badge countcls inviteuser">'.$resultUnreadAcceptedJob.'</span>';
		
		//End here
		
		$ResultArray= array();
		$ResultArray['userChat'] = $html;
		$ResultArray['loginUser'] = $userHtml;
		$ResultArray['uplaodFiles'] = $uploadFilesHtml;
		$ResultArray['UnreadCount'] = $UnreadCount;
		//if($countrow > 0){ $ResultArray['UnreadResponeCount'] = $UnreadResponeCount; }
		//if($resultUnreadAssignedJob > 0){ $ResultArray['UnreadAssignedJob'] = $UnreadAssignedJob; }
		//if($resultUnreadInvitationJob > 0){ $ResultArray['InvitationJob'] = $UnreadInvitationJob; }
		//if($resultUnreadAcceptedJob > 0){ $ResultArray['inviteuser'] = $UnreadAcceptedJob; }
		$ResultArray['UnreadResponeCount'] = $UnreadResponeCount;
		$ResultArray['UnreadAssignedJob'] = $UnreadAssignedJob;
		$ResultArray['InvitationJob'] = $UnreadInvitationJob;
		$ResultArray['inviteuser'] = $UnreadAcceptedJob;
		$ResultArray['CompletedJob'] = $UnreadCompletedJob;
		return $ResultArray;
	}
	
	 function sendChat(){
		$senderId = $this->input->post('senderId');
		$receiverId = $this->input->post('receiverId');
		$message = $this->input->post('chatText');
		$created = date('Y-m-d h:i:s');
		$job_id = $this->input->post('message_job_id');
		$data = array(
				'from_id' => $senderId,
				'to_id' => $receiverId,
				'message' => $message,
				'job_id' => $job_id,
				'created_at' => $created
				);
	
      $this->db->insert('messages', $data);
	return $last_id =  $this->db->insert_id();
	}
	function getuserInfo(){
		$receiverId = $this->input->post('receiverId');
		$this->db->select('id,fullname,image,tagline');
		$this->db->where('id',$receiverId); 
		$query = $this->db->get('users');
		$UserData = $query->row_array();

		$message_job_id = $this->input->post('message_job_id');
		$this->db->select('job_id,job_title');
		$this->db->where('job_id',$message_job_id); 
		$query = $this->db->get('job');
		$JobData = $query->row_array();

		$html='<div class="contact-profile" id="contact-profile">';
		if(!empty($UserData['image'])){
					$imagepath =  base_url().'/assets/img/profileimage/'.$UserData['image'];
				}else{
					$imagepath =  base_url().'/assets/img/avatar/avatar-1.jpg';
				}
		 $html .='<img src="'.$imagepath.'" alt="">';
          
		$html .='<p>'.ucfirst($UserData['fullname']).'</p>';
		if(!empty($JobData['job_title'])){
			$html .='<p class="pjobtitle">('.$JobData['job_title'].')</p>';
		}
		

		$html .='</div>';
		return $html;
	}
	
	function searchChatUser(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$userName = $this->input->post('userName');
		//Get Login User //
		$LoginUserArray = array();
		$CurrentDate = date('Y-m-d');
		$this->db->select('id');
		$this->db->where('lastloginstatus','1'); 
		$this->db->where('lastlogindate',$CurrentDate); 
		$queryGetUser = $this->db->get('users');
		if($queryGetUser->num_rows() > 0) {
		  $Row = $queryGetUser->result_array();
		  foreach($Row as $RowInfo){
			$LoginUserArray[] =  $RowInfo['id']; 
		  }
		 
		}
		$role = $UserData['role'];
		if($role==2){ 
		$Sql = "SELECT messages.*,job.job_title,senderUser.image as senderImage,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image as receiverImage FROM  messages 
			left join users as senderUser on senderUser.id =  messages.from_id
			left join users as receiverUser on receiverUser.id =  messages.to_id
			left join job  on job.job_id =  messages.job_id";
			
			if(!empty($userName)){
			  $where = " AND receiverUser.fullname LIKE '%".$userName."%'";
			}else{
				$where ="";
			}
			
			
			$Sql .=" WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND to_id!='".$user_ID."' ".$where." group by messages.to_id , messages.job_id ";
			$query = $this->db->query($Sql);	
		
		}
		if($role==1){ 
		$Sql = "SELECT messages.*,job.job_title,senderUser.image as senderImage,senderUser.fullname as sender,receiverUser.fullname as receiver,receiverUser.image as receiverImage FROM  messages 
		left join users as senderUser on senderUser.id =  messages.from_id
		left join users as receiverUser on receiverUser.id =  messages.to_id
		left join job  on job.job_id =  messages.job_id

		";
		if(!empty($userName)){
			  $where = " AND senderUser.fullname LIKE '%".$userName."%'";
			}else{
				$where ="";
			}
		
		$Sql .=" WHERE (from_id='".$user_ID."' OR to_id='".$user_ID."') AND from_id!='".$user_ID."' ".$where." group by messages.from_id  , messages.job_id";
		$query = $this->db->query($Sql);
		}
		$AllUser = $query->result_array();
		$userHtml ='<ul id="online_user_list">';
		foreach($AllUser as $AllUserInfo){
		if(strlen($AllUserInfo['job_title']) > 20) 
					{ 
						$stringjob = substr($AllUserInfo['job_title'],0,20).'.......'; 
					} else{ 
						$stringjob =$AllUserInfo['job_title'];
					}

			if($role==1){ 
					if(!empty($AllUserInfo['senderImage'])){
					$imagepath =  base_url().'/assets/img/profileimage/'.$AllUserInfo['senderImage'];
					}else{
					$imagepath =  base_url().'/assets/img/avatar/avatar-1.jpg';
					}
					if(in_array($AllUserInfo['from_id'],$LoginUserArray) ) { $class="online";}else{$class="offline";}
					$userHtml .='<li class="contact"><div class="wrap" onclick="singleChat('.$user_ID.','.$AllUserInfo['from_id'].','.$AllUserInfo['job_id'].'),getUserInfo('.$AllUserInfo['from_id'].')"><span class="contact-status '.$class.'"></span>
					<img id="profile-img" src="'.$imagepath.'" alt="profile-photo "><div class="meta"><p class="name">'.ucfirst($AllUserInfo['sender']).'</p><p class="preview"></p></div></div></li>';
			}
			if($role==2){ 
					if(!empty($AllUserInfo['receiverImage'])){
					$imagepath =  base_url().'/assets/img/profileimage/'.$AllUserInfo['receiverImage'];
					}else{
					$imagepath =  base_url().'/assets/img/avatar/avatar-1.jpg';
					}
					if(in_array($AllUserInfo['to_id'],$LoginUserArray) ) { $class="online";}else{$class="offline";}
					$userHtml .='<li class="contact"><div class="wrap" onclick="singleChat('.$user_ID.','.$AllUserInfo['to_id'].'),getUserInfo('.$AllUserInfo['to_id'].')"><span class="contact-status '.$class.'"></span>
					<img id="profile-img" src="'.$imagepath.'" alt="profile-photo "><div class="meta"><p class="name">'.ucfirst($AllUserInfo['receiver']).'</p><p class="jobtitle">'.$stringjob.'</p><p class="preview"></p></div></div></li>';
			}
			
		}
		
		echo $userHtml;
	}
	
	
	



}

?>