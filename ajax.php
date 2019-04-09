<?php
include_once 'db.php';
session_start();

/*    Start Of Code      */

if(isset($_POST['update_main_user'])){
    
    $user_id = $_POST["user_id"];

    $get_user_full_name = $_POST["user_full_name"];
    $get_user_username = $_POST["user_username"];
    $get_user_email = $_POST["user_email"];
    $get_user_contact = $_POST["user_contact"];
    $get_user_work_type = $_POST["user_work_type"];
    $get_user_work_type_id = $_POST["user_work_type_id"];
    $get_user_branch = $_POST["user_branch"];
    $get_user_branch_id = $_POST["user_branch_id"];
    $get_user_new_password = $_POST["user_password"];

    $get_my_branch_id = $_POST["my_branch_id"];

    if($get_user_work_type_id == '5' || $get_user_work_type_id == '6' || $get_user_work_type_id == '7'){

        if($get_user_new_password == ""){
            $run_query = mysqli_query($connection,"UPDATE `users_table` SET 
            `user_username` = '$get_user_username', 
            `user_name` = '$get_user_full_name', 
            `user_email` = '$get_user_email', 
            `user_contact` = '$get_user_contact' WHERE `users_table`.`users_table_id`= '$user_id'");

                    if($run_query){
                        $response['run_query_ssw_users_table'] = "success";

                        $run_query_2 =  mysqli_query($connection,"UPDATE `main_users_table` SET 
                        `user_username` = '$get_user_username', 
                        `user_name` = '$get_user_full_name', 
                        `user_email` = '$get_user_email', 
                        `user_contact` = '$get_user_contact' WHERE `main_users_table`.`users_table_id` = '$get_my_branch_id'");

                        $response['data'] = "success";
                        $response['done'] = true;
                    }else{
                        $response['data'] = "false";
                        $response['done'] = false;
                    }
        }else{

            $secured_password = password_hash($get_user_new_password,PASSWORD_DEFAULT);

            $run_query = mysqli_query($connection,"UPDATE `users_table` 
            SET `user_username` = '$get_user_username', 
            `user_pass` = '$secured_password', 
            `user_name` = '$get_user_full_name', 
            `user_email` = '$get_user_email', 
            `user_contact` = '$get_user_contact' WHERE `users_table`.`users_table_id` = '$user_id'");

                    if($run_query){

                        $run_query_2 =  mysqli_query($connection,"UPDATE `main_users_table` SET 
                        `user_username` = '$get_user_username', 
                        `user_pass` = '$secured_password', 
                        `user_name` = '$get_user_full_name', 
                        `user_email` = '$get_user_email', 
                        `user_contact` = '$get_user_contact' WHERE `main_users_table`.`users_table_id` = '$get_my_branch_id'");

                       $response['data'] = "success";
                        $response['done'] = true;
                    }else{
                        $response['data'] = "false";
                        $response['done'] = false;
                    }

        }


    }else{

        $my_branch_name = $get_user_branch."_users_table";

        if($get_user_new_password == ""){
            $run_query = mysqli_query($connection,"UPDATE `users_table` SET 
            `user_username` = '$get_user_username', 
            `user_name` = '$get_user_full_name', 
            `user_email` = '$get_user_email', 
            `user_contact` = '$get_user_contact' WHERE `users_table`.`users_table_id`= '$user_id'");

            

                    if($run_query){

                        $run_query_2 =  mysqli_query($connection,"UPDATE $my_branch_name SET 
                        `user_username` = '$get_user_username', 
                        `user_name` = '$get_user_full_name', 
                        `user_email` = '$get_user_email', 
                        `user_contact` = '$get_user_contact' WHERE $my_branch_name.`users_table_id` = '$get_my_branch_id'");
                    
                        $response['data'] = "success";
                        $response['done'] = true;
                    }else{
                        $response['data'] = "false";
                        $response['done'] = false;
                    }
        }else{

            $secured_password = password_hash($get_user_new_password,PASSWORD_DEFAULT);

            $run_query = mysqli_query($connection,"UPDATE `users_table` 
            SET `user_username` = '$get_user_username', 
            `user_pass` = '$secured_password', 
            `user_name` = '$get_user_full_name', 
            `user_email` = '$get_user_email', 
            `user_contact` = '$get_user_contact' WHERE `users_table`.`users_table_id` = '$user_id'");

                    if($run_query){

                        $run_query_2 =  mysqli_query($connection,"UPDATE $my_branch_name SET 
                        `user_username` = '$get_user_username', 
                        `user_pass` = '$secured_password', 
                        `user_name` = '$get_user_full_name', 
                        `user_email` = '$get_user_email', 
                        `user_contact` = '$get_user_contact' WHERE $my_branch_name.`users_table_id` = '$get_my_branch_id'");

                        $response['data'] = "success";
                        $response['done'] = true;
                    }else{
                        $response['data'] = "false";
                        $response['done'] = false;
                    }

        }

        


    }


      
    echo json_encode($response);
}



if(isset($_POST['get_pending_request_details'])){
    
    $my_branch_id = $_COOKIE['bi'];
    $request_id = $_POST["getting_request_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM pending_branch_request_table JOIN system_branches ON pending_branch_request_table.receiving_branch = system_branches.system_branch_id WHERE `receiving_branch`= '$my_branch_id'");
    $get_request_detail = mysqli_fetch_array($run_query);

    $response['item_id'] = $get_request_detail['item_id'];
    $response['item_description'] = $get_request_detail['item_description'];
    $response['item_sent'] = $get_request_detail['item_sent'];
    $response['quantity_required'] = $get_request_detail['quantity_required'];
    $response['quantity_given'] = $get_request_detail['quantity_given'];
    $response['sending_branch'] = $get_request_detail['system_branch_name'];

    $response['hidden_id'] = $get_request_detail['request_table_id'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['approve_products'])){
    
    $my_product_table = $_COOKIE["b"]."_stock_product_table";
    $my_branch_id = $_COOKIE['bi'];

    $item_id = $_POST["item_id"];
    $quantity_given = $_POST["quantity_given"];
    $request_id = $_POST["request_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM $my_product_table WHERE `stock_product_id` = '$item_id' LIMIT 1");
    $get_request_detail = mysqli_fetch_array($run_query);

    if($run_query){
    $response['select_query'] = true;
    }else{
    $response['select_query'] = false;   
    }

    $get_products_available = $get_request_detail['stock_product_items_avail'];

    $new_available = $get_products_available + $quantity_given;

    $run_update_query = mysqli_query($connection,"UPDATE $my_product_table SET 
    `stock_product_items_avail` = '$new_available' WHERE $my_product_table.`stock_product_id` = '$item_id'");
    
    if($run_update_query){

        $response['update_query'] = true;

        $delete_query = mysqli_query($connection,"DELETE FROM `pending_branch_request_table` WHERE `request_table_id` = '$request_id'");

        if($delete_query){
            $response['data'] = "success";
            $response['done'] = true;
        }else{
            $response['data'] = "error";
            $response['done'] = false;
        }
       
    }else{
        $response['data'] = "false";
        $response['done'] = false;
        $response['update_query'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['get_request_details'])){
    
    $request_id = $_POST["getting_request_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM branch_request_table JOIN system_branches ON branch_request_table.sending_branch = system_branches.system_branch_id WHERE `request_table_id`= '$request_id'");
    $get_request_detail = mysqli_fetch_array($run_query);

    $response['item_id'] = $get_request_detail['item_id'];
    $response['item_description'] = $get_request_detail['item_description'];
    $response['quantity_required'] = $get_request_detail['quantity_required'];
    $response['sending_branch'] = $get_request_detail['system_branch_name'];
    $response['request_id'] = $get_request_detail['request_id'];
    $response['sending_branch_id'] = $get_request_detail['sending_branch'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['get_my_product_details'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_products_table = $get_user_branch."_stock_product_table";
    
    $product_id = $_POST["get_item_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM $corrected_products_table  WHERE stock_product_id = $product_id ");
    $get_product_detail = mysqli_fetch_array($run_query);

    $response['product_item_avail'] = $get_product_detail['stock_product_items_avail'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['transfer_products'])){

    $get_current_branch_id = $_COOKIE['bi'];
    $my_current_branch = $_COOKIE['b'];
    $get_stock_product = $_COOKIE['b']."_stock_product_table";

    $get_receiving_branch = $_POST["receiving_branch"];
    $get_item_description = $_POST["item_description"];
    $get_item_id = $_POST["item_id"];
    $get_quantity_required = $_POST["item_quantity_required"];
    $get_request_id = $_POST["request_id"];
    $get_sending_text = $_POST["item_sending_text"];
    $get_item_sending_id = $_POST["item_sending"];
    $get_quantity_sending = $_POST["quantity_sending"];

    $run_query = mysqli_query($connection,"INSERT INTO `pending_branch_request_table` 
    (`request_table_id`, `request_id`, `item_id`, `sending_branch`,
     `item_description`, `item_sent`, `quantity_required`,
      `quantity_given`, `receiving_branch`, `request_timestamp`) VALUES (NULL, '$get_request_id', 
      '$get_item_id', '$get_current_branch_id', '$get_item_description', '$get_sending_text', 
      '$get_quantity_required', '$get_quantity_sending', '$get_receiving_branch', CURRENT_TIMESTAMP)");

$run_query_c = mysqli_query($connection,"INSERT INTO `checked_pending_branch_request_table` 
(`request_table_id`, `request_id`, `item_id`, `sending_branch`,
 `item_description`, `item_sent`, `quantity_required`,
  `quantity_given`, `receiving_branch`, `request_timestamp`) VALUES (NULL, '$get_request_id', 
  '$get_item_id', '$my_current_branch', '$get_item_description', '$get_sending_text', 
  '$get_quantity_required', '$get_quantity_sending', '$get_receiving_branch', CURRENT_TIMESTAMP)");
 
    if($run_query){
       $run_query_2 = mysqli_query($connection,"DELETE FROM `branch_request_table` WHERE `request_id` = '$get_request_id' AND `item_id`= '$get_item_id' ");

    if($run_query_2){

        if($run_query_2){
            $get_item_remain = mysqli_query($connection,"SELECT * FROM $get_stock_product WHERE `stock_product_id` = '$get_item_sending_id' LIMIT 1 ");
            $get_product_details = mysqli_fetch_array($get_item_remain);
            $get_remaining_item = $get_product_details['stock_product_items_avail'];

            $balance = $get_remaining_item - $get_quantity_sending;


            $run_update_query = mysqli_query($connection,"UPDATE $get_stock_product SET 
            `stock_product_items_avail` = '$balance' WHERE $get_stock_product.`stock_product_id` = '$get_item_sending_id'");

            if($run_update_query){
                $response['data'] = "true";
                $response['done'] = true;

            }
        }
        $response['data'] = "true";
        $response['done'] = true;
    }else{
        $response['data'] = "error";
        $response['done'] = false;
    }

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['request_products'])){

    $get_current_branch_id = $_COOKIE['bi'];
    $my_current_branch = $_COOKIE['b'];

    $get_receiver = $_POST["get_sending_to_branch"];
    $get_item_description = $_POST["item_description"];
    $get_item_quantity = $_POST["item_quantity"];
    $get_button_id = $_POST["button_id"];

    $get_item_branch_id = $_POST["item_branch_id"];

    $get_request_id = $_POST['request_id'];

    $run_query = mysqli_query($connection,"INSERT INTO `branch_request_table` 
    (`request_table_id`, `request_id`,`button_id`,`item_id`, `sending_branch`, 
    `item_description`, `quantity_required`, `receiving_branch`,
     `request_timestamp`) VALUES (NULL, '$get_request_id','$get_button_id','$get_item_branch_id', '$get_current_branch_id', '$get_item_description', '$get_item_quantity', '$get_receiver', CURRENT_TIMESTAMP)");


$run_query_1 = mysqli_query($connection,"INSERT INTO `checked_branch_request_table` 
(`request_table_id`, `request_id`,`button_id`,`item_id`, `sending_branch`, 
`item_description`, `quantity_required`, `receiving_branch`,
 `request_timestamp`) VALUES (NULL, '$get_request_id','$get_button_id','$get_item_branch_id', '$my_current_branch', '$get_item_description', '$get_item_quantity', '$get_receiver', CURRENT_TIMESTAMP)");
 
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}

if(isset($_POST['del_request_item'])){

    $request_id = $_POST["request_id"];
    $request_button_id = $_POST["item_id"];
 
    $run_query = mysqli_query($connection,"DELETE FROM `branch_request_table` WHERE `request_id` = '$request_id' AND `button_id`= '$request_button_id' ");

     if($run_query){
         $response['data'] = "success";
         $response['done'] = true;
     }else{
         $response['data'] = "failure";
         $response['done'] = false; 
     }
 
     echo json_encode($response);
 
 }


 if(isset($_POST['delete_request_products'])){

    $request_id = $_POST["request_item_id"];
 
    $run_query = mysqli_query($connection,"DELETE FROM `branch_request_table` WHERE `request_table_id` = '$request_id' ");

     if($run_query){
         $response['data'] = "success";
         $response['done'] = true;
     }else{
         $response['data'] = "failure";
         $response['done'] = false; 
     }
 
     echo json_encode($response);
 
 }




 if(isset($_POST['cancel_request_products'])){

    $request_id = $_POST["request_id"];
 
    $run_query = mysqli_query($connection,"DELETE FROM `branch_request_table` WHERE `request_id` = '$request_id' ");

     if($run_query){
         $response['data'] = "success";
         $response['done'] = true;
     }else{
         $response['data'] = "failure";
         $response['done'] = false; 
     }
 
     echo json_encode($response);
 
 }



if(isset($_POST['edit_users'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_users_table = $get_user_branch."_users_table";
    
    $user_id = $_POST["user_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM $corrected_users_table JOIN user_work_types on $corrected_users_table.`user_type` = `user_work_types`.`work_type_id` JOIN `user_status` on $corrected_users_table.`user_status` = `user_status`.`user_status_id` WHERE `users_table_id` = '$user_id' ");
    $get_product_detail = mysqli_fetch_array($run_query);

    $response['user_name'] = $get_product_detail['user_name'];
    $response['user_email'] = $get_product_detail['user_email'];
    $response['user_contact'] = $get_product_detail['user_contact'];
    $response['user_type'] = $get_product_detail['work_type'];
    $response['user_username'] = $get_product_detail['user_username'];
    $response['user_status'] = $get_product_detail['status_name'];

    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['edit_main_users'])){
    
    $user_id = $_POST["user_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM users_table JOIN system_branches on users_table.user_branch = system_branches.system_branch_id JOIN user_work_types on users_table.`user_type` = `user_work_types`.`work_type_id` JOIN `user_status` on users_table.`user_status` = `user_status`.`user_status_id` WHERE `users_table_id` = '$user_id' ");
    $get_product_detail = mysqli_fetch_array($run_query);

    $get_user_name = $get_product_detail['user_name'];
    $get_user_email = $get_product_detail['user_email'];
    $get_user_contact = $get_product_detail['user_contact'];
    $get_user_username = $get_product_detail['user_username'];
    $get_user_work_type = $get_product_detail['work_type_id'];
    $get_user_branch = $get_product_detail['system_branch_id'];

    $response['user_name'] = $get_user_name;
    $response['user_email'] = $get_user_email;
    $response['user_contact'] = $get_user_contact;
    $response['user_username'] = $get_user_username ;
    $response['user_status'] = $get_product_detail['status_name'];
    $response['user_position_id'] = $get_user_work_type;
    $response['user_position'] = $get_product_detail['work_type'];
    $response['user_branch_id'] = $get_user_branch;
    $response['user_branch'] = $get_product_detail['system_branch_name'];

    $my_corrected_branch = $get_product_detail['system_branch_name']."_users_table";

    $run_query_2 = mysqli_query($connection,"SELECT * FROM $my_corrected_branch WHERE `user_name` = '$get_user_name' AND 
    `user_email` = '$get_user_email' AND `user_contact` = '$get_user_contact' AND `user_username` = '$get_user_username'
    AND `user_type` = '$get_user_work_type' LIMIT 1");

    if($run_query_2){

        $get_user_id = mysqli_fetch_array($run_query_2);
        $response['my_branch_users_id'] = $get_user_id['users_table_id'];
    }

    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['update_user'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_users_table = $get_user_branch."_users_table";
    
    $user_id = $_POST["user_id"];

    $get_user_full_name = $_POST["user_full_name"];
    $get_user_username = $_POST["user_username"];
    $get_user_email = $_POST["user_email"];
    $get_user_contact = $_POST["user_contact"];
    $get_user_work_type = $_POST["user_work_type"];


    $run_query = mysqli_query($connection,"UPDATE $corrected_users_table SET 
    `user_username` = '$get_user_username', `user_name` = '$get_user_full_name', 
    `user_type` = '$get_user_work_type', `user_email` = '$get_user_email', 
    `user_contact` = '$get_user_contact' WHERE $corrected_users_table.`users_table_id` = '$user_id'");
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['delete_user'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_users_table = $get_user_branch."_users_table";
    
    $user_id = $_POST["user_id"];

    $run_query = mysqli_query($connection,"DELETE FROM $corrected_users_table WHERE $corrected_users_table.`users_table_id` = '$user_id' ");
   
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['lock_user'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_users_table = $get_user_branch."_users_table";
    
    $user_id = $_POST["user_id"];
    $user_status = $_POST['current_status'];

    $run_query = mysqli_query($connection,"UPDATE $corrected_users_table SET `user_status` = '$user_status' WHERE $corrected_users_table.`users_table_id` = '$user_id' ");
   
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}





if(isset($_POST['edit_product'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_products_table = $get_user_branch."_stock_product_table";
    $corrected_category = $get_user_branch."_product_category";
    
    $product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM $corrected_products_table JOIN $corrected_category ON $corrected_products_table.`stock_product_category` = $corrected_category.`product_category_id` WHERE stock_product_id = $product_id ");
    $get_product_detail = mysqli_fetch_array($run_query);

    $response['product_name'] = $get_product_detail['stock_product_name'];
    $response['product_category'] = $get_product_detail['product_category_name'];
    $response['product_unit_price'] = $get_product_detail['stock_product_unit_price'];
    $response['product_item_avail'] = $get_product_detail['stock_product_items_avail'];
    $response['product_expiry'] = $get_product_detail['stock_product_expiry_date'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['update_product'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_product_table_name = $get_user_branch."_stock_product_table";

    $get_item_name = $_POST["item_name"];
    $get_item_category = $_POST["item_category"];
    $get_item_unit_price = $_POST["item_unit_price"];
    $get_item_quantity = $_POST["item_quantity_avail"];
    $get_item_expiry = $_POST["item_expiry"];

    $get_product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"UPDATE $corrected_product_table_name SET 
    `stock_product_name` = '$get_item_name', 
    `stock_product_category` = '$get_item_category', 
    `stock_product_unit_price` = '$get_item_unit_price', 
    `stock_product_items_avail` = '$get_item_quantity', 
    `stock_product_expiry_date` = '$get_item_expiry' WHERE 
    $corrected_product_table_name.`stock_product_id` = $get_product_id");

    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['delete_product'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_product_table_name = $get_user_branch."_stock_product_table";
    
    $product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"DELETE FROM $corrected_product_table_name WHERE $corrected_product_table_name.`stock_product_id` = '$product_id' ");
   
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}






if(isset($_POST['edit_category_name'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_category_name = $get_user_branch."_product_category";

    $category_id = $_POST['category_id'];

    $run_query = mysqli_query($connection,"SELECT * FROM $corrected_category_name WHERE `product_category_id` = '$category_id' LIMIT 1 ");
    $get_category_detail = mysqli_fetch_array($run_query);
    $response['category_name'] = $get_category_detail['product_category_name'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['delete_category'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_category_name = $get_user_branch."_product_category";
    
    $category_id = $_POST["category_id"];

    $response['id_sent'] = $category_id;

    $run_query = mysqli_query($connection,"DELETE FROM $corrected_category_name WHERE $corrected_category_name.`product_category_id` = '$category_id' ");
   
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['update_category'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_category_name = $get_user_branch."_product_category";

    $get_category_name= $_POST["category_name"];
    $get_category_id = $_POST["category_id"];

    $run_query = mysqli_query($connection,"UPDATE $corrected_category_name SET `product_category_name` = '$get_category_name' WHERE $corrected_category_name.`product_category_id` = '$get_category_id'");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['add_new_category'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_category_name = $get_user_branch."_product_category";

    $get_category_name= $_POST["category_name"];

    $run_query = mysqli_query($connection,"INSERT INTO `$corrected_category_name` (`product_category_id`, `product_category_name`, `product_category_timestamp`) VALUES (NULL, '$get_category_name', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['add_new_product'])){

    $get_user_branch = $_COOKIE['b'];
    $corrected_product_table_name = $get_user_branch."_stock_product_table";

    $get_item_name = $_POST["item_name"];
    $get_item_category = $_POST["item_category"];
    $get_item_unit_price = $_POST["item_unit_price"];
    $get_item_quantity = $_POST["item_quantity_avail"];
    $get_item_expiry = $_POST["item_expiry"];

    $run_query = mysqli_query($connection,"INSERT INTO $corrected_product_table_name (`stock_product_id`, 
    `stock_product_name`, `stock_product_category`,
     `stock_product_unit_price`, `stock_product_items_avail`, 
     `stock_product_expiry_date`, `stock_product_timestamp`) 
     VALUES (NULL, '$get_item_name', '$get_item_category', '$get_item_unit_price', '$get_item_quantity', '$get_item_expiry', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['add_transaction'])){

    $my_product_table  = $_COOKIE['b']."_stock_product_table";
    $my_sales_table = $_COOKIE['b']."_sales_table";
    $user_name = $_COOKIE['u'];

    $item_desc = $_POST["item_description"];
    $button_id = $_POST["button_id"];
    $item_quantity = $_POST["item_quantity"];
    $item_price = $_POST["item_price"];
    $total_amount = $_POST["total_amount"];
    $selected_id = $_POST["selected_id"];
    $discount_given = $_POST["discount_given"];
    $amount_paid    = $_POST["amount_paid"];
    $inv_id = $_POST["inv_id"];
    $custo_name = $_POST["custo_name"];

    $get_items_query = mysqli_query($connection,"SELECT * FROM $my_product_table WHERE `stock_product_id` = '$selected_id' LIMIT 1");
    $get_number = mysqli_fetch_array($get_items_query);
    if($get_number['stock_product_items_avail'] < $item_quantity){

        $response['data'] = "Item Less Than Specified Amount";
        $response['done'] = false;

    }else{

        $new_total =  $get_number['stock_product_items_avail']-$item_quantity;
        $update_query = mysqli_query($connection,"UPDATE $my_product_table SET `stock_product_items_avail` = '$new_total' WHERE $my_product_table.`stock_product_id` = '$selected_id'");
    
        if($discount_given == ""){
            $discount_given = "NULL";
        }
    
        $run_query = mysqli_query($connection,"INSERT INTO $my_sales_table 
        (`sales_id`,`button_id`, `invoice_id`, `customer_name`, `item_description`,
         `item_quantity`, `item_price`, `total_amount`, `item_id`, 
         `discount_given`, `amount_payed`,`sales_person`, `timestamp`) 
         VALUES (NULL,'$button_id','$inv_id', '$custo_name', '$item_desc', 
        '$item_quantity', '$item_price', '$total_amount', '$selected_id', $discount_given, '$amount_paid','$user_name', CURRENT_TIMESTAMP)");
    
        if($run_query){
            $response['data'] = "success";
            $response['done'] = true;
        }else{
            $response['data'] = "failure";
            $response['done'] = false; 
        }

    }
   

    echo json_encode($response);

}

if(isset($_POST['del_transaction'])){

    $my_product_table  = $_COOKIE['b']."_stock_product_table";
    $my_sales_table = $_COOKIE['b']."_sales_table";

   $trans_id = $_POST["transaction_id"];

    $get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$trans_id'");
    while($get_details = mysqli_fetch_array($get_query)){
        
        $get_item_id = $get_details['item_id'];
        $get_item_quantity = $get_details['item_quantity'];
        $get_sales_id = $get_details['sales_id'];

        $get_query_2 = mysqli_query($connection,"SELECT * FROM $my_product_table WHERE `stock_product_id` = '$get_item_id' LIMIT 1");
        $get_number = mysqli_fetch_array($get_query_2);
        $new_total =  $get_item_quantity+ $get_number['stock_product_items_avail'];
        $update_query = mysqli_query($connection,"UPDATE $my_product_table SET `stock_product_items_avail` = '$new_total' WHERE $my_product_table.`stock_product_id` = '$get_item_id'");
          
        $run_query = mysqli_query($connection,"DELETE FROM $my_sales_table WHERE $my_sales_table.`invoice_id` = '$trans_id' ");
    
    }


    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "failure";
        $response['done'] = false; 
    }

    echo json_encode($response);

}

if(isset($_POST['del_transaction_item'])){

    $my_product_table  = $_COOKIE['b']."_stock_product_table";
    $my_sales_table = $_COOKIE['b']."_sales_table";

    $trans_id = $_POST["transaction_id"];
    $item_id_button = $_POST["item_id"];
 
    $get_query = mysqli_query($connection,"SELECT * FROM $my_sales_table WHERE `invoice_id` = '$trans_id' AND `button_id`= '$item_id_button' ");
     $get_details = mysqli_fetch_array($get_query);
        
        $get_item_id = $get_details['item_id'];
        $get_item_quantity = $get_details['item_quantity'];
        $get_sales_id = $get_details['sales_id'];

        $get_query_2 = mysqli_query($connection,"SELECT * FROM $my_product_table WHERE `stock_product_id` = '$get_item_id' LIMIT 1");
        $get_number = mysqli_fetch_array($get_query_2);
        $new_total =  $get_item_quantity+ $get_number['stock_product_items_avail'];
        $update_query = mysqli_query($connection,"UPDATE $my_product_table SET `stock_product_items_avail` = '$new_total' WHERE $my_product_table.`stock_product_id` = '$get_item_id'");

    $run_query = mysqli_query($connection,"DELETE FROM $my_sales_table WHERE $my_sales_table.`invoice_id` = '$trans_id' AND `button_id`= '$item_id_button' ");



     if($run_query){
         $response['data'] = "success";
         $response['done'] = true;
     }else{
         $response['data'] = "failure";
         $response['done'] = false; 
     }
 
     echo json_encode($response);
 
 }


if(isset($_POST['add_new_user'])){

    $get_user_full_name = $_POST["user_full_name"];
    $get_user_username = $_POST["user_username"];
    $get_user_password = $_POST["user_password"];
    $get_user_email = $_POST["user_email"];
    $get_user_contact = $_POST["user_contact"];
    $get_user_work_type = $_POST["user_work_type"];
    $get_user_branch    = $_POST["user_branch"];
    $get_branch_name = $_POST["user_branch_name"];

    $my_branch_name = $get_branch_name."_users_table";
    $corrected_branch_name = strtolower($my_branch_name);
 
    $secured_password = password_hash($get_user_password,PASSWORD_DEFAULT);

    if($get_user_work_type == '5' || $get_user_work_type == '6' || $get_user_work_type == '7'){
        $run_query_2 = mysqli_query($connection,"INSERT INTO `users_table` (`users_table_id`, `user_username`, `user_pass`, `user_name`, `user_status`, `user_type`, `user_branch`, `user_email`, `user_contact`, `timestamp`) VALUES (NULL, '$get_user_username', '$secured_password', '$get_user_full_name', '1', '$get_user_work_type', '$get_user_branch', '$get_user_email', '$get_user_contact', CURRENT_TIMESTAMP)");
    if($run_query_2){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
      }
    
    }
  
    $run_query = mysqli_query($connection,"INSERT INTO $corrected_branch_name (`users_table_id`, `user_username`, `user_pass`, `user_name`, `user_status`, `user_type`, `user_branch`,`user_email`,`user_contact`, `timestamp`) VALUES (NULL, '$get_user_username', '$secured_password', '$get_user_full_name', '1', '$get_user_work_type', '$get_user_branch','$get_user_email','$get_user_contact', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }

    echo json_encode($response);

}

if(isset($_POST['add_new_customer'])){

    $get_customer_full_name = $_POST["customer_name"];
    $get_customer_email = $_POST["customer_email"];
    $get_customer_contact = $_POST["customer_contact"];
    $get_customer_branch = $_POST["customer_branch"];
    $get_customer_address = $_POST["customer_address"];
    $get_customer_type = $_POST["customer_type"];                      
  if($get_customer_type == 'ca'){
    $run_query = mysqli_query($connection,"INSERT INTO `customers_table` (`customers_id`, `customer_name`, `customer_branch`, `customer_email`, `customer_address`, `customer_contact`, `items_credited_quantity`, `items_credited_cost`, `items_credited_balance`, `customer_type`, `customer_timestamp`) VALUES (NULL, '$get_customer_full_name', '$get_customer_branch', '$get_customer_email', '$get_customer_address', '$get_customer_branch', '0', '0', '0', '0', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }

  }else{

    $run_query = mysqli_query($connection,"INSERT INTO `customers_table` (`customers_id`, `customer_name`, `customer_branch`, `customer_email`, `customer_address`, `customer_contact`, `items_credited_quantity`, `items_credited_cost`, `items_credited_balance`, `customer_type`, `customer_timestamp`) VALUES (NULL, '$get_customer_full_name', '$get_customer_branch', '$get_customer_email', '$get_customer_address', '$get_customer_branch', '0', '0', '0', '1', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
  }
    echo json_encode($response);
}


if(isset($_POST['stock_officer_record'])){

    $get_container_number = $_POST["so_container_number"];
    $get_product_name = $_POST["so_product_name"];
    $get_product_category = $_POST["so_product_category"];
    $get_expected_quantity = $_POST["so_expected_quantity"];
    $get_supplier = $_POST["so_supplier"];
    $get_shortages = $_POST["so_shortages"];
    $get_date = $_POST["so_date"];
    $get_driver_name = $_POST["so_driver_name"];
    $get_car_number = $_POST["so_car_number"];

    $run_query = mysqli_query($connection,"INSERT INTO `stock_oficer` (`stock_officer_record_id`, `stock_product_name`, `stock_product_category`, `stock_container_number`, `stock_expected_quantity`, `stock_shortages`, `stock_supplier`, `stock_date`, `stock_car_number`, `stock_driver`, `record_status`, `stock_timestamp`) VALUES (NULL, '$get_product_name', '$get_product_category', '$get_container_number', '$get_expected_quantity', '$get_shortages', '$get_supplier', '$get_date', '$get_car_number', '$get_driver_name', '0', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['product_details'])){

    $my_product_table = $_COOKIE['b']."_stock_product_table";
    $my_category = $_COOKIE['b']."_product_category";

    $get_product_value = $_POST["product_value"];

    $run_query = mysqli_query($connection,"SELECT * FROM stock_oficer JOIN $my_product_table ON `stock_oficer`.`stock_product_name` = $my_product_table.`stock_product_id` JOIN $my_category ON `stock_oficer`.`stock_product_category` = $my_category.`product_category_id` WHERE stock_officer_record_id = '$get_product_value' LIMIT 1");
    if($run_query){
        $get_query_details = mysqli_fetch_array($run_query);
        $response["product_name"] = $get_query_details["stock_product_name"];
        $response["product_category"] = $get_query_details["product_category_name"];
        $response["container_number"] = $get_query_details["stock_container_number"];
        $response["expected_quantity"] = $get_query_details["stock_expected_quantity"];
        $response["shortages"] = $get_query_details["stock_shortages"];
        $response["supplier"] = $get_query_details["stock_supplier"];
        $response["date"] = $get_query_details["stock_date"];
        $response["car_number"] = $get_query_details["stock_car_number"];
        
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}

if(isset($_POST['stock_officer_approve'])){

    $get_quantity_received = $_POST["quantity_received"];
    $get_production_date = $_POST["production_date"];
    $get_expiry_date = $_POST["expiry_date"];
    $get_receiver = $_POST["receiver"];
    $get_product_value = $_POST["hidden_text"];

    $run_query = mysqli_query($connection,"INSERT INTO `warehouse_manager` (`recroded_item_id`, `product_id`, `actual_quantity_received`, `production_date`, `expiry_date`, `item_receiver`,`warehouse_item_status`, `warehouse_manager_timestamp`) VALUES (NULL, '$get_product_value', '$get_quantity_received', '$get_production_date', '$get_expiry_date', '$get_receiver','0', CURRENT_TIMESTAMP)");
    if($run_query){ 
        $run_query_2 = mysqli_query($connection,"UPDATE `stock_oficer` SET `record_status` = '1' WHERE `stock_oficer`.`stock_officer_record_id` = '$get_product_value'");
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['product_details_warehouse_manager'])){

    $my_product_table = $_COOKIE['b']."_stock_product_table";
    $my_category = $_COOKIE['b']."_product_category";

    $get_product_value = $_POST["product_value"];

    $run_query = mysqli_query($connection,"SELECT * FROM stock_oficer JOIN $my_product_table ON `stock_oficer`.`stock_product_name` = $my_product_table.`stock_product_id` JOIN $my_category ON `stock_oficer`.`stock_product_category` = $my_category.`product_category_id` JOIN warehouse_manager on `stock_oficer`.`stock_officer_record_id` = `warehouse_manager`.`product_id` WHERE stock_officer_record_id = '$get_product_value' LIMIT 1");
    if($run_query){
        $get_query_details = mysqli_fetch_array($run_query);
        $response["product_name"] = $get_query_details["stock_product_name"];
        $response["product_category"] = $get_query_details["product_category_name"];
        $response["product_category_number"] = $get_query_details["stock_product_category"];
        $response["container_number"] = $get_query_details["stock_container_number"];
        $response["expected_quantity"] = $get_query_details["stock_expected_quantity"];
        $response["shortages"] = $get_query_details["stock_shortages"];
        $response["supplier"] = $get_query_details["stock_supplier"];
        $response["date"] = $get_query_details["stock_date"];
        $response["car_number"] = $get_query_details["stock_car_number"];
        $response["quantity_received"] = $get_query_details["actual_quantity_received"];
        $response["production_date"] = $get_query_details["production_date"];
        $response["expiry_date"] = $get_query_details["expiry_date"];
        $response["receiver"] = $get_query_details["item_receiver"];

        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['approve_warehouse'])){

    $get_product_name = $_POST["product_name"];
    $get_product_category = $_POST["product_category"];
    $get_expiry_date = $_POST["expiry_date"];
    $get_quantity_received = $_POST["quantity_received"];

    $get_hidden_text = $_POST["hidden_text"];

    $run_query = mysqli_query($connection,"SELECT * FROM `main_stock_product_table` WHERE `stock_product_name` LIKE '%$get_product_name%' AND `stock_product_category` = '$get_product_category' LIMIT 1");
    if($run_query){ 

        $get_some_values = mysqli_fetch_array($run_query);

        $get_old_stock = $get_some_values["stock_product_items_avail"];
        $get_stock_product_id = $get_some_values["stock_product_id"];

        $new_stock_avail = $get_old_stock+$get_quantity_received;


        $run_query_2 = mysqli_query($connection,"UPDATE `main_stock_product_table` SET `stock_product_items_avail` = '$new_stock_avail', `stock_product_expiry_date` = '$get_expiry_date' WHERE `main_stock_product_table`.`stock_product_id` = '$get_stock_product_id'");
        if($run_query_2){

            $run_query_3 = mysqli_query($connection,"UPDATE `warehouse_manager` SET `warehouse_item_status` = '1' WHERE `warehouse_manager`.`product_id` = '$get_hidden_text'");

            if($run_query_3){
        $response['data'] = "success";
        $response['done'] = true;
            }else{
        $response['data'] = "false";
        $response['done'] = false;
            }
        }   
    }else{    
    }
      
    echo json_encode($response);
}


if(isset($_POST['find_product_cost'])){

    $my_product_table  = $_COOKIE['b']."_stock_product_table";
    $my_sales_table = $_COOKIE['b']."_sales_table";

    $get_product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM $my_product_table WHERE stock_product_id = '$get_product_id'");
    if($run_query){ 
        $each_detail = mysqli_fetch_array($run_query);

        $response["unit_price"] = $each_detail["stock_product_unit_price"];
        $response["items_available"] = $each_detail["stock_product_items_avail"];
       
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['create_new_branch'])){

    $get_new_branch_name = $_POST["branch_name"];
    $get_new_branch_manager_user_name = $_POST["branch_manager_user_name"];
    $get_new_branch_manager_full_name = $_POST["branch_manager_full_name"];
    $get_new_branch_manager_email = $_POST["branch_manager_email"];
    $get_new_branch_manager_contact = $_POST["branch_manager_contact"];
    $get_new_branch_manager_password = $_POST["branch_manager_pass"];

    $strong_pass = password_hash($get_new_branch_manager_password,PASSWORD_DEFAULT);

    $run_query_1 = mysqli_query($connection,"INSERT INTO `system_branches` (`system_branch_id`, `system_branch_name`, `branch_timestamp`) VALUES (NULL, '$get_new_branch_name', CURRENT_TIMESTAMP)");
    if($run_query_1){ 
       
       $run_query_2 = mysqli_query($connection,"SELECT * FROM system_branches ORDER by system_branch_id DESC LIMIT 1");

       $get_last_branch = mysqli_fetch_array($run_query_2);
       $get_last_branch_id = $get_last_branch["system_branch_id"];

       $run_query_3 = mysqli_query($connection,"INSERT INTO `users_table` (`users_table_id`, `user_username`, `user_pass`, `user_name`, `user_status`, `user_type`, `user_branch`,`user_email`,`user_contact`, `timestamp`) VALUES (NULL, '$get_new_branch_manager_user_name', '$strong_pass', '$get_new_branch_manager_full_name', '1', '2', '$get_last_branch_id','$get_new_branch_manager_email','$get_new_branch_manager_contact', CURRENT_TIMESTAMP)");

       if($run_query_3){

        $create_customers_table = $get_new_branch_name."_customers_table";
        $create_product_category = $get_new_branch_name."_product_category";
        $create_product_names = $get_new_branch_name."_product_names";
        $create_users_table = $get_new_branch_name."_users_table";
        $create_sales_table = $get_new_branch_name."_sales_table";
        $create_stock_product_table = $get_new_branch_name."_stock_product_table";

        $run_query_4 = mysqli_query($connection,"
CREATE TABLE IF NOT EXISTS $create_customers_table (
  `customers_id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_branch` int(100) NOT NULL,
  `customer_email` varchar(20) NOT NULL,
  `customer_address` mediumtext NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `items_credited_quantity` int(100) NOT NULL DEFAULT '0',
  `items_credited_cost` int(100) NOT NULL DEFAULT '0',
  `items_credited_balance` int(100) NOT NULL DEFAULT '0',
  `customer_type` int(5) NOT NULL DEFAULT '0',
  `customer_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customers_id`),
  KEY `customer_branch` (`customer_branch`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1");

    $contr_1 = $create_customers_table."_ibfk_1";
    $run_query_4_1 = mysqli_query($connection,"ALTER TABLE $create_customers_table
  ADD CONSTRAINT $contr_1 FOREIGN KEY (`customer_branch`) REFERENCES `system_branches` (`system_branch_id`)"); 

    $run_query_5  = mysqli_query($connection,"
CREATE TABLE IF NOT EXISTS $create_product_category (
  `product_category_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(50) NOT NULL,
  `product_category_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_category_id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1");


    $run_query_6 = mysqli_query($connection,"
        CREATE TABLE IF NOT EXISTS $create_product_names (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `roduct_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1");


    $run_query_7 = mysqli_query($connection,"
  CREATE TABLE IF NOT EXISTS $create_users_table (
    `users_table_id` int(100) NOT NULL AUTO_INCREMENT,
    `user_username` varchar(50) NOT NULL,
    `user_pass` mediumtext NOT NULL,
    `user_name` varchar(100) NOT NULL,
    `user_status` int(50) NOT NULL,
    `user_type` int(50) NOT NULL,
    `user_branch` int(50) NOT NULL,
    `user_email` varchar(20) NOT NULL,
    `user_contact` varchar(20) NOT NULL,
    `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`users_table_id`),
    KEY `user_status` (`user_status`),
    KEY `user_type` (`user_type`),
    KEY `user_branch` (`user_branch`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1");

    $contr_2 = $create_users_table."_ibfk_1";
    $contr_3 = $create_users_table."_ibfk_2";
    $contr_4 = $create_users_table."_ibfk_3";
    $run_query_7_1 = mysqli_query($connection,"
  ALTER TABLE $create_users_table
  ADD CONSTRAINT $contr_2 FOREIGN KEY (`user_status`) REFERENCES `user_status` (`user_status_id`),
  ADD CONSTRAINT $contr_3 FOREIGN KEY (`user_type`) REFERENCES `user_work_types` (`work_type_id`),
  ADD CONSTRAINT $contr_4 FOREIGN KEY (`user_branch`) REFERENCES `system_branches` (`system_branch_id`)");

  
  $run_query_9 = mysqli_query($connection,"
  CREATE TABLE IF NOT EXISTS $create_stock_product_table (
    `stock_product_id` int(100) NOT NULL AUTO_INCREMENT,
    `stock_product_name` varchar(50) NOT NULL,
    `stock_product_category` int(20) NOT NULL,
    `stock_product_unit_price` varchar(50) NOT NULL DEFAULT '0',
    `stock_product_items_avail` int(50) NOT NULL DEFAULT '0',
    `stock_product_expiry_date` varchar(50) NOT NULL,
    `stock_product_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`stock_product_id`),
    KEY `stock_product_category` (`stock_product_category`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1");

  $contr_6 = $create_stock_product_table."_ibfk_1";

  $run_query_9_1 = mysqli_query($connection,"
  ALTER TABLE $create_stock_product_table
  ADD CONSTRAINT $contr_6 FOREIGN KEY (`stock_product_category`) REFERENCES $create_product_category (`product_category_id`)
  ");

  $run_query_8 = mysqli_query($connection,"
  CREATE TABLE IF NOT EXISTS $create_sales_table (
    `sales_id` int(100) NOT NULL AUTO_INCREMENT,
    `button_id` int(10) NOT NULL,
    `invoice_id` varchar(50) NOT NULL,
    `customer_name` varchar(50) NOT NULL,
    `item_description` mediumtext NOT NULL,
    `item_quantity` int(100) NOT NULL,
    `item_price` int(25) NOT NULL,
    `total_amount` int(100) NOT NULL,
    `item_id` int(25) NOT NULL,
    `discount_given` int(10) DEFAULT NULL,
    `amount_payed` int(100) NOT NULL,
    `sales_person` varchar(20) NOT NULL,
    `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`sales_id`),
    KEY `sales_table_ibfk_1` (`item_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1");

  $contr_5 = $create_sales_table."_ibfk_1";

  $run_query_8_1 = mysqli_query($connection,"
  ALTER TABLE $create_sales_table
  ADD CONSTRAINT $contr_5 FOREIGN KEY (`item_id`) REFERENCES $create_stock_product_table (`stock_product_id`)
  ");


  $run_new_query = mysqli_query($connection,"INSERT INTO $create_users_table (`users_table_id`, `user_username`, `user_pass`, `user_name`, `user_status`, `user_type`, `user_branch`,`user_email`,`user_contact`, `timestamp`) VALUES (NULL, '$get_new_branch_manager_user_name', '$strong_pass', '$get_new_branch_manager_full_name', '1', '2', '$get_last_branch_id','$get_new_branch_manager_email','$get_new_branch_manager_contact', CURRENT_TIMESTAMP)");

        $response['data'] = "success";
        $response['done'] = true;

       }else{

        $response['data'] = "false";
        $response['done'] = false;

       }  
            
    }else{
       
    }
      
    echo json_encode($response);
}



/*    End Of Code      */

