<?php

$my_product_table = $_COOKIE['b']."_stock_product_table";
$my_category = $_COOKIE['b']."_product_category";

?>

<div class="container-fluid">
                   
                   <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Processed Products </div>
                            <div class="panel-body">
                               <div class="table-responsive"> <!--
                                <button class="btn btn-primary" id="btn_json">JSON</button>
                                <button class="btn btn-primary" id="btn_pdf">PDF</button>
                                <button class="btn btn-primary" id="btn_csv">CSV</button>
                                <button class="btn btn-primary" id="btn_txt">TXT</button>  -->
                                <br><br>
                               <table class="table table-hover" id="my_selected_table">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th style="text-align: center">Product Name</th>
                                        <th style="text-align: center">Product Category</th>
                                        <th style="text-align: center">Container Number</th>
                                        <th style="text-align: center">Quantity Entered</th>
                                    </tr>
                                </thead>
                                    <tbody id="add_customers_table" style="text-align: center">
            
                                   <?php  

                                    $get_stock_officer_details = mysqli_query($connection,"SELECT * FROM stock_oficer JOIN $my_product_table ON `stock_oficer`.`stock_product_name` = $my_product_table.`stock_product_id` JOIN $my_category ON `stock_oficer`.`stock_product_category` = $my_category.`product_category_id` WHERE `record_status` = '1'");
                                    while ($stock_officer_detail = mysqli_fetch_array($get_stock_officer_details)) { ?>               
                                        <tr>
                                           
                                    <td><?php echo $stock_officer_detail["stock_product_name"]; ?></td>
                                            <td><?php echo $stock_officer_detail["product_category_name"]; ?></td>
                                            <td><?php echo $stock_officer_detail["stock_container_number"]; ?></td>
                                            <td><?php echo $stock_officer_detail["stock_expected_quantity"]; ?></td>
                                        </tr>
                                  <?php  }  ?>
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>