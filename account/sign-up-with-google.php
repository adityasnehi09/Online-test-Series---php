<?php 
  //chacked security k1
if(isset($_SESSION['logintemp'])){ 
header("location: index.php");
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Sign Up - IndoTufan</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="font.css">
		<link rel="stylesheet" href="ionicons/css/ionicons.min.css"> 
		<link rel="icon" href="img/nightlogo.png" type="image/x-icon">
	    <meta name="description" content="IndoTufan Sign up form, Sign-up with IndoTufan and join our Test series.">
	    <meta name="keywords" content="indotufan,indo tufan,signup,sign-up,register,create account,test series,gate,jee main,jee advance,gate">	 

        <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/extra.css" rel="stylesheet">
	</head>
	<body>
	<?php include_once("headertop.php");?>
	<!--main-->
	
	
	
	
	
	
	  <div class="">
	  <div class="container">
	  <div class="row">
    <div class="modal-content col-lg-8"style="margin-top:20px;">
      <div class="modal-header"style="background-color:#213948;">
             <h3 class="modal-title"style="color:white;font-weight:bold;"><span>Sign Up</span></h3>
		<?php  if(isset($_GET['user_exist']))
								{ 
									echo "<center><b style='color:red'>You are already registured with us Please <a href='loginForm.php'>Login</a></b></b></center>";
								}
							?>
      </div>
      <div class="modal-body">
     <form class="form"role="form"action="verify.php"method="post"id="submitForm">
            <div class="form-group">
              <label for="username">Name</label>
			  <span class="pull-right"> <?php
										if(isset($_GET['name_error']))
										{ 
											echo "<b class='red-color'>Please Enter valid Name </b></b>";
											?>
											<style>
											#name{
												border :1px solid red;
										}
									</style>
									<?php
									}
									?></span>
			  
			  <input type="text" class="form-control input-lg"name="username"id="username" placeholder="Your Name"required>
            </div>
			<div class="form-group">
            <label for="useremail">Email</label>
			<span class="pull-right"><?php
									if(isset($_GET['email_error']))
									{
										echo "<b class='red-color'>Please Enter valid Email Id</b>";
										?>
										<style>
										#email{
											border :1px solid red;
										}
										</style>
										<?php
									}
									?></span>
			
			<input type="email" class="form-control input-lg"name="useremail"id="useremail" placeholder="Email"required>
            </div>
						<div class="form-group">
             <label for="usermobile_no">Mobile Number</label>
			 <span class="pull-right">
																			<?php
										if(isset($_GET['mobile_error']))
										{
											echo "<b class='red-color'>Please Enter valid 10 digit Mobile Number</b>";
											?>
											<style>
											#mobile_no{
												border :1px solid red;
											}
											</style>
											<?php
										}
										?></span><input type="number" class="form-control input-lg"name="usermobile_no" id="usermobile_no"placeholder="Mobile Number"required>
            </div>
			<div class="form-group">
              <label for="userpassword">Create Password</label>
			  <span class="pull-right">	 
																					<?php
								if(isset($_GET['password_error']))
								{
									echo "<b class='red-color'>Password must be greater then 6 digit</b>";
									?>
									<style>
									#password{
										border :1px solid red;
									}
									</style>
									<?php
								}
								if(isset($_GET['errorpasswordsecurity']))
								{
									echo "<b class='red-color'>Due to security you cannot use \" \' \> \< </b>";
									?>
									<style>
										#password{
											border :1px solid red;
										}
									</style>
									<?php
								}?></span><input type="password" class="form-control input-lg"name="userpassword" placeholder="Create Password"id="userpassword"required>
            </div>
			<div class="form-group">
			<label for="userdob">Date Of Birth</label>
			<div class="row">
			<div class="col-sm-4">
			<select class="form-control"name="date_dob" required>
			<option value="">Date</option>
			<?php for($x=1;$x<32;$x++){?><option value="<?php echo $x; ?>"><?php echo $x; ?></option> <?php } ?>
			</select>
			  
			</div>
					
<div class="col-sm-4">
			 <select class="form-control"name="month_dob" required>
			<option value="">Month</option>
			<?php for($x=1;$x<13;$x++){?><option value="<?php echo $x; ?>"><?php echo $x; ?></option> <?php } ?>
			</select>
			</div>
					
<div class="col-sm-4">
			<select class="form-control"name="year_dob" required>
			<option value="">Year</option>
			<?php for($x=2016;$x>1950;$x--){?><option value="<?php echo $x; ?>"><?php echo $x; ?></option> <?php } ?>
			</select>
			</div>
										
			
            </div>
            </div>
			  <div class="form-group">
            						  <label for="usergender"> Gender </label> &nbsp;&nbsp;&nbsp; Male <input type="radio" value="male" name="usergender"required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female <input type="radio" value="female" name="usergender"required>
            </div>
			 <div class="form-group">
<input type="checkbox" id="checkbocterms" name="loginpassword"required> I accept all the <a href="terms.php"target="_blank">terms and condition </a>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="sign_submit"value="Sign Up"id="signupsubmit"/>
            </div>
          </form>
	
	

						 </div>
		                <h4 id="signuploading"></h4>
                       	
<div class="modal-footer">
         	
      </div>			
</div>
<div class="col-lg-4"style="margin-top:20px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2256342899303187"
     data-ad-slot="8242106756"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2256342899303187"
     data-ad-slot="8242106756"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>	  
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
  <br>
<?php include_once("model.php"); ?>

<?php 
include_once("footer0pad.php"); 
?>
	<!-- script references -->
		<script src="js/j.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/background.css" rel="stylesheet">
			<?php include_once("google.php");	?>
	</body>
	<html>
	