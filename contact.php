 <?php
 // secure k1
 session_start();
$invalid=10;
$msgchk=4;
require_once("welcome.php");
date_default_timezone_set('Asia/Calcutta');
$timing=date("h:i a");
$year= date('Y');
$month= date('m');
$day= date('d');
	if (isset($_SERVER['HTTP_REFERER']))
	{	
       $referer=mysqli_real_escape_string($con,$_SERVER['HTTP_REFERER']);
	}
    else
    {
	   $referer="Direct at InfoTufan";
    }

    $ip = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
    $browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);
    if(isset($_POST['submitcontact']))
    {
	 	  $name=mysqli_real_escape_string($con,$_POST['name']);
		  $name=htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
	      $email=mysqli_real_escape_string($con,$_POST['email']);
		  $email=htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	      $mobile_no=mysqli_real_escape_string($con,$_POST['mobile_no']);
		  $mobile_no=htmlspecialchars($mobile_no, ENT_QUOTES, 'UTF-8');
	      $message=mysqli_real_escape_string($con,$_POST['message']);
		 $message=htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
	            if(preg_match('%^[A-Za-z\ ]{2,30}$%',stripslashes(trim($name))))
	           {
		
		            if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($email))))
	               {
						
		                 if(preg_match('%^[0-9]{10}$%',stripslashes(trim($mobile_no))))
	                     {

	                       include_once("welcome.php");
	                       if(mysqli_query($con,"insert into contact (name,email,mobile_no,message,ip_address,browser,day,month,year,timing,referer) values('$name','$email','$mobile_no','$message','$ip','$browser','$day','$month','$year','$timing','$referer')"))
	                       {
	                        	 $msgchk=1;
		
	                       }
	                       else{
	                        	 $msgchk=0;
								

	                       }
	 	      		     }
				        else{
		                        $invalid=3;
	                        }
			       }
			       else{
	                	$invalid=2;
	               }
	          }else{
		              $invalid=1;
	          }

    }

