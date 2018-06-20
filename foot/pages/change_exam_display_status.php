<?php
require_once("session.php");
require_once("../../welcome.php");
if(isset($_REQUEST['action']))
{
	if(isset($_REQUEST['id']))
	{
				$id= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
		$action= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['action']), ENT_QUOTES, 'UTF-8');
		if($action=='1' || $action=='0')
		{
	if($action=='1')
			{
				if(mysqli_query($con,"update all_test set exam_for_display='1' where uid='$id'"))
				{
					header("location: exam_control.php?status=Exam_Display_Approved");
				}
			}
			else{
				if(mysqli_query($con,"update all_test set exam_for_display='0' where uid='$id'"))
				{
					header("location: exam_control.php?status=Exam_Display_stopped");
				}
			}
}
			}
		}
?>