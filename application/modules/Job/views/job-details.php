 <style>.applyNowNotLogin-header  {background: #376bff; color:#fff;} .applyNowNotLogin-header h4 {color:#fff; float:left;}
 
 .education-box .employer-info {    
    /*margin: 0 0 0 100px;*/
    margin: 0!important;
    background: #d6d1d1;
}


.education-box h5 {
    padding: 10px 10px !important;
}

.work-experiance.mb-50 {
    width: 98%!important;
}

.education-box .icon {
    display: none;
}
.education-box {
   margin:0!important;
    width: auto!important;
}
 
 </style>
 <!-- Sub banner start -->
<div class="sub-banner bg-color-full">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>JOB DETAIL</h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Job Detail</li>
            </ul>
        </div>
    </div>
</div>
 <div class="candidate-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- job box start -->
                 <h3 class="heading-2">Job Title</h3>
                <div class="job-box-2" id="jobs-page">
                    <div class="description">
                        <h5 class="title"><a href="#"><?php if(!empty($Jobs['job_title'])) { echo  $Jobs['job_title'];}?></a></h5>
						<div class="candidate-listing-footer">
                                <ul>
                                    <li><i class="flaticon-tick"></i> <?php if(!empty($Jobs['category_name'])) { echo  $Jobs['category_name'];}?></li>
									<li><i class="flaticon-time"></i> <?php if(!empty($Jobs['job_type_name'])) { echo  $Jobs['job_type_name'];}?></li>
                                    <li><i style="font-size:14px" class="fa">&#xf155;</i><?php if(!empty($Jobs['job_amount'])) { echo  $Jobs['job_amount'];}?></li>
                                </ul>
                            </div>
                    </div>
                </div>

                <hr class="hr-boder clearfix">
                <!-- about me start -->
                <div class="about-me mb-40">
                    <h3 class="heading-2">Job Description</h3>
                   <?php if(!empty($Jobs['job_description'])) { echo  $Jobs['job_description'];}?>
                </div>
             
				
                <?php if(!empty($Jobs['job_file'])) { ?> 
				 <div class="about-me mb-40">
                    <h3 class="heading-2">Attachment File</h3>
                  
				   <a target="_blank" href="<?php echo base_url();?>assets/img/jobs/<?php echo $Jobs['job_file']; ?>"><img style="width:50px; height:50px;" src="http://localhost/getwork.global/assets/img/download.png" alt="#">
					<?php echo $Jobs['job_file']; ?></a>
										
                </div>
                <?php }?>
				
				
				 
				 
                <!-- Progressbar example start -->
               <!-- <div class="progressbar-example mb-40">
                    <h3 class="heading-2">Professional Skills</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Web Development</p>
                                <p class="progress-size">80%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Consulting</p>
                                <p class="progress-size">100%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Branding & Identity</p>
                                <p class="progress-size">70%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Graphic Design</p>
                                <p class="progress-size">90%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
				
				
                <!-- Portfolio start -->
				
				
            </div>
            <div class="col-lg-4 col-md-12">
			<?php if($this->session->flashdata('success')){  
						echo '<div class="alert alert-success icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                           </button>
                           
                           <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                        <?php } ?>
                <div class="sidebar-right-2">
				
                    <div class="form-group mb-0">
					<?php if(!empty($this->session->userdata('Session_data'))){
							$UserData = $this->session->userdata('Session_data');
							$user_role = $UserData['role']; 
							if($user_role==1){
								if($applyJobsCount==0){?>
									<a href="<?php echo base_url();?>apply-job/<?php echo base64_encode($Jobs['job_id']);?>"> <button class="search-button button-theme">Apply Now</button></a><?php 
								}else{ ?>
									<button class="search-button button-theme" data-toggle="modal" data-target="#applyNowCandidateCount">Proposal Submitted</button><?php 
								}
							}
							if($user_role==2){?>
								<button class="search-button button-theme" data-toggle="modal" data-target="#applyNowOnlyCand">Apply Now</button><?php 
							}
						}else{?>
                               <button class="search-button button-theme" data-toggle="modal" data-target="#applyNowNotLogin">Apply Now</button>
					<?php } ?>
                            </div>
                    <!-- Job overview start -->
                    <div class="job-overview widget">
                        <h3 class="sidebar-title">Job Overview</h3>
                        <div class="s-border"></div>
                        <ul>
                            <li><h5>Amount</h5><span><i style="font-size:14px" class="fa">&#xf155;</i><?php if(!empty($Jobs['job_amount'])) { echo $Jobs['job_amount']; } ?></span></li>
                        </ul>
                    </div>
					  <!-- Work experiance start-->
				<?php if(count($JobSkills) > 0) {?>
                <div class="work-experiance mb-50">
                    <h3 class="heading-2">Skill</h3>
					<?php foreach($JobSkills as $JobSkills) {?>
                    <div class="education-box">
                        <div class="icon">
                            <i class="flaticon-work"></i>
                        </div>
                        <div class="employer-info">
                            <h5><?php if(!empty($JobSkills['skill_name'])) { echo  $JobSkills['skill_name'];}?> </h5>
                           
                           
                        </div>
                    </div><?php 
					}?>
                  </div><?php } ?>
                    <div class="clearfix"></div>
                    <!-- Quick contact start -->
                  <!-- <div class="widget-5 contact-2 quick-contact">
                        <h3 class="sidebar-title">Quick Contacts</h3>
                        <div class="s-border"></div>
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group message">
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                            </div>
                            <div class="send-btn">
                                <button type="submit" class="btn btn-md button-theme">Send Message</button>
                            </div>
                        </form>
                    </div>-->
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div id="applyNowNotLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="applyNowNotLogin-header modal-header">
       <h4 class="modal-title">Apply Now</h4>
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>If You want to apply this job.Please login with your valid credentials </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Candidate section end -->
<div id="applyNowOnlyCand" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="applyNowNotLogin-header modal-header">
       <h4 class="modal-title">Apply Now</h4>
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>You can't apply this job .because you are not a candidate .Only Candidate can apply this job.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="applyNowCandidateCount" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="applyNowNotLogin-header modal-header">
       <h4 class="modal-title">Apply Now</h4>
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>You can't apply this job.because you had also apply this job.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

