<?php require_once("session.php"); ?> 
 <!--Join free modal-->
  
  
  <div id="joinfree" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Join</h2>
		
      </div>
      <div class="modal-body">
	  <?php
require_once("welcome.php");
	$sql=mysqli_query($con,"select name from singing_june where email='$emailX'");
	$countsinging=mysqli_num_rows($sql);
	$sql=mysqli_query($con,"select name from dance_june where email='$emailX'");
	$countdance=mysqli_num_rows($sql);
	$sql=mysqli_query($con,"select name from acting_june where email='$emailX'");
	$countacting=mysqli_num_rows($sql);
	$sql=mysqli_query($con,"select name from voice_june where email='$emailX'");
	$countvoice=mysqli_num_rows($sql);
	?>
         <table style="width:100%;">
		 <tr><td>Dance Competition</td><td><?php if($countdance==0){ ?><form action="video.php"method="post"><input type="submit"name="dancejoinfree"class="btn btn-fill btn-margin-right"value="Join Now"></form><?php } else { ?> <input type="button"class="btn btn-fill btn-margin-right"value="Joined"><?php } ?></td></tr>
		 <tr><td>Acting Competition</td><td><?php if($countacting==0){ ?><form action="video.php"method="post"><input type="submit"name="actingjoinfree"class="btn btn-fill btn-margin-right"value="Join Now"></form><?php } else { ?> <input type="button"class="btn btn-fill btn-margin-right"value="Joined"><?php } ?></td></tr>
		 <tr><td>Voice Competition</td><td><?php if($countvoice==0){ ?><form action="audio.php"method="post"><input type="submit"name="voicejoinfree"class="btn btn-fill btn-margin-right"value="Join Now"></form><?php } else { ?> <input type="button"class="btn btn-fill btn-margin-right"value="Joined"><?php } ?></td></tr>
		 <tr><td>Singing Competition</td><td><?php if($countsinging==0){ ?><form action="audio.php"method="post"><input type="submit"name="singingjoinfree"class="btn btn-fill  btn-margin-right"value="Join Now"></form><?php } else { ?> <input type="button"class="btn btn-fill btn-margin-right"value="Joined"><?php } ?></td></tr>
		 </table>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>

  	

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


<div id="emailVerification" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="emailconformationheading"><br>Email Verification</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block"id="conformemailform">
            <div class="form-group">
            <center>Email :  <span id="emailgoingtoverify"><?php echo $emailX;?><span><center>
            </div>
           
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="loginsubmit"value="Verify"id="conformemailbutton"/>
            <span><a href="#">Change Email</a></span>
            </div>
          </form>
		  
		  <form class="form col-md-12 center-block"id="verifyinputbutton"style="display:none;">
            <div class="form-group">
           <input type="text"name="verificationcode"id="verificationcode"class="form-control input-lg"placeholder="Enter Conformation code">
            </div>
           
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="submitverificationcode"value="Submit"id="submitverificationcode"/>
			  
            <span><a href="#">Resend</a></span>
			<center><p id="messageinconformationemail"></p><center>
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



<div id="notstarted" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="emailconformationheading"><br>Sorry ! Night Bird has started only free version right now.When the registration will started for this competition ,we will inform you on your email and mobile number</h2>
      </div>
   
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>




<div id="freeversion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="emailconformationheading"><br>Free India level Competition</h2>
      </div>
    <div class="modal-body">
	<table style="width:100%;">
	<?php
	// change per month
	$rockdance=mysqli_query($con,"select name from dance_june"); // change per month
	$rockacting=mysqli_query($con,"select name from acting_june"); // change per month
	$rockvoice=mysqli_query($con,"select name from voice_june"); // change per month
	$rocksinging=mysqli_query($con,"select name from singing_june"); // change per month
	$dance_can=mysqli_num_rows($rockdance);
	$acting_can=mysqli_num_rows($rockacting);
	$singing_can=mysqli_num_rows($rocksinging);
	$voice_can=mysqli_num_rows($rockvoice);

	?>
	<tr><th>Category</th><th>Available Seat</th><th>Total Seat</th></tr>
	<tr><td>Dance Competition </td><td><?php echo 5000-$dance_can; ?></td><td>5000</td></tr>
	<tr><td>Acting Competition </td><td><?php echo 5000-$acting_can; ?></td><td>5000</td></tr>
	<tr><td>Singing Competition </td><td><?php echo 5000-$singing_can; ?></td><td>5000</td></tr>
	<tr><td>Voice Competition </td><td><?php echo 5000-$voice_can; ?></td><td>5000</td></tr>
	</table><br>
	<center><h4>Result Date : 20 july 2016</h4></center>
       </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<!--forget password-->
