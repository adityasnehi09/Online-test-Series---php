<?php
session_start();
require_once("welcome.php");
if(isset($_SESSION['sentconformationcode']))
{
	if(isset($_SESSION['password_v']) )
	{
		if($_SESSION['password_v'])
		{
			$newemail=$_SESSION['mynewemailid'];
	$user_idX=$_SESSION['user_idX'];
	$uidX=$_SESSION['uidperson'];
	$fulldetail="fulldetail".$uidX;
	if(mysqli_query($con,"update allmember set email='$newemail' where id='$user_idX'"))
	{
		mysqli_query($con,"update `$fulldetail` set email='$newemail'");
		echo "Email Successfully Changed";
		$_SESSION['emailX']=$newemail;
		$_SESSION['logintemp']=$newemail;
	}
	else
	{
		echo "Something Went Wrong";
	}
	unset($_SESSION['password_v']); 
		}
	}
	else{
		echo "Session Expired"; 
	}
	
	
}



?>