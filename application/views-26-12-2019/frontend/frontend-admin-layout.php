<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/jobb/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 16:38:03 GMT -->
<head>
<?php $this->load->view('include/script'); ?>

</head>
<body>
<div class="page_loader"></div>
<?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>
<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="<?php echo base_url();?>">
                <img src="<?php echo base_url();?>assets/img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>dashboard" class="nav-link">Dashboard</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>change-password" class="nav-link">Change Password</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>edit-profile" class="nav-link">Edit Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>logout" class="nav-link">Logout</a>
                    </li>

					<li class="nav-item dropdown"><a  class=" nav-link <?php if(in_array('messages',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>messages" >Messages<span class="badge messagecount"></span></a></li>
					<li class="nav-item dropdown" ><a   class="nav-link <?php if(in_array('order',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>order">Orders</a></li>
                </ul>
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
					<?php if($this->session->userdata('Session_data')['role']==1) {?>
                        <li><a href="<?php echo base_url();?>user-switch" class="btn btn-theme btn-md  ">Switch To Employer</a></li>
                        <li><a href="<?php echo base_url();?>" class="btn btn-theme btn-md  ">Browse Job</a></li>
                        <li class="btn btn-theme btn-md over-effect hover-none ">Candidate</li>
					<?php } ?>
						<?php if($this->session->userdata('Session_data')['role']==2) {?>
                            <li><a href="<?php echo base_url();?>user-switch" class="btn btn-theme btn-md  ">Switch To Candidate</a></li>
                        <li><a href="#" class="btn btn-theme btn-md over-effect hover-none " >Employer</a></li>
					<?php } ?>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
								<?php if(!empty($user['image'])) {?>
                                            <img src="<?php echo base_url();?>assets/img/profileimage/<?php echo $user['image'];?>" alt="profile-photo " class="userimage">
										<?php } else{ ?>
										<img src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">
										<?php } ?>
                                    
                                    Hi, <?php if(!empty($user['fullname'])) { echo ucfirst($user['fullname']); }?>
								</a>
                                <div class="dropdown-menu">
                                   
                                    <a class="dropdown-item" href="<?php echo base_url();?>messages">Messages <span class="badge messagecount"></span></a>
                                    <a class="dropdown-item" href="<?php echo base_url();?>edit-profile">Edit profile</a>
                                    <a class="dropdown-item" href="<?php echo base_url();?>logout">Logout</a>
                                </div>
                            </div>
                        </li>
						<?php if($this->session->userdata('Session_data')['role']==2) {?>
                        <li><a href="<?php echo base_url();?>createjob" class="btn btn-theme btn-md"><i class="flaticon-plus"></i> Post a Job</a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Dashbord start -->
<div class="dashboard" style="<?php if(in_array('messages',$url) ) { echo "width:100%";}?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                       
                        <ul>
                            <li class="active"><a  class="<?php if(in_array('dashboard',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>dashboard"><i class="flaticon-dashboard"></i>Dashboard</a></li>
                            <!--<li><a href="#"><i class="flaticon-portfolio"></i>Add Resume</a></li>
                            <li><a href="#"><i class="flaticon-heart"></i>Bookmark</a></li>
                            <li><a href="#"><i class="flaticon-safe"></i>Applied</a></li>-->
							
                            <!--<li><a href="<?php echo base_url();?>message"><i class="flaticon-mail"></i>Messages<span class="nav-tag">6</span></a></li>-->
                            <li><a  class="<?php if(in_array('messages',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>messages" ><i class="flaticon-mail"></i>Messages<span class="badge messagecount"></span></a></li>
                            <li><a   class="<?php if(in_array('order',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>order"><i class="flaticon-buy"></i>Payment History</a></li>
							
							</ul>
							 <h4>Manage Jobs</h4>
								<ul>
								<!--- Candidate Section----->
								<?php if($this->session->userdata('Session_data')['role']==1) {?>
								 <li><a  class="<?php if(in_array('applied-job',$url) || in_array('view-applied-job',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>applied-job" ><i class="flaticon-mail"></i>Applied Jobs</a></li>
								<li><a  class="<?php if(in_array('invitation',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>invitation" ><i class="flaticon-mail"></i>Job Invitation<span class="badge countcls invitationJob"></span></a></li>
								<li><a  class="<?php if(in_array('accepted-job',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>accepted-job" ><i class="flaticon-mail"></i>Accepted Jobs</a></li>
								
								
								<?php } ?>
								<!---- End Here ------>
								
								<!--- Employer Section------>
								<?php if($this->session->userdata('Session_data')['role']==2) {?>
								<li><a class="<?php if(in_array('manage-jobs',$url) ) { echo "menu-active";}?>"  href="<?php echo base_url();?>manage-jobs"><i class="flaticon-work"></i>Jobs</a></li>
								<li><a  class="<?php if(in_array('response-job',$url) || in_array('view-response-job',$url) || in_array('reply-user',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>response-job" ><i class="flaticon-mail"></i>Job Responses <span class="badge responejobcount"></span></a></li>
								
								<li><a  class="<?php if(in_array('invite-user',$url) || in_array('view-invite-response-job',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>invite-user" ><i class="flaticon-mail"></i>Invite<span class="badge countcls inviteuser"></span></a></li>
								
							
								<?php } ?>
								<li><a  class="<?php if(in_array('rejected-job',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>rejected-job" ><i class="flaticon-mail"></i>Rejected Jobs</a></li>
								
								<li><a  class="<?php if(in_array('completed-job',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>completed-job" ><i class="flaticon-mail"></i>Completed Jobs<span class="badge countcls completedJobcount"></span></a></li>
								<li><a  class="<?php if(in_array('assigned-job',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>assigned-job" ><i class="flaticon-mail"></i>Assigned Jobs <span class="badge countcls assignedJobcount"></span></a></li>
								<!------ End Here ------>
								</ul>
                        <h4>Account</h4>
                        <ul>
						<li><a class="<?php if(in_array('change-password',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>change-password"><i class="flaticon-lock"></i>Change Password</a></li>
                            <li><a class="<?php if(in_array('edit-profile',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>edit-profile"><i class="flaticon-user"></i>Edit Profile</a></li>
                          
                           <!--<li><a class="<?php //if(in_array('escrow-setting',$url) ) { echo "menu-active";}?>" href="<?php //echo base_url();?>escrow-setting"><i class="flaticon-user"></i>Escrow Setting</a></li>-->
                          
                            <li><a  class="<?php if(in_array('logout',$url) ) { echo "menu-active";}?>" href="<?php echo base_url();?>logout"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php $this->load->view($main_content); ?>
		</div>
    </div>
</div>
<!-- Dashbord end -->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>" >
<!-- Full Page Search -->

<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.min.js"></script>

<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/bootstrap-submenu.js"></script>
<script  src="<?php echo base_url();?>assets/js/rangeslider.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.mb.YTPlayer.js"></script>
<script  src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.scrollUp.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/leaflet.js"></script>
<script  src="<?php echo base_url();?>assets/js/leaflet-providers.js"></script>
<script  src="<?php echo base_url();?>assets/js/leaflet.markercluster.js"></script>
<script  src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/daterangepicker.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/dropzone.js"></script>
<script  src="<?php echo base_url();?>assets/js/slick.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.filterizr.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
<script  src="<?php echo base_url();?>assets/js/jquery.countdown.js"></script>
<script  src="<?php echo base_url();?>assets/js/maps.js"></script>
<script  src="<?php echo base_url();?>assets/js/app.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script  src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>

<link href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js" defer></script>
<script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js" defer></script>


<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>
<script  src="<?php echo base_url();?>assets/js/common.js"></script>

<script  src="<?php echo base_url();?>assets/js/backendformvalidation.js"></script>
<link href="<?php echo base_url()?>assets/css/loading.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/loading.js" defer></script>


<!--<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>-->

<!--<script src="<?php //echo base_url()?>assets/src/autocomplete.js" ></script>
<script src="<?php //echo base_url()?>assets/src/jquery.tagsinput-revisited.js" defer></script>
<link href="<?php //echo base_url()?>assets/src/jquery.tagsinput-revisited.css" rel="stylesheet">
<link href="<?php //echo base_url()?>assets/src/autocomplete.css" rel="stylesheet">-->


 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">


$("#amount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });

$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
            console.log(response);
        if (response.error) {
			$('.hide-btn').show();
            $('.error')
                .removeClass('hide')
                .find('.err-alert')
                .text(response.error.message);
				
        } else {
            var token = response['id'];
            //$form.find('input[type=text]').empty();
        
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
    


<script src="https://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script>CKEDITOR.replace( 'editor1' );</script>

</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/jobb/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 16:38:03 GMT -->
</html>