

<div class="container-fluid">

<div class="row cm-fix-height">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">View Inventory</div>
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
                        <input class="btn btn-success" type="submit" name="btn_submit" value="Get Items">
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
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Products In Stock -  <?php $get_branch_name ?>&nbsp;Branch</div>
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

                                    $get_product_query = mysqli_query($connection,"SELECT * FROM $my_product_table JOIN $my_category ON $my_product_table.`stock_product_category` = $my_category.`product_category_id`");
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



<?php  }   ?>

