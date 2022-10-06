<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Change Password</h4></div>
                                
                            </div>
                        </div>
						<?php if($this->session->flashdata('success')){  
						echo '<div class="alert alert-success icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                           </button>
                           
                           <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                        <?php } ?>
						<?php if($this->session->flashdata('danger')){  echo '<div class="alert alert-danger icons-alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<i class="icofont icofont-close-line-circled"></i>
							</button>
							<p class="text-message error-message">'.$this->session->flashdata('danger').'</p></div>'; ?>

							<?php } ?>
						<?php //echo validation_errors(); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-list">
                                    <h3 class="heading">Change Password</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="<?php echo base_url();?>change-password" method="POST" role="form" novalidate="" id="password_form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Current Password</label>
                                                        <input type="password" name="current-password" class="form-control" placeholder="Current Password" required="true">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="New Password" required="true" id="password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group subject">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirm New Password" required="true" id="confirm_Password">
														<span style="display: none;" class="error_bt" id="passC-error">password and confirm password does not match</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        
														<input  type="submit" class="btn btn-md button-theme" name="ChangePassword" value="Change Password">
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