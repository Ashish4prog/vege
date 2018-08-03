<?php
session_start();
session_unset($_SESSION['vend']);
session_destroy();
setcookie("phpsessid","",time()-1);

echo '<div class="statusmsg">Log out successfully. Redirecting to Home page....</div>';
sleep(4);
echo "<script>location='login.php'</script>";
?>