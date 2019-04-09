<?php
include_once "../db.php";
session_start();
//if (isset($_SESSION['user_id'])){
  //  $user_id = $_SESSION['user_id'];
  //  $userQuery = "SELECT * FROM user_login_details WHERE id = '$user_id'";
   // $result = mysqli_query($connection, $userQuery);
   // $user = mysqli_fetch_assoc($result);
 //   $get_user_name = $user['user_username'];
//}else{
   // header('Location:../login.php');


//}


$my_branch = $_COOKIE['b'];
$my_id = $_COOKIE['i'];
$my_username= $_COOKIE['u'];
$my_bi = $_COOKIE['bi'];

if(isset($_COOKIE['ut'])){
  if($_COOKIE['ut'] != '2'){
    echo "<script>window.location.href='../login.php'</script>";
  }
}else{
  echo "<script>window.location.href='../login.php'</script>";
}



if(!isset($my_branch) || !isset($my_id) || !isset($my_username) || !isset($my_bi)){
  header('Location:../login.php');
}

include_once "header.php";
include_once "sidebar.php";



if (isset($_GET['daily_sales'])){
    include_once "daily_sales.php";
}
elseif (isset($_GET['add_cash_customer'])){
    include_once "add_cash_customers.php";
}
elseif (isset($_GET['add_credit_customer'])){
    include_once "add_credit_customer.php";
}
elseif (isset($_GET['add_user'])){
    include_once "add_user.php";
}
elseif (isset($_GET['add_product'])){
    include_once "add_product.php";
}
elseif (isset($_GET['add_category'])){
    include_once "add_category.php";
}
elseif (isset($_GET['manage_category'])){
    include_once "manage_category.php";
}
elseif (isset($_GET['manage_product'])){
    include_once "manage_product.php";
}
elseif (isset($_GET['manage_user'])){
    include_once "manage_user.php";
}
elseif (isset($_GET['request_product'])){
    include_once "request_product.php";
}
elseif (isset($_GET['product_requests'])){
    include_once "product_requests.php";
}
elseif (isset($_GET['transfer_out'])){
    include_once "transfer_out.php";
}
elseif (isset($_GET['transfer_in'])){
    include_once "approve_transfer_in.php";
}
elseif (isset($_GET['mke_ord'])){
    include_once "make_order.php";
}
elseif (isset($_GET['all_products'])){
    include_once "all_products.php";
}
elseif (isset($_GET['all_requests'])){
    include_once "all_requests.php";
}
elseif (isset($_GET['all_transfers'])){
    include_once "all_transfers.php";
}

else{
    include_once "daily_sales.php";
}

include_once "footer.php";