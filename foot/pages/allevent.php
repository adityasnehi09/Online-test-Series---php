 <?php 
require_once("session.php");
 if(!isset($_SESSION['adityasnehiloginyes']))
 {
	 header("location: http://nightbird.in");
 }else{
	   $launchcomp=0;
	   require_once("welcome.php");
	   $resultsql=mysqli_query($con,"select * from allcompetition order by s_no desc");
	   
	  $countcersion= mysqli_num_rows($resultsql);
	 
	   if($countcersion>0)
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
		  $launchcomp=1;
		  
		  ?> <?php if($countcersion==1){?>
		  <div class="col-md-12"><div class="boxinner">
		  <?php } else {?>
		   <div class="col-md-6"><div class="boxinner">
		  <?php } ?>
		  <center><h3 style='color:#002D3C;'><?php echo $comp_name; ?></h3></center><?php
		  ?><div class="innertimeline"style="background-color:white;"><p style="text-align:justify;"><h3> <?php echo $heading1; ?></h3><?php
		  ?><h4><?php echo $heading2; ?></h4><?php
		  ?><p><span class="pull-left green"><?php echo $opening_status ?></span><span class="pull-right green"><?php if($fee==0){echo "100% Free";}else { echo $fee ." INR"; }?></span></p><?php
		  
		  
		  ?>  </p> <p><?php if($include_incomp!=""){ echo " (".$include_incomp.") "; ?> </p>
		  
		  <center>  <input type="button"class="btn  btn-small"style="outline:none"value="Learn More"onclick="learn('<?php echo $id ; ?>')"></a></center>
	      
          </div></div></div><?php
		   }
		   require_once("welcome.php");
		   $sql33=mysqli_query($con,"select comp_name,uid from `$id`");
		   if(mysqli_num_rows($sql33)>0)
		   {
			   while($srow=mysqli_fetch_assoc($sql33))
			   {
				   $c=$srow['uid'];
				   echo "<a href='reg_p.php?v=$id&c=$c'>".$srow['comp_name']."</a>";
				   $ccc=mysqli_query($con,"select s_no from `$c`");
				   echo " ( member : ".mysqli_num_rows($ccc) .")<br>";
			   }
		   }
	   }
	   
	   
	   }
 }
	   ?>