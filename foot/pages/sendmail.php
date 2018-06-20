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
        <?php include_once("header.php"); ?>
        <!-- Page Content -->
		<?php
		if(isset($_GET['idcontact']))
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
                        <h1 class="page-header">Send Mail</h1>
						 <form action="sendmailphp.php"method="post"enctype="multipart/form-data">
               
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Heading1 | F1</label>
                        <input type="text" name="f1" class="form-control" placeholder="By default it is 'Welcome Name'"<?php if(isset($nameC)){ ?> value="<?php echo "Welcome ".$nameC; ?>"<?php  }?>>
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Small Description1 | F2 </label>
                       <textarea rows="5" name="f2" class="form-control"required></textarea>
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Image | F3</label>
                        <input type="file" name="f3" class="form-control"required>
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Small Description2 | F4</label>
                        <input type="text"  name="f4" class="form-control"<?php if(isset($messageC)){ ?> value="<?php echo "reply of your message <br>".$messageC; ?>"<?php  }?>>
                    </div>
               </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Heading 2 | F6</label>
                        <input type="text" name="f6" class="form-control">
                    </div>
               </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Big Description1 | F7</label>
                        <textarea rows="10" name="f7" class="form-control"></textarea>
                    </div>
               </div>
			   
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Button Text | F8</label>
                        <input type="text" name="f8" class="form-control"value="Click Here"required>
                    </div>
               </div>
			   
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Button Link | F9</label>
                        <input type="text" name="f9" class="form-control"required>
                    </div>
               </div>
			   
			  
			  
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Facebook Link | F10</label>
                        <input type="text" name="f10" class="form-control"value="https://www.facebook.com/nightbirdplatform/">
                    </div>
               </div>
			   
			 
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Contact No | F13</label>
                        <input type="text" name="f13" class="form-control"value="9814916810">
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Email | F14</label>
                        <input type="text" name="f14" class="form-control"value="info@nightbird.com">
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Terms Link | F15</label>
                        <input type="text" name="f15" class="form-control"value="http://nightbird.in/terms.php">
                    </div>
               </div>
			      <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Privacy Link | F16</label>
                        <input type="text" name="f16" class="form-control">
                    </div>
               </div> 
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Unsubscribe Link | F17</label>
                        <input type="text" name="f17" class="form-control">
                    </div>
               </div> 
			  
              <hr>
			  <H2>Email Detail</h2>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Subject | F18</label>
                        <input type="text" name="f18" class="form-control"placeholder="eg. NightBird Customer Support"required>
                    </div>
                </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>To (If One person else leave it) | F19</label>
                        <input type="text" name="f19" class="form-control"placeholder="someone@gmail.com"<?php if(isset($emailC)){ ?> value="<?php echo $emailC; ?>"<?php  }?>/>
                    </div>
                </div>
				<div class="col-md-12">
                    <div class="form-group"> 
                        <label>Send To | F20</label>
                        <select name="f20" class="form-control">
						<option value="1">All</option>
						<option value="2">Zero Balance</option>
						<option value="3">Non Zero Balance</option>
						<option value="4">To Single Person</option>
						</select>					
                    </div>
					
					
					
					
                </div> <div class="col-md-12">
                    <div class="form-group"> 
                        <label>From Email | F21</label>
                        <input type="text" name="f21" class="form-control"value="info@nightbird.in"required>
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
