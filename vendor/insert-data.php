<?php
session_start();
	$con=mysqli_connect("localhost","root","","vege");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$veg_name=$_POST['veg_name'];
$stock_form=$_POST['stock_form'];
$price_form=$_POST['price_form'];
$vend_name=$_SESSION["vendusername"];
mysqli_query($con,"INSERT INTO vend_veggie(vendor,vegetable,price,stock) VALUES('". $vend_name ."','". $veg_name."','". $price_form ."','". $stock_form ."')");




 ?>