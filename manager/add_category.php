<?php
     
     $corrected_categories = $my_branch."_product_category";

?>

<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add Category </div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_add_category" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Category Name" class="form-control" id="txt_category" placeholder="Category Name" required="required">
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
                            <div class="panel-heading">List Of Categories</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody id="add_category_table">
                  
                                   <?php  

                                    $get_category_query = mysqli_query($connection,"SELECT * FROM $corrected_categories ");
                                    while ($get_each_category = mysqli_fetch_array($get_category_query)) { ?>
                                        
                                        <tr>
                                            
                                            <td><?php echo $get_each_category["product_category_id"]; ?></td>
                                            <td><?php echo $get_each_category["product_category_name"]; ?></td>
                                            <td><?php echo $get_each_category["product_category_timestamp"]; ?></td>
                                            
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


