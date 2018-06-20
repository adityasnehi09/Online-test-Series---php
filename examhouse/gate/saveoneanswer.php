<?php
require_once("../../gate/session.php");
require_once("../../welcome.php");
$q_no=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['q_no']), ENT_QUOTES, 'UTF-8');
$value=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['value']), ENT_QUOTES, 'UTF-8');
$uid=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['examid']), ENT_QUOTES, 'UTF-8');
$que_ans="que_ans_".$uid;
$user_gate_uid="gate_user_".$uid;
$question_no = "que_no_".$q_no;
$user_id=$_SESSION['user_idX'];

if(mysqli_query($con,"update `$que_ans` set $question_no='$value' where user_id='$user_id'"))
{
	if($value=='-1')
	{
		echo "Erased";
	}
	else{
		echo "<span style='color:green'>Option ".$value." Saved</span>";
	}
	
}
else
{
	echo "Error";
}
?>