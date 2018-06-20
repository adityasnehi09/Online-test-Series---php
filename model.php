<?php 
//chacked security k1
?>

<div class="modal fade col-md-12" tabindex="-1" role="dialog"id="general" style="">
  <div class="modal-dialog"style="max-width:400px;">
    <div class="modal-content">
      <div class="modal-header generalheadbox "style="background-color:#213948;border-bottom:0px solid white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"style="color:white;font-weight:bold;"><span id="generalheading"></span></h3>
      </div>
      <div class="modal-body"id="generalbody"style="">
      
      </div>
      <div class="modal-footer"id="generalfoot">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php if(!isset($_SESSION['logintemp'])){?>
<div class="modal fade col-md-12" tabindex="-1" role="dialog"id="loginformbox" >
  <div class="modal-dialog"style="max-width:400px;">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#213948;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"style="color:white;font-weight:bold;">&times;</span></button>
        <h3 class="modal-title"style="color:white;font-weight:bold;"><span>Login Form</span></h3>
      </div>
      <div class="modal-body">
	  <?php 
	  if(basename($_SERVER['PHP_SELF'])!='login.php'){
		  $ref=basename($_SERVER['PHP_SELF']);
	  }
	  ?>
      <form action="login.php<?php if(isset($ref)){echo '?ref='.$ref;}?>"method="post">
            <p>Login with <?php include("account/google/button.php");?></p>
                <input type="text" class="form-control" placeholder="Email" name="loginid" id="loginid"required>
              <br>
			 
                <input type="password" class="form-control" placeholder="Password" name="loginpassword" id="loginpassword"required>
            
             
<center><button class="btn btn-default btn-primary comp" name="loginsubmit"type="submit"style="width:100%">Login</button></center>
               <div style="margin-top:10px;">
			   <a style="float:right"href="#signupbox"role="button" data-toggle="modal"data-dismiss="modal" aria-label="Close">Create an account</a>
			   <a style="float:left"href="#forgetpassword"role="button" data-toggle="modal"data-dismiss="modal" aria-label="Close">forget password?</a>
             </div>
			  <br>
          </form>

      </div>
      <div class="modal-footer"id="generalfoot">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>

<div class="modal fade" id="generalalert" tabindex="-1" role="dialog" aria-labelledby="generalalertheading">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#213948;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="generalalertheading"style="font-weight:bold;color:white;">Enter Email id of your Partner</h4>
      </div>
      <div class="modal-body"id="generalalertbody">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Partner Email Id</label>
            <input type="email" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer"id="generalalertfoot">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Next</button>
      </div>
    </div>
  </div>
</div>
 <div id="generalempty" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header generalheadboxempty ">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body"id="generalbodyempty">
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>

  	<?php if(!isset($_SESSION['logintemp'])){ ?>
<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Login</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block"action="login.php"method="post"role="form">
            <div class="form-group">
              <input type="text" class="form-control input-lg"name="loginid" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="loginpassword"placeholder="Password">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="loginsubmit"value="Sign In"/>
              <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<?php } ?>
<?php if(isset($_SESSION['logintemp'])){ ?>
<!--Email verification first time -->
<div id="emailVerification" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="emailconformationheading"><br>Email Verification</h2>
      </div>
      <div class="modal-body">
	  <div id="conformationemail_body">
          <form class="form col-md-12 center-block"id="conformemailform">
            <div class="form-group">
            <center>Email :  <span id="emailgoingtoverify1"><?php echo $_SESSION['emailX'];?></span></center>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"style="margin-bottom:10px;"name="loginsubmit"value="Verify"onclick="conformmyemail()"/>
            <span><a href="#"onclick="changemyemail()">Change Email</a></span>
            </div>
          </form>
		  <form class="form col-md-12 center-block"id="verifyinputbutton"style="display:none;">
            <div class="form-group">
           <input type="text"name="verificationcode"id="verificationcode"class="form-control input-lg"placeholder="Enter confirmation code">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="submitverificationcode"style="margin-bottom:10px;"value="Submit"id="submitverificationcode"/>
            <span><a href="#"onclick="resendemail()">Resend</a></span>
            </div>
          </form>
		  </div>
		  <center><p id="messageinconformationemail"></p></center>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<?php } ?>
<!--forget password-->
<div id="forgetpassword" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog"style="max-width:400px;">
  <div class="modal-content">
      <div class="modal-header"style="background-color:#213948;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="text-center"style="font-weight:bold;color:white;"><span id="Forgotten">Forgotten password?</span></h3>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block"action="login.php"method="post"role="form"id="forget1">
            <div class="form-group">
              <input type="email" class="form-control input-lg"id="emailgoingtoverify" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="loginsubmit"id="forgetpasswordsubmit"style="margin-bottom:10px;"value="Next"/>
              <span><a href="#signupbox" role="button" data-toggle="modal"data-dismiss="modal" aria-hidden="true">Register</a></span>
            </div>
          </form>
		  					 <p id="msgofconform"></p>
		             <form class="form col-md-12 center-block"style="display:none;"id="forget2">
            <div class="form-group">
           <input type="text"name="emailverificationcode"id="verificationcode"class="form-control input-lg"placeholder="Enter verification code">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="submitconformation2"style="margin-bottom:10px;"value="Submit"id="submitconformation2"/>
            <span><a href="#"id="resendverificationcode">Resend</a></span>
			<center><p id="messageinconformationemail"></p></center>
            </div>
          </form>
		   <form class="form col-md-12 center-block"style="display:none;"id="forget3">
            <div class="form-group">
           <input type="password"id="createpass1"class="form-control input-lg"placeholder="Create Password">
            </div>
			 <div class="form-group">
           <input type="password"id="createpass2"class="form-control input-lg"placeholder="confirm Password">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"value="Submit"id="submitnewpassword"/>
            </div>
          </form>
		  <p id="forgetmessagemodal"></p>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<!--Sign Up modal-->
<?php if(!isset($_SESSION['logintemp'])){?>
<div class="modal fade col-md-12" tabindex="-1" role="dialog"id="signupbox" >
  <div class="modal-dialog"style="max-width:400px;">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#213948;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"style="color:white;font-weight:bold;">&times;</span></button>
        <h3 class="modal-title"style="color:white;font-weight:bold;"><span>Sign Up</span></h3>
      </div>
      <div class="modal-body">
     <form class="form"role="form"action="verify.php"method="post"id="submitForm">
	  <p>Sign Up with <?php include("account/google/button.php");?></p>
            <div class="form-group">
              <label for="username">Name</label><input type="text" class="form-control input-lg"name="username"id="username" placeholder="Your Name"required>
            </div>
			<div class="form-group">
            <label for="useremail">Email</label><input type="email" class="form-control input-lg"name="useremail"id="useremail" placeholder="Email"required>
            </div>
						<div class="form-group">
             <label for="usermobile_no">Mobile Number</label><input type="number" class="form-control input-lg"name="usermobile_no" id="usermobile_no"placeholder="Mobile Number"required>
            </div>
			<div class="form-group">
              <label for="userpassword">Create Password</label><input type="password" class="form-control input-lg"name="userpassword" placeholder="Create Password"id="userpassword"required>
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
            		<label for="usergender"> Gender </label> &nbsp;&nbsp;&nbsp;<label for="usermale"> Male</label> <input type="radio" value="male" name="usergender" id="usermale" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label for="userfemale">Female</label> <input type="radio" value="female" name="usergender" id="userfemale"required>
            </div>
			 <div class="form-group">
<input type="checkbox" id="checkbocterms" name="loginpassword"required> <label for="checkbocterms"> I accept all the <a href="terms.php"target="_blank">terms and condition </label></a>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="sign_submit"value="Sign Up"id="signupsubmit"/>
            </div>
			<a style="float:right"href="#loginformbox"role="button" data-toggle="modal"data-dismiss="modal" aria-label="Close">Already an account? Login</a>
    
          </form>
		  </div>
		    <h4 id="msg"></h4>

       
      <div class="modal-footer"id="generalfoot">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
	   </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->



<?php } ?>


















<!--Contact modal-->
<div id="contact" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="contactheader"><br>Contact Form</h2>
      </div>
      <div class="modal-body">
	  <div id="signupboxdata">
          <form class="form col-md-12 center-block"role="form"id="contactform">
            <div class="form-group">
              <label for="username">Name</label><input type="text" class="form-control input-lg"name="username"id="contactname" placeholder="Your Name"required>
            </div>
			<div class="form-group">
            <label for="useremail">Email</label><input type="email" class="form-control input-lg"name="useremail"id="contactemail" placeholder="Email"required>
            </div>
						<div class="form-group">
             <label for="usermobile_no">Mobile Number</label><input type="number" class="form-control input-lg"name="usermobile_no" id="contactmobile_no"placeholder="Mobile Number"required>
            </div>
									<div class="form-group">
             <label for="usermobile_no">Message</label><textarea class="form-control input-lg" id="contactmessage"placeholder="Write Your Message Here"required></textarea>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="sign_submit"value="Submit"id="contactsubmit"/>
            </div>
          </form>
		  </div>
		    <h4 id="signuploading"></h4>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>


