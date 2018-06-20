<?php
//checked secutity k1
require_once 'session.php';
require_once("../../welcome.php");
$quno=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['queno']), ENT_QUOTES, 'UTF-8');
$question=$_REQUEST['que_'.$quno];
$sol_que=$_REQUEST['sol_que_'.$quno];
$op1=$_REQUEST['op1_'.$quno];
$op2=$_REQUEST['op2_'.$quno];
$op3=$_REQUEST['op3_'.$quno];
$op4=$_REQUEST['op4_'.$quno];
$ans1=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['ans1_'.$quno]), ENT_QUOTES, 'UTF-8');
$ans2=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['ans2_'.$quno]), ENT_QUOTES, 'UTF-8');
$ans3=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['ans3_'.$quno]), ENT_QUOTES, 'UTF-8');
$ans4=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['ans4_'.$quno]), ENT_QUOTES, 'UTF-8');
$markque=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['markque_'.$quno]), ENT_QUOTES, 'UTF-8');
$nmarkque=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['nmarkque_'.$quno]), ENT_QUOTES, 'UTF-8');
$solution_link=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['solution_link_'.$quno]), ENT_QUOTES, 'UTF-8');
$q_uid=htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['que_id']), ENT_QUOTES, 'UTF-8');
if(!isset($markque) || strlen(trim($markque))==0)
{
	die("Please Provide Marks for question no ".$quno);
}if(!isset($nmarkque) || strlen(trim($nmarkque))==0)
{
	die("Please Provide Negative Marks for question no ".$quno);
}
function death($data)
{
	die("<b style='color:red'>".$data."</b>");
}
if(!isset($quno) || strlen(trim($quno))==0)
{
	death("Question number Not present, Contact Aditya Snehi");
}
if(!isset($op1) || strlen(trim($op1))==0)
{
	death("Enter Option 1");
}
if(!isset($op2) || strlen(trim($op2))==0)
{
	death("Enter Option 2");
}
if(!isset($op3) || strlen(trim($op3))==0)
{
	death("Enter option 3");
}
if(!isset($op4) || strlen(trim($op4))==0)
{
	death("Enter Option 4");
}
if(!isset($ans1) || strlen(trim($ans1))==0)
{
	death("Please tell us option 1 is correct or incorrect");
}
if(!isset($ans2) || strlen(trim($ans2))==0)
{
	death("Please tell us option 2 is correct or incorrect");
}
if(!isset($ans3) || strlen(trim($ans3))==0)
{
	death("Please tell us option 3 is correct or incorrect");
}
if(!isset($ans4) || strlen(trim($ans4))==0)
{
	death("Please tell us option 4 is correct or incorrect");
}
if(!isset($q_uid) || strlen(trim($q_uid))==0)
{
	death("Absence of Question id, Please re-login ");
}
if(isset($_FILES['img_'.$quno]['name']))
{
	$imgname=htmlspecialchars(mysqli_real_escape_string($con,$_FILES['img_'.$quno]['name']), ENT_QUOTES, 'UTF-8');
	$tmp = $_FILES['img_'.$quno]['tmp_name'];
	$newimagename=md5(uniqid() . time()) ;
$extension = substr($imgname, strrpos($imgname, '.')+1);
$extension = strtolower($extension);
$file_formats = array("png","jpg","jpeg","gif");
$filepath = "../question_image/";
$newimagename =  mysqli_real_escape_string($con,$newimagename.".".$extension);
$size = $_FILES['img_'.$quno]['size'];
}
$refererurl= $_SERVER['HTTP_REFERER']; 
date_default_timezone_set('Asia/Calcutta');
$timing= date('d/m/Y , h:i a');
$ip = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);
if(!empty($_FILES['img_'.$quno]['name']))
{
	if (in_array($extension, $file_formats))  // check it if it's a valid format or not
	{
		if($size<2097152)
		{
           if (strlen($imgname)) 
		   {
 	            if (in_array($extension, $file_formats))  // check it if it's a valid format or not
                {		     
	            	  if(move_uploaded_file($tmp, $filepath. $newimagename)) 
				      { 		
              		        if(mysqli_query($con,"update `$q_uid` set question='$question',option1='$op1',option2='$op2',option3='$op3',option4='$op4',check_option1='$ans1',check_option2='ans2',check_option3='$ans3',check_option4='$ans4',q_img='$newimagename',positive_mark='$markque',negative_mark='$nmarkque',solution_link='$solution_link',solution='$sol_que' where question_no='$quno'"))
						    {	
					           echo 1;
							}
							else
							{
								echo mysqli_error($con);
							}
		              }
					 else
					 {
                             echo "Image Not Uploaded ..Please try again";
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
		else
		{
			echo "Size of file should less then 2 MB";
		}										
	}	
	else
	{
		echo "Invalid File type";
	}
}	else{
	if(mysqli_query($con,"update `$q_uid` set question='$question',option1='$op1',option2='$op2',option3='$op3',option4='$op4',check_option1='$ans1',check_option2='ans2',check_option3='$ans3',check_option4='$ans4',q_img='0',positive_mark='$markque',negative_mark='$nmarkque',solution_link='$solution_link',solution='$sol_que' where question_no='$quno'"))
						    {	
					           echo 1;
							}
							else
							{
								echo mysqli_error($con);
							}
}
                                       exit();
?>