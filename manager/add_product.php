<?php
     
     $corrected_product_table = $my_branch."_stock_product_table";
     $corrected_category = $my_branch."_product_category";

?>

<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add Product</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_add_product" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Item Name" class="form-control" id="txt_item_name" placeholder="Item Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_item_category">
                                                <?php  $get_category_query = mysqli_query($connection,"SELECT * FROM `$corrected_category`");
                                                    while ($category_items = mysqli_fetch_array($get_category_query)) {  ?>

                                                <option value="<?php  echo $category_items['product_category_id']  ?>"><?php   echo $category_items['product_category_name']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Product Unit Price</label>
                                        <div class="col-sm-9">
                                            <input type="text"  data-error="Enter Unit Price" class="form-control" id="txt_unit_price" placeholder="Unit Price" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Available</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Items Available" class="form-control" id="txt_item_available" placeholder="Qunatity Available" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Expiry Date</label>
                                        <div class="col-sm-9">
                                            <input type="date"  data-error="Choose Product Expiry Date" class="form-control" id="txt_expiry" placeholder="Product Expiry Date" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Add Item</button>
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


