<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Escrow Details</h4></div>
                                
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
                                    <h3 class="heading">Escrow Details</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="<?php echo base_url();?>escrow-setting" method="POST" role="form" novalidate="" id="escrow_setting_form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Escrow Email</label>
														<input type="text" id="escrow-email" class="form-control" name="escrow-email" placeholder="Escrow Email" required="true" value="<?php if(!empty($user['escrow_email'])) { echo $user['escrow_email']; }?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>Escrow Password</label>
															<input type="text" class="form-control" name="escrow-pass" placeholder="Escrow Password" required="true"   value="<?php if(!empty($user['escrow_password'])) { echo $user['escrow_password']; }?>">
                                                    </div>
                                                </div>
                                             
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        
														<input  type="submit" class="btn btn-md button-theme" name="escrowSubmit" value="Submit">
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