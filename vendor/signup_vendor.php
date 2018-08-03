<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="./broccoli.jpg" type="image/ico" sizes="64x64">
<?php
if(isset($_POST['signup']))
{	if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['mobile']) && !empty($_POST['mobile']))
	{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$shopname=$_POST['shopname'];
	$address1=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	$name=mysql_real_escape_string($_POST['name']);
	$mobile=mysql_real_escape_string($_POST['mobile']);
	$username=mysql_real_escape_string($username);
	$password=mysql_real_escape_string($password);
	$link = mysqli_connect("localhost", "root", "", "vend_veggie");
 
	if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	mysql_connect("localhost","root","");
    mysql_select_db("vege");
    $data=mysql_query("select * from vendorlogin where username='$username' AND active='1'");
	if(mysql_num_rows($data)!=0)
		{
			echo "Username exits!!!";
			exit(0);
		}
	else
	{
			if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $username))
			{
				echo "Invalid email!!";
			 $msg = 'The email you have entered is invalid, please try again.';
			}
			 
			 else
			{
				
				$att=strstr($username,'@',true);	

				$sql = "CREATE TABLE ".$att."(
									vegetable VARCHAR(30) NOT NULL,
									price VARCHAR(3) NOT NULL
									)";
		
		$addr=str_ireplace(' ','+',$address1);
		$city=str_ireplace(' ','+',$city);

error_reporting(0);
function getLatLong($address){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}
$address = $addr.','.$city.',chhattisgarh,'.$pincode.',India';
while(!$latLong['latitude']&&(!$latLong['longitude']))
$latLong = getLatLong($address);
$latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
$longitude = $latLong['longitude']?$latLong['longitude']:'Not found';
			$hash = md5(rand(0,1000));
			mysql_query("INSERT INTO vendorlogin(shopname,address,city,state,pincode,username, password, name, hash, mobile, latitude, longitude) VALUES('". $shopname ."','". $address1."','". $city ."','". $state ."','". $pincode ."',
			'". $username ."', 
			'". $password ."', 
			'". $name."', 
			'". $hash ."', 
			'". $mobile ."','". $latitude ."','". $longitude ."') ") or die(mysql_error());
			
			
			
require '../phpmail/PHPMailerAutoload.php';

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

$mail->Subject = 'Account Verification Veg-E';
$mail->Body    = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
<br>
------------------------ <br>
Username: '.$username.'	 <br>
Password: '.$password.'	 <br>
------------------------ <br>
 
Please click this link to activate your account:
https://849dc424.ngrok.io/signup/vendor/verify.php?username='.$username.'&hash='.$hash.'
 
';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $msg= 'Message could not be sent.'.$mail->ErrorInfo;
} else {
    $msg = 'Account Created Successfully!!, <br /> Please verify it by clicking the activation link that has been send to your email. <br><a href="https://mail.google.com/mail/">Click here</a> to login your Gmail account';
}

			}
		}
	}
	else
		echo "Some field Empty";
}
?>
<?php 
    if(isset($msg)){  // Check if $msg is not empty
        echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    } 
?>