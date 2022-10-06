<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Edit Profile</h4></div>
                                <?php /*
								<div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.html">Index</a>
                                            </li>
                                            <li>
                                                <a href="dashboard.html">Dashboard</a>
                                            </li>
                                            <li class="active">Edit Profile</li>
                                        </ul>
                                    </div>
                                </div>
								<?php */ ?>
                            </div>
                        </div>
                        <div class="dashboard-list">
						<?php if($this->session->flashdata('success')){  
						echo '<div class="alert alert-success icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                           </button>
                           
                           <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                        <?php } ?>
						<?php echo validation_errors(); ?>
						<?php  $UserRole = $this->session->userdata('Session_data'); ?>
                            <h3 class="heading">Basic Info</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">
							 
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
									
                                        <!-- Edit profile photo -->
                                        <div class="edit-profile-photo">
										<?php if(!empty($user['image'])) {?>
										    
                                            <img   src="<?php echo base_url();?>assets/img/profileimage/<?php echo $user['image'];?>" alt="profile-photo" class="img-fluid userimage">
											
										<?php } else{ ?>
										
										<img  src="<?php echo base_url();?>assets/img/avatar/avatar-6.jpg" alt="profile-photo" class="img-fluid userimage">
									
										<?php } ?>
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input type="file" class="upload" name="userfile" id="userfile">
                                                    <input type="hidden"  name="oldProfileImage" value="<?php if(!empty($user['image'])) { echo $user['image'];}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-image-error"></div>
                                    </div>
									
                                    <div class="col-lg-9 col-md-9">
                                       <form  enctype="multipart/form-data" action="<?php echo base_url();?>edit-profile" method="POST" role="form" novalidate="" id="edit_profile_form">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Your Name</label>
                                                        <input type="text" name="fullname" class="form-control" placeholder="Your Name" value="<?php if(!empty($user['fullname'])) { echo $user['fullname'];}?>" required="true">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group subject">
                                                        <label>Phone</label>
                                                        <input type="text" name="phoneNo" class="form-control digits-cls" placeholder="Phone" required="true" value="<?php if(!empty($user['phoneNo'])) { echo $user['phoneNo'];}?>" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Country</label>
														<select name="country" id="country" class="form-control" required="true">
														<option value="">Select Counrty</option>
														<?php foreach($Country as $country){?>
														<option value="<?php echo $country['id']?>" <?php if(!empty($user['country'])){ 
														if($country['id']==$user['country']) { echo"selected";}}?>><?php echo $country['name']?></option>
														<?php } ?>
														</select>
                                                       
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>State</label>
														<select name="state" id="state" class="form-control" required="true">
															<option value="">Select State</option>
														</select>
														<input type="hidden" name="stateTxt" id="stateTxt" class="form-control" value="<?php if(!empty($user['state'])) { echo $user['state'];}?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>City</label>
                                                        <select name="city" id="city" class="form-control" required="true">
														<option value="">Select City</option>
														</select>
														<input type="hidden" name="cityTxt" id="cityTxt" class="form-control" value="<?php if(!empty($user['city'])) { echo $user['city'];}?>">
                                                    </div>
                                                </div>
												<?php if($UserRole['role']==1) {?>
												 <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Category</label>
														<select name="category" id="category" class="form-control" required="true">
															<option value="">Select Category</option>
															<?php foreach($Category as $Category){?>
																<option value="<?php echo $Category['category_id']?>" <?php if(!empty($user['categoryID'])){ 
														if($Category['category_id']==$user['categoryID']) { echo"selected";}}?>><?php echo $Category['category_name']?></option>
															<?php } ?>
														</select>
														
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Sub Category</label>
                                                        <select name="subcategory" id="subcategory" class="form-control" required="true">
															<option value="">Select Subcategory</option>
														</select>
														<input type="hidden" name="subcategoryTxt" id="subcategoryTxt" class="form-control" value="<?php if(!empty($user['subcategoryID'])) { echo $user['subcategoryID'];}?>">
                                                    </div>
                                                </div><?php } ?>
												
												  <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Gender</label>
                                                       <select name="gender" id="gender" class="form-control" required="true">
														<option value="">Select Gender</option>
														<option value="1" <?php if(!empty($user['gender'])){ 
														if($user['gender']==1) { echo"selected";}}?>>Male</option>
														<option value="2" <?php if(!empty($user['gender'])){ 
														if($user['gender']==2) { echo"selected";}}?>>Female</option>
														<option value="3" <?php if(!empty($user['gender'])){ 
														if($user['gender']==3) { echo"selected";}}?>>Others</option>
														</select>
														
                                                    </div>
                                                </div>
												<?php if($UserRole['role']==1) {?>
												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="form-group">
														<label>Availability</label>
														<select class="form-control search-fields" name="user_availability"  required="true">
															<option value="">Availability</option>
															<?php foreach($JobType as $JobType) {?>
																<option value="<?php echo $JobType['job_type_id']?>" <?php if(!empty($user['user_availability'])){ 
														if($JobType['job_type_id']==$user['user_availability']) { echo"selected";}}?>><?php echo $JobType['job_type_name']?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="form-group">
														<label>How Much Experience</label>
														
														<select class="form-control search-fields" name="user_experience"  required="true">
														<option value="">Select Experience</option>
														<?php for ($i = 1; $i <= 10; $i++){?>
															<option value="<?php echo $i;?>" <?php if(!empty($user['user_experience'])){ 
																if($i==$user['user_experience']) { echo"selected";}}?>><?php if($i <= 1){ echo $i.' Year';}else{ echo $i.' Years';}?>
															</option>
														<?php }?>
														</select>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="form-group">
														<label>Hourly Rate</label>
														<select class="form-control search-fields" name="hourly_rate"  required="true">
														<option value="">Select Hourly Rate</option>
														<?php for ($i = 1; $i <= 100; $i++){?>
															<option value="<?php echo $i;?>" <?php if(!empty($user['hourly_rate'])){ 
																if($i==$user['hourly_rate']) { echo"selected";}}?>><?php  echo $i?>
															</option>
														<?php }?>
														</select>
													</div>
												</div>
												<?php } ?>
												
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group mb-0 message">
                                                        <label>Address</label>
                                                        <textarea style="min-height: 150px;" rows="5" class="form-control" name="address" placeholder="Address" required="true"><?php if(!empty($user['address'])) { echo $user['address'];}?></textarea>
                                                    </div>
                                                </div>
                                                
                                                
                                              
											<br>
											<div class="row" style="margin-top: 16px;">
											 <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input  type="submit" class="btn btn-md button-theme" name="edit_profie" value="Save Profile">
                                                    </div>
                                                </div>
                                                </div>
                                       </form>
                                    </div>
									 
                                </div>
								
								
                            </div>
                        </div>
						
						
                        <?php 
                        if($UserRole['role']==1) {?>
						
						 <div class="row">
                         <div class="col-md-12">
                                <div class="dashboard-list">
                                   <?php //echo validation_errors(); ?>
                                    <div class="dashboard-message contact-2">
                                       <form action="<?php echo base_url();?>edit-profile" method="POST" role="form" novalidate="" id="paymentmodeform">
                                            <div class="row">
                                              <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group mb-0 message">
                                                        <label>Payment preference</label>
                                                        <div class="radio">
                                                        <input class="paymentmode" type="radio" name="payment_mode" 

                                                        <?php 
                                                            if($user['payment_mode']==0){
                                                                echo"checked";
                                                            
                                                            }?> value="0" required="true"> PayPal
                                                        </div>
                                                        <div class="radio">
                                                        <input  class="paymentmode" type="radio" name="payment_mode" <?php 
                                                            if($user['payment_mode']==1){
                                                                echo"checked";
                                                            }?> value="1"> Stripe
                                                        </div>
                                                    </div>
                                                </div>
                                                


                                                 <div class="col-lg-12 col-md-12 col-sm-12" id="paypalDiv" style="display:<?php 
                                                            if($user['payment_mode']==0){
                                                                echo"block";
                                                            
                                                            }else{
                                                              echo"none";  
                                                            }?>">
                                                    <div class="form-group mb-0 message">
                                                        <label>Paypal Id</label>
                                                        <input type="text" id="paypal_id" name="paypal_id" class="form-control" placeholder="paypal Id" value="<?php if(!empty($user['paypal_id'])) { echo $user['paypal_id'];}?>" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12" id="stripeDiv" style="display:<?php 
                                                            if($user['payment_mode']==1){
                                                                echo"block";
                                                            
                                                            }else{  echo"none"; }?>">
                                                
                                                    <div class="form-group mb-0 message">
                                                        <label>Stripe key</label>
                                                        <input type="text" id="stripe_key" name="stripe_key" class="form-control" placeholder="stripe key" value="<?php if(!empty($user['stripe_key'])) { echo $user['stripe_key'];}?>" >
                                                    </div>
                                               
                                               
                                                    <div class="form-group mb-0 message">
                                                        <label>Stripe Secret</label>
                                                        <input type="text" id="stripe_secret" name="stripe_secret" class="form-control" placeholder="Stripe Secret"  value="<?php if(!empty($user['stripe_secret'])) { echo $user['stripe_secret'];}?>" >
                                                    </div>

                                                
                                            </div>
                                               
                                                <div class="col-lg-12" style="margin-top:20px;">
                                                    <div class="send-btn">
                                                        <input  type="submit" class="btn btn-md button-theme" name="paymentModeBtn" value="Add payment Method">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
						
						<?php } ?>
						  <div class="row">
						 <div class="col-md-12">
                                <div class="dashboard-list">
                                   <?php //echo validation_errors(); ?>
                                    <div class="dashboard-message contact-2">
                                       <form action="<?php echo base_url();?>changetagline" method="POST" role="form" novalidate="" id="changetagline">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>What's your story in one line?</label>
                                                        <input type="text" name="tagline" class="form-control" placeholder="What's your story in one line?" required="true" value="<?php if(!empty($user['tagline'])) { echo $user['tagline'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>Description</label>
                                                       <textarea id="editor1" class="form-control" name="description" placeholder="description" required="true"><?php if(!empty($user['description'])) { echo $user['description'];}?></textarea>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input  type="submit" class="btn btn-md button-theme" name="save-changes" value="Save Changes">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						
						</div>
						<?php 
						if($UserRole['role']==1) {?>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="dashboard-list">
                                    <h3 class="heading">Languages</h3>
                                    <div class="dashboard-message contact-2">
                                      <form action="#" method="POST" role="form" novalidate="" id="addlanguage_form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Add Language</label>
                                                        <input type="text" id="addLanguage" name="AddLanguage" class="form-control typeahead" placeholder="Add Language" autocomplete="off" required="true">
														<input type="hidden" id="languageID" name="languageID" class="form-control">
                                                    </div>
													 <div class="form-group name">
                                                        <label>Language Level</label>
														 <select name="LanguageLevel" id="LanguageLevel" class="form-control" required="true" required="true">
														<option value="">Language Level</option>
														<?php foreach($Languagelevel as $Language){?>
														 <option value="<?php echo $Language['languages_level_id']?>"><?php echo $Language['language_name']?></option>
														<?php }?>
														</select>
                                                       
                                                    </div>
                                                </div>
                                               <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input type="submit" class="btn btn-md button-theme" id="addlanguageBtn" name="addlanguageBtn"value="Save Language"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
										<div class="row">
										<div class="col-lg-12 s-language-cls">
										<div id="language-div">
										<?php if(count($UserLanguage) >0){?>
												<ul class="items-list">
												<?php
												foreach($UserLanguage as $UserLanguage){?>
													<li id="lang_<?php echo $UserLanguage['user_language_id'];?>">
													<span class="title"><?php echo $UserLanguage['language_name'];?> </span> - <span class="sub-title"><?php echo $UserLanguage['languageLevelName'];?></span>
													<!--<span class="edit-language"><i class="fa fa-edit"></i></span>-->
													<span class="delete-lang delete-icon-btn"><i class="fa fa-trash delete-language" rel="<?php echo $UserLanguage['user_language_id'];?>"></i></span>
													</li><?php 
												}?>
												</ul><?php 
											} ?>
										</div>
										</div>
										</div>
                                    </div>
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="dashboard-list">
								<h3 class="heading">Skills</h3>
                                   <?php //echo validation_errors(); ?>
                                    <div class="dashboard-message contact-2">
                                         <form action="#" method="POST" role="form" novalidate="" id="skills_form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Add Skill</label>
                                                        <input type="text" id="addSkill" name="addSkill" class="form-control typeahead" placeholder="Add Skill" autocomplete="off" required="true">
														<input type="hidden" id="skillID" name="skillID" class="form-control">
                                                    </div>
													 <div class="form-group name">
                                                        <label>Experience Level</label>
														 <select name="ExperienceLevel" id="ExperienceLevel" class="form-control" required="true" required="true">
														<option value="">Experience Level</option>
														<?php foreach($Experience as $Experience){?>
														 <option value="<?php echo $Experience['skill_level_id']?>"><?php echo $Experience['skill_level_name']?></option>
														<?php }?>
														</select>
                                                       
                                                    </div>
                                                </div>
                                               <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input type="submit" class="btn btn-md button-theme" name="addSkillBtn"value="Save Skills" id="addSkillBtn"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
										<div class="row">
										<div class="col-lg-12 s-language-cls">
									
											<div id="skill-div">
											<?php if(count($UserSkills) >0){?>
													<ul class="items-list">
													<?php
													foreach($UserSkills as $UserSkills){?>
														<li id="skill_<?php echo $UserSkills['user_skill_id'];?>">
														<span class="title"><?php echo $UserSkills['skill_name'];?> </span> - <span class="sub-title"><?php echo $UserSkills['skilllevelName'];?></span>
														<!--<span class="edit-language"><i class="fa fa-edit"></i></span>-->
														<span class="delete-skil delete-icon-btn"><i class="fa fa-trash delete-skill" rel="<?php echo $UserSkills['user_skill_id'];?>"></i></span>
														</li><?php 
													}?>
													</ul><?php 
												}	?>
											</div>
										
										</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-md-6">
                                <div class="dashboard-list">
                                    <h3 class="heading">Education</h3>
                                    <div class="dashboard-message contact-2">
                                      <form action="#" method="POST" role="form" novalidate="" id="education_form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>County of College/University</label>
														<select name="CountyofCollege" id="CountyofCollege" class="form-control" required="true" required="true">
														<option value="">County of College/University</option>
														<?php foreach($Country as $country){?>
														 <option value="<?php echo $country['id']?>"><?php echo $country['name']?></option>
														<?php }?>
														</select>
                                                    </div>
													 <div class="form-group name">
                                                        <label>College/University Name</label>
														 <input type="text" id="CollegeName" name="CollegeName" class="form-control" placeholder="College/University Name" autocomplete="off" required="true">
                                                       
                                                    </div>
													  <div class="form-group name">
                                                        <label>Title/Degree</label>
														<input type="text" id="degree" name="degree" class="form-control" placeholder="Title/Degree" autocomplete="off" required="true">
                                                    </div>
													<div class="form-group name">
                                                        <label>Year of graduation</label>
														<?php $currentYear =  date("Y"); ?>
														<select name="Yearofgraduation" id="Yearofgraduation" class="form-control" required="true" required="true">
														<option value="">Year of graduation</option>
														
														<?php for ($i = $currentYear; $i > 1960; $i--){?>
														 <option value="<?php echo $i;?>"><?php echo $i;?></option>
														<?php }?>
														</select>
                                                    </div>
                                                </div>
                                               <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input type="submit" class="btn btn-md button-theme" name="addEducationBtn"value="Save Education" id="addEducationBtn">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
									<div class="row">
									<div class="col-lg-12 s-language-cls">
									
											<div id="education-div">
											<?php if(count($UserEducation) >0){ ?>
												<ul class="items-list">
												<?php
												foreach($UserEducation as $UserEducation){?>
													<li id="education_<?php echo $UserEducation['education_id'];?>">
													<span class="title"><?php echo $UserEducation['degree'];?> </span> - <span class="sub-title"><?php echo $UserEducation['college_university'];?></span>
													<span class="delete-edu delete-icon-btn"><i class="fa fa-trash delete-education" rel="<?php echo $UserEducation['education_id'];?>"></i></span>
													<h6 class="sub-title"><?php 
													echo $UserEducation['name'].','.$UserEducation['passing_year'];?></h6>
													</li><?php 
												}?>
												</ul><?php 
											}	?>
											</div>
									</div>
									</div>
                                    </div>
                                </div>
                            </div>
							 <div class="col-md-6">
                                <div class="dashboard-list">
                                    <h3 class="heading">Certification</h3>
                                    <div class="dashboard-message contact-2">
                                      <form action="#" method="POST" role="form" novalidate="" id="certification_form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Certificate Or Award</label>
														 <input type="text" id="CertificateOrAward" name="CertificateOrAward" class="form-control" placeholder="Certificate Or Award" autocomplete="off" required="true">
                                                    </div>
													<div class="form-group name">
                                                        <label>Certified From (E.G. Adobe)</label>
														<input type="text" id="CertifiedFrom" name="CertifiedFrom" class="form-control" placeholder="Certified From (E.G. Adobe)" autocomplete="off" required="true">
                                                    </div>
													<div class="form-group name">
                                                        <label>Year</label>
														<?php $currentsYear =  date("Y"); ?>
														<select name="YearofCertified" id="YearofCertified" class="form-control" required="true" required="true">
														<option value="">Year</option>
														
														<?php for ($i = $currentsYear; $i > 1960; $i--){?>
														 <option value="<?php echo $i;?>"><?php echo $i;?></option>
														<?php }?>
														</select>
                                                    </div>
                                                </div>
                                               <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input type="submit" class="btn btn-md button-theme" name="addEducationBtn"value="Save Certification" id="addEducationBtn">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
										<div class="row">
										<div class="col-lg-12 s-language-cls">
										<div id="certification-div">
										<?php if(count($UserCertification) >0){ ?>
													<ul class="items-list">
													<?php
													foreach($UserCertification as $UserCertification){?>
														<li id="certi_<?php echo $UserCertification['certification_id'];?>">
														<span class="title"><?php echo $UserCertification['certification_name'];?> </span> 
														<span class="delete-certi delete-icon-btn"><i class="fa fa-trash delete-certification" rel="<?php echo $UserCertification['certification_id'];?>"></i></span>
														<h6 class="sub-title"><?php 
														echo $UserCertification['certification_from'].','.$UserCertification['certification_year'];?></h6>
														</li><?php 
													}?>
													</ul><?php 
										}	?>
												</div>
										</div>
									</div>
                                    </div>
                                </div>
                            </div>
						</div>
					
				
					<div class="row">
					<div class="col-md-12">
						<h3 class="heading">Portfolio</h3>
						<form  enctype="multipart/form-data" action="<?php echo base_url();?>portfolio" method="POST" role="form" novalidate="" 
						id="edit_portfolio_form">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label>Upload Portfolio</label>
									<input type="file"  class="form-control" name="uploadPortfolio"  required="true"  id="uploadPortfolio">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="send-btn">
									<input type="submit" class="btn btn-md button-theme" name="addPortfolio" value="Save Portfolio" id="addPortfolio">
								</div>
							</div>
						</form>
					</div>
					</div>
					<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
					<table class="table table-striped">
					<thead>
						<tr>
							<th>Portfolio Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($UserPortfolio as $UserPortfolio) {
						$ext = pathinfo($UserPortfolio['portfolio']);
				       ?>
						<tr id="portfolio-<?php echo $UserPortfolio['portfolio_id'];?>">
							<td><img  width="150" src="<?php echo base_url();?>assets/img/portfolio/thumbnail/<?php echo $ext['filename'].'_thumb.'.$ext['extension'];?>"  class="img-fluid "></td>
							<td><button class="btn btn-danger delete-portfolio" rel="<?php echo $UserPortfolio['portfolio_id'];?>">Delete</button></td>
						</tr>
					<?php } ?>
					</tbody>
					</table>
					</div>
					</div>
					<?php } ?>
                    </div>
                    <p class="sub-banner-2 text-center"></p>
                </div>
            </div>