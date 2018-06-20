<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['logintemp']))
{
	 $ref=basename($_SERVER['PHP_SELF']);
	header("location: loginForm.php?ref=$ref");
}
?>