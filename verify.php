<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="./broccoli.jpg" type="image/ico" sizes="64x64">
<?php
if(isset($_REQUEST['username']) && !empty($_REQUEST['username']) AND isset($_REQUEST['hash']) && !empty($_REQUEST['hash']))
{
    // Verify data
    $username = mysql_escape_string($_GET['username']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
	require "dbconn.php";
	$search = mysql_query("SELECT username, hash, active FROM userlogin WHERE username='".$username."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE userlogin SET active='1' WHERE username='".$username."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated,<a href="login.php">Click here</a> to Login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}

?>