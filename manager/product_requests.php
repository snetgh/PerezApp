
<div id="global">          
<div class="container-fluid">
 <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Requests</div>
                            <div class="panel-body">
                            <form method="post">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Item Description</th>
                                        <th>Quantity Required</th>
                                        <th>Branch Requesting</th>
                                        <th>Item ID</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                                   $my_branch_id = $_COOKIE['bi'];

                                    $get_request_query = mysqli_query($connection,"SELECT * FROM branch_request_table JOIN system_branches ON branch_request_table.sending_branch = system_branches.system_branch_id WHERE `receiving_branch`= '$my_branch_id'");
                                    while ($get_each_request = mysqli_fetch_array($get_request_query)) { ?>      
                                        <tr>
                                            <th scope="row"><?php echo $get_each_request["request_id"]; ?></th>
                                            <td><?php echo $get_each_request["item_description"]; ?></td>
                                            <td><?php echo $get_each_request["quantity_required"]; ?></td>
                                            <td><?php echo $get_each_request["system_branch_name"]; ?></td>
                                            <td><?php echo $get_each_request["item_id"]; ?></td>
                                            <td><button class="delete_requests btn btn-danger btn-md" id="<?php  echo $get_each_request["request_table_id"];    ?>">Delete</button></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </form>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                  
         


             <div id="edit_product_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit Product
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_edit_product" method="post">
                            <input type="hidden" id="hidden_text">
                                    
                            <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Item Name" class="form-control" id="txt_item_name" placeholder="Item Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_item_category">
                                                <?php  $get_category_query = mysqli_query($connection,"SELECT * FROM `$corrected_category`");
                                                    while ($category_items = mysqli_fetch_array($get_category_query)) {  ?>

                                                <option value="<?php  echo $category_items['product_category_id']  ?>"><?php   echo $category_items['product_category_name']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Unit Price</label>
                                        <div class="col-sm-9">
                                            <input type="number"  data-error="Enter Unit Price" class="form-control" id="txt_unit_price" placeholder="Unit Price" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Available</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Items Available" class="form-control" id="txt_item_available" placeholder="Qunatity Available" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Expiry Date</label>
                                        <div class="col-sm-9">
                                            <input type="date"  data-error="Choose Product Expiry Date" class="form-control" id="txt_expiry" placeholder="Product Expiry Date" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
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

         

