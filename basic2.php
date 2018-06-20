<?php

if(isset($_SESSION['logintemp']))
{
	$emailX=$_SESSION['logintemp'];
	require_once("welcome.php");
	$rr=mysqli_query($con,"select * from allmember where email='$emailX'");
if(mysqli_num_rows($rr)>0)
{
	while($row=mysqli_fetch_assoc($rr))
	{
		$_SESSION['nameX']=$row['name'];
		$_SESSION['mycrop_privacy']=$row['privacy']; //
		$_SESSION['user_idX']=$row['id'];
		$_SESSION['emailX']=$row['email'];
		$_SESSION['mobile_noX']=$row['mobile_no'];
		$_SESSION['fee_status']=$row['fee_status'];
		$_SESSION['conform_email']=$row['conform_email'];
		$_SESSION['conform_mobile_no']=$row['conform_mobile_no'];
		$_SESSION['imagepic']=$row['crop_pic']; //
		$_SESSION['crop_pic']=$row['crop_pic']; //
		
		$_SESSION['uidperson']=$row['uid'];
		$_SESSION['myfullimage']=$row['image']; //
		$_SESSION['image']=$row['image']; //
		
		
		
		
		
		
		$nameX=$row['name'];
		$mycrop_privacy=$row['privacy']; //
		$user_idX=$row['id'];
		$emailX=$row['email'];
		$mobile_noX=$row['mobile_no'];
		$fee_status=$row['fee_status'];
		$conform_email=$row['conform_email'];
		$conform_mobile_no=$row['conform_mobile_no'];
		$imagepic=$row['crop_pic']; //
		$crop_pic=$row['crop_pic']; //
		
		$uidperson=$row['uid'];
		$myfullimage=$row['image']; //
		$image=$row['image']; //
		
	}
}
}

?>