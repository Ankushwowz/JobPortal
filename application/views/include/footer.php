<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>" >
<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="footer-item clearfix">
                    <img src="<?php echo base_url();?>assets/img/logos/logo.png" alt="logo" class="f-logo">
                   <!-- <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            <i class="flaticon-internet"></i><a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                        </li>
                    </ul>-->
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="footer-item">
                    <h4>Helpful Links</h4>
                    <ul class="links">
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <!--<li>
                            <a href="#">Blog</a>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="footer-item">
                    <h4>Job Seekers</h4>
                    <ul class="links">
                        <li>
                            <a href="<?php echo base_url();?>signup">Create Account</a>
                        </li>
                        <!--<li>
                            <a href="#">Career Counseling</a>
                        </li>-->
                       <!-- <li>
                            <a href="#">My Oficiona</a>
                        </li>
                        <li>
                            <a href="#">FAQ</a>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="footer-item">
                    <h4>Employers</h4>
                    <ul class="links">
                        <li>
                            <a href="<?php echo base_url();?>signup">Create Account</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>candidate-list">Find a Freelancers</a>
                        </li>
                        <?php if($this->session->userdata('Session_data')['role']==2) {?>
                        <li>
                            <a href="<?php echo base_url();?>createjob">Post a Job</a>
                        </li>
                        <?php } ?>
                        <?php if(empty($this->session->userdata('Session_data')['role'])) {?>
                        <li>
                            <a href="<?php echo base_url();?>login">Post a Job</a>
                        </li>
                      <?php  } ?>
                       <!-- <li>
                            <a href="#">FAQ</a>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12">
                <div class="footer-item clearfix">
                    <!--<h4>Newsletter</h4>-->
                    <div class="Subscribe-box">
                        <!--<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>-->
                        <form class="form-inline" action="#" method="GET">
                            <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
                            <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Sub footer start -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <p class="copy">2019 Getwork Global</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="social-list clearfix">
                    <li><a  target="_blank" href="https://www.facebook.com/GetWork-116750616391121/?modal=admin_todo_tour" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub footer end -->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>" >
<!-- Full Page Search -->
>

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
<!--<script  src="<?php //echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<!--<script  src="<?php //echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>-->
<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>
<script  src="<?php echo base_url();?>assets/js/common.js"></script>
<script  src="<?php echo base_url();?>assets/js/adminformvalidation.js"></script>
<script  src="<?php echo base_url();?>assets/js/formvalidation.js"></script>
<link href="<?php echo base_url()?>assets/css/loading.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/loading.js" defer></script>
<script src="https://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script>
   CKEDITOR.replace( 'editor1' );
   </script>