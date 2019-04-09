

<div class="container-fluid">

<div class="row cm-fix-height">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">View Sales</div>
            <div class="panel-body">
               <form class="form-horizontal form-material" method="post">
                <div class="row">
                <div class="form-group col-md-12">
                    <label for="example-email" class="col-md-12">Choose Branch</label>
                    <select class="form-control" name="sel_branch" style="width: 100%;height: 50px;background: #3b4148;color: gray;">
                       <?php  
                       $query_1 = mysqli_query($connection,"SELECT * FROM `system_branches`");
                       while ($get_each_branch = mysqli_fetch_array($query_1)) { ?>
                        <option value="<?php   echo $get_each_branch['system_branch_name']; ?>"><?php   echo $get_each_branch['system_branch_name']; ?></option>
                     <?php  }

                       ?>
                   </select>
                </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <div class="col-sm-12">
                        <input class="btn btn-success" type="submit" name="btn_submit" value="Get Sales">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<?php

if(isset($_POST["btn_submit"])){
$get_branch_name = $_POST['sel_branch'];

$my_product_table  = $get_branch_name."_stock_product_table";
$my_sales_table = $get_branch_name."_sales_table";
$my_category = $get_branch_name."_product_category";

?>

 <div class="row cm-fix-height">
                    <div class="col-lg-12  col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Daily Sales - <?php $get_branch_name ?>&nbsp;Branch</div>
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

                                        $current_date = date("Y-m-d");
                                        $run_get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `timestamp` LIKE '%$current_date%'");
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



<?php  }   ?>

