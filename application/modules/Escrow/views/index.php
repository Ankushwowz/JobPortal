<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Manage Jobs</h4></div>
                                
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
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($JobsList as $JobsList){ ?>
                                    <tr class="responsive-table" id="job-<?php echo $JobsList['job_id'];?>">
                                      
                                        <td class="p-left-20">
                                            <div class="inner">
                                                <h5><a href="<?php echo base_url();?>viewjob/<?php echo base64_encode($JobsList['job_id']);?>"><?php echo $JobsList['job_title']?></a></h5>
                                                <ul>
                                                   <li><i class="flaticon-time"></i> <?php echo $JobsList['job_type_name']?></li>
                                                </ul>
                                            </div>
                                        </td>
										 <td><?php echo $JobsList['category_name']?></td>
                                        <td class="hdn">
										<?php echo date("M d,Y", strtotime($JobsList['created_at'])); ?></td>
                                      
                                        <td><?php echo $JobsList['status']?></td>
                                        <td>$<?php echo $JobsList['job_amount']?></td>
                                        <td class="actions">
                                            <a href="<?php echo base_url();?>edit-job/<?php echo base64_encode($JobsList['job_id']);?>"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="delete fa fa-trash-o delete-jobs" rel="<?php echo $JobsList['job_id'];?>"></i></a>
											  <a href="<?php echo base_url();?>viewjob/<?php echo base64_encode($JobsList['job_id']);?>"><i class="fa fa-eye"></i></a>
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