<?php
session_start();
if(!isset($_SESSION['adityasnehiloginyes']))
{
	header("location: http://nightbird.in");
}
else
{
	//chacked security k1
	$uniqueid=$_GET['id'];
	require_once("welcome.php");
	if(isset($_POST['newcomp_submit']))
	{ 
		$comp_nameX=mysql_real_escape_string($_POST['comp_name']);
		$starting_dateX=mysql_real_escape_string($_POST['starting_date']);
		$ending_dateX=mysql_real_escape_string($_POST['ending_date']);
		$feeX=mysql_real_escape_string($_POST['fee']);
		$last_dateX=mysql_real_escape_string($_POST['last_date']);
		$total_seatX=mysql_real_escape_string($_POST['total_seat']);
		$description_shX=mysql_real_escape_string($_POST['description_sh']);
		$description_lgX=mysql_real_escape_string($_POST['description_lg']);
		$formateX=mysql_real_escape_string($_POST['formate']);
		$total_seatX=mysql_real_escape_string($_POST['total_seat']);
		$categorylistX=mysql_real_escape_string($_POST['categorylist']);
		$totalpersontX=mysql_real_escape_string($_POST['totalperson']);
		$changefileX=mysql_real_escape_string($_POST['changefile']);
		$changepartnerbX=mysql_real_escape_string($_POST['changepartnerb']);
		$changepartneraX=mysql_real_escape_string($_POST['changepartnera']);
		$changecancelreqX=mysql_real_escape_string($_POST['changecancelreq']);
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
		$ip = $_SERVER['REMOTE_ADDR'];
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$uid="comp_".md5(uniqid() . time());
	    if(mysql_query("insert into $uniqueid  (comp_name, starting_date, ending_date, total_seat, fee, lastdate ,description_sh,description_lg,creating_timing,creating_day,creating_month,creating_year,referer,ip_address,browser,uid,formate,total_person,charge_file_change,charge_partner_change_before,charge_partner_change_after,cancel_request,comp_base_name)values ('$comp_nameX','$starting_dateX','$ending_dateX','$total_seatX','$feeX','$last_dateX','$description_shX','$description_lgX','$creating_timing','$creating_day','$creating_month','$creating_year','$referer','$ip','$browser','$uid','$formateX','$totalpersontX','$changefileX','$changepartnerbX','$changepartneraX','$changecancelreqX','$categorylistX')"))
		{
			if(mysql_query("CREATE TABLE `$uid` ( `s_no` INT(50) NOT NULL AUTO_INCREMENT ,`user_id` INT(50) NOT NULL , `name` TEXT NOT NULL , `email` TEXT NOT NULL , `mobile_no` TEXT NOT NULL ,`entry_timing` TEXT NOT NULL , `entry_day` TEXT NOT NULL , `entry_month` TEXT NOT NULL , `couple_entry` INT(20) NOT NULL , `partner_name` TEXT NOT NULL ,  `partner_id` INT(50) NOT NULL , `partner_uid` TEXT NOT NULL , `entry_year` TEXT NOT NULL , `referer` TEXT NOT NULL , `ip_address` TEXT NOT NULL , `browser` TEXT NOT NULL , `parent_id` TEXT NOT NULL,PRIMARY KEY (`s_no`)  ) ENGINE = InnoDB;"))
            { 
				header("location: gate1.php?listtablecreated=$categorylistX");	
				mysql_close();		
            }
			else
			{
				mysql_close();		
				header("location: gate1.php?listtablenotcreated=1");	 
			}
		}
		else
		{
			echo mysql_error();		
			//header("location: gate1.php?compnotcreated=1");			
		}	
	}
 }
?>