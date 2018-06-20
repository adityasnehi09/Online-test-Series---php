<?php
ob_start();
require_once 'session.php';

?><!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Profile</title>

<link rel="icon" type="image/png" href="../images/fav2.png">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <script src = "../lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">

    <script src="../lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="../lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
		<script src="../j.js"></script>
	<script src="../js/scripts.js"></script>
		<script src="../js/control.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="../stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
		function deletecontact(id,name,msg)
		{
			$("#generalpup").modal('show');
			$("#generalpupheading").html("Need Conformation");
			var dataString = '&id='+ id +'&name='+ name + '&msg='+ msg;
			$.ajax({
			type: "POST",
			url: "load_delete_conform.php",
			data: dataString,
			cache: false,
			success: function(result){
				
			
			$("#generalpupbody").html(result);
			}
			})
		}
		function deletepermanent(id)
		{
				$("#generalpupheading").html("Deleting...");
			var dataString = '&id='+ id;
			$.ajax({
			type: "POST",
			url: "delete_conform.php",
			data: dataString,
			cache: false,
			success: function(result){
			$("#generalpupbody").html(result);
			$("#generalpupheading").html("Deleted Successfully");
			}
			})
			
			
			
			
		}
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="dashboard.php"><span class="navbar-brand"><span class="fa fa-globe"></span> NightBird Footer Section</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> Administrator
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu"> 
                <li><a tabindex="-1" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
    
     <li><a href="dashboard.php" class="nav-header" ><i class="fa fa-fw fa-shopping-cart"></i>Dashboard</a></li>
     
	
	
	
	<li><a href="#" data-target=".planB" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-shopping-cart"></i> Member Control<i class="fa fa-collapse"></i></a></li>
        <li><ul class="planB nav nav-list collapse">
          <li><a href="newmember.php"><span class="fa fa-caret-right"></span> New Member</a></li>
             <li><a href="member_list.php"><span class="fa fa-caret-right"></span> Member List</a></li>
			 <li><a href="newsubadmin.php"><span class="fa fa-caret-right"></span> New Subadmin</a></li>
             <li><a href="subadmin_list.php"><span class="fa fa-caret-right"></span> Subadmin List</a></li>
             <li><a href="balanceTransfer.php"><span class="fa fa-caret-right"></span> Balance Transfer</a></li>
			 <li><a href="subadminbalanceTransfer.php"><span class="fa fa-caret-right"></span> Subadmin Balance Transfer</a></li>
             <li><a href="transferHistory.php"><span class="fa fa-caret-right"></span> Balance Transfer History</a></li>
			 <li><a href="transfersubadminHistory.php"><span class="fa fa-caret-right"></span> Subadmin Balance Transfer History</a></li>
		
 
    </ul></li>
	


	 <li><a href="changepass.php"  class="nav-header"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>


<li><a href="sendmail.php"  class="nav-header"><i class="fa fa-fw fa-cog"></i> Send Mail</a></li>
<li><a href="gate1.php"  class="nav-header"><i class="fa fa-fw fa-cog"></i> View Competition</a></li>

<?php if(isset($_SESSION['adityasnehiloginyes']))
{
	?>

 <li><a href="#createnewversion" role="button" data-toggle="modal"class="nav-header"><i class="fa fa-fw fa-cog"></i>Create New Competition Version</a></li>
		   <li><a href="#createnewcomp" role="button" data-toggle="modal"class="nav-header"><i class="fa fa-fw fa-cog"></i>Create New Competition</a></li>
		   <li><a href="#creategatecomp" role="button" data-toggle="modal"class="nav-header"><i class="fa fa-fw fa-cog"></i>Create Gate Competition</a></li>

<?php }?>    
	 
	 <li><a href="logout.php"  class="nav-header"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
	 
     
     
   </ul>
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
	  <form class="form col-md-12 center-block"method="post" enctype="multipart/form-data" action="adminverify.php"class="form col-md-12 center-block" >
            <div class="form-group">
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="comp_name"id="comp_name" placeholder="COMPETITION NAME"required>
            </div>
			 <div class="form-group">
              <label for="banner_img">Banner Image</label><input type="file" class="form-control input-lg"name="banner_img"id="banner_img" placeholder="Banner"required>
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
			 <label for="opening_status">Opening Status</label>
             <select class="form-control input-lg" name="opening_status"id="opening_status"required>
			 <option value="1">Entry Open</option>
			 <option value="0">Entry Close</option>
			 </select>
			
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





