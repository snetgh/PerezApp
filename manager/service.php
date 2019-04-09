
<?php
	if(isset($_POST['myData'])){

    $obj = json_decode($_POST['myData'],true);
    $invoice_number = $_POST["get_product_invoice"];

    foreach ($obj as $key => $value) {

    $my_product_id = $value['product_id'];
    $my_product_total_cost = $value['product_total_cost'];
    $my_product_unit_cost = $value['product_unit_cost'];
    $my_product_quantity_buying = $value['product_quantity_buying'];
    $my_product_amount_paying = $value['product_amount_paying'];

    var_dump($my_product_id); 
    var_dump($my_product_discount); 
    var_dump($my_product_total_cost); 
    var_dump($my_product_unit_cost); 
    var_dump($my_product_quantity_buying); 
    var_dump($my_product_amount_paying); 
   
        $run_query_1 = mysqli_query($connection,"SELECT * FROM `stock_product_table` WHERE `stock_product_id` = '$my_product_id' LIMIT 1");
        if($run_query_1){
            $response['query_1'] = "success";
            $get_available_product = mysqli_fetch_array($run_query_1);
            $get_old_value = $get_available_product["stock_product_items_avail"];
            $new_value = $get_old_value - $my_product_quantity_buying;

            $run_query_2 = mysqli_query($connection,"UPDATE `stock_product_table` SET `stock_product_items_avail` = '$new_value' WHERE `stock_product_table`.`stock_product_id` = '$my_product_id'");

            if($run_query_2){
                $response['query_2'] = "success";
                $run_query_3 = myssqli_query($connection,"INSERT INTO `stock_product_transactions` (`stock_transaction_id`, `stock_product_id`, `receipt_invoice_number`, `stock_transaction_discount`, `stock_transaction_unit_cost`, `stock_transaction_product_quantity`, `stock_transaction_total_price`, `stock_transaction_amount_paid`, `stock_transaction_timestamp`) VALUES (NULL, '$my_product_id', '$invoice_number', '0', '$my_product_unit_cost', '$my_product_quantity_buying', '$my_product_total_cost', '$my_product_amount_paying', CURRENT_TIMESTAMP)");

                if($run_query_3){
                    $response['query_3'] = "success";
                     $response['data'] = "success";
                     $response['done'] = true;
                }else{
                   $response['data'] = "false";
                   $response['done'] = false; 
                }
            }
        }

        }
      
    echo json_encode($response);

}

?>