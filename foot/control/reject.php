<?php
ob_start();
require_once 'session.php';

$query = "UPDATE `requestrecharge` SET status = 'rejected' where id=".$_GET['id']."";
if(mysql_query($query)){
header('Location: rechargerequests.php');
}
?>