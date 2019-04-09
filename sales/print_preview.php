<?php

$my_product_table  = $_COOKIE['b']."_stock_product_table";
$my_sales_table = $_COOKIE['b']."_sales_table";
$my_category = $_COOKIE['b']."_product_category";

    if(!isset($_GET["pid"])){
        echo "<script>window.location.href='index.php?dashboard'</script>";
    }else{
        $my_pid = $_GET["pid"];
    }

    include_once "../db.php";

    $get_query_1 = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$my_pid' LIMIT 1");
    $get_details_1 = mysqli_fetch_array($get_query_1);



?>

<?php  echo "<script>window.print();</script>" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perez Frozen Foods</title>
</head>
<body>
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
                                           <td id="product_invoice"><?php  echo $my_pid;  ?></td>
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

                                        $get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$my_pid'");
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
                                           <td class="txt_total_holder"><strong>GH &nbsp;<?php echo $inital_amount; ?></strong></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Discount</strong></td>
                                           <td class="txt_discount_holder"><strong>GH &nbsp;<?php echo $inital_discount;?></strong></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Amount Paid</strong></td>
                                           <td class="txt_amount_paid_holder"><strong>GH &nbsp;<?php echo $inital_amount_payed;?></strong></td>
                                       </tr>
                                       <tr>
                                           <td colspan="5" style="text-align: center;font-weight: bold">Goods Sold Are Not Returnable</td>
                                          
                                       </tr>
                                       <tr>
                                           <td colspan="5" style="text-align: center;font-weight: bold">**** &nbsp; Served By <strong> <?php echo $_COOKIE['n'];  ?>  </strong> &nbsp;   ****</td>
                                          
                                       </tr>
                                   </tfoot>
                               </table>


<script src="../js/lib/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
    
</body>
</html>