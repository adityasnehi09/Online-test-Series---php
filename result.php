<?php 
//chacked security k1
session_start();
require_once("welcome.php");
require_once("loginrequired.php");
$page_image="indotufanlogo.png";
?>
<?php require_once("start_html_head.php"); ?>
	<link rel="icon" href="img/nightlogo.png" type="image/x-icon">
	<meta property="og:image" content="http://indotufan.com/img/<?php echo $page_image; ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1024">
<meta property="og:image:height" content="1024">

                <script type="text/javascript">//<![CDATA[ 
(function() {
    var configuration = {
    "token": "72580a7af138a5dcb87ab8c3cd328d73",
    "excludeDomains": [
        ""
    ],
    "capping": {
        "limit": 5,
        "timeout": 24
    },
    "exitScript": {
        "enabled": true
    },
    "popUnder": {
        "enabled": true
    }
};
    var script = document.createElement('script');
    script.async = true;
    script.src = '//cdn.shorte.st/link-converter.min.js';
    script.onload = script.onreadystatechange = function () {var rs = this.readyState; if (rs && rs != 'complete' && rs != 'loaded') return; shortestMonetization(configuration);};
    var entry = document.getElementsByTagName('script')[0];
    entry.parentNode.insertBefore(script, entry);
})();
//]]></script>                
        
	</head>
	<body>
	<?php include_once("headertop.php");?>
	<div style='background-color:white;'>
		<div style="background-color:#002D3C;padding:20px 20px 0px 20px;">
			<div class="container">
				<h2 style='color:white'><b>Your Results<b></h2>
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
					$myid=$_SESSION['user_idX'];
					$question_="question_".$examid;
