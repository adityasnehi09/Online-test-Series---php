<?php 
require_once 'session.php';
require_once 'welcome.php';
if(isset($_GET['id']))
{
	
	$q_uid=mysqli_real_escape_string($con,$_GET['id']);
$q_uid1=htmlspecialchars($q_uid, ENT_QUOTES, 'UTF-8');

$q_uid="question_".$q_uid1;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <script>		 
function savequestion(q_no,que_id,url_php,edit){
	

		
		$("#modaltitle").html("PLease Wait");
		$("#modalbody").html("<b>loading...</b>");
		
	
	var x = document.getElementById(edit+"img_"+q_no);
	var solution_img_ = document.getElementById(edit+"solution_img_"+q_no);
var txt = "";
var txt2 = "";


    if (solution_img_.files.length == 0) {
        txt2 = 404; // 404 code for No image
		
    } else {

        for (var i = 0; i < solution_img_.files.length; i++) {

            var file = solution_img_.files[i];
           if ('name' in file) {
              

				var fileExt = file.name.split('.').pop();
				if(fileExt=="jpg" || fileExt=="jpeg" ||fileExt=="JPG" || fileExt=="JPEG" || fileExt=="png" || fileExt=="PNG" || fileExt=="gif" || fileExt=="GIF")
				{
					
				}
				else{
					 txt2=" <b style='color:red;font-size:19px;'>Invalid format</b>";
				}
            }
            if ('size' in file) {
				
				if(file.size > 2971500){
					
                txt2=" <b style='color:red;font-size:19px;'>The size of file must be less then 2 MB </b>";
            }

            }
        }
    
}
	
	 if (x.files.length == 0) {
        txt = 404; // 404 code for No image
		
    } else {

        for (var i = 0; i < x.files.length; i++) {

            var file = x.files[i];
           if ('name' in file) {
              

				var fileExt = file.name.split('.').pop();
				if(fileExt=="jpg" || fileExt=="jpeg" ||fileExt=="JPG" || fileExt=="JPEG" || fileExt=="png" || fileExt=="PNG" || fileExt=="gif" || fileExt=="GIF")
				{
					
				}
				else{
					 txt=" <b style='color:red;font-size:19px;'>Invalid format</b>";
				}
            }
            if ('size' in file) {
				
				if(file.size > 2971500){
					
                txt=" <b style='color:red;font-size:19px;'>The size of file must be less then 2 MB </b>";
            }

            }
        }
    
}
if(txt=="" || txt=='404' || txt2=="" || txt2=='404'){
	txt=" <b style='color:green;font-size:19px;'>Please Wait...</b>";
 var formdata = new FormData();

	formdata.append("img_"+q_no, x.files[0]);
	formdata.append("solution_img_"+q_no, solution_img_.files[0]);
	formdata.append("que_"+q_no, $("#"+edit+"que_"+q_no).val());
	formdata.append("sol_que_"+q_no, $("#"+edit+"sol_que_"+q_no).val());
	formdata.append("op1_"+q_no, $("#"+edit+"op1_"+q_no).val());
	formdata.append("op2_"+q_no, $("#"+edit+"op2_"+q_no).val());
	formdata.append("op3_"+q_no, $("#"+edit+"op3_"+q_no).val());
	formdata.append("op4_"+q_no, $("#"+edit+"op4_"+q_no).val());
	formdata.append("ans1_"+q_no, $("#"+edit+"ans1_"+q_no).val());
	formdata.append("ans2_"+q_no, $("#"+edit+"ans2_"+q_no).val());
	formdata.append("ans3_"+q_no, $("#"+edit+"ans3_"+q_no).val());
	formdata.append("ans4_"+q_no, $("#"+edit+"ans4_"+q_no).val());
	formdata.append("markque_"+q_no, $("#"+edit+"markque_"+q_no).val());
	formdata.append("nmarkque_"+q_no, $("#"+edit+"nmarkque_"+q_no).val());
	formdata.append("solution_link_"+q_no, $("#"+edit+"solution_link_"+q_no).val());
	formdata.append("queno", q_no);
	formdata.append("que_id", que_id);
	
	$("#modalbody").html("<b>data transferring....</b>");
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlerimg, true);
	ajax.addEventListener("load", completeHandlerimg, true);
	ajax.addEventListener("error", errorHandlerimg, true);
	ajax.addEventListener("abort", abortHandlerimg, true);
	ajax.q_no=q_no;
	
	ajax.open("POST", url_php);
	ajax.send(formdata); 


}

else{
	
	$("#modalbody").html(txt);
}

}
function progressHandlerimg(event){
	var percent = (event.loaded / event.total) * 100;
	$("#modalbody").html("<h4>Uploaded "+ Math.round(percent )+"%</h4>");
}
function completeHandlerimg(event){
	
	$("#progressBar").value = 0;
	if(event.target.responseText=='1')
	{
		
		$("#modalbody").html("<b>Saved</b>");
		$('#myModal').modal('hide');
		$('#myModal').modal('handleUpdate');
		$("#mainquestion_"+event.target.q_no).hide(2000);
		$("#editquestion_"+event.target.q_no).show(500);
	}
	else
	{
		alert(event.target.responseText);
		$("#modalbody").html("<b>"+event.target.responseText+"</b>");
	}
}
function errorHandlerimg(event){
	$("#modalbody").html("<b class='red-color'>Upload Failed</b>");
}
function abortHandlerimg(event){
	$("#modalbody").html("<b class='red-color'>Upload Aborted</b>");
} 
function editquestion(q_id,q_no)
{
	var dataString = '&q_id='+ q_id+'&q_no='+ q_no;
	$('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})
		$("#modaltitle").html("PLease Wait");
		$("#modalbody").html("<b>loading...</b>");
		$("#myModal").modal('show');
	
			$.ajax({
				type: "GET",
				url: "load_one_question.php",
				data: dataString,
				cache: true,
				success: function(result){
						$("#modaltitle").html("Question No "+q_no);
						$("#modalbody").html(result);
				}
			})
}
</script>

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
                        <h1 class="page-header">Create Question Paper<a href="viewquestionpaper.php?id=<?php echo $q_uid1; ?>"style="font-size:15px;float:right">View Question Paper</a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
              
     
       
                <div class="col-md-12">
				 <button class="status">Toggle jQTE</button>
			  
			  
			 
			  
			  <?php
				$sq=mysqli_query($con,"select no_of_question,marks_per_question,negative_marks from all_test where uid='$q_uid1'");
				if(mysqli_num_rows($sq)>0)
				{
					while($ro=mysqli_fetch_assoc($sq))
					{
						$total_question= $ro['no_of_question'];
						$marks_per_question= $ro['marks_per_question'];
						$negative_marks= $ro['negative_marks'];
						$total_question2= $total_question;
						
					}
				}
				else
				{
					echo "This Competition Does Not Exist";
				}

			 ?>
			 Total Question : <?php echo $total_question;  ?>
				  <div class="row">
			 
				 <div class="col-lg-8">
				 <?php
			  
			  $x=1;
			    require_once("welcome.php");
			  while($total_question>0){
				
				 $countq= mysqli_num_rows(mysqli_query($con,"select question from `$q_uid` where question_no='$x'"));
				
				  if($countq==0)
				
				  {
				  
			  ?>
			
			  <div id="mainquestion_<?php echo $x; ?>">
                    <div class="form-group"> 
                        <label><h2>Question No <?php echo $x;?></h2></label>
                        <textarea rows="2" name="que_<?php echo $x; ?>" id="que_<?php echo $x; ?>" class="form-control jqte-test"placeholder="Enter Question No <?php echo $x; ?>"></textarea>
                    </div>
					<div class="row">
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option One</label>
                        <input type="text" name="op1_<?php echo $x; ?>" id="op1_<?php echo $x; ?>"class="form-control"placeholder="Option One">
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option Two</label>
                        <input type="text" name="op2_<?php echo $x; ?>" id="op2_<?php echo $x; ?>"class="form-control"placeholder="Option Two">
						</div>
						</div>
			   
					</div>
         			<div class="row">
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option Three</label>
                        <input type="text" name="op3_<?php echo $x; ?>" id="op3_<?php echo $x; ?>"class="form-control"placeholder="Option Three">
                    </div>
						</div>
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option Four</label>
                        <input type="text" name="op4_<?php echo $x; ?>"id="op4_<?php echo $x; ?>" class="form-control"placeholder="Option Four">
                    </div>
						</div>
						</div>
						
						<div class="form-group"> 
                        <label>Image (Optional)</label>
                        <input type="file" name="img_<?php echo $x; ?>" id="img_<?php echo $x; ?>"class="form-control">
                    </div>
						
			   <div class="form-group"> 
                        <label>Solution (if)</label>
                        <textarea rows="2" name="sol_que_<?php echo $x; ?>" id="sol_que_<?php echo $x; ?>" class="jqte-test form-control"placeholder="Solution" ></textarea>
                    </div>
					<div class="form-group"> 
                        <label>Solution Image (Optional)</label>
                        <input type="file" name="solution_img_<?php echo $x; ?>" id="solution_img_<?php echo $x; ?>"class="form-control">
                    </div>
					
					<div class="row">
						<div class="col-md-12">
						<table class="table">
						<tr><td>Option One is : </td><td><select name="ans1_<?php echo $x; ?>"id="ans1_<?php echo $x; ?>"><option value='0'>False</option><option value="1">True</option></select></td></tr>
						<tr><td>Option Two is : </td><td><select name="ans2_<?php echo $x; ?>"id="ans2_<?php echo $x; ?>"><option value='0'>False</option><option value="1">True</option></select></td></tr>
						<tr><td>Option Three is : </td><td><select name="ans3_<?php echo $x; ?>"id="ans3_<?php echo $x; ?>"><option value='0'>False</option><option value="1">True</option></select></td></tr>
						<tr><td>Option Four is : </td><td><select name="ans4_<?php echo $x; ?>"id="ans4_<?php echo $x; ?>"><option value='0'>False</option><option value="1">True</option></select></td></tr>
						<tr><td>Marks for this question : </td><td><input type="text"name="markque_<?php echo $x; ?>"id="markque_<?php echo $x; ?>"value="<?php echo $marks_per_question; ?>"></td></tr>
						<tr><td>Negitive Marks for this question (+ve, eg: 0.25) : </td><td><input type="text"name="nmarkque_<?php echo $x; ?>"id="nmarkque_<?php echo $x; ?>"value="<?php echo $negative_marks; ?>"></td></tr>
						<tr><td>Solution Link(if any) : </td><td><input type="text"name="solution_link_<?php echo $x; ?>"id="solution_link_<?php echo $x; ?>"></td></tr>
						</table>
						</div>
						</div>
						<div> </div>
						<div> </div>
					<div class="form-group"> 
                <button class="btn btn-primary" onclick="savequestion('<?php echo $x; ?>','<?php echo $q_uid; ?>','savequestion.php','')"><i class="fa fa-save"></i> Save Question <?php echo $x; ?></button>
               
            </div> 
			 <hr style="height:5px"color="green"> 
		 </div>
		
				  <?php } 
				  $total_question=$total_question-1;
					$x=$x+1;
			  }?>
               </div>
              
			    <div class="col-md-4">
				
				<table class="table">
				<caption>Total Made Question : <?php 
			  if(isset($q_uid))
			  {
			  
			  require_once("welcome.php");
			$count_q=mysqli_num_rows(mysqli_query($con,"select question from `$q_uid`"));
			echo $count_q;
			  }
			  ?></caption>
			 <?php
			  $x=1;
			  while($total_question2>0){
				  require_once("welcome.php");
				 $countq= mysqli_num_rows(mysqli_query($con,"select question from `$q_uid` where question_no='$x'"));
				
				 
			  if($countq==0)
				  {
			 
			 ?>
			 
			  <tr id="editquestion_<?php echo $x; ?>"style="display:none;"><td><h4>Question No <?php echo $x; ?></h4></td><td align="right"><button class="btn btn-success"onclick="editquestion('<?php echo $q_uid; ?>','<?php echo $x; ?>')">Edit</button></td>
			        		</tr>
			 
			   <?php
			   }
	
			   if($countq!=0)
				  {
			     
					 ?>
					
					  
			  <tr><td><h4>Question No <?php echo $x; ?></h4></td><td align="right"><button class="btn btn-success"onclick="editquestion('<?php echo $q_uid; ?>','<?php echo $x; ?>')">Edit</button></td>
			        		</tr>
				 
					 
					 <?php
					 
				  }
                   ?>
				   
				   <?php
					$total_question2=$total_question2-1;
					$x=$x+1;
				  
			  }
					?>
					</table>
					</div>
					</div>
			   
			 
			
              </div>
           
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
      
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
<link type="text/css" rel="stylesheet" href="../jquery-te-1.4.0.css">

<script type="text/javascript" src="../jquery-te-1.4.0.min.js" charset="utf-8"></script>


<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>
<style>
.jqte_tool_label{
	min-height:20px;
}
</style>
</body>

</html>
</head>
