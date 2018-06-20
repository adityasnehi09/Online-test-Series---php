<?php 
//chacked security k1
session_start();
require_once("loginrequired.php");
$_SESSION['song_source_check']=0;
unset($_SESSION['song_source_checkvalue']); 
$_SESSION['song_source_checkvalue2']=0; 
setcookie("song_source_check","0");
require_once("welcome.php");
if(isset($_GET['id']))
{
		$user_id=mysqli_real_escape_string($con,$_GET['id']);
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
?>
<?php require_once("start_html_head.php"); ?>
				<title>Change Password - IndoTufan</title>
				<meta name="description" content="Enter current password and then enter new password two times in order to conferm it then click on change password button. ">
				<meta name="keywords" content="nightbird,password,password recovery,change my password ,my password,change password,password,online competition,competition platform,old password change,new password">
				<script>
				function changwpassword()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					var oldpass=$("#oldpass").val();
					var pass1=$("#pass1").val();
					var pass2=$("#pass2").val();
					var dataString = '&oldpass='+oldpass +'&pass1='+ pass1 +'&pass2='+ pass2;
					$.ajax({
						type: "POST",
						data: dataString,
						url: "conformchangepassword.php",
						cache: false,
						success: function(result){
							$("#general").modal('show');
							$("#generalbody").html(result);
							$("#generalheading").html("Password changing status");
						$("#myButton").removeClass("disabled");
						$("#msg1").html(" ");
						}
					})
				}
				</script>
		</head>
		<body>
		<?php include_once("headertop.php");?>
			<div style='background-color:white;'>
			<div style="background-color:#002D3C;padding:20px 20px 0px 20px;">
			<div class="container">
			<h2 style='color:white'><b>Change your password<b></h2>
			  		  </p>
		</div>
  <!-- Nav tabs -->
  <div class="container">
</div>
</div>
  <!-- Tab panes -->
  <div class="container">
  <div class="row">
  <div class="col-md-8">
    <div class="form-group"> 
			  <div style="">
			  <br>
			 <label for="oldpass">Current Password</label>
			<input type="password"name="oldpass"id="oldpass"class="form-control"style="width:100%;height:40px;margin-bottom:10px;"placeholder="Enter Current Password"/>
			<label for="pass1">New Password </label>
			<input type="password"name="pass1"id="pass1"class="form-control"style="width:100%;height:40px;margin-bottom:10px;"placeholder="Enter New Password"/>
						<label for="pass2">New password again </label>
			<input type="password" id="pass2"style="width:100%;height:40px;margin-bottom:10px;"class="form-control"placeholder="New Password Again">
		<button value="Change Password"class="btn btn-success"onclick="changwpassword()" id="myButton">Next</button><span id="msg1"></span>
			</div>
			</div>
			</div>
			 <div class="col-md-4"style="margin-top:25px">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2256342899303187"
     data-ad-slot="8242106756"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2256342899303187"
     data-ad-slot="8242106756"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
 </diiv>
  </div>
</div>
</div>
</div>
			</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
						</div>
				</div>
				<?php 
				include_once("footer0pad.php"); 
				?>
		</body>
</html>