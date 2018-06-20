<?php
//checked secutity k1
session_start();
require_once("../include/config.php");
if(!isset($_SESSION['USERID']))
{
header("location: index.php");
}
$f1=mysql_real_escape_string($_POST['f1']);

    $f2=mysql_real_escape_string($_POST['f2']);
    $f4=mysql_real_escape_string($_POST['f4']);
	//$f5=mysql_real_escape_string($_POST['f5']);
	$f6=mysql_real_escape_string($_POST['f6']);
	$f7=mysql_real_escape_string($_POST['f7']);
	$f8=mysql_real_escape_string($_POST['f8']);
	$f9=mysql_real_escape_string($_POST['f9']);
	$f10=mysql_real_escape_string($_POST['f10']);
	//$f11=mysql_real_escape_string($_POST['f11']);
	//$f12=mysql_real_escape_string($_POST['f12']);
	$f13=mysql_real_escape_string($_POST['f13']);
	$f14=mysql_real_escape_string($_POST['f14']);
	$f15=mysql_real_escape_string($_POST['f15']);
	$f16=mysql_real_escape_string($_POST['f16']);
	$f18=mysql_real_escape_string($_POST['f18']);
	$f19=mysql_real_escape_string($_POST['f19']);
	$f20=mysql_real_escape_string($_POST['f20']);
	$f21=mysql_real_escape_string($_POST['f21']);

	
	
	if(empty($f21)){
		$f21="support@nightbird.in";
	}
	
	
	
	
$tmp = $_FILES['f3']['tmp_name'];
$name = mysql_real_escape_string($_FILES['f3']['name']);

$extension = substr($name, strrpos($name, '.')+1);
$extension = strtolower($extension);
$file_formats = array("png","jpg","jpeg","gif","tif","raw");
$filepath = "../img/";
$newimagename2 =  $name;

