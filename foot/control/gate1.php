<?php
include_once("header.php");
 if(!isset($_SESSION['adityasnehiloginyes']))
 {
	 header("location: http://nightbird.in");
 }else{ ?>
 

 <!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

	<head>

		<title>Competition Version</title>
		
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
	<body style="">


<!--main-->
<div class="content">
        <div class="header">
            <h1 class="page-title">Dashboard</h1>
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a> </li>
				<li class="active">Dashboard</li>
				<div class="pull-right">
				Total Competition Version
				<?php 
					$total = mysql_num_rows(Query("SELECT * FROM `allcompetition`"));
				?> 
				<span class="label label-success "><?php echo $total;?></span>
				</div>
			</ul>
			
        </div>
		
		
		
		
		
		
        <div class="main-content">

	<div class="main-content"> 
		
        <div class="main-content"> 
			
       

       <div class="panel panel-default">

            <div class="panel-heading">Competition Version

            

                 <span class="panel-icon pull-right col-md-2">

                    

                    <div class="input-group">

      <input type="text" class="form-control input-sm" placeholder="Search for..." id="search">

      <span class="input-group-btn">

        <button class="btn btn-default btn-sm" type="button" onclick="change_page(0)">Go!</button>

      </span>

    </div><!-- /input-group --> 

                    

                </span>

                

            </div>

        <div class="panel-body"> 

       <div id="page_data">
	   

  <table class="table"style="width:100%;">
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
		  <td><a href="../../getversiondetail.php?idofversion=<?php echo $id; ?>">Detail</a></td>
		 
		  </tr>
		 
		  <?php
	  }
  }
 
  ?>	
 </table>  



	   
	   
	   
	   
	   
	   </div>  

        </div>

        </div>

	
	
	
	
<?php include 'footer.php'; ?>


 


	<!-- script references -->
		
	</body>
 <?php } ?>
</html>