<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Question Status</title>

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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Question Status</h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<?php 
									$sqq=mysqli_query($con,"select * from all_test  where complete_question='0' order by s_no desc");
									if(mysqli_num_rows($sqq)>0)
									{
										?>
										<table class="table">
										<tr><th>Exam Name</th><th>Running</th><th>Question Approved</th><th>Question Complete</th><th>Category</th><th></th></tr>
										<?php
										
										while($row=mysqli_fetch_assoc($sqq))
										{
											$question_table="question_".$row['uid'];
											$no_of_complete_question=mysqli_num_rows(mysqli_query($con,"select s_no from `$question_table`"));
											?>
											<tr>
											<td><?php echo $row['exam_name']; ?></td>
											<td><?php if($row['running_status']==1){echo "<i class='glyphicon glyphicon-ok'></i>";}else{echo "<i class='glyphicon glyphicon-remove'></i>";} ?></td>
											<td><?php if($row['question_approve']==1){echo "<i class='glyphicon glyphicon-ok'></i>";}else{echo "<i class='glyphicon glyphicon-remove'></i>";} ?></td> 
											<td><?php if($no_of_complete_question==$row['no_of_question']){echo "<i class='glyphicon glyphicon-ok'></i> ";} else {echo "<i class='glyphicon glyphicon-remove'></i> "; }?> <a href="create_question.php?id=<?php echo $row['uid'];?>">Edit</a></td>
											<td><?php echo $row['exam_type'];?> </td>
											<td><a href="exam_control.php?exam_u_id=<?php echo $row['uid']; ?>">Control</a> </td> 
											<td><a href="#" onclick="deletetest('<?php echo $row['uid']; ?>')">Delete</a> </td> 
                                  
                               
											
											</tr>
											
										<?php
											
										}
										?>
										</table>
										<?php
									}
									
									?>
                               
                                
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
