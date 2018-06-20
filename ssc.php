<?php 
 //chacked security k1
session_start();
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
		<title>IndoTufan | All India Online SSC Test Series</title>
		 <meta property="og:site_name" content="IndoTufan">
    
    <meta property="og:title" content="IndoTufan | All India Online SSC Test Series">
    <meta property="og:image" content="img/success2.jpg">
    
	   <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Rokkitt" rel="stylesheet">
	   <meta name="description" content="Participate in All India Online SSC Test Series and boost your capacity. ">
	    <meta name="keywords" content="SSC, SSC test,free,indotufan.com,indotufan,indo tufan,test,test series,online,online test series,All India Online SSC Test Series,aits, AITS">	 
	
	</head>
	<body>
	<?php include_once("headertop.php");?>
	<!--main-->
	<div class="container">
	<div class="row overlay">
				
			</div>
			
		<?php
	if(isset($_REQUEST['id'])){
		$ex_id=securedata($_REQUEST['id']);
		$sql__=mysqli_query($con,"select streams from all_test where uid='$ex_id'");
			if(mysqli_num_rows($sql__)>0){
				while($row__=mysqli_fetch_assoc($sql__)){
					$_REQUEST['type']=$row__['streams'];
				}
	        }
	    }
	?><h1 style="font-family: 'Yanone Kaffeesatz', sans-serif;">SSC All India Test Series 2017</h1> <?php
					?>
					
					
						
	<div class="col-md-8"style="background-color:white;margin-top:10px;">
	<?php
	require_once("welcome.php");
	
	if(isset($_REQUEST['id'])){
		$id__=securedata($_REQUEST['id']);
		$sql2=mysqli_query($con,"select * from all_test where exam_for_display='1' and ready_to_run='1'  and uid='$id__' order by s_no desc limit 0,1");
	
	}else{
		$sql2=mysqli_query($con,"select * from all_test where exam_for_display='1' and ready_to_run='1' and ( exam_type='ssc_series' or exam_type='ssc_support') order by s_no desc limit 0,1");
	
	}
		
	if(mysqli_num_rows($sql2)>0)
	{
		while($row=mysqli_fetch_assoc($sql2))
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
								
								$start_date = strtotime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
	$end_date = strtotime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
	$today = date("Y-m-d H:i:s");  
$today_date = strtotime($today);


$startfromthistime= round(abs($today_date - $start_date ) / 60,2);	
								
				
								
								?> 
									
									<div style="float:right;font-size:18px;margin-top:7px;background-color:#162630;padding:10px"><?php
									$d_exp = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
								$d_str = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
								$today_ = new DateTime(date("Y-m-d H:i:s"));
								
								
								
								
								
								
								if($d_exp<$today_){
								   echo "<b style='color:red'>Exam Ended</b>";
									//exam ended
								}
								?><span style="color:white"id="countdown"><?php if($today_<$d_str ){
									echo "<b style='color:red'>Not Started</b>";
								}?></span><?php
								if(($today_>$d_str ) && ($d_exp>$today_)){
									echo "<b style='color:white;'>Hurry Up! Exam is Running</b>";
								}
								?></div>
									<h1 style="color:black;font-family: 'Rokkitt', serif;font-size:25px"><?php echo $exam_name; ?></h1>
									
									<div>
									
										<table class="table table-striped table-hover">
											
											<tr><td>No Of Question :</td><td align="right"> <?php echo $no_of_question;?></td></tr>
											<tr><td>Total Marks : </td><td align="right"><?php echo $total_marks;?></td></tr>
											<tr><td>Time Limit : </td><td align="right"><?php echo $time_limit;?> Minute</td></tr>
											<tr><td>Marks per question : </td><td align="right"><?php echo $marks_per_question;?></td></tr>
											<tr><td>Negative Marking : </td><td align="right"><?php echo $negative_marks;?></td></tr>
											<tr><td>Starting Time : </td><td align="right"><?php echo time_($starting_time).", ".month_($starting_month)." ".$starting_day.' '.$starting_year.".";?></td></tr>
											<tr><td>Result/Rank Time : </td><td align="right"><?php echo time_($ending_time).", ".month_($ending_month)." ".$ending_day.' '.$ending_year.".";?></td></tr>
										</table>
									
									<a class="btn-home comp"href="#" style="text-decoration:none;transition: all .35s;width:100%;text-align:center"onclick="startexam('<?php echo $exam_uid; ?>')">Enter In Exam</a>
									</div>
									<?php
		$test_status=true;
		}
	}else{
				$test_status=false;
				echo "<b style=''>No Test</b>";
				
			}
	?>			
   </div>
   <div class="col-md-4">
   
  <div style="background-color:#eeeeee">
   	 <h3 style='font-weight:bold;color:black;margin:10px;padding:10px'>Future Gate Exams</h3>
				 <table class="table">
