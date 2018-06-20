<?php
include_once("session.php");
if(isset($_POST['id']))
{
	$id=mysql_real_escape_string($_POST['id']);
	if(mysql_query("DELETE FROM `contact` where s_no ='$id'"))
	{
		echo "Deleted";
	}
	else
	{
		echo "Not Deleted";
	}
}




?>