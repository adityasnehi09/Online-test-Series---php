<?php
require_once("session.php");
require_once("welcome.php");
//chacked security k1

if(isset($_REQUEST['email']))
{
	$email=$_REQUEST['email'];
$name=$_REQUEST['name'];
$mymsg=$_REQUEST['mymsg'];
$cusmsg=$_REQUEST['cusmsg'];
	

$to   = $emailX;
$headers = "From:IndoTufan\r\n";
$headers .= "CC: info@indotufan.com\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = '<html><body>';
$message .= '<div width="100%" style="padding:20px;font-size:15px;"><img src="http://indotufan.com/img/indotufanlogo.png" height="60px"alt="IndoTufan" /><br><br>';
$message .= '<h3>Dear '.$name.', </h3><p style="color:gray">'.$mymsg.'<br><br></p>';
$message .= '<p style="color:gray">Reply of your message<br>'.$cusmsg.'<br><br>';
$message .= 'Yours sincerely,<br>IndoTufan Team<br>www.indotufan.com<br>email : contact@indotufan.com</p></div>';
$message .= "</body></html>";
$subject="Dear $name, Thanks for your message";
$ip_address = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];	

if(mail($to, $subject, $message, $headers))
{
	echo "Message Sent";
}
else
{
	 echo "Sending Error";
}
}
?>		                      