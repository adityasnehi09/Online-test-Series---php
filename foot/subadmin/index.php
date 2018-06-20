<?php

include '../include/config.php';
include '../include/function.php';
 
?>

<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>My BDCard Wallet</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">

    <script src="../lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    

    <link rel="stylesheet" type="text/css" href="../stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/premium.css">

</head>
<body class=" theme-blue">

     
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

 
  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-globe"></span> International Virtual Voucher</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;"></div>
      </div>  

      
        <div class="dialog">
            <div id="msg"></div> 
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign In</p>
        <div class="panel-body">
        
            <form id="fromData" action="login.php" method="post">
                <div class="form-group">
                    <label>Manager ID</label>
                    <input type="text" name="username" class="form-control span12">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" name="password" class="span12 form-control">
                </div>
                <button class="btn btn-primary pull-right" id="submitForm">Sign In</button>  
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <p class="pull-right" style=""><a href="#" style="font-size: .75em; margin-top: .25em;">All Rights Reserved by BDCard International</a></p>
     
</div>



    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script src="../lib/custom.js"></script>
</body></html>
