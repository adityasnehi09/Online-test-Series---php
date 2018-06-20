 
 <?php
 if(isset($_GET['id']))
{
	$filepath = "../question_image/";
	require_once("../../welcome.php");
	$id=htmlspecialchars(mysqli_real_escape_string($con,$_GET['id']), ENT_QUOTES, 'UTF-8');
$cuid=$id;
$id="question_".$id;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Question Paper</title>

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
<style>
.option-que{
	font-size:19px;
	color:blue
}
</style>
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
                        <h1 class="page-header">Question Paper <a href="create_question.php?id=<?php echo $cuid; ?>"style="font-size:15px;float:right">Edit/Add Question</a></h1>
						<div class="row">
						<div class="col-md-8">

<?php
$sql=mysqli_query($con,"select * from `$id`");
$madeq=mysqli_num_rows($sql);
if($madeq>0)
{
	$qno=1;
	while($row=mysqli_fetch_assoc($sql))
	{
		$question=$row['question'];
		$solution=$row['solution'];
		$solution_img=$row['solution_img'];
		$solution_link=$row['solution_link'];
		$option1=$row['option1'];
		$option2=$row['option2'];
		$option3=$row['option3'];
		$option4=$row['option4'];
		$check_option1=$row['check_option1'];
		$check_option2=$row['check_option2'];
		$check_option3=$row['check_option3'];
		$check_option4=$row['check_option4'];
		
		$q_img=$row['q_img'];
		?>
		<form name="questionform_<?php echo $qno; ?>"style="font-size:15px;">
		<p style="color:green"id="questionid_<?php echo $qno; ?>"><b>Q<?php echo $qno; ?> : <?php echo $question; ?></b></p>
		<?php if($q_img!='0' && $q_img!==null){
			?> <img src="../question_image/<?php echo $q_img ?>"class="img img-responsive"style="margin-bottom:10px;max-width:100%;">
			<?php
		}
		?>
		
		
		<div class="row">
		<div class="col-md-6 option-que"><p><b>1.</b> <?php echo $option1;?> <?php if($check_option1=='1'){echo "<i class='glyphicon glyphicon-ok'></i>";} ?><p></div>
		<div class="col-md-6 option-que"><p><b>2.</b> <?php echo $option2;?> <?php if($check_option2=='1'){echo "<i class='glyphicon glyphicon-ok'></i>";} ?></p></div>
		</div>
		<div class="row">
		<div class="col-md-6 option-que"><p><b>3.</b> <?php echo $option3;?> <?php if($check_option3=='1'){echo "<i class='glyphicon glyphicon-ok'></i>";} ?></p></div>
		<div class="col-md-6 option-que"><p><b>4.</b> <?php echo $option4;?> <?php if($check_option4=='1'){echo "<i class='glyphicon glyphicon-ok'></i>";} ?></p></div>
		</div>
		
		</form>
		
		<div>
		<b>Explanation:</b><br>
		<?php echo $solution; ?><br>
		<a href="<?php echo $solution_link; ?>"target="_blank"><?php echo $solution_link; ?></a>
		
		<?php if($solution_img!='0' && $solution_img!==null){
			?> <img src="../solution_img/<?php echo $solution_img ?>"class="img img-responsive"style="margin-bottom:10px;max-width:100%;">
			<?php
		}
		?>
		</div>
		<hr>
		<?php
		$qno++;
	}
}
?>

						
						
						
						
						
						
						
						
						

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
<?php } ?>