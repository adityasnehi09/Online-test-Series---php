<?php
session_start();
if(isset($_REQUEST['email_invite']))
{
	require_once("welcome.php");
		$email_invite=mysqli_real_escape_string($con,$_REQUEST['email_invite']);
		if(isset($_REQUEST['mynameis']))
		{
			$mane_o="<span style='text-transform: capitalize;'>".mysqli_real_escape_string($con,$_REQUEST['mynameis'])."</span>";
			$mane_oo=mysqli_real_escape_string($con,$_REQUEST['mynameis']);
		}
		else if(isset($_SESSION['nameX']))
		{
			$mane_o="<span style='text-transform: capitalize;'>".$_SESSION['nameX']."</span> has";
			$mane_oo=$_SESSION['nameX']." has";
		}
		else
		{
			$mane_o="Someone";
			$mane_oo="Someone";
		}
		$email_invite=htmlspecialchars($email_invite, ENT_QUOTES, 'UTF-8');



								
								
								$message="
								<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
								'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
								<html xmlns='http://www.w3.org/1999/xhtml'> <head>
								<meta name='viewport' content='width=device-width' /> 
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
								</head> <body bgcolor='#FFFFFF'style='-webkit-font-smoothing:antialiased;	
								-webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;'>
								<center> <div style='max-width:600px'> <table> <tr> <td></td>
								<td bgcolor='#FFFFFF'style='width:100%'> <div> <table style='width:100%'> <tr> <td>
								<h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'>
								Welcome to IndoTufan!!</h3> <p> $mane_o invited you to join IndoTufan</p> <p>
								<a href='http://indotufan.com'><img src='http://www.pumpupyourbook.com/wp-content/uploads/2013/08/001a.jpg' style='width:100%'/></a></p>
								<p style='padding:15px;background-color:#ecf8ff;margin-bottom:15px'> IndoTufan is a platform for test Series in various field like GATE, JEE Main, JEE Advance. Etc</p> 
								<a href='http://indotufan.com'class='btn'style='text-decoration:none;color: white;background-color:rgb(29, 172, 237);padding:10px 16px;font-weight:bold;margin-right:10px;text-align:center;cursor:pointer;display: inline-block;'>
								Go To IndoTufan</a> <br/> <br/> <table class='social' width='100%'style='background-color: #ebebeb;padding: 3px 7px;font-size:12px;margin-bottom:10px;
								text-decoration:none;color: #FFF;font-weight:bold;width:100%'> <tr> <td> <table align='left' class='column'style='width:30%'>
								<tr> <td> <h3 style='color:gray'>Connect with Us:</h3> <p class=''>
								<a href='https://www.facebook.com/IndoTufan/' class='soc-btn fb'style='display:block;
								width:100%;padding: 3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color: #FFF;font-weight:bold;display:block;
								text-align:center; background-color: #3B5998!important;'>Facebook</a> </p> </td> </tr> </table> 
								<table align='right' style='width:50%;padding:0 10px'> <tr> <td> <h3 style='color:gray'>Contact Info:</h3> <p style='color:black'>Phone: <strong>+91 9814916810</strong><br/> Email: <strong><a href='emailto:contact@indotufan.com'style='color: #2BA6CB;'>contact@indotufan.com</a></strong></p> </td> </tr> </table> <span class='clear'></span> </td> </tr> </table> </td> </tr> </table> </div> </td> <td></td>
								</tr> </table> </div> </center> </body> </html>";
								$headers = "From: Invitation<contact@indotufan.com>  \r\n";
								$headers .= "Reply-To: $email_invite \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								if(mail($email_invite,$mane_oo.' invited you to join IndoTufan',$message, $headers))
								{
									echo "$email_invite Invited";
								}
						




}
exit();
?>