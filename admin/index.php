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

if(isset($_COOKIE['ut'])){
  if($_COOKIE['ut'] != '1'){
    echo "<script>window.location.href='../login.php'</script>";
  }
}else{
  echo "<script>window.location.href='../login.php'</script>";
}



include_once "header.php";
include_once "sidebar.php";



if (isset($_GET['cr_branch'])){
    include_once "create_branch.php";
}
elseif (isset($_GET['view_all'])){
    include_once "view_all.php";
}
elseif (isset($_GET['view_request'])){
    include_once "view_request.php";
}
elseif (isset($_GET['view_transfer'])){
    include_once "view_transfer.php";
}
elseif (isset($_GET['view_sales'])){
    include_once "view_sales.php";
}
elseif (isset($_GET['view_inventory'])){
    include_once "view_inventory.php";
}
elseif (isset($_GET['sales'])){
    include_once "sales_person.php";
}
elseif (isset($_GET['add_user'])){
    include_once "add_user.php";
}
elseif (isset($_GET['change_pass'])){
    include_once "change_password.php";
}
elseif (isset($_GET['manage_user'])){
    include_once "manage_user.php";
}
elseif (isset($_GET['add_cart_brand'])){
    include_once "add_category_brand.php";
}
elseif (isset($_GET['upd_del'])){
    include_once "upd_del_cat_brand.php";
}
elseif (isset($_GET['mke_ord'])){
    include_once "make_order.php";
}

else{
    include_once "dashboard.php";
}

include_once "footer.php";