<?php

$my_product_table  = $_COOKIE['b']."_stock_product_table";
$my_sales_table = $_COOKIE['b']."_sales_table";

?>

<div id="global">
            
            <div class="container-fluid">
                <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Return Goods</div>
                            <div class="panel-body">
                               <form class="form-horizontal form-material" method="post">
                                <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="example-email" class="col-md-12">Enter Receipt ID</label>
                                    <div class="col-md-12">
                                       <input type="text" class="form-control form-control-line" name="txt_receipt_no" id="txt_receipt_no" placeholder="Enter Receipt ID" required="required">
                                        </div>
                                </div>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="btn_submit">Get Receipt List</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>


                 <?php

                if(isset($_POST['btn_submit'])){

                    $get_invoice_id = $_POST['txt_receipt_no'];

                    $check_database = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$get_invoice_id'");
                    if(mysqli_num_rows($check_database) > 0 ){

                        $get_query_1 = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$get_invoice_id' LIMIT 1");
                        $get_details_1 = mysqli_fetch_array($get_query_1);  
                    ?>

                    <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Items </div>
                            <div class="panel-body">
                            <table class="table"  id="live_table">
                                   <thead>
                                    <tr>
                                    <th colspan="4" style="text-align: center;">Perez Frozen Foods</th>
                                </tr>
                                    <tr> <th colspan="4" style="text-align: center;">Official Receipt</th></tr>
                                    <tr> <th colspan="4" style="text-align: center;">Tel: 0247732082</th></tr>
                                   </thead>
                                   <tbody id="live_table_body">
                                       <tr>
                                           <td>Date</td>
                                           <td>Invoice No.</td>
                                           <td>Time:</td>
                                           <td>Cus. Name:</td>
                                       </tr>
                                       <tr>
                                           <td><?php echo date("Y-M-d",strtotime($get_details_1['timestamp'] )) ?></td>
                                           <td id="product_invoice"><?php  echo $get_invoice_id;  ?></td>
                                           <td><?php date("H:m",strtotime($get_details_1['timestamp'] ))  ?></td>
                                           <td id="customer_name"><?php  echo $get_details_1['customer_name'];  ?></td>
                                       </tr>
                                       <tr>
                                           <td>Desciption</td>
                                           <td>Quantity</td>
                                           <td>U. Price</td>
                                           <td>Amount</td>

                                           
                                       </tr>
                                       <?php

                                       $inital_amount = 0;
                                       $inital_amount_payed = 0;
                                       $inital_discount = 0;

                                        $get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$get_invoice_id'");
                                        while($get_details = mysqli_fetch_array($get_query)){
                                            
                                            $get_amount = $get_details['total_amount'];
                                            $get_amount_payed = $get_details['amount_payed'];
                                            $get_discount = $get_details['discount_given'];

                                            $inital_amount += $get_amount;
                                            $inital_amount_payed += $get_amount_payed;
                                            $inital_discount += $get_discount;
                                            
                                            ?>
                                            
                                            <tr>
                                            <td><?php  echo $get_details['item_description']; ?></td>
                                            <td><?php  echo $get_details['item_quantity']; ?></td>
                                            <td><?php  echo $get_details['item_price']; ?></td>
                                            <td><?php  echo $get_details['total_amount']; ?></td>
                                            
                                            
                                            </tr>


                                      <?php   }
                                            
                                        ?>
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Total</strong></td>
                                           <td class="txt_total_holder"><strong><?php echo $inital_amount; ?></strong></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Discount</strong></td>
                                           <td class="txt_discount_holder"><strong><?php echo $inital_discount;?></strong></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Amount Paid</strong></td>
                                           <td class="txt_amount_paid_holder"><strong><?php echo $inital_amount_payed;?></strong></td>
                                       </tr>
                                       <tr>
                                           <td colspan="5" style="text-align: center;font-weight: bold">Goods Sold Are Not Returnable</td>
                                          
                                       </tr>
                                       <tr>
                                           <td colspan="5" style="text-align: center;font-weight: bold">**** &nbsp; Served By <strong> <?php echo $_COOKIE['u'];  ?>  </strong> &nbsp;   ****</td>
                                          
                                       </tr>
                                   </tfoot>
                               </table>

                                </div>

                    </div>
                    <form method="post">
                        <div style="margin: 20px;text-align: center;">
                            <input type="submit" class="btn btn-warning btn-lg" name="return_goods" value="Return Goods" id="return_goods">
                            <input type="hidden" name="hidden_text" value="<?php echo $get_invoice_id; ?>">
                    </div>
                </form>
                </div>
            </div>

                
                    
         
                  <?php  }else{
                        echo "<script>alert('Receipt Number Not Found')</script>";
                    }

                 }

                 if(isset($_POST['return_goods'])){
                     $number_counter = 1;
                    $get_invoice_id = $_POST['hidden_text'];
                    $get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$get_invoice_id'");
                    $number_in_table = mysqli_num_rows($get_query);
                    while($get_details = mysqli_fetch_array($get_query)){
                        
                        $get_item_id = $get_details['item_id'];
                        $get_item_quantity = $get_details['item_quantity'];
                        $get_sales_id = $get_details['sales_id'];

                        $get_query_2 = mysqli_query($connection,"SELECT * FROM $my_product_table WHERE `stock_product_id` = '$get_item_id' LIMIT 1");
                        $get_number = mysqli_fetch_array($get_query_2);
                        $new_total =  $get_item_quantity+ $get_number['stock_product_items_avail'];
                        $update_query = mysqli_query($connection,"UPDATE $my_product_table SET `stock_product_items_avail` = '$new_total' WHERE $my_product_table.`stock_product_id` = '$get_item_id'");
                        
                        if($update_query){
                            $delete_query = mysqli_query($connection,"DELETE FROM $my_sales_table WHERE $my_sales_table.`sales_id` = '$get_sales_id'");    
                            
                        if($number_counter == $number_in_table){
                                echo "<script>alert('All Items Restored')</script>";
                            }else{
                                $number_counter++;
                            }
                        
                        }

                       

                    
                    }
                        

                 }

                ?>

           


            