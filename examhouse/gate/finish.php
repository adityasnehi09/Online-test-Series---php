<?php
if(isset($_REQUEST['id']))
{
	require_once("../../gate/session.php");
	require_once("../../welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_$examid";
	$myid=$_SESSION['user_idX'];
	$sql1=mysqli_query($con,"select no_of_question from gate_exam where uid='$examid'");
		if(mysqli_num_rows($sql1)>0)
		{
			while($row1=mysqli_fetch_assoc($sql1))
			{
				$no_of_question=$row1['no_of_question'];
			}
		}
	
	if(mysqli_query($con,"update `$que_ans_list` set exam_end_status='1' where user_id='$myid'"))
	{
		$sql=mysqli_query($con,"select * from `$que_ans_list` where  user_id='$myid'");
		if(mysqli_num_rows($sql)>0)
		{
			while($row=mysqli_fetch_assoc($sql))
			{
				$illagel_attemp=$row['illagel_attemp'];
				$dismis_reason=$row['dismis_reason'];
				$rank=$row['rank'];
				$marks=$row['marks'];
				$unsolved_que=$row['unsolved_que'];
				$exam_end_status=$row['exam_end_status'];
				$dismis_reason=$row['dismis_reason'];
				$useranswer=array();
				for($i=1;$i<=$no_of_question;$i++)
				{
					$useranswer[$i]=$row["que_no_".$i];
				}
				$questionuid="question_".$examid;
				$correct_ans=array();
				$sql2=mysqli_query($con,"select check_option1,check_option3,check_option2,question_no,check_option4 from `$questionuid`");
				if(mysqli_num_rows($sql2)>0)
				{
					while($row2=mysqli_fetch_assoc($sql2))
					{
						$check_option1=$row2['check_option1'];
						$check_option2=$row2['check_option2'];
						$check_option3=$row2['check_option3'];
						$check_option4=$row2['check_option4'];
						$question_no=$row2['question_no'];
						if($check_option1=='1')
						{
							$correct_ans[$question_no]='1';
						}
						else if($check_option2=='1')
						{
							$correct_ans[$question_no]='2';
						}
						else if($check_option3=='1')
						{
							$correct_ans[$question_no]='3';
						}
						else if($check_option4=='1')
						{
							$correct_ans[$question_no]='3';
						}
						else{
							$correct_ans[$question_no]='-1';
						}
						
						
					}
				}
				for($i=1;$i<=$no_of_question;$i++)
				{
					if($useranswer[$i]!=$correct_ans[$i])
					{
						echo "Your answer :".$useranswer[$i]." | Correct ans :".$correct_ans[$i]." of Option $i is incorrect<br>";
					}
				}
			
			?>
			<table class="table">
			<tr><td>Rank</td><td><?php  if(empty($rank)){ echo "N/A";}else{echo $rank;}?></td></tr>
			<tr><td>Marks</td><td><?php  if(empty($marks)){ echo "N/A";}else{echo $marks;}?></td></tr>
			<tr><td>Total No Unsolved Question</td><td><?php  if(empty($unsolved_que)){ echo "N/A";}else{echo $unsolved_que;}?></td></tr>
			<tr><td>Exam Status</td><td></td></tr>
			<tr><td>Exam Status</td><td></td></tr>
			</table>
			<?php
		}
	}
}
}



?>