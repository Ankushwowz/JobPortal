<style>

.has-error .form-control {
    border-color: #a94442;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
}
.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.err-alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.display-td {color: #fff;
    padding: 3px;
}
.display-td1 {color: #fff;
    padding: 12px;
}
.display-tr { background: #4d4d4d;
    padding: 2px;}
</style>
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
   <div class="content-area5">
      <div class="dashboard-content">
         
         <!--<div class="alert alert-success alert-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
            <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
            
            </div>-->
         <div class="row">
		          
							 
        <div class="col-md-12">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td1" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
               
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
                        <?php 

                        if(!empty($this->session->userdata('Session_data'))){
                        $UserData = $this->session->userdata('Session_data');
                        $user_id = $UserData['id'];
                        $role = $UserData['role'];
                        if($role==3){
                    ?>
                    <form role="form" action="<?php echo base_url(); ?>stripePost" method="post" class="require-validation" data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $stripe['stripe_key'] ?>"
                                                    id="payment-form">
                    <?php } else { ?> 

                          <form role="form" action="<?php echo base_url(); ?>stripePost" method="post" class="require-validation" data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
                    <?php } 

                } ?>                               
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on User</label> <input
                                    class='form-control' id="userName" name="userName"  type='text'>
                            </div>
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card1 required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number'  maxlength="16" size='20'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
						  <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text' maxlength="2">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' maxlength="4">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' maxlength="4">
                            </div>
                          
                        </div>
                         <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Amount </label> 
                                <?php if(!empty($jobamount['job_amount'])) { ?>
                                   <p>$<?php echo $jobamount['job_amount']?></p> 
                               <?php } ?>
                                <input 
                                    autocomplete='off' id="amount"  name="amount" class='form-control amount' value='<?php if(!empty($jobamount['job_amount'])) {  echo $jobamount['job_amount']; } else { echo '0';}?>' type='hidden' required readonly >
                            </div>
                        </div>
                        <div class='form-row row hide-btn' style="display:none;">
                            <div class='col-md-12 error form-group'>
                                <div class='alert-danger err-alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
						<input class='form-control' id="job_id" name="job_id" value="<?php echo $this->uri->segment(2);?>"  type='hidden'>
						<input class='form-control' id="candidate_id" name="candidate_id" value="<?php echo $this->uri->segment(3);?>"  type='hidden'>
						
                        <input class='form-control' id="orderid" name="orderid" value="
                        <?php 
                        if(!empty($orderid['order_id'])){
                            echo base64_encode($orderid['order_id']);
                        }
                        ?>"  type='hidden'>

                            <input class='form-control' name="stripe_secret_code" value="<?php

                          if(!empty($stripe['stripe_secret'])) { echo 
                       $stripe['stripe_secret']; } ?>"  type='hidden'>
						<div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                             
                    </form>
                </div>
            </div>        
        </div>
   
  
				

                                   
                              
         </div>
        
		
	 </div>
   </div>
</div>

