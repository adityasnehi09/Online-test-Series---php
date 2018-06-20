<?php
session_start();
if(isset($_POST['submitlog']))
{
require_once("../../welcome.php");
require_once("../../imp/function.php");
$userX=securedata($_POST['userid']);
$passX=securedata($_POST['password']);
$sql=mysqli_query($con,"select * from foot where username='$userX' and pass1='$passX'");
	if(mysqli_num_rows($sql)>0)
	{
		while($rrows=mysqli_fetch_assoc($sql))
		{
			$username=$rrows['username'];
			$name=$rrows['name'];
			$emailP=$rrows['email'];
			$type_member=$rrows['type_of_member'];
			$_SESSION['type_of_member']=$type_member;
					
			$_SESSION['nbadminuname']=$username;
			$_SESSION['nbadminname']=$name;
			$_SESSION['nbadminemail']=$emailP;
			
			if($emailP=="adityasnehi08@gmail.com")
			{
				$_SESSION['adityasnehilogin']=true;
			}
			header("location: index.php");
		}
	
	}
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NightBird Admin Section</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"action=""method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Id" name="userid" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                              
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block"value="Login"name="submitlog">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
