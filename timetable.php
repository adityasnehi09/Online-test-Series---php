<?php
 //chacked security k1
session_start();
include_once("imp/function.php");
date_default_timezone_set("Asia/Kolkata");
?>
<?php require_once("start_html_head.php"); ?>
<?php 
if(isset($_REQUEST['id'])){
	$examid=securedata($_REQUEST['id']);
$sq=mysqli_query($con,"select * from all_test where uid='$examid' and exam_for_display='1'");
						if(mysqli_num_rows($sq)>0)
						{
							while($row=mysqli_fetch_assoc($sq))
							{
								$exam_name=$row['exam_name'];
								?>
							<title>TimeTable - <?php echo $exam_name; ?> | IndoTufan</title>
								<?php
							}
						}else{
							?>
							<title>TimeTable | IndoTufan</title>
							<?php
						}
}else{
	
	?>
							<title>TimeTable | IndoTufan</title>
							<?php
	
}
						?>
								
		
		<meta name="description" content="Timetable of test">
	    <meta name="keywords" content="timetable,indotufan,test series,gate,jee main,jee advance">


	</head>
	<body style="">
	<?php include_once("headertop.php");?>
	<!--main-->
	<br>
   <div class="container">
		<div class="row"id=""style="background-color:#eeeeee;">
		<div class="col-md-12">
			<?php
if(isset($_REQUEST['id']))
{
	require_once("welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_$examid";
	//$myid=$_SESSION['user_idX'];
	$question_="question_".$examid;
	$sq=mysqli_query($con,"select * from all_test where uid='$examid' and exam_for_display='1'");
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
								$d_exp = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
								$d_str = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
								$today_ = new DateTime(date("Y-m-d H:i:s"));
								if($d_exp<$today_){
								   echo "<h1 style='color:red'>Exam Ended</h1>";
									//exam ended
								}
								if($today_<$d_str ){
									echo "<h3 style='color:red'>Exam Not Started <span id='countdown'></span></h3>";
								}
								if(($today_>$d_str ) && ($d_exp>$today_)){
									echo "<h3 style='color:green;'>Hurry Up! Exam is Running</h3>";
								}
								
								
									


							
	$start_date = strtotime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
	$end_date = strtotime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
	$today = date("Y-m-d H:i:s");  
$today_date = strtotime($today);


$startfromthistime= round(abs($today_date - $start_date ) / 60,2);	
								
								
								
								
								
								
								?>
								<title>TimeTable- <?php echo $exam_name; ?></title>
								<table class="table table-striped table-hover">
										<caption><h2><?php echo $exam_name; ?></h2></caption>
																						<tr><td>No Of Question :</td><td align="right"> <?php echo $no_of_question;?></td></tr>
											<tr><td>Total Marks : </td><td align="right"><?php echo $total_marks;?></td></tr>
											<tr><td>Time Limit : </td><td align="right"><?php echo $time_limit;?> Minute</td></tr>
											<tr><td>Marks per question : </td><td align="right"><?php echo $marks_per_question;?></td></tr>
											<tr><td>Negative Marking : </td><td align="right">-<?php echo $negative_marks;?></td></tr>
											<tr><td>Starting Time : </td><td align="right"><?php echo time_($starting_time).", &nbsp;".month_($starting_month)." ".$starting_day.' '.$starting_year.".";?></td></tr>
											<tr><td>Result/Rank Time : </td><td align="right"><?php echo time_($ending_time).", &nbsp;".month_($ending_month)." ".$ending_day.' '.$ending_year.".";?></td></tr>
										</table>
							<?php
								if (file_exists($instruction)){
									include_once($instruction);
								if(($today_>$d_str ) && ($d_exp>$today_)){
								?>
									<center>
								<form action="startexam.php?id=<?php echo $examid; ?>"method="post">
								<input type="submit" class="btn btn-success btn-home"style="width:100%"value="Continue">
								</form>
								</center>
								<?php }	?>
								<?php
								}
							}
						}
	}else{
		require_once("welcome.php");
		$sql1=mysqli_query($con,"select uid,exam_name from all_test order by s_no desc");
	if(mysqli_num_rows($sql1)>0)
	{
	?><table class="table"><tr><th>Test Name</th><th>Time Table</th></tr><?php
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$uid=$row1['uid'];
			$exam_name=$row1['exam_name'];
			?>
			<tr><td><?php echo $exam_name ;?></td><td><?php echo "<a href='?id=$uid'>Click Here</a>"; ?></td></tr>
			<?php
		}
		?>
		</table>
		<?php
	}else
	{
		echo mysqli_error($con);
	}
	}
?>
		</div>
		</div>
	</div><br>
			<script>
var upgradeTime =  <?php echo $startfromthistime; ?>*60;;
var seconds = upgradeTime;
function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = hours + ":" + minutes + ":" + Math.round(remainingSeconds);
    if (seconds < 1) {
       
        document.getElementById('countdown').innerHTML = "<b style='color:red'>Exam is running</b>";
		window.location="";
		 var timeenddata = '&id=<?php echo $examid ;?>';
		
    } else {
        seconds--;
    }
	if(seconds==60)
	{
		document.getElementById('countdown').style.color = "red";
	}
	
}
var countdownTimer = setInterval('timer()', 1000);
</script>
<?php	include_once("footer0pad.php"); ?>
	</body>
</html>