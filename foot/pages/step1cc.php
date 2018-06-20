<?php
require_once("session.php");
 if(!isset($_SESSION['adityasnehiloginyes']))
 {
	 header("location: http://nightbird.in");
 }else{
require_once("welcome.php");
//chacked security k1
$id=mysqli_real_escape_string($con,$_GET['id']);
?>
  <?php

  $sql=mysqli_query($con,"select * from allcompetition where id='$id'");
  if(mysqli_num_rows($sql)>0)
  {
	  while($row=mysqli_fetch_assoc($sql))
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
		  $id=$row['id'];
		 
	  }
	  mysql_close();		
  }
  ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

	<head>

		<title>gate 1</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		 <link rel="stylesheet" href="font.css">
		
  <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		
		 <script>

	</script>
	
	</head>
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="">
        
          <h2 class="text-center">CREATE NEW COMPETITION </h2>
          <h4 class="text-center"><?php echo $comp_name ;?> </h4>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block"action="adminverifycc.php?id=<?php echo $id?>"method="post"role="form">
            <div class="form-group"><br><br>
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="comp_name"id="comp_name" placeholder="COMPETITION NAME"required>
            </div>
			            <div class="form-group">
              <label for="starting_date">Starting Date</label><input type="date" class="form-control input-lg"name="starting_date"id="starting_date"value="<?php echo $starting_date; ?>" required>
            </div>
						            <div class="form-group">
              <label for="ending_date">Ending Date</label><input type="date" class="form-control input-lg"name="ending_date"id="ending_date"value="<?php echo $ending_date; ?>" required>
            </div>
						            <div class="form-group">
              <label for="total_seat">Total Seat</label><input type="number" class="form-control input-lg"name="total_seat"id="total_seat"value="<?php echo $total_seat; ?>" required>
            </div>
						            <div class="form-group">
              <label for="fee">Fee in INR</label><input type="number" class="form-control input-lg"name="fee"id="fee"value="<?php echo $fee; ?>" required>
            </div>
			 <div class="form-group">
              <label for="formate">Formate</label>
			  <select class="form-control input-lg"name="formate"id="formate">
			  <option value="audio">Audio</option>
			  <option value="video">Video</option>
			  <option value="image">image</option>
			  </select>
            </div>
						            <div class="form-group">
              <label for="last_date">Last Date</label><input type="date" class="form-control input-lg"name="last_date"id="last_date" value="<?php echo $last_date; ?>"required>
            </div>
			 <div class="form-group">
              <label for="changefile">Charge For File change</label><input type="number" class="form-control input-lg"name="changefile"id="changefile" required>
            </div>
			<div class="form-group">
              <label for="changepartnerb">Change partner Before Submit</label><input type="number" class="form-control input-lg"name="changepartnerb"id="changepartnerb" required>
            </div>
			<div class="form-group">
              <label for="changepartnera">Change partner After Submit </label><input type="number" class="form-control input-lg"name="changepartnera"id="changepartnera" required>
            </div>
			<div class="form-group">
              <label for="changecancelreq">Change Cancel Request </label><input type="number" class="form-control input-lg"name="changecancelreq"id="changecancelreq" required>
            </div>
			
			
			
			  <div class="form-group">
              <label for="description_sh">Description in shot</label><textarea class="form-control input-lg"name="description_sh"id="description_sh"required></textarea>
            </div>
			<div class="form-group">
              <label for="description_lg">Description in Long</label><textarea class="form-control input-lg"name="description_lg"id="description_lg" rows="10"required></textarea>
            </div>
			
			
						<div class="form-group">
            
			  <select  class="form-control input-lg"name="categorylist"required>
			  <option value="">Select Category</option>
			  <option value="dance">Dance</option>
			  <option value="singing">Singing</option>
			  <option value="acting">Acting</option>
			  <option value="comedy">Comedy</option>
			  <option value="voice">Voice</option>
			  <option value="modal">Modaling</option>
			  </select>
            </div>
			
			
						<div class="form-group">
           
			  <select  class="form-control input-lg"name="totalperson"required>
			  <option value="">Total Person Allowed</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			  <option value="9">9</option>
			  <option value="10">10</option>
			  
			  </select>
            </div>
			
			
			
			
			
			
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="newcomp_submit"value="Create"id="newversion_submit"/>

            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">

		  </div>	
      </div>
  </div>
  </div>
 <?php } ?>
