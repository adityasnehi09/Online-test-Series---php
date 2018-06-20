<?php
//checked secutity k1
session_start();
if(!isset($_SESSION['logintemp']))
{
header("location: loginForm.php?ref=joinincompetition.php");
}
require_once("welcome.php");
$refererurl= $_SERVER['HTTP_REFERER']; 
date_default_timezone_set('Asia/Calcutta');
$timing= date('d/m/Y , h:i a');
$ip = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);
$tmp = $_FILES['imageupload']['tmp_name'];
$name = mysqli_real_escape_string($con,$_FILES['imageupload']['name']);
$name=htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$newimagename=md5(uniqid() . time()) ;
$extension = substr($name, strrpos($name, '.')+1);
$extension = strtolower($extension);
$file_formats = array("png","jpg","jpeg","gif");
$filepath = "upload_images/";
$newimagename2 =  mysqli_real_escape_string($con,$newimagename.".".$extension);
$size = $_FILES['imageupload']['size'];
if (in_array($extension, $file_formats))  // check it if it's a valid format or not
{

// Get new sizes
list($width, $height) = getimagesize($tmp);
$ratioX=$width/$height;
$jpeg_quality = 100;
$newwidth = 300;
$newheight = 300/$ratioX;

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
if($extension=="png"){
		$source = imagecreatefrompng($tmp);
}
else if($extension=="jpg" || $extension=="jpeg" ){
		$source = imagecreatefromjpeg($tmp);
}
else if($extension=="gif" ){
		$source = imagecreatefromgif($tmp);
}
else{
		$source = imagecreatefromjpeg($tmp);
}

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output

imagejpeg($thumb,"upload_images/resize/resize".$newimagename2,$jpeg_quality);
$myuid=$_SESSION['uidperson'];
$user_id=$_SESSION['user_idX'];
$fulldetail=mysqli_real_escape_string($con,"fulldetail".$myuid);
$emailX=mysqli_real_escape_string($con,$_SESSION['logintemp']);

 if($size<2097152)
 {
           if (strlen($name)) 
		   {
 	            if (in_array($extension, $file_formats))  // check it if it's a valid format or not
                {		     
	            	  if(move_uploaded_file($tmp, "upload_images/real/". $newimagename2)) 
				      { 		
              		        	
					            if(mysqli_query($con,"update allmember set image='$newimagename2' where email='$emailX' "))
						        {					
	                                echo "Please crop Image and select privacy of your image ";												
							        $_SESSION['cropimgsrc']=$newimagename2;
						        }
								
							
		              }
					 else
					 {
                             echo "Not Uploaded ..Please try again";
					 }
																		
					                        
				}
				else
		        {
                     echo "Invalid File type";
			    }       
	       }
		   else
		   {
			    echo "Error !! No File";
	       }
																   									
 }
 else{
	 echo "Size of file should less then 2 MB";
 }										
}	
else
{
      echo "Invalid File type";
}						 
                                       

?>