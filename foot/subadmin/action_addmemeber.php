<?php

include('session.php');


$fname = escape_string($_POST['fname']);
$lname = escape_string($_POST['lname']);
$username = escape_string($_POST['username']);
$password = escape_string($_POST['password']);
$email = escape_string($_POST['email']);
$contact = escape_string($_POST['contact']);
$currency = escape_string($_POST['currency']);


if(empty($fname)){
	die(display_flash("Enter First Name"));	
}


if(empty($lname)){
	die(display_flash("Enter Last Name"));	
}


if(empty($username)){
	die(display_flash("Enter Username"));	
}


$count = mysql_num_rows(Query("SELECT * FROM `member` WHERE `username`='$username'"));

if($count > 0){
	die(display_flash("This Username Already exists"));
}

if(empty($password)){
	die(display_flash("Enter Password"));	
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
     die(display_flash("Please Enter Valid Email"));
}


$email_count = mysql_num_rows(Query("SELECT * FROM `member` WHERE `email`='$email'"));

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

$dataarray = array(

	'fname' 	=> $fname, 
	'lname' 	=> $lname, 
	'username' 	=> $username, 
	'password' 	=> $password, 
	'mobile' 	=> $contact, 
	'email' 	=> $email,  
	'signup' 	=> date("Y-m-d H:i:s"), 
	'currency' 	=> strtoupper($currency), 
);
 
$insett = INSERT('member',$dataarray);
$insertid = mysql_insert_id($conn);
if($insett){
	
	$message = "Dear <b>$fname $lname</b>, <br/><br/>
						<font color='green' size='4'>Your BDCard International Virtual Card Account has successfully been created, please click the following Login URL to login into your account. Use the Username or Customer ID provided bellow: </u></font><br/><br/> 
							<b>Your Login Information </b><br/> <br/> 
							Username : $username <br/>
							Password : $password <br/><br/> 
							Login URL : http://card71.com/ <br/><br/> 
A minimum 20 USD Recharge is required to activate your account. Currency rate is TK 81.60 per USD, pay the equivalent recharge bill of Requested Initial Recharge during card application, in TK only. Your card will be Activated once your payment is confirmed. You can pay via bKash, Bank Deposit or Cash at Office. After paying the Recharge Bill, you are required to Verify your Payment. Call our customer support for additional help, if you require.<br/><br/>

আমাদের bKash Personal Number(s) সমূহ হলোঃ 01730898444, 01730898484, 01798499973, 01798499974 <br/><br/> bKash করতে কোনো সমস্যা হলে দয়া করে 01711961533 নাম্বারে ফোন করুন। <br/><br/>

You can also pay via Bank Deposit or Cash at Office. <br/>

আমাদের ব্যাংক ডিটেলস হলো নিম্নরূপঃ <br/>
Bank Name: BRAC BANK LTD. <br/>
Account Name: BDCard International<br/>
Account Number: 1524203251998001<br/>
Branch: Elephant Road SME Branch, Dhaka<br/><br/>

টাকা পরিশোধ করার পর আপনাকে অবশ্যই www.bd-card.com থেকে Payment Verification ফর্মটি পূরণ করে পাঠাতে হবে। সাধারণত কার্ড অ্যাক্টিভেশনের জন্য আমরা ০১ থেকে ৮ ঘণ্টা সময় নিয়ে থাকি। Call 01711961533 for further help, if you need. You can also activate your account using BDCard Recharge PIN.<br/><br/> 
							<b>Best Regards</b><br/>BDCard International Prepaid Services<br/>Visit www.bd-card.com<br/>Customer Support: 01711961500, 01730898489<br/>Rahat Tower (7th Floor), Bangla Motor, Dhaka 1000";
			 
			$x = sendmail($email,'BDCard International Virtual Card Account Created',$message);
	
	

if(isset($_FILES)){

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



	die(display_flash("Member Added Successful","S"));
}else{
	die(display_flash("Member Added Not Successful"));
}




 ?>