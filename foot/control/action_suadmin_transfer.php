<?php 

include('session.php');

 $username 	= escape_string($_POST['username']);
 $amount 	= escape_string($_POST['amount']);
 $type 		= escape_string($_POST['type']);
 $note 		= escape_string($_POST['note']);


if(empty($username)){
	die(display_flash("Please Enter Username"));	
}

$count = mysql_num_rows(Query("SELECT * FROM `subadmin` WHERE `username`='$username'"));

if($count < 1){
	die(display_flash("This Username Not Found!"));
}

if(empty($amount)){
	die(display_flash("Please Enter Amount"));	
}
 

if(!ctype_digit($amount)){
	die(display_flash("Please Enter Correct Amount"));	
} 

switch ($type) { 

	case 'R': 
		break;
		
	case 'A':  
		break;  
		
	 default: 
	 	die(display_flash("Please Select Balance Type"));
	  	break;
	  
	 } 
	   

if(empty($note)){
	die(display_flash("Please Enter Transfer note"));	
}

$userbalance = admin_info(profileIDs($username), 'balance');
if($type == "A"){
	$newbalance = $userbalance + $amount;
	$mx = "Added";
}else{
	$newbalance = $userbalance - $amount;
	
	if($newbalance < 0){
		die(display_flash("Account Balance Low."));		
	}
	
	$mx = "Removed";
	
}


$update = UPDATE('subadmin',array('balance' => $newbalance),array('id'=>profileIDs($username)));

if($update){
		 
		$data = array(
			
			'uid' 		=> profileIDs($username), 
			'amount' 	=> $amount, 
			'message' 	=> $note, 
			'type'		=> $type, 
			'time'		=> date("Y-m-d H:i:s"), 
		
		);
		
		
		$insert = INSERT('balance_transfers',$data);
		
		if($insert){
				die(display_flash("Balance $mx Successful","S"));
		}else{
			die(display_flash("Balance Transfer Not Successful"));
		}
		
}else{
	
	die(display_flash("Balance Transfer Not Successful"));	
}







?>