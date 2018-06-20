<?php
session_start();
require_once("welcome.php");
require_once("imp/function.php");

$getnameX=securedata($_POST['getname']);

$emailX=$_SESSION['emailX'];
$uidX=$_SESSION['uidperson'];
$user_idX=$_SESSION['user_idX'];
$fulldetail="fulldetail".$uidX;
$passwordX=securedata($_POST['password']);

$passwordX= encrypt_decrypt('encrypt', $passwordX);
if(preg_match('%^[A-Za-z\.\-\ ]{2,20}$%',stripslashes(trim($getnameX))))
{
    if(empty($passwordX))
	{
		echo "Please Enter your password";
	}
	else
	{
		$sq=mysqli_query($con,"select passwordX from allmember where email='$emailX'");
		if(mysqli_num_rows($sq)>0)
		{
			while($ro=mysqli_fetch_assoc($sq))
			{
				if($passwordX==$ro['passwordX'])
				{
					if(mysqli_query($con,"update allmember set name='$getnameX' where email='$emailX'"))
					{
						mysqli_query($con,"DELETE FROM `$uidX`");
						mysqli_query($con,"DELETE FROM `allposts` where user_id='$user_idX'");
						mysqli_query($con,"update `$fulldetail` set myincome='0'");
						echo "Your name has changed successfully";
					}
					else
					{
						
					}
				}
				else
				{
					echo "Invalid Password";
				}
			}
		}
		else{
			echo mysql_error();
		}
	}
}
else
{
	echo "Please Enter a valid name";
}



?>