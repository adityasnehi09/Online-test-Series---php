  <?php
  //chacked security k1
  session_start();
  require_once("welcome.php");
  $emailX=mysqli_real_escape_string($con,$_POST['emailgoingtoverify']);
$sql=mysqli_query($con,"select name from allmember where email='$emailX'");
if(mysqli_num_rows($sql)>0){
	while($row=mysqli_fetch_assoc($sql)){
		$nameX=$row['name'];
	}

   if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($emailX))))
	        {

	                   $random_password=str_shuffle("1234567890");
                       $conformation_code=substr($random_password,0,8);
                       $_SESSION["conformation_code"]=$conformation_code;
		  
		  
                             $to   = $emailX;
                             $headers = "From:IndoTufan \r\n";
$headers .= "CC: noreply@indotufan.com\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = '<html><body>';
$message .= '<div width="100%" style="padding:20px;font-size:15px;"><img src="http://indotufan.com/img/indotufanlogo.png" height="60px"alt="IndoTufan" /><br><br>';
$message .= '<h3>Dear '.$nameX.', </h3><p style="color:gray">Thanks for creating your account with us.<br><br>';
$message .= '<I style="font-size:18px;color:blue"><b>You may be asked to enter this verification code: '.$conformation_code.'<b></I><br><br>
Yours sincerely,<br>IndoTufan<br>www.indotufan.com<br>email : contact@indotufan.com</p>
</div>';
$message .= "</body></html>";
$subject="Verification Code : $conformation_code";
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
								echo 1;
							 }
							 else
							 {
								 echo "<span style='color:red'>Server Down! Try again...</span>";
							 }
							 
			}else{
				echo "<span style='color:red'>Enter Valid email</span>";
			}		 
}else{
	echo "<center>You are not registered please <br> <a href='#signupbox'role='button' data-toggle='modal'class='btn btn-success'style='text-decoration:none;'data-dismiss='modal' aria-hidden='true'>Create your account</a></center>";
}		 

	?>		                      