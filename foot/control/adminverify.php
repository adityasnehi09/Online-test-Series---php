<?php
session_start();
if(!isset($_SESSION['adityasnehiloginyes']))
{
	 header("location: http://nightbird.in");
}
else
{
	if(isset($_POST['newversion_submit']))
	{ 
		require_once("welcome.php");
		$comp_nameX=mysql_real_escape_string($_POST['comp_name']);
		$starting_dateX=mysql_real_escape_string($_POST['starting_date']);
		$ending_dateX=mysql_real_escape_string($_POST['ending_date']);
		$feeX=mysql_real_escape_string($_POST['fee']);
		$last_dateX=mysql_real_escape_string($_POST['last_date']);
		$total_seatX=mysql_real_escape_string($_POST['total_seat']);
		$description_shX=mysql_real_escape_string($_POST['description_sh']);
		$description_lgX=mysql_real_escape_string($_POST['description_lg']);
		$total_seatX=mysql_real_escape_string($_POST['total_seat']);
		$heading1X=mysql_real_escape_string($_POST['heading1']);
		$heading2X=mysql_real_escape_string($_POST['heading2']);
		$heading3X=mysql_real_escape_string($_POST['heading2']);
		$include_incompX=mysql_real_escape_string($_POST['include_incomp']);
		$opening_statusX=mysql_real_escape_string($_POST['opening_status']);
		date_default_timezone_set('Asia/Calcutta');
		$creating_timing=date("h:i a");
		$creating_year= date('Y');
		$creating_month= date('m');
		$creating_day= date('d');
		if (isset($_SERVER['HTTP_REFERER']))
		{	
			$referer=$_SERVER['HTTP_REFERER'];
		}
		else
		{
			$referer="Direct at Night Bird";
		}
		$file_formats = array("jpg","jpeg","png","gif");
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$uid="version_".md5(uniqid() . time());
		$tmp = $_FILES['banner_img']['tmp_name'];
        $banner_img= mysql_real_escape_string($_FILES['banner_img']['name']);
		$size = $_FILES['banner_img']['size'];
		
		$extension = substr($banner_img, strrpos($banner_img, '.')+1);
		$extension = strtolower($extension);
		$file_formats = array("jpg","jpeg","png","gif");
		$filepath = "../../comp_create_img/";
		$newimgname =  $uid.".".$extension;
		
		if($size<2971500){
            if (strlen($banner_img)) 
			{
				if (in_array($extension, $file_formats))  // check it if it's a valid format or not
                {
					if(move_uploaded_file($tmp, $filepath. $newimgname)) 
				    {
						if(mysql_query("insert into allcompetition (comp_name, starting_date, ending_date, total_seat, fee, lastdate ,description_sh,description_lg,creating_timing,creating_day,creating_month,creating_year,referer,ip_address,browser,id,heading1,heading2,heading3,opening_status,include_incomp,banner_img)values ('$comp_nameX','$starting_dateX','$ending_dateX','$total_seatX','$feeX','$last_dateX','$description_shX','$description_lgX','$creating_timing','$creating_day','$creating_month','$creating_year','$referer','$ip','$browser','$uid','$heading1X','$heading2X','$heading3X','$opening_statusX','$include_incompX','$newimgname')"))
		{
			if(mysql_query("CREATE TABLE `$uid` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT , `comp_name` TEXT NOT NULL , `starting_date` TEXT NOT NULL , `ending_date` TEXT NOT NULL , `total_seat` INT(50) NOT NULL , `fee` INT(50) NOT NULL , `lastdate` TEXT NOT NULL , `description_sh` TEXT NOT NULL , `description_lg` TEXT NOT NULL , `creating_timing` TEXT NOT NULL , `creating_day` TEXT NOT NULL , `creating_month` TEXT NOT NULL , `creating_year` TEXT NOT NULL , `referer` TEXT NOT NULL , `ip_address` TEXT NOT NULL , `browser` TEXT NOT NULL ,`formate` TEXT NOT NULL, `uid` TEXT NOT NULL,`charge_file_change` TEXT NOT NULL,`cancel_request` TEXT NOT NULL,`charge_partner_change_before` TEXT NOT NULL,`charge_partner_change_after` TEXT NOT NULL, `total_person` TEXT NOT NULL,`comp_base_name` TEXT NOT NULL,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
			{					 
				mysql_close();				 
				header("location: gate1.php?newversioncreated=1");                           	
			}
			else
			{
				mysql_close();		
				header("location: gate1.php?tablenotcreated=1");	 
			}
		}
		else
		{
			mysql_close();		
			header("location: gate1.php?versionnotcreated=1");			
		}
						
					}
				}
			}
		}			
		
	}
}
?>