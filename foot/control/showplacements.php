<?php

require_once 'session.php';

$name = admin_info(profileIDs($_POST['id']), 'fullname');

if((admin_info(profileIDs($_POST['id']), 'fullname')) ==""){
    echo "Not Found!";
}else{
    
    echo $name;
}