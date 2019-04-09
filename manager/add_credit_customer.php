<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add Credit Customer</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_add_credit_customer" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Customer Full Name" class="form-control" id="txt_full_name" placeholder="Full Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Customer Email" id="txt_email" placeholder="Email">
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
                                        <label for="inputEmail3" class="col-sm-3 control-label"> Branch</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_customer_branch">
                                                <?php  $get_branch_query = mysqli_query($connection,"SELECT * FROM `system_branches`");
                                                    while ($branch_items = mysqli_fetch_array($get_branch_query)) {  ?>

                                                <option value="<?php  echo $branch_items['system_branch_id']  ?>"><?php   echo $branch_items['system_branch_name']; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Customer Address Or Location" class="form-control" id="txt_address" placeholder="Address" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Create Customer</button>
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
                            <div class="panel-heading">List Of Credit Customers</div>
                            <div class="panel-body">
                               <table class="table table-hover" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Contact</th>
                                        <th>Branch</th>
                                        <th>Address</th>
                                        <th>Items Credited <br> Quantity</th>
                                        <th>Items Credited <br> Cost</th>
                                        <th>Items Credited <br> Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="add_customers_table">
                                   
                                   <?php  

                                    $get_users_query = mysqli_query($connection,"SELECT * FROM customers_table join system_branches on `customers_table`.`customer_branch` = `system_branches`.`system_branch_id` WHERE `customer_type` = '1' ORDER BY `customers_table`.`customers_id` DESC ");
                                    while ($get_each_user = mysqli_fetch_array($get_users_query)) { ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_user["customers_id"]; ?></th>
                                            <td><?php echo $get_each_user["customer_name"]; ?></td>
                                            <td><?php echo $get_each_user["customer_contact"]; ?></td>
                                            <td><?php echo $get_each_user["system_branch_name"]; ?></td>
                                            <td><?php echo $get_each_user["customer_address"]; ?></td>
                                            <td><?php echo $get_each_user["items_credited_quantity"]; ?></td>
                                            <td><?php echo $get_each_user["items_credited_cost"]; ?></td>
                                            <td><?php echo $get_each_user["items_credited_balance"]; ?></td>
                                            
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>











                   
           