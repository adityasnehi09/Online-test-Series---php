<?php
require_once("session.php");

if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        die(redirect('member_list.php'));
    }else{
       $row = QueryArray(Query("SELECT * FROM `allmember` WHERE `id`='$id'"));
    }
    
}else{
    die(redirect('member_list.php'));
}
require_once("../../imp/function.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
		<!-- Navigation -->
        <?php include_once("header.php"); ?>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    
					



<div class="content">
         <div class="header">
            
            <h1 class="page-title">Edit Member</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Edit Member</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Edit Member</div>
        <div class="panel-body">
          
		  <form method="post">
		  
			<div class="form-group">
                    <label>Name</label>
                    <input type="text" name="fname" id="name" class="form-control" value="<?php echo $row['name'];?>"> 
					<input type="hidden" name="id" id="ids" class="form-control" value="<?php echo $row['id'];?>"> 
                </div>  
                
                
                <div class="form-group">
                    
                    <input type="hidden" name="lname" id="lname" class="form-control" value="<?php echo $row['lname'];?>"> 
                </div> 
                 
                 
                
                <div class="form-group">
                    <label>E-mail Name</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'];?>"> 
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact"  id="contact"  class="form-control" value="<?php echo $row['mobile_no'];?>"> 
                </div> 
				<div class="form-group">
                    <label>Password</label>
					
                    <input type="text" name="contact"  id="password_input"  class="form-control" value="<?php echo trim(encrypt_decrypt('decrypt', $row['passwordX']));?>"> 
                </div> 				



				
			
            
			 <div class="form-group"> 
                <button type="button" class="btn btn-primary" onclick="UpdateInfo()"><i class="fa fa-save"></i> Update</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>   
            </form> 
            <div id="msg"></div> 
			
             
        </div>
        </div>

<?php include 'footer.php'; ?>
  <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
