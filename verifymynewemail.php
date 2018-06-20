<?php
session_start();
//chacked security k1
require_once("welcome.php");
require_once("imp/function.php");
$nameX=$_SESSION['nameX'];
$emailX=$_SESSION['emailX'];
$newemail=securedata($_GET['newemail']);

$pass=securedata($_GET['pass']);

$lpasswordP= encrypt_decrypt('encrypt', $pass);
	               
	                $sql=mysqli_query($con,"select name from allmember where passwordX='$lpasswordP' and email='$emailX'");
					if(mysqli_num_rows($sql)>0)
					{
				$_SESSION['password_v']=true;
if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($newemail))))
{
	$random_password=str_shuffle("1234567890");
    $conformation_code=substr($random_password,0,8);
    $_SESSION["conformation_code"]=$conformation_code;
    $to   = $newemail;
    $from = 'noreply@nightbird.in';
    $headers = "From:NightBird \r\n";
    $headers .= "CC: noreply@nightbird.in\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $message = '<html><body>';
	$message .= '<div style="width:100%;padding:10px;">';
	$message .= "<img src='http://nightbird.in/img/nightlogo.png' height='150px'alt='Night Bird' /><br><br>";
    $message .= "<h2>Dear $nameX </h2>";
	$message .= "<p style='color:#999999;'><I>Your conformation code is $conformation_code</I></p>"; 
    $message .= "</div>";
	$message .= "</body></html>";
	$subject="Conformation Code";	
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
		$_SESSION['mynewemailid']=$newemail;
		?>
		<div>
			<input type="text"name="verification code"placeholder="Enter verification code"class="form-control"style="margin-bottom:10px;"id="verification_code"/>
			<input type="button"onclick="verifiedemailstep2()"class="form-control btn btn-success"value="Next"style="margin-bottom:20px;">
		</div>
		<?php
	}
	else
	{
		echo 0;
	}					 
}

else
{
	echo 2;
}
		
					}
					else
					{
						echo 3;
					}
?>		                      