<!DOCTYPE html>
<?php
error_reporting(0);
session_start();

if(isset($_SESSION["vend"]))
{
	echo "<script>location='home.php'</script>";
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
    $data=mysql_query("select `name`,shopname,username from vendorlogin where username='$uname' and password='$pwd' and active='1'");
	
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
			$_SESSION["vend"]=$un[0];
			$_SESSION["vendusername"]=$un[1];
			$_SESSION["email"]=$un[2];
			header("location:home.php");
		}
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VegE-vegies are now one tap away</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  <form action="signup_vendor.php" method="POST" class="register-form">
  <div class="title">SignUp for Vendors</div>
	<input type="text" name="shopname" maxlength=30 min=2 placeholder="Shop Name" required>

	<input type="text" name="name" maxlength=20 min=2 placeholder="Full Name" required>

	<input type="number" name="mobile" maxlength=10  placeholder="Mobile no."  pattern="[0-9]{2,}" minlength=10 required>

	<input type="text" name="address" maxlength=100 minlength=3  placeholder="Address" required>

	<input type="text" name="city" maxlength=20 minlength=3  placeholder="City" required>

	<select id="state" name="state" placeholder="State" required>
      <option value="chhattisgarh">Chhattisgarh</option>
    </select>

	<input type="text" name="pincode" maxlength=6 minlength=6  placeholder="Pin Code" required>
	
	<input type="text" name="username"  maxlength=50 min=10  placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
  
	<input type="password" name="password"  maxlength=25 min=6  placeholder="Password" pattern=".{6,}" minlength=6 required>
	
	<input type="checkbox" id="rememberMe"/>
	<label for="rememberMe"></label><span>I have read and agree to the <a href="#">Terms of Use </a></span>
	<input type="submit" name="signup" value="Create Account" class="button">
	<div class="already">Already have an account? <a href="#">Sign In</a></div>
  </form>
  <form action="" method="POST" class="login-form">
  <div class="title">Login for Vendors</div>
  <input type="text" name="lusername"  maxlength=50 min=10  placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
  
  <input type="password" name="lpassword"  maxlength=25 min=6  placeholder="Password" pattern=".{6,}" minlength=6 required>
  
  <input type="submit" name="signin" value="Login" class="button">
  <div class="already">New User? Create an account <a href="#">Sign Up</a></div>
  </form>
</div>

</body>
</html>