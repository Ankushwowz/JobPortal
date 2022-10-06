<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
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
                                       <?php 
                                        $UserData = $this->session->userdata('Session_data');
                                        $role = $UserData['role']; 
                                        if($role==2) {?>
                                            <th>Candidate Name</th> 
                                        <?php } 

                                         if($role==1) {?>
                                            <th>Employer Name</th> 
                                        <?php } 
                                         ?>
                                         <th>Job Name</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
										<!--<th>Status</th>-->
										<th class="hdn">Date</th>
                                        <?php  if($role==1) { ?>
                                         <th>Action</th><?php } ?>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($payment as $payment){
                                        ?>
                                    <tr class="responsive-table" id="job-<?php echo $payment['order_id'];?>">
										<td><?php echo $payment['fullname']?></td>
										<td><?php echo $payment['job_title']?></td>
										<td><?php echo $payment['transaction_id']?></td>
										<td>$<?php echo $payment['amount']?></td>
										<!--<td><?php //echo $payment['order_status']?></td>-->
										<td class="hdn">
										<?php echo date("M d,Y", strtotime($payment['created_at'])); ?></td>
                                        <?php 
                                        if($role==1) {
                                        if($payment['order_status']==1) {?>
                                        <td>
                                             <button class="btn btn-danger">Received & Processing</button>
                                       </td><?php } ?>
                                           <?php if($payment['order_status']==2) {?>
                                        <td>
                                            <button class="btn btn-success">Funded By Admin</button>
                                       </td><?php }  

                                        }
                                         ?>
                                    </tr><?php 
									}?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>