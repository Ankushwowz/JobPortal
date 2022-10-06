<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Edit Profile</h4></div>
                                <?php /*
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.html">Index</a>
                                            </li>
                                            <li>
                                                <a href="dashboard.html">Dashboard</a>
                                            </li>
                                            <li class="active">Edit Profile</li>
                                        </ul>
                                    </div>
                                </div>
                                <?php */ ?>
                            </div>
                        </div>
                        <div class="dashboard-list">
                        <?php if($this->session->flashdata('success')){  
                        echo '<div class="alert alert-success icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                           </button>
                           
                           <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                        <?php } ?>
                        <?php echo validation_errors(); ?>
                        <?php  $UserRole = $this->session->userdata('Session_data'); ?>
                            <h3 class="heading">Basic Info</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">
                             
                                <div class="row">                                    
                                    
                                    <div class="col-lg-9 col-md-9">
                                       <form  enctype="multipart/form-data" action="<?php echo base_url();?>edit-profile" method="POST" role="form" novalidate="" id="edit_profile_form">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Your Name</label>
                                                        <input type="text" name="fullname" class="form-control" placeholder="Your Name" value="<?php if(!empty($user['username'])) { echo $user['username'];}?>" required="true">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group subject">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="form-control digits-cls" placeholder="Phone" required="true" value="<?php if(!empty($user['email'])) { echo $user['email'];}?>" maxlength="10">
                                                    </div>
                                                </div>
                                        
                                                
                                            </div>
                                            <br>
                                            <div class="row">
                                             <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input  type="submit" class="btn btn-md button-theme" name="edit_profie" value="Save Profile">
                                                    </div>
                                                </div>
                                                </div>
                                       </form>
                                    </div>
                                     
                                </div>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                    <p class="sub-banner-2 text-center"></p>
                </div>
            </div>