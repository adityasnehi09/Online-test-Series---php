<?php
session_start();
if(!isset($_SESSION['adityasnehiloginyes']))
{
	 header("location: http://nightbird.in");
}
else
{
	if(isset($_POST['gate_submit']))
	{ 
		require_once("welcome.php");
		
								$exam_name=$_POST['exam_name'];
								$no_of_question=$_POST['no_of_question'];
								$time_limit=$_POST['time_limit'];
								$total_marks=$_POST['total_marks'];
								$marks_per_question=$_POST['marks_per_question'];
								$negative_marks=$_POST['negative_marks'];
								$streams=$_POST['streams'];
								$starting_time=$_POST['starting_time'];
								$starting_month=$_POST['starting_month'];
								$starting_year=$_POST['starting_year'];
								$starting_day=$_POST['starting_day'];
								$ending_time=$_POST['ending_time'];
								$ending_day=$_POST['ending_day'];
								$ending_month=$_POST['ending_month'];
								$ending_year=$_POST['ending_year'];
								$result_time=$_POST['result_time'];
								$result_day=$_POST['result_day'];
								$result_month=$_POST['result_month'];
								$result_year=$_POST['result_year'];
								$fee=$_POST['fee'];
								$description=$_POST['description'];
								$opening_status=$_POST['opening_status'];
		date_default_timezone_set('Asia/Calcutta');
		$creating_timing=date("h:i a");
		$creating_year= date('Y');
		$creating_month= date('m');
		$creating_day= date('d');
		if (isset($_SERVER['HTTP_REFERER'])){$referer=$_SERVER['HTTP_REFERER'];	}else{$referer="Direct at Night Bird";}		
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];		
		if(mysql_query("insert into gate_exam (exam_name, no_of_question, time_limit, total_marks,marks_per_question,negative_marks, streams,starting_time,starting_month,starting_year,starting_day,ending_time,ending_day,ending_month,ending_year,result_day,result_month,result_year,result_time,fee, opening_status,description,creating_time,creating_day,creating_month,creating_year,referer,ip_address,browser)values ('$exam_name','$no_of_question','$time_limit','$total_marks','$marks_per_question','$negative_marks','$streams','$starting_time','$starting_month','$starting_year','$starting_day','$ending_time','$ending_day','$ending_month','$ending_year','$result_day','$result_month','$result_year','$result_time','$fee','$opening_status','$description','$creating_timing','$creating_day','$creating_month','$creating_year','$referer','$ip','$browser')")) 
		{
			echo "Competition Created";
		}
		else
		{
			mysql_close();		
			header("location: gate1.php?versionnotcreated=1");			
		}
						
					}
				}
			
?>