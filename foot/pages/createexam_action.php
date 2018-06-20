<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
require_once("session.php");
require_once("welcome.php");
require_once("../../imp/function.php");



	if(isset($_POST['gate_submit']))
	{ 
		
		
								$exam_name=securedata($_POST['exam_name']);
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
								$ending_time=securedata($_POST['result_time']);
								$ending_day=securedata($_POST['result_day']);
								$ending_month=securedata($_POST['result_month']);
								$ending_year=securedata($_POST['result_year']);
								$result_time=securedata($_POST['result_time']);
								$result_day=securedata($_POST['result_day']);
								$result_month=securedata($_POST['result_month']);
								$result_year=securedata($_POST['result_year']);
								$fee=securedata($_POST['fee']);
								$description=securedata($_POST['description']);
								$uid=md5(uniqid() . time());
								$questionuid="question_".$uid;
								$user_gate_uid="test_user_".$uid;
								$usermarkans="usermarkans_".$uid;
								$mark_uid="mark_".$uid;
								$que_ans="que_ans_".$uid;
								$qans = array();
								for($qx=0;$qx<$no_of_question;$qx++)
								{
									$a=$qx+1;
									$qans[$qx]="que_no_".$a;
								}
								$sql_q_a = 'CREATE TABLE `'.$que_ans.'` (id INT NOT NULL AUTO_INCREMENT,user_id INT(250) NOT NULL,illagel_attemp int(20),dismis_reason TEXT,`rank` INT(50), `marks` double,`uid` TEXT ,`unsolved_que` TEXT ,`exam_end_status` INT   ,`user_entry_time` TEXT,`user_exit_time` TEXT,`negative_mark` float ,`browser` TEXT  ,`referer` TEXT  ,`ip_address` TEXT, ';
								foreach($qans as $field)
    {
        $sql_q_a .= ' '.$field.' VARCHAR( 40 ),';
    }
        $sql_q_a .= ' PRIMARY KEY ( `id` ))';


								
		
		$creating_timing=date("h:i a");
		$creating_year= date('Y');
		$creating_month= date('m');
		$creating_day= date('d');
		if (isset($_SERVER['HTTP_REFERER'])){$referer=$_SERVER['HTTP_REFERER'];	}else{$referer="Direct at Night Bird";}		
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];		
		 if(mysqli_query($con,"CREATE TABLE `$questionuid` ( `s_no` INT(50)  AUTO_INCREMENT , `comp_name` TEXT ,`question_no` INT , `question` TEXT   , `option1` TEXT   , `option2` TEXT  , `option3` TEXT  , `option4` TEXT  , `check_option1` INT(20)  ,`check_option2` INT(20),`check_option3` INT(20),`check_option4` INT(20),`negative_mark` TEXT,`positive_mark` TEXT,`question_approve` INT(20),`solution_link` TEXT,`q_img` TEXT,`solution` TEXT,`solution_img` TEXT, PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
				                        {
										   
												if(mysqli_query($con,$sql_q_a))
												{
													if(mysqli_query($con,"insert into all_test (exam_name, no_of_question, time_limit, total_marks,marks_per_question,negative_marks, streams,starting_time,starting_month,starting_year,starting_day,ending_time,ending_day,ending_month,ending_year,result_day,result_month,result_year,result_time,fee, opening_status,description,creating_time,creating_day,creating_month,creating_year,referer,ip_address,browser,uid,exam_type)values ('$exam_name','$no_of_question','$time_limit','$total_marks','$marks_per_question','$negative_marks','$streams','$starting_time','$starting_month','$starting_year','$starting_day','$ending_time','$ending_day','$ending_month','$ending_year','$result_day','$result_month','$result_year','$result_time','$fee','0','$description','$creating_timing','$creating_day','$creating_month','$creating_year','$referer','$ip','$browser','$uid','$exam_type')")) 
													{
														header("location: create_question.php?id=$uid&status=CompetitionCreated");
													}
													else
													{
														echo "Not Inserted | ".mysqli_error($con);
													}
												}
												else
												{
													echo "line 80".mysqli_error($con);
												}
											
										}
										else
										{
											echo "Question Table Not Created, ".mysqli_error($con);
										}
	}
										
		else
		{
				
			echo "No access";
		}
						
					
				
			
?>