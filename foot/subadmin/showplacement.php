<?php

require_once 'session.php';

$name = profile_info(profileID($_POST['id']), 'fname').' '.profile_info(profileID($_POST['id']), 'lname');

if((profile_info(profileID($_POST['id']), 'fname')) ==""){
    echo "Not Found!";
}else{
    
    echo $name;
}