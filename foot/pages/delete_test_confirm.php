<?php
require_once("session.php");
if(isset($_POST['id']))
{
	
	$id=mysqli_real_escape_string($con,$_POST['id']);
	$question="question_".$id;
	$que_ans="que_ans_".$id;
	if(mysqli_query($con,"DELETE FROM `all_test` where uid ='$id'"))
	{
		if(mysqli_query($con,"DROP TABLE IF EXISTS `$question`,`$que_ans`"))
		{
			echo "Removed related data";
		}
		echo "Deleted test<br>";
	}
	else
	{
		echo "Not Deleted";
	}
}




?>