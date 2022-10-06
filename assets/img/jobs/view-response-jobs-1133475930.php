 <style>
  .comment-meta span {
    margin-left: 20px;
    font-weight: 600;
}
.job-avail-section {float:left;}
.job-avail-section p{ margin: 0 0 0 -18px}
.job-section-12 { margin: 11px 0 0 0;}
.reply_send_btn { float: left;  margin-top: 33px;} 
#error-message {float: left;
margin-left: 11px;
position: absolute;
margin-top: 19px;}
#error-message p{color: red;}
#reply_message_error { line-height: 8px; color: red;}
#myReplyModalSuccess .modal-header { background-color: #376bff;}
#myReplyModalSuccess .modal-title { color: #fff;}
#myReplyModal .modal-header { background-color: #376bff;}
#myReplyModal .modal-title { color: #fff;}
textarea {
    overflow: auto;
    resize: vertical;
	min-height: 160px;
	
	 width: 100%;
    padding: 10px 17px;
    font-size: 14px;
    border: 1px solid #e8e7e7;
    outline: none;
    color: #6c6c6c;
    height: 45px;
    border-radius: 2px;
}
.comment-meta .assign_job_cls {
    margin-left: 20px;
    font-weight: 600;
	color: #376bff;
	cursor: pointer;
}
  </style> 
 
  <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Response Jobs</h4></div>
                            <div class="col-sm-12 col-md-6">
                              
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form method="GET">
                           
                            <div class="row pad-20">
                                <div class="col-lg-12">
								<?php foreach($ResponseJobs as $ResponseJobs) {
									?>
                                    <div class="comment">
                                        <div class="comment-author">
                                           <a href="<?php echo base_url()?>view-profile/<?php echo base64_encode($ResponseJobs['user_id']);?>">
											<?php if(!empty($ResponseJobs['image'])) {?>
                                            <img   src="<?php echo base_url();?>assets/img/profileimage/<?php echo $ResponseJobs['image'];?>" alt="profile-photo " class="userimage">
										<?php } else{ ?>
										<img   src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
										<?php } ?>
											  </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                  <?php if(!empty($ResponseJobs['fullname'])) { echo ucfirst($ResponseJobs['fullname']); } ?>
                                                </h5>
                                                <div class="comment-meta">
                                                   <?php echo date("M d,Y", strtotime($ResponseJobs['created_at'])); ?>
												   <?php  $counter_replay = $this->Job_model->counter_replay(base64_encode($ResponseJobs['job_id']),base64_encode($ResponseJobs['user_id']));
												   if($counter_replay >0){ ?>
													    <a href="<?php echo base_url()?>messages">Reply</a>
												 <?php   }else{
												   ?>
												   <a href="#"  id="replybtn_<?php echo $ResponseJobs['apply_job_id'];?>" data-toggle="modal" data-target="#myReplyModal"  onclick="replyUserByJob('<?php echo base64_encode($ResponseJobs['user_id']);?>','<?php echo base64_encode($ResponseJobs['job_id']);?>','<?php echo ucfirst($ResponseJobs['fullname']);?>','<?php echo $ResponseJobs['apply_job_id'];?>')" >Reply</a>
												   <?php } ?>
												   
												  
												   <a href="<?php echo base_url()?>view-profile/<?php echo base64_encode($ResponseJobs['user_id']);?>"  >Invite Candidate</a>
												    <?php $countJobAssign = $this->Job_model->already_assign_job(base64_encode($ResponseJobs['job_id']),base64_encode($ResponseJobs['user_id'])); 
												   if($countJobAssign > 0){
													   $JobAssignuser = $this->Job_model->already_assign_job_user(base64_encode($ResponseJobs['job_id']),base64_encode($ResponseJobs['user_id'])); 
													   if(!empty($JobAssignuser) && count($JobAssignuser) > 0){
														   if($JobAssignuser['job_status']==3){ ?>
														   <span  class="btn btn-success" style="cursor: none;">Assigned Job </span>
														   <?php } else{ ?>  <span  class="btn btn-success" style="cursor: none;">Completed Job</span><?php }
													  ?>
														
													<?php }
												   }
												   else{ ?>
													<span  class="assign_job_cls" rel="<?php echo base64_encode($ResponseJobs['user_id']);?>" job_id="<?php echo base64_encode($ResponseJobs['job_id']);?>">Assign Job</span>
													<?php } ?>
												</div>
                                            </div>
											<div class="row">
												<div class="col-md-12 job-section-12" >
													<div class="col-md-6 job-avail-section">
														<p> <b>Availability :</b> <?php if(!empty($ResponseJobs['job_type_name'])) { echo $ResponseJobs['job_type_name']; } ?></p>
														<p> <b>Experience :</b> <?php if(!empty($ResponseJobs['user_experience'])) {
															echo $ResponseJobs['user_experience']; 
															
															} ?> <?php if($ResponseJobs['user_experience'] >1){ echo"Years";}else{echo"Year";}?></p>
													</div>
													 <div class="col-md-6 job-avail-section">
														<p> <b>Hourly Rate :</b> $<?php if(!empty($ResponseJobs['hourly_rate'])) { echo $ResponseJobs['hourly_rate']; } ?></p>
													 </div>
												 </div>
											 </div>
												<p> <?php if(!empty($ResponseJobs['description'])) { echo ucfirst($ResponseJobs['description']); } ?></p>
                                        </div>
                                    </div><?php 
								}
									?>
                                         
                                </div>
                            </div>

                        </form>
                    </div>
                 
                </div>
            </div>
       
<!-- Reply Modal popup -->
<div id="myReplyModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
	    <h4 class="modal-title">Reply</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
        <p><input type="hidden" id="user_id" name="user_id" value=""></p>
        <p><input type="hidden" id="job_id" name="job_id" value=""></p>
        <p><input type="hidden" id="apply_job_id" name="apply_job_id" value=""></p>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<label><b>User Name</b></label>
			<p id="userName"></p>
		</div>
		<div class="col-lg-12">
				<div class="form-group">
					<label><b>Message</b></label>
					<textarea id="editor" class="input-text" name="reply_message" placeholder="Message" required="true"></textarea>
				</div>
			<p id="reply_message_error" style="display:none;">Message field is not empty</p>	
		</div>
		
		<div class="col-lg-12 replyuplaodimagecls" >
			<div class="photoUpload photoUpload-2">
				Upload Files
				<input type="file" class="upload" name="userJobReplyFile[]" multiple id="userJobReplyFile">
			</div>
		</div>
		<div id="error-message"></div>
		<div class="col-lg-12 reply_send_btn" >
			<div class="post-btn">
				<input  type="submit" class="btn btn-md button-theme" id="send_reply" name="send_reply" value="Reply">
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!----->

<div id="myReplyModalSuccess" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
	   <h4 class="modal-title">Reply Notification</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
        <p> message has been sent successfully.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	   