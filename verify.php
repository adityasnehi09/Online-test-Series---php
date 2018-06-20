<?php
//checked security k1
session_start();

if(isset($_POST['sign_submit']))
{ 
require_once("welcome.php");
require_once("imp/function.php");
/* Come From Form by Post Method */
$nameX=securedata($_POST['username']);

if(isset($_SESSION['third_party_email']))
{
	$emailX=$_SESSION['third_party_email'];
	$conform_email=1;
}else{
	$conform_email=0;
	$emailX=securedata($_POST['useremail']);
}
if(isset($_SESSION['third_party_profile_image_url'])){
	$third_profile_image_url= $_SESSION['third_party_profile_image_url'];
}else{
	$third_profile_image_url='0';
}
if(isset($_SESSION['google_plus_cover_image_url'])){
	$third_cover_image_url=$_SESSION['third_party_cover_image_url'];
}else{
	$third_cover_image_url='0';
}
if(isset($_SESSION['google_plus_id'])){
	$google_plus_id=$_SESSION['google_plus_id'];
}else{
	$google_plus_id=false;
}

if(isset($_SESSION['fb_id'])){
	$fb_id=$_SESSION['fb_id'];
}else{
	$fb_id=false;
}

if(isset($_SESSION['twitter_id'])){
	$twitter_id=$_SESSION['twitter_id'];
}else{
	$twitter_id=false;
}

$mobile_noX=securedata($_POST['usermobile_no']);
$passwordX=securedata($_POST['userpassword']);
$genderX=securedata($_POST['usergender']);
//$dobX=securedata($_POST['userdob']);
$date_dob=securedata($_POST['date_dob']);
$month_dob=securedata($_POST['month_dob']);
$year_dob=securedata($_POST['year_dob']);
if($genderX=="male" || $genderX=="female"){
	$genderverify=1;
}else{
	$genderverify=0;
}
echo "<h1>".$genderX."</h1>";
/* Validation */
if($genderverify==1)
{
if(preg_match('%^[A-Za-z\.\-\ ]{2,20}$%',stripslashes(trim($nameX))))
	{
		
		    if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($emailX))))
	        {

		        if(preg_match('%^[0-9]{10}$%',stripslashes(trim($mobile_noX))))
	            {
				     if(!preg_match('%^[\'\"\<\>]%',stripslashes(trim($passwordX))))
	                 {
						$passwordX= encrypt_decrypt('encrypt', $passwordX);
				         $_SESSION['nameX']=$nameX;
				         $_SESSION['emailX']=$emailX;
				         $_SESSION['mobile_noX']=$emailX;
                         if(strlen($passwordX)>6 )
                         {   
                             $ip_address = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
                             $browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);	
                             date_default_timezone_set('Asia/Calcutta');
                             $sign_up_time=date("h:i a");
                             $sign_up_year= date('Y');
                             $sign_up_month= date('m');
                             $sign_up_day= date('d');                             
                             $uid=md5(uniqid() . time());
							 /* For table */
                             $follower="follower".$uid;
                             $following="following".$uid;
                             $seenlist="seen".$uid;
                             $detaillist="fulldetail".$uid;
                             $couplelist="couple_sent_req".$uid;
                             $notificationlist="notify".$uid;
                             $couplerequest="couple_request".$uid;
                             $transaction="mytransaction".$uid;
							 $mymember="mymember".$uid;
						     require_once("welcome.php");
			                 $chkmember=mysqli_query($con,"select name from allmember where email='$emailX'");
			                    if(mysqli_num_rows($chkmember)==0)
			                    {
								   if(mysqli_query($con,"insert into allmember(name,email,mobile_no,passwordX,browser,ip_address,fee_status,conform_email,sign_up_day,sign_up_month,sign_up_year,sign_up_time,gender,date_dob,month_dob,year_dob,uid,third_profile_image_url,third_cover_image_url,google_plus_id,fb_id,twitter_id) values ('$nameX','$emailX','$mobile_noX','$passwordX','$browser','$ip_address','0','$conform_email','$sign_up_day','$sign_up_month','$sign_up_year','$sign_up_time','$genderX','$date_dob','$month_dob','$year_dob','$uid','$third_profile_image_url','$third_cover_image_url','$google_plus_id','$fb_id','$twitter_id')"))
									{                                                 
										$_SESSION['nameX']=$nameX;
										$_SESSION['logintemp']=$emailX;
										require_once("welcome_mail.php");
																						
									}
									else
									{
											header("location: sign-up.php?error_code=15");	
									}
			                    }
						        else
			                    {
											 header("location: sign-up.php?user_exist=1&error_code=27");
			                    }
                        }
					   else
	                   {
									 header("location: sign-up.php?password_error=1&error_code=28");
	                   }
	                }
				    else
	                {
								 header("location: sign-up.php?errorpasswordsecurity=1&error_code=29");
	                }	
				}
			   else
	           {
							 header("location: sign-up.php?mobile_error=1&error_code=30");
	           }
			}
		    else
	        {
						 header("location: sign-up.php?email_error=1&error_code=31");
	        }	
	}
	else
	{
				 header("location: sign-up.php?name_error=1&error_code=32");
	}
}
else
{
			header("location: sign-up.php?unknowngender=".$genderX."&error_code=33");
}
}
else
{
			header("location: sign-up.php?error_code=34");
}
?>