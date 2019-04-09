
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
                                        <th>Branch</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_users_table">
                                   
                                   <?php  

                                    $get_users_query = mysqli_query($connection,"SELECT * FROM users_table JOIN `system_branches` on `users_table`.`user_branch` = `system_branches`.`system_branch_id` JOIN user_work_types on `users_table`.`user_type` = `user_work_types`.`work_type_id` JOIN `user_status` on `users_table`.`user_status` = `user_status`.`user_status_id` ORDER BY `users_table`.`users_table_id` DESC");
                                    while ($get_each_user = mysqli_fetch_array($get_users_query)) { ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_user["users_table_id"]; ?></th>
                                            <td><?php echo $get_each_user["user_name"]; ?></td>
                                            <td><?php echo $get_each_user["work_type"]; ?></td>
                                            <td><?php echo $get_each_user["user_email"]; ?></td>
                                            <td><?php echo $get_each_user["user_contact"]; ?></td>
                                            <td><?php echo $get_each_user["status_name"]; ?></td>
                                            <td><?php echo $get_each_user["system_branch_name"]; ?></td>
                                            <td><button class="edit_main_users btn btn-success btn-md" id="<?php  echo $get_each_user["users_table_id"];?>" >Edit</button></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_main_users_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <form class="form-horizontal" data-toggle="validator" id="form_edit_main_user" method="post">
                            <input type="hidden" id="hidden_text">
                            <input type="hidden" id="hidden_position">
                            <input type="hidden" id="hidden_branch">
                            <input type="hidden" id="hidden_my_branch_id">
                            <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">User Branch</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="User Status" class="form-control" class="form-control" id="txt_branch_name" placeholder="User Branch" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

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

                                     <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">User Position</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="User Status" class="form-control" class="form-control" id="txt_position" placeholder="User Position" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Change Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" data-error="User Password" class="form-control" class="form-control" id="txt_new_password" placeholder="Enter New Password">
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


         
