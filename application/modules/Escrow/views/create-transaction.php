<style>
.padding-btn { padding: 5px 0 0 14px;}
</style>
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        
                    </div>
                    <div class="submit-address dashboard-list">
					<?php if($this->session->flashdata('success')){  
						echo '<div class="alert alert-success icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                           </button>
                           
                          <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                        <?php } ?>
						
						 <?php if($this->session->flashdata('danger')){  ?>
                        <?php echo '<div class="alert alert-danger icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           
                           <i class="icofont icofont-close-line-circled"></i>
                           
                           </button>
                           
                           <p class="text-message padding-btn">'.$this->session->flashdata('danger').'</p></div>'; ?>
                        <?php } ?>
						
						
							 <?php if(isset($_GET['v']) && $_GET['v']==1){  ?>
                        <?php echo '<div class="alert alert-danger icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           
                           <i class="icofont icofont-close-line-circled"></i>
                           
                           </button>
                           
                           <p class="text-message padding-btn">The transaction must be agreed to first</p></div>'; ?>
                        <?php } ?>
						<form  action="<?php echo base_url();?>escrow-transaction/<?php echo $this->uri->segment(2);?>/<?php echo $this->uri->segment(3);?>" method="POST" role="form" novalidate="" id="">
                     
                            <h4 class="bg-grea-3">Escrow</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <div class="form-group">
                                            <label>Payment Method</label>
                                          </div>
										      <?php //echo"<pre>"; print_r($ResultTrans);?>
								 <?php if(!empty($ResultTrans->available_payment_methods[0]->type)){?> 
									<div class="radio">
									<label><input type="radio" name="payment_method" value="<?php echo $ResultTrans->available_payment_methods[0]->type;?>"><?php if($ResultTrans->available_payment_methods[0]->type=='wire_transfer'){
										echo " Wire Transfer"; }?></label>
									</div>
								 <?php } ?>
								 
								  <?php if(!empty($ResultTrans->available_payment_methods[1]->type)){?> 
									<div class="radio">
									<label><input type="radio" name="payment_method" value="<?php echo $ResultTrans->available_payment_methods[1]->type;?>"><?php //echo $ResultTrans->available_payment_methods[1]->type;?>
									<?php if($ResultTrans->available_payment_methods[1]->type=='paypal'){
										echo "Paypal"; }?></label>
									</div>
								 <?php } ?>
								 
								  <?php if(!empty($ResultTrans->available_payment_methods[2]->type)){?> 
									<div class="radio">
									<label><input type="radio" name="payment_method" value="<?php echo $ResultTrans->available_payment_methods[2]->type;?>"><?php //echo $ResultTrans->available_payment_methods[2]->type;?>
									<?php if($ResultTrans->available_payment_methods[2]->type=='credit_card'){
										echo "Credit Card"; }?>
									
									</label>
									</div>
								 <?php } ?>
								 
								 <?php if(!empty($ResultTrans->conditionally_available_payment_methods[0]->conditions[0]) && $ResultTrans->conditionally_available_payment_methods[0]->conditions[0]=='verification_required'){?> 
								<div class="radio">
								<label><input type="radio" name="payment_method" value="<?php echo $ResultTrans->conditionally_available_payment_methods[0]->type;?>"><?php //echo $ResultTrans->conditionally_available_payment_methods[0]->type;
								
								if($ResultTrans->conditionally_available_payment_methods[0]->type=='paypal'){
									echo "Paypal";
								}
								
								?></label>
								</div>
								 <?php } ?>
								 <?php if(!empty($ResultTrans->conditionally_available_payment_methods[1]->conditions[0]) && $ResultTrans->conditionally_available_payment_methods[0]->conditions[0]=='verification_required'){?> 
								<div class="radio">
								<label><input type="radio" name="payment_method" value="<?php echo $ResultTrans->conditionally_available_payment_methods[1]->type;?>"><?php //echo $ResultTrans->conditionally_available_payment_methods[1]->type;
								if($ResultTrans->conditionally_available_payment_methods[1]->type=='credit_card'){
									echo "Credit Card";
								}
								?></label>
								</div>
								 <?php } ?>
                                        
                                    </div>
                                  
                              
                                   
									<div class="col-lg-12" style="margin-top:10px;">
									 
									<input  type="submit" class="btn btn-md button-theme" name="buyNow" value="Fund Transfer">
									</div>
                                </div>
                            </div>

                        </form>
				
                    </div>
                
                </div>
            </div>
			