<!--CREATE Gate COMPETITION -->
<div id="creategatecomp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Create New Gate Competition</h2>
      </div>
      <div class="modal-body">
	  <form class="form col-md-12 center-block"method="post" enctype="multipart/form-data" action="creategatecomp.php"class="form col-md-12 center-block" >
            <div class="form-group">
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="exam_name"id="exam_name" placeholder="COMPETITION NAME"required>
            </div>
			
			 <div class="form-group">
              <label for="no_of_question">No Of Question</label><input type="number" class="form-control input-lg"name="no_of_question"id="no_of_question" placeholder="Number Of Question"required>
            </div>
			 <div class="form-group">
              <label for="time_limit">Time Limit in Minute</label><input type="text" class="form-control input-lg"name="time_limit"id="time_limit" placeholder="Time Limit">
            </div>
			 <div class="form-group">
              <label for="total_marks">Total Marks</label><input type="number" class="form-control input-lg"name="total_marks"id="total_marks" placeholder="Total Marks">
            </div>
			<div class="form-group">
              <label for="marks_per_question">Marks Per Question</label><input type="number" class="form-control input-lg"name="marks_per_question"id="marks_per_question" placeholder="Marks Per Question"required>
            </div>
			<div class="form-group">
              <label for="negative_marks">Negative Marks</label><input type="number" class="form-control input-lg"name="negative_marks"id="negative_marks" placeholder="Negative Marks"required>
            </div>
			<div class="form-group">
              <label for="streams">Streams</label><input type="text" class="form-control input-lg"name="streams"id="streams" placeholder="Streams"required>
            </div>
			<div class="form-group">
              <label for="starting_time">Starting Time</label><input type="text" class="form-control input-lg"name="starting_time"id="starting_time" placeholder="Starting Time"required>
            </div>
			<div class="row">
			<div class="form-group col-md-4">
              <label for="starting_day">Starting Day</label>
			    <select name="starting_day"id="starting_day"class="form-control" >
			  <option>Date</option>
			  <?php for($i=1;$i<32;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="starting_month">Starting Month</label>
			    <select name="starting_month"id="starting_month"class="form-control ">
			  <option>Month</option>
			  <option value="Jan">Jan</option>
			  <option value="Feb">Feb</option>
			  <option value="Mar">Mar</option>
			  <option value="Apr">Apr</option>
			  <option value="May">May</option>
			  <option value="Jun">Jun</option>
			  <option value="Jul">Jul</option>
			  <option value="Aug">Aug</option>
			  <option value="Sep">Sep</option>
			  <option value="Oct">Oct</option>
			  <option value="Nov">Nov</option>
			  <option value="Dec">Dec</option>
			  
			  </select>
			  
			 
            </div>
			
			<div class="form-group col-md-4">
              <label for="starting_year ">Starting Year</label>
         
			   <select name="starting_year"id="starting_year" class="form-control col-md-4">
			  <option>Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			
            </div>
			</div>
				
			<div class="form-group ">
              <label for="ending_time">Ending Time</label><input type="number" class="form-control input-lg"name="ending_time"id="ending_time" placeholder="Ending Time"required>
            </div>
			<div class="row">
			
			<div class="form-group col-md-4">
              <label for="ending_day">Ending Day</label>
			   <select name="ending_day"id="ending_day"class="form-control" >
			  <option>Date</option>
			  <?php for($i=1;$i<32;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
			<div class="form-group col-md-4">
              <label for="ending_month">Ending Month</label>
			   <select name="ending_month"id="ending_month"class="form-control" >
			  <option>Month</option>
			  <option value="Jan">Jan</option>
			  <option value="Feb">Feb</option>
			  <option value="Mar">Mar</option>
			  <option value="Apr">Apr</option>
			  <option value="May">May</option>
			  <option value="Jun">Jun</option>
			  <option value="Jul">Jul</option>
			  <option value="Aug">Aug</option>
			  <option value="Sep">Sep</option>
			  <option value="Oct">Oct</option>
			  <option value="Nov">Nov</option>
			  <option value="Dec">Dec</option>
			  
			  </select>
			
            </div>
			<div class="form-group col-md-4">
              <label for="ending_year">Ending Year</label>
			  <select name="ending_year"id="ending_year" class="form-control">
			  <option>Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			  
			 
            </div>
			</div>
			<div class="form-group">
              <label for="result_time">Result Time</label><input type="time" class="form-control input-lg"name="result_time"id="result_time" placeholder="Result Time"required>
            </div>
			<div class="row">
			<div class="form-group col-md-4">
              <label for="result_day">Result Day</label>
			   <select name="result_day"id="result_day" class="form-control">
			  <option>Date</option>
			  <?php for($i=1;$i<32;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
			<div class="form-group col-md-4">
              <label for="result_month">Result Month</label>
			   <select name="result_month"id="result_month" class="form-control" >
			  <option>Month</option>
			  <option value="Jan">Jan</option>
			  <option value="Feb">Feb</option>
			  <option value="Mar">Mar</option>
			  <option value="Apr">Apr</option>
			  <option value="May">May</option>
			  <option value="Jun">Jun</option>
			  <option value="Jul">Jul</option>
			  <option value="Aug">Aug</option>
			  <option value="Sep">Sep</option>
			  <option value="Oct">Oct</option>
			  <option value="Nov">Nov</option>
			  <option value="Dec">Dec</option>
			  
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="result_year">Result Year</label>
			   <select name="result_year"id="result_year" class="form-control">
			  <option>Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
            </div>
			
			
			<div class="form-group">
			 <label for="opening_status">Opening Status</label>
             <select class="form-control input-lg" name="opening_status"id="opening_status"required>
			 <option value="1">Entry Open</option>
			 <option value="0">Entry Close</option>
			 </select>
			
            </div>
	
						            <div class="form-group">
              <label for="fee">Fee in INR</label><input type="number" class="form-control input-lg"name="fee"id="fee" required>
            </div>
						      
			 
			<div class="form-group">
              <label for="description">Description</label><textarea class="form-control input-lg"name="description"id="description" rows="10"required></textarea>
            </div>
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="gate_submit"value="Create"id="newversion_submit"/>

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


<!--CREATE NEW COMPETITION-->
<div id="generalpup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="generalpupheading"></h2>
      </div>
      <div class="modal-body"id="generalpupbody">
      
      </div>
  </div>
  </div>
</div>
