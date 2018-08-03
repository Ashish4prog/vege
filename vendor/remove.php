<?php
session_start();
	$con=mysqli_connect("localhost","root","","vege");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$vegetable=$_POST['veg_name'];

$vend_name=$_SESSION["vendusername"];
mysqli_query($con,"DELETE FROM `vend_veggie` WHERE `vegetable` = '".$vegetable."' AND `vendor`='".$vend_name."' ");




 ?>