if(isset($_SESSION['logintemp']))
{
	 require_once("basic2.php");
     $mycrop_pic=$_SESSION['imagepic'];
     $nameX=$_SESSION['nameX'];
     $myprivacy=$_SESSION['mycrop_privacy'];
     $myid=$_SESSION['user_idX'];
     $myuid=$_SESSION['uidperson'];
}
?>
<?php require_once("start_html_head.php"); ?>
		<title>Contact - InfoTufan</title>
	 <meta name="description" content="Contact Form of InfoTufan">
	    <meta name="keywords" content="contact form,contact Info Tufan,contact,InfoTufan, tufan,tufanindo,indo,indotufan.com,competition platform,online competition">
         	</head>
	<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=219375795142098";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <?php include_once("headertop.php");?>
    <!--main-->
			
			 <div class="">
	  <div class="container">
	  <div class="row">
    <div class="modal-content col-lg-8"style="margin-top:20px;">
      <div class="modal-header"style="background-color:#213948;">
            
					  <h3 class="modal-title"style="color:white;font-weight:bold;">Contact Us</h3>
		                      <center> 
							  <?php
								if($invalid==1)
								{
								echo "<b style='color:red'>Please Enter your Full name</b>";
								}
								else if($invalid==2){
								echo "<b style='color:red'>Please Enter valid Email Id</b>";
								}
								else if($invalid==3){
								echo "<b style='color:red'>Please Enter valid 10 digit mobile number</b>";
								}
								if($msgchk==1)
								{
								echo "<b style='color:green'>Message Successfully Sent</b>";
								}
								else if($msgchk==0)
								{
								echo "<b style='color:red'>Some error !! Try again...</b>";
								}
								?>	
							   </center>
		            <?php  
					if(isset($_GET['ref'])){ 
					echo "<center><b style='color:red'>Login first</b></center>";		
					}
					if(isset($_GET['errorPasswordOrId']))
					{ 
								echo "<center><b style='color:red'>Email and Password does not match</b></center>";		
					}
					  if(isset($_GET['UserNotExist']))
					{ 
								echo "<center><b style='color:red'>You are not registered with us,Please <a href='#signupbox' role='button' data-toggle='modal' aria-hidden='true'>Create Your Account</a></b></center>";							
					}
					?>	
					</div>
                  <div class="modal-body">
	              <div id="signupboxdata">
                 <form class="signup-form" action="" method="POST" role="form">
									<div class="form-group">
											<label for="username">Name</label>
											<input type="text" class="form-control input-lg"name="name" placeholder="Enter your Name"<?php if(isset($_SESSION['nameX'])){ ?> value="<?php echo $_SESSION['nameX']; ?>"<?php } ?> required>
									</div>
									<div class="form-group">
											<label for="useremail">Email</label>
											<input type="email" class="form-control input-lg"name="email" placeholder="Enter Email"<?php if(isset($_SESSION['emailX'])){ ?> value="<?php echo $_SESSION['emailX']; ?>"<?php } ?> required>
									</div>
									<div class="form-group">
											<label for="usermobile_no">Mobile Number</label>
											<input type="number" class="form-control input-lg" name="mobile_no"placeholder="Enter Mobile Number"<?php if(isset($_SESSION['mobile_noX'])){ ?> value="<?php echo $_SESSION['mobile_noX']; ?>"<?php } ?> required>
									</div>
									<div class="form-group">
											<label for="userpassword">Write Message</label><textarea rows="5"cols="40"class="form-control input-lg" name="message"style="resize:none;"placeholder="Write Message"required></textarea>
									</div>
									<div class="form-group">
											<input type="submit"name="submitcontact" class="btn btn-primary btn-lg btn-block form-control input-lg"value="Send">   
									</div>
								</form>
		       </div>
		
		       <h4 id="signuploading"></h4>
           </div>
           <div class="modal-footer">
              <div class="col-md-12">
		      </div>	
			
           </div>
      </div>
  
  <div class="col-lg-4"style="margin-top:20px;">
   <div class="panel panel-default">
                        <div class="panel-heading"style='background-color:#213948'>
                            <b style='color:white'>IndoTufan Contact Info</a>
                        </div>
                        <div class="panel-body">
                            <p>
					<b style='color:black'>Feel free to contact us :)</b><br>
							<b style='color:red'>Email: contact@nightbird.in</b><br>
							<b style='color:green'>Whatsapp: +91 9814916810</b><br>
							<b style='color:blue'>Like us on Facebook: <div class="fb-like" data-href="https://www.facebook.com/IndoTufan/" data-width="300" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
							
					</p>
					
                        </div>
                        <div class="panel-footer"style='color:black'>
                            <b>We are waiting for your message.</b>
                        </div>
                    </div>
  <div class="panel panel-default">
                        <div class="panel-heading"style='background-color:#213948'>
                            <b style='color:white;font-size:17px;'>Aditya Snehi</a>
                        </div>
                        <div class="panel-body">
                            <p>
							<b style='color:red'>Email: adityasnehi@nightbird.in</b><br>
							<b style='color:green'>Whatsapp: +91 9814916810</b><br>
							<b style='color:blue'>Follow him on Facebook:</b> 
						<div class="fb-follow" data-href="https://www.facebook.com/ad.snehi" data-width="300" data-layout="standard" data-size="small" data-show-faces="true"></div>	</p>
                      		
							
					</p>
					
                        </div>
                        <div class="panel-footer"style='color:black'>
                            <b>CEO of <a href="http://indotufan.com">IndoTufan</a> & <a href="http://nightbird.in">NightBird</b>
                        </div>
                    </div>
				 </div>
  </div>
  <div class="row">
  <div class="col-lg-6">	
  
		
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<br>

  </div>
 
  <div class="col-lg-6">
 
  </div>
 </div>
 </div>
			
			
			
			
			
			
			
			
<br><br>

<?php include_once("footer0pad.php");  ?>
	
	</body>
</html>
	