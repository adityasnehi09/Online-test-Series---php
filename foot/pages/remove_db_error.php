<?php
require_once("../../welcome.php");
$sql=mysqli_query($con,"select * from all_test");
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_assoc($sql))
	{
		$uid=$row['uid'];
		$exam_name=$row['exam_name'];
		$que_ans="que_ans_".$uid;
		$sql2=mysqli_query($con,"select * from `$que_ans`");
		if(mysqli_num_rows($sql2)>0)
		{
			while($row2=mysqli_fetch_assoc($sql2))
			{
				
				$user_id=$row2['user_id'];
				$sql3=mysqli_query($con,"select * from `allmember` where id='$user_id'");
				
				
				if(mysqli_num_rows($sql3)==0)
				{
					if(mysqli_query($con,"delete from `$que_ans` where user_id='$user_id'")){
						echo "Id $user_id deleted from $exam_name<br>";
					}
				}	
			}
		}
	}
}
echo "<hr>Removed all user from test who is not our member.<hr>";
?>