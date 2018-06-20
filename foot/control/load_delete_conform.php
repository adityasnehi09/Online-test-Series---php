

<?php
include("session.php");
if(isset($_POST['name']))
{
	$name=mysql_real_escape_string($_POST['name']);
	$id=mysql_real_escape_string($_POST['id']);
	$msg=mysql_real_escape_string($_POST['msg']);
}
?>

<p>Message of <b><?php echo $name;?></b></p>


<p><br><?php echo $msg; ?></p>

<div class="modal-footer">
          
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <button class="btn btn-success" onclick="deletepermanent('<?php echo $id; ?>')">Conform</button>
		 	
      </div>