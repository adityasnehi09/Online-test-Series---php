

<?php
require_once("welcome.php");

	$searchtext=mysqli_real_escape_string($con,$_GET['searchtext']);
	
	$searchtext=htmlspecialchars($searchtext, ENT_QUOTES, 'UTF-8');
?>
<div class="row"style="margin-bottom:20px;">
<div class="col-sm-4">
<select class="form-control comp"id="searchcategory2"style="outline:none;min-width:100px;"onchange="searchsomeone('searchcategory2','searchtext2')">
<option value="c">Competition</option>
<option value="u"selected>User</option>
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
<hr>   </div>