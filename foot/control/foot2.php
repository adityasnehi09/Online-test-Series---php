<?php
session_start();
 if(!isset($_SESSION['adityasnehiloginyes']))
 {
	 header("location: http://nightbird.in");
 }else{
	 ?>
	<head>

	
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		 <link rel="stylesheet" href="font.css">
		
  <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">

	</head>
	<body style="">

        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
		   <li><a href="#createnewversion" role="button" data-toggle="modal">Create New Competition Version</a></li>
		   <li><a href="#createnewcomp" role="button" data-toggle="modal">Create New Competition</a></li>

            
           </ul>
        </div>	
     



<!--main-->

<div class="fluid-container" >

   <div class="row">
  <div class="col-lg-12"style="background-color:white">
  <h2>Total Competition</h2>
  <table style="width:100%;font-size:21px;"border="4">
  <tr>

  <th>Version Name</th>
  <th>From</th>
  <th>To</th>
 
  <th>Fee</th>

  <th>Short Description</th>


  <th>last date of submission</th>
  <th>Detail</th>
  </tr>
  <?php
  require_once("welcome.php");
  $sql=mysql_query("select * from allcompetition ");
  if(mysql_num_rows($sql)>0)
  {
	  while($row=mysql_fetch_assoc($sql))
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
		  ?>
		 
		  <tr>
		 
		  <td><?php echo $comp_name; ?></td>
		  <td><?php echo $starting_date; ?></td>
		  <td><?php echo $ending_date; ?></td>
		  
		  <td><?php echo $fee; ?></td>
		 
		
		  <td><?php echo $description_sh; ?></td>
		  <td><?php echo $last_date; ?></td>
		  <td><a href="../getversiondetail.php?idofversion=<?php echo $id; ?>">Detail</a></td>
		 
		  </tr>
		 
		  <?php
	  }
  }
 
  ?>	
 </table>  



  
  
  </div>
  <div class="col-lg-12"style="background-color:pink">

 
  </div>
  </div><!--/row-->
  </div>
<div class="marqueetad">
<marquee><b>This is admin center of Night Bird. Normal entry is not allowed here. Please visit our mail Website <a href="http://nightbird.in">Night Bird</a></b></marquee>
</div>


<!--CREATE NEW COMPETITION VERSION-->
<div id="createnewversion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>CREATE NEW COMPETITION VERSION</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block"action="adminverify.php"method="post"role="form">
            <div class="form-group">
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="comp_name"id="comp_name" placeholder="COMPETITION NAME"required>
            </div>
			 <div class="form-group">
              <label for="heading1">Heading One</label><input type="text" class="form-control input-lg"name="heading1"id="heading1" placeholder="HEADING 1"required>
            </div>
			 <div class="form-group">
              <label for="heading2">Heading Two</label><input type="text" class="form-control input-lg"name="heading2"id="heading2" placeholder="HEADING 2">
            </div>
			 <div class="form-group">
              <label for="heading3">Heading Three</label><input type="text" class="form-control input-lg"name="heading3"id="heading3" placeholder="HEADING 3">
            </div>
			<div class="form-group">
              <label for="include_incomp">Include In Competition</label><input type="text" class="form-control input-lg"name="include_incomp"id="include_incomp" placeholder="Include In Competition"required>
            </div>
			<div class="form-group">
              <label for="opening_status">Opening Status</label><input type="text" class="form-control input-lg"name="opening_status"id="opening_status" placeholder="Entry Open/Entry Close"required>
            </div>
			            <div class="form-group">
              <label for="starting_date">Starting Date</label><input type="date" class="form-control input-lg"name="starting_date"id="starting_date" required>
            </div>
						            <div class="form-group">
              <label for="ending_date">Ending Date</label><input type="date" class="form-control input-lg"name="ending_date"id="ending_date" required>
            </div>
						            <div class="form-group">
              <label for="total_seat">Total Seat</label><input type="number" class="form-control input-lg"name="total_seat"id="total_seat" required>
            </div>
						            <div class="form-group">
              <label for="fee">Fee in INR</label><input type="number" class="form-control input-lg"name="fee"id="fee" required>
            </div>
						            <div class="form-group">
              <label for="last_date">Last Date</label><input type="date" class="form-control input-lg"name="last_date"id="last_date" required>
            </div>
			  <div class="form-group">
              <label for="description_sh">Description in shot</label><textarea class="form-control input-lg"name="description_sh"id="description_sh" required></textarea>
            </div>
			<div class="form-group">
              <label for="description_lg">Description in Long</label><textarea class="form-control input-lg"name="description_lg"id="description_lg" rows="10"required></textarea>
            </div>
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="newversion_submit"value="Create"id="newversion_submit"/>

            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>






<!--CREATE NEW COMPETITION-->
<div id="createnewcomp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Select The Version</h2>
      </div>
      <div class="modal-body">
      <?php    $sql=mysql_query("select comp_name,id from allcompetition order by id desc");
  if(mysql_num_rows($sql)>0)
  {
	  while($row=mysql_fetch_assoc($sql))
	  {
		  $comp_name=$row['comp_name'];
		  $version_id=$row['id'];
		  echo "<h3><a href='step1cc.php?id=$version_id'>".$comp_name."</a></h3>";
		  ?><br>
  <?php }} ?>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>	
      </div>
  </div>
  </div>
</div>


 <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-links">
                        <ul class="footer-group">
						<?php
							if(!isset($_SESSION['logintemp']))
							{?>
                            <li><a href="#">Sign up</a></li>
							<li><a href="#"id="loginlink">Login</a></li>
							
							<?php } else {?>
							<li><a href="logout.php"id="logoutlink">Logout</a></li>
							<?php } ?>
                             
                            
                            <li><a id="downcontact"style="cursor:pointer;">Contact</a></li>
                            <li><a href="http://www.peterfinlan.com/">Terms and Condition</a></li>
							
							<li><a href="#">policy</a></li>
							
                        </ul>
                        
                        </p>
                    </div>
                </div>
                <div class="social-share">
										<p><span id="location"></span></p>
                    <p>Share Night Bird with your friends</p>
                    <span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>                </div>
            </div>
        </div>
    </footer>
	<!-- script references -->
		<script src="j.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="js/control.js"></script>
	</body>
</html>
 <?php } ?>