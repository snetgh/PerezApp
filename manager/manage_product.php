
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
                                        <th>Action</th>
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
                                            <td><button class="edit_products btn btn-success btn-md" id="<?php  echo $get_each_product["stock_product_id"];?>" >Edit</button><button class="delete_products btn btn-danger btn-md" id="<?php  echo $get_each_product["stock_product_id"];    ?>">Delete</button></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                  
         


             <div id="edit_product_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit Product
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_edit_product" method="post">
                            <input type="hidden" id="hidden_text">
                                    
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </div>

         <div id="delete_products_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Delete Product
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_delete_product" method="post">
                                    <input type="hidden" id="hidden_text_del">
                                    
                                    <div class="form-group">
                                        <h4>Are You Sure You Want To Delete This Product</h4>
                                    </div>             
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                            <input type="submit" class="btn btn-primary btn-lg" value="Yes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

