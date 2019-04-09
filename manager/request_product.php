
<?php
     
     $corrected_product_table = $my_branch."_stock_product_table";
     $corrected_category = $my_branch."_product_category";

     $length = 8;
$my_trans_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length)

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
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                         

                <div class="row cm-fix-height">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Request Products</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="record_sales" method="post">
                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Branch</label>
                                        <div class="col-sm-9">
                                        
                                        <select class="form-control" id="select_request_branch">

                                        <option selected disabled='disabled'>Select Branch</option>
                                        
                                        <?php  $get_branch_query = mysqli_query($connection,"SELECT * FROM `system_branches`");
                                                while ($branch_names = mysqli_fetch_array($get_branch_query)) {
                                                    if($branch_names['system_branch_id'] != $_COOKIE['bi']){
                                                    ?>
                                                        <option value="<?php  echo $branch_names['system_branch_id']  ?>"><?php   echo $branch_names['system_branch_name'] ?></option>                                
                                                    <?php   }else{}; } ?>                                           
                                    </select> 
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Product</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_request_product">
                                                <?php  $get_product_query = mysqli_query($connection,"SELECT * FROM $corrected_product_table JOIN $corrected_category ON $corrected_product_table.`stock_product_category` = $corrected_category.`product_category_id`");
                                                    while ($product_names = mysqli_fetch_array($get_product_query)) {  ?>

                                                <option value="<?php  echo $product_names['stock_product_id']  ?>"><?php   echo $product_names['stock_product_name']."&nbsp;-&nbsp;".$product_names["product_category_name"]; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Required</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_request_quantity_required" placeholder="Quantity Required">
                                        </div>
                    
                                    </div>

                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="button" class="btn btn-primary" id="btn_add_request_item" disabled='disabled'>Add To List</button>

                                        </div>
                                    </div>

                                    
                                
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Live Preview</div>
                            <div class="panel-body">
                               <table class="table" cellspacing="2%" id="live_request_table">
                                   <thead>
                                    <tr>
                                    <th colspan="4" style="text-align: center;">Perez Frozen Foods</th>
                                </tr>
                                    <tr> <th colspan="4" style="text-align: center;">Official Request Receipt</th></tr>
                                    <tr> <th colspan="4" style="text-align: center;">Sent From <?php echo $my_branch;  ?> To <span id="send_to_branch"></span></th></tr>
                                   </thead>
                                   <tbody id="live_request_table_body">
                                       <tr>
                                           <td>Date</td>
                                           <td>Request No.</td>
                                           <td>Time:</td>
                                       </tr>
                                       <tr>
                                           <td><?php echo (date("Y-M-d"));  ?></td>
                                           <td id="request_invoice"><?php  echo $my_trans_id;  ?></td>
                                           <td><?php echo date("h:m");  ?></td>
                                       </tr>
                                       <tr>
                                           <td>Desciption</td>
                                           <td>Quantity</td>
                                       </tr>
                                   </tbody>
                                   <tfoot>
                                      
                                       <tr>
                                           <td colspan="4" style="text-align: center;font-weight: bold">**** &nbsp; Sent By <strong> <?php echo $_COOKIE['u'];  ?>  </strong> &nbsp;   ****</td>
                                          
                                       </tr>
                                   </tfoot>
                               </table>
                            </div>
                        </div>
                    </div>
                    
                    <div style="text-align:center">
                    <button class="btn btn-success btn-lg" id="btn_send_request">Send Request</button>&nbsp;&nbsp;<button class="btn btn-danger btn-lg" id="btn_cancel_request">Cancel Request</button>
                    </div>

                    </form>
              