<?php
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
session_unset(); 
header("location:index.php"); // Move back to login.php with a logout message
?>