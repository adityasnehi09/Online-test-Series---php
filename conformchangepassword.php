<?php
session_start();
require_once("loginrequired.php");
if(isset($_SESSION['emailX']))
{
	$emailX=$_SESSION['emailX'];
	require_once("welcome.php");
	require_once("imp/function.php");
	$currentpass=securedata($_POST['oldpass']);
	$newpass1=securedata($_POST['pass1']);
	$newpass2=securedata($_POST['pass2']);
	
	if(strlen($newpass1)>6)
	{
		if($newpass1==$newpass2)
		{
			$sq=mysqli_query($con,"select passwordX from allmember where email='$emailX'");
			if(mysqli_num_rows($sq)>0)
			{
				
				while($ro=mysqli_fetch_assoc($sq))
				{
				$newpass1= encrypt_decrypt('encrypt', $newpass1);
				$currentpass= encrypt_decrypt('encrypt', $currentpass);


					if($currentpass==$ro['passwordX'])
					{
						if(mysqli_query($con,"update allmember set passwordX='$newpass1' where email='$emailX'"))
						{
							echo "Password Changed successfully";
						}
						else{
							echo "Something went wrong";
						}
					}
					else{
						echo "Invalid Current password";
						
					}
				}
			}
			else
			{
				echo "Something Went Wrong";
			}
		}
		else
		{
			echo "Please Enter same password in order to confirm";	
		}
	}
	else
	{
		echo "Password must be greater then 6 character";
	}	
}
else
{
	echo "Session Expired";
}

?>