<?php

$my_product_table  = $_COOKIE['b']."_stock_product_table";
$my_sales_table = $_COOKIE['b']."_sales_table";


?>

<div class="container-fluid">

                <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Return Goods</div>
                            <div class="panel-body">
                               <form class="form-horizontal form-material" method="post">
                                <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="example-email" class="col-md-12">Enter Receipt ID</label>
                                    <div class="col-md-12">
                                       <input type="text" class="form-control form-control-line" name="txt_receipt_no" id="txt_receipt_no" placeholder="Enter Receipt ID" required="required">
                                        </div>
                                </div>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="btn_submit">Get Receipt List</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php   
                
                if(isset($_POST["btn_submit"])){
                    $get_id = $_POST["txt_receipt_no"];

                    $check_database = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$get_id'");
                    if(mysqli_num_rows($check_database) > 0 ){
                        echo "<script>window.location.href='print_preview.php?pid=$get_id'</script>";
                    }else{
                        echo "<script>alert('Receipt Number Not Found')</script>";
                    }
                
                }
                
                
                
                ?>