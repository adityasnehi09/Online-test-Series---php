<?php
include_once 'session.php'; 
$query ="DELETE FROM `balance_transfer` where id =".$_GET['id'].  "" ;
if(mysql_query($query)){
header('Location: transferHistory.php');
}

?>