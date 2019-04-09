<?php
session_start();
require_once 'db.php';

    if (isset($_POST['login'])) {
    $user_name = $_POST['txt_name'];
    $user_username = $_POST['txt_username'];
    $user_password = $_POST['txt_password'];

    $strong_pass = password_hash($user_password,PASSWORD_DEFAULT);

    $my_insert_query = mysqli_query($connection,"INSERT INTO `admin_users_table` (`users_table_id`, `user_username`, `user_pass`, `user_name`, `user_status`, `user_type`, `timestamp`) VALUES (NULL, '$user_username', '$strong_pass', '$user_name', '1', '1', CURRENT_TIMESTAMP)");

    if($my_insert_query){
        echo "<script>alert('Created Successfully');window.location.href='admin.php'</script>";
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
        <h3 style="text-align: center;color: white">ADMINISTRATOR REGISTRATION PAGE</h3>
        <form  method="post">

          <fieldset class="clearfix">
          <p><span class="fontawesome-user"></span><input type="text" name="txt_name" required placeholder="Enter Full Name"></p> <!-- JS because of IE support; better: placeholder="Full Name" -->
            <p><span class="fontawesome-user"></span><input type="text" name="txt_username" required placeholder="Enter Username"></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="txt_password" required placeholder="Enter Password"></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><input type="submit" value="Register" name="login"></p>

          </fieldset>

        </form>
                      
      </div> <!-- end login -->
      <div style="text-align:center;margin-top:20px"><span style="font-weight:bold;color:white"><a href="login.php">Click Here To Go Back To Login </a></span></div> 

    </div>

  </body>
</html>

</body>

</html>