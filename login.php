<?php
session_start();
 //chacked security k1
require_once("welcome.php");
require_once("imp/function.php");
if(isset($_GET['ref'])){
	$fromurl=mysqli_real_escape_string($con,$_GET['ref']);
	$fromurl=htmlspecialchars($fromurl, ENT_QUOTES, 'UTF-8');
}

if(isset($_POST['loginsubmit']))
{
	$idP=$_POST['loginid'];
	$lpasswordP=$_POST['loginpassword'];
	$idP=mysqli_real_escape_string($con,$idP);
	$lpasswordP=mysqli_real_escape_string($con,$lpasswordP);
	$idP==htmlspecialchars($idP, ENT_QUOTES, 'UTF-8');
	$lpasswordP=htmlspecialchars($lpasswordP, ENT_QUOTES, 'UTF-8');
		    if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($idP))))
	        {
						
		        if(!preg_match('%^[\'\"\<\>]%',stripslashes(trim($lpasswordP))))
	            {
					
					$lpasswordP= encrypt_decrypt('encrypt', $lpasswordP);
	               
	                $sql=mysqli_query($con,"select name,email from allmember where passwordX='$lpasswordP' and email='$idP'");
	                if(mysqli_num_rows($sql)==1)
	                 {
	                    	while($row=mysqli_fetch_assoc($sql))
		                    {
			                 $_SESSION['nameX']=$row['name'];
			
                             $_SESSION['logintemp']=$row['email'];
							 if(isset($_GET['ref']))
							 {
								 header("location: ".$fromurl);
								
							 }else{
								 
							 
                             header("location: /");
							 }
                    		}
	                 }
					  else{
						  
		 $sql=mysqli_query($con,"select email from allmember where email='$idP'");
	               if(mysqli_num_rows($sql)==0)
				   {
					   if(isset($_GET['ref']))
							 {
								  header("location: loginForm.php?UserNotExist=1&ref=".$fromurl);
							 }else{
header("location: loginForm.php?UserNotExist=1");	
							 }
				   }else{
					   if(isset($_GET['ref']))
							 {
								  header("location: loginForm.php?errorPasswordOrId=1&ref=".$fromurl);
							 }else{
header("location: loginForm.php?errorPasswordOrId=1");
							 }
				   }
	                  }
				}
				
				else{
					if(isset($_GET['ref']))
							 {
								  header("location: loginForm.php?errorPasswordOrId=1&ref=".$fromurl);
							 }else{
header("location: loginForm.php?errorPasswordsecurity=1");					
				}
				}
			}
			else{
				if(isset($_GET['ref']))
							 {
								  header("location: loginForm.php?errorPasswordOrId=1&ref=".$fromurl);
							 }else{
header("location: loginForm.php?erroremailsecurity=1&ref=".$fromurl);					
				}
			}
	   
		
}

?>