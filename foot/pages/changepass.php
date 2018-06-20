<?php require_once("session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include_once("header.php"); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Change Password</h1>
                    </div>
        <form action="action_password.php" method="post" id="fromData">
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Old Password</label>
                        <input type="password" name="old" class="form-control" >
                    </div>
               </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>New Password</label>
                        <input type="password" name="new" class="form-control">
                    </div>
               </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Confirm Password</label>
                        <input type="password" name="confirm" class="form-control">
                    </div>
               </div>
             <div class="col-md-12">
            <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> Change Password</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
            </form>
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
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
	   <script src="../lib/custom.js"></script>
</body>
</html>