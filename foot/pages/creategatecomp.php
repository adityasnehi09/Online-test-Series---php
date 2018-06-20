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
								$uid=md5(uniqid() . time());
								$questionuid="question_".$uid;
								$user_gate_uid="gate_user_".$uid;
								$usermarkans="usermarkans_".$uid;
								$mark_uid="mark_".$uid;
								$que_ans="que_ans_".$uid;
								$qans = array();
								for($qx=0;$qx<$no_of_question;$qx++)
								{
									$a=$qx+1;
									$qans[$qx]="que_no_".$a;
								}
								$sql_q_a = 'CREATE TABLE `'.$que_ans.'` (id INT NOT NULL AUTO_INCREMENT,user_id INT(250) NOT NULL,illagel_attemp int(20),dismis_reason TEXT,`rank` INT(50), `marks` INT(50),`uid` TEXT ,`unsolved_que` TEXT ,`exam_end_status` INT   ,`negative_mark` TEXT ,`browser` TEXT  ,`referer` TEXT  ,`ip_address` TEXT, ';
								foreach($qans as $field)
    {
        $sql_q_a .= ' '.$field.' VARCHAR( 40 ),';
    }
        $sql_q_a .= ' PRIMARY KEY ( `id` ))';

echo $sql_q_a;
								
		date_default_timezone_set('Asia/Calcutta');
		$creating_timing=date("h:i a");
		$creating_year= date('Y');
		$creating_month= date('m');
		$creating_day= date('d');
		if (isset($_SERVER['HTTP_REFERER'])){$referer=$_SERVER['HTTP_REFERER'];	}else{$referer="Direct at Night Bird";}		
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];		
		 if(mysqli_query($con,"CREATE TABLE `$questionuid` ( `s_no` INT(50)  AUTO_INCREMENT , `comp_name` TEXT ,`question_no` INT , `question` TEXT   , `option1` TEXT   , `option2` TEXT  , `option3` TEXT  , `option4` TEXT  , `check_option1` INT(20)  ,`check_option2` INT(20),`check_option3` INT(20),`check_option4` INT(20),`negative_mark` TEXT,`positive_mark` TEXT,`question_approve` INT(20),`solution_link` TEXT,`q_img` TEXT,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
				                        {
										   
												if(mysqli_query($con,$sql_q_a))
												{
													if(mysqli_query($con,"insert into gate_exam (exam_name, no_of_question, time_limit, total_marks,marks_per_question,negative_marks, streams,starting_time,starting_month,starting_year,starting_day,ending_time,ending_day,ending_month,ending_year,result_day,result_month,result_year,result_time,fee, opening_status,description,creating_time,creating_day,creating_month,creating_year,referer,ip_address,browser,uid)values ('$exam_name','$no_of_question','$time_limit','$total_marks','$marks_per_question','$negative_marks','$streams','$starting_time','$starting_month','$starting_year','$starting_day','$ending_time','$ending_day','$ending_month','$ending_year','$result_day','$result_month','$result_year','$result_time','$fee','0','$description','$creating_timing','$creating_day','$creating_month','$creating_year','$referer','$ip','$browser','$uid')")) 
													{
														header("location: create_question.php?id=$uid&status=CompetitionCreated");
													}
													else
													{
														echo "Not Inserted | ".mysql_error();
													}
												}
												else
												{
													echo "line 80".mysql_error();
												}
											
										}
										else
										{
											echo mysql_error();
										}
	}
										
		else
		{
				
			echo "No access";
		}
						
					
				}
			
?>