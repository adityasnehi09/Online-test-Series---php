

<?php
require_once("session.php");
require_once("../../welcome.php");
if(isset($_POST['id']))
{
	
	$id=mysqli_real_escape_string($con,$_POST['id']);
	
}

$sqq=mysqli_query($con,"select * from all_test  where uid='$id'");
									if(mysqli_num_rows($sqq)>0)
									{
										?>
										<table class="table">
										<tr><th>Exam Name</th></tr>
										<?php
										
										while($row=mysqli_fetch_assoc($sqq))
										{
											$question_table="question_".$row['uid'];
											$no_of_complete_question=mysqli_num_rows(mysqli_query($con,"select s_no from `$question_table`"));
											?>
											<tr>
											<td><?php echo $row['exam_name']; ?></td>
											
											
                               
											
											</tr>
											
										<?php
											
										}
										?>
										</table>
										<?php
									}
									
									?>




<div class="modal-footer">
          
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <button class="btn btn-success" onclick="deletetestpermanent('<?php echo $id; ?>')">Confirm delete</button>
		 	
      </div>