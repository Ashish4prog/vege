<?php
session_start();
	$con=mysqli_connect("localhost","root","","vege");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$vegetable=$_POST['vegetable'];
	$stock=$_POST['stock'];
	$price=$_POST['price'];

$vend_name=$_SESSION["vendusername"];
mysqli_query($con,"UPDATE `vend_veggie` SET `price` = '".$price."',`stock`='".$stock."' WHERE `vendor` = '".$vend_name."' AND `vegetable`='".$vegetable."'");


header("location:home.php");

 ?>

