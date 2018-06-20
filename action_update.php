<?php
//checked security k1
session_start();
if(isset($_POST['sign_submit']))
{ 
require_once("welcome.php");
/* Come From Form by Post Method */
$nameX=mysqli_real_escape_string($con,$_POST['username']);
$emailX=mysqli_real_escape_string($con,$_POST['useremail']);
$mobile_noX=mysqli_real_escape_string($con,$_POST['usermobile_no']);
$passwordX=mysqli_real_escape_string($con,$_POST['userpassword']);
$genderX=mysqli_real_escape_string($con,$_POST['usergender']);
$dobX=mysqli_real_escape_string($con,$_POST['userdob']);
if($genderX=="male" || $genderX=="female"){
	$genderverify=1;
}else{
	$genderverify=0;
}
/* Validation */
if($genderverify==1)
{
if(preg_match('%^[A-Za-z\.\-\ ]{2,20}$%',stripslashes(trim($nameX))))
	{
		
		    if(preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($emailX))))
	        {

		        if(preg_match('%^[0-9]{10}$%',stripslashes(trim($mobile_noX))))
	            {
				     if(!preg_match('%^[\'\"\<\>]%',stripslashes(trim($passwordX))))
	                 {
				         $_SESSION['nameX']=$nameX;
				         $_SESSION['emailX']=$emailX;
				         $_SESSION['mobile_noX']=$emailX;
                         if(strlen($passwordX)>6 )
                         {   
                             $ip_address = mysqli_real_escape_string($con,$_SERVER['REMOTE_ADDR']);
                             $browser = mysqli_real_escape_string($con,$_SERVER['HTTP_USER_AGENT']);	
                             date_default_timezone_set('Asia/Calcutta');
                             $sign_up_time=date("h:i a");
                             $sign_up_year= date('Y');
                             $sign_up_month= date('m');
                             $sign_up_day= date('d');                             
                             $uid=md5(uniqid() . time());
							 /* For table */
                             $follower="follower".$uid;
                             $following="following".$uid;
                             $seenlist="seen".$uid;
                             $detaillist="fulldetail".$uid;
                             $couplelist="couple_sent_req".$uid;
                             $notificationlist="notify".$uid;
                             $couplerequest="couple_request".$uid;
                             $transaction="mytransaction".$uid;
						     require_once("welcome.php");
			                 $chkmember=mysqli_query($con,"select name from allmember where email='$emailX'");
			                    if(mysqli_num_rows($chkmember)==0)
			                    {
								   	 
						                if(mysqli_query($con,"CREATE TABLE `$uid` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `comp_name` TEXT NOT NULL , `starting_date` TEXT NOT NULL , `ending_date` TEXT NOT NULL , `total_seat` INT(50) NOT NULL , `fee` INT(50) NOT NULL , `lastdate` TEXT NOT NULL , `description_sh` TEXT NOT NULL , `description_lg` TEXT NOT NULL , `joining_timing` TEXT NOT NULL , `joining_day` TEXT NOT NULL , `joining_month` TEXT NOT NULL , `joining_year` TEXT NOT NULL , `source_status` TEXT NOT NULL , `source` TEXT NOT NULL , `formate` TEXT NOT NULL , `uid_comp` TEXT NOT NULL,`uid_version` TEXT NOT NULL, `ip_address_student` TEXT NOT NULL ,`ip_address_judge` TEXT NOT NULL ,`browser_student` TEXT NOT NULL ,`browser_judge` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`file_status` TEXT NOT NULL ,`couple_status` INT(20) NOT NULL ,`couple_uid` TEXT NOT NULL ,`request_from` TEXT NOT NULL,`couple_conform` TEXT NOT NULL,`totallikes` INT(50) NOT NULL ,`totalviews` INT(50) NOT NULL ,`totalcomments` INT(50) NOT NULL ,`file_id` text NOT NULL,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
				                        {
										    if(mysqli_query($con,"CREATE TABLE `$follower` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `id` INT(50) NOT NULL , `uid` TEXT NOT NULL ,`browser` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                        {
											     if(mysqli_query($con,"CREATE TABLE `$following` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `id` INT(50) NOT NULL , `uid` TEXT NOT NULL ,`browser` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                            {
				                                     if(mysqli_query($con,"CREATE TABLE `$seenlist` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `mastername` TEXT NOT NULL ,`filesource` TEXT NOT NULL , `id` INT(50) NOT NULL , `uid` TEXT NOT NULL ,`browser` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                                { 
											             if(mysqli_query($con,"CREATE TABLE `$detaillist` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL ,`email` TEXT NOT NULL , `email_privacy` TEXT NOT NULL ,`mobile_no_privacy` TEXT NOT NULL ,`mobile_no` TEXT NOT NULL ,`full_image` TEXT NOT NULL ,`crop_image` TEXT NOT NULL ,`image_privacy` TEXT NOT NULL ,`id` INT(50) NOT NULL , `uid` TEXT NOT NULL,`website` TEXT NOT NULL ,`home_country` TEXT NOT NULL,`home_state` TEXT NOT NULL,`home_city` TEXT NOT NULL,`gender` TEXT NOT NULL,`dob` TEXT NOT NULL,`home_address` TEXT NOT NULL,`current_country` TEXT NOT NULL,`current_state` TEXT NOT NULL,`current_city` TEXT NOT NULL,`current_postal_code` TEXT NOT NULL,`home_postal_code` TEXT NOT NULL,`current_work` TEXT NOT NULL,`past_work` TEXT NOT NULL,`about_me` TEXT NOT NULL,`interest` TEXT NOT NULL,`education` TEXT NOT NULL,`hobbies` TEXT NOT NULL,`aim` TEXT NOT NULL,`achievement` TEXT NOT NULL,`expectation` TEXT NOT NULL,`browser` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                                    {
										                     if(mysqli_query($con,"CREATE TABLE `$couplelist` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL ,`email` TEXT NOT NULL , `id` INT(50) NOT NULL , `uid` TEXT NOT NULL,`crop_pic` TEXT NOT NULL,`privacy` TEXT NOT NULL,`file_id` TEXT NOT NULL,`approve` TEXT NOT NULL,`comp_uid` TEXT NOT NULL,`browser` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,`version_uid` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                                        { 														
															   if(mysqli_query($con,"CREATE TABLE `$notificationlist` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT ,`notification` TEXT NOT NULL,`notification_id` TEXT NOT NULL,`open_status` INT(20) NOT NULL,`seen_status` INT(20) NOT NULL,`priority` INT(20) NOT NULL,`browser` TEXT NOT NULL ,`linkofinfo` TEXT NOT NULL ,`from_person` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
	                                                            {
			    											     	if(mysqli_query($con,"CREATE TABLE `$couplerequest` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL ,`email` TEXT NOT NULL , `id` INT(50) NOT NULL , `uid` TEXT NOT NULL,`crop_pic` TEXT NOT NULL,`privacy` TEXT NOT NULL,`file_id` TEXT NOT NULL,`comp_uid` TEXT NOT NULL,`approve` TEXT NOT NULL,`browser` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,`version_uid` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
			    											     	{
																		if(mysqli_query($con,"CREATE TABLE `$transaction` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL ,`email` TEXT NOT NULL , `id` INT(50) NOT NULL , `uid` TEXT NOT NULL, `amount` TEXT NOT NULL, `productinfo` TEXT NOT NULL, `transaction_id` TEXT NOT NULL, `payu_transaction_id` TEXT NOT NULL,`browser` TEXT NOT NULL ,`timing` TEXT NOT NULL ,`day` TEXT NOT NULL ,`month` TEXT NOT NULL ,`year` TEXT NOT NULL ,`referer` TEXT NOT NULL ,`ip_address` TEXT NOT NULL ,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
																		{
																			if(mysqli_query($con,"insert into `$detaillist`(name,email,mobile_no,gender,dob,uid,crop_image,full_image) values ('$nameX','$emailX','$mobile_noX','$genderX','$dobX','$uid','default.jpg','default.jpg')"))
																			{
																				if(mysqli_query($con,"insert into allmember(name,email,mobile_no,passwordX,browser,ip_address,fee_status,conform_email,sign_up_day,sign_up_month,sign_up_year,sign_up_time,gender,dob,uid) values ('$nameX','$emailX','$mobile_noX','$passwordX','$browser','$ip_address','0','0','$sign_up_day','$sign_up_month','$sign_up_year','$sign_up_time','$genderX','$dobX','$uid')"))
																				{                                                 
																					$_SESSION['nameX']=$nameX;
																					$_SESSION['logintemp']=$emailX;
																					header("location: index.php");
																				}
																				else
																				{
																				
																					header("location: sign-up.php?error_code=insert_allm");	
																				}
																			}
																			else
																			{
																				header("location: sign-up.php?error_code=insert_detail");	
																			}
																		}
																		else
																		{
																			header("location: sign-up.php?error_code=tran");	
																		}
																	}
																	else
																	{
																		header("location: sign-up.php?error_code=cou_cm_req");	
																	}																			
															    }
																else
																{
                                                                             header("location: sign-up.php?error_code=notify");	
															    }
															}
															else
														    {
                                                                         header("location: sign-up.php?error_code=cou_snt_req");	
															}
														}
														else
													    {
																	 header("location: sign-up.php?error_code=create_detail");	
													    }
									                }
													else
													{
																 header("location: sign-up.php?error_code=create_seen");	
													}
											    }
												else
											    {
															 header("location: sign-up.php?error_code=following");	
											    }
											}
											else
											{
														 header("location: sign-up.php?error_code=follower");	
											}
										}
										else
									    {
													 header("location: sign-up.php?error_code=uid");	
									    }
			                    }
						        else
			                    {
											 header("location: sign-up.php?user_exist=1");
			                    }
                        }
					   else
	                   {
									 header("location: sign-up.php?password_error=1");
	                   }
	                }
				    else
	                {
								 header("location: sign-up.php?errorpasswordsecurity=1");
	                }	
				}
			   else
	           {
							 header("location: sign-up.php?mobile_error=1");
	           }
			}
		    else
	        {
						 header("location: sign-up.php?email_error=1");
	        }	
	}
	else
	{
				 header("location: sign-up.php?name_error=1");
	}
}
else
{
			header("location: sign-up.php?unknowngender=".$genderX);
}
}
else
{
			header("location: sign-up.php");
}
?>