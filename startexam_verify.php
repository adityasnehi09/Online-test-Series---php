<?php
session_start();
require_once("imp/function.php");

date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['emailX']))
{
	echo "<p>Login Required, <a href='#loginformbox'role='button' data-toggle='modal'>Click Me to Login</a></p>";
}else{
if(isset($_REQUEST['exam_id']))
{
		
	require_once("welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['exam_id']), ENT_QUOTES, 'UTF-8');
						$sq=mysqli_query($con,"select * from all_test where uid='$examid' and running_status='1' order by s_no desc limit 0,1");
						if(mysqli_num_rows($sq)>0)
						{
							while($row=mysqli_fetch_assoc($sq))
							{
								$exam_name=$row['exam_name'];
								$no_of_question=$row['no_of_question'];
								$s_no=$row['s_no'];
								$time_limit=$row['time_limit'];
								$total_marks=$row['total_marks'];
								$marks_per_question=$row['marks_per_question'];
								$negative_marks=$row['negative_marks'];
								$streams=$row['streams'];
								$starting_time=$row['starting_time'];
								$starting_month=$row['starting_month'];
								$starting_year=$row['starting_year'];
								$starting_day=$row['starting_day'];
								$ending_time=$row['ending_time'];
								$ending_day=$row['ending_day'];
								$ending_month=$row['ending_month'];
								$ending_year=$row['ending_year'];
								$activated=$row['activated'];
								$exam_uid=$row['uid'];
								$instruction=$row['instruction'];
								$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." 00:00:00");
								$now    = new DateTime();
								$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." 00:00:00");
								if (file_exists($instruction)){
								include_once($instruction);
								}
								echo "<p>Startint Time :  ".time_($starting_time)." " .month_($starting_month)." $starting_day, $starting_year.";
								echo "<br>Ending Time :  ".time_($ending_time)." " .month_($ending_month)." $ending_day, $ending_year.</p>";
								$d_exp = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
								$d_str = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
								$today_ = new DateTime(date("Y-m-d H:i:s")); 
								if($d_exp<$today_){
									
									?>
									
									<div class="alert alert-warning">
  <?php echo "<b style='color:red'>Exam Ended</b>"; ?>
</div>
									<?php
								   
									//exam ended
								}
								if($today_<$d_str ){
									?>
									
									<div class="alert alert-warning">
  <?php echo "<b style='color:red'>Exam Not Started</b>"; ?>
</div>
									<?php
									
								}
								if(($today_>$d_str ) && ($d_exp>$today_)){	
									?>
									
									<div class="alert alert-warning">
  <?php echo "<b style='color:green;'>Exam Running</b>"; ?>
</div>
									<?php
									
								}					 
								if (file_exists($instruction)){
								?>
								<center>
								<form action="startexam.php?id=<?php echo $examid; ?>"method="post">
								<input type="submit" class="btn btn-success btn-home"style="width:100%"value="Continue">
								</form>
								</center>
								<?php
								}
							}
						}
}
}

?> 
 

