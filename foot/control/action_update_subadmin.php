<?php

include('session.php');


$fname = escape_string($_POST['fname']);  
$email = escape_string($_POST['email']);
$contact = escape_string($_POST['contact']); 
$id = escape_string($_POST['id']); 

if(empty($fname)){
	die(display_flash("Enter Full Name"));	
}
 
 

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
     die(display_flash("Please Enter Valid Email"));
}


$email_count = mysql_num_rows(Query("SELECT * FROM `subadmin` WHERE `email`='$email' and `id` !='$id'"));

if($email_count > 0){
	die(display_flash("This E-mail Already exists"));
}


if(empty($contact)){
	die(display_flash("Enter Contact Number"));	
}


if(!ctype_digit($contact)){
	die(display_flash("Enter Valid Contact Number"));	
}

 
$dataarray = array(

	'fullname' 	=> $fname,    
	'contact' 	=> $contact, 
	'email' 	=> $email,   
);
  
$insett = UPDATE('subadmin',$dataarray,array('id'=>$id));
if($insett){
	
 
	
	die(display_flash("Subadmin UPDATE Successful","S"));
}else{
	die(display_flash("Subadmin UPDATE Not Successful"));
}




 ?>