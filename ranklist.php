<?php 
 //chacked security k1
session_start();
require_once("welcome.php");
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
	require_once("welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_$examid";
	$question_="question_".$examid;
	$sql1=mysqli_query($con,"select no_of_question,exam_name from all_test where uid='$examid'");
	if(mysqli_num_rows($sql1)>0)
	{
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$no_of_question=$row1['no_of_question'];
			$exam_name=$row1['exam_name'];
		}
	}
	if(isset($_REQUEST['u']))
	{
	require_once("welcome.php");
	$us_id= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['u']), ENT_QUOTES, 'UTF-8');
	$sql_mem=mysqli_query($con,"select name,image,privacy from allmember where id='$us_id'");
	if(mysqli_num_rows($sql_mem)>0)
	{
		while($row_m=mysqli_fetch_assoc($sql_mem))
		{
			$user_name_=$row_m['name'];
			$image_=$row_m['image'];
			$privacy_=$row_m['privacy'];
			if($privacy_=='public'){
				$image_="upload_images/real/".$image_;
			}else{
				$image_="img/indotufanlogo.png";
			}
		}
	}
	}
}

?>

<?php if(isset($user_name_) && isset($exam_name)){
	$title="Rank of $user_name_ | $exam_name - IndoTufan";
	
}else if(isset($exam_name)){
	$title="Rank List | $exam_name - IndoTufan";
	
}else{
	$title="Rank List | IndoTufan";
	
}
?>
<title><?php echo $title; ?></title>
		 <meta property="og:site_name" content="IndoTufan">
    
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:image" content="<?php echo $image_; ?>">
    
	    <meta name="description" content="Rank list, IndoTufan Test Series">
	    <meta name="keywords" content="indotufan,indo tufan,indotufan.com,test series,test,rank,ranklist,air,AIR,all india rank">	 
	
	</head>
	<body style="">
	<?php include_once("headertop.php");?>
	<br>
	<!--main-->
	 <div class="container">
		<div class="row">
		<div class="col-md-12">
			<?php
if(isset($_REQUEST['id']))
{
	require_once("welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_$examid";
	$question_="question_".$examid;
	$sql1=mysqli_query($con,"select no_of_question,exam_name from all_test where uid='$examid'");
	if(mysqli_num_rows($sql1)>0)
	{
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$no_of_question=$row1['no_of_question'];
			$exam_name=$row1['exam_name'];
		}
	}
	?>
	<ol class="breadcrumb"style="margin:10px 0px 0px 0px">
  <li><a href="ranklist">Rank List</a></li>
  <li class="active"><?php echo $exam_name; ?></li>
</ol>
	<?php
	if(isset($_REQUEST['u'])){
		$user_id=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['u']), ENT_QUOTES, 'UTF-8');
	$sql=mysqli_query($con,"select * from `$que_ans_list` where user_id='$user_id'");
	if(mysqli_num_rows($sql)>0)
	{
		?>
		<table class="table"style="background-color:#162630;color:white">
		<tr><th><?php echo $exam_name;?></th><th>AIR</th></tr>
		<?php
		while($row=mysqli_fetch_assoc($sql))
		{
			$illagel_attemp=$row['illagel_attemp'];
			$user_id=$row['user_id'];
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
			$sql_get_user=mysqli_query($con,"select name,crop_pic from allmember where id='$user_id'");
			if(mysqli_num_rows($sql_get_user)>0)
			{
				while($row_user=mysqli_fetch_assoc($sql_get_user))
				{
					$user_name=$row_user['name'];
					$crop_pic=$row_user['crop_pic'];
				}
			}
			if(isset($crop_pic))
			{
				if($crop_pic=='0')
				{
					$crop_pic="default.jpg";
				}
			}else
			{
				$crop_pic="default.jpg";
			}
			?>
			<tr><td><img src="upload_images/crop/<?php echo $crop_pic; ?>"height="50"class="img img-thumbnail"style="height:100px"alt="<?php echo $user_name; ?>">&nbsp;&nbsp; <a href="profile.php?id=<?php echo $user_id; ?>"style="color:white"> <?php echo $user_name;?></td><td style="color:white;font-size:20px;"style="vertical-align:middle"><p style="margin-top:30px;color:white;font-weight:bold;font-size:25px;"><?php echo $rank; ?></p></td></tr>
			<?php
		}
		?>
		</table>
		<?php
	}
	}
	$sql=mysqli_query($con,"select * from `$que_ans_list` order by rank asc");
	if(mysqli_num_rows($sql)>0)
	{
		?>
		<table class="table" style="background-color:#eeeeee;">
		<tr><th><?php echo $exam_name;?></th><th>AIR</th></tr>
		<?php
		while($row=mysqli_fetch_assoc($sql))
		{
			$illagel_attemp=$row['illagel_attemp'];
			$user_id=$row['user_id'];
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
			$sql_get_user=mysqli_query($con,"select name,crop_pic from allmember where id='$user_id'");
			if(mysqli_num_rows($sql_get_user)>0)
			{
				while($row_user=mysqli_fetch_assoc($sql_get_user))
				{
					$user_name=$row_user['name'];
					$crop_pic=$row_user['crop_pic'];
				}
			}
			if(isset($crop_pic))
			{
				if($crop_pic=='0')
				{
					$crop_pic="default.jpg";
				}
			}else
			{
				$crop_pic="default.jpg";
			}
			?>
			<tr><td><img src="upload_images/crop/<?php echo $crop_pic; ?>"height="50"alt="<?php echo $user_name; ?>">&nbsp;&nbsp; <a href="profile.php?id=<?php echo $user_id; ?>"> <?php echo $user_name;?></td><td><?php echo $rank; ?></a></td></tr>
			<?php
		}
		?>
		</table>
		<?php
	}
}
else
{
	$sql1=mysqli_query($con,"select uid,exam_name from all_test order by s_no desc");
	if(mysqli_num_rows($sql1)>0)
	{
	?><table class="table"style="background-color:#eeeeee;"><tr><th>Test Name</th><th>Rank Link</th></tr><?php
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$uid=$row1['uid'];
			$exam_name=$row1['exam_name'];
			?>
			<tr><td><?php echo $exam_name ;?></td><td><?php echo "<a href='ranklist.php?id=$uid'>Click Here</a>"; ?></td></tr>
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
	<br>
   <?php 
	include_once("footer0pad.php"); 
?>
	</body>
</html>