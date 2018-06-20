
   <?php
ob_start();
require_once 'session.php';
require_once("../include/function.php");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IndoTufan Admin Area</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/control.js"></script>
    <script src="../lib/function.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
			$("#generalpupheading").html("<b style='color:white'>Need Confirmation</b>");
			var dataString = '&id='+ id +'&name='+ name + '&msg='+ msg;
			$.ajax({
			type: "POST",
			url: "load_delete_conform.php",
			data: dataString,
			cache: true,
			success: function(result){
				
			
			$("#generalpupbody").html(result);
			}
			})
		}
		function deletetest(id){
			$("#generalpup").modal('show');
			$("#generalpupheading").html("<b style='color:white'>Need Confirmation</b>");
			var dataString = '&id='+ id ;
			$.ajax({
			type: "POST",
			url: "load_test_delete_conform.php",
			data: dataString,
			cache: true,
			success: function(result){
				
			
			$("#generalpupbody").html(result);
			}
			})
			
		}
		
		
		function deletepermanent(id)
		{
			alert();
				$("#generalpupheading").html("Deleting...");
			var dataString = '&id='+ id;
			$.ajax({
			type: "POST",
			url: "delete_conform.php",
			data: dataString,
			cache: true,
			success: function(result){
			$("#generalpupbody").html(result);
			$("#generalpupheading").html("Deleted Successfully");
			}
			})
			
			
			
			
		}
		function deletetestpermanent(id)
		{
			alert();
				$("#generalpupheading").html("Deleting...");
			var dataString = '&id='+ id;
			$.ajax({
			type: "POST",
			url: "delete_test_confirm.php",
			data: dataString,
			cache: true,
			success: function(result){
			$("#generalpupbody").html(result);
			$("#generalpupheading").html("Deleted Successfully");
			}
			})
			
			
			
			
		}
		function showmodalphp(title_,url_)
		{
			$('#myModal').modal({
			backdrop: 'static',
			keyboard: false
			})
			
		$("#modaltitle").html("PLease Wait");
		$("#modalbody").html("<b>loading...</b>");
		$("#myModal").modal('show');
	
			$.ajax({
			type: "POST",
			url: url_,
			
			cache: true,
			success: function(result){
			$("#modaltitle").html(title_);
			$("#modalbody").html(result);
			}
			})
		}
    </script>
    

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
	   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">IndoTufan Admin Section</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
					<?php 
					require_once("welcome.php");
					$sql=mysqli_query($con,"select * from contact order by s_no desc limit 0,3");
					if(mysqli_num_rows($sql)>0)
					{
						while($rows=mysqli_fetch_assoc($sql))
						{
							?>
							<li>
                            <a href="#">
                                <div>
                                    <strong><?php echo $rows['name']; ?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $rows['timing'].",".$rows['day'].":".$rows['day'].":".$rows['day']; ?> </em>
                                    </span>
                                </div>
                                <div><?php echo $rows['message'];?></div>
                            </a>
                        </li>
                        <li class="divider"></li>
							
							
							
							<?php
						}
					}
					
					?>
                       
                        <li>
                            <a class="text-center" href="message.php">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nbadminname'];?></a>
                        </li>
                        <li><a href="changepass.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						 <li>
                            <a href="#"onclick="showmodalphp('Create Exam','create_exam.php')"><i class="fa fa-dashboard fa-fw"></i> Create Exam</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> View Comp<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.php">Active Comp</a>
                                </li>
                                <li>
                                    <a href="morris.php">Pending Comp</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 
						 <li>
                            <a href="exam_control.php"><i class="fa fa-bar-chart-o fa-fw"></i> Exam Control</a>
							</li>
                           
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Member Section<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="member_list.php"><i class="fa fa-user fa-fw"></i> Total Member</a>
                                </li>
								 <li>
                                    <a href="subadmin_list.php"><i class="fa fa-edit fa-fw"></i> SubAdmin</a>
                                </li>
								 <li>
                                    <a href="morris.php"><i class="fa fa-edit fa-fw"></i> Add member</a>
                                </li>
								 <li>
                                    <a href="morris.php"><i class="fa fa-plane fa-fw"></i>Add Admin</a>
                                </li>
								 <li>
                                    <a href="morris.php"><i class="fa fa-plus fa-fw"></i>Add Sub Admin</a>
                                </li> 
								<li>
                                    <a href="morris.php"><i class="fa fa-plus fa-fw"></i>Add Question Maker</a>
                                </li> 
								
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                     
						<li>
                            <a href="#"><i class="fa fa-envelope-o fa-fw""></i> Send Mail<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="sendtext.php">Very simple Mail</a>                       
                                </li>
								<li>
                                    <a href="simplemail.php">Simple Mail</a>                       
                                </li>
                                <li>
                                    <a href="sendmail.php">Advance Mail</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 
						<li>
                            <a href="message.php"><i class="fa fa-edit fa-fw"></i> Message</a>
                        </li>
						<li>
                            <a href="delete.php"><i class="fa fa-edit fa-fw"></i> Remove</a>
                        </li>
						<li>
                            <a href="remove_db_error.php"><i class="fa fa-edit fa-fw"></i> Fix Error
							</a>
                        </li>
						
                      
						
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		


<!--CREATE NEW COMPETITION-->



<!--CREATE NEW COMPETITION-->
<div id="generalpup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog"style="max-width:400px;">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#213948;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"id="generalpupheading"></h2>
      </div>
      <div class="modal-body"id="generalpupbody">
      
      </div>
  </div>
  </div>
</div>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#213948;">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h1 class="modal-title" id="modaltitle"style="color:white"></h1>
                                        </div>
                                        <div class="modal-body"id="modalbody">
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           <span id="savebutton"> </span>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
