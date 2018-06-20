<?php
  //chacked security k1
session_start();
 if(isset($_SESSION['logintemp'])){ 
header("location: index.php");
}
?>
<?php require_once("start_html_head.php"); ?>
	    <meta name="description" content="Log in to IndoTufan to participate in our test series">
	    <meta name="keywords" content="Login,form,indotufan,indo tufan,indotufan.com,test,online test series,gate,jee main,jee advance,iit">	
	</head>
	<body>
<?php include_once("headertop.php");?>
     <div class="">
	  <div class="container">
	  <div class="row">
    <div class="modal-content col-lg-8"style="margin-top:20px;">
      <div class="modal-header"style="background-color:#213948;">
             <h3 class="modal-title"style="color:white;font-weight:bold;">Login Form</h2>
		            <?php  
					if(isset($_GET['ref'])){ 
					echo "<b style='color:red'>Login first</b>";		
					}
					if(isset($_GET['errorPasswordOrId']))
					{ 
								echo "<b style='color:red'>Email and Password does not match</b>";		
					}
					  if(isset($_GET['UserNotExist']))
					{ 
								echo "<b style='color:red'>You are not registered with us,Please <a href='#signupbox' role='button' data-toggle='modal' aria-hidden='true'>Create Your Account</a></b>";							
					}
					?>	
					</div>
                  <div class="modal-body">
	              <div id="signupboxdata">
                  <form class="form col-md-12 center-block"role="form"action="login.php<?php if(isset($_GET['ref'])){ echo "?ref=".$_GET['ref'];}?>"method="post">
                  <div class="form-group"><br><br>
                  <label for="name">Email</label><span class="pull-right"> <?php
							if(isset($_GET['erroremailsecurity']))
							{ 
								echo "<b style='color:red'>Please Enter valid Email Id</b></b>";
								?>
								<style>
								#loginemail{
									border :1px solid red;
								}
								</style>
								<?php
							}
							?></span><input type="text" class="form-control input-lg"name="loginid"id="loginid" placeholder="Email"required>
                </div>
			    <div class="form-group">
                <label for="email">Password</label><span class="pull-right"><?php
							if(isset($_GET['errorpasswordsecurity']))
		     				{
								echo "<b style='color:red'>You have used Invalid password/Blocked charecter</b>";
								?>
								<style>
								#loginpassword{
									border :1px solid red;
								}
								</style>
								<?php
							}
							?></span>
							<input type="password" class="form-control input-lg"name="loginpassword"id="loginpassword" placeholder="Password"required>
                        </div>			
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block"name="loginsubmit"value="Sign In"id="signupsubmit"style="margin-bottom:15px;" />
                        <span class="pull-right"><a href="#signupbox" role="button" data-toggle="modal"data-dismiss="modal" aria-hidden="true">Create an Account</a></span><span> <a href="#forgetpassword" role="button" data-toggle="modal">Need help?</a></span>
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
 
  </div>
  </div>
 </div>
 </div>
 <br><br><br>
<?php 
include_once("footer0pad.php"); 
?>
	</body>
	<html>