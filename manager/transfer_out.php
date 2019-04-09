
<?php
     
     $corrected_product_table = $my_branch."_stock_product_table";
     $corrected_category = $my_branch."_product_category";

?>
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
                                            <td><button class="send_product_request btn btn-danger btn-md" id="<?php  echo $get_each_request["request_table_id"];    ?>">Transfer Out</button></td>
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
                  
         


             <div id="transfer_product_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Transfer Products
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_transfer_product" method="post">
                            <input type="hidden" id="hidden_text">
                            <input type="hidden" id="hidden_branch">
                                    
                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Receving Branch</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Receving Branch" class="form-control" id="txt_receiving_branch" placeholder="Receiver Branch" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                 </div>
                                 <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Description</label>
                                        <div class="col-sm-9">
                                            <input type="text"  data-error="Enter Item Description" class="form-control" id="txt_item_description" placeholder="Item Description" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                 <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item ID</label>
                                        <div class="col-sm-9">
                                            <input type="text"  data-error="Item ID" class="form-control" id="txt_item_id" placeholder="Item ID" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Required</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Items Required" class="form-control" id="txt_quantity_required" placeholder="Qunatity Required" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="divider"></div>


                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Product</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_my_request_product">
                                                <?php  $get_product_query = mysqli_query($connection,"SELECT * FROM $corrected_product_table JOIN $corrected_category ON $corrected_product_table.`stock_product_category` = $corrected_category.`product_category_id`");
                                                    while ($product_names = mysqli_fetch_array($get_product_query)) {  ?>

                                                <option value="<?php  echo $product_names['stock_product_id']  ?>"><?php   echo $product_names['stock_product_name']."&nbsp;-&nbsp;".$product_names["product_category_name"]; ?></option>
                                                        
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Remaining</label>
                                        <div class="col-sm-9">
                                            <input type="number"  data-error="Quantity In Stock" class="form-control" id="txt_quantity_remain" placeholder="Quantity In Stock" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity To Transfer</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Items Available" class="form-control" id="txt_transfer_quantity" placeholder="Quantity To Transfer" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Send Products">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>

       

        

