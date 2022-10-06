<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/jobb/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 16:38:03 GMT -->
<head>
<?php $this->load->view('include/script'); ?>
<style>

h4.inner-active {color: #376bff !important;}
 </style>
</head>
<body>
<div class="page_loader1"></div>

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="#">
                <img src="<?php echo base_url();?>assets/img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <!--<li class="nav-item dropdown">
                        <a href="#" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a href="#" class="nav-link">Add Resume</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Bookmark</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Applied</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Alerts</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Transaction</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>change-password" class="nav-link">Change Password</a>
                    </li>
                  <!--  <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>edit-profile" class="nav-link">Edit Profile</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a href="<?php echo base_url();?>logout" class="nav-link">Logout</a>
                    </li>
                </ul>
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>					
                        				
						
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
                                    <!--<a class="dropdown-item" href="<?php echo base_url();?>profile-edit">Edit profile</a>-->
                                    <a class="dropdown-item" href="<?php echo base_url();?>logout">Logout</a>
                                </div>
                            </div>
                        </li>
						
                       
						
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->
<?php $url= explode('/',$_SERVER['REQUEST_URI']);
//echo "<pre>"; print_r($url); die;
?>
<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                       
                        <ul>
                            <li class="active"><a class="<?php if(in_array('admin-dashboard',$url)) { echo "menu-active";}?>"  href="<?php echo base_url();?>admin-dashboard"><i class="flaticon-dashboard"></i>Dashboard</a></li>
                            
                            <li><a class="<?php if(in_array('orders',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>orders"><i class="flaticon-buy"></i>Payment History</a></li>
                            <!--<li><a class="<?php if(in_array('escrow-settings',$url)) { echo "menu-active";}?>" href="<?php echo base_url(); ?>escrow-settings"><i class="flaticon-user"></i>Escrow Setting</a></li>-->

                             <li><a class="<?php if(in_array('commission-setting',$url)) { echo "menu-active";}?>" href="<?php echo base_url(); ?>commission-setting"><i class="flaticon-user"></i>Commission Setting</a></li>
                            <!--<li><a href="#"><i class="flaticon-portfolio"></i>Add Resume</a></li>
                            <li><a href="#"><i class="flaticon-heart"></i>Bookmark</a></li>
                            <li><a href="#"><i class="flaticon-safe"></i>Applied</a></li>-->
							
                            <!--<?php if(in_array('users-listing',$url) || in_array('view-profile',$url)) { echo "menu-active";}?><li><a href="<?php echo base_url();?>message"><i class="flaticon-mail"></i>Messages<span class="nav-tag">6</span></a></li>-->
                            
                        </ul>
                        <h4 class="<?php if(in_array('users-listing',$url)) { echo "menu-active";}?>">Users</h4>
                        <ul>
                         <li><a class="<?php if(in_array('users-listing',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>users-listing"><i class="flaticon-user"></i>View Users</a></li>	
                        </ul>
                        <h4 class="<?php if(in_array('add-category',$url) || in_array('view-category',$url)|| in_array('add-subcategory',$url)|| in_array('view-subcategory',$url)) { echo "menu-active";}?>">Category</h4>
                        <ul>
                         <li><a class="<?php if(in_array('add-category',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>add-category"><i class="flaticon-safe"></i>Add Category</a></li>   
                         <li><a class="<?php if(in_array('view-category',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>view-category"><i class="flaticon-safe"></i>View Category</a></li>   
                         <li><a class="<?php if(in_array('add-subcategory',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>add-subcategory"><i class="flaticon-safe"></i>Add Sub Category</a></li> 
                         <li><a class="<?php if(in_array('view-subcategory',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>view-subcategory"><i class="flaticon-safe"></i>VIew Sub Category</a></li>   
                        </ul>
                        <h4 class="<?php if(in_array('add-page',$url)) { echo "menu-active";}?>">Page Contents</h4>
                        <ul>
                         <li><a class="<?php if(in_array('add-page',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>add-page"><i class="flaticon-portfolio"></i>Add Page</a></li>  

                         <li><a class="<?php if(in_array('view-pages',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>view-pages"><i class="flaticon-portfolio"></i>View Pages</a></li>  
                         <!-- <li><a href="<?php echo base_url();?>edit-aboutus"><i class="flaticon-portfolio"></i>Edit About Us</a></li> -->   
                        </ul>

                         <h4 class="<?php if(in_array('add-skills',$url) || in_array('view-skills',$url)) { echo "menu-active";}?>">Skills</h4>
                        <ul>
                         <li><a class="<?php if(in_array('add-skills',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>add-skills"><i class="flaticon-portfolio"></i>Add Skills</a></li>   
                         <li><a class="<?php if(in_array('view-skills',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>view-skills"><i class="flaticon-portfolio"></i>View Skills</a></li>   
                        </ul>
                        <h4 class="<?php if(in_array('add-language',$url) || in_array('view-languages',$url)) { echo "menu-active";}?>">Language</h4>
                        <ul>
                         <li><a class="<?php if(in_array('add-language',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>add-language"><i class="flaticon-portfolio"></i>Add Language</a></li>  
                         <li><a class="<?php if(in_array('view-languages',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>view-languages"><i class="flaticon-portfolio"></i>View Language</a></li>   
                        </ul>

                        <h4 class="<?php if(in_array('joblist',$url)) { echo "menu-active";}?>">Manage Job</h4>
                        <ul>
                         <li><a class="<?php if(in_array('joblist',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>joblist"><i class="flaticon-portfolio"></i>Jobs</a></li>
                        
                        <li><a class="<?php if(in_array('rejected-jobs',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>rejected-jobs"><i class="flaticon-mail"></i>Rejected Jobs</a></li>

                        <li><a class="<?php if(in_array('completed-jobs',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>completed-jobs"><i class="flaticon-mail"></i>Completed Jobs</a></li>

                        <li><a class="<?php if(in_array('assigned-jobs',$url)) { echo "menu-active";}?>" href="<?php echo base_url();?>assigned-jobs"><i class="flaticon-mail"></i>Assigned Jobs</a></li>  
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
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://storage.googleapis.com/themevessel-products/jobb/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

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
<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>
<script  src="<?php echo base_url();?>assets/js/common.js"></script>
<script  src="<?php echo base_url();?>assets/js/adminformvalidation.js"></script>
<script  src="<?php echo base_url();?>assets/js/formvalidation.js"></script>
<link href="<?php echo base_url()?>assets/css/loading.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/loading.js" defer></script>

<link href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js" defer></script>
<script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js" defer></script>


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

<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable(
            
            {
  "ordering": false,
    "scrollX": true
}
            );
    } );
   CKEDITOR.replace( 'editor1' );
   </script>

</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/jobb/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 16:38:03 GMT -->
</html>