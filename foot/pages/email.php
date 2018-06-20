  <?php
 require_once("session.php");
  if(!isset($_SESSION['adminaccesspaglu']))
  {
	  header("location: http://nightbird.in");
  }
  else{
	  
  
  if(isset($_POST['submitreg']))
  {
	  require_once("welcome.php");
	  $tablename=mysqli_real_escape_string($con,$_POST['tablename']);
	  $sql=mysqli_query($con,"select name,email,uid,id from `$tablename`");
	  if(mysqli_num_rows($sql)>0)
	  {
		  
		  while($row=mysqli_fetch_assoc($sql))
		  {
			  $emailX=$row['email']; 
			  $nameX=$row['name']; 
	
			$subject=mysqli_real_escape_string($con,$_POST['subject']);
			
			$from=mysqli_real_escape_string($con,$_POST['from']);
			$msg=mysqli_real_escape_string($con,$_POST['message']);

	                   $random_password=str_shuffle("1234567890");
                     
                             $to   = $emailX;
                            
                             $headers = "From:NightBird \r\n";
                             $headers .= "CC: $from \r\n";
                             $headers .= 'MIME-Version: 1.0' . "\r\n";
                             $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
                             $message = '<html><body>';
 
                             $message .= '<table width="100%"; rules="all"  cellpadding="10"border="0">';
 
                             $message .= "<tr><td><img src='http://nightbird.in/img/nightlogo.png' height='100px'alt='NightBird' /></td></tr>";
 
                             $message .= "<tr><td colspan=2>".$msg."</td></tr>";
 
                            
                                  $message .= "</table>";
 
                             $message .= "</body></html>";
	                        
                             $ip_address = $_SERVER['REMOTE_ADDR'];
                             $browser = $_SERVER['HTTP_USER_AGENT'];	
                             date_default_timezone_set('Asia/Calcutta');
                             $sign_up_time=date("h:i a");
                             $sign_up_year= date('Y');
                             $sign_up_month= date('m');
                             $sign_up_day= date('d');
		                     if(mail($to, $subject, $message, $headers))
							 {
								 echo "<center><p>Message Sent to $nameX</p></center>";
							 }
							 else
							 {
								 echo "<center><p>Sending Failed ($nameX)</p></center>";
							 }
		  }
	  }
	  
  }
 if(isset($_POST['submit']))
 {
			require_once("welcome.php");
		    $emailX=mysqli_real_escape_string($con,$_POST['to']); 
	
	       $subject=mysqli_real_escape_string($con,$_POST['subject']);
	       $from=mysqli_real_escape_string($con,$_POST['from']);
	       $msg=mysqli_real_escape_string($con,$_POST['message']);

	                   $random_password=str_shuffle("1234567890");
                     
                             $to   = $emailX;
                            
                             $headers = "From:NightBird \r\n";
                             $headers .= "CC: $from \r\n";
                             $headers .= 'MIME-Version: 1.0' . "\r\n";
                             $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
                             $message = '<html><body>';
 
                             $message .= '<table width="100%"; rules="all"  cellpadding="10"border="0">';
 
                             $message .= "<tr><td><img src='http://nightbird.in/img/nightlogo.png' height='100px'alt='NightBird' /></td></tr>";
 
                             $message .= "<tr><td colspan=2>".$msg."</td></tr>";
 
                            
                                  $message .= "</table>";
 
                             $message .= "</body></html>";
	                        
                             $ip_address = $_SERVER['REMOTE_ADDR'];
                             $browser = $_SERVER['HTTP_USER_AGENT'];	
                             date_default_timezone_set('Asia/Calcutta');
                             $sign_up_time=date("h:i a");
                             $sign_up_year= date('Y');
                             $sign_up_month= date('m');
                             $sign_up_day= date('d');
		                     if(mail($to, $subject, $message, $headers))
							 {
								 echo "<center><p>Message Sent</p></center>";
							 }
							 else
							 {
								 echo "<center><p>Sending Failed</p></center>";
							 }
 }
 	?>		                      
	<a href="member.php"><button>Members</button></a>
	<a href="contact.php"><button>Message</button></a>
	<a href="vis.php"><button>Visitor</button></a>
	<a href="gate1.php"><button>Gate</button></a>
	<a href="email.php"><button>Email</button></a>
	<center>
	<fieldset>
	<legend>To One person</legend>
	<form action=""method="post">
		<input type="text"name="to"placeholder="to"/>
		<input type="text"name="subject"placeholder="subject"/>
		<select name="from">
		<option value="noreply@nightbird">noreply@nightbird</option>
		<option value="support@nightbird.in">support@nightbird.in</option>
		<option value="info@nightbird.in">info@nightbird.in</option>
		<option value="help@nightbird.in">help@nightbird.in</option>
		</select>
		<textarea rows="5"cols="20"name="message"placeholder="message"/></textarea>
		<input type="submit"name="submit"/>
	</form>
	</fieldset>
	
	<fieldset>
	<legend>From DataBase</legend>
	<form action=""method="post">
		
		<input type="text"name="subject"placeholder="subject"/>
		<input type="text"name="tablename"placeholder="TableName"/>
		<select name="from">
		<option value="noreply@nightbird">noreply@nightbird</option>
		<option value="support@nightbird.in">support@nightbird.in</option>
		<option value="info@nightbird.in">info@nightbird.in</option>
		<option value="help@nightbird.in">help@nightbird.in</option>
		</select>
		<textarea rows="5"cols="20"name="message"placeholder="message"/></textarea>
		<input type="submit"name="submitreg"/>
	</form>
	</fieldset>
	</div>
	</center>
  <?php } ?>