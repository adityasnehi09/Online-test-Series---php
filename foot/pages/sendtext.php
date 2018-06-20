<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
        <?php include_once("header.php"); ?>
        <!-- Page Content -->
		<?php
		if(isset($_REQUEST['idcontact']))
		{
			$idcontact=mysqli_real_escape_string($con,$_GET['idcontact']);
			$sql=mysqli_query($con,"select * from contact where s_no='$idcontact'");
			if(mysqli_num_rows($sql)>0)
			{
				while($rows=mysqli_fetch_assoc($sql))
				{
					 $nameC=$rows['name'];
					$emailC=$rows['email'];
					$mobile_noC=$rows['mobile_no'];
					$messageC=$rows['message'];
				}
			}
			
		}
		
		
		?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Only text Send Mail 
						<?php 
						
						?></h1>
						 <form action="sendmailphp2.php"method="post"enctype="multipart/form-data">
               
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Email</label>
                       <input type="test" rows="5" name="email" class="form-control">
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> <?php if(isset($nameC)){ ?> value="<?php echo "Welcome ".$nameC; ?>"<?php  }?>
                        <label>Write Message</label>
                        <textarea rows="5" name="mymsg" class="form-control" value="Thank you for getting in touch!<br>We have received your message and would like to thank you for writing to us.">Thank you for getting in touch!<br>We have received your message and would like to thank you for writing to us.</textarea>
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> <?php if(isset($nameC)){ ?> value="<?php echo "Welcome ".$nameC; ?>"<?php  }?>
                        <label>Message</label>
                        <textarea rows="5" name="cusmsg" class="form-control"<?php if(isset($messageC)){ ?> value="<?php echo $messageC; ?>"<?php  }?>><?php if(isset($messageC)){ ?> value="<?php echo "reply of your message <br>".$messageC; ?>"<?php  }?></textarea>
                    </div>
               </div>
			 
			
             <div class="col-md-12">
            <div class="form-group"> 
                <input type="submit"class="btn btn-primary" value="Send"/>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
            </form>
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
