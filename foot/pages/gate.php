<?php
if(isset($_GET['change_series_no']))
	
	{
		require_once("welcome.php");
		$series_no_= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['series_no_']), ENT_QUOTES, 'UTF-8');
		$examid_= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['examid']), ENT_QUOTES, 'UTF-8');
		
		if(mysqli_query($con,"update gate_exam set series_no ='$series_no_' where uid='$examid_'"))
				{
					header("location: gate.php?status=serial changed");
					
				}
		
		
	}
	if(isset($_GET['change_ins_link']))
	
	{
		require_once("welcome.php");
		$link_= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['link_']), ENT_QUOTES, 'UTF-8');
		$examid_= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['examid_']), ENT_QUOTES, 'UTF-8');
		
		if(mysqli_query($con,"update gate_exam set instruction ='$link_' where uid='$examid_'"))
				{
					header("location: gate.php?status=instruction_link_updated");
					
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

    <title>Gate Exam Control</title>

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
                        <h1 class="page-header">Gate Exam Admin Center</h1>
						
                    </div>
					<div class="row">
					 <div class="panel-body col-lg-4">
					 <h3>Latest Test</h3>
					<?php 
					$sqq=mysqli_query($con,"select uid,exam_name,starting_time,starting_month,instruction,starting_year,starting_day,series_no,question_approve,ready_to_run,running_status from gate_exam  order by s_no desc limit 0,1");
									if(mysqli_num_rows($sqq)>0)
									{
										while($row=mysqli_fetch_assoc($sqq))
										{
											echo '<b>'.$row['exam_name'].'</b>';
											$running_status= $row['running_status'];
											$question_approve= $row['question_approve'];
											$series_no= $row['series_no'];
											$exam_uid= $row['uid'];
											$instruction= $row['instruction'];
										}
										
									}
									
									?><br><br>
									<?php if($running_status=='1')
									{
										?>
										<a href="change_running_status.php?id=<?php echo $exam_uid;?>&action=0"><button class="btn btn-success" style="width:100%;margin-bottom:10px">Stop Run</button></a>
										<?php
									}
									else
									{
										?>
										<a href="change_running_status.php?id=<?php echo $exam_uid;?>&action=1"><button class="btn btn-danger" style="width:100%;margin-bottom:10px">Start Run</button></a>
										<?php
									}
									?>
									
				
									<?php if($question_approve==1)
									{
										?>
										<a href="change_question_approve_status.php?id=<?php echo $exam_uid;?>&action=0"><button class="btn btn-success" style="width:100%;margin-bottom:10px">Reject question</button></a>
										<?php
									}
									else
									{
										?>
										<a href="change_question_approve_status.php?id=<?php echo $exam_uid;?>&action=1"><button class="btn btn-danger" style="width:100%;margin-bottom:10px">Question Approved</button></a>
										<?php
									}
									?>
										
										
										
										<form action="" method="get">
										<div class="input-group"style="margin-bottom:10px">
      <input type="text" class="form-control" placeholder="Enter Series"name="series_no_"<?php if(empty($series_no) || $series_no==0)
									{ } else {?>value="<?php echo $series_no; ?>"<?php } ?>>
      <span class="input-group-btn">
	  <input type="hidden"name="examid" value="<?php echo $exam_uid; ?>"/>
        <input type="submit" class="btn btn-default" value="Set Series"name="change_series_no" />
      </span>
    </div></form><!-- /input-group -->
	

	<form action="" method="get">
										<div class="input-group"style="margin-bottom:10px">
      <input type="text" class="form-control" placeholder="Enter Instruction Link"name="link_"<?php if(isset($instruction)){ ?> value="<?php echo $instruction; ?>"<?php } ?> />
      <span class="input-group-btn">
	  <input type="hidden"name="examid_" value="<?php echo $exam_uid; ?>"/>
        <input type="submit" class="btn btn-default" value="Set Series"name="change_ins_link" />
      </span>
    </div></form><!-- /input-group -->
										
										
										
										
									
									
									
									<a href="ranklist.php?id=<?php echo $exam_uid; ?>"><button class="btn btn-success" style="width:100%;margin-bottom:10px">Create Rank List</button></a>
									
					 </div>
					
					 <div class="panel-body col-lg-4">
					<table class="table">
						
                                <?php 
									$sqq=mysqli_query($con,"select * from gate_exam  where question_approve='0' order by s_no desc limit 0,10");
									if(mysqli_num_rows($sqq)>0)
									{
										?>
										<tr><th>Name</th><th>Created</th><th></th></tr><?php
										while($row=mysqli_fetch_assoc($sqq))
										{
											?><tr><td><?php echo $row['exam_name']; ?></td><td><?php echo $row['creating_time'].",".$row['creating_month'].":".$row['creating_day'].":".$row['creating_year'];?></td><td align="right"><button class="btn btn-default">Approve</button></td></tr><?php
											
										}
									}
									else
									{
										echo "No Pending Gate Competition";
									}
									
									?>
									</table>
									</div>
									 <div class="panel-body col-lg-4">
									 <h3>Create Or Edit Question paper</h3>
                            <div class="list-group">
							 <?php 
									$sqq=mysqli_query($con,"select uid,exam_name,starting_time,starting_month,starting_year,starting_day from gate_exam  where complete_question='0' order by s_no desc limit 0,10");
									if(mysqli_num_rows($sqq)>0)
									{
										?>
										<?php
										while($row=mysqli_fetch_assoc($sqq))
										{
											?>
											 <a href="create_question.php?id=<?php echo $row['uid'];?>" class="list-group-item">
                                    <i class="fa fa-flag-o "></i> <span><?php echo $row['exam_name']; ?></span>
                                    <span class="pull-right text-muted small"><span><?php echo $row['starting_time'].", ".$row['starting_day']."/".$row['starting_month']."/".$row['starting_year']; ?></span>
                                    </span>
                                </a>
											
											
											
										<?php
											
										}
									}
									
									?>
                               
                                
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All</a>
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
