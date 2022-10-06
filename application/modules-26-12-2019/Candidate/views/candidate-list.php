<!-- Sub banner start -->
<div class="sub-banner bg-color-full">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Candidates Listing</h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Candidates Listing</li>
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
                        <form method="GET" class="informeson1" action="<?php echo base_url();?>candidate-list" id="candidate-search-form">
                            <div class="form-group">
                                <label>Keywords</label>
                                <input id="findCandidates" type="text" name="q" class="form-control selectpicker search-fields" placeholder="Find Candidates" value="<?php if(!empty($_GET['q'])) { echo $_GET['q']; }?>">
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <select id="searchLocation" class="selectpicker1 search-fields common-search" name="l" >
                                    <option value="">All Location</option>
									<?php foreach($County as $County) { ?>
                                    <option value="<?php echo  $County['id'];?>" <?php if(!empty($_GET['l'])){ if($County['id']==$_GET['l']){ echo"selected";}}?>><?php echo  $County['name'];?></option>
									<?php } ?>
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Categories</label>
                                <select class="selectpicker1 search-fields common-search" name="c" >
                                    <option value="">All Categories</option>
                                    <?php foreach($Category as $Category) { ?>
                                    <option value="<?php echo  $Category['category_id'];?>" <?php if(!empty($_GET['l'])){ if($Category['category_id']==$_GET['c']){ echo"selected";}}?>><?php echo  $Category['category_name'];?></option>
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
                                    <input id="checkbox_job_type_<?php echo $JobType['job_type_id']?>" type="checkbox"  class="checkbox_job_type" value="<?php echo $JobType['job_type_id']?>" name="jt[]" <?php if(!empty($_GET['jt'])){ if(in_array($JobType['job_type_id'],$_GET['jt'])){ echo"checked";}}?>>
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

                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content6" <?php if(!empty($_GET['ex'])){ ?>aria-expanded="true"<?php }else{?> aria-expanded="false"<?php }?>>
                                <i class="fa fa-plus-circle"></i> Experience
                            </a>
                            <div id="options-content6" class="collapse <?php if(!empty($_GET['ex'])){ ?>show<?php }?>">
							<?php for ($i = 1; $i <= 10; $i++){?>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox_Exp<?php echo $i;?>" type="checkbox"  class="checkbox_Exp" value="<?php echo $i;?>" name="ex[]"  <?php if(!empty($_GET['ex'])){ if(in_array($i,$_GET['ex'])){ echo"checked";}}?>>
                                    <label for="checkbox_Exp<?php echo $i;?>">
                                        <?php echo $i;?> Year
                                    </label>
                                </div>
                                <?php }?>
                                <br>
                            </div>

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

                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content2" <?php if(!empty($_GET['g'])){ ?>aria-expanded="true"<?php }else{?> aria-expanded="false"<?php }?>>
                                <i class="fa fa-plus-circle"></i> Gender
                            </a>
                            <div id="options-content2" class="collapse <?php if(!empty($_GET['g'])){ ?>show<?php }?>">
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkboxgender8"  class="s-gender" type="checkbox" value="1" name="g[]" <?php if(!empty($_GET['g'])){ if(in_array('1',$_GET['g'])){ echo"checked";}}?>>
                                    <label for="checkboxgender8">
                                        Male
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkboxgender9" class="s-gender" type="checkbox" value="2" name="g[]" <?php if(!empty($_GET['g'])){ if(in_array('2',$_GET['g'])){ echo"checked";}}?>>
                                    <label for="checkboxgender9">
                                        Female
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkboxgender10"  class="s-gender" type="checkbox" value="3" name="g[]" <?php if(!empty($_GET['g'])){ if(in_array('3',$_GET['g'])){ echo"checked";}}?>>
                                    <label for="checkboxgender10">
                                        Others
                                    </label>
                                </div>

                            </div>
                       
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
								 <!--<form method="GET" class="informeson1" action="<?php echo base_url();?>candidate-list" id="candidate-search-sort-form">-->
                                <select class="selectpicker1 search-fields1" name="s" id="sortbysearch">
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
				if(count($CandidateList) > 0){
				foreach($CandidateList as $CandidateList){?>
                <div class="candidate-box">
                    <div class="company-logo">
						<?php if(!empty($CandidateList['image'])) {?>
                        <img src="<?php echo base_url();?>assets/img/profileimage/<?php echo $CandidateList['image'];?>" alt="avatar">
						<?php } else {?>
						<img  src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
						<?php } ?>
                    </div>
                    <div class="description">
                        <div class="f-left">
                            <h5 class="title"><a href="<?php echo base_url();?>view-profile/<?php echo base64_encode($CandidateList['userID']);?>" target="_blank"><?php if(!empty($CandidateList['fullname'])) { echo  $CandidateList['fullname'];}?></a></h5>
							
                            <div class="candidate-listing-footer">
                                <ul>
                                    <li><i class="flaticon-tick"></i> <?php if(!empty($CandidateList['category_name'])) { echo  $CandidateList['category_name'];}?><?php if(!empty($CandidateList['subcategory_name'])) { echo"/".  $CandidateList['subcategory_name'];}?></li>
                                    <li><i class="flaticon-pin"></i> <?php if(!empty($CandidateList['CountryName'])) { echo  $CandidateList['CountryName'];}?></li>
                                </ul>
                            </div>
							
                        </div>
                       <a href="<?php echo base_url();?>view-profile/<?php echo base64_encode($CandidateList['userID']);?>" class="apply-button">View Profile</a>
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
 