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
		<title>IndoTufan | All India Online Jee Main Test Series</title>
	    <meta name="description" content="Participate in All India Online JEE Mains Test Series and boost your capacity. ">
	    <meta name="keywords" content="indotufan.com,indotufan,jee main,indo tufan,test,test series,online,online test series,All India Online Jee mains Test Series">	 
		 <style>
			#aboutheading{
    -webkit-animation-name: noti; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 2s; /* Chrome, Safari, Opera */
    animation-name: headborder;
    animation-duration: 5s;
	 animation-iteration-count: infinite;
	 border-top:10px solid #428bca;
}
#forgetq{
	-webkit-animation-name: rota; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 5s; /* Chrome, Safari, Opera */
    animation-name: rota;
    animation-duration: 5s;
	 animation-iteration-count: infinite;
}
#forgetq:hover{
	-webkit-animation-name: rota; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 5s; /* Chrome, Safari, Opera */
    animation-name: rotahover;
    animation-duration: 5s;
	 animation-iteration-count: infinite;
}
@keyframes headborder {
    0%   {
		border-top:10px solid #428bca;
	}
    25%  {border-top:10px solid pink;}
    50%  {border-top:10px solid blue;
	}
    100% {border-top:10px solid orange;}
}
@keyframes rota {
    0%   {
	 transform: rotate(360deg); 
	 border-radius:16px;
	}
    25%  {}
    50%  {
	}
    100% {}
}
@keyframes rotahover {
    0%   {
	}
    25%  {}
    50%  {
	}
    100% {}
}
			</style>
		<?php include_once("addthis.php");?>
		<style>
		a {
    transition: all .35s;
    color: #F05F40;
}
		</style>
		<script>
