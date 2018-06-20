<?php
// secure k1
require_once("welcome.php");
$idofcomp=mysqli_real_escape_string($con,$_POST['idofcomp']);
$idofversion=mysqli_real_escape_string($con,$_POST['idofversion']);

if(isset($_GET['c']))
{
	$idofcomp=mysqli_real_escape_string($con,$_GET['c']);
}
if(isset($_GET['v']))
{
	$idofcomp=mysqli_real_escape_string($con,$_GET['v']);
}

	   
	  	   require_once("welcome.php");
	   $resultsql=mysqli_query($con,"select * from allcompetition where id='$idofversion'");
	   if(mysqli_num_rows($resultsql)>0)
	   {
		   while($row=mysqli_fetch_assoc($resultsql))
		   {
			   		 $comp_version_name=$row['comp_name'];
		              $opening_status=$row['opening_status'];
		              $include_incomp=$row['include_incomp'];
		              $id=$row['id'];
		  
		  
									$resultsql2=mysqli_query($con,"select * from `$idofversion` where uid='$idofcomp' ");
									if(mysqli_num_rows($resultsql2)>0)
									{
											while($row2=mysqli_fetch_assoc($resultsql2))
										{
											 $comp_name=$row2['comp_name'];
											$starting_date=$row2['starting_date'];
											$ending_date=$row2['ending_date'];
											$total_seat=$row2['total_seat'];
											$fee=$row2['fee'];
											$last_date=$row2['lastdate'];
											$description_sh=$row2['description_sh'];
											$description_lg=$row2['description_lg'];
		  
                                            $x=mysqli_num_rows(mysqli_query($con,"select s_no from `$idofcomp`"));
		  
		  ?> <div class="col-md-12"><div class="boxinner"><center><h3 style='color:black;'><?php echo $comp_version_name; ?></h3></center><?php
		  ?><div class="innertimeline"style="background-color:white;"><p style="text-align:justify;"><h3> <?php echo $comp_name; ?></h3><?php
		 
		  ?><p><span class="pull-left green"><?php echo $opening_status ?></span><span class="pull-right green"><?php if($fee==0){echo "100% Free";}else { echo $fee ." INR"; }?></span></p><?php
		?>  <p><?php if($include_incomp!=""){ echo " (".$include_incomp.") "; ?> </p>
		  <p>Vacent seats : <?php echo $total_seat-$x;?></p>
		   <p><?php echo $description_sh ; ?> </p> 
		   <p><?php echo $description_lg ; ?> </p> 
		  
		       </div></div></div><?php
		   }
	   }
	   
	   		}
									}
		  
	   }
	   ?>