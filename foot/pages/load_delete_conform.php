

<?php
require_once("session.php");
if(isset($_POST['name']))
{
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$id=mysqli_real_escape_string($con,$_POST['id']);
	$msg=mysqli_real_escape_string($con,$_POST['msg']);
}
?>

<p>Message of <b><?php echo $name;?></b></p>


<p><br><?php echo $msg; ?></p>

<div class="modal-footer">
          
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <button class="btn btn-success" onclick="deletepermanent('<?php echo $id; ?>')">Conform</button>
		 	
      </div>