<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Apply Commission Details</h4></div>
                                
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
                                    <h3 class="heading">Apply Commission Details</h3>
                                    <div class="dashboard-message contact-2">
                                        
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Amount</label>
                                                        <p>$<?php if(!empty($amount['job_amount'])) { echo $amount['job_amount']; }?></p>
                                                        <input type="hidden" id="amount" class="form-control digits-cls" name="amount" placeholder="job_amount" required="true" value="<?php if(!empty($amount['job_amount'])) { echo $amount['job_amount']; }?>" required >
                                                    </div>
                                                    <div class="form-group name">
                                                        <label>Commission (Percentage %)</label>
                                                          <p><?php if(!empty($commission['commission'])) { echo $commission['commission']; }?>%</p>
														<input type="hidden" id="commission" class="form-control digits-cls" name="commission" placeholder="Commission" required="true" value="<?php if(!empty($commission['commission'])) { echo $commission['commission']; }?>" required >
                                                    </div>


                                                     <div class="form-group name">
                                                        <label>Percentage Amount</label>
                                                          <p>$<?php if( !empty($amount['job_amount'])  && !empty($commission['commission'])) { 

                                               echo  $Percentage =  ($amount['job_amount'] * $commission['commission'])/100;
                                                            


                                                             }?></p>
                                                 
                                                    </div>

                                                     <div class="form-group name">
                                                        <label>Fund Transfer</label>
                                                          <p>$<?php if( !empty($amount['job_amount'])  && !empty($commission['commission'])) { 

                                               echo  $amountTransfer =  $amount['job_amount'] - $Percentage;
                                                            


                                                             }?></p>
                                                 
                                                    </div>
                                                </div>
                                               
                                                </div>
                                             
                                                <div class="col-lg-12">
                                                        <?php 

                                                    if(base64_decode($this->uri->segment(4))==0) { ?>
                                                        <a href="<?php echo base_url();?>paypal/<?php echo $this->uri->segment(5);?>"><button class="btn btn-success">Fund Transfer</button></a>
                                                        <?php 

                                                      }
                                                     ?>
                                                <?php 
                                                    if(base64_decode($this->uri->segment(4))==1) { ?>
                                                       <a href="<?php echo base_url();?>payment/<?php echo $this->uri->segment(2);?>/<?php echo $this->uri->segment(3);?>"><button class="btn btn-success">Fund Transfer</button></a>
                                                        <?php 

                                                      }
                                                     ?>
                                                        
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