<style type="text/css">
.modal-dialog {
    top: 4em;
}
.badge-danger {
    padding: 1em;
}
</style>

<div class="col-lg-9 col-md-12 col-sm-12 col-pad">

                <div class="content-area5">

                    <div class="dashboard-content">

                        <!--<div class="alert alert-success alert-2" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!

                        </div>-->   


                        <div class="row">

                            <div class="col-lg-12">

                                <div class="dashboard-list">
                                    <?php if($this->session->flashdata('success')){  
                                        echo '<div class="alert alert-success icons-alert">
                                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                           </button>
                                           
                                           <p class="text-message success-message">'.$this->session->flashdata('success').'</p></div>'; ?>
                                        <?php } ?>
                                    <h3>
                                        <?php echo $title; ?></h3>

                                    <div class="dashboard-message dashboard-table-responsive bdr clearfix ">

                                        <div class="table-responsive dashboard-table-responsive">

                                            <table class="table mb-0" id="myTable">

                                                <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th>Job Title</th>                                                  
                                                    <th>Job Type</th>                                                  
                                                    <th>Job Category</th>                                                  
                                                    <th>Job Amount</th>   
                                                    <th>Status</th>   
                                                    <th>Action</th>

                                                </tr>

                                                </thead>

                                                <tbody>

                                                <?php 
                                                    $counter = 1;
                                                foreach ($jobs as $job) { ?>
                                                    
                                                <tr class="responsive-table" id="job-<?php echo $job['job_id']; ?>">

                                                    <td><?php echo $counter; ?></td>

                                                    <td><?php echo $job['job_title']; ?></td>
                                                    <td><?php echo $job['job_type_name']; ?></td>
                                                    <td><?php echo $job['category_name']; ?></td>
                                                    <td><?php echo $job['job_amount']; ?></td>     
                                                    <td><span class="badge badge-danger"><?php echo $job['status']; ?></span></td>     

                                                    <td>
                                                    

                                                    <a  class="label label-inverse-primary change-job-status" rel="<?php echo $job['job_id']; ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangerole">
                                                        <span class="badge badge-danger">Change Status</span></a><br/>

                                                    <a rel="<?php echo $job['job_id']; ?>" href="<?php echo base_url(); ?>view-job/<?php echo base64_encode($job['job_id']); ?>" class="delete view-job"><i class="fa fa-eye"></i></a>

                                                    <a rel="<?php echo $job['job_id']; ?>"  href="<?php echo base_url(); ?>edit-jobs/<?php echo base64_encode($job['job_id']); ?>" class="delete edit-jobs"><i class="fa fa-edit"></i></a>

                                                    <a rel="<?php echo $job['job_id']; ?>" href="#" class="delete delete-jobs"><i class="fa fa-trash"></i></a>

                                                </td>
                                                </tr>

                                                <?php $counter = $counter +1; } ?>    


                                                

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                 

                </div>

            </div>

 <div id="myModalChangerole" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header change-role-m-h">
    
    <h4 class="modal-title">Change Status</h4>
    </div>
    <div class="modal-body">
        <div class="form-group row">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
        <select name="jobstatus" class="form-control" id="jobstatus">
       
        <option value="A">Active</option>
        <option value="D">Deactive</option>

        </select>
        <input type="hidden" name="jobid" id="jobid" >
        </div>
        </div>
        
          <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
       
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="change-status-submit">Submit</button>
        </div>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
    </div>

    </div>
    </div>