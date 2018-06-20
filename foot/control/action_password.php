<?php 

include('session.php');

 $old 	= escape_string($_POST['old']);
 $new 	= escape_string($_POST['new']);  
 $confirm 	= escape_string($_POST['confirm']);
 
  
if(empty($old)){
	die(display_flash("Please Enter old password"));	
}
 
if(empty($new)){
	die(display_flash("Please Enter new password"));	
}

 
if(empty($confirm)){
	die(display_flash("Please Enter confirm password"));	
} 

 
if($old != admin($_SESSION['USERID'],'password')){
	die(display_flash("old Password not match"));	
}


if($new != $confirm){
	die(display_flash("new password and confirm password not match"));
	
}  

$update = UPDATE('admin',array('password' => $confirm ),array('id' => $_SESSION['USERID']));

if($update){
	 
		die(display_flash("Password Change Successful","S"));
	 
	
}else{
	die(display_flash("Password Change Not Successful"));
	
}

?>