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
  if($_COOKIE['ut'] != '3'){
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



if (isset($_GET['sell'])){
    include_once "sales_person.php";
}
elseif (isset($_GET['return'])){
    include_once "return_goods.php";
}
elseif (isset($_GET['reprint'])){
    include_once "re_print.php";
}
elseif (isset($_GET['sales'])){
    include_once "view_sales.php";
}
elseif (isset($_GET['add_product'])){
    include_once "add_product.php";
}
elseif (isset($_GET['pass'])){
    include_once "change_password.php";
}

else{
    include_once "sales_person.php";
}

include_once "footer.php";