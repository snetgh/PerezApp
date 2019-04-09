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
  if($_COOKIE['ut'] != '7'){
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



if (isset($_GET['approve'])){
    include_once "general_stock_keeper.php";
}
elseif (isset($_GET['pass'])){
    include_once "change_pass.php";
}
elseif (isset($_GET['processed'])){
    include_once "view_proccessed_stock_keeper.php";
}
else{
    include_once "view_proccessed_stock_keeper.php";
}

include_once "footer.php";