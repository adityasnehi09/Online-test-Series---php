<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
 $timing=date("h:i a");
$year= date('Y');
$month= date('m');
$day= date('d');
require_once("welcome.php");
if (isset($_SERVER['HTTP_REFERER']))
{	
$referer=mysqli_real_escape_string($con,$_SERVER['HTTP_REFERER']);
}
else
{
	$referer="Direct at Night Bird";
}

$ip = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);
$name=mysqli_real_escape_string($con,$_POST['contactname']);
$email=mysqli_real_escape_string($con,$_POST['contactemail']);
$mobile_no=mysqli_real_escape_string($con,$_POST['contactmobile_no']);
$message=mysqli_real_escape_string($con,$_POST['message']);
	if(preg_match('%^[A-Za-z\.\-\ ]{2,20}$%',stripslashes(trim($name))))
	{
		    if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($email))))
	        {
		        if(preg_match('%^[0-9]{10}$%',stripslashes(trim($mobile_no))))
	            {
	             require_once("welcome.php");
	                           if(mysqli_query($con,"insert into contact (name,email,mobile_no,message,ip_address,browser,day,month,year,timing,referer) values('$name','$email','$mobile_no','$message','$ip','$browser','$day','$month','$year','$timing','$referer')"))
	                           {
						         echo 1;
                               }
					           else
						       {
	                             echo "<h3 style='color:red'>Unknown Error ! Try again</h3>";
			                   }
				}
				 else
	            {
	              echo "<h3 style='color:red'>Please enter 10 digit Mobile Number</h3>";
	            }
	        }
			else
	        {
	           echo "<h3 style='color:red'>Please enter valid email Id</h3>";
	        }
	}
	else
	{
	   echo "<h3 style='color:red'>Please enter your real full name</h3>";
	}
	
?>