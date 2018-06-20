<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logintemp']))
{
	header("location: logout.php");
}
?>