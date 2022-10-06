<!-- Sub banner start -->
<div class="sub-banner bg-color-full">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Job Apply</h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Job Apply</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Job details page start -->
<div class="job-details-page content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Apply Job</h4></div>
                            <div class="col-sm-12 col-md-6">
                                
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                       <form   action="<?php echo base_url();?>apply-job/<?php echo $this->uri->segment(2);?>" method="POST" role="form" novalidate="" id="apply_job_form">
                           
                            <div class="search-form1">
                                <div class="row pad-20">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Job Title:</label>
                                            <p><?php if(!empty($Jobs['job_title'])) { echo  $Jobs['job_title'];}?></p>
											
                                        </div>
                                    </div>
                                  <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Proposal:</label> <a style="color:#007bff;" target="_blank" class="view-job-href" href="<?php echo base_url();?>job-details/<?php echo $this->uri->segment(2);?>">View Job</a>
                                           <textarea id="editor" class="input-text" name="description" placeholder="Detailed Information" required="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post-btn"><input  name="applyJobPost" type="submit" class="btn btn-md button-theme" Value="Send" id="applyJobPost"></div>
                                    </div>
                                </div>
                            </div>
                            
					   </form>
                    </div>
                    
                </div>

	   </div>
    </div>
</div>
<!-- Job details page end -->
