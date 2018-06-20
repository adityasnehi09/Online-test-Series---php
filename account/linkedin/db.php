<?php
define('DB_SERVER', 'localhost'); // Database server
define('DB_USERNAME', 'username'); // Database Username
define('DB_PASSWORD', 'password'); // Database Password
define('DB_DATABASE', 'database'); // Database Name
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); // connecting with database
?>