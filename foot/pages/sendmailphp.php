<?php
//checked secutity k1
require_once("session.php");
require_once("../../welcome.php");

$f1=mysqli_real_escape_string($con,$_POST['f1']); // heading

    $f2=mysqli_real_escape_string($con,$_POST['f2']); // short description
    $f4=mysqli_real_escape_string($con,$_POST['f4']); // Image
	//$f5=mysqli_real_escape_string($con,$_POST['f5']);
	//$f6=mysqli_real_escape_string($con,$_POST['f6']); 
	$f7=mysqli_real_escape_string($con,$_POST['f7']); // Big Description
	$f8=mysqli_real_escape_string($con,$_POST['f8']); // Button Text
	$f9=mysqli_real_escape_string($con,$_POST['f9']);  // Button Link
	$f10=mysqli_real_escape_string($con,$_POST['f10']); // Facebook Link
	//$f11=mysqli_real_escape_string($con,$_POST['f11']);
	//$f12=mysqli_real_escape_string($con,$_POST['f12']);
	$f13=mysqli_real_escape_string($con,$_POST['f13']); // Contact Number
	$f14=mysqli_real_escape_string($con,$_POST['f14']); // Email from
	$f15=mysqli_real_escape_string($con,$_POST['f15']); // terms link
	$f16=mysqli_real_escape_string($con,$_POST['f16']); // F16 privacy link
	$f17=mysqli_real_escape_string($con,$_POST['f17']); // Unsubscribe link
	$f18=mysqli_real_escape_string($con,$_POST['f18']); // Subject
	$f19=mysqli_real_escape_string($con,$_POST['f19']); // To if single
	$f20=mysqli_real_escape_string($con,$_POST['f20']); // To 
	$f21=mysqli_real_escape_string($con,$_POST['f21']); //F21 from
	$f22=mysqli_real_escape_string($con,$_POST['f22']); // Table Name
	$f23=mysqli_real_escape_string($con,$_POST['f23']); // From Name

	
	
	if(empty($f21)){
		$f21="info@indotufan.com";
	}
	
	
	
	if(isset($_FILES['f3']['name'])){
$tmp = $_FILES['f3']['tmp_name'];
$name = mysqli_real_escape_string($con,$_FILES['f3']['name']);
$image_name = mysqli_real_escape_string($con,$_FILES['f3']['name']);

$extension = substr($name, strrpos($name, '.')+1);
$extension = strtolower($extension);
$file_formats = array("png","jpg","jpeg","gif","tif","raw");
$filepath = "send_msg_img/";
$newimagename2 = $uid=md5(uniqid() . time()).".".$extension;
	}else{
		$newimagename2="";
	}
	$img_loc='http://indotufan.com/foot/pages/send_msg_img/'.$newimagename2;
	
 if (strlen($image_name)) 
	{
		if (in_array($extension, $file_formats))  // check it if it's a valid format or not
		{

			if(move_uploaded_file($tmp, $filepath.$newimagename2)) 
			{ 		
				$image_status=true;
			}else{
				$image_status=false;
			}
		}else{
			die("invalid image format");
		}
	}else{
		echo "No Image";
				$image_status=false;
			}
	if($f20==1)
	{
	$sql=mysqli_query($con,"select name,email from allmember");
	if(mysqli_num_rows($sql)>0)
	{
		while($row1=mysqli_fetch_assoc($sql))
		{
			$fname=$row1['name'];
			$f19=$row1['email'];
			if(empty($f1))
			{
				$f1="Dear ".$fname. "!";
			}
			if(send_nice_email($f1,$f2,$f3,$f4,'','',$f7,$f8,$f9,$f10,'','',$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$img_loc,$image_status))
			{
				echo "Message Sent to $f19";
			}
			else{
				echo "Sending Failed";
			}
		}
	}	
	}
	else if($f20==2)
	{
		$sql=mysqli_query($con,"select name,email from `$f22`");
		if(mysqli_num_rows($sql)>0)
		{
			while($row1=mysqli_fetch_assoc($sql))
			{
				$fname=$row1['name'];
				$f19=$row1['email'];
				if(empty($f1))
				{
					$f1="Dear ".$fname." !";
				}
				if(send_nice_email($f1,$f2,$f3,$f4,'','',$f7,$f8,$f9,$f10,'','',$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$img_loc,$image_status))
				{
					echo "Message Sent to $f19";
				}
				else
				{
					echo "Sending Failed";
				}
			}
		}
						
	}
	else if($f20==3)
	{
		if(send_nice_email($f1,$f2,'',$f4,'','',$f7,$f8,$f9,$f10,'','',$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$img_loc,$image_status))
		{
			echo "Message Sent to $f19";
		}
		else{
			echo "Sending Failed";
		}
	}
		
                                  

?>