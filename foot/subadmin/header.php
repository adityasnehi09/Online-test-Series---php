<?php
ob_start();
require_once 'session.php';

?><!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>My BDCard Wallet</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">

    <script src="../lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="../lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
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
          <a class="" href="dashboard.php"><span class="navbar-brand"><span class="fa fa-globe"></span> BDCard International Virtual Wallet</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
		  
		   <li class="hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-asterisk padding-right-small" style="position:relative;top: 3px;"></span> Balance : <span class="label label-info"> <?php echo admin_info($_SESSION['USERID'], 'balance');?></span>
                   
                </a></li>
				
				
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
    
     <li><a href="dashboard.php" data-target=".planA" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-shopping-cart"></i>Dashboard</a></li>
     
	
	
	
	<li><a href="#" data-target=".planB" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-shopping-cart"></i> Member Control<i class="fa fa-collapse"></i></a></li>
        <li><ul class="planB nav nav-list collapse">
         <li><a href="newmember.php"><span class="fa fa-caret-right"></span> New Member</a></li>
             <li><a href="member_list.php"><span class="fa fa-caret-right"></span> Member List</a></li>		 
             <li><a href="balanceTransfer.php"><span class="fa fa-caret-right"></span> Balance Transfer</a></li>		 
             <li><a href="transferHistory.php"><span class="fa fa-caret-right"></span> Balance Transfer History</a></li>			 
			 <li><a href="recharge_pin.php"><span class="fa fa-caret-right"></span> Recharge PIN Generation</a></li>
			 <li><a href="pin_list.php"><span class="fa fa-caret-right"></span> Recharge PIN List</a></li>
 
    </ul></li>
	
	
	 
	 
	 
	 
	
	 <li><a href="logout.php"  class="nav-header"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
	 
    
    
     
   </ul>
    </div>