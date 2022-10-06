<style>
@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
.form-group {
	text-align:left;
	}
fieldset, label {
	margin: 0;
	padding: 0;
	}


.rating {
	border: none;
	float: right;
}
.rating > input {
	display: none;
}
.rating > label:before {
	margin: 5px;
	font-size: 1.25em;
	font-family: FontAwesome;
	display: inline-block;
	content: "\f005";
}
.rating > .half:before {
	content: "\f089";
	position: absolute;
}
.rating > label {
	color: #ddd;
	float: right;
}
 .rating > input:checked ~ label,  .rating:not(:checked) > label:hover,  .rating:not(:checked) > label:hover ~ label {
color: #FFD700;
}
 .rating > input:checked + label:hover,  .rating > input:checked ~ label:hover,  .rating > label:hover ~ input:checked ~ label,  .rating > input:checked ~ label:hover ~ label {
color: #FFED85;
}

</style>
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
										<th>Candidate</th>
										<th>Employer</th>
                                        <th>Job Title</th>
										<th class="hdn">Created Date</th>
                                        <th>Amount</th>
										<th>Job Status</th>
										
                                        
                                    </tr>
                                    </thead>
                                    <tbody> 
									<?php foreach($AssignedList as $JobsList){ ?>
                                    <tr class="responsive-table" id="job-<?php echo $JobsList['job_id'];?>">
                                       <td class="p-left-20">
                                       	<?php echo $JobsList['AssignedByUser']?>
									  <!--  <a  target="_blank" title="<?php echo $JobsList['fullname']?>"  href="<?php echo base_url();?>employer-view-profile/<?php echo base64_encode($JobsList['id']);?>">
									  									<?php if(!empty($JobsList['image'])) {?>
									  									<img  style="width:50px; height:50px;" src="<?php echo base_url();?>assets/img/profileimage/<?php echo $JobsList['image'];?>" alt="avatar">
									  									<?php } else {?>
									  									<img  style="width:50px; height:50px;" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
									  									<?php } ?>
									  									 </a> -->
									   </td>
									   <td><?php echo $JobsList['JobcreatedUser']?></td>
                                        <td class="p-left-20">
                                            <div class="inner">
                                                <h5><a href="#"><?php echo $JobsList['job_title']?></a></h5>
                                                <ul>
                                                   <li><i class="flaticon-time"></i> <?php echo $JobsList['job_type_name']?></li>
                                                </ul>
                                            </div>
                                        </td>
										
										<td class="hdn">
										<?php echo date("M d,Y", strtotime($JobsList['created_at'])); ?></td>
                                        <td>$<?php echo $JobsList['job_amount']?></td>
										<td><?php if($JobsList['job_status']==1) {echo "Accepted";}?><?php if($JobsList['job_status']==5) { echo "Completed";}?></td>
										 
										
                                    </tr><?php 
									}?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>