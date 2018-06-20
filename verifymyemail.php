 <?php
 session_start();
 
 //chacked security k1
 if(isset($_POST['a']))
 {
	 unset($_SESSION['newemail']); 
 }
 ?>
 
 <form class="form col-md-12 center-block"id="conformemailform">
            <div class="form-group">
            <center>Email :  <span id="emailgoingtoverify1"><?php echo $_SESSION['emailX'];?></span></center>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="loginsubmit"value="Verify"onclick="conformmyemail()"/>
            <span><a href="#"onclick="changemyemail()">Change Email</a></span>
            </div>
          </form>
		 