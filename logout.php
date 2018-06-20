<?php 
//chacked security k1
session_start();
setcookie("logintemp","",time()-3600);
setcookie("loginconform","",time()-3600);
unset($_SESSION['logintemp']); 
session_unset(); 

header("location: /");

?>