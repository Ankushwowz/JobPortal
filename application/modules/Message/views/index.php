<style>
#contact-profile img {     width: 40px;
    border-radius: 50%;
    float: left;
    margin-right: 10px;}
	.dashboard-content {
    padding: 6px 18px 0;
}
#contact-profile p{margin-top:11px;}
	.readMsg {    position: absolute !important;
    left: 0 !important;
    margin: -2px 0 0 -2px !important;
    width: 10px !important;
    height: 10px !important;
    border-radius: 50% !important;
    border: 2px solid #2c3e50 !important;
 }
 #txt-message { 

    background: #4d4d4d;
    color: #fff;
    text-align: center;
    margin: 50px;
    padding: 36px;}
    
    h6#status {
    position: absolute;
    bottom: 0;
    right: 0px;
    font-size: 8px;
    width: 268px;
}
.jobtitle
{
  line-height: 2px;
  color: #fff;
  padding-left: 6px;
}
.pjobtitle {margin-left:10px;}
</style>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/chat.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/chat-board.css">
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
   <div class="content-area5">
      <div class="dashboard-content">
         <div class="dashboard-header clearfix">
            <div class="row">
              <?php /* <div class="col-sm-12 col-md-6">
                  <h4>Hello ,<?php if(!empty($user['fullname'])) { echo ucfirst($user['fullname']); }?></h4>
               </div>*/?>
			   
			    <div class="row1" style="width:100%;">
                           <div class="col-md-12">
                              <div id="frame">
                                 <div id="sidepanel">
                                    <div id="profile">
                                       <div class="wrap">
                                           <?php 
										   
										   if(!empty($user['image'])) {?>
                                            <img  id="profile-img"src="<?php echo base_url()?>/assets/img/profileimage/<?php echo $user['image'];?>" alt="profile-photo " class="online">
										<?php } else{ ?>
										<img id="profile-img" src="<?php echo base_url();?>/assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
										<?php } ?>
                                          <p><?php if(!empty($user['fullname'])) { echo $user['fullname'];}?></p>
                                       </div>
                                    </div>
                                    <div id="search">
                                       <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                                       <input type="text" name="searchUser" id="searchUser" placeholder="Search contacts..." />
                                    </div>
                                    <div id="contacts" >
                                       <ul id="online_user_list">
									   <?php 
									   /* foreach($ChatUser as $UserChatData){  ?>
                                          <li class="contact">
                                             <div class="wrap" onclick="singleChat('<?php echo $this->session->userdata('Session_data')['id'];?>','<?php echo $UserChatData['id'];?>'),getUserInfo('<?php echo $UserChatData['id'];?>')">
                                                <span class="contact-status online"></span>
												
												<?php if(!empty($UserChatData['image'])) {?>
													<img  id="profile-img"src="<?php echo base_url();?>/assets/img/profileimage/<?php echo $UserChatData['image'];?>" alt="profile-photo " >
												<?php } else{ ?>
													<img id="profile-img" src="<?php echo base_url();?>/assets/img/avatar/avatar-1.jpg" alt="avatar ">
												<?php } ?>
                                               
                                                <div class="meta">
                                                   <p class="name"><?php if(!empty($UserChatData['fullname'])) { echo ucfirst($UserChatData['fullname']);}?></p>
                                                   <p class="preview"></p>
                                                </div>
                                             </div>
                                          </li>
									   <?php 
									   
									   }*/ 
									   ?>
                                          <!--<li class="contact active">
                                             <div class="wrap">
                                                <span class="contact-status busy"></span>
                                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                                <div class="meta">
                                                   <p class="name">Harvey Specter</p>
                                                   <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                                                </div>
                                             </div>
                                          </li>-->
                                       </ul>
                                    </div>
									
                                   
                                 </div>
                                 <div class="content">
                                    <div class="contact-profile" id="contact-profile">
                                     
                                    </div>
                                    <div class="messages" id="messages">
                                       <ul id="ul_message">
                                          <!--<li class="sent">
                                             <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                             <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                                          </li>
                                          <li class="replies">
                                             <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                             <p>When you're backed against the wall, break the god damn thing down.</p>
                                          </li>-->
                                       
                                       </ul>
									   <?php if(empty($ChatUser[0]['from_id']) && empty($ChatUser[0]['to_id']) ) { ?>
									  <div id="txt-message">You can't sent message beacuse you have not received any message</div>
									   <?php } ?>
                                    </div>
                                    <div class="message-input">
                                       <div class="wrap">
                                          <!--<input type="text" placeholder="Write your message..." />-->
										  <textarea id="chatText" type="text" class="chatText" ></textarea>
										  <input type="hidden" name="senderId" id="senderId"  value="<?php echo $this->session->userdata('Session_data')['id'];?>"/>
										   <?php
												$UserData = $this->session->userdata('Session_data');
											   $role = $UserData['role'];
											   if($role==1){?>
												<input type="hidden" name="receiverId" id="receiverId"  value="<?php if(!empty($ChatUser[0]['from_id'])) { echo $ChatUser[0]['from_id']; } ?>"/>
											   <?php } 
											    if($role==2){?>
												<input type="hidden" name="receiverId" id="receiverId"  value="<?php if(!empty($ChatUser[0]['to_id'])) { echo $ChatUser[0]['to_id'];} ?>"/>
											   <?php } ?>
												<input type="hidden" name="scrollvalue" id="scrollvalue"  value="0"/>
                        <input type="hidden" name="message_job_id" id="message_job_id"  value="<?php if(!empty($ChatUser[0]['job_id'])) { echo $ChatUser[0]['job_id'];} ?>"/>

													<!--<i class="fa fa-paperclip attachment" aria-hidden="true"></i>-->
												<!--<input type="file" class="upload" name="chatFile[]" multiple="" id="chatFile" style="display:block;">-->
												<input type="file" class="upload" name="userfile" multiple="" id="chatFile" style="display:block;" onchange="uploadmessageFile()">
                 
                                          <button class="submit" id="chatButton"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                       </div>
                                       <input type="hidden" class="input-text" name="uploadfilesName"   id="uploadfilesName" > 
												<!--<input type="file" class="upload" name="userfile" id="userfile_id" onchange="uploadmessageFile()">	-->
												<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
												<h6 id="status"></h6>
                                    </div>
                                 </div>
								 <div class="send-files">
										<div class="files">
											<h5>Send Files</h5>
											<ul id="upload_files">
											</ul>
										
										</div>
									</div>
                              </div>
                              <?php /*<div class="chatBox">
                                 <div class="chatBody" placeholder="Reason of changing time" style="bottom:0;">
                                    <div class="chatTop">
                                       <div id="line_dot" class="userOnline"></div>
                                       <span class="chatTitle">NIK</span>
                                       <div class="chatClose">X</div>
                                       <div class="chatMin"></div>
                                    </div>
                                    <!-------------CHAT HISTORY-------------->
                                    <div class="chatLoop">
                                       <div class="chatReply">
                                          <div class="chatResponceCont" id="chati" style="float: left;width: 100%;">
                                             <!------APPENDED CHAT LOOP--------->
                                          </div>
                                       </div>
                                    </div>
                                    <!-------------nodejs version list of chat-------------->
                                    <!--<textarea id="chatText" type="text" class="chatText"></textarea>-->
                                    <button id="chatSubmit">Send</button>
                                 </div>
                              </div>*/
							  ?>
							  
							  
                           </div>
                        </div>
                    

            </div>
         </div>
         <!--<div class="alert alert-success alert-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
            <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
            
            </div>-->
     
        
		
	  </div>
     
   </div>
</div>