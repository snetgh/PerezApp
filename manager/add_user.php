<?php
     $corrected_user_branches = $my_branch."_users_table";
?>

<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add User</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_add_user" method="post">
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
                                                    while ($work_type_items = mysqli_fetch_array($get_work_type_query)) {
                                                        if($work_type_items["work_type"] == "Sales Person"){
                                                        ?>     
                                                <option value="<?php  echo $work_type_items['work_type_id']  ?>"><?php   echo $work_type_items['work_type']; ?></option>                
                                                 <?php   }else{ }
                                                    }
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
                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" data-error="Enter Password" class="form-control" class="form-control" id="txt_password" placeholder="Password" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Create User</button>
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
                                        <th>Date Created</th>
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
                                            <td><?php echo $get_each_user["system_branch_name"]; ?></td>
                                            <td><?php echo date("d-M-Y",strtotime($get_each_user["timestamp"])) ?></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>











                   
           