<?php 
//chacked security k1
session_start();
$_SESSION['song_source_check']=0;
unset($_SESSION['song_source_checkvalue']); 
$_SESSION['song_source_checkvalue2']=0; 
setcookie("song_source_check","0");
require_once("welcome.php");
$nameX=$_SESSION['nameX'];
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
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
		<head>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8">
				<meta charset="utf-8">
				<title><?php echo $cost_name; ?></title>
				<meta name="generator" content="Bootply" />
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
				<link href="css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
				<link rel="stylesheet" href="font.css">
				<link rel="stylesheet" href="ionicons/css/ionicons.min.css">
				<link rel="icon" href="img/nightlogo.png" type="image/x-icon">
				<meta name="description" content="<?php echo $cost_name ?>,Member of Night Bird">
				<meta name="keywords" content="<?php echo $cost_name ?>,profile night bird,contact,Night bird, Nightbird,nightbird.in,competition platform,online competition">
				<link rel="alternate" href="http://nightbird.in" hreflang="en-us" />
				<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
				<![endif]-->
				
				<link href="css/styles.css" rel="stylesheet">
				
				<script>
				function addmember_reg()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					var email_reg=$("#email_reg").val();
					var email_conform_reg=$("#email_conform_reg").val();
					var cc_reg=$("#cc_reg").val();
			
					var dataString = '&email_reg='+email_reg +'&email_conform_reg='+ email_conform_reg +'&cc_reg='+ cc_reg ;
					$.ajax({
						type: "POST",
						data: dataString,
						url: "addregincompetition.php",
						cache: false,
						success: function(result){
							$("#general").modal('show');
							$("#generalbody").html(result);
							$("#generalheading").html("Conform This Person");
						$("#myButton").removeClass("disabled");
						$("#msg1").html(" ");
						}
					})
				}
				function conformaddmember()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Processing.. Please Wait");
					$("#generalheading").html("Processing.. Please Wait");
					$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'></center>");
					$.ajax({
						type: "POST",
						url: "addregincompetitionconform.php",
						cache: false,
						success: function(result){
							$("#myButton").  removeClass("disabled");
							$("#msg1").html(result);
							$("#generalbody").html(result);
						}
					})
				}
				function changecover()
				{
					$("#cover").slideToggle();
				}
				function makecovervideo()
				{
					$("#general").modal('show');
					$("#generalheading").html("Enter YouTube link of your video");
					$("#generalbody").html("<center>Loading...</center>");
					$.ajax({
						type: "POST",
						url: "load_enter_cover_video_link.php",
						cache: false,
						success: function(result){
							$("#generalbody").html(result);
						}
					})
					
				}
				function changemycovervideo()
				{
					var linkofcovervideo=$("#linkofcovervideo").val();
					var dataString = '&linkofcovervideo='+linkofcovervideo ;
					$.ajax({
						type: "POST",
						data: dataString,
						url: "changecovervideo.php",
						cache: false,
						success: function(result){
							$("#generalbody").html(result);
						}
					})
				
				}
				</script>
			
		</head>
		<body>
				<?php include_once("head.php");?>
			<div style='position:absolute;left:250px;right:0;margin-top:50px;background-color:white;'>
			<div style="background-color:#002D3C;padding:20px 20px 0px 20px;">
			<div><i class="ion-videocamera"style="color:white;font-size:30px;cursor:pointer;"onclick="changecover()"></i></div>
						<div style="position:absolute;width:170px;background-color:white;z-index:6;display:none;"id="cover">
						<button class="btn btn-success"style="width:100%"onclick="makecovervideo()">Change Cover Video</button>
						<button class="btn btn-success"style="width:100%">Change Cover Image</button>
						</div>
						<?php 				if($cost_crop_pic=='0' ){
									?>
									<img src="upload_images/default.jpg"alt="NightBird Default Image"class="img img-responsive img-thumbnail img-circle"style="height:150px;margin-top:50px;">
								    <?php
								}else if(!isset($_SESSION['logintemp']))
								{
									?>
									<img src="upload_images/default.jpg"alt="NightBird Default Image"class="img img-responsive img-thumbnail img-circle"style="height:150px;margin-top:50px;">
								    <?php
								}
								
								else{
								if($cost_crop_privacy=="public")
								{ 
										?><span style="cursor:pointer;"href="#general"role="button" data-toggle="modal"onclick="zoomprofilepic('<?php echo $cost_image ;?>','<?php echo $cost_name;?>')"><?php 
								}      
								?><table ><tr><td style="padding:10px;"><img src="upload_images/crop/<?php if($cost_crop_privacy=="public"){echo $cost_crop_pic; } else { echo "default.jpg"; }?>"class="img img-responsive img-thumbnail "style="height:150px;margin-top:50px;"></td><td valign="bottom"><h1 style="margin:0px;padding:0px;"><?php echo $nameX;?></h1></td></tr></table>
								<?php if($cost_crop_privacy=="public"){ ?></span><?php } }?> <br><br>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  
    <li role="presentation" class="active"><a href="#reg" aria-controls="reg" role="tab" data-toggle="tab"style="color:rgb(20, 169, 211);">Profile</a></li>
    <li role="presentation"><a href="#unreg" aria-controls="unreg" role="tab" data-toggle="tab"style="color:rgb(20, 169, 211);">Edit Profile</a></li>
   
  </ul>
