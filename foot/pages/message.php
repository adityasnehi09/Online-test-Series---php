<?php require_once("session.php");?>

<!DOCTYPE html>
<html lang="en">

<head>

   
<script>
	function change_page(page_id){   
		var mesd = $("#search").val();
		var dataString = 'page_id='+ page_id+'&search='+mesd;
		$.ajax({
			type: "POST",
			url: "load_contact_list.php",
			data: dataString,
			cache: false,
			success: function(result){
				$("#page_data").html(result);
			}
		});
	}
</script>	
</head>

<body onload="change_page(1)">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once("header.php"); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					<?php require_once("welcome.php"); 
					$countmsg=mysqli_num_rows(mysqli_query($con,"select email from contact"));
					
					?>
                        <h1 class="page-header">Message (<?php echo $countmsg; ?>)</h1>
                    </div>
							   
        <div class="input-group"style="width:300px;float:right;margin-bottom:20px;">
      <input type="text" class="form-control input-sm" placeholder="Search for..." id="search"  <?php 
			  if(isset($_POST["btnname"]))
				{
					 $search=$_POST["search"];
					echo "value=".$search;
					
					
				}
		 
			   ?> />
      <span class="input-group-btn">
        <button class="btn btn-default btn-sm" type="button" id="btn" onclick="change_page(0)">Go!</button>
      </span>
    </div><!-- /input-group --> 
                    
               
        <div class="panel-body"> 
       <div id="page_data"></div>  
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
