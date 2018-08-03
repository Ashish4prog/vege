<?php
session_start();
if(isset($_SESSION['aut']))
{
	extract($_SESSION);
echo "session set:".$aut;
}
else
echo "not";
?>