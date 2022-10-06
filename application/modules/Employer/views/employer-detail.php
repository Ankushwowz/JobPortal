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
<!-- Candidate section start -->
<div class="candidate-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- job box start -->
                <div class="job-box-2">
                    <div class="company-logo">
                        
						<?php if(!empty($EmployerProfile['image'])) {?>
                        <img src="<?php echo base_url();?>assets/img/profileimage/<?php echo $EmployerProfile['image'];?>" alt="avatar">
						<?php } else {?>
						<img  src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
						<?php } ?>
						
                    </div>
                    <div class="description">
                        <h5 class="title"><a href="#"><?php if(!empty($EmployerProfile['fullname'])) { echo  ucfirst($EmployerProfile['fullname']);}?></a></h5>
						<span class="tagline"><?php if(!empty($EmployerProfile['tagline'])) { echo  $EmployerProfile['tagline'];}?></span>
                        <div class="candidate-listing-footer">
                            <ul>
                                
                                <li><i class="flaticon-pin"></i><?php if(!empty($EmployerProfile['CountryName'])) { echo  $EmployerProfile['CountryName'];}?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="hr-boder clearfix">
                <!-- about me start -->
                <div class="about-me mb-40">
                    <h3 class="heading-2">About Me</h3>
                   <?php if(!empty($EmployerProfile['description'])) { echo  $EmployerProfile['description'];}?>
                </div>
                
				
                
				
				
				
				 
				 
                <!-- Progressbar example start -->
               <!-- <div class="progressbar-example mb-40">
                    <h3 class="heading-2">Professional Skills</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Web Development</p>
                                <p class="progress-size">80%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Consulting</p>
                                <p class="progress-size">100%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Branding & Identity</p>
                                <p class="progress-size">70%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="progress-box">
                                <p class="progress-title">Graphic Design</p>
                                <p class="progress-size">90%</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
				
				
           
				
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right-2">
                    
                    <!-- Job overview start -->
                    <div class="job-overview widget">
                        <h3 class="sidebar-title">Information</h3>
                        <div class="s-border"></div>
                        <ul>
                          <li><i class="flaticon-request"></i><h5>Posted Jobs</h5><span>0</span></li>
                            <li><i class="flaticon-pin"></i><h5>Location</h5><span><?php if(!empty($EmployerProfile['CountryName'])) { echo $EmployerProfile['CountryName']; } ?></span></li>
                            <li><i class="flaticon-woman"></i><h5>Gender</h5><span><?php if(!empty($EmployerProfile['gender']) && $EmployerProfile['gender']==1) { echo"Male";  } ?><?php if(!empty($EmployerProfile['gender']) && $EmployerProfile['gender']==2) { echo"Female";  } ?></span></li>
                           
                           
                           
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Quick contact start -->
                   <div class="widget-5 contact-2 quick-contact">
                        <h3 class="sidebar-title">Quick Contacts</h3>
                        <div class="s-border"></div>
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group message">
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                            </div>
                            <div class="send-btn">
                                <button type="submit" class="btn btn-md button-theme">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Candidate section end -->
