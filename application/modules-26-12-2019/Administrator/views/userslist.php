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

                                    <h3>

                                        <?php echo $title; ?></h3>

                                    <div class="dashboard-message dashboard-table-responsive bdr clearfix ">

                                        <div class="table-responsive dashboard-table-responsive">

                                            <table class="table mb-0">

                                                <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th>Name</th>

                                                    <th>Email</th>

                                                    <th>Phone</th>

                                                    <th>Image</th>

                                                    <th>Gender</th>

                                                    <th>Status</th>

                                                    <th>Action</th>

                                                </tr>

                                                </thead>

                                                <tbody>

                                                <?php 
                                                    $counter = 1;
                                                foreach ($users as $user) { ?>
                                                    
                                                <tr>

                                                    <td><?php echo $counter; ?></td>

                                                    <td><?php echo $user['fullname']; ?></td>

                                                    <td><?php echo $user['email']; ?></td>

                                                    <td><?php echo $user['phoneNo']; ?></td>
                                                    <?php if($user['image']!=''){ ?>    
                                                    <td><img src="<?php echo base_url(); ?>assets/img/profileimage/<?php echo $user['image']; ?>" style="width:50px; height:40px;"></td>
                                                    <?php } else { ?>
                                                    <td><img src="<?php echo base_url(); ?>assets/img/no-image.png" style="width:50px; height:40px;"></td>
                                                    <?php } ?>
                                                        <?php if($user['gender']== 1){ ?>

                                                        <td>M</td>
                                                        <?php } else{ ?>
                                                        <td>F</td>
                                                    <?php } ?>

                                                   <td><span class="badge badge-danger"><?php echo $user['status']; ?></span></td>

                                                    <td>

                                                        <a  class="label label-inverse-primary change-role-cls" rel="<?php echo $user['id']; ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangerole"><span class="badge badge-danger">Change Status</span></a>

                                                        <a rel="<?php echo $user['id']; ?>" href="#" class="delete delete-user"><i class="fa fa-trash"></i></a></td>
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
        <select name="status" class="form-control" id="status">
       
        <option value="A">Active</option>
        <option value="D">Deactive</option>

        </select>
        <input type="hidden" name="userid" id="userid" >
        </div>
        </div>
        
          <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
       
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="change-role-submit">Submit</button>
        </div>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
    </div>

    </div>
    </div>