<?php
require_once '../include/config.php';
require_once '../include/function.php';
$id=securedata($_REQUEST['id']);
?>
<p>Are u sure you want to delete this member?</p>
<button onclick="confirmed_delete('<?php echo $id; ?>')"class='btn btn-default'>Confirm</button>