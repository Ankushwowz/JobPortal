   <style>
 #jobs-page .description {
    margin: 0px 0 0 4px;
}
 </style>
<!-- Sub banner start -->
<div class="sub-banner bg-color-full">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>JOB LISTING</h1>
            <ul class="breadcrumbs">
                 <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Job Listing</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Candidate listing section start -->
<div class="candidate-listing-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="widget-4 advanced-search">
                        <form method="GET" class="informeson1" action="<?php echo base_url();?>jobs" id="jobs-search-form">
                            <div class="form-group">
                                <label>Keywords</label>
                                <input id="findCandidates" type="text" name="q" class="form-control selectpicker search-fields" placeholder="Find Jobs" value="<?php if(!empty($_GET['q'])) { echo $_GET['q']; }?>">
                            </div>
                           
                            <div class="form-group">
                                <label>Categories</label>
                                <select class="selectpicker1 search-fields job-cat-search" name="c" >
                                    <option value="">All Categories</option>
                                    <?php foreach($Category as $Category) { ?>
                                    <option value="<?php echo  $Category['category_id'];?>" <?php if(!empty($_GET['c'])){ if($Category['category_id']==$_GET['c']){ echo"selected";}}?>><?php echo  $Category['category_name'];?></option>
									<?php } ?>
                                </select>
                            </div>
                            <br>

                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content4" <?php if(!empty($_GET['jt'])){ ?>aria-expanded="true"<?php }else{?> aria-expanded="false"<?php }?>>
                                <i class="fa fa-plus-circle"></i> Job Type
                            </a>
                            <div id="options-content4" class="collapse <?php if(!empty($_GET['jt'])){ ?>show<?php }?>">
							<?php foreach($JobType as $JobType) { ?>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox_job_type_<?php echo $JobType['job_type_id']?>" type="checkbox"  class="check-job-type" value="<?php echo $JobType['job_type_id']?>" name="jt[]" <?php if(!empty($_GET['jt'])){ if(in_array($JobType['job_type_id'],$_GET['jt'])){ echo"checked";}}?>>
                                    <label for="checkbox_job_type_<?php echo $JobType['job_type_id']?>">
                                       <?php echo $JobType['job_type_name']?>
                                    </label>
                                </div><?php 
							}
								?>
                               
                                <br>
                            </div>
                           <!-- <a class="show-more-options" data-toggle="collapse" data-target="#options-content5">
                                <i class="fa fa-plus-circle"></i> Date Posted
                            </a>
                            <div id="options-content5" class="collapse">
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox15" type="checkbox">
                                    <label for="checkbox15">
                                        Last Hour
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox16" type="checkbox">
                                    <label for="checkbox16">
                                        Last 24 Hours
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox17" type="checkbox">
                                    <label for="checkbox17">
                                        Last 7 Days
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox18" type="checkbox">
                                    <label for="checkbox18">
                                        Last 30 Days
                                    </label>
                                </div>
                                <br>
                            </div>-->

                        

                          <!--  <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Offerd Salary
                            </a>
                            <div id="options-content" class="collapse">
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        10k - 20k
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">
                                        20k - 30k
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">
                                        30k - 40k
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                        40k - 50k
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox7" type="checkbox">
                                    <label for="checkbox7">
                                        50k - 60k
                                    </label>
                                </div>
                                <br>
                            </div>

                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content3">
                                <i class="fa fa-plus-circle"></i> Qualification
                            </a>
                            <div id="options-content3" class="collapse">
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox11" type="checkbox">
                                    <label for="checkbox11">
                                        Intermidiate
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox12" type="checkbox">
                                    <label for="checkbox12">
                                        Gradute
                                    </label>
                                </div>
                                <br>
                            </div>-->

                          
                        </form>
                    </div>
                </div>
            </div>

			<div class="col-lg-8 col-md-12">
                <!-- Option bar start -->
                <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 col-sm-7">
						
                            <div class="sorting-options2">
                                <span class="sort">Sort by:</span>
								  <form method="GET" class="informeson1" action="<?php echo base_url();?>jobs" id="jobs-sort-search-form">
                                <select class="selectpicker1 search-fields1 job-search" name="s" id="jobsortby">
								<option value="desc"  <?php if(!empty($_GET['s'])){ if($_GET['s']=='desc'){ echo"selected";}}?>>Newest</option>
								<option value="asc" <?php if(!empty($_GET['s'])){ if($_GET['s']=='asc'){ echo"selected";}}?>>Oldest</option>
								<option value="rand" <?php if(!empty($_GET['s'])){ if($_GET['s']=='rand'){ echo"selected";}}?>>Random</option>
                                </select>
								</form>
                            </div>
                        </div>
                      <!--<div class="col-lg-6 col-md-5 col-sm-5">
                            <div class="sorting-options">
                                <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                                <a href="#" class="change-view-btn"><i class="fa fa-th-large"></i></a>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!-- Candidate box start -->
				<?php 
				if(count($jobs) > 0){
				foreach($jobs as $jobs){
                    if(strlen($jobs['job_title']) > 100) 
                    { 
                    $stringjob = substr($jobs['job_title'],0,30).'.......'; 
                    } else{ 
                    $stringjob = $jobs['job_title'];
                    }
				
				
				?>
                <div class="candidate-box" id="jobs-page">
                  <div class="description">
                        <div class="f-left">
                            <h5 class="title"><a href="<?php echo base_url();?>job-details/<?php echo base64_encode($jobs['job_id']);?>" target="_blank"><?php if(!empty($jobs['job_title'])) { echo   $stringjob;}?></a></h5>
							<div class="candidate-listing-footer">
                                <ul>
                                    <li><i class="flaticon-tick"></i> <?php if(!empty($jobs['category_name'])) { echo  $jobs['category_name'];}?></li>
									<li><i class="flaticon-time"></i> <?php if(!empty($jobs['job_type_name'])) { echo  $jobs['job_type_name'];}?></li>
                                    <li><i style="font-size:14px" class="fa">&#xf155;</i><?php if(!empty($jobs['job_amount'])) { echo  $jobs['job_amount'];}?></li>
                                </ul>
                            </div>
							
                        </div>
                       <a href="<?php echo base_url();?>job-details/<?php echo base64_encode($jobs['job_id']);?>" class="apply-button">Apply Now</a>
                    </div>
                </div><?php }
				}else{ ?>
					<div class="candidate-box">
					<h4>Please try modifying your search to get more results.</h4>
					</div>
				<?php }
				?>

			<?php /*
			   <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>*/
				?>
           

		   </div>

	   </div>
    </div>
</div>
<!-- Candidate listing section start -->
       
