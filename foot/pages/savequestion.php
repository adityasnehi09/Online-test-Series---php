<?php
require_once 'session.php';
//checked secutity k1


require_once("welcome.php");

$quno=mysqli_real_escape_string($con,$_REQUEST['queno']);

	$question=$_REQUEST['que_'.$quno];
	$sol_question=$_REQUEST['sol_que_'.$quno];

$question=mysqli_real_escape_string($con,$_REQUEST['que_'.$quno]);
$sol_question=mysqli_real_escape_string($con,$_REQUEST['sol_que_'.$quno]);

$op1=mysqli_real_escape_string($con,$_REQUEST['op1_'.$quno]);
$op2=mysqli_real_escape_string($con,$_REQUEST['op2_'.$quno]);
$op3=mysqli_real_escape_string($con,$_REQUEST['op3_'.$quno]);
$op4=mysqli_real_escape_string($con,$_REQUEST['op4_'.$quno]);

$ans1=mysqli_real_escape_string($con,$_REQUEST['ans1_'.$quno]);
$ans2=mysqli_real_escape_string($con,$_REQUEST['ans2_'.$quno]);
$ans3=mysqli_real_escape_string($con,$_REQUEST['ans3_'.$quno]);
$ans4=mysqli_real_escape_string($con,$_REQUEST['ans4_'.$quno]);
$markque=mysqli_real_escape_string($con,$_REQUEST['markque_'.$quno]);
$nmarkque=mysqli_real_escape_string($con,$_REQUEST['nmarkque_'.$quno]);
$nmarkque=mysqli_real_escape_string($con,$_REQUEST['nmarkque_'.$quno]);
$solution_link=mysqli_real_escape_string($con,$_REQUEST['solution_link_'.$quno]);
$q_uid=mysqli_real_escape_string($con,$_REQUEST['que_id']);

if(!isset($quno) || strlen(trim($quno))==0)
{
	die("Question number Not present, Contact Aditya Snehi");
}
if(!isset($markque) || strlen(trim($markque))==0)
{
	die("Please Provide Marks for question no ".$quno);
}if(!isset($nmarkque) || strlen(trim($nmarkque))==0)
{
	die("Please Provide Negative Marks for question no ".$quno);
}

if(!isset($op1) || strlen(trim($op1))==0)
{
	die("Enter Option 1");
}
if(!isset($op2) || strlen(trim($op2))==0)
{
	die("Enter Option 2");
}
if(!isset($op3) || strlen(trim($op3))==0)
{
	die("Enter option 3");
}
if(!isset($op4) || strlen(trim($op4))==0)
{
	die("Enter Option 4");
}
if(!isset($ans1) || strlen(trim($ans1))==0)
{
	die("Please tell us option 1 is correct or incorrect");
}
if(!isset($ans2) || strlen(trim($ans2))==0)
{
	die("Please tell us option 2 is correct or incorrect");
}

if(!isset($ans3) || strlen(trim($ans3))==0)
{
	die("Please tell us option 3 is correct or incorrect");
}
if(!isset($ans4) || strlen(trim($ans4))==0)
{
	die("Please tell us option 4 is correct or incorrect");
}

if(!isset($q_uid) || strlen(trim($q_uid))==0)
{
	die("Absence of Question id, Please re-login ");
}



if(isset($_FILES['img_'.$quno]['name']))
{
	$imgname=mysqli_real_escape_string($con,$_FILES['img_'.$quno]['name']);
	$tmp = $_FILES['img_'.$quno]['tmp_name'];
	$newimagename=md5(uniqid() . time()) ;
$extension = substr($imgname, strrpos($imgname, '.')+1);
$extension = strtolower($extension);
$file_formats = array("png","jpg","jpeg","gif");
$filepath = "../question_image/";
$newimagename =  mysqli_real_escape_string($con,$newimagename.".".$extension);
$size = $_FILES['img_'.$quno]['size'];
}
if(isset($_FILES['solution_img_'.$quno]['name']))
{
	$solution_imgname=mysqli_real_escape_string($con,$_FILES['solution_img_'.$quno]['name']);
	$solution_tmp = $_FILES['solution_img_'.$quno]['tmp_name'];
	$solution_newimagename=md5(uniqid() . time()) ;
$solution_extension = substr($solution_imgname, strrpos($solution_imgname, '.')+1);
$solution_extension = strtolower($solution_extension);
$solution_file_formats = array("png","jpg","jpeg","gif");
$solution_filepath = "../solution_img/";
$solution_newimagename =  mysqli_real_escape_string($con,$solution_newimagename.".".$solution_extension);
$solution_size = $_FILES['solution_img_'.$quno]['size'];
}

$refererurl= $_SERVER['HTTP_REFERER']; 
date_default_timezone_set('Asia/Calcutta');
$timing= date('d/m/Y , h:i a');
$ip = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);

if(isset($_FILES['img_'.$quno]['name']))
{
	if($size<2097152)
		{
           if (strlen($imgname)) 
		   {
 	            if (in_array($extension, $file_formats))  // check it if it's a valid format or not
                {		     
	            	  if(move_uploaded_file($tmp, $filepath. $newimagename)) 
				      { 		
              		       
					  }
				}else{
					die("Invalid question image format");
				}
		   }else{
			die("No img");  
		   }
		}else{
			echo "File size must be less then 2 mb";
		}
}else{
$newimagename=null;
}	
if(isset($_FILES['solution_img_'.$quno]['name']))
{
	if($solution_size<2097152)
	{
		if (strlen($solution_imgname)) 
		{
			if (in_array($solution_extension, $solution_file_formats))  // check it if it's a valid format or not
			{		     
				if(move_uploaded_file($solution_tmp, $solution_filepath. $solution_newimagename)) 
				{ 	
				}
			}
			else
			{
				die("Invalid question image format");
			}
		}else
		{
			die("No img");  
		}
	}else
	{
		die("File size must be less then 2 mb");
	}
}
else{
	$solution_newimagename=null;
}		
if(mysqli_query($con,"insert into `$q_uid`(question_no,question,option1,option2,option3,option4,check_option1,check_option2,check_option3,check_option4,question_approve,q_img,positive_mark,negative_mark,solution_link,solution_img,solution) values('$quno','$question','$op1','$op2','$op3','$op4','$ans1','$ans2','$ans3','$ans4','0','$newimagename','$markque','$nmarkque','$solution_link','$solution_newimagename','$sol_question')"))
{	
	echo 1;
}
	
                                     

?>