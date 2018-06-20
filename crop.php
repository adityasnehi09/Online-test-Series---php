<?php
session_start();
require_once("loginrequired.php");
//chacked security k1
/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

if (isset($_POST['submitcropimage']))
{
	
	$jpeg_quality = 180;
	$targ_w = $targ_h = 150;
	if(isset($_SESSION['cropimgsrc'])){
    $imgsess=$_SESSION['cropimgsrc'];
	$src = "upload_images/resize/resize".$imgsess;
	$folder="upload_images/crop/crop".$imgsess;
	$croppicname="crop".$imgsess;

	list($realwidth, $realheight) = getimagesize($src);
	$hightratio=$realheight/150;
	$widthratio=$realwidth/150;
	$targ_h=$_POST['boxheight']/$hightratio;
	$targ_w=$_POST['boxwidth']/$widthratio;
	
	$extension = substr($imgsess, strrpos($imgsess, '.')+1);
    $extension = strtolower($extension);
 	$img_r = imagecreatefromjpeg($src);
	

	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	
	
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	
	
	imagejpeg($dst_r,$folder,$jpeg_quality);
	require_once("welcome.php");
	
	$emailX=mysqli_real_escape_string($con,$_SESSION['emailX']);
	$cropimgsrc=mysqli_real_escape_string($con,$_SESSION['cropimgsrc']);
	$myuid=$_SESSION['uidperson'];
	 $detaillist="fulldetail".$myuid;
	$privacy=mysqli_real_escape_string($con,$_POST['privacy']);
	
	
		if(mysqli_query($con,"update `allmember` set crop_pic='$croppicname',privacy='$privacy' where email='$emailX' "))
	{
header('location: /');	
}
	
	mysql_close();
	

	exit;
	}else{
header('location: /');		
	}
}

// If not a POST request, display page below:

?><!DOCTYPE html>
<html lang="en">
<head>
  

  <script src="js/jquery.js"></script>
  <script src="js/jquery.Jcrop.js"></script>

  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
  <script src="js/jquery.color.js"></script>
 
<script type="text/javascript">
  $(function(){
 var jcrop_api;
    $('#cropbox').Jcrop({
		 bgFade:     true,
      bgOpacity: .2,
      setSelect: [ 80, 70, 200, 200 ],
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
	$("#boxheight").val($("#cropbox").height());
	$("#boxwidth").val($("#cropbox").width());
	


  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };
  
  

  
  


</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
		 
</head>
<body>

<div class="container"style="">
<div class="row">
<div class="span12">

<div class="jc-demo-box">



		<!-- This is the image we're attaching Jcrop to -->
		<img src="upload_images/resize/resize<?php echo $_SESSION['cropimgsrc'];?>" id="cropbox" />


		<!-- This is the form that our event handler fills -->
		<form action="crop.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="hidden" id="boxwidth" name="boxwidth" />
			<input type="hidden" id="boxheight" name="boxheight" />
			<div>
	<h3>Choose Privacy Option</h3>
	<input type="radio"value="only_me"name="privacy"id="only_me" required> <label for="only_me">Only Me</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"value="public"name="privacy"id="public"required>  <label for="public">Public</label> 
	</div> 
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse"name="submitcropimage" />
			
		</form>
		

	</div>
	</div>
	
	</div>
	</div>
	
	
	</body>

</html>
