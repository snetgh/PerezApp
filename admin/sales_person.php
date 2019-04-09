<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Make Sale</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="record_sales" method="post">
                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Customer Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_customer_name" placeholder="Customers Name" required="required">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Product</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_product">
                                                <?php  $get_product_query = mysqli_query($connection,"SELECT * FROM stock_product_table JOIN product_category ON `stock_product_table`.`stock_product_category` = `product_category`.`product_category_id`");
                                                    while ($product_names = mysqli_fetch_array($get_product_query)) {  ?>

                                                <option value="<?php  echo $product_names['stock_product_id']  ?>"><?php   echo $product_names['stock_product_name']."&nbsp;-&nbsp;".$product_names["product_category_name"]; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Unit Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_unit_price" placeholder="Unit Price" disabled="disabled">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Available</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_quantity_avail" placeholder="Unit Price" disabled="disabled">
                                            <input type="hidden" id="valid_id">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Purchase</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="txt_quantity" placeholder="Quantity Purchase" required="required">
                                        </div>
                                     
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="txt_discount" placeholder="Discount">
                                        </div>
                                      
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Total Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_total" placeholder="Total Price" required="required" disabled="disabled">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Amount Paid</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_amount_paid" placeholder="Amount Paid" required="required">
                                        </div>
                    
                                    </div>

                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="button" class="btn btn-primary" id="btn_add_item">Add To List</button>

                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Live Preview</div>
                            <div class="panel-body">
                               <table class="table" cellspacing="2%">
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
                                           <td><?php echo (date("Y-M-d"));  ?></td>
                                           <td id="product_invoice"><?php  echo rand(0,1000)  ?></td>
                                           <td><?php echo date("h:m");  ?></td>
                                           <td id="customer_name"></td>
                                       </tr>
                                       <tr>
                                           <td>Desciption</td>
                                           <td>Quantity</td>
                                           <td>U. Price</td>
                                           <td>Amount</td>
                                       </tr>
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Total</strong></td>
                                           <td class="txt_total_holder"></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Discount</strong></td>
                                           <td class="txt_discount_holder"></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Amount Paid</strong></td>
                                           <td class="txt_amount_paid_holder"></td>
                                       </tr>
                                       <tr>
                                           <td colspan="4" style="text-align: center;font-weight: bold">Goods Sold Are Not Returnable</td>
                                          
                                       </tr>
                                   </tfoot>
                               </table>
                            </div>
                        </div>
                    </div>




                </div>

                <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Items</div>
                            <div class="panel-body">
                               <table class="table table-hover" id="make_sales_table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="down_table_body">
                                   
                                   
                                   
                                </tbody>
                                <tfoot>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Total</strong></td>
                                           <td class="txt_total_holder"></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Discount</strong></td>
                                           <td class="txt_discount_holder"></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Amount Paid</strong></td>
                                           <td class="txt_amount_paid_holder"></td>
                                       </tr>
                                       <tr>
                                           <td colspan="4" style="text-align: center;font-weight: bold">Goods Sold Are Not Returnable</td>
                                          
                                       </tr>
                                   </tfoot>
                            </table>
                            </div>

                        </div>
                        <div style="margin: 20px;text-align: center;">
                        <input type="submit" class="btn btn-primary btn-lg" value="Process Items">
                    </div>
                </form>
                    </div>
                </div>
            </div>











                   
           