<div id="forgetpassword" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br><span id="Forgotten">Forgotten password?</span></h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block"action="login.php"method="post"role="form"id="forget1">
            <div class="form-group">
              <input type="email" class="form-control input-lg"id="emailgoingtoverify" placeholder="Email">
            </div>
           
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="loginsubmit"id="forgetpasswordsubmit"value="Next"/>
              <span><a href="#signupbox" role="button" data-toggle="modal"data-dismiss="modal" aria-hidden="true">Register</a></span>
            </div>
          </form>
		  					 <p id="msgofconform"></p>
		             <form class="form col-md-12 center-block"style="display:none;"id="forget2">

            <div class="form-group">
           <input type="text"name="emailverificationcode"id="verificationcode"class="form-control input-lg"placeholder="Enter verification code">
            </div>
           
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="submitconformation2"value="Submit"id="submitconformation2"/>
			  
            <span><a href="#"id="resendverificationcode">Resend</a></span>
			<center><p id="messageinconformationemail"></p><center>
            </div>
          </form>
		   <form class="form col-md-12 center-block"style="display:none;"id="forget3">

            <div class="form-group">
           <input type="password"id="createpass1"class="form-control input-lg"placeholder="Create Password">
            </div>
			 <div class="form-group">
           <input type="password"id="createpass2"class="form-control input-lg"placeholder="Conform Password">
            </div>
           
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"value="Submit"id="submitnewpassword"/>
			  
           
            </div>
          </form>
		  
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>





<!--Sign Up modal-->
<div id="signupbox" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Sign Up</h2>
      </div>
      <div class="modal-body">
	  <div id="signupboxdata">
          <form class="form col-md-12 center-block"role="form"action="verify.php"method="post">
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
			  <input type="date" class="form-control input-lg"name="userdob" required>
              
            </div>

			  <div class="form-group">

            						  <label for="usergender"> Gender </label> &nbsp;&nbsp;&nbsp; Male <input type="radio" class="" name="loginpassword"required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female <input type="radio" class="" name="loginpassword"required>
            </div>
			 <div class="form-group">
<input type="checkbox" id="checkbocterms" name="loginpassword"required> I accept all the <a href="terms-and-condition"target="_blank">terms and condition </a>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="sign_submit"value="Sign In"id="signupsubmit"/>
              <span><a href="#">Need help?</a></span>
            </div>
          </form>
		  </div>
		    <h4 id="signuploading"></h4>
      </div>
	  
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
  

  
</div>


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



<!--Rules-->
<div id="rules" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Rules</h2>
      </div>
      <div class="modal-body">
	<h4><a href="#">For Dance Competition</a></h4>
	<h4><a href="#">For Singing Competition</a></h4>
	<h4><a href="#">For Acting Competition</a></h4>
	<h4><a href="#">For Vioce Competition</a></h4>
	
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
  

  
</div>
</div>
<!--Topper-->
<div id="topper" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Will come on july 20,2016.</h2>
      </div>
      <div class="modal-body">
	
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
  

  
</div>
</div>

<!--about modal-->
<div class="">
<div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog ">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">About</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
           
                        <p style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Night bird is organising a Dance Competition , Acting Competition and Singing Competition at All India Level. 
We, at Night Bird welcome each and every talented people across the country.
We have got limited seats for the competition and the maximum limitation for the number of participants is 1000 for each competition.</p>

<p style="text-align:justify;">The top 100 candidates will be awarded by cash prizes as follows :-<br>
1st prize - 1, 00, 000 INR<br>
2nd prize - 50, 000 INR<br>
3rd prize - 25, 000 INR<br>
Candidates from position 4th to 10th will be rewarded with a cash prize of 10, 000 INR<br>
candidates from 11th to 100th will receive a reward of 5, 000 INR</p>
<p style="text-align:justify;">
For participation in our the competition you have to pay a sum of ₹1500 for each competition in which you wish to participate.<br>
After the final enrollment we provide you some additional features <br>
(1) A live performance on public stage.<br>
(2) A chance to represent yourself in Albums.</br>

We try to provide the best stage and most favourable opportunities to all those talented hearts who have a potential to do big, but they lag behind due to some reasons.

Note:- Valid only in India.
You can make payments in
online mode only.
Then you have two option <br>
(1): You have to pay 1500 INR for each participation <br>
(2): You can participate free of cost if any 2 member participate through your Unique URL.(<a href="#">click here</a> to generate your Unique URL)
						</p>       </div>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div>
</div>
</div>