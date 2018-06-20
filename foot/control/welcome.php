<?php
//chacked security k1
 DEFINE('DBUSERX','root');
DEFINE('DBHOSTX','localhost');
DEFINE('DBPASSWORDX','');
DEFINE('DBNAMEX','rock11'); 

 if($db=mysql_connect(DBHOSTX,DBUSERX,DBPASSWORDX))
{
	if(!mysql_select_db(DBNAMEX))
	{
		
		trigger_error("Database error");
		exit();
	}
	
} 
else
	{
		echo "xdd";
		trigger_error("Could Not connect to Mysql");
		exit();
	}
?>