<?php
session_start();

if(isset($_SESSION['USERID'])){
    
    if(empty($_SESSION['USERID'])){
        die(header("Location: logout.php"));
    }
    
    if(empty($_SESSION['USERNAME'])){
        die(header("Location: logout.php"));
    }

    require_once '../include/config.php';
    require_once '../include/function.php';
    
}else{
    header("Location: logout.php");
}


