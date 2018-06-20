<?php
session_start();
//chacked security k1
if(isset($_POST['newemail']))
{ 
require_once("welcome.php");
/* Come From Form by Post Method */

$emailX=mysqli_real_escape_string($con,$_POST['newemail']);
$emailX=htmlspecialchars($emailX, ENT_QUOTES, 'UTF-8');



		    if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($emailX))))
	        {

				         
                        
			                 $chkmember=mysqli_query($con,"select name from allmember where email='$emailX'");
			                    if(mysqli_num_rows($chkmember)==0)
			                    {
									$_SESSION['newemail']=$emailX;

											echo "1";
							 
								
											
								}
								else{
									unset($_SESSION['newemail']); 
									echo "Someone already exist with this email, If this is your email then <a href='verify-my-email.php'>click here</a>";
								}
			}
			else{
				unset($_SESSION['newemail']); 
				echo "Invalid Email Id";
			}
}
else{
	unset($_SESSION['newemail']); 
	echo "go to <a href='http://nightbird.in'>Night Bird</a>";
}
					