
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        
                    </div>
                    <div class="submit-address dashboard-list">
					<?php if($this->session->flashdata('success')){  
						echo '<div class="alert alert-success icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                           </button>
                           
                           <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                        <?php } ?>
               <form  enctype="multipart/form-data" action="<?php echo base_url();?>createjob" method="POST" role="form" novalidate="" id="job_post_form">
                     
                            <h4 class="bg-grea-3">Post Job</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <input type="text" class="input-text" name="job_title" placeholder="Your Title"  required="true" maxlength="250">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Job Type</label>
                                            
											<select class="form-control search-fields" name="job_type"  required="true">
                                                <option value="">Job Type</option>
												<?php foreach($JobType as $JobType) {?>
                                                <option value="<?php echo $JobType['job_type_id']?>"><?php echo $JobType['job_type_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Choose a category</label>
                                           <select class="form-control search-fields" name="job_category"  required="true">
                                                <option value="">Job Category</option>
                                                <?php foreach($JobCategory as $JobCategory) {?>
                                                <option value="<?php echo $JobCategory['category_id']?>"><?php echo $JobCategory['category_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>What is your budget for this service?</label>
                                            <input type="text" class="input-text digits-cls" name="job_amount" placeholder="USD" required="true" maxlength="10" size="10">
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Job Description</label>
                                            <textarea id="editor1" class="input-text" name="job_description" placeholder="Detailed Information" required="true"></textarea>
                                        </div>
                                    </div>
									
									<div class="col-lg-6">
                                                    <div class="form-group name">
                                                        <label>Add Skill</label>
                                                        <input type="text" id="addSkill" name="addSkill" class="form-control typeahead enterblock" placeholder="Add Skill" autocomplete="off" >
														<input type="hidden" id="skillID" name="skillID" class="form-control">
                                                    </div>
													
                                                </div>
									<div class="send-btn col-lg-6">
										<span class="btn btn-md button-theme" name="addjobSkillBtn" value="" id="addjobSkillBtn"> Save Skills</span>
									</div>		
									<div id="skill-div"><ul class="items-list" id="skill-div-ul">
									</ul></div>
                                    <div class="col-lg-12">
                                        <div class="photoUpload photoUpload-2">
                                            Upload File
                                            <input type="file" class="upload" name="userfile" id="userfile_id" onchange="uploadFile()">
											
                                        </div>
                                        <div class="post-btn">
										<input type="hidden"  name="skill_array" id="skill_array">
										<input type="hidden" class="input-text" name="uploadfilesName"   id="uploadfilesName" >
										</div>
										
										<!--<p id="loaded_n_total"></p>-->
                                    </div>
                                    <div class="col-lg-12">
									
									 <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
										<h3 id="status"></h3>
									<p id="sizeerror" style="display:none; color:red;">Uplaod size less than or Equal to 8 Mb</p>
									</div>
									<div class="col-lg-12" style="margin-top:10px;">
									<input  type="submit" class="btn btn-md button-theme" name="postJob" value="Post a job">
									</div>
                                </div>
                            </div>

                        </form>
				
                    </div>
                
                </div>
            </div>
			