
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Assigned Jobs</h4></div>
                                
                            </div>
                        </div>
                        <div class="dashboard-list">
                            <div class="job-info job-info-2">
                                <table class="table" id="myTable">
                                    <thead>
                                    <tr>
									<?php if($this->session->userdata('Session_data')['role']==1){?>
										<th>Employer</th>
									<?php } ?>
										<?php if($this->session->userdata('Session_data')['role']==2){?>
										<th>Candidate</th>
									<?php } ?>
                                        <th>Job Title</th>
                                        <th>Category</th>
										<th class="hdn">Created Date</th>
                                        <th>Amount</th>
										<?php //if($this->session->userdata('Session_data')['role']==2){?>
										
                                        <?php // } ?>
										<th>Complete Job</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($JobsList as $JobsList){ ?>
                                    <tr class="responsive-table" id="job-<?php echo $JobsList['job_id'];?>">
                                       <td class="p-left-20">
									   <a  target="_blank" title="<?php echo $JobsList['fullname']?>"  href="<?php echo base_url();?>employer-view-profile/<?php echo base64_encode($JobsList['id']);?>">
									<?php if(!empty($JobsList['image'])) {?>
									<img  style="width:50px; height:50px;" src="<?php echo base_url();?>assets/img/profileimage/<?php echo $JobsList['image'];?>" alt="avatar">
									<?php } else {?>
									<img  style="width:50px; height:50px;" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
									<?php } ?>
									 </a>
									   </td>
									   
                                        <td class="p-left-20">
                                            <div class="inner">
                                                <h5><a href="<?php echo base_url();?>view-applied-job/<?php echo base64_encode($JobsList['job_id']);?>"><?php echo $JobsList['job_title']?></a></h5>
                                                <ul>
                                                   <li><i class="flaticon-time"></i> <?php echo $JobsList['job_type_name']?></li>
                                                </ul>
                                            </div>
                                        </td>
										 <td><?php echo $JobsList['category_name']?></td>
										
                                        <td class="hdn">
										<?php echo date("M d,Y", strtotime($JobsList['created_at'])); ?></td>
                                      
                                         
                                        <td>$<?php echo $JobsList['job_amount']?></td>
										<?php /*if($this->session->userdata('Session_data')['role']==2){?>
                                         
										<?php } */?>
										<td><button type="button" class="btn btn-primary complete_job" rel="<?php echo $JobsList['invite_user_id'];?>" >Complete Job</button></td>
                                    </tr><?php 
									}?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>