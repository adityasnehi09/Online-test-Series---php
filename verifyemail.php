<?php
session_start();
//chacked security k1
$emailX=$_SESSION['emailX'];
$nameX=$_SESSION['nameX'];
if(isset($_SESSION['newemail']))
{
	require_once("welcome.php");
	$emailX=mysqli_real_escape_string($con,$_SESSION['newemail']); 
}
$random_password=str_shuffle("1234567890");
$conformation_code=substr($random_password,0,8);
$_SESSION["conformation_code"]=$conformation_code;
$to   = $emailX;
$headers = "From:IndoTufan \r\n";
$headers .= "CC: noreply@indotufan.com\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = '<html><body>';
$message .= '<div width="100%" style="padding:20px;font-size:15px;"><img src="http://indotufan.com/img/indotufanlogo.png" height="60px"alt="IndoTufan" /><br><br>';
$message .= '<h3>Dear '.$nameX.', </h3><p style="color:gray">Thanks for creating your account with us.<br><br>';
$message .= '<I style="font-size:18px;color:blue"><b>You may be asked to enter this verification code: '.$conformation_code.'<b></I><br><br>
Yours sincerely,<br>IndoTufan<br>www.indotufan.com<br>email : contact@indotufan.com</p>
</div>';
$message .= "</body></html>";
$subject="Verification Code : $conformation_code";
$ip_address = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];	
date_default_timezone_set('Asia/Calcutta');
$sign_up_time=date("h:i a");
$sign_up_year= date('Y');
$sign_up_month= date('m');
$sign_up_day= date('d');
if(mail($to, $subject, $message, $headers))
{
	$_SESSION['sentconformationcode']=$conformation_code;
}
else
{
	 echo 0;
}
?>		                      