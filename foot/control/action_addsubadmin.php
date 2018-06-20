<?php

include('session.php');


$fname = escape_string($_POST['fname']); 
$username = escape_string($_POST['username']);
$password = escape_string($_POST['password']);
$email = escape_string($_POST['email']);
$contact = escape_string($_POST['contact']); 
$billing = escape_string($_POST['billing']);
$zip = escape_string($_POST['zip']);


if(empty($fname)){
	die(display_flash("Enter Full Name"));	
}
 

if(empty($username)){
	die(display_flash("Enter Username"));	
}


$count = mysql_num_rows(Query("SELECT * FROM `subadmin` WHERE `username`='$username'"));

if($count > 0){
	die(display_flash("This Username Already exists"));
}

if(empty($password)){
	die(display_flash("Enter Password"));	
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
     die(display_flash("Please Enter Valid Email"));
}


$email_count = mysql_num_rows(Query("SELECT * FROM `subadmin` WHERE `email`='$email'"));

if($email_count > 0){
	die(display_flash("This E-mail Already exists"));
}


if(empty($contact)){
	die(display_flash("Enter Contact Number"));	
}


if(!ctype_digit($contact)){
	die(display_flash("Enter Valid Contact Number"));	
}


if(empty($billing)){
	die(display_flash("Enter Billing Address"));	
}

if(empty($zip)){
	die(display_flash("Enter ZIP/Postal Code"));	
}



 
$dataarray = array(

	'fullname' 	=> $fname,  
	'username' 	=> $username, 
	'password' 	=> $password, 
	'contact' 	=> $contact, 
	'email' 	=> $email,  
	'signup' 	=> date("Y-m-d H:i:s"),
	'billing' 	=> $billing,
	'zip' 		=> $zip,	
);
 
$insett = INSERT('subadmin',$dataarray);

if($insett){
	
	$message = "Dear <b>$fname</b>, <br/><br/>
						<font color='green' size='4'><u>Your Account Successfully Created</u></font><br/><br/> 
							<b>Your Login Information </b><br/> <br/> 
							Username : $username <br/>
							Password : $password <br/><br/> 
							Login URL : ".$_SERVER['SERVER_NAME']."/subadmin <br/><br/> 
							<b>Best Regards</b><br/>BDCard International Prepaid Services";
			 
			$x = sendmail($email,'Account Registation Successful',$message);
	
	
	die(display_flash("Subadmin Added Successful","S"));
}else{
	die(display_flash("Subadmin Added Not Successful"));
}




 ?>