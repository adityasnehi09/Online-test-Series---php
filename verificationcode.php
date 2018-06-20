<?php
// checked security k1
session_start();
require_once("welcome.php");
$emailX=$_SESSION['emailX'];
$verificationcode=mysqli_real_escape_string($con,$_POST['verificationcode']);
$verificationcode2=$_SESSION['sentconformationcode'];
if($verificationcode==$verificationcode2)
{

if(mysqli_query($con,"update allmember set conform_email='1' where email='$emailX'"))
{
	echo 1;
	
}else{
	echo 2;
}
	
}else{
	echo 0;
}
mysql_close();
?>