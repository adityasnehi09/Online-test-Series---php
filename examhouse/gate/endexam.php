<?php
	require_once("../../gate/session.php");
	require_once("../../welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_".$examid;
	$myid=$_SESSION['user_idX'];
	
	if(mysqli_query($con,"update `$que_ans_list` set exam_end_status='1' where user_id='$myid'"))
	{
		echo "Exam Ended";
	}

?>