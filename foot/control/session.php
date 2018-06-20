<?php
session_start();

if(isset($_SESSION['adminaccesspaglu'])){
    
    if(empty($_SESSION['adminaccesspaglu'])){
        die(header("Location: logout.php"));
    }
    
   

    require_once '../include/config.php';
    require_once '../include/function.php';
    
}else{
    header("Location: logout.php");
}


