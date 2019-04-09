<?php

$my_product_table = $_COOKIE['b']."_stock_product_table";
$my_category = $_COOKIE['b']."_product_category";

?>

<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Record New Arrivals</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_stock_officer" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Container Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Container Number" class="form-control" id="txt_container_no" placeholder="Container Number" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_product_name">
                                                <?php  $get_product_name_query = mysqli_query($connection,"SELECT * FROM $my_product_table");
                                                    while ($product_names = mysqli_fetch_array($get_product_name_query)) {  ?>

                                                <option value="<?php  echo $product_names['stock_product_id']  ?>"><?php   echo $product_names['stock_product_name']; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label"> Product Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_product_category">
                                                <?php  $get_product_category_query = mysqli_query($connection,"SELECT * FROM $my_category");
                                                    while ($category_names = mysqli_fetch_array($get_product_category_query)) {  ?>

                                                <option value="<?php  echo $category_names['product_category_id']  ?>"><?php   echo $category_names['product_category_name']; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Expected Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" data-error="Enter Expected Quantity" id="txt_expected_quantity" placeholder="Expected Quantity" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Supplier Name" id="txt_supplier" placeholder="Supplier Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Shortages</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" data-error="Enter Shortages" id="txt_shortages" placeholder="Shortages">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" data-error="Enter Date Of Product" id="txt_date" placeholder="Date Of Product" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Car Number </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Car Number" id="txt_car_number" placeholder="Car Number" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Driver Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Driver Name" id="txt_driver_name" placeholder="Driver Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>                   
                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Record Arrival</button>
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
                            <div class="panel-heading">List Of Pending Activities</div>
                           <div class="panel-body">
                               <table class="table table-hover" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Container Number</th>
                                        <th>Product Expected Quantity</th>
                                        <th>Product Date</th>
                                    </tr>
                                </thead>
                                <tbody id="add_customers_table">
            
                                   <?php  

                                    $get_stock_officer_details = mysqli_query($connection,"SELECT * FROM stock_oficer JOIN $my_product_table ON `stock_oficer`.`stock_product_name` = $my_product_table.`stock_product_id` JOIN $my_category ON `stock_oficer`.`stock_product_category` = $my_category.`product_category_id` WHERE `record_status` = '0'");
                                    while ($stock_officer_detail = mysqli_fetch_array($get_stock_officer_details)) { ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $stock_officer_detail["stock_officer_record_id"]; ?></th>
                                            <td><?php echo $stock_officer_detail["stock_product_name"]; ?></td>
                                            <td><?php echo $stock_officer_detail["product_category_name"]; ?></td>
                                            <td><?php echo $stock_officer_detail["stock_container_number"]; ?></td>
                                            <td><?php echo $stock_officer_detail["stock_expected_quantity"]; ?></td>
                                            <td><?php echo date("Y-M-d",strtotime($stock_officer_detail["stock_date"])) ?></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>











                   
           