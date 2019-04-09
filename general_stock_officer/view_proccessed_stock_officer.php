<?php

$my_product_table = $_COOKIE['b']."_stock_product_table";
$my_category = $_COOKIE['b']."_product_category";

?>

<div class="container-fluid">
                   
                   <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Recorded Products </div>
                            <div class="panel-body">
                               <div class="table-responsive"> <!--
                                <button class="btn btn-primary" id="btn_json">JSON</button>
                                <button class="btn btn-primary" id="btn_pdf">PDF</button>
                                <button class="btn btn-primary" id="btn_csv">CSV</button>
                                <button class="btn btn-primary" id="btn_txt">TXT</button>  -->
                                <br><br>
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

                            $get_stock_officer_details = mysqli_query($connection,"SELECT * FROM stock_oficer JOIN $my_product_table ON `stock_oficer`.`stock_product_name` = $my_product_table.`stock_product_id` JOIN $my_category ON `stock_oficer`.`stock_product_category` = $my_category.`product_category_id` WHERE `record_status` = '1'");
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
            </div>