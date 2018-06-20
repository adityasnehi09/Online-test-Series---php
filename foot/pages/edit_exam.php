 <?php
require_once 'session.php';

require_once("../../welcome.php");
if(isset($_REQUEST['exam_u_id']))
					{
						$exam_u_id= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['exam_u_id']), ENT_QUOTES, 'UTF-8');
					
					$sqq=mysqli_query($con,"select * from all_test  order by s_no desc limit 0,1");
						
					
									if(mysqli_num_rows($sqq)>0)
									{
										while($row=mysqli_fetch_assoc($sqq))
										{
											$name=$row['exam_name'];
											$running_status= $row['running_status'];
											$time_limit= $row['time_limit'];
											$total_marks= $row['total_marks'];
											$marks_per_question= $row['marks_per_question'];
											$negative_marks= $row['negative_marks'];
											$question_approve= $row['question_approve'];
											$streams= $row['streams'];
											$series_no= $row['series_no'];
											$exam_uid= $row['uid'];
											$instruction= $row['instruction'];
											$starting_time=$row['starting_time'];
											$starting_month=$row['starting_month'];
											$starting_year=$row['starting_year'];
											$starting_day=$row['starting_day'];
											$ending_time=$row['ending_time'];
											$ending_day=$row['ending_day'];
											$ending_month=$row['ending_month'];
											$ending_year=$row['ending_year'];
											$exam_for_display=$row['exam_for_display'];
											$no_of_question=$row['no_of_question'];
											$opening_status=$row['opening_status'];
											$result_time=$row['result_time'];
											$result_month=$row['result_month'];
											$result_year=$row['result_year'];
											$result_day=$row['result_day'];
											$fee=$row['fee'];
											$exam_type=$row['exam_type'];
										
											$description=$row['description'];
										}
										
									}
									else{
										echo mysqli_error($con);
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
                        <h1 class="page-header">Edit - <?php echo $name; ?></h1>


 <form class="form col-md-12 center-block"method="post" enctype="multipart/form-data" action="editexam_action.php"class="form col-md-12 center-block" >
            <div class="form-group">
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="exam_name"id="exam_name" placeholder="COMPETITION NAME" value="<?php echo $name; ?>" required>
            </div>
			
			 <div class="form-group ">
              <label for="comp_name">Exam Type</label>
			  <select class="form-control input-lg"name="exam_type">
			  <option>Select Exam Type</option>
			  <option value="gate_series" <?php if($exam_type=='gate_series'){ echo "selected"; } ?>>GATE Test Series</option>
			  <option value="gate_support" <?php if($exam_type=='gate_support'){ echo "selected"; } ?>>GATE for Support</option>
			  <option value="jee_main_series" <?php if($exam_type=='jee_main_series'){ echo "selected"; } ?>>JEE Main Test Series</option>
			  <option value="jee_main_support" <?php if($exam_type=='jee_main_support'){ echo "selected"; } ?>>JEE Main or support</option>
			  <option value="jee_advance_series" <?php if($exam_type=='jee_advance_series'){ echo "selected"; } ?>>JEE Advance</option>
			  <option value="jee_advance_support" <?php if($exam_type=='jee_advance_support'){ echo "selected"; } ?>>JEE Advance For Support</option>
			  
			  </select>
			  
            </div>
			 <div class="form-group">
              <label for="no_of_question">No Of Question</label><input type="number" class="form-control input-lg"name="no_of_question"id="no_of_question" placeholder="No Of Question" value="<?php echo $no_of_question; ?>"required>
            </div>
			 <div class="form-group">
              <label for="time_limit">Time Limit in Minute</label><input type="text" class="form-control input-lg"name="time_limit"id="time_limit" value="<?php echo $time_limit; ?>" placeholder="Time Limit">
            </div>
			 <div class="form-group">
              <label for="total_marks">Total Marks</label><input type="text" class="form-control input-lg"name="total_marks"id="total_marks" placeholder="Total Marks" value="<?php echo $total_marks; ?>">
            </div>
			<div class="form-group">
              <label for="marks_per_question">Default Marks Per Question</label><input type="text" class="form-control input-lg"name="marks_per_question"id="marks_per_question" value="<?php echo $marks_per_question; ?>"placeholder="Marks Per Question"required>
            </div>
			<div class="form-group">
              <label for="negative_marks">Default Negative Marks</label><input type="text" class="form-control input-lg"name="negative_marks"id="negative_marks" placeholder="Negative Marks" value="<?php echo $negative_marks; ?>"required>
            </div>
			<div class="form-group">
              <label for="streams">Streams(Only for gate)</label>
			  <select class="form-control input-lg"name="streams"id="streams">
			  <option value="0" >Stream</option>
			  <option value="ae" <?php if($streams=='ae'){ echo "selected"; } ?>>Aerospace Engineering</option>
			  <option value="ag" <?php if($streams=='ag'){ echo "selected"; } ?>>Agricultural Engineering</option>
			  <option value="ar" <?php if($streams=='ar'){ echo "selected"; } ?>>Architecture and Planning</option>
			  <option value="bt" <?php if($streams=='bt'){ echo "selected"; } ?>>Biotechnology</option>
			  <option value="ce" <?php if($streams=='ce'){ echo "selected"; } ?>>Civil Engineering</option>
			  <option value="ch" <?php if($streams=='ch'){ echo "selected"; } ?>>Chemical Engineering</option>
			  <option value="cs"<?php if($streams=='cs'){ echo "selected"; } ?>>Computer Science and Information Technology</option>
			  <option value="cy"<?php if($streams=='ae'){ echo "selected"; } ?>>Chemistry</option>
			  <option value="ec"<?php if($streams=='ec'){ echo "selected"; } ?>>Electronics and Communication Engineering</option>
			  <option value="ee"<?php if($streams=='ee'){ echo "selected"; } ?>>Electrical Engineering</option>
			  <option value="gg"<?php if($streams=='gg'){ echo "selected"; } ?>>Geology and Geophysics</option>
			  <option value="in"<?php if($streams=='in'){ echo "selected"; } ?>>Instrumentation Engineering</option>
			  <option value="ma"<?php if($streams=='ma'){ echo "selected"; } ?>>Mathematics</option>
			  <option value="me"<?php if($streams=='me'){ echo "selected"; } ?>>Mechanical Engineering</option>
			  <option value="mn"<?php if($streams=='mn'){ echo "selected"; } ?>>Mining Engineering</option>
			  <option value="mt"<?php if($streams=='mt'){ echo "selected"; } ?>>Metallurgical Engineering</option>
			  <option value="ph"<?php if($streams=='ph'){ echo "selected"; } ?>>Physics</option>
			  <option value="pi"<?php if($streams=='pi'){ echo "selected"; } ?>>Production and Industrial Engineering</option>
			  <option value="tf"<?php if($streams=='tf'){ echo "selected"; } ?>>Textile Engineering and Fibre Science</option>
			  <option value="xe*"<?php if($streams=='xe*'){ echo "selected"; } ?>>Engineering Sciences</option>
			  <option value="xl**"<?php if($streams=='xe**'){ echo "selected"; } ?>>Life Sciences</option>
			  <option value="ey"<?php if($streams=='ey'){ echo "selected"; } ?>>Ecology and Evolution</option>
			
			  </select>
			  
			  
            </div>
			<div class="form-group">
              <label for="starting_time">Starting Time</label><input type="time" class="form-control input-lg"name="starting_time"id="starting_time" placeholder="Starting Time" value="<?php echo $starting_time; ?>"required>
            </div>
			<div class="row">
			<div class="form-group col-md-4">
              <label for="starting_day">Starting Day</label>
			    <select name="starting_day"id="starting_day"class="form-control" required>
			  <option value="">Date</option>
			  <?php for($i=1;$i<32;$i++){?><option <?php if($starting_day==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="starting_month">Starting Month</label>
			    <select name="starting_month"id="starting_month"class="form-control "required>
			 <option value="">Month</option>
			  <option value="01"  <?php if($starting_month=='01'){ echo "selected"; } ?>>Jan</option>
			  <option value="02"  <?php if($starting_month=='02'){ echo "selected"; } ?>>Feb</option>
			  <option value="03"  <?php if($starting_month=='03'){ echo "selected"; } ?>>Mar</option>
			  <option value="04"  <?php if($starting_month=='04'){ echo "selected"; } ?>>Apr</option>
			  <option value="05"  <?php if($starting_month=='05'){ echo "selected"; } ?>>May</option>
			  <option value="06"  <?php if($starting_month=='06'){ echo "selected"; } ?>>Jun</option>
			  <option value="07"  <?php if($starting_month=='07'){ echo "selected"; } ?>>Jul</option>
			  <option value="08"  <?php if($starting_month=='08'){ echo "selected"; } ?>>Aug</option>
			  <option value="09"  <?php if($starting_month=='09'){ echo "selected"; } ?>>Sep</option>
			  <option value="10"  <?php if($starting_month=='10'){ echo "selected"; } ?>>Oct</option>
			  <option value="11"  <?php if($starting_month=='11'){ echo "selected"; } ?>>Nov</option>
			  <option value="12"  <?php if($starting_month=='12'){ echo "selected"; } ?>>Dec</option>
			  
			  </select>
			  
			 
            </div>
			
			<div class="form-group col-md-4">
              <label for="starting_year ">Starting Year</label>
         
			   <select name="starting_year"id="starting_year" class="form-control col-md-4"required>
			  <option value="">Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option  <?php if($starting_year==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			
            </div>
			</div>
				
			<div class="form-group ">
              <label for="ending_time">Ending Time</label>
			  <input type="time" class="form-control input-lg"name="ending_time"id="ending_time" placeholder="Ending Time"  value="<?php echo $ending_time; ?>" required>
            </div>
			<div class="row">
			
			<div class="form-group col-md-4">
              <label for="ending_day">Ending Day</label>
			   <select name="ending_day"id="ending_day"class="form-control" required>
			  <option value="">Date</option>
			  <?php for($i=1;$i<32;$i++){?><option <?php if($ending_day==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
			<div class="form-group col-md-4">
              <label for="ending_month">Ending Month</label>
			   <select name="ending_month"id="ending_month"class="form-control" >
			  <option value="">Month</option>
			   <option value="01"  <?php if($ending_month=='01'){ echo "selected"; } ?>>Jan</option>
			  <option value="02"  <?php if($ending_month=='02'){ echo "selected"; } ?>>Feb</option>
			  <option value="03"  <?php if($ending_month=='03'){ echo "selected"; } ?>>Mar</option>
			  <option value="04"  <?php if($ending_month=='04'){ echo "selected"; } ?>>Apr</option>
			  <option value="05"  <?php if($ending_month=='05'){ echo "selected"; } ?>>May</option>
			  <option value="06"  <?php if($ending_month=='06'){ echo "selected"; } ?>>Jun</option>
			  <option value="07"  <?php if($ending_month=='07'){ echo "selected"; } ?>>Jul</option>
			  <option value="08"  <?php if($ending_month=='08'){ echo "selected"; } ?>>Aug</option>
			  <option value="09"  <?php if($ending_month=='09'){ echo "selected"; } ?>>Sep</option>
			  <option value="10"  <?php if($ending_month=='10'){ echo "selected"; } ?>>Oct</option>
			  <option value="11"  <?php if($ending_month=='11'){ echo "selected"; } ?>>Nov</option>
			  <option value="12"  <?php if($ending_month=='12'){ echo "selected"; } ?>>Dec</option>
			  
			  </select>
			
            </div>
			<div class="form-group col-md-4">
              <label for="ending_year">Ending Year</label>
			  <select name="ending_year"id="ending_year" class="form-control">
			  <option>Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option <?php if($ending_year==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			  
			 
            </div>
			</div>
			<div class="form-group">
              <label for="result_time">Result Time</label><input type="time" class="form-control input-lg"name="result_time"id="result_time" placeholder="Result Time" value="<?php echo $result_time; ?>"required>
            </div>
			<div class="row">
			<div class="form-group col-md-4">
              <label for="result_day">Result Day</label>
			   <select name="result_day"id="result_day" class="form-control"required>
			  <option value="">Date</option>
			  <?php for($i=1;$i<32;$i++){?><option <?php if($result_day==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
			<div class="form-group col-md-4">
              <label for="result_month">Result Month</label>
			   <select name="result_month"id="result_month" class="form-control"required >
			  <option value="01"  <?php if($ending_month=='01'){ echo "selected"; } ?>>Jan</option>
			  <option value="02"  <?php if($ending_month=='02'){ echo "selected"; } ?>>Feb</option>
			  <option value="03"  <?php if($ending_month=='03'){ echo "selected"; } ?>>Mar</option>
			  <option value="04"  <?php if($ending_month=='04'){ echo "selected"; } ?>>Apr</option>
			  <option value="05"  <?php if($ending_month=='05'){ echo "selected"; } ?>>May</option>
			  <option value="06"  <?php if($ending_month=='06'){ echo "selected"; } ?>>Jun</option>
			  <option value="07"  <?php if($ending_month=='07'){ echo "selected"; } ?>>Jul</option>
			  <option value="08"  <?php if($ending_month=='08'){ echo "selected"; } ?>>Aug</option>
			  <option value="09"  <?php if($ending_month=='09'){ echo "selected"; } ?>>Sep</option>
			  <option value="10"  <?php if($ending_month=='10'){ echo "selected"; } ?>>Oct</option>
			  <option value="11"  <?php if($ending_month=='11'){ echo "selected"; } ?>>Nov</option>
			  <option value="12"  <?php if($ending_month=='12'){ echo "selected"; } ?>>Dec</option>
			  
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="result_year">Result Year</label>
			   <select name="result_year"id="result_year" class="form-control"required>
			  <option value="">Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option  <?php if($result_year==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
            </div>
			
			
	
						            <div class="form-group">
              <label for="fee">Fee in INR</label><input type="text" class="form-control input-lg"name="fee"id="fee"  value="<?php echo $fee; ?>" required>
            </div>
						      
			 
			<div class="form-group">
              <label for="description">Description</label><textarea class="form-control input-lg"name="description"id="description" rows="10" value="<?php echo $description; ?>"required><?php echo $description; ?></textarea>
            </div>
             <div class="form-group">
              <input type="hidden" name="exam_id" value="<?php echo $exam_u_id; ?>"/>
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="gate_save_submit"value="Save"id="newversion_submit"/>

            </div>
          </form>
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
