 <?php
 //chacked security k1
 ?>
 <form class="form col-md-12 center-block"id="verifyinputbutton">
            <div class="form-group">
           <input type="text"name="verificationcode"id="verificationcode_enter"class="form-control input-lg"placeholder="Enter Conformation code">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="submitverificationcode"value="Submit"onclick="verifyconformationcode()"/>
            <span><a href="#"onclick="conformmyemail()">Resend</a></span>
			<center><p id="messageinconformationemail"></p></center>
            </div>
          </form>