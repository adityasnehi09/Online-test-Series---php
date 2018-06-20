<?php
require_once("session.php");
if(isset($_POST['id']))
{
	$id=mysqli_real_escape_string($con,$_POST['id']);
	if(mysqli_query($con,"DELETE FROM `contact` where s_no ='$id'"))
	{
		echo "Deleted";
	}
	else
	{
		echo "Not Deleted";
	}
}




?>