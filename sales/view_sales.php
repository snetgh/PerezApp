<?php

$my_product_table  = $_COOKIE['b']."_stock_product_table";
$my_sales_table = $_COOKIE['b']."_sales_table";
$my_category = $_COOKIE['b']."_product_category";



?>


<div class="container-fluid">

 <div class="row cm-fix-height">
                    <div class="col-lg-12  col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Daily Sales </div>
                            <div class="panel-body">
                               <div class="table-responsive">

                                <table class="table" id="my_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice ID</th>
                                            <th>Customer</th>
                                            <th>Item</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Amount Payed</th>
                                            <th>Recorded At</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $initial_items = 0;
                                        $initial_amount = 0;


                                        $sales_person = $_COOKIE['u'];
                                        $current_date = date("Y-m-d");
                                        $run_get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `timestamp` LIKE '%$current_date%' AND `sales_person` = '$sales_person'");
                                        while ($each_item = mysqli_fetch_array($run_get_query)) { 
                                            
                                            $each_item_number = $each_item['item_quantity'];
                                            $each_amount_number = $each_item['amount_payed'];

                                            $initial_items += $each_item_number;
                                            $initial_amount += $each_amount_number;
                                            ?>
                                           <tr>
                                       
                                        <td><?php echo $each_item["sales_id"]; ?></td> 
                                        <td><?php echo $each_item["invoice_id"]; ?></td> 
                                        <td><?php echo $each_item["customer_name"]; ?></td>
                                        <td><?php echo $each_item["item_description"]; ?></td> 
                                        <td><?php echo $each_item["item_price"]; ?></td> 
                                        <td><?php echo $each_item["item_quantity"]; ?></td>
                                        <td><?php echo $each_item["amount_payed"]; ?></td>
                                        <td><?php echo $each_item["timestamp"]; ?></td>
                                        
                                           </tr>
                                       <?php }  ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp; </td>
                                    <td> &nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    
                                    </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><strong>Items Sold</strong> </td>
                                    <td><strong><?php echo $initial_items  ?></strong> </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    
                                    </tr>

                                    <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><strong>Total Sales</strong> </td>
                                    <td>&nbsp;</td>
                                    <td><strong><?php echo $initial_amount  ?></strong> </td>
                                    <td>&nbsp;</td>
                                    
                                    </tr>
                                    
                                    
                                    </tfoot>
                                </table>
                            </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>