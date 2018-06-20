<?php
require_once("welcome.php");

	$searchtext=mysqli_real_escape_string($con,$_GET['searchtext']);
	$searchtext=htmlspecialchars($searchtext, ENT_QUOTES, 'UTF-8');
	
	?>
	
	<div class="row"style="margin-bottom:20px;">
<div class="col-sm-4">
<select class="form-control comp"id="searchcategory2"style="outline:none;min-width:100px;"onchange="searchsomeonedynamic('searchcategory2','searchtext2','showresult')">
<option value="c"selected>Competition</option>
<option value="u">User</option>
</select>
</div>
<div class="col-sm-8">
    <div class="input-group">
	 
      <input type="text" class="form-control" placeholder="Search for..."id="searchtext2"value="<?php echo $searchtext; ?>"onkeyup="searchsomeonedynamic('searchcategory2','searchtext2','showresult')">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"name="searchstd"onclick="searchsomeone('searchcategory2','searchtext2')" >Go!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  </div>


<div id="showresult"class="showresult">
	
	<?php
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

</div>
