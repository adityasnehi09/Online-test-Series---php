<?php
require_once("../../welcome.php");
if(isset($_REQUEST['id_of_user']) && isset($_REQUEST['id_of_test'])){
	$id_of_user=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id_of_user']), ENT_QUOTES, 'UTF-8');
	$id_of_test=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id_of_test']), ENT_QUOTES, 'UTF-8');
	 $id="question_".$id_of_test;
$que_ans_list="que_ans_".$id_of_test;
if(mysqli_query($con,"delete * from `$que_ans_list` where user_id='$id_of_user'")){
	echo "Done";
}else{
	echo mysqli_error($con);
}
}
?>