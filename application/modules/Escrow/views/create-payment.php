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
                           
                           <p class="text-message">'.$this->session->flashdata('danger').'</p></div>'; ?>
                        <?php } ?>
						
						<form  action="<?php echo base_url();?>escrow/<?php echo $this->uri->segment(2);?>/<?php echo $this->uri->segment(3);?>" method="POST" role="form" novalidate="" id="escrow_form">
                     
                            <h4 class="bg-grea-3">Escrow</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group">
                                            <label>Job Name</label>
                                            <input type="text"  readonly class="input-text" name="job_title"  value="<?php if(!empty($jobs['job_title'])) { echo $jobs['job_title']; }?>">
                                        </div>
                                    </div>
                                  
                                  
									<div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Add Amount</label>
                                            <input type="text" class="input-text digits-cls" name="amount" placeholder="USD" required="true" maxlength="10" size="10">
                                        </div>
                                    </div>
									<div class="col-lg-12" style="margin-top:10px;">
									 <input type="hidden"   class="input-text" name="job_id"  value="<?php if(!empty($jobs['job_id'])) { echo $jobs['job_id']; }?>">
									  <input type="hidden"   class="input-text" name="user_id"  value="<?php if(!empty($this->uri->segment(3))) { echo $this->uri->segment(3); }?>">
									<input  type="submit" class="btn btn-md button-theme" name="buyNow" value="Fund Transfer">
									</div>
                                </div>
                            </div>

                        </form>
				
                    </div>
                
                </div>
                
                <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Manage Transactions</h4></div>
                                
                            </div>
                        </div>
                        <div class="dashboard-list">
                            <div class="job-info job-info-2">
                                <table class="table" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Candidate Name</th>
                                        <th>Job Name</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
										
										<th class="hdn">Date</th>
										<th>Payment</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($payment as $payment){ ?>
                                    <tr class="responsive-table" id="job-<?php echo $payment['order_id'];?>">
										<td><?php echo $payment['fullname']?></td>
										<td><?php echo $payment['job_title']?></td>
										<td><?php echo $payment['transaction_id']?></td>
										<td>$<?php echo $payment['amount']?></td>
										
										<td class="hdn">
										<?php echo date("M d,Y", strtotime($payment['created_at'])); ?></td>
									<td><a class= "btn btn-success" href="<?php echo base_url()?>escrow-transaction/<?php echo base64_encode($payment['job_id']);?>/<?php echo $payment['transaction_id'];?>">Fund Transfer</a></td>
                                       
                                    </tr><?php 
									}?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
			