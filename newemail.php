 <?php
 session_start();
 //chacked security k1
?> 

	
		  <form class="form col-md-12 center-block"id="verifyinputbutton">
            <div class="form-group">
           <input type="text"name="newemail"id="mynewemail"class="form-control input-lg"placeholder="New Email">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary btn-lg btn-block"name="submitverificationcode"value="Submit"onclick="submitnewemail()"/>
            <span><a href="#"onclick="backtoverifyemail()">Back</a></span>
			<center><p id="messageinconformationemail"></p></center>
            </div>
          </form>