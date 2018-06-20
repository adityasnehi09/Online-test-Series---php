<?php 

/*
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "paidnext"); 
*/

$conn = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('rock11');
 
?>