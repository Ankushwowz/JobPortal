<!DOCTYPE html>
<html lang="zxx">
   <!-- Mirrored from storage.googleapis.com/themevessel-products/jobb/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 16:31:09 GMT -->
   <head>
      <title>Hireme</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <!-- External CSS libraries -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-submenu.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/magnific-popup.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/daterangepicker.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/leaflet.css" type="text/css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/map.css" type="text/css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/flaticon/font/flaticon.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/linearicons/style.css">
      <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/jquery.mCustomScrollbar.css">
      <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/dropzone.css">
      <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/slick.css">
      <!-- Custom stylesheet -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
      <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo base_url();?>assets/css/skins/midnight-blue.css">
      <!-- Favicon icon -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/x-icon" >
      <!-- Google fonts -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis%7CMontserrat:200,300,400,500,600,700,800,900%7CNunito+Sans:200,300,400,600,700,800,900">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/ie10-viewport-bug-workaround.css">
      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
      <script  src="<?php echo base_url();?>js/ie-emulation-modes-warning.js"></script>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script  src="js/html5shiv.min.js"></script>
      <script  src="js/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="bg-grea">
      <div class="page_loader"></div>
      <!-- Contact section start -->
      <div class="contact-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <!-- Form content box start -->
                  <div class="form-content-box">
                     <!-- details -->
                     <div class="details">
                        <!-- Logo -->
                        <a href="index.html">
                        <img src="<?php echo base_url();?>assets/img/logos/logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>Sign into Administrator </h3>
                        <?php if($this->session->flashdata('danger')){  ?>
                        <?php echo '<div class="alert alert-danger icons-alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           
                           <i class="icofont icofont-close-line-circled"></i>
                           
                           </button>
                           
                           <p class="text-message">'.$this->session->flashdata('danger').'</p></div>'; ?>
                        <?php } ?>
                        <?php echo validation_errors(); ?>
                        <!-- Form start -->
                        <form action="<?php echo base_url();?>administrator" method="POST" role="form" novalidate="" id="login_form">
                           <div class="form-group">
                              <input id="loginemail" type="email" name="email" class="input-text" placeholder="Email Address" required="true" value="<?php
                                 if($this->input->post('email')){ echo $this->input->post('email');}?>">
                              <span style="display: none;" class="error_bt" id="email-error">Please enter a vaild email</span>
                           </div>
                           <div class="form-group">
                              <input type="password" name="password" class="input-text" placeholder="Password" required="true" id="password">
                           </div>
                           <div class="checkbox">
                              <!--<div class="ez-checkbox pull-left">
                                 <label>
                                 
                                     <input type="checkbox" class="ez-hide">
                                 
                                     Remember me
                                 
                                 </label>
                                 
                                 </div>-->
                              <!--<a href="#" class="link-not-important pull-right">Forgot Password</a>-->
                              <div class="clearfix"></div>
                           </div>
                           <div class="form-group mb-0">
                              <input  type="submit" class="btn-md button-theme btn-block" name="login" value="login">
                           </div>
                        </form>
                        <!-- Social List -->
                     
                     </div>
                     <!-- Footer -->
                     
                  </div>
                  <!-- Form content box end -->
               </div>
            </div>
         </div>
      </div>
      <!-- Contact section end -->
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
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script  src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
      <!-- Custom javascript -->
      <script  src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
      <script  src="<?php echo base_url();?>assets/js/formvalidation.js"></script>
   </body>
   <!-- Mirrored from storage.googleapis.com/themevessel-products/jobb/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Aug 2019 16:36:10 GMT -->
</html>