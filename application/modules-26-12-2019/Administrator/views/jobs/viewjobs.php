<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        
                    </div>
                    <div class="submit-address dashboard-list">
            
                            <h4 class="bg-grea-3">View Job</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Created By:</label>
                                            <?php echo $Jobs['fullname']; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Job Title:</label>
                                            <?php echo $Jobs['job_title']; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Job Type:</label>
                                            <?php echo $Jobs['job_type_name']; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Category:</label>
                                            <?php echo $Jobs['category_name']; ?>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Budget:</label>
                                            $<?php echo $Jobs['job_amount']; ?>
                                            
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Job Description</label>
                                           <?php echo $Jobs['job_description']; ?>
                                        </div>
                                    </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                     <label>Upload File:</label>
                                    <?php if(!empty($Jobs['job_file'])) { ?>
                                        <a  target="_blank" href="<?php echo base_url();?>assets/img/jobs/<?php echo $Jobs['job_file'];?>">Download file</a>
                                    <?php }?>
                                      </div>
                                </div>
                                
                                 <div class="col-lg-12">
                                   <div class="form-group">
                                   <label>Skill:</label>
                                    <?php if(count($JobSkills) >0){?>
                                            <ul class="items-list" id="skill-div-ul">
                                            <?php
                                            foreach($JobSkills as $JobSkills){?>
                                                <li id="jobsskill_<?php echo $JobSkills['job_skill_id'];?>">
                                                <span class="title"><?php echo $JobSkills['skill_name'];?> </span> 
                                                
                                                
                                                </li><?php 
                                            }?>
                                            </ul><?php 
                                        }   ?>
                                        
                                </div>
                                </div>
                                </div>
                            </div>

                      
                    </div>
                    
                </div>
            </div>
            