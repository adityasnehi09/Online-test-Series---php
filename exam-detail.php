<?php 
 //chacked security k1
session_start();
$_SESSION['song_source_check']=0;
unset($_SESSION['song_source_checkvalue']); 
$_SESSION['song_source_checkvalue2']=0; 
setcookie("song_source_check","0");  // If 0 then create new audio object else change source
if(isset($_SESSION['logintemp']))
{
	require_once("basic2.php");
	$mycrop_pic=$_SESSION['imagepic'];
	$nameX=$_SESSION['nameX'];
	$myprivacy=$_SESSION['mycrop_privacy'];
	$myid=$_SESSION['user_idX'];
	$myuid=$_SESSION['uidperson'];
}
include_once("imp/function.php");
?>
<?php require_once("start_html_head.php"); ?>
<?php

if(isset($_REQUEST['id']))
	{
	$exam_uid=securedata($_REQUEST['id']);
	$sql=mysqli_query($con,"select * from all_test where uid='$exam_uid' and exam_for_display='1'");
	}else{
		$sql=mysqli_query($con,"select * from all_test where exam_for_display='1' and ready_to_run='1' order by s_no desc limit 0,1");
	}
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_assoc($sql))
		{
			$exam_name=$row['exam_name'];
		}
	}
	?>
	
	
	
		<title><?php echo $exam_name; ?> | IndoTufan</title>
		 <meta name="description" content="Participate in All India Online Gate Test Series and boost your capacity. ">
	    <meta name="keywords" content="indotufan.com,indotufan,indo tufan,test,test series,online,online test series,All India Online Gate Test Series">	 
	</head>
	<body>
	<?php include_once("headertop.php");?>
	<!--main-->
	<div class="container">
	<div class="row">
	<div class="col-md-8"style="background-color:white;margin-top:10px;">
	<?php
	require_once("welcome.php");
	if(isset($_REQUEST['id']))
	{
	$exam_uid=securedata($_REQUEST['id']);
	$sql=mysqli_query($con,"select * from all_test where uid='$exam_uid' and exam_for_display='1'");
	}else{
		$sql=mysqli_query($con,"select * from all_test where exam_for_display='1' and ready_to_run='1' order by s_no desc limit 0,1");
	}
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_assoc($sql))
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
								$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." 00:00:00");
								$now    = new DateTime();
								$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." 00:00:00");
								?> 
									<h1 style="color:gray"class="part2-noti"><?php echo $exam_name; ?></h1>
									<div>
									<p>
										<table class="table table-striped table-hover">
											<tr><td>No Of Question :</td><td align="right"> <?php echo $no_of_question;?></td></tr>
											<tr><td>Total Marks : </td><td align="right"><?php echo $total_marks;?></td></tr>
											<tr><td>Time Limit : </td><td align="right"><?php echo $time_limit;?> Minute</td></tr>
											<tr><td>Marks per question : </td><td align="right"><?php echo $marks_per_question;?></td></tr>
											<tr><td>Negative Marking : </td><td align="right"><?php echo $negative_marks;?></td></tr>
											<tr><td>Starting Time : </td><td align="right"><?php echo time_($starting_time).", ".month_($starting_month)." ".$starting_day.' '.$starting_year.".";?></td></tr>
											<tr><td>Result/Rank Time : </td><td align="right"><?php echo time_($ending_time).", ".month_($ending_month)." ".$ending_day.' '.$ending_year.".";?></td></tr>
										</table>
									</p>
									<a class="btn-home comp"href="#" style="text-decoration:none;transition: all .35s;width:100%;text-align:center"onclick="startexam('<?php echo $exam_uid; ?>')">Enter In Exam</a>
									</div>
									<?php
		}
	}
	?>			
   </div>
   <div class="col-md-4">
   	 <h3 style='font-weight:bold;color:black'>Future Gate Exams</h3>
				 <table class="table">
<div class="list-group">
<?php
				  $sqq=mysqli_query($con,"select * from all_test order by s_no desc limit 10");
				 $series_no=mysqli_num_rows($sqq);
				 if($series_no>0)
				 {
					 while($row=mysqli_fetch_assoc($sqq))
					{
						 $starting_time=$row['starting_time'];
								$starting_month=$row['starting_month'];
								$starting_year=$row['starting_year'];
								$starting_day=$row['starting_day'];
								$ending_time=$row['ending_time'];
								$ending_day=$row['ending_day'];
								$ending_month=$row['ending_month'];
								$ending_year=$row['ending_year'];
								$s_no=$row['s_no'];
								$exam_uid_=$row['uid'];
								//$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day.$starting_time);
								//$start_date_only   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day);
								$now    = new DateTime();
								//$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day.$ending_time);
								$counter=0;
								//if($start_date   >= $now)
								//{
									if(isset($_REQUEST['id']))
	{
	$url_id=securedata($_REQUEST['id']);
	}
	else{
		$url_id=" ";
	}
									?>
									<a href="?id=<?php echo $exam_uid_; ?>" class="list-group-item <?php if($url_id==$exam_uid_){echo 'active'; }?>">
									<div style="float:right"><?php echo time_($starting_time).', '.month_($starting_month).' '.$starting_day.', '.$starting_year; ?></div><div><?php echo $row['exam_name']; ?></div>
									</a>
									<?php
								//}
					}
				 }
?>
</div>
				 <?php
				 ?>
</table>	
   </div>
   </div>
   </div>
	<?php 
	include_once("footer0pad.php"); 
	?>
	</body>
</html>