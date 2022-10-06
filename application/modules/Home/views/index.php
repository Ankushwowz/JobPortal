<!-- Banner start --><div class="banner bg-color-full" id="banner">   <div id="bannerCarousole" class="carousel slide" data-ride="carousel">      <div class="carousel-inner">         <div class="carousel-item banner-max-height active">            <img class="d-block w-100 h-100" src="<?php echo base_url();?>assets/img/banner/home-banner.png" alt="banner">            <div class="carousel-caption banner-slider-inner d-flex text-center"></div>         </div>      </div>   </div>   <div class="banner-inner">      <div class="container">         <div class="text-center">            <h3 class="b-text">Find your job</h3>            <p>Give & Get Work</p>            <div class="inline-search-area ml-auto mr-auto none-768">			<form action="" method="GET" id="find-job-form">               <div class="search-boxs">			   <div class="search-col" style="width:20%">						<select class="selectpicker search-fields" name="p" id="find_home_job">							<option value="candidate-list">Find Freelancers</option>							<option value="jobs">Jobs</option>						</select>					</div>                  <div class="search-col" >                     <input id="search-txt" name="q" type="text" name="search" class="form-control has-icon b-radius" placeholder="Search">                  </div>					                  <div class="find">                     <button class="btn button-theme btn-search btn-block b-radius" id="findJob">                     <i class="fa fa-search"></i><strong>Get Work</strong>                     </button>                  </div>               </div>			   </form>            </div>            <div class="banner-counter-box none-768">               <div class="counter-box">                  <h1 class="counter"><?php if(!empty($jobsPosted)) { echo $jobsPosted;} ?></h1>                  <p>Jobs Posted</p>               </div>               <div class="counter-box">                  <h1 class="counter"><?php if(!empty($EmployerCount)) { echo $EmployerCount;} ?></h1>                  <p>Employers</p>               </div>               <div class="counter-box">                  <h1 class="counter"><?php if(!empty($CandidateCount)) { echo $CandidateCount;} ?></h1>                  <p>Candidates</p>               </div>            </div>         </div>      </div>   </div></div><!-- Banner end --><!-- Popular categories strat --><div class="popular-categories content-area-7">   <div class="container">      <!-- Main title -->      <div class="main-title text-center">         <h1>Popular Categories</h1>         <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->      </div>      <div class="row">	  <?php if(count($HomeCategory) >0){		   foreach($HomeCategory as $homeCategory){?>				<div class="col-lg-3 col-md-4 col-sm-6 width-category">					<div class="categorie-box">					  <a href="<?php echo base_url();?>jobs?c=<?php echo $homeCategory['category_id']?>"> <img class="popular-categories" src="<?php echo base_url();?>assets/img/category/<?php echo $homeCategory['image']?>">					   <h5><?php if(!empty($homeCategory)){echo $homeCategory['category_name']; }?></h5>					   <span>(<?php if(!empty($homeCategory)){echo $homeCategory['jobtotal']; }?>)</span></a>					</div>				</div><?php }			}	  ?>              </div>   </div></div><!-- Popular categories end --><!-- Job section strat --><div class="job-section content-area-5 bg-grea">   <div class="container">      <!-- Main title -->      <div class="main-title text-center">         <h1>Recent Jobs</h1>         <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->      </div>      <div class="row">         <div class="col-lg-12" >		 <div id="main-recentJobs">		 		 <?php 				/*if(count($RecentJobs) > 0){					foreach($RecentJobs as $recentJobs){?>						<div class="job-box home-recentjobs" >						   						   <div class="description" >							  <div class="float-left">								 <h5 class="title"><a href="job-details.html"><?php if(!empty($recentJobs['job_title'])) { echo  $recentJobs['job_title'];}?></a></h5>								 <div class="candidate-listing-footer">									<ul>									   <li><i class="flaticon-work"></i> <?php if(!empty($recentJobs['category_name'])) { echo  $recentJobs['category_name'];}?></li>									   <li><i style="font-size:14px" class="fa">&#xf155;</i><?php if(!empty($recentJobs['job_amount'])) { echo  $recentJobs['job_amount'];}?> </li>									   <li><i class="flaticon-time"></i><?php if(!empty($recentJobs['job_type_name'])) { echo  $recentJobs['job_type_name'];}?></li>									</ul>																		<!--<h6>Deadline: Jan 31, 2019</h6>-->								 </div>							  </div>							  <div class="div-right">								 <a href="<?php echo base_url();?>job-details/<?php echo base64_encode($recentJobs['job_id']);?>" class="apply-button">Apply Now</a>								<!-- <a href="#"><i class="flaticon-heart favourite"></i></a>-->							  </div>						   </div>						</div><?php 					}				}*/?>           </div>		            </div> <div class="clearfix" ></div>		 <div class="col-lg-12 more-job-cls" >		 <div class="text-center clearfix" >               <button  class="browse-all" id="load_more" data-val ="1" >Browse All Jobs</button>            </div>            </div>      </div>   </div></div><!-- Job section end --><!-- Counters strat --><?php /*<div class="counters bg-color-full-2">   <div class="container">      <div class="row">         <div class="col-lg-3 col-md-3 col-sm-6">            <div class="counter-box">               <i class="flaticon-user"></i>               <h1 class="counter">1967</h1>               <p>Members</p>            </div>         </div>         <div class="col-lg-3 col-md-3 col-sm-6">            <div class="counter-box">               <i class="flaticon-work"></i>               <h1 class="counter">667</h1>               <p>Jobs</p>            </div>         </div>         <div class="col-lg-3 col-md-3 col-sm-6">            <div class="counter-box">               <i class="flaticon-document"></i>               <h1 class="counter">475</h1>               <p>Resumes</p>            </div>         </div>         <div class="col-lg-3 col-md-3 col-sm-6">            <div class="counter-box">               <i class="flaticon-factory"></i>               <h1 class="counter">475</h1>               <p>Companies</p>            </div>         </div>      </div>   </div></div><!-- Counters end --><!-- Testimonial start --><div class="testimonial">   <div class="container">      <div class="main-title">         <h1>What Our Users Say</h1>      </div>      <div class="slick-slider-area">         <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>            <div class="slick-slide-item">               <div class="testimonial-inner">                  <div class="content-box">                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>                  </div>                  <div class="media">                     <a href="#">                     <img src="<?php echo base_url();?>assets/img/avatar/avatar-2.jpg" alt="testimonial-avatar" class="img-fluid">                     </a>                     <div class="media-body align-self-center">                        <h5>                           Eliane Perei                        </h5>                        <h6>Web Developer</h6>                     </div>                  </div>               </div>            </div>            <div class="slick-slide-item">               <div class="testimonial-inner">                  <div class="content-box">                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>                  </div>                  <div class="media">                     <a href="#">                     <img src="<?php echo base_url();?>assets/img/avatar/avatar-3.jpg" alt="testimonial-avatar" class="img-fluid">                     </a>                     <div class="media-body align-self-center">                        <h5>                           Maria Blank                        </h5>                        <h6>Office Manager</h6>                     </div>                  </div>               </div>            </div>            <div class="slick-slide-item">               <div class="testimonial-inner">                  <div class="content-box">                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>                  </div>                  <div class="media">                     <a href="#">                     <img src="<?php echo base_url();?>assets/img/avatar/avatar-4.jpg" alt="testimonial-avatar" class="img-fluid">                     </a>                     <div class="media-body align-self-center">                        <h5>                           Karen Paran                        </h5>                        <h6>Support Manager</h6>                     </div>                  </div>               </div>            </div>            <div class="slick-slide-item">               <div class="testimonial-inner">                  <div class="content-box">                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>                  </div>                  <div class="media">                     <a href="#">                     <img src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpg" alt="testimonial-avatar" class="img-fluid">                     </a>                     <div class="media-body align-self-center">                        <h5>                           John Pitarshon                        </h5>                        <h6>Creative Director</h6>                     </div>                  </div>               </div>            </div>         </div>      </div>   </div></div>*/ ?><!-- Testimonial end --><!-- Partners strat --><div class="partners content-area-15 bg-grea">   <div class="container">      <div class="main-title text-center">         <h1>Companies We've Helped</h1>        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->      </div>      <div class="slick-slider-area">         <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-1.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-2.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-3.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-4.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-1.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-2.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-3.png" alt="brand" class="img-fluid"></div>            <div class="slick-slide-item"><img src="<?php echo base_url();?>assets/img/brand/brand-4.png" alt="brand" class="img-fluid"></div>         </div>      </div>   </div></div><!-- Partners end --><!-- Blog start --><?php /*<div class="blog content-area">   <div class="container">           <div class="main-title">         <h1>Latest Blog</h1>         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>      </div>           <div class="slick-slider-area">         <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>            <div class="slick-slide-item">               <div class="blog-3">                  <div class="blog-photo">                     <img src="<?php echo base_url();?>assets/img/blog/blog-2.jpg" alt="blog" class="img-fluid">                     <div class="date-box">                        <span>27</span>Feb                     </div>                  </div>                  <div class="detail">                     <h3>                        <a href="blog-details.html">How To Get Out Of Stress At Work</a>                     </h3>                     <div class="post-meta">                        <span><a href="#"><i class="flaticon-male"></i>Amdin</a></span>                        <span><a href="#"><i class="flaticon-comment"></i>27</a></span>                        <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>                     </div>                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>                  </div>               </div>            </div>            <div class="slick-slide-item">               <div class="blog-3">                  <div class="blog-photo">                     <img src="<?php echo base_url();?>assets/img/blog/blog-3.jpg" alt="blog" class="img-fluid">                     <div class="date-box">                        <span>23</span>Feb                     </div>                  </div>                  <div class="detail">                     <h3>                        <a href="blog-details.html">Back To Work After Vacation</a>                     </h3>                     <div class="post-meta">                        <span><a href="#"><i class="flaticon-male"></i>Amdin</a></span>                        <span><a href="#"><i class="flaticon-comment"></i>27</a></span>                        <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>                     </div>                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>                  </div>               </div>            </div>            <div class="slick-slide-item">               <div class="blog-3">                  <div class="blog-photo">                     <img src="<?php echo base_url();?>assets/img/blog/blog-1.jpg" alt="blog" class="img-fluid">                     <div class="date-box">                        <span>23</span>Feb                     </div>                  </div>                  <div class="detail">                     <h3>                        <a href="blog-details.html">Job Motivational Quote</a>                     </h3>                     <div class="post-meta">                        <span><a href="#"><i class="flaticon-male"></i>Amdin</a></span>                        <span><a href="#"><i class="flaticon-comment"></i>27</a></span>                        <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>                     </div>                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>                  </div>               </div>            </div>            <div class="slick-slide-item">               <div class="blog-3">                  <div class="blog-photo">                     <img src="<?php echo base_url();?>assets/img/blog/blog-1.jpg" alt="blog" class="img-fluid">                     <div class="date-box">                        <span>23</span>Feb                     </div>                  </div>                  <div class="detail">                     <h3>                        <a href="blog-details.html">Job Motivational Quote</a>                     </h3>                     <div class="post-meta">                        <span><a href="#"><i class="flaticon-male"></i>Amdin</a></span>                        <span><a href="#"><i class="flaticon-comment"></i>27</a></span>                        <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>                     </div>                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>                  </div>               </div>            </div>         </div>         <div class="slick-prev slick-arrow-buton">            <i class="fa fa-angle-left"></i>         </div>         <div class="slick-next slick-arrow-buton">            <i class="fa fa-angle-right"></i>         </div>      </div>   </div></div>*/ ?><!-- Blog end --><!-- Intro section --><?php /*<div class="intro-section bg-color-full-2">   <div class="container">      <div class="row">         <div class="col-lg-7 col-md-12 col-sm-12">            <div class="intro-text">               <h3>Gat a Deax App</h3>               <p>Searching for jobs never been that easy. Now you can find job matched your career expectation</p>            </div>         </div>         <div class="col-lg-5 col-md-12 col-sm-12">            <div class="app-download-button">               <a href="#" class="android-app"><i class="flaticon-robot"></i>Google Play</a>               <a href="#" class="apple-app"><i class="flaticon-apple"></i>Apple Store</a>            </div>         </div>      </div>   </div></div>*/ ?><!-- Intro end -->