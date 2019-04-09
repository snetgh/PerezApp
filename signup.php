<?php

require_once 'db.php';

if(isset($_POST["btn_add_user"])){
    $get_user_name = $_POST["txt_full_name"];
    $get_user_email = $_POST["txt_email"];
    $get_user_contact = $_POST["txt_contact"];
    $get_user_type = $_POST["sel_user_type"];
    $get_user_username = $_POST["txt_username"];
    $get_user_password = $_POST["txt_password"];

    $strong_password =  password_hash($get_user_password,PASSWORD_DEFAULT);

     $create_user_query = mysqli_query($connection,"INSERT INTO `users_table` (`users_table_id`, `user_username`, `user_pass`, `user_name`, `user_status`, `user_type`, `user_branch`, `timestamp`) VALUES (NULL, '$get_user_username', '$strong_password', '$get_user_name', '1', '1', '20', CURRENT_TIMESTAMP)");

     if($create_user_query){
        echo "<script>alert('User Created Successfully')</script>";
        header("Location:login.php");
     }else{
        echo "<script>alert('Failed')</script>";
     }
}

?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-clearmin.min.css">
        <link rel="stylesheet" type="text/css" href="css/roboto.css">
        <link rel="stylesheet" type="text/css" href="css/material-design.css">
        <link rel="stylesheet" type="text/css" href="css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
        <title>Clearmin template</title>
    </head>
    <body class="cm-no-transition cm-1-navbar">   
 <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.html" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Home</h1> 
                    <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-notifications-white" data-toggle="dropdown"> <span class="label label-danger">23</span> </button>
                    <div class="popover cm-popover bottom">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading text-overflow">
                                        <i class="fa fa-fw fa-envelope"></i> Nunc volutpat aliquet magna.
                                    </h4>
                                    <p class="list-group-item-text text-overflow">Pellentesque tincidunt mollis scelerisque. Praesent vel blandit quam.</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-envelope"></i> Aliquam orci lectus
                                    </h4>
                                    <p class="list-group-item-text">Donec quis arcu non risus sagittis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-warning"></i> Holy guacamole !
                                    </h4>
                                    <p class="list-group-item-text">Best check yo self, you're not looking too good.</p>
                                </a>
                            </div>
                            <div style="padding:10px"><a class="btn btn-success btn-block" href="#">Show me more...</a></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong>John Smith</strong></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
                        </li>
                        <li>
                            <a href="../login.php"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>

        
        </header>
        <br><br>






       <div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create Admin Account</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter User Full Name" class="form-control" id="txt_full_name" placeholder="Full Name" required="required" name="txt_full_name">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter User Email" id="txt_email" placeholder="Email" name="txt_email">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-minlength="10" data-error="Enter Valid 10 Digit Phone Number" class="form-control" id="txt_contact" placeholder="Contact" required="required" name="txt_contact">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">User Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="select_user_type" name="sel_user_type">
                                                <option value="1">Administrator</option>              

                                            </select>
                                        </div>
                                    </div>
                                 
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" data-error="Enter Username" id="txt_username" placeholder="Username" required="required" name="txt_username">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" data-error="Enter Password" class="form-control" class="form-control" id="txt_password" placeholder="Password" required="required" name="txt_password">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary" name="btn_add_user">Create User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

             
            </div>

     
             <footer class="cm-footer"><span class="pull-left">Connected as John Smith</span><span class="pull-right">&copy; PAOMEDIA SARL</span></footer>
        </div>
        <script src="js/lib/jquery-2.1.3.min.js"></script>
        <script src="js/jquery.mousewheel.min.js"></script>
        <script src="js/jquery.cookie.min.js"></script>
        <script src="js/fastclick.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/clearmin.min.js"></script>
        <script src="js/demo/home.js"></script>
        <script src="js/validator.js"></script>
        
    </body>
</html>
