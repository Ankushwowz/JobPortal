<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Invite Jobs</h4></div>
                                 <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a  style="color:#376bff;" target="_blank" href="<?php echo base_url();?>candidate-list">Invite User</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="dashboard-list">
                            <div class="job-info job-info-2">
                                <table class="table" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Category</th>
                                        <th class="hdn">Date</th>
                                       <th>Applicant</th>
                                       <th>Amount</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php 
									
									foreach($ResponseJobs as $ResponseJobs){ ?>
                                    <tr class="responsive-table" id="job-<?php echo $ResponseJobs['jobID'];?>">
                                      
                                        <td class="p-left-20">
                                            <div class="inner">
                                                <h5><a href="<?php echo base_url();?>view-invite-response-job/<?php echo base64_encode($ResponseJobs['jobID']);?>"><?php echo $ResponseJobs['job_title']?></a></h5>
                                                
                                            </div>
                                        </td>
										 <td><?php echo $ResponseJobs['category_name']?></td>
                                        <td class="hdn">
										<?php echo date("M d,Y", strtotime($ResponseJobs['created_at'])); ?></td>
                                      
                                       
                                        <td><?php echo $ResponseJobs['total']?></td>
                                        <td>$<?php echo $ResponseJobs['job_amount']?></td>
                                        
                                    </tr><?php 
									}
									?>
									
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>