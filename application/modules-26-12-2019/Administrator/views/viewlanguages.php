<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"> -->


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

                                                    <th>Language Name</th>                                                  

                                                    <th>Action</th>

                                                </tr>

                                                </thead>

                                                <tbody>

                                                <?php 
                                                    $counter = 1;
                                                foreach ($languages as $language) { ?>
                                                    
                                                <tr>

                                                    <td><?php echo $counter; ?></td>

                                                    <td><?php echo $language['language_name']; ?></td>
                                                  

                                                    <td> 
                                                    <a rel="<?php echo $language['language_id']; ?>" href="<?php echo base_url(); ?>edit-language/<?php echo base64_encode($language['language_id']); ?>" class="delete edit-language"><i class="fa fa-edit"></i></a>                                                       
                                                    <a rel="<?php echo $language['language_id']; ?>" href="#" class="delete delete-languages"><i class="fa fa-trash"></i></a></td>
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