</div>
  <!-- Tab panes -->
 <div class="tab-content"style="padding:20px;">

  <div role="tabpanel" class="tab-pane fade in active" id="reg">
  
 <?php
			$uid_op=$_SESSION['uidperson'];
			$fulldetail_op="fulldetail".$uid_op;
			$sql=mysqli_query($con,"select * from `$fulldetail_op`");
			if(mysqli_num_rows($sql)>0)
			{
				while($rr=mysqli_fetch_assoc($sql))
				{
					?>
				<div class="row">
				<div class="col-lg-12">
				<p>Your Id is <?php echo $rr['id']; ?>, You can also login using your id with your password</p>
				</div>
				
				</div>
				 <div class="row">
				 <div class="col-md-4"><h3><center>Contact Info</center></h3>
				  <table style="width:100%"class="table">
				  <tr><td>Email</td><td><?php echo $rr['email']; ?></td></tr>
			  <tr><td>Email Privacy</td><td><?php echo $rr['email_privacy']; ?></td></tr>
			  <tr><td>Mobile no Privacy</td><td><?php echo $rr['mobile_no_privacy']; ?></td></tr>
			  <tr><td>mobile No</td><td><?php echo $rr['mobile_no']; ?></td></tr>
				  <tr><td>Home country</td><td><?php echo $rr['home_country']; ?></td></tr>
			  <tr><td>Home State</td><td><?php echo $rr['home_state']; ?></td></tr>
			  <tr><td>Home City</td><td><?php echo $rr['home_city']; ?></td></tr>
				  <tr><td>Home Address</td><td><?php echo $rr['home_address']; ?></td></tr>
			  <tr><td>Current Country</td><td><?php echo $rr['current_country']; ?></td></tr>
			  <tr><td>Current State</td><td><?php echo $rr['current_state']; ?></td></tr>
			  <tr><td>current City</td><td><?php echo $rr['current_city']; ?></td></tr>
			  <tr><td>Current Postal Code</td><td><?php echo $rr['current_postal_code']; ?></td></tr>
			  <tr><td>Home postal Code</td><td><?php echo $rr['home_postal_code']; ?></td></tr>
			  </table>
				 </div>
				 <div class="col-md-4"><h3><center>Basic Info</center></h3>
				 <table style="width:100%"class="table">
					  <tr><td>Name</td><td><?php echo $rr['name']; ?></td></tr>
					<tr><td>Gender</td><td><?php echo $rr['gender']; ?></td></tr>
					<tr><td>DOB</td><td><?php echo $rr['dob']; ?></td></tr>
				
				   <tr><td>About me</td><td><?php echo $rr['about_me']; ?></td></tr>
			  <tr><td>Interest</td><td><?php echo $rr['interest']; ?></td></tr>
			  
			  <tr><td>Hobbies</td><td><?php echo $rr['hobbies']; ?></td></tr>
			  <tr><td>Aim</td><td><?php echo $rr['aim']; ?></td></tr>
			  <tr><td>achievement</td><td><?php echo $rr['achievement']; ?></td></tr>
			  <tr><td>expectation</td><td><?php echo $rr['expectation']; ?></td></tr>
			  
				 </table>
				 
				 
				 
				 
				 </div>
				 <div class="col-md-4"><h3><center>Work and Education</center></h3>
				 <table style="width:100%"class="table">
					<tr><td>Current Word</td><td></td></tr>
					<tr><td>Past Work</td><td></td></tr>
					<tr><td>Education</td><td></td></tr>
				 </table>
				 
				 
				 </div>
				 </div>
			  
			  <br>
			  <table>
			 cover_link
			 
			  <tr><td>Image Privacy</td><td><?php echo $rr['image_privacy']; ?></td></tr>
			  <tr><td>Id</td><td></td></tr>
			  <tr><td>Website</td><td></td></tr>
			 
			 
			 
			 
			 
			  <tr><td></td><td></td></tr>
			  </table>
			
			
				
				<?php
				}
				
			}
			
			?>
  
 
  </div>
  <div role="tabpanel" class="tab-pane fade" id="unreg">
    <div class="form-group"> 
			  <div style="">
			  
			  <br>
			 <label for="email_reg">Email</label>
			<input type="text"name="email_reg"id="email_reg"class="form-control"style="width:100%;height:40px;margin-bottom:10px;"placeholder="Enter email of that person"/>
			<label for="email_conform_reg">Re Enter Email </label>
			<input type="text"name="email_conform_reg"id="email_conform_reg"class="form-control"style="width:100%;height:40px;margin-bottom:10px;"placeholder="Re enter that email"/>
						<label for="cc_reg">CC (<a href="#">Need Help?</a>)</label>
			<input type="text" id="cc_reg"style="width:100%;height:40px;margin-bottom:10px;"class="form-control"placeholder="CC">
			
			
			
		<button value="Next"class="btn btn-success"onclick="addmember_reg()" id="myButton">Next</button><span id="msg1"></span>
			</div>
			</div>
  </div>
 
</div>

</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			</div>

<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->














						</div>
				</div>
				
				<?php include_once("model.php"); ?>
				<?php //include_once("footer.php"); ?>
				<!-- script references -->
				<script src="js/j.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<link href="css/background.css" rel="stylesheet">
				<?php include_once("google.php"); ?>
				
		</body>
</html>
<?php 
mysql_close();
?>