<div class="list-group">
<?php
				  $sqq=mysqli_query($con,"select * from all_test where (exam_type='ssc_series' or exam_type='ssc_support') and exam_for_display='1' order by s_no desc limit 10");
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
								$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day.$starting_time);
								$start_date_only   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day);
								$now    = new DateTime();
								$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day.$ending_time);
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
    <?php 
	if(isset($test_status) && $test_status!=false){
	if($today_<$d_str ){ ?>
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
    document.getElementById('countdown').innerHTML =days+":"+ hours + ":" + minutes + ":" + Math.round(remainingSeconds);
    if (seconds < 1) {
       
        document.getElementById('countdown').innerHTML = "<b style='color:red'>Exam is running</b>";
		window.location="";
		
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
	<?php } ?>			
					
					
					
					<?php
					
					
	}
				
			
			
		
		
		?>
		</div>
	<br>
			<section style="background-color:#213948;padding-top:50px;padding-bottom:50px;"id="aboutheading">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
					<h1 style="margin-bottom:10px;"class="part2-noti">Latest Future Test</h1><hr>
					<div style="background-color:white;padding:20px;"><?php 
					require_once("welcome.php");
					$ss=mysqli_query($con,"select * from all_test where exam_for_display='1' and (exam_type='ssc_series' or exam_type='ssc_support') order by s_no desc ");
					if(mysqli_num_rows($ss)>0)
					{
							echo "<table style='width:100%;'>";
						while($ro=mysqli_fetch_array($ss))
						{
							$streams=$ro['streams'];
							$exam_type=$ro['exam_type'];
								$starting_time=$ro['starting_time'];
								$starting_month=$ro['starting_month'];
								$starting_year=$ro['starting_year'];
								$starting_day=$ro['starting_day'];
							$exam_uid=$ro['uid'];
							echo "<tr><td rowspan='2'><h3><a href='exam-detail.php?id=$exam_uid'>".$ro['exam_name']."</a></h3></td><td align='right'>".time_($starting_time).", " .month_($starting_month)." $starting_day, $starting_year </td></tr>";
							echo "<tr style='border-bottom:1px solid gray'><td align='right'>".exam_type($exam_type)."</td></tr>";
						}
						echo "</table>";
					}
					?>
					</div>
					</div>
					<div class="col-md-6">
					<h1 style="margin-bottom:10px;"class="part2-noti">Toppers </h1><hr>
					<div style="background-color:white;padding:20px;">
					<?php
				
						
					require_once("welcome.php");
					$sql_rank=mysqli_query($con,"select uid from all_test where rank_status='1' and (exam_type='ssc_series' or exam_type='ssc_support') order by s_no desc limit 0,1");
					if(mysqli_num_rows($sql_rank)>0){
						while($row_rank=mysqli_fetch_assoc($sql_rank)){
							makerank($row_rank['uid'],$con);
						}
					}
					?>
					
	
					</div>
					</div>
					</div>
					
				</div>
			</section>
  <!--/row-->
   <?php 
	include_once("footer0pad.php"); 
	?>
	</body>
</html>