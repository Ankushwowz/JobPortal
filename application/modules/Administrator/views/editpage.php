<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4><?php echo $title; ?></h4></div>
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
                        <?php  $id = $this->uri->segment(2); ?>
                            <div class="dashboard-message contact-2 bdr clearfix">
                             
                                <div class="row">                                    
                                    
                                    <div class="col-lg-9 col-md-9">
                                       <form  enctype="multipart/form-data" action="<?php echo base_url();?>edit-page/<?php echo $id ?>" method="POST" role="form" novalidate="" id="edit_profile_form">

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Page Title</label>
                                                        <input type="text" name="page_title" class="form-control" placeholder="Page Title" value="<?php if(!empty($pageData['page_title'])) { echo $pageData['page_title'];}?>" required="true">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group name">
                                                        <label>Page Description</label>
                                                        <textarea id="editor1" style="min-height: 150px;" rows="5" class="form-control" name="description" placeholder="Page Description" required="true"><?php if(!empty($pageData['description'])) { echo $pageData['description'];}?></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <div class="row">
                                             <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <input  type="submit" class="btn btn-md button-theme" name="edit_page" value="Edit Page">
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