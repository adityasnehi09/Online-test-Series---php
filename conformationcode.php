<?php
session_start();
// secure k1
require_once("welcome.php");
$verificationcode=mysqli_real_escape_string($con,$_POST['conformationcode']);
$verificationcode2=mysqli_real_escape_string($con,$_SESSION['sentconformationcode']);

if($verificationcode==$verificationcode2)
{
	echo 1;
	$_SESSION['verificationcodematch']=1;
	
	
}else{
	echo 0;
}
?>