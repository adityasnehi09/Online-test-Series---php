<?php

include('session.php');
if(isset($_POST['area2'])){
	$notice = escape_string($_POST['area2']);

	if(empty($notice)){
		die(display_flash("Please Enter Notice"));	
	}

	$update = UPDATE('admin',array('notice' => $notice),array('id' => $_SESSION['USERID']));

	if($update){

			die(display_flash("Notice Update Successful","S"));


	}else{
		die(display_flash("Notice Update Not Successful"));

	}
}elseif(isset($_POST['notice_user1'])){
	$user_area1 = escape_string($_POST['user_area1']);
	$notice_user1 = escape_string($_POST['notice_user1']);
	if(empty($notice_user1)){
		die(display_flash("Please Enter Users"));	
	}
	if(empty($user_area1)){
		die(display_flash("Please Enter Notice"));	
	}
	$update = UPDATE('admin',array('user_area1' => $user_area1, 'notice_user1' => $notice_user1),array('id' => $_SESSION['USERID']));

	if($update){

			die(display_flash("Notice Update Successful","S"));


	}else{
		die(display_flash("Notice Update Not Successful"));

	}
}elseif(isset($_POST['notice_user2'])){
	$user_area2 = escape_string($_POST['user_area2']);
	$notice_user2 = escape_string($_POST['notice_user2']);
	if(empty($notice_user2)){
		die(display_flash("Please Enter Users"));	
	}
	if(empty($user_area2)){
		die(display_flash("Please Enter Notice"));	
	}
	$update = UPDATE('admin',array('user_area2' => $user_area2, 'notice_user2' => $notice_user2),array('id' => $_SESSION['USERID']));

	if($update){

			die(display_flash("Notice Update Successful","S"));


	}else{
		die(display_flash("Notice Update Not Successful"));

	}
}

 ?>