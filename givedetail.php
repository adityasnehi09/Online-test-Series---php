<?php
if(isset($_POST['idofversion']))
{
	require_once("welcome.php");
	$idofversionX=mysqli_real_escape_string($con,$_POST['idofversion']);
	   $resultsql=mysqli_query($con,"select * from allcompetition where id='$idofversionX'");
	   if(mysqli_num_rows($resultsql)>0)
	   {
		   while($row=mysqli_fetch_assoc($resultsql))
		   {
			   echo $row['description_lg'];
		   }
	   }
}
			   


?>