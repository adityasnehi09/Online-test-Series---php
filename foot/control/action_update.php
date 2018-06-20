<?php
include('session.php');

$fname = escape_string($_POST['fname']);
$lname = escape_string($_POST['lname']); 
$email = escape_string($_POST['email']);
$contact = escape_string($_POST['contact']);
$currency = escape_string($_POST['currency']);
$billing = escape_string($_POST['billing']);
$id = escape_string($_POST['id']); 

 
if(empty($fname)){
	die(display_flash("Enter First Name"));	
}


if(empty($lname)){
	die(display_flash("Enter Last Name"));	
}

 

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
     die(display_flash("Please Enter Valid Email"));
}


$email_count = mysql_num_rows(Query("SELECT * FROM `member` WHERE `email`='$email' and `id` !='$id'"));

if($email_count > 0){
	die(display_flash("This E-mail Already exists"));
}


if(empty($contact)){
	die(display_flash("Enter Contact Number"));	
}


if(!ctype_digit($contact)){
	die(display_flash("Enter Valid Contact Number"));	
}

if(empty($currency)){
	die(display_flash("Enter Currency Name"));	
}

if(empty($billing)){
	die(display_flash("Enter Billing Address"));	
}


$dataarray = array(

	'fname' 	=> $fname, 
	'lname' 	=> $lname,   
	'mobile' 	=> $contact, 
	'email' 	=> $email,
        'currency' 	=> strtoupper($currency),
	'billing' 	=> $billing,    
);
 
$insett = UPDATE('member',$dataarray,array('id'=>$id));

if($insett){

if(isset($_FILES)){
$insertid = $id;
$files = glob('../upload/'.$insertid.'/*');
// loop through files
foreach($files as $file){
  if(is_file($file)) {
    // delete file
    unlink($file);
  }
}


if (!file_exists('../upload/'.$insertid)) {
    mkdir('../upload/'.$insertid, 0777, true);
}

if(!empty($_FILES['file']['name'])){
 move_uploaded_file($_FILES["file"]["tmp_name"], '../upload/'.$insertid.'/'.$_FILES["file"]["name"]);
}

if(!empty($_FILES['files']['name'])){
 move_uploaded_file($_FILES["files"]["tmp_name"], '../upload/'.$insertid.'/'.$_FILES["files"]["name"]);
}

if(!empty($_FILES['filed']['name'])){
 move_uploaded_file($_FILES["filed"]["tmp_name"], '../upload/'.$insertid.'/'.$_FILES["filed"]["name"]);
}



}


	die(display_flash("Member UPDATE Successful","S"));
}else{
	die(display_flash("Member UPDATE Not Successful"));
}




 ?>