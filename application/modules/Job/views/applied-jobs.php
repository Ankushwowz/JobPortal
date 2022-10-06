<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Manage Response</h4></div>
                                
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
                                      
                                       <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php 
									foreach($AppliedJobs as $AppliedJobs){ ?>
                                    <tr class="responsive-table" id="job-<?php echo $AppliedJobs['job_id'];?>">
                                      
                                        <td class="p-left-20">
                                            <div class="inner">
                                                <h5><a href="<?php echo base_url();?>view-applied-job/<?php echo base64_encode($AppliedJobs['job_id']);?>"><?php echo $AppliedJobs['job_title']?></a></h5>
                                                
                                            </div>
                                        </td>
										 <td><?php echo $AppliedJobs['category_name']?></td>
                                        <td class="hdn">
										<?php echo date("M d,Y", strtotime($AppliedJobs['created_at'])); ?></td>
                                        <td>$<?php echo $AppliedJobs['job_amount']?></td>
                                        <td class="actions">
                                            <a href="<?php echo base_url();?>view-applied-job/<?php echo base64_encode($AppliedJobs['job_id']);?>"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr><?php 
									}?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>