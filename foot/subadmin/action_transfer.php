<?php 

include('session.php');

 $username 	= escape_string($_POST['username']);
 $amount 	= escape_string($_POST['amount']);
 $type 		= escape_string($_POST['type']);
 $note 		= escape_string($_POST['note']);


if(empty($username)){
	die(display_flash("Please Enter Username"));	
}

$count = mysql_num_rows(Query("SELECT * FROM `member` WHERE `username`='$username'"));

if($count < 1){
	die(display_flash("This Username Not Found!"));
}

if(empty($amount)){
	die(display_flash("Please Enter Amount"));	
}


if(!is_numeric($amount)){
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
	   
	   
	

if($type == "A"){
	 
	 if(admin_info($_SESSION['USERID'],'balance') < $amount ){		 
		 die(display_flash("Your Account Balance Low!"));
	 }else{
		UPDATE('subadmin',array('balance' => (admin_info($_SESSION['USERID'],'balance') - $amount)),array('id'=>$_SESSION['USERID'])); 
	 }
	 
	 
}	   
	   
	   
if(empty($note)){
	die(display_flash("Please Enter Transfer note"));	
}

$userbalance = profile_info(profileID($username), 'balance');
if($type == "A"){
	$newbalance = $userbalance + $amount;
	$mx = "Added";
}else{
	$newbalance = $userbalance - $amount;
 
	
	$mx = "Removed";
	
}


$update = UPDATE('member',array('balance' => $newbalance),array('id'=>profileID($username)));

if($update){
		 
		$data = array( 
			'uid' 		=> profileID($username), 
			'amount' 	=> $amount, 
			'message' 	=> $note, 
			'type'		=> $type, 
			'time'		=> date("Y-m-d H:i:s"),
			'addedby'   => $_SESSION['USERNAME'],
		
		);
		
		
		$insert = INSERT('balance_transfer',$data);
		
		if($insert){
				die(display_flash("Balance $mx Successful","S"));
		}else{
			die(display_flash("Balance Transfer Not Successful"));
		}
		
}else{
	
	die(display_flash("Balance Transfer Not Successful"));	
}







?>