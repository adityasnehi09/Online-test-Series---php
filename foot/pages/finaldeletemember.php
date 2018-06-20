<?php

require_once '../include/config.php';
require_once 'session.php';
require_once '../include/function.php';
$id=securedata($_REQUEST['id']);
if(mysqli_query($con,"delete from allmember where id='$id'")){
	echo "Deleted";
}else{
	echo mysqli_error($con);
}

?>