function change_page(page_id){   
     var dataString = 'page_id='+ page_id;
	  $("#postofmember").html("Loading...");
     $.ajax({
           type: "POST",
           url: "suggestion.php",
           data: dataString,
           cache: true,
           success: function(result){
			     $("#postofmember").html(result);
           }
      });
}
function long_page(page_id){   
     var dataString = 'page_id='+ page_id;
	 $("#loadsug").show();
     $.ajax({
           type: "POST",
           url: "suggestion2.php",
           data: dataString,
           cache: true,
           success: function(result){
            $(".view"+page_id).hide();
            $("#loadsug").hide();
			     $(result).appendTo($('#postofmember'));
           }
      });
}
</script>
		<script>
		function parallax()
		{
			var an1=document.getElementById('an1');
			var an2=document.getElementById('an2');
			an1.style.bottom=3*window.pageYOffset+'px';
			an2.style.bottom=2*window.pageYOffset+'px';
		}
		window.addEventListener("scroll",parallax,false);
		function changeposttype()
		{
			$("#postofmember").html("<center style='color:white;'><b>Loading...</b></center>");
			var comptype=$("#comptype").val();
			var e=$("#posttype").val();
			if(comptype=='')
			{
				if(e=='new')
				{
				$.ajax({
				url: "new.php",
				success: function(result){
				$("#postofmember").html(result);
				}
				})
				}
				else if(e=='rec')
				{
				$.ajax({
				url: "suggestion.php",
				success: function(result){
				$("#postofmember").html(result);
				}
				})
				}
			}
			else
			{
				if(e=='new')
				{	
					var dataString ="&comptype="+comptype;		
					$.ajax({
					type: "POST",
					url: "newpostbycat.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#postofmember").html(result);
                    }
					})
				}
				else if(e=='rec')
				{
					var dataString ="&comptype="+comptype;		
					$.ajax({
					type: "POST",
					url: "recpostbycat.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#postofmember").html(result);
                    }
					})
				}
			}
		}
	function searchsomeone()
	{
		var searchtext=$("#searchtext").val();
		var searchcategory=$("#searchcategory").val();
		if(searchcategory=='u')
		{
			$("#generalheading").html("Search results of users");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchsomeone.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
		else{
			$("#generalheading").html("Search results of Competitions");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchcomp.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
	}
	function startexam(exam_id)
		{
			var dataString ="&exam_id="+exam_id;
		$("#generalheading").html("PLease Wait");
		$("#generalbody").html("<b>loading...</b>");
		$("#general").modal('show');
			$.ajax({
			type: "POST",
			url: "startexam_verify.php",
			data: dataString,
			cache: true,
			success: function(result){
			$("#generalheading").html("Read instruction and press continue");
			$("#generalbody").html(result);
			}
			})
		}
		</script>
	</head>
	<body>
	<?php include_once("headertop.php");?>
	<!--main-->
	<div class="container" >
		<?php
		if(!isset($_SESSION['logintemp']))
		{
			?>	
			<div style="position:fixed;width:200px;bottom:0;height:200px;z-index:-1;background-image:url(img/win-944525_1280.png);background-size:200px;"id="an1"></div>
			<div style="position:fixed;width:200px;bottom:0px;right:100px;height:200px;z-index:-1;background-image:url(img/win-944525_1280.png);background-size:200px;"id="an2"></div>
			<div class="row overlay">
				<div class="col-lg-12 ">
					<div class="nightbird">
						<h1>IndoTufan | All India Online JEE Main Test Series</h1>
						<h3>Test Series for JEE Main</h3>
						<button class="btn-home"href="#signupbox" role="button" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Get Started</button>
						<a class="btn-home"href="syllabus.php" style="text-decoration:none;transition: all .35s;">Syllabus</a>
						<a class="btn-home"href="#" style="text-decoration:none;transition: all .35s;">Time Table</a>
						<a class="btn-home"href="ranklist.php" style="text-decoration:none;transition: all .35s;">Last Ranklist</a>
					</div>
				</div>
			</div>
		    <?php
		} ?>
	</div>
	<?php
	if(!isset($_SESSION['logintemp']))
		{
			?>
			<section style="background-color:#213948;padding-top:50px;padding-bottom:50px;"id="aboutheading">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
					<h1 style="margin-bottom:10px;"class="part2-noti">Latest Future Test</h1><hr>
					<div style="background-color:white;padding:20px;"><?php 
					require_once("welcome.php");
					$ss=mysqli_query($con,"select * from all_test where exam_type='jee_main_series' or exam_type='jee_main_support' order by s_no desc limit 0,5");
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
							echo "<tr style='border-bottom:1px solid gray;'><td align='right'>".exam_type($exam_type)."</td></tr>";
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
					$sql_rank=mysqli_query($con,"select uid from all_test where rank_status='1' and (exam_type='jee_main_series' or exam_type='jee_main_support') order by s_no desc limit 0,1");
					if(mysqli_num_rows($sql_rank)>0){
						while($row_rank=mysqli_fetch_assoc($sql_rank)){
							makerank($row_rank['uid'],$con);
						}
					}
					?>
					
					
					</div>
					</div>
					</div>
					<div class="row">
					</div>
				</div>
			</section>
  <!--/row-->
   <?php } else {
	   //require_once("basic2.php");
	  ?>
   <div class="container">
		<div class="row"id="">
			<div style="margin-top:30px;">
				<div class="row">
				<div class="col-md-8">
						<?php
						require_once("welcome.php");
						if(isset($_REQUEST['id']))
	{
	$exam_uid=securedata($_REQUEST['id']);
	$sq=mysqli_query($con,"select * from all_test where uid='$exam_uid' and exam_for_display='1' and (exam_type='jee_main_series' or exam_type='jee_main_support')");
	}else{
		$sq=mysqli_query($con,"select * from all_test where exam_for_display='1' and ready_to_run='1' and (exam_type='jee_main_series' or exam_type='jee_main_support') order by s_no desc limit 1");
	}
						//$sq=mysqli_query($con,"select * from all_test where exam_for_display='1' and ready_to_run='1' and activated='1' and (exam_type='gate_series' or exam_type='gate_support')order by s_no desc limit 0,1");
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
											<tr><td>Starting Time : </td><td align="right"><?php echo time_($starting_time).", &nbsp;".month_($starting_month)." ".$starting_day.' '.$starting_year.".";?></td></tr>
											<tr><td>Result/Rank Time : </td><td align="right"><?php echo time_($ending_time).", &nbsp;".month_($ending_month)." ".$ending_day.' '.$ending_year.".";?></td></tr>
										</table>
									</p>
									<a class="btn-home comp"href="#" style="text-decoration:none;transition: all .35s;width:100%;text-align:center"onclick="startexam('<?php echo $exam_uid; ?>')">Enter In Exam</a>
									</div>
<?php
							}
						}
						else{
					 echo "<hr>No Any Test<hr>";
				 }
?>
   </div>
				<div class="col-md-4">
				 <h3>Future Jee Main Exams</h3>
				 <table class="table">
<div class="list-group">
<?php
				  $sqq=mysqli_query($con,"select * from all_test where exam_type='jee_main_series' or exam_type='jee_main_support' order by s_no desc limit 10");
				 $series_no=mysqli_num_rows($sqq);
				 if($series_no>0)
				 {
					 while($row=mysqli_fetch_assoc($sqq))
					{
						 $starting_time=$row['starting_time'];
						 $exam_uid_=$row['uid'];
								$starting_month=$row['starting_month'];
								$starting_year=$row['starting_year'];
								$starting_day=$row['starting_day'];
								$ending_time=$row['ending_time'];
								$ending_day=$row['ending_day'];
								$ending_month=$row['ending_month'];
								$ending_year=$row['ending_year'];
								$s_no=$row['s_no'];
								$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day.$starting_time);
								$start_date_only   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day);
								$now    = new DateTime();
								$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day.$ending_time);
								$counter=0;
						 if(isset($_REQUEST['id']))
	{
	$url_id=securedata($_REQUEST['id']);
	}
	else{
		$url_id=" ";
	}
								if($start_date   >= $now)
								{
									?>
									<a href="?id=<?php echo $exam_uid_; ?>" class="list-group-item <?php if($url_id==$exam_uid_){echo 'active'; }?>">
									<div style="float:right"><?php echo time_($starting_time).', '.month_($starting_month).' '.$starting_day.' '.$starting_year; ?></div><div><?php echo $row['exam_name']; ?></div>
									</a>
									<?php
								}
					}
				 }else{
					 echo "No Any Test<hr>";
					 echo "<br>Support Us - Donate Money so that we can provide free test series";
				 }
?>
</div>
				 <?php
				 ?>
</table>				 
				 </div>
				</div>
			</div>
		</div>
	</div>
   <?php }
   ?>
	<?php include_once("footer0pad.php"); 
	?>
	</body>
</html>