<?php 

include('session.php');

 $amount 	= escape_string($_POST['amount']);
 $day 	= escape_string($_POST['day']);
 $list 		= escape_string($_POST['number']); 
 
 
if(empty($amount)){
	die(display_flash("Please Enter Amount"));	
}


if(!is_numeric($amount)){
	die(display_flash("Please Enter Correct Amount"));	
} 

if(empty($day)){
	die(display_flash("Please Enter Validity"));
}


if(empty($list)){
	die(display_flash("Please Enter Number of PIN"));
}

$pinlist = array();
$i=1;

for($i;$i<=$list;$i++){
 
	$number = randomNumber(16);
	$incnum = encrypt_decrypt('encrypt', $number); 
	 
	if(pincheckall($incnum) == false){
		$pinlist[$number] = $incnum;
		}
	 
	}
	
	
foreach($pinlist as $k => $v){
	$tomorrow = date('Y-m-d',strtotime(date("Y-m-d") . "+".$day." days"));
	$data = array(
		 'pin' => $v, 
		 'amount' => $amount, 
		 'create_date' => date('Y-m-d'), 
		 'expire_date' => $tomorrow, 
		 'status' => 'P',
	         'createby' => 'Admin',
	 ) ;
	 
	 $d = INSERT('pin',$data);
	 
}

 if($d){
	 echo "<ul>";
	 foreach($pinlist as $k => $s){
		echo "<li>".$k."</li>";
	 }
	 echo "</ul>";
	 die(display_flash(count($pinlist)." Pin Create Successful","S"));	 
 }else{
	 die(display_flash("Pin Create Not Successful"));
 }	
 
 
?>