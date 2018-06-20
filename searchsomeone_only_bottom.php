

<?php
require_once("welcome.php");

	$searchtext=mysqli_real_escape_string($con,$_GET['searchtext']);
	
	$searchtext=htmlspecialchars($searchtext, ENT_QUOTES, 'UTF-8');


	$sql=mysqli_query($con,"select name,id,crop_pic,privacy from allmember where name LIKE '%$searchtext%' order by id desc limit 0,20");
	if(mysqli_num_rows($sql)>0)
	{
		?><table class="table"style="width:100%">
	
		<?php
		while($rows=mysqli_fetch_assoc($sql))
		{
			
			if($rows['privacy']!='public')
			{
				$rows['crop_pic']="default.jpg";
			}
		
			?>
			<tr>
			<td>
			
			<img src="upload_images/crop/<?php echo $rows['crop_pic'] ?>"height="50"/><a href="profile.php?id=<?php echo $rows['id'] ?>"> &nbsp;<?php echo $rows['name']?></a></td>
			
			</tr>
			
			
			<?php
		}
		?></table><?php
	}
	else
	{
		echo "<center><b>No Result</b></center><hr>";
	}
	
	?>