<?php 
 //chacked security k1
session_start();

if(isset($_REQUEST['id']))
{
	
	require_once("welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_$examid";
	$question_="question_".$examid;
	$sql1=mysqli_query($con,"select no_of_question from gate_exam where uid='$examid'");
	if(mysqli_num_rows($sql1)>0)
	{
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$no_of_question=$row1['no_of_question'];
		}
	}
	$sql=mysqli_query($con,"select * from `$que_ans_list` order by marks desc");
	$total_candidate=mysqli_num_rows($sql);
	echo "<h1> Total Candidate : ".$total_candidate."</h1>";
	echo "<h3>Updating required Detail For Rank....</h3>";
	if($total_candidate>0)
	{
		$s_no_candidate=1;
		
		while($row=mysqli_fetch_assoc($sql))
		{
				
			$illagel_attemp=$row['illagel_attemp'];
			$user_id=$row['user_id'];
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
			$sql_get_user=mysqli_query($con,"select name,crop_pic from allmember where id='$user_id'");
			if(mysqli_num_rows($sql_get_user)>0)
			{
				while($row_user=mysqli_fetch_assoc($sql_get_user))
				{
					$user_name=$row_user['name'];
					$crop_pic=$row_user['crop_pic'];
				}
			}
			
			$questionuid="question_".$examid;
			$correct_ans=array();
			$sql2=mysqli_query($con,"select check_option1,check_option3,check_option2,question_no,check_option4,negative_mark,positive_mark from `$questionuid`");
			if(mysqli_num_rows($sql2)>0)
			{
				while($row2=mysqli_fetch_assoc($sql2))
				{
					$check_option1=$row2['check_option1'];
					$check_option2=$row2['check_option2'];
					$check_option3=$row2['check_option3'];
					$check_option4=$row2['check_option4'];
					$question_no=$row2['question_no'];
					$negative_mark_this_que=$row2['negative_mark'];
					$positive_mark_this_que=$row2['positive_mark'];
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
			$totalmarks_user=0;
			$totalincorrectquestion=0;
			$noofattempedquestion=0;
			$total_negative_marks=0;
			$total_positive_marks=0;
			for($i=1;$i<=$no_of_question;$i++)
			{
				if($useranswer[$i]!=$correct_ans[$i])
				{
					if(!empty($useranswer[$i]) && $useranswer[$i]!='-1') /* -2 indicate no answer */
					{	
						$totalmarks_user=$totalmarks_user-$negative_mark_this_que;
						$totalincorrectquestion++;
						$noofattempedquestion++;
						$total_negative_marks=$total_negative_marks+$negative_mark_this_que;
						
					}
				}
				else
				{
					$totalmarks_user=$totalmarks_user+$positive_mark_this_que;
					$noofattempedquestion++;
					$total_positive_marks=$total_positive_marks+$positive_mark_this_que;
				}
			
			}
				 $unsolved_que=$no_of_question-$noofattempedquestion;
			$sq=mysqli_query($con,"select * from gate_exam where uid='$examid' ");
			if(mysqli_num_rows($sq)>0)
			{
				while($row=mysqli_fetch_assoc($sq))
				{
					$exam_name=$row['exam_name'];
					$no_of_question=$row['no_of_question'];
					$s_no=$row['s_no'];
					
					$total_marks=$row['total_marks'];
					$marks_per_question=$row['marks_per_question'];
					$negative_marks=$row['negative_marks'];
				
					
					
				}
			}
			echo $unsolved_que;
			if(mysqli_query($con,"update `$que_ans_list` set marks='$totalmarks_user',unsolved_que='$unsolved_que',negative_mark='$total_negative_marks',exam_end_status='1' where user_id='$user_id'"))
			{
				echo "$s_no_candidate Detail updated for $user_name <br>";
			}
			$s_no_candidate++;
			
		}
		?>
		
		<?php
	}

}
$sql2=mysqli_query($con,"select * from `$que_ans_list` order by marks desc,negative_mark asc");
	$total_candidate2=mysqli_num_rows($sql2);
	
	echo "<h3>Creating Rank....</h3>";
	if($total_candidate2>0)
	{
		$rank_user=1;
		?>
		<table border="1">
		<tr><th>Id</th><th>Name</th><th>Rank</th><th>Marks</th><th>Negative Mark</th><th>No Of Unsolved Question</th></tr>
		
		<?php
		while($row2=mysqli_fetch_assoc($sql2))
		{
	
			$user_id=$row2['user_id'];
			 $unsolved_que=$row2['unsolved_que'];
			echo $negative_mark=$row2['negative_mark'];
			$marks=$row2['marks'];

			if(mysqli_num_rows($sql_get_user)>0)
			{
				while($row_user=mysqli_fetch_assoc($sql_get_user))
				{
					$user_name=$row_user['name'];
					$crop_pic=$row_user['crop_pic'];
				}
			}
			$sql_get_user=mysqli_query($con,"select name,crop_pic from allmember where id='$user_id'");
			if(mysqli_query($con,"update `$que_ans_list` set rank='$rank_user' where user_id='$user_id'"))
			{
				?>
				<tr>
				<td><?php echo $user_id; ?></td>
				<td><?php echo $user_name; ?></td>
				<td><?php echo $rank_user; ?></td>
				<td><?php echo $marks; ?></td>
				<td><?php echo $negative_mark; ?></td>
				<td><?php echo $unsolved_que; ?></td>
				
				</tr>
				<?php
				
			}
		$rank_user++;
		}
		?>
		</table>
		<?php
	}
?>
