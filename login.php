<?php
session_start();
if (isset($_POST["submit"])) {
 $user = $_POST["login"];
 $password = $_POST["password"];
 include("config.php");
 $q = mysqli_query("select * from signup where email='$user' and password='$password'");
 if (mysqli_num_rows($q) > 0) {
 $_SESSION["user_ses"] = $user;
 header("location:index.php");
 } else {
 echo "false" . mysqli_error();
 }
}
?>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <title>Login Form</title>
 <link rel="stylesheet" href="css/login.style.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap3.css" />
</head>
<body>
 <section class="container">
 <div class="login">
 <h1>Login</h1>
 <form method="post">
 <p><input type="text" name="login" value="" placeholder="Email"></p>
 <p><input type="password" name="password" value="" placeholder="Password"></p>
 <p class="remember_me">
 <label>
 <input type="checkbox" name="remember_me" id="remember_me">
 Remember me on this computer
 </label>
 </p>
 <p class="submit"><input type="submit" name="submit" value="Login"></p>
 </form>
 </div>
 <div class="login-help">
 <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
 </div>
 </section>
</body>
</html>
