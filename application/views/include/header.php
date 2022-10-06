<!-- Main header start -->
<?php $url= explode('/',$_SERVER['REQUEST_URI']);?>

<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="<?php echo base_url();?>">
                <img src="<?php echo base_url();?>assets/img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav header-ml">
                      <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Index
                        </a>
                      <ul class="dropdown-menu dm-2" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.html">Index 01</a></li>
                            <li><a class="dropdown-item" href="index-2.html">Index 02</a></li>
                            <li><a class="dropdown-item" href="index-3.html">Index 03</a></li>
                        </ul> 
                    </li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link  <?php if(in_array('candidate-list',$url) || in_array('view-profile',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>candidate-list"  aria-haspopup="true" >
                            Candidates
                        </a>
                        <!--<ul class="dropdown-menu dm-2" aria-labelledby="navbarDropdownMenuLink9">
                            <li><a class="dropdown-item" href="#">Candidate Listing</a></li>
                            <li><a class="dropdown-item" href="#">Candidate Details</a></li>
                            <li><a class="dropdown-item" href="#">Add Resume</a></li>
                            <!--<li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Candidate Dashboard</a>
                                <ul class="dropdown-menu dm-2">
                                    <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="edit-profile.html">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="add-resume.html">Add Resume</a></li>
                                    <li><a class="dropdown-item" href="bookmark.html">bookmark</a></li>
                                    <li><a class="dropdown-item" href="applied.html">Applied</a></li>
                                    <li><a class="dropdown-item" href="messages.html">Messages</a></li>
                                    <li><a class="dropdown-item" href="alerts.html">Job Alert</a></li>
                                    <li><a class="dropdown-item" href="transaction.html">Transaction</a></li>
                                </ul>
                            </li>
                        </ul>-->
                    </li>
                    <?php /*<li class="nav-item dropdown">
                       <a class="nav-link <?php if(in_array('employer-list',$url) || in_array('employer-view-profile',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>employer-list"  aria-haspopup="true" >
                            Employers
                        </a>
                         <!--<ul class="dropdown-menu dm-2" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="employer-list.html">Employer Listing</a></li>
                            <li><a class="dropdown-item" href="employer-details.html">Employer Details</a></li>
                            <li><a class="dropdown-item" href="employer-dashboard-post-job.html">Post a Job</a></li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="employer-dashboard.html">Employer Dashboard</a>
                                <ul class="dropdown-menu dm-2">
                                    <li><a class="dropdown-item" href="employer-dashboard.html">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="employer-dashboard-edit-profile.html">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="employer-dashboard-post-job.html">Post a Job</a></li>
                                    <li><a class="dropdown-item" href="employer-dashboard-manage-job.html">Manage Job</a></li>
                                    <li><a class="dropdown-item" href="employer-dashboard-manage-candidate.html">Manage Candidate</a></li>
                                    <li><a class="dropdown-item" href="employer-dashboard-messages.html">Messages</a></li>
                                    <li><a class="dropdown-item" href="employer-dashboard-transaction.html">Transaction</a></li>
                                </ul>
                            </li>
                        </ul>-->
                    </li>*/ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if(in_array('jobs',$url) || in_array('job-details',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>jobs"  aria-haspopup="true" >
                            Jobs
                        </a>
                        <!-- <ul class="dropdown-menu dm-2" aria-labelledby="navbarDropdownMenuLink10">
                            <li><a class="dropdown-item" href="job-list.html">Job Listing</a></li>
                            <li><a class="dropdown-item" href="job-details.html">Job Details</a></li>
                        </ul>-->
                    </li>
                    <li class="nav-item dropdown megamenu-li active"><a class="nav-link dropdown-toggle" href="#">About Us</a>
                        <!--<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <div class="megamenu-area">
                                <div class="row sobuz">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="about.html">About Us</a>
                                            <a class="dropdown-item" href="pricing-plan.html">Pricing Plan</a>
                                            <a class="dropdown-item" href="terms-and-condition.html">Terms And Condition</a>
                                            <a class="dropdown-item" href="how-it-work.html">How It Work</a>
                                            <a class="dropdown-item" href="invoices.html">Invoice</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="contact.html">Contact Us</a>
                                            <a class="dropdown-item" href="gallery.html">Gallery</a>
                                            <a class="dropdown-item" href="typography.html">Typography</a>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                            <a class="dropdown-item" href="faq.html">Faq</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="icon.html">Icons</a>
                                            <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                            <a class="dropdown-item" href="login.html">Login</a>
                                            <a class="dropdown-item" href="404.html">Error Page</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </li>
                   <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                       <ul class="dropdown-menu dm-2" aria-labelledby="navbarDropdownMenuLink7">
                            <li><a class="dropdown-item" href="blog-columns-1.html">Blog 1 Columns</a></li>
                            <li><a class="dropdown-item" href="blog-columns-2.html">Blog 2 Columns</a></li>
                            <li><a class="dropdown-item" href="blog-columns-3.html">Blog 3 Columns</a></li>
                            <li><a class="dropdown-item" href="blog-details.html">Blog Detele</a></li>
                        </ul> 
                    </li>-->
                </ul>
                <ul class="navbar-nav ml-auto">
				<?php if(empty($this->session->userdata('Session_data'))){ ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url();?>signup">
                            <i class="flaticon-logout"></i>Sign Up
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url();?>login">
                            <i class="flaticon-logout"></i>Sign In
                        </a>
                    </li>
				<?php } ?>
				<?php if(!empty($this->session->userdata('Session_data'))){ ?>
					 <li>
                            <div class="dropdown btns">
                                <a class=" nav-link dropdown-toggle" data-toggle="dropdown">
								<?php if(!empty($user['image'])) {?>
                                            <img  style="width: 27px;" src="<?php echo base_url();?>assets/img/profileimage/<?php echo $user['image'];?>" alt="profile-photo " class="userimage">
										<?php } else{ ?>
										<img  style="width: 27px;" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
										<?php } ?>
                                    
                                    Hi, <?php if(!empty($user['fullname'])) { echo ucfirst($user['fullname']); }?>
								</a>
                                <div class="dropdown-menu">
                                   
                                    <a class="dropdown-item" href="<?php echo  base_url();?>dashboard">Dashboard</a>
                                    <a class="dropdown-item" href="<?php echo base_url()?>messages">Messages</a>
                                    <a class="dropdown-item" href="<?php echo base_url();?>edit-profile">Edit profile</a>
                                    <a class="dropdown-item" href="<?php echo base_url();?>logout">Logout</a>
                                </div>
                            </div>
                        </li>
				<?php } ?>
                   <?php if($this->session->userdata('Session_data')['role']==2) {?>
                        <li><a href="<?php echo base_url();?>createjob" class="btn btn-theme btn-md"><i class="flaticon-plus"></i> Post a Job</a></li>
						<?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</header>