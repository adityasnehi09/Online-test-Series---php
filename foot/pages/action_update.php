<?php
require_once("session.php");
$fname = escape_string($_POST['fname']);

$email = escape_string($_POST['email']);
$contact = escape_string($_POST['contact']);
$password = escape_string($_POST['password']);
$password = encrypt_decrypt('encrypt', $password);

$id = escape_string($_POST['id']); 

 
if(empty($fname)){
	die(display_flash("Enter First Name"));	
}

 
if(empty($password)){
	die(display_flash("Enter Password"));	
}


 

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
     die(display_flash("Please Enter Valid Email"));
}


$email_count = mysqli_num_rows(Query("SELECT * FROM `allmember` WHERE `email`='$email' and `id` !='$id'"));

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

	'name' 	=> $fname, 
	'mobile_no' 	=> $contact, 
	'email' 	=> $email,
	'passwordX' 	=> $password,
        
	 
);
 
$insett = UPDATE('allmember',$dataarray,array('id'=>$id));

if($insett){
	die(display_flash("Member UPDATE Successful","S"));
}else{
	die(display_flash("Member UPDATE Not Successful"));
}




 ?>