<?php
//chacked security k1

 DEFINE('DBUSERX','root');
DEFINE('DBHOSTX','localhost');
DEFINE('DBPASSWORDX','');
DEFINE('DBNAMEX','indotufan'); 



 if($con=mysqli_connect(DBHOSTX,DBUSERX,DBPASSWORDX,DBNAMEX))
{
		
} 
else
	{
		
		trigger_error("Could Not connect to Mysql");
		exit();
	}
	$connection=$con;
	Global $connection;
?>