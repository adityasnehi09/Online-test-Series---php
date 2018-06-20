<?php 
//chacked security k1
session_start();
require_once("welcome.php");
if(isset($_GET['id']))
{
		$user_id=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
}
else
{
		if(isset($_SESSION['user_idX']))
		{
				$user_id=$_SESSION['user_idX'];
		}
		else
		{
				header("location: index.php");
		}
}
if(isset($_SESSION['emailX']))
{
		if(isset($_SESSION['user_idX']))
		{
				include_once("basic2.php");
				$myprivacy=$_SESSION['mycrop_privacy'];
				$mycrop_pic=$_SESSION['imagepic'];
				$cost_image=$_SESSION['myfullimage'];
				$my_image=$_SESSION['myfullimage'];
				$myid=$_SESSION['user_idX'];
				$myuid=$_SESSION['uidperson'];
				if($user_id==$_SESSION['user_idX'])
				{
						$cost_uid=$_SESSION['uidperson'];
						$cost_id=$_SESSION['user_idX'];
						$cost_name=$_SESSION['nameX'];
						$nameX=$_SESSION['nameX'];
						$cost_crop_privacy="public";
						$cost_crop_pic=$_SESSION['imagepic'];
						$myprivacy="public";
				}
				else	
				{
						$nameX=$_SESSION['nameX'];	
						require_once("welcome.php");
						$sql=mysqli_query($con,"select id,name,privacy,crop_pic,image,mobile_no_privacy,email_privacy,email,mobile_no,uid from allmember where id='$user_id' or uid='$user_id'");
						if(mysqli_num_rows($sql)>0)
						{
								while($rows=mysqli_fetch_assoc($sql))
								{   
										$cost_name=$rows['name'];
										$cost_crop_privacy=$rows['privacy'];
										$cost_crop_pic=$rows['crop_pic'];
										$cost_image=$rows['image'];
										$cost_mobile_no_privacy=$rows['mobile_no_privacy'];
										$cost_email_privacy=$rows['email_privacy'];
										$cost_email=$rows['email'];
										$cost_mobile_no=$rows['mobile_no'];
										$cost_uid=$rows['uid'];
										$cost_id=$rows['id'];
								}
						}else{
							header("location: index.php?from=invalid_url");
						}
				}
		}
}
else
{
		require_once("welcome.php");
		$sql=mysqli_query($con,"select id,name,privacy,crop_pic,image,mobile_no_privacy,email_privacy,email,mobile_no,uid from allmember where id='$user_id'");
		if(mysqli_num_rows($sql)>0)
		{
				while($rows=mysqli_fetch_assoc($sql))
				{   
						$cost_name=$rows['name'];
						$cost_crop_privacy=$rows['privacy'];
						$cost_crop_pic=$rows['crop_pic'];
						$cost_image=$rows['image'];
						$cost_mobile_no_privacy=$rows['mobile_no_privacy'];
						$cost_email_privacy=$rows['email_privacy'];
						$cost_email=$rows['email'];
						$cost_mobile_no=$rows['mobile_no'];
						$cost_uid=$rows['uid'];
						$cost_id=$rows['id'];
				}
		}	
}
if($cost_crop_privacy!='public')
{
	$cost_crop_pic="default.jpg";
}
?>
<?php require_once("start_html_head.php"); ?>
				<title><?php echo $cost_name;?> | IndoTufan</title>
				<meta name="description" content="<?php echo $cost_name; ?> is on IndoTufan. Join IndoTugan to participate in Test Series.">
				<meta name="keywords" content="indoTufan,profile ,<?php $cost_name; ?>,indotufan,test series,gate,jee advance,jee main,iit,indo,tufan">
				<script>
				function zoomprofilepic(cost_image,name)
{
	$(document).ready(function(){
$("#generalheading").html(name);
$("#generalbody").html("<center><img src='upload_images/real/"+cost_image+"'class=''style='width:100%'></center>");
	})
}
				</script>
		</head>
		<body>
		<?php include_once("headertop.php");?>
			<div style='background-color:white;'>
			<div style="background-color:#002D3C;padding:20px 20px 0px 20px;">
			<div class="container">
			<h2 style='color:white'><b><b></h2>
			  		  </p><br><br><br><br>
					 <div style="position: absolute; left: 50%;">
    <div style="position: relative; left: -50%; margin-top:-75px;">
	<?php 
	if($cost_crop_pic=='0')
	{
		$cost_crop_pic="default.jpg";
		?>
		<span style="cursor:pointer;">
      <img src="upload_images/crop/<?php echo $cost_crop_pic; ?>"class="img img-circle"style='height:100px'>
			</span> 
		<?php
	}
			else{ 	?>  
	<span style="cursor:pointer;"href="#general"role="button" data-toggle="modal"onclick="zoomprofilepic('<?php echo $cost_image ;?>','<?php echo $cost_name;?>')">
      <img src="upload_images/crop/<?php echo $cost_crop_pic; ?>"class="img img-circle"style='height:100px'>
			</span> <?php } ?>
    </div>
  </div>
   <div style="position: absolute; left: 50%;">
    <div style="position: relative; left: -50%; margin-top:85px;">
	  <h2 style="font-size:35px"><?php echo $cost_name;?></h2>
    </div>
  </div>
		</div>
  <!-- Nav tabs -->
  <div class="container">
</div>
</div>
  <!-- Tab panes -->
  <div class="container">
 <br><br><br><br><br><br>
    <div class="form-group"> 
			  <div style="">
			  <hr>
			  <br>
					</div>
			</div>
  </div>
</div>
</div>
</div>
			</div>
						</div>
				</div>
				<?php 
include_once("footer0pad.php"); 
?>
				<!-- script references -->
		</body>
</html>