$check_user_exist=mysqli_query($con,"select id,exam_end_status from `$que_ans_list` where user_id='$myid'");
if(mysqli_num_rows($check_user_exist)!=1)
{
	?>
	<div class="alert alert-warning" role="alert">
  <strong>Warning!</strong> You have not participated in this exam.
</div>
<?php
}else{
				if(mysqli_num_rows($sql)>0)
				{
					while($ri=mysqli_fetch_assoc($sql))
					{
							$no_of_question=$ri['no_of_question'];
							$exam_name=$ri['exam_name'];
					}
				}
				?>
				<title>Result - <?php echo $exam_name; ?> | <?php echo $_SESSION['nameX']; ?></title>
				<?php
					$sql2=mysqli_query($con,"select * from `$que_ans_list` where  user_id='$myid'");
					if(mysqli_num_rows($sql2)>0)
					{
						while($row=mysqli_fetch_assoc($sql2))
						{	
									$illagel_attemp=$row['illagel_attemp'];
									$dismis_reason=$row['dismis_reason'];
									$rank=$row['rank'];
									$marks=$row['marks'];
									$unsolved_que=$row['unsolved_que'];
									$exam_end_status=$row['exam_end_status'];
									$dismis_reason=$row['dismis_reason'];
									$useranswer=array();
									for($i=1;$i<=$no_of_question;$i++)
									{
										$useranswer[$i]=$row["que_no_".$i];
									}
									$questionuid="question_".$examid;
									$correct_ans=array();
									$sql2=mysqli_query($con,"select check_option1,check_option3,check_option2,question_no,check_option4,negative_mark,positive_mark from `$questionuid`");
									if(mysqli_num_rows($sql2)>0)
									{
										while($row2=mysqli_fetch_assoc($sql2))
										{
											$check_option1=$row2['check_option1'];
											$check_option2=$row2['check_option2'];
											$check_option3=$row2['check_option3'];
											$check_option4=$row2['check_option4'];
											$question_no=$row2['question_no'];
											$negative_mark_this_que=$row2['negative_mark'];
											$positive_mark_this_que=$row2['positive_mark'];
											if($check_option1=='1')
											{
												$correct_ans[$question_no]='1';
											}
											else if($check_option2=='1')
											{
												$correct_ans[$question_no]='2';
											}
											else if($check_option3=='1')
											{
												$correct_ans[$question_no]='3';
											}
											else if($check_option4=='1')
											{
												$correct_ans[$question_no]='4';
											}
											else{
												$correct_ans[$question_no]='-1';
											}
										}
									}
									$totalmarks=0;
									$totalincorrectquestion=0;
									$noofattempedquestion=0;
									$total_negative_marks=0;
									$total_positive_marks=0;
									for($i=1;$i<=$no_of_question;$i++)
									{
										if($useranswer[$i]!=$correct_ans[$i])
										{
											if(!empty($useranswer[$i]) && $useranswer[$i]!='-1') /* -2 indicate no answer */
											{
												$totalmarks=$totalmarks-$negative_mark_this_que;
												$totalincorrectquestion++;
												$noofattempedquestion++;
												$total_negative_marks=$total_negative_marks+$negative_mark_this_que;
											}
										}
										else{
											$totalmarks=$totalmarks+$positive_mark_this_que;
											$noofattempedquestion++;
											$total_positive_marks=$total_positive_marks+$positive_mark_this_que;
										}
									}
									$sqq=mysqli_query($con,"select gate from activateseries");
									$series_no=mysqli_num_rows($sqq);
									if($series_no>0)
									{
										while($row=mysqli_fetch_assoc($sqq))
										{
											$activateseries=$row['gate'];
										}
									}
									$sq=mysqli_query($con,"select * from all_test where uid='$examid' order by s_no desc limit 0,1");
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
									<h1 style="color:gray" class="part2-noti"><?php echo $exam_name; ?></h1>
									<div class="row">
									<div class="col-lg-6">
	<div style="border:10px solid  #FF9933;border-radius:12px;text-align:center;">
	<div style="border:10px solid  #FFFFFF;background-color:#002D3C;z-index:20;position:relative">
	<div style="border:10px solid  #138808;padding:20px;background-image:url(img/Ashoka_Chakra.png);background-size:auto 100%;background-repeat:no-repeat;background-position:center;z-index:-1;position:relative;color:white">
	<b style="font-size:20px">Your Rank<br>
	<?php
if(empty($rank)){ echo "N/A";}else{echo $rank;}
	?></b>
  </div>
   </div>
    </div><br>
<?php
if($_SESSION['mycrop_privacy']=='public'){
$feature_img="upload_images/real/".$_SESSION['myfullimage'];
}else{
$feature_img="upload_images/crop/default.jpg";
}
?>
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share?linkurl=http%3A%2F%2Findotufan.com/ranklist.php?id=<?php echo $examid; ?>&u=<?php echo $_SESSION['useridX']; ?> &amp;linkname=Result-<?php echo $exam_name; ?>|<?php echo $_SESSION['nameX']; ?>"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
</div>
<script>
var a2a_config = a2a_config || {};
a2a_config.linkname = "Result-<?php echo $exam_name;?> | <?php echo $_SESSION['nameX'];?>";
a2a_config.linkurl = "http://indotufan.com/ranklist.php?id=<?php echo $examid; ?>&u=<?php echo $_SESSION['user_idX']; ?>";
a2a_config.custom_services = [["Result-<?php echo $exam_name;?> | <?php echo $_SESSION['nameX'];?>","http://indotufan.com/ranklist.php?id=<?php echo $examid; ?>&u=<?php echo $_SESSION['user_idX']; ?>","http://indotufan.com/<?php echo $feature_img; ?>"]];
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<br>
									</div>
									<div class="col-lg-6">
									<table class="table">
										<tr><td>Name</td><td><?php  echo $_SESSION['nameX'];?></td></tr>
										<tr><td>Marks</td><td><?php echo $totalmarks;?></td></tr>
										<tr><td>Total Question</td><td><?php echo $no_of_question; ?></td></tr>
										<tr><td>Atteped Question</td><td><?php echo $noofattempedquestion; ?></td></tr>
										<tr style='color:red;'><td>Negative Mark</td><td>-<?php echo abs($total_negative_marks); ?></td></tr>
										<tr><td>Positive Mark</td><td><?php echo $total_positive_marks; ?></td></tr>
										<tr style='color:red;'><td>Wrong Answer</td><td><?php echo $totalincorrectquestion; ?></td></tr>
									</table>
									</div>
									</div><?php										}
									}
									if($examended==0)
									{
										?>
										<div class="alert alert-info"id="alertforconformemail">
										<?php
										 echo "Your rank and your answer paper will publish just after ending of this examination ";
										?>
										</div>
				                     <?php
                                    }
									else
									{
$sql=mysqli_query($con,"select * from `$question_`");
$madeq=mysqli_num_rows($sql);
if($madeq>0)
{
	$qno=1;
	echo "<h1 style='color:blue'>Your response</h1><hr>";
	while($row=mysqli_fetch_assoc($sql))
	{
		$question=$row['question'];
		$solution=$row['solution'];
		$solution_link=$row['solution_link'];
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
		<?php if($q_img!='0'){
			?> <img src="<?php echo $filepath.$q_img ?>"class="img img-responsive"style="margin-bottom:10px;">
			<?php
		}
		?>
		<div class="row">
		<div class="col-md-6 option-que"><b><input type="radio"  <?php if($useranswer[$qno]=='1'){?> checked <?php } else{?> disabled <?php  } ?>></b> <?php echo $option1;?> <?php if($check_option1=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		<div class="col-md-6 option-que"><b><input type="radio"  <?php if($useranswer[$qno]=='2'){?> checked <?php }  else{?> disabled <?php  }?>></b> <?php echo $option2;?> <?php if($check_option2=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		</div>
		<div class="row">
		<div class="col-md-6 option-que"><b><input type="radio"  <?php if($useranswer[$qno]=='3'){?> checked <?php }  else{?> disabled <?php  } ?>></b> <?php echo $option3;?> <?php if($check_option3=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		<div class="col-md-6 option-que"><b><input type="radio" <?php if($useranswer[$qno]=='4'){?> checked <?php }  else{?> disabled <?php  }?>></b> <?php echo $option4;?> <?php if($check_option4=='1'){echo "<i class='glyphicon glyphicon-ok green-color'></i>";} ?></div>
		</div>
		<b>Explanation:</b><br>
		<?php echo $solution; ?><br>
		<a href="<?php echo $solution_link; ?>"target="_blank"><?php echo $solution_link; ?></a>
		
		<hr>
		<?php
		$qno++;
	}
}else{
	echo mysqli_error($con);
}
									}
						}
		            }
				}
				}
	else
{
	$sql1=mysqli_query($con,"select uid,exam_name from all_test order by s_no desc");
	if(mysqli_num_rows($sql1)>0)
	{
	?><table class="table"><tr><th>Test Name</th><th>Result</th></tr><?php
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$uid=$row1['uid'];
			$exam_name=$row1['exam_name'];
			?>
			<tr><td><?php echo $exam_name ;?></td><td><?php echo "<a href='result.php?id=$uid'>Click Here</a>"; ?></td></tr>
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