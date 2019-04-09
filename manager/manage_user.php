<?php
     $corrected_user_branches = $my_branch."_users_table";
?>

<div id="global">
<div class="container-fluid">


 <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Users</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_users_table">
                                   
                                   <?php  

                                    $get_users_query = mysqli_query($connection,"SELECT * FROM $corrected_user_branches JOIN `system_branches` on `$corrected_user_branches`.`user_branch` = `system_branches`.`system_branch_id` JOIN user_work_types on `$corrected_user_branches`.`user_type` = `user_work_types`.`work_type_id` JOIN `user_status` on `$corrected_user_branches`.`user_status` = `user_status`.`user_status_id` ORDER BY `$corrected_user_branches`.`users_table_id` DESC");
                                    while ($get_each_user = mysqli_fetch_array($get_users_query)) { ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_user["users_table_id"]; ?></th>
                                            <td><?php echo $get_each_user["user_name"]; ?></td>
                                            <td><?php echo $get_each_user["work_type"]; ?></td>
                                            <td><?php echo $get_each_user["user_email"]; ?></td>
                                            <td><?php echo $get_each_user["user_contact"]; ?></td>
                                            <td><?php echo $get_each_user["status_name"]; ?></td>
                                            <td><button class="edit_users btn btn-success btn-md" id="<?php  echo $get_each_user["users_table_id"];?>" >Edit</button><button class="delete_users btn btn-danger btn-md" id="<?php  echo $get_each_user["users_table_id"];    ?>">Delete</button><?php if($get_each_user['user_status'] == 1){ ?> <button class="lock_users btn btn-warning btn-md" id="<?php  echo $get_each_user["users_table_id"]; ?>">Lock User</button><?php  }else{ ?><button class="unlock_users btn btn-warning btn-md" id="<?php  echo $get_each_user["users_table_id"]; ?>">UnLock User</button><?php  } ?></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_users_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit User
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_edit_user" method="post">
                            <input type="hidden" id="hidden_text">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter User Full Name" class="form-control" id="txt_full_name" placeholder="Full Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter User Email" id="txt_email" placeholder="Email">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-minlength="10" data-error="Enter Valid 10 Digit Phone Number" class="form-control" id="txt_contact" placeholder="Contact" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">User Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_user_type">
                                                <?php  $get_work_type_query = mysqli_query($connection,"SELECT * FROM `user_work_types`");
                                                    while ($work_type_items = mysqli_fetch_array($get_work_type_query)) {  ?>

                                                <option value="<?php  echo $work_type_items['work_type_id']  ?>"><?php   echo $work_type_items['work_type']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">User Branch</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_user_branch">
                                                <option value="<?php  echo $my_bi;  ?>" selected><?php   echo $my_branch; ?></option>   
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Username" id="txt_username" placeholder="Username" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">User Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="User Status" class="form-control" class="form-control" id="txt_user_status" placeholder="User Status" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                   
                       </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </div>


         <div id="delete_users_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Delete User
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_delete_user" method="post">
                                    <input type="hidden" id="hidden_text_del">
                                    
                                    <div class="form-group">
                                        <h4>Are You Sure You Want To Delete This User</h4>
                                    </div>             
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                            <input type="submit" class="btn btn-primary btn-lg" value="Yes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <div id="lock_users_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Lock User
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_lock_user" method="post">
                                    <input type="hidden" id="hidden_text_lock">
                                    <input type="hidden" id="lock_status">
                                    
                                    <div class="form-group">
                                        <h4>Are You Sure You Want To Lock This User</h4>
                                    </div>             
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                            <input type="submit" class="btn btn-primary btn-lg" value="Yes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <div id="unlock_users_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                UnLock User
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_unlock_user" method="post">
                                    <input type="hidden" id="hidden_text_unlock">
                                    <input type="hidden" id="unlock_status">
                                    
                                    <div class="form-group">
                                        <h4>Are You Sure You Want To UnLock This User</h4>
                                    </div>             
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                            <input type="submit" class="btn btn-primary btn-lg" value="Yes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>