if (in_array($extension, $file_formats))  // check it if it's a valid format or not
{

     if (strlen($name)) 
	{
 	     if(move_uploaded_file($tmp, "../img/". $newimagename2)) 
		{ 		
					if($f20==1)
					{
						
						$sql=mysql_query("select name from allmember");
						if(mysql_num_rows($sql)>0)
						{
							while($row1=mysql_fetch_assoc($sql))
							{
								$fname=$row1['fname'];
								$lname=$row1['lname'];
								$email=$row1['email'];
								if(empty($f1))
								{
									$f1="Welcome ".$fname." ".$lname;
								}
								$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> <html xmlns='http://www.w3.org/1999/xhtml'> <head> <meta name='viewport' content='width=device-width' /> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> </head> <body bgcolor='#FFFFFF'style='-webkit-font-smoothing:antialiased;	-webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;'> <center> <div style='max-width:600px'> <table style='width:100%;background-color:#1daced'> <tr> <td></td> <td style=''> <div> <table style='width:100%'> <tr> <td><img style='width:50px'src='http://localhost/nit/img/nightlogo.png' /></td> <td align='right'><h2 style='font-size:30px;color:#fff;font-family:Georgia,Times,serif'>NightBird Competition Platform</h2></td> </tr> </table> </div> </td> <td></td> </tr> </table> <table> <tr> <td></td> <td bgcolor='#FFFFFF'style='width:100%'> <div> <table style='width:100%'> <tr> <td> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'>$f1</h3> <p>$f2</p> <p><img src='http://nightbird.in/foot/img/$newimagename2' style='width:100%'/></p> <p style='padding:15px;background-color:#ecf8ff;margin-bottom:15px'> $f4 </p> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'> $f6</h3> <p>$f7</p> <a href='$f9'class='btn'style='text-decoration:none;color: white;background-color:rgb(29, 172, 237);padding:10px 16px;font-weight:bold;margin-right:10px;text-align:center;cursor:pointer;display: inline-block;'>$f8</a> <br/> <br/> <table class='social' width='100%'style='background-color: #ebebeb;padding: 3px 7px;font-size:12px;margin-bottom:10px;	text-decoration:none;color: #FFF;font-weight:bold;width:100%'> <tr> <td> <table align='left' class='column'style='width:30%'> <tr> <td> <h3 style='color:gray'>Connect with Us:</h3> <p class=''><a href='$f10' class='soc-btn fb'style='display:block;	width:100%;padding: 3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #3B5998!important;'>Facebook</a> </p> </td> </tr> </table> <table align='right' style='width:50%;padding:0 10px'> <tr> <td> <h3 style='color:gray'>Contact Info:</h3> <p style='color:black'>Phone: <strong>$f13</strong><br/> Email: <strong><a href='emailto:hseldon@trantor.com'style='color: #2BA6CB;'>$f14</a></strong></p> </td> </tr> </table> <span class='clear'></span> </td> </tr> </table> </td> </tr> </table> </div> </td> <td></td> </tr> </table> </div> </center> </body> </html>";
								$headers = "From: NightBird<".$f21.">  \r\n";
								$headers .= "Reply-To: $f21 \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								if(mail($email,$f18,$message, $headers))
									{
									header("location: sendmail.php?success=1");
								}
							}
						}
						
					}
					else if($f20==2)
					{
						
						$sql=mysql_query("select fname,lname,email from memberwhere `balence` !> 0");
						if(mysql_num_rows($sql)>0)
						{
							while($row1=mysql_fetch_assoc($sql))
							{
								$fname=$row1['fname'];
								$lname=$row1['lname'];
								$email=$row1['email'];
								if(empty($f1))
								{
									$f1="Welcome ".$fname." ".$lname;
								}
								
								$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> <html xmlns='http://www.w3.org/1999/xhtml'> <head> <meta name='viewport' content='width=device-width' /> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> </head> <body bgcolor='#FFFFFF'style='-webkit-font-smoothing:antialiased;	-webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;'> <center> <div style='max-width:600px'> <table style='width:100%;background-color:#1daced'> <tr> <td></td> <td style=''> <div> <table style='width:100%'> <tr> <td><img style='width:50px'src='http://localhost/nit/img/nightlogo.png' /></td> <td align='right'><h2 style='font-size:30px;color:#fff;font-family:Georgia,Times,serif'>NightBird Competition Platform</h2></td> </tr> </table> </div> </td> <td></td> </tr> </table> <table> <tr> <td></td> <td bgcolor='#FFFFFF'style='width:100%'> <div> <table style='width:100%'> <tr> <td> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'>$f1</h3> <p>$f2</p> <p><img src='http://nightbird.in/foot/img/$newimagename2' style='width:100%'/></p> <p style='padding:15px;background-color:#ecf8ff;margin-bottom:15px'> $f4 </p> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'> $f6</h3> <p>$f7</p> <a href='$f9'class='btn'style='text-decoration:none;color: white;background-color:rgb(29, 172, 237);padding:10px 16px;font-weight:bold;margin-right:10px;text-align:center;cursor:pointer;display: inline-block;'>$f8</a> <br/> <br/> <table class='social' width='100%'style='background-color: #ebebeb;padding: 3px 7px;font-size:12px;margin-bottom:10px;	text-decoration:none;color: #FFF;font-weight:bold;width:100%'> <tr> <td> <table align='left' class='column'style='width:30%'> <tr> <td> <h3 style='color:gray'>Connect with Us:</h3> <p class=''><a href='$f10' class='soc-btn fb'style='display:block;	width:100%;padding: 3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #3B5998!important;'>Facebook</a> </p> </td> </tr> </table> <table align='right' style='width:50%;padding:0 10px'> <tr> <td> <h3 style='color:gray'>Contact Info:</h3> <p style='color:black'>Phone: <strong>$f13</strong><br/> Email: <strong><a href='emailto:hseldon@trantor.com'style='color: #2BA6CB;'>$f14</a></strong></p> </td> </tr> </table> <span class='clear'></span> </td> </tr> </table> </td> </tr> </table> </div> </td> <td></td> </tr> </table> </div> </center> </body> </html>";
								$headers = "From: PaidNext<$f21>  \r\n";
								$headers .= "Reply-To: $f21 \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								if(mail($email,$f18,$message, $headers))
								{
									header("location: sendmail.php?success=1");
								}
							}
						}
						
					}
		         	else if($f20==3)
					{
						
						$sql=mysql_query("select name from `allmember` where `balence` > 0");
						if(mysql_num_rows($sql)>0)
						{
							while($row1=mysql_fetch_assoc($sql))
							{
								$fname=$row1['fname'];
								$lname=$row1['lname'];
								$email=$row1['email'];
								if(empty($f1))
								{
									$f1="Welcome ".$fname." ".$lname;
								}
								$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> <html xmlns='http://www.w3.org/1999/xhtml'> <head> <meta name='viewport' content='width=device-width' /> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> </head> <body bgcolor='#FFFFFF'style='-webkit-font-smoothing:antialiased;	-webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;'> <center> <div style='max-width:600px'> <table style='width:100%;background-color:#1daced'> <tr> <td></td> <td style=''> <div> <table style='width:100%'> <tr> <td><img style='width:50px'src='http://localhost/nit/img/nightlogo.png' /></td> <td align='right'><h2 style='font-size:30px;color:#fff;font-family:Georgia,Times,serif'>NightBird Competition Platform</h2></td> </tr> </table> </div> </td> <td></td> </tr> </table> <table> <tr> <td></td> <td bgcolor='#FFFFFF'style='width:100%'> <div> <table style='width:100%'> <tr> <td> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'>$f1</h3> <p>$f2</p> <p><img src='http://nightbird.in/foot/img/$newimagename2' style='width:100%'/></p> <p style='padding:15px;background-color:#ecf8ff;margin-bottom:15px'> $f4 </p> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'> $f6</h3> <p>$f7</p> <a href='$f9'class='btn'style='text-decoration:none;color: white;background-color:rgb(29, 172, 237);padding:10px 16px;font-weight:bold;margin-right:10px;text-align:center;cursor:pointer;display: inline-block;'>$f8</a> <br/> <br/> <table class='social' width='100%'style='background-color: #ebebeb;padding: 3px 7px;font-size:12px;margin-bottom:10px;	text-decoration:none;color: #FFF;font-weight:bold;width:100%'> <tr> <td> <table align='left' class='column'style='width:30%'> <tr> <td> <h3 style='color:gray'>Connect with Us:</h3> <p class=''><a href='$f10' class='soc-btn fb'style='display:block;	width:100%;padding: 3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #3B5998!important;'>Facebook</a> </p> </td> </tr> </table> <table align='right' style='width:50%;padding:0 10px'> <tr> <td> <h3 style='color:gray'>Contact Info:</h3> <p style='color:black'>Phone: <strong>$f13</strong><br/> Email: <strong><a href='emailto:hseldon@trantor.com'style='color: #2BA6CB;'>$f14</a></strong></p> </td> </tr> </table> <span class='clear'></span> </td> </tr> </table> </td> </tr> </table> </div> </td> <td></td> </tr> </table> </div> </center> </body> </html>";
								$headers = "From: NightBird Competition Platform<$f21>  \r\n";
								$headers .= "Reply-To: $f21 \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								if(mail($email,$f18,$message, $headers))
								{
									header("location: sendmail.php?success=1");
								}
							}
						}
						
					}
						else if($f20==4)
					{
								
								$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> <html xmlns='http://www.w3.org/1999/xhtml'> <head> <meta name='viewport' content='width=device-width' /> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> </head> <body bgcolor='#FFFFFF'style='-webkit-font-smoothing:antialiased;	-webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;'> <center> <div style='max-width:600px'> <table style='width:100%;background-color:#1daced'> <tr> <td></td> <td style=''> <div> <table style='width:100%'> <tr> <td><img style='width:50px'src='http://localhost/nit/img/nightlogo.png' /></td> <td align='right'><h2 style='font-size:30px;color:#fff;font-family:Georgia,Times,serif'>NightBird Competition Platform</h2></td> </tr> </table> </div> </td> <td></td> </tr> </table> <table> <tr> <td></td> <td bgcolor='#FFFFFF'style='width:100%'> <div> <table style='width:100%'> <tr> <td> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'>$f1</h3> <p>$f2</p> <p><img src='http://nightbird.in/foot/img/$newimagename2' style='width:100%'/></p> <p style='padding:15px;background-color:#ecf8ff;margin-bottom:15px'> $f4 </p> <h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'> $f6</h3> <p>$f7</p> <a href='$f9'class='btn'style='text-decoration:none;color: white;background-color:rgb(29, 172, 237);padding:10px 16px;font-weight:bold;margin-right:10px;text-align:center;cursor:pointer;display: inline-block;'>$f8</a> <br/> <br/> <table class='social' width='100%'style='background-color: #ebebeb;padding: 3px 7px;font-size:12px;margin-bottom:10px;	text-decoration:none;color: #FFF;font-weight:bold;width:100%'> <tr> <td> <table align='left' class='column'style='width:30%'> <tr> <td> <h3 style='color:gray'>Connect with Us:</h3> <p class=''><a href='$f10' class='soc-btn fb'style='display:block;	width:100%;padding: 3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #3B5998!important;'>Facebook</a> </p> </td> </tr> </table> <table align='right' style='width:50%;padding:0 10px'> <tr> <td> <h3 style='color:gray'>Contact Info:</h3> <p style='color:black'>Phone: <strong>$f13</strong><br/> Email: <strong><a href='emailto:hseldon@trantor.com'style='color: #2BA6CB;'>$f14</a></strong></p> </td> </tr> </table> <span class='clear'></span> </td> </tr> </table> </td> </tr> </table> </div> </td> <td></td> </tr> </table> </div> </center> </body> </html>";
								$headers = "From: NightBird Competition Platform<$f21>  \r\n";
								$headers .= "Reply-To: $f21 \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								if(mail($f19,$f18,$message, $headers))
								{
									//header("location: sendmail.php?success=1");
									echo $message;
								}
							
						
						
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
		 
                                       

?>