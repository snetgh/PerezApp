<?php
session_start();
require_once 'db.php';

    if (isset($_POST['login'])) {
    $user_username = $_POST['txt_username'];
    $user_password = $_POST['txt_password'];
    $user_branch = $_POST['sel_branch'];

    if($user_branch == "Main"){
      $corrected_branch = "users_table";
    }else{
       $corrected_branch = $user_branch."_users_table";
    }

    if (!isset($user_username) && !isset($user_password)) {
      echo "<script>alert('Please Fill All Spaces');window.location.href='login.php';</script>";
    } else {
       // $password = md5($password);
        $result = mysqli_query($connection,"SELECT * FROM $corrected_branch WHERE user_username = '$user_username' LIMIT 1");
       
        if (mysqli_num_rows($result) >= 1) {
            $user = mysqli_fetch_assoc($result);
            $get_password = $user['user_pass'];
           if(password_verify($user_password,$get_password)){
            $get_username = $user['user_username'];
            $get_id = $user['users_table_id'];
            $get_job = $user['user_type'];
            $branch_id = $user['user_branch'];
            $user_status = $user['user_status'];
            $user_name = $user['user_name'];
            $user_type = $user['user_type'];

            if($user_status == '1'){

            setcookie("u", $get_username, time() + (86400 * 30),"/");
            setcookie("i", $get_id, time() + (86400 * 30),"/");
            setcookie("b", $user_branch, time() + (86400 * 30),"/");
            setcookie("bi", $branch_id, time() + (86400 * 30),"/");
            setcookie("n", $user_name, time() + (86400 * 30),"/");
            setcookie("ut", $user_type, time() + (86400 * 30),"/");


            switch ($get_job) {
                case '1':
                    header('location:admin/index.php?cr_branch');
                    break;
                case '2':
                    header('location:manager/index.php?daily_sales');
                    break;
                case '3':
                    header('location:sales/index.php?sell');
                    break;
                case '5':
                  header('location:general_stock_officer/index.php?approve');
                  break;
                case '6':
                  header('location:warehouse/index.php?approve');
                  break;
                case '7':
                  header('location:general_stock_keeper/index.php?approve');
                  break;
                
                default:
                    # code...
                    break;
            }

            }else{
              echo "<script>alert('Sorry, Your Account Has Been Locked, Contact Branch Manager');window.location.href='login.php';</script>";
            }

           }else{
            echo "<script>alert('Wrong Password Entered');window.location.href='login.php';</script>";
           }
           
        } else {
          echo "<script>alert('User Not Found');window.location.href='login.php';</script>"; 
        }
    }
}


?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Perez Frozen Foods</title>


    <style type="text/css">
      /* CSS Document */
/* ---------- FONTAWESOME ---------- */
/* ---------- http://fortawesome.github.com/Font-Awesome/ ---------- */
/* ---------- http://weloveiconfonts.com/ ---------- */
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
/* ---------- ERIC MEYER'S RESET CSS ---------- */
/* ---------- http://meyerweb.com/eric/tools/css/reset/ ---------- */
@import url(http://meyerweb.com/eric/tools/css/reset/reset.css);
/* ---------- FONTAWESOME ---------- */
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* ---------- GENERAL ---------- */
* {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
}
*:before, *:after {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
}

body {
  background: #2c3338;
  color: #606468;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
  margin: 0;
}

a {
  color: #eee;
  text-decoration: none;
}

a:hover {
  color: #ea4c88;
}

input {
  border: none;
  font-family: 'Open Sans', Arial, sans-serif;
  font-size: 14px;
  line-height: 1.5em;
  padding: 0;
  -webkit-appearance: none;
}

p {
  line-height: 1.5em;
}

.clearfix {
  *zoom: 1;
}
.clearfix:before, .clearfix:after {
  content: ' ';
  display: table;
}
.clearfix:after {
  clear: both;
}

.container {
  left: 50%;
  position: fixed;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

/* ---------- LOGIN ---------- */
#login {
  width: 280px;
}

#login form span {
  background-color: #363b41;
  border-radius: 3px 0px 0px 3px;
  color: #606468;
  display: block;
  float: left;
  height: 50px;
  line-height: 50px;
  text-align: center;
  width: 50px;
}

#login form input {
  height: 50px;
}

#login form input[type="text"], input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #606468;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 230px;
}

#login form input[type="submit"] {
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #ea4c88;
  color: #eee;
  font-weight: bold;
  margin-bottom: 2em;
  text-transform: uppercase;
  width: 280px;
}

#login form input[type="submit"]:hover {
  background-color: #d44179;
}

#login > p {
  text-align: center;
}

#login > p span {
  padding-left: 5px;
}

    </style>

</head>

<body>

    <div class="container">

      <div id="login">
        <h2 style="text-align: center;color: white">PEREZ FROZEN FOODS</h2>
        <h3 style="text-align: center;color: white">LOGIN</h3>
        <form  method="post">

          <fieldset class="clearfix">
            <p> <select class="form-control" name="sel_branch" style="width: 100%;height: 50px;background: #3b4148;color: gray;">
                      <option disabled='disabled' selected>Select Branch</option>
                       <?php  
                       $query_1 = mysqli_query($connection,"SELECT * FROM `system_branches`");
                       while ($get_each_branch = mysqli_fetch_array($query_1)) { ?>
                        <option value="<?php   echo $get_each_branch['system_branch_name']; ?>"><?php   echo $get_each_branch['system_branch_name']; ?></option>
                     <?php  }

                       ?>
                   </select>

            <p><span class="fontawesome-user"></span><input type="text" name="txt_username" required placeholder="Enter Username"></p> <!-- JS because of IE support; better: placeholder="Username" -->

            <p><span class="fontawesome-lock"></span><input type="password" name="txt_password" required placeholder="Enter Password"></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><input type="submit" value="Sign In" name="login"></p>

          </fieldset>
                     
        </form>
                      
      </div> <!-- end login -->
      <div style="text-align:center;margin-top:20px"><span style="font-weight:bold;color:white"><a href="admin.php">Click Here To Login As Administrator</a></span></div> 

    </div>

  </body>
</html>

</body>

</html>