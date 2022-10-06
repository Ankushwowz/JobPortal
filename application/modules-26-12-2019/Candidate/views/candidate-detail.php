	<style>.inviteUser-header  {background: #376bff; color:#fff;} .inviteUser-header h4 {color:#fff; float:left;}
	#invite-error {color:red;     margin: 0 0 0 81px;}
	.inviteUsersuccess-header  {background: #376bff; color:#fff;} .inviteUsersuccess-header h4 {color:#fff; float:left;}
	#alreadly-invite-project {color:red;}
	.checked {
  color: orange;
}
	</style>
	<div class="sub-banner bg-color-full">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Candidates Listing</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Candidates Listing</li>
            </ul>
        </div>
    </div>
</div>
<!-- Candidate section start -->
<div class="candidate-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- job box start -->
                <div class="job-box-2">
                    <div class="company-logo">
                        
						<?php if(!empty($CandidateProfile['image'])) {?>
                        <img src="<?php echo base_url();?>assets/img/profileimage/<?php echo $CandidateProfile['image'];?>" alt="avatar">
						<?php } else {?>
						<img  src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
						<?php } ?>
						
                    </div>
                    <div class="description">
                        <h5 class="title"><a href="#"><?php if(!empty($CandidateProfile['fullname'])) { echo  ucfirst($CandidateProfile['fullname']);}?></a></h5>
						<span class="tagline"><?php if(!empty($CandidateProfile['tagline'])) { echo  $CandidateProfile['tagline'];}?></span>
                        <div class="candidate-listing-footer">
                            <ul>
                                <li><i class="flaticon-tick"></i> <?php if(!empty($CandidateProfile['category_name'])) { echo  $CandidateProfile['category_name'];}?><?php if(!empty($CandidateProfile['subcategory_name'])) { echo"/".  $CandidateProfile['subcategory_name'];}?></li>
                                <li><i class="flaticon-pin"></i><?php if(!empty($CandidateProfile['CountryName'])) { echo  $CandidateProfile['CountryName'];}?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="hr-boder clearfix">
                <!-- about me start -->
                <div class="about-me mb-40">
                    <h3 class="heading-2">About Me</h3>
                   <?php if(!empty($CandidateProfile['description'])) { echo  $CandidateProfile['description'];}?>
                </div>
                <!-- Education start-->
				<?php if(count($CandidateEducation) > 0) {?>
                <div class="education mb-50">
                    <h3 class="heading-2">Education</h3>
					<?php foreach($CandidateEducation as $CandidateEducation) {?>
                    <div class="education-box">
                        <div class="icon">
                            <i class="flaticon-mortarboard"></i>
                        </div>
                        <div class="employer-info">
                            <h5> <?php if(!empty($CandidateEducation['degree'])) { echo  $CandidateEducation['degree'];}?> <span> / <?php if(!empty($CandidateEducation['college_university'])) { echo  $CandidateEducation['college_university'];}?></span></h5>
                            <h6><?php if(!empty($CandidateEducation['passing_year'])) { echo  $CandidateEducation['passing_year'];}?></h6>
                            <p><?php if(!empty($CandidateEducation['CountryName'])) { echo  $CandidateEducation['CountryName'];}?>.</p>
                        </div>
                    </div><?php 
					}?>
                </div><?php } ?>
				
                <!-- Work experiance start-->
				<?php if(count($CandidateSkill) > 0) {?>
                <div class="work-experiance mb-50">
                    <h3 class="heading-2">Skill</h3>
					<?php foreach($CandidateSkill as $CandidateSkill) {?>
                    <div class="education-box">
                        <div class="icon">
                            <i class="flaticon-work"></i>
                        </div>
                        <div class="employer-info">
                            <h5><?php if(!empty($CandidateSkill['skill_name'])) { echo  $CandidateSkill['skill_name'];}?> </h5>
                            <h6><?php if(!empty($CandidateSkill['skill_level_name'])) { echo  $CandidateSkill['skill_level_name'];}?></h6>
                           
                        </div>
                    </div><?php 
					}?>
                  </div><?php } ?>
				
				<div class="work-experiance mb-50">
                    <h3 class="heading-2">Language</h3>
					<?php foreach($Candidatelanguage as $Candidatelanguage) {?>
                    <div class="education-box">
                        <div class="icon">
                            <i class="flaticon-work"></i>
                        </div>
                        <div class="employer-info">
                            <h5><?php if(!empty($Candidatelanguage['language_name'])) { echo  $Candidatelanguage['language_name'];}?> </h5>
                            <h6><?php if(!empty($Candidatelanguage['language_level'])) { echo  $Candidatelanguage['language_level'];}?></h6>
                           
                        </div>
                    </div><?php 
					}?>
                  
                </div>
				<?php if(count($CandidateCertification) > 0) {?>
				<div class="work-experiance mb-50">
                    <h3 class="heading-2">Certification</h3>
					<?php foreach($CandidateCertification as $CandidateCertification) {?>
                    <div class="education-box">
                        <div class="icon">
                            <i class="flaticon-work"></i>
                        </div>
                        <div class="employer-info">
                            <h5><?php if(!empty($CandidateCertification['certification_name'])) { echo  $CandidateCertification['certification_name'];}?> <span> / <?php if(!empty($CandidateCertification['certification_from'])) { echo  $CandidateCertification['certification_from'];}?></span> </h5>
                            <h6><?php if(!empty($CandidateCertification['certification_year'])) { echo  $CandidateCertification['certification_year'];}?></h6>
                           
                        </div>
                    </div><?php 
					}?>
                 </div><?php 
					}?>
					<?php if(count($CandidateProjectRatting) > 0){?>
					 <h3 class="heading-2">Work History</h3>
					 <?php foreach($CandidateProjectRatting as $ProjectRatting ){ ?>
						<ul class="list-unstyled">
						<div class="row">
						<div class="col-sm-8">
						<h4 class="m-xs-bottom"><a  href=""><?php if(!empty($ProjectRatting['job_title'])) { echo $ProjectRatting['job_title'];}?></a></h4>


						<ul class="list-inline">
						
						<li><?php for($i=0; $i<5; $i++){?>
						<span class="fa fa-star <?php if(round($ProjectRatting['average_ratting'])>$i){ echo'checked';}?>"></span>
							<?php } ?></li>
						<li><span><?php echo date("M d,Y", strtotime($ProjectRatting['created_at'])); ?></span></li>
						</ul>
						<!----><!----><!---->
						<div>
						<p class="m-0 break text-pre-line"><?php if(!empty($ProjectRatting['general_feedback'])) { echo $ProjectRatting['general_feedback'];}?>
						</p>
						<!---->
						</div>
						</div>
						</div>
						</ul>
						<hr><?php }
						}?>

				
				
				
				
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
				<?php if(count($CandidatePortfolio)) { ?>
                <div class="portfolio">
                    <h3 class="heading-2">Portfolio</h3>
                    <div class="container">
                        <div class="slick-slider-area">
                            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                               <?php foreach($CandidatePortfolio  as $CandidatePortfolio) {
								   	$ext = pathinfo($CandidatePortfolio['portfolio']);
								   ?>
							   <div class="slick-slide-item">
                                    <div class="portfolio-item">
                                        <a href="<?php echo base_url();?>assets/img/portfolio/<?php echo $ext['filename'].'.'.$ext['extension'];?>" title="Portfolio">
                                            <img src="<?php echo base_url();?>assets/img/portfolio/thumbnail/<?php echo $ext['filename'].'_thumb.'.$ext['extension'];?>" alt="gallery" class="img-fluid">
                                        </a>
                                        <div class="portfolio-content">
                                            <div class="portfolio-content-inner">
                                                <p>Portfolio</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php 
							   }?>
                             
                           
                                
                            </div>
                            <div class="slick-prev slick-arrow-buton">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <div class="slick-next slick-arrow-buton">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div><?php 
				} ?>
				
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right-2">
                    	<?php if(!empty($this->session->userdata('Session_data'))){
								$UserData = $this->session->userdata('Session_data');
								$user_role = $UserData['role']; 
								if($user_role==2){
									?>
									<div class="form-group mb-0">
									<button class="search-button button-theme" data-toggle="modal" data-target="#inviteUser">Invite</button>
									</div><?php 
								}
							} ?>
                    <!-- Job overview start -->
                    <div class="job-overview widget">
                        <h3 class="sidebar-title">Job Overview</h3>
                        <div class="s-border"></div>
                        <ul>
                            <li><i class="flaticon-money"></i><h5>Hourly rate</h5><span>$<?php if(!empty($CandidateProfile['hourly_rate'])) { echo $CandidateProfile['hourly_rate']; } ?></span></li>
                            <li><i class="flaticon-pin"></i><h5>Location</h5><span><?php if(!empty($CandidateProfile['CountryName'])) { echo $CandidateProfile['CountryName']; } ?></span></li>
                            <li><i class="flaticon-woman"></i><h5>Gender</h5><span><?php if(!empty($CandidateProfile['gender']) && $CandidateProfile['gender']==1) { echo"Male";  } ?><?php if(!empty($CandidateProfile['gender']) && $CandidateProfile['gender']==2) { echo"Female";  } ?></span></li>
                            <li><i class="flaticon-work"></i><h5>Job Type</h5><span><?php if(!empty($CandidateProfile['job_type_name'])) { echo $CandidateProfile['job_type_name']; } ?></span></li>
                           
                            <li><i class="flaticon-notepad"></i><h5>Experience</h5><span><?php if(!empty($CandidateProfile['user_experience'])) { echo $CandidateProfile['user_experience'].' Year'; } ?> </span></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Quick contact start -->
                <?php /*

				<div class="widget-5 contact-2 quick-contact">
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
                    </div>
					*/
					?>
					
                </div>
            </div>
        </div>
    </div>
</div>



<div id="inviteUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="inviteUser-header modal-header">
       <h4 class="modal-title">Invite User</h4>
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
			<div class="form-group">
					<label><b>Select Project</b></label>
					<select name="form-control search-fields" id="projectId" name="projectId">
					<option value="">Select Project</option>
					<?php foreach($projectlist as $projectlist){?>
					<option value="<?php echo base64_encode($projectlist['job_id']);?>"> <?php echo $projectlist['job_title'];?></option>
					<?php } ?>
					</select>
				<p id="invite-error" style="display:none;">Please select project</p>
				<p id="alreadly-invite-project" style="display:none;">You are alreadly invited this candiate for this project</p>				
			</div>
			<input type="hidden" value="<?php if(!empty($this->uri->segment(2))) { echo  $this->uri->segment(2);}?>" name="candidate_user_id"  id="candidate_user_id" />
			<input  type="button" class="btn btn-success"  name="sendInvitation" id="sendInvitation" value="Send">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





<div id="inviteUsersuccess" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="inviteUsersuccess-header modal-header">
       <h4 class="modal-title">Invite User</h4>
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
     <p>Your invitation has been sent successfully.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
