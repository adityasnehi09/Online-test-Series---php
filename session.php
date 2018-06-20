<?php
session_start();
if(isset($_SESSION['logintemp']))
{
	
}
else
{
	header("location: loginForm.php");
}



?>