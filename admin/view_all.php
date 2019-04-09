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
                                        <th>Status</th>
                                        <th>Branch</th>
                                        <th>Date Created</th>
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











                   
           