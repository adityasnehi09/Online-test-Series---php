<?php 
//chacked security k1
session_start();
require_once("welcome.php");
$page_image="indotufanlogo.png";
?>
<?php require_once("start_html_head.php"); ?>
	<link rel="icon" href="img/nightlogo.png" type="image/x-icon">
	<meta property="og:image" content="http://indotufan.com/img/<?php echo $page_image; ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1024">
<meta property="og:image:height" content="1024">
	</head>
	<body>
	<?php include_once("headertop.php");?>
	<div style='background-color:white;'>
		<div style="background-color:#002D3C;padding:20px 20px 0px 20px;">
			<div class="container">
				<h2 style='color:white'><b>Previous Question<b></h2>
			</div>
			<!-- Nav tabs -->
		</div>
		<!-- Tab panes -->
		<div class="container">
		<div>
			<br>
			<?php
				require_once("welcome.php");
				if(isset($_REQUEST['id']))
				{
					require_once("welcome.php");
					$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
					$sql=mysqli_query($con,"select no_of_question,exam_name from all_test where uid='$examid'order by s_no desc");
					$que_ans_list="que_ans_$examid";
					$question_="question_".$examid;

					if(mysqli_num_rows($sql)>0)
					{
						while($ri=mysqli_fetch_assoc($sql))
						{
							$no_of_question=$ri['no_of_question'];
							$exam_name=$ri['exam_name'];
						}
					}
					?>
					<title>Previous Question - <?php echo $exam_name; ?> </title>
				
	<ol class="breadcrumb"style="margin:10px 0px 0px 0px">
  <li><a href="?">Previous Question</a></li>
  <li class="active"><?php echo $exam_name; ?></li>
</ol>
<br>
				<?php
					
					
					$sq=mysqli_query($con,"select * from all_test where uid='$examid' order by s_no desc limit 0,1");
					if(mysqli_num_rows($sq)>0)
									{
										while($row=mysqli_fetch_assoc($sq))
										{
										
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
											
											$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
											$now    = new DateTime();
											$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
											date_default_timezone_set("Asia/Kolkata");
											$start_date = strtotime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
											$end_date = strtotime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
											$today = date("Y-m-d H:i:s");  
											$today_date = strtotime($today);
											$startfromthistime= round(abs($today_date - $end_date ) / 60,2);						
											$expDate =  date_create($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
											$starting_date =  date_create($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
											$todayDate = date_create($today);
       $todayDate = date_create($today);
       $diff_exp =  date_diff($todayDate, $expDate);
       $diff_start =  date_diff($starting_date, $todayDate);
	  if($diff_exp->format("%R")=='+'){
           // Exam is running or in future
		   $examended=0;
       }else{
         //exam ended
		 $examended=1;
       }
?>
								
									<?php										}
									}
									if($examended==0)
									{
										?>
										<div class="alert alert-info"id="alertforconformemail">
										<?php
										 echo "Sorry dear, Right now we cannot show you this question paper. We will display it just after test.";
										?>
										</div>
				                     <?php
                                    }
									else
									{
										?>
										
										
										<?php
$sql=mysqli_query($con,"select * from `$question_`");
$madeq=mysqli_num_rows($sql);
if($madeq>0)
{
	$qno=1;

	while($row=mysqli_fetch_assoc($sql))
	{
		$question=$row['question'];
		$solution=$row['solution'];
		$solution_link=$row['solution_link'];
		$solution_img=$row['solution_img'];
		$option1=$row['option1'];
		$option2=$row['option2'];
		$option3=$row['option3'];
		$option4=$row['option4'];
		$check_option1=$row['check_option1'];
		$check_option2=$row['check_option2'];
		$check_option3=$row['check_option3'];
		$check_option4=$row['check_option4'];
		$q_img=$row['q_img'];
		?>
		<p style="color:green">Q<?php echo $qno; ?> : <?php echo $question; ?></p>
		<?php if($q_img!='0' && $q_img!=null){
			?> <img src="foot/question_image/<?php echo $q_img ?>"class="img img-responsive"style="margin-bottom:10px;">
			<?php
		}
		?>
		<div class="row">
		<div class="col-md-6 option-que"><b><input type="radio"></b> <?php echo $option1;?> <?php if($check_option1=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		<div class="col-md-6 option-que"><b><input type="radio"></b> <?php echo $option2;?> <?php if($check_option2=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		</div>
		<div class="row">
		<div class="col-md-6 option-que"><b><input type="radio"></b> <?php echo $option3;?> <?php if($check_option3=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		<div class="col-md-6 option-que"><b><input type="radio"></b> <?php echo $option4;?> <?php if($check_option4=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		</div>
		<b>Explanation:</b><br>
		<?php echo $solution; ?><br>
		<a href="<?php echo $solution_link; ?>"target="_blank"><?php echo $solution_link; ?></a>
		<?php if($solution_img!='0' && $solution_img!=null){
			?> <img src="foot/solution_img/<?php echo $solution_img ?>"class="img img-responsive"style="margin-bottom:10px;">
			<?php
		}
		?>
		<hr>
		<?php
		$qno++;
	}
}else{
	echo mysqli_error($con);
}
									}
						}
		            
				
				
	else
{
	$sql1=mysqli_query($con,"select uid,exam_name from all_test order by s_no desc");
	if(mysqli_num_rows($sql1)>0)
	{
	?><table class="table"><tr><th>Test Name</th><th></th></tr><?php
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
  </div>
</div>
</div>
</div>
						</div>
				</div>
				<?php include_once("footer0pad.php"); ?>
				<!-- script references -->
		</body>
</html>
<?php 
?>