<?php
//security k1
session_start();
if(isset($_SESSION['coupleuid']))
{
	require_once("welcome.php");
	include_once("basic2.php");
	$coupleuid=mysqli_real_escape_string($con,$_POST['u']);
	$couple_request_uid="couple_request".$coupleuid;
	$couple_noti_uid= "notify".$coupleuid;  // Couple Uid
	
	
	$mycrop_pic=$_SESSION['crop_pic'];
	$comp_uidX=mysqli_real_escape_string($con,$_POST['comp_uid']);         
	$version_uidX=mysqli_real_escape_string($con,$_POST['version_uid']);
	
	$fulldetail_cou="fulldetail".$coupleuid;
	
	$sql_usr=mysqli_query($con,"select name,email from `$fulldetail_cou`");
	if(mysqli_num_rows($sql_usr)>0)
	{
		while($rrrows=mysqli_fetch_assoc($sql_usr))
		{
			$pname=$rrrows['name'];
			$pemail=$rrrows['email'];
		}
	}
	echo mysql_error();
	
	
	$nameX=$_SESSION['nameX'];
	$emailX=$_SESSION['emailX'];
	$mobile_noX=$_SESSION['mobile_noX'];
	$uid=md5(uniqid() . time());
$myuid=$_SESSION['uidperson'];
$notification_uid=$myuid."_".$uid;
	$mycouplereqsentuid="couple_sent_req".$myuid;
	
	 
	date_default_timezone_set('Asia/Calcutta');

 $entry_timing=date("h:i a");
$entry_year= date('Y');
$entry_month= date('m');
$entry_day= date('d');
$nameX=$_SESSION['nameX'];
if (isset($_SERVER['HTTP_REFERER']))
{	
$referer=$_SERVER['HTTP_REFERER'];
}
else
{
	$referer="Direct at Night Bird";
}


$notification_msg=mysqli_real_escape_string($con,"<b>".$nameX."</b> has requested for couple entry in dance Competition with you");
$linkofinfo="couple-request.php?id=$notification_uid";
$ip = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);
require_once("welcome.php");
$user_id=$_SESSION['user_idX'];
$uidperson=$_SESSION['uidperson'];

$sql_check_privious_request=mysqli_query($con,"select name from `$mycouplereqsentuid` where comp_uid='$comp_uidX' and uid='$coupleuid'");
if(mysqli_num_rows($sql_check_privious_request)==0)
{
           if(mysqli_query($con,"insert into `$couple_request_uid` (name,id,uid,crop_pic,browser,ip_address,referer,comp_uid,version_uid) values ('$nameX','$user_id','$uidperson','$mycrop_pic','$browser','$ip','$referer','$comp_uidX','$version_uidX')"))
		   {
			     if(mysqli_query($con,"insert into `$mycouplereqsentuid` (name,uid,browser,ip_address,referer,comp_uid,version_uid) values ('$pname','$coupleuid','$browser','$ip','$referer','$comp_uidX','$version_uidX')"))
		        {
			         if(mysqli_query($con,"insert into `$couple_noti_uid` (notification,notification_id,from_person,priority,linkofinfo) values ('$notification_msg','$notification_uid','$myuid','1','$linkofinfo')"))
		             {     
	                         echo "<p style='color:green'>Request Sent <i class='glyphicon glyphicon-ok'></i><br>You can submit your video in this competition only if ".$pname." will accept your couple request. </p>";
		             }
				     else
			        {
			           echo "<b style='color:red'>Something went wrong, Please refresh and try again (error code: 1)</b>";
		            }
				}
				 else
			    {
			           echo "<b style='color:red'>Something went wrong, Please refresh and try again (error code: 2)</b>";
		        }
		   }
		   else
		   {
			 echo "<b style='color:red'>Something went wrong, Please refresh and try again (error code: 3)</b>";
			 
		   }
}
else{
	 echo "<b style='color:red'>You have already sent couple request to this person (error code : 4)</b>";
}

}
else{
	echo "Direct entry in this page is not allowed please visit <a href='http://nightbird.in'>Home page</a>( error code : 6 )";
}
		

?>