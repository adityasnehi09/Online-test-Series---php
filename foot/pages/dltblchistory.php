<?php
require_once("session.php");
$query ="DELETE FROM `balance_transfer` where id =".$_GET['id'].  "" ;
if(mysqli_query($con,$query)){
header('Location: transferHistory.php');
}

?>