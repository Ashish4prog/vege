<?php
session_start();

if(isset($_SESSION["aut"]))
{
	echo "<script>location='index.php'</script>";
}
else
{
	session_destroy();
	setcookie("phpsessid","",time()-1);
}

if(isset($_POST['signin']))
{
	$uname=$_POST['lusername'];
	$pwd=$_POST['lpassword'];
	
	$uname=mysql_real_escape_string($uname);
	$pwd=mysql_real_escape_string($pwd);
	
	mysql_connect("localhost","root","");
    mysql_select_db("vege");
    $data=mysql_query("select `name` from userlogin where username='$uname' and password='$pwd' and active='1'");
	
		if(mysql_num_rows($data)==0)
		{
			echo "<p style='color:white;'>
					Invalid Username or Password!!
				</p>";
		}
		else
		{  
			session_start();
			$un=mysql_fetch_row($data);
			$_SESSION["aut"]=$un[0];
			header("location:index.php");
		}
}
?>
<html>
<head>
<script src="jquery-3.2.1.js"></script>
<script>
$(document).ready(function(){
$('.already a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
});
</script>
<link rel=""><link rel="stylesheet" type="text/css" href="login.css">
<link rel="icon" href="./broccoli.jpg" type="image/ico" sizes="64x64">
</head>
<body>
<div class="content">
  <form action="sign_up_vr.php" method="POST" class="register-form">
  <div class="title">SignUp on VegE</div>
 
	<input type="text" name="username"  maxlength=50 min=10  placeholder="E-mail" value="<?php if(isset($_POST['username'])) {echo $_POST['username'];} ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
  
	<input type="password" name="password"  maxlength=25 min=6  placeholder="Password" value="<?php if(isset($_POST['password'])) {echo $_POST['password'];} ?>" pattern=".{6,}" minlength=6 required>
	
	<input type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>" maxlength=25 min=10 placeholder="Full Name" required>

	<input type="number" name="mobile" value="<?php if(isset($_POST['mobile'])) {echo $_POST['mobile'];} ?>" maxlength=10 minlength=10  placeholder="Mobile no."  pattern="[0-9]{2,}" minlength=10 required>
	
	<input type="text" name="address" value="<?php if(isset($_POST['address'])) {echo $_POST['address'];} ?>" maxlength=50 minlength=10  placeholder="Address" required>
	
	<input type="checkbox" id="rememberMe"/>
	<label for="rememberMe"></label><span>I have read and agree to the <a href="#">Terms of Use </a></span>
	<input type="submit" name="signup" value="Create Account" class="button">
	<div class="already">Already have an account? <a href="#">Sign In</a></div>
  </form>
  <form action="" method="POST" class="login-form">
  <div class="title">Login to VegE</div>
  <input type="text" name="lusername"  maxlength=50 min=10  placeholder="E-mail" value="<?php if(isset($_POST['Username'])) {echo $_POST['lusername'];} ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
  
  <input type="password" name="lpassword"  maxlength=25 min=6  placeholder="Password" value="<?php if(isset($_POST['Password'])) {echo $_POST['lpassword'];} ?>" pattern=".{6,}" minlength=6 required>
  
  <input type="submit" name="signin" value="Login" class="button">

  <input type="button" name="vendor" value="Login as Vendor" class="button" onClick="window.location.href='vendor/login.php'">
  <div class="already">New User? Create an account <a href="#">Sign Up</a></div>
  </form>
</div>

</body>
</html>