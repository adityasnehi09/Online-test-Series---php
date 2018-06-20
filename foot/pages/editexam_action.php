<?php
session_start();
require_once("welcome.php");
require_once("../../imp/function.php");
if(!isset($_SESSION['adityasnehiloginyes']))
{
	 header("location: http://nightbird.in");
}
else
{
	if(isset($_POST['gate_save_submit']))
	{ 
								$exam_name=securedata($_POST['exam_name']);
								$exam_id=securedata($_POST['exam_id']);
								$exam_type=securedata($_POST['exam_type']);
								$no_of_question=securedata($_POST['no_of_question']);
								$time_limit=securedata($_POST['time_limit']);
								$total_marks=securedata($_POST['total_marks']);
								$marks_per_question=securedata($_POST['marks_per_question']);
								$negative_marks=securedata($_POST['negative_marks']);
								$streams=securedata($_POST['streams']);
								$starting_time=securedata($_POST['starting_time']);
								$starting_month=securedata($_POST['starting_month']);
								$starting_year=securedata($_POST['starting_year']);
								$starting_day=securedata($_POST['starting_day']);
								$ending_time=securedata($_POST['ending_time']);
								$ending_day=securedata($_POST['ending_day']);
								$ending_month=securedata($_POST['ending_month']);
								$ending_year=securedata($_POST['ending_year']);
								$result_time=securedata($_POST['result_time']);
								$result_day=securedata($_POST['result_day']);
								$result_month=securedata($_POST['result_month']);
								$result_year=securedata($_POST['result_year']);
								$fee=securedata($_POST['fee']);
								$description=securedata($_POST['description']);
		if (isset($_SERVER['HTTP_REFERER'])){$referer=$_SERVER['HTTP_REFERER'];	}else{$referer="Direct at Night Bird";}		
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];		
		if(mysqli_query($con, "update all_test set exam_name='$exam_name',time_limit='$time_limit',ending_day='$ending_day',ending_month='$ending_month',ending_year='$ending_year',result_day='$result_day',result_time='$result_time',result_month='$result_month',result_year='$result_year',no_of_question='$no_of_question',total_marks='$total_marks',marks_per_question='$marks_per_question',negative_marks='$negative_marks',streams='$streams',starting_time='$starting_time',fee='$fee',starting_month='$starting_month',starting_year='$starting_year',starting_day='$starting_day',ending_time='$ending_time',description='$description',exam_type='$exam_type',ip_address='$ip',browser='$browser' where uid='$exam_id'" )) 
		{
			header("location: index.php?id=$uid&status=CompetitionCreated");
		}
		else
		{
			echo "Not Inserted | ".mysqli_error($con);
		}
		}
		else
		{
			echo "No access";
		}
				}
?>