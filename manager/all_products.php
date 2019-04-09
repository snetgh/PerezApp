



<?php
     
     $corrected_product_table = $my_branch."_stock_product_table";
     $corrected_category = $my_branch."_product_category";

?>

<div id="global">
            
<div class="container-fluid">

 <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Products</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Category</th>
                                        <th>Unit Price</th>
                                        <th>Items Available</th>
                                        <th>Expiry Date</th>
                                        <th>Created On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                                    $get_product_query = mysqli_query($connection,"SELECT * FROM $corrected_product_table JOIN $corrected_category ON $corrected_product_table.`stock_product_category` = $corrected_category.`product_category_id`");
                                    while ($get_each_product = mysqli_fetch_array($get_product_query)) { ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_product["stock_product_id"]; ?></th>
                                            <td><?php echo $get_each_product["stock_product_name"]; ?></td>
                                            <td><?php echo $get_each_product["product_category_name"]; ?></td>
                                            <td><?php echo $get_each_product["stock_product_unit_price"]; ?></td>
                                            <td><?php echo $get_each_product["stock_product_items_avail"]; ?></td>
                                            <td><?php echo $get_each_product["stock_product_expiry_date"]; ?></td>
                                            <td><?php echo $get_each_product["stock_product_timestamp"]; ?></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>