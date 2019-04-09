<?php

$my_product_table = $_COOKIE['b']."_stock_product_table";
$my_category = $_COOKIE['b']."_product_category";

?>

<div id="global">
            
                <div class="container-fluid">
                <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Pending Arrivals From WareHouse Manager</div>
                           <div class="panel-body">
                               <table class="table table-hover" id="my_selected_table">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th style="text-align: center">Product Name</th>
                                        <th style="text-align: center">Product Category</th>
                                        <th style="text-align: center">Container Number</th>
                                        <th style="text-align: center">Product Expected Quantity</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_customers_table" style="text-align: center">
            
                                   <?php  

                                    $get_stock_officer_details = mysqli_query($connection,"SELECT * FROM stock_oficer JOIN $my_product_table ON `stock_oficer`.`stock_product_name` = $my_product_table.`stock_product_id` JOIN $my_category ON `stock_oficer`.`stock_product_category` = $my_category.`product_category_id` JOIN warehouse_manager on `stock_oficer`.`stock_officer_record_id` = `warehouse_manager`.`product_id` where warehouse_item_status = '0' ");
                                    while ($stock_officer_detail = mysqli_fetch_array($get_stock_officer_details)) { ?>
                                        
                                        <tr>
                                           
                                            <td><?php echo $stock_officer_detail["stock_product_name"]; ?></td>
                                            <td><?php echo $stock_officer_detail["product_category_name"]; ?></td>
                                            <td><?php echo $stock_officer_detail["stock_container_number"]; ?></td>
                                            <td><?php echo $stock_officer_detail["stock_expected_quantity"]; ?></td>
                                            <td><button class="btn btn-primary btn_approve_warehouse_manager" id="<?php echo $stock_officer_detail["stock_officer_record_id"];    ?>">Approve</button></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Product Details
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form id="approve_warehouse_manager" data-toggle="validator">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Product Name:</label>
                                    <input type="text" class="form-control" id="txt_product_name" required="required" placeholder="Product Name" disabled="disabled">
                                    <input type="hidden" id="txt_hidden_text">
                                   
                                </div>  
                            </div>

                                <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Product Category:</label>
                                    <input type="text" class="form-control" id="txt_product_category" required="required" placeholder="Product Category" disabled="disabled">
                                    <input type="hidden" id="txt_cat_number">
                                </div>    
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Container Number:</label>
                                    <input type="text" class="form-control" id="txt_container_no" required="required" placeholder="Container Number" disabled="disabled">
                                </div>
                                </div>
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Expected Quantity:</label>
                                    <input type="text" class="form-control" id="txt_expected_quantity" required="required" placeholder="Expected Quantity" disabled="disabled">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Shortages:</label>
                                    <input type="text" class="form-control" id="txt_shortages" required="required" placeholder="Shortages" disabled="disabled">
                                </div>
                                </div>
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Supplier:</label>
                                    <input type="text" class="form-control" id="txt_supplier" required="required" placeholder="Supplier" disabled="disabled">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Stock Date:</label>
                                    <input type="text" class="form-control" id="txt_stock_date" required="required" placeholder="Stock Date" disabled="disabled">
                                </div>
                                </div>
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Car Number:</label>
                                    <input type="text" class="form-control" id="txt_car_number" required="required" placeholder="Car Number" disabled="disabled">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Quantity Received:</label>
                                    <input type="number" class="form-control" id="txt_quantity_received" required="required" placeholder="Quantity Received" disabled="disabled">
                                </div>
                                </div>
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Production Date:</label>
                                    <input type="date" class="form-control" id="txt_production_date" required="required" placeholder="Production Date" disabled="disabled">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Expiry Date:</label>
                                    <input type="date" class="form-control" id="txt_expiry_date" required="required" placeholder="Expiry Date" disabled="disabled">
                                </div>
                                </div>
                                <div class="col-lg-6">
                                     <div class="form-group">
                                    <label for="name_holder" class="col-form-label">Receiver:</label>
                                    <input type="text" class="form-control" id="txt_receiver" required="required" placeholder="Receiver" disabled="disabled">
                                </div>
                                </div>
                            </div>
            
            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Approve Product</button>
                        </div>
                    </div>
                </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>











                   
           