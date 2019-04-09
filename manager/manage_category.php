<?php
     
     $corrected_categories = $my_branch."_product_category";

?>

<div id="global">

<div class="container-fluid">
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
                                        <th>Action</th>
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
                                            <td><button class="edit_me btn btn-success btn-md" id="<?php  echo $get_each_category["product_category_id"];?>" >Edit</button><button class="delete_me btn btn-danger btn-md" id="<?php  echo $get_each_category["product_category_id"];    ?>">Delete</button></td>
                                            
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit Category
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_edit_category" method="post">
                                    <input type="hidden" id="hidden_text">
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Category Name" class="form-control" id="txt_category" placeholder="Category Name" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>             
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

            <div id="delete_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Delete Category
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_delete_category" method="post">
                                    <input type="hidden" id="hidden_text_del">
                                    
                                    <div class="form-group">
                                        <h4>Are You Sure You Want To Delete This Category</h4>
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
