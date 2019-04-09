<?php

if(isset($_POST['btn_submit'])){
    $get_user_id = $_COOKIE['i'];

    $get_old_password = $_POST["txt_old_pass"];
    $new_pass = $_POST['txt_password'];
    $pass_match = $_POST["txt_password_match"];

    if($new_pass == $pass_match){
    $get_database_password = mysqli_query($connection,"SELECT * FROM admin_users_table WHERE `users_table_id` = '$get_user_id' LIMIT 1");
    if(mysqli_num_rows($get_database_password) >= 1){
        $get_password = mysqli_fetch_array($get_database_password);
        $get_my_pass = $get_password['user_pass'];
        if(password_verify($get_old_password,$get_my_pass)){

            $strong_pass = password_hash($new_pass,PASSWORD_DEFAULT);
            $run_update_query = mysqli_query($connection,"UPDATE `admin_users_table` SET `user_pass` = '$strong_pass' WHERE `admin_users_table`.`users_table_id` = '$get_user_id' ");
            if($run_update_query){
                echo "<script>alert('Password Changed Successfully')</script>";
            }else{
                echo "<script>alert('Failed To Changed Password')</script>";
            }
        }
    }

}else{
    echo "<script>alert('Error, Passwords Do Not Match')</script>";
}

}


?>


<div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Change Password</div>
                            <div class="panel-body">
                                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Enter Old Password</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder="Enter Old Password" class="form-control" name="txt_old_pass" required = 'required'> </div>
                                </div>
                    
                                <div class="form-group">
                                    <label class="col-md-12">Enter New Password</label>
                                    <div class="col-md-12">
                                       <input type="password" placeholder="Enter New Password" class="form-control form-control-line" required="required" name="txt_password"> </div>
                                    </div>

                                <div class="form-group">
                                    <label class="col-md-12">Repeat New Password</label>
                                    <div class="col-md-12">
                                       <input type="password" placeholder="Re-Enter New Password " class="form-control form-control-line" required="required" name="txt_password_match"> </div>
                                    </div>

                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <input class="btn btn-success" type="submit" name="btn_submit" value="Change Password">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>