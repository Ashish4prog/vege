<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="./broccoli.jpg" type="image/ico" sizes="64x64">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['aut']))
{	
	$sess=$_SESSION['aut'];
	
	mysql_connect("localhost","root","");
    mysql_select_db("vege");
    $data=mysql_query("select `username` from userlogin where name='".$sess."' AND active='1'");
	$un=mysql_fetch_row($data);
	if(mysql_num_rows($data)==0)
		{
			echo "Invalid Username";
			exit(0);
		}
	else
	{
			$username=$un[0];
			
			
			
require 'phpmail/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cart.vege@gmail.com';                 // SMTP username
$mail->Password = 'vegecart@2018';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('cart.vege@gmail.com', 'Veg-E Mart');
$mail->addAddress('ptpthakur30@gmail.com');     // Add a recipient
$mail->addAddress($username);               // Name is optional
$mail->addReplyTo('cart.vege@gmail.com', 'Query');
$mail->addCC('ptpthakur30@gmail.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Invoice veg-e cart';
$name="";
foreach($_SESSION['shopping_cart'] as $keys=>$arr)
{
	$name=$name.$arr["item_name"]."-".$arr["item_quantity"]."-".$arr["item_price"]."<br>";
}


$mail->Body .= "<table class='TFtable' border='1' style='width':100%>"; //starts the table tag
            $mail->Body .= "<caption>Invoice of your Order</caption><tr><th>Item Name</th><th>Quantity(in kg)</th><th>Price(per kg)</th></tr>";
foreach($_SESSION['shopping_cart'] as $keys=>$arr)
{
	$mail->Body.="<tr><td>".$arr["item_name"]."</td><td>".$arr["item_quantity"]."</td><td>".$arr["item_price"]."</td></tr>";
}
$mail->Body.="</table>Total_Amount=".$_SESSION['total']."/- <br>";
$gst=((5*$_SESSION['total'])/100);
$mail->Body.="GST(5%)=".$gst."/-";
$st=$gst+$_SESSION['total'];

$mail->Body.="<br>Grand Total=".$st."/-";
$mail->Body .="<br>The following items will be delivered to your address within 4 hours of service,<br>Thank You for visiting Veg-E ";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $msg= 'Message could not be sent.'.$mail->ErrorInfo;
} else {
    $msg = 'Your order has been successfully placed.';
}
	
	}
	
}
?>
<?php 
	if(isset($msg)){  // Check if $msg is not empty
?>
	<div class="jumbotron text-xs-center" style="padding-top:15%;padding-bottom:15%; margin-top:35px;">
  		<h1 class="display-3 text-xs-center" align="center">Thank You!</h1>
  		<p class="lead text-xs-center" align="center"> <?php echo $msg; ?><strong> Please check your email</strong></p>
  <hr>
  <p align="center">
    Happy Shopping!
  </p>
  <p class="lead" align="center">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to Homepage</a>
  </p>
</div>
<?php
	} 
?>
</body>
</html>