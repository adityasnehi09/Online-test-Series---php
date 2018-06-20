<?php
if(isset($_POST['uidcost']))
{
	require_once("welcome.php");
	$uidcost=mysqli_real_escape_string($con,$_POST['uidcost']);
	
}