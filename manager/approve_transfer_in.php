
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
                                        <th>Item Given</th>
                                        <th>Quantity Required</th>
                                        <th>Quantity Given</th>
                                        <th>Branch Responding</th>
                                        <th>Item ID</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                                   $my_branch_id = $_COOKIE['bi'];

                                    $get_request_query = mysqli_query($connection,"SELECT * FROM pending_branch_request_table JOIN system_branches ON pending_branch_request_table.receiving_branch = system_branches.system_branch_id WHERE `receiving_branch`= '$my_branch_id'");
                                    while ($get_each_request = mysqli_fetch_array($get_request_query)) { ?>      
                                        <tr>
                                            <th scope="row"><?php echo $get_each_request["request_id"]; ?></th>
                                            <td><?php echo $get_each_request["item_description"]; ?></td>
                                            <td><?php echo $get_each_request["item_sent"]; ?></td>
                                            <td><?php echo $get_each_request["quantity_required"]; ?></td>
                                            <td><?php echo $get_each_request["quantity_given"]; ?></td>
                                            <td><?php echo $get_each_request["system_branch_name"]; ?></td>
                                            <td><?php echo $get_each_request["item_id"]; ?></td>
                                            <td><button class="approve_product_request btn btn-danger btn-md" id="<?php  echo $get_each_request["request_table_id"];    ?>">Approve Transfer</button></td>
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
                  
         


             <div id="approve_product_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Approve Products
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_approve_product" method="post">
                            <input type="hidden" id="hidden_text">
                                    
                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Sending Branch</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Sending Branch" class="form-control" id="txt_sending_branch" placeholder="Sending Branch" required="required" disabled='disabled'>
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
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Description</label>
                                        <div class="col-sm-9">
                                            <input type="text"  data-error="Enter Item Description" class="form-control" id="txt_item_description" placeholder="Item Description" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Sent</label>
                                        <div class="col-sm-9">
                                            <input type="text"  data-error="Enter Item Sent" class="form-control" id="txt_item_sent" placeholder="Item Sent" required="required" disabled='disabled'>
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

                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Sent</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Items Sent" class="form-control" id="txt_quantity_sent" placeholder="Qunatity Sent" required="required" disabled='disabled'>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Approve Products">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>

       

        

