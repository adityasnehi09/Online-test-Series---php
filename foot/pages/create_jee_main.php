<?php
require_once("session.php");
function securetext($txt)
{
	return htmlspecialchars(mysqli_real_escape_string($con,$txt, ENT_QUOTES, 'UTF-8'));
}
if(!isset($_SESSION['adityasnehiloginyes']))
{
	 header("location: http://nightbird.in");
}
else
{
	if(isset($_POST['jee_main_submit']))
	{ 
		require_once("welcome.php");
		
								$exam_name=securetext($_POST['exam_name']);
								$no_of_question=securetext($_POST['no_of_question']);
								$time_limit=securetext($_POST['time_limit']);
								$total_marks=securetext($_POST['total_marks']);
								$marks_per_question=securetext($_POST['marks_per_question']);
								$negative_marks=securetext($_POST['negative_marks']);
								
								$starting_time=securetext($_POST['starting_time']);
								$starting_month=securetext($_POST['starting_month']);
								$starting_year=securetext($_POST['starting_year']);
								$starting_day=securetext($_POST['starting_day']);
								$ending_time=securetext($_POST['ending_time']);
								$ending_day=securetext($_POST['ending_day']);
								$ending_month=securetext($_POST['ending_month']);
								$ending_year=securetext($_POST['ending_year']);
								$result_time=securetext($_POST['result_time']);
								$result_day=securetext($_POST['result_day']);
								$result_month=securetext($_POST['result_month']);
								$result_year=securetext($_POST['result_year']);
								$fee=securetext($_POST['fee']);
								$description=securetext($_POST['description']);
								$uid=md5(uniqid() . time());
								$questionuid="question_".$uid;
								$user_gate_uid="gate_user_".$uid;
								
		date_default_timezone_set('Asia/Calcutta');
		$creating_timing=date("h:i a");
		$creating_year= date('Y');
		$creating_month= date('m');
		$creating_day= date('d');
		if (isset($_SERVER['HTTP_REFERER'])){$referer=$_SERVER['HTTP_REFERER'];	}else{$referer="Direct at Night Bird";}		
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];		
		 if(mysqli_query($con,"CREATE TABLE `$questionuid` ( `s_no` INT(50)  AUTO_INCREMENT , `comp_name` TEXT ,`question_no` INT , `question` TEXT   , `option1` TEXT   , `option2` TEXT  , `option3` TEXT  , `option4` TEXT  , `check_option1` INT(20)  ,`check_option2` INT(20),`check_option3` INT(20),`check_option4` INT(20),`question_approve` INT(20),`q_img` TEXT,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
				                        {
										    if(mysqli_query($con,"CREATE TABLE `$user_gate_uid` ( `s_no` INT(50)  AUTO_INCREMENT , `name` TEXT  , `id` INT(50)  ,`rank` INT(50), `marks` INT(50),`uid` TEXT  ,`browser` TEXT  ,`referer` TEXT  ,`ip_address` TEXT  ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                        {
												if(mysqli_query($con,"insert into jee_main_exam (exam_name, no_of_question, time_limit, total_marks,marks_per_question,negative_marks, starting_time,starting_month,starting_year,starting_day,ending_time,ending_day,ending_month,ending_year,result_day,result_month,result_year,result_time,fee, opening_status,description,creating_time,creating_day,creating_month,creating_year,referer,ip_address,browser,uid)values ('$exam_name','$no_of_question','$time_limit','$total_marks','$marks_per_question','$negative_marks','$starting_time','$starting_month','$starting_year','$starting_day','$ending_time','$ending_day','$ending_month','$ending_year','$result_day','$result_month','$result_year','$result_time','$fee','0','$description','$creating_timing','$creating_day','$creating_month','$creating_year','$referer','$ip','$browser','$uid')")) 
												{
														header("location: create_question.php?id=$uid&status=CompetitionCreated");
												}
											}
										}
		else
		{
			echo mysql_error();	
			//header("location: gate1.php?versionnotcreated=1");			
		}
						
					}
				}
			
?>