<?php
// checked security k1
session_start();
if(isset($_SESSION['verificationcodematch']))
{
	 require_once("welcome.php");
	 require_once("imp/function.php");
	$emailX=securedata($_POST['email']);
	$createpass1=securedata($_POST['createpass1']);
	$createpass2=securedata($_POST['createpass2']);
	if($createpass1==$createpass2)
	{ 
         if(!preg_match('%^[\'\"\<\>]%',stripslashes(trim($createpass1))))
	                                {
							$createpass1= encrypt_decrypt('encrypt', $createpass1);
					
                                                if(strlen($createpass1)>6)
                                                {   
		                                            
		                                             if(mysqli_query($con,"update allmember set passwordX='$createpass1' where email='$emailX'"))
		                                              {
			                                             echo 1;
		                                              }
		                                               else
		                                              {
		                	                            echo "<h3 class='red-color'>Unknown error ! reload the page and try again </h3>";
		                                              }
					                            }
												else{
									echo "<h3 class='red-color'>Password must be greater than six character </h3>";
												}
									}else{
										echo "<h3 class='red-color'>You cannot use \" or ' or < or > </h3>";
									}					
	}else{
echo "<h3 class='red-color'>Both password must be same</h3>";

	}
}
else{
	echo "<h3 class='red-color'>Session Expired,Reload the page and try again</h3>";
}


?>