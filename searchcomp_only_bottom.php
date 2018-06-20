<?php
require_once("welcome.php");

	$searchtext=mysqli_real_escape_string($con,$_GET['searchtext']);
	$searchtext=htmlspecialchars($searchtext, ENT_QUOTES, 'UTF-8');
	
	
	$sql=mysqli_query($con,"select fee,exam_name,uid from all_test where exam_name LIKE '%$searchtext%' order by s_no desc limit 0,20");
	if(mysqli_num_rows($sql)>0)
	{
		?><table class="table"><?php
		while($rows=mysqli_fetch_assoc($sql))
		{
			
			
			?>
			<tr>
			<td><a href="exam-detail.php?id=<?php echo $rows['uid'] ?>"> &nbsp;<?php echo $rows['exam_name']?></a>
			</td>
			<td align="right"><?php if($rows['fee']=='0'){ echo "Free";}else{ echo $rows['fee']." INR"; } ?> </td>
			</tr>
			
			
			<?php
		}
	}
	else
	{
		echo "<center><b>No Result</b></center><hr>";
	}
	
	?>