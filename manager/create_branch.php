<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add New Brnach</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_add_new_branch" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Branch Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter New Branch Name" class="form-control" id="txt_branch_name" placeholder="Branch Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Branch Manager Userrname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Branch Manager Name" id="txt_branch_manager_name" placeholder="Enter Branch Manager Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Branch Manager Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" data-error="Enter Branch Manager Email" id="txt_branch_manager_email" placeholder="Enter Branch Manager Email" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Branch Manager Contact</label>
                                        <div class="col-sm-9">
                                            <input type="number" minLength="10" class="form-control" data-error="Enter Branch Manager Contact" id="txt_branch_manager_contact" placeholder="Enter Branch Manager Contact" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Branch Manager Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" data-error="Enter Manager Password" class="form-control" id="txt_branch_manager_password" placeholder="Enter Branch Manager Password" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>       

                                   <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Verify Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" data-error="Please Verify Manager Password" class="form-control" id="txt_verify_password" placeholder="Verify Password" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>  

                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Create Branch</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Branches </div>
                            <div class="panel-body">
                               <table class="table table-hover" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Name</th>
                                        <th>Branch Manager</th>
                                    </tr>
                                </thead>
                                <tbody id="add_customers_table">
                                   
                                   <?php  

                                    $get_users_query = mysqli_query($connection,"SELECT * FROM users_table JOIN system_branches ON `users_table`.`user_branch` = `system_branches`.`system_branch_id` WHERE `users_table`.`user_type` = '2' ");
                                    while ($get_each_user = mysqli_fetch_array($get_users_query)) { ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_user["users_table_id"]; ?></th>
                                            <td><?php echo $get_each_user["system_branch_name"]; ?></td>
                                            <td><?php echo $get_each_user["user_name"]; ?></td>
                                             
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>