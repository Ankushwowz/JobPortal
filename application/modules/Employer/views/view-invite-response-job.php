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
 </style> 
 
  <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Invite Jobs Users</h4></div>
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
                                           <a  target="_blank" href="<?php echo base_url()?>view-profile/<?php echo base64_encode($ResponseJobs['candidate_id']);?>">
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
												   <?php if(!empty($ResponseJobs['job_status']) && $ResponseJobs['job_status']=='1'){?>
												   <span class="btn1 btn-success1" style="color:#376bff;">Accepted</span>
												   <?php } ?>
												   <?php if(!empty($ResponseJobs['job_status']) && $ResponseJobs['job_status']=='2'){?>
												   <span class="btn1 btn-danger1">Rejected</span>
												   <?php } ?>
												      <?php if(!empty($ResponseJobs['job_status']) && $ResponseJobs['job_status']=='3'){?>
												   <span class="btn1 btn-info1" style="color:#376bff;">Assigned</span>
												   <?php } ?>
												   <?php if(!empty($ResponseJobs['job_status']) && $ResponseJobs['job_status']=='4'){?>
												   <span class="btn1 btn-info1" style="color:darkred;">Pending</span>
												   <?php } ?>
												 <?php if(!empty($ResponseJobs['job_status']) && $ResponseJobs['job_status']=='5'){?>
												   <span class="btn1 btn-info1" style="color:green;">Completed</span>
												   <?php } ?>
												  <!-- <a href="#" data-toggle="modal" data-target="#myReplyModal"  onclick="replyUserByJob('<?php //echo base64_encode($ResponseJobs['candidate_id']);?>','<?php //echo base64_encode($ResponseJobs['project_id']);?>','<?php //echo ucfirst($ResponseJobs['fullname']);?>')" >Reply</a>-->
												  <?php if($ResponseJobs['job_status']==1 && $checkAssignCount==0){?>
												 <button type="button" class="btn btn-primary assign_job" rel="<?php echo $ResponseJobs['invite_user_id'];?>" >Assign Job</button>
												  <?php } ?>
												  
												    
												  <?php if(!empty($ResponseJobs['job_status']) && $ResponseJobs['job_status']=='3'){?>
												  <!--<a href="<?php //echo base_url()?>escrow/<?php //echo base64_encode($ResponseJobs['job_id']);?>/<?php //echo base64_encode($ResponseJobs['candidate_id']);?>">Escrow</a>-->
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
		<div class="col-lg-6 col-md-6 col-sm-12">
			<label><b>User Name</b></label>
			<p id="userName"></p>
		</div>
		<div class="col-lg-12">
				<div class="form-group">
					<label><b>Message</b></label>
					<textarea id="editor1" class="input-text" name="reply_message" placeholder="Message" required="true"></textarea>
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
        <p> Message has been send successfully.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	   