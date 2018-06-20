<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['type_of_member'])){
	
	die(header("Location: login.php"));
}
require_once("../include/function.php");
	require_once("../../welcome.php");
   ?>