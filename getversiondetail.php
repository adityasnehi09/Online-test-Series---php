
	   <?php 
	   // secure k1
	    require_once("welcome.php");
	    $idofversion=mysqli_real_escape_string($con,$_REQUEST['idofversion']);
	    $resultsql=mysqli_query($con,"select * from allcompetition where id='$idofversion'");
	    if(mysqli_num_rows($resultsql)>0)
	    {
		   while($row=mysqli_fetch_assoc($resultsql))
		   {
			   	 $comp_name=$row['comp_name'];
		         $starting_date=$row['starting_date'];
		         $ending_date=$row['ending_date'];
		         $total_seat=$row['total_seat'];
		         $fee=$row['fee'];
		         $last_date=$row['lastdate'];
		         $description_sh=$row['description_sh'];
		         $description_lg=$row['description_lg'];
		         $creating_timing=$row['creating_timing'];
		         $creating_day=$row['creating_day'];
		         $creating_month=$row['creating_month'];
		         $creating_year=$row['creating_year'];
		         $heading1=$row['heading1'];
		         $heading2=$row['heading2'];
		         $heading3=$row['heading3'];
		         $opening_status=$row['opening_status'];
		         $include_incomp=$row['include_incomp'];
		         $id=$row['id'];
		    
		        ?> <div ><div class="boxinner"><center><h3 style='color:white;'><?php echo $comp_name; ?></h3></center><?php
		        ?><div class="innertimeline"style="background-color:white;"><p style="text-align:justify;"><h3> <?php echo $heading1; ?></h3><?php
		        ?><h4><?php echo $heading2; ?></h4><?php
		        ?><p><span class="pull-left green"><?php echo $opening_status ?></span><span class="pull-right green"><?php if($fee==0){echo "100% Free";}else { echo $fee ." INR"; }?></span></p><?php
		        ?><p><?php if($include_incomp!=""){ echo " (".$include_incomp.") "; ?> </p>
		  
		   <p><?php echo $description_sh ; ?> </p> 
		  <p><?php echo $description_lg ; ?> </p>
		  
		    </div></div></div><?php
	   }
	   
	   
	   }
	   }