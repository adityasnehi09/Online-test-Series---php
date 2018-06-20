<?php

require_once 'session.php';
$email=mysql_real_escape_string($_POST['id']);
$sql=mysql_query("select fname,lname from member where email='$email'");
if(mysql_num_rows($sql)>0)
{
	while($row=mysql_fetch_assoc($sql))
	{
		echo $row['fname']." ".$row['lname'];
	}
}else{
	echo "Not Found!";
}
