<?php require_once 'session.php'; ?>
 <script>		 
function savequestion2(q_no,que_id,url_php,edit){
	

		
		$("#modaltitle").html("PLease Wait");
	//	$("#modalbody").html("<b>loading...</b>");
		$("#myModal").modal('show');
	$("#"+edit+"button_"+q_no).addClass('disabled');
	var x = document.getElementById(edit+"img_"+q_no);
	document.getElementById(edit+"button_"+q_no).innerHTML="Loading";
var txt = "";


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

if(txt=="" || txt=='404'){
	txt=" <b style='color:green;font-size:19px;'>Please Wait...</b>";
	$("#modaltitle").html("<b style='color:green;font-size:19px;'>Please Wait...</b>");
 var formdata = new FormData();

	formdata.append("img_"+q_no, x.files[0]);
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
	
	$("#modaltitle").html("<b style='color:green'>Data transferring....</b>");
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlerimgedit, true);
	ajax.addEventListener("load", completeHandlerimgedit, true);
	ajax.addEventListener("error", errorHandlerimgedit, true);
	ajax.addEventListener("abort", abortHandlerimgedit, true);
	ajax.q_no=q_no;
	
	ajax.open("POST", url_php);
	ajax.send(formdata); 


}

else{
	$("#modaltitle").html(txt);
}

}
function progressHandlerimgedit(event){
	var percent = (event.loaded / event.total) * 100;
	$("#modaltitle").html("<h4>Uploaded "+ Math.round(percent )+" % </h4>");
}
function completeHandlerimgedit(event){
	

	if(event.target.responseText=='1')
	{
		$("#modaltitle").html("<b style='color:green'><i class='glyphicon glyphicon-ok'></i> Saved</b>");
		$("#mainquestion_"+event.target.q_no).hide();
		$("#editquestion_"+event.target.q_no).show(100);
	}
	else
	{
		$("#modaltitle").html("<b>"+event.target.responseText+"</b>");
	}
	$("#edit_button_"+event.target.q_no).removeClass('disabled');
	document.getElementById("edit_button_"+event.target.q_no).innerHTML="Save Question";
}
function errorHandlerimgedit(event){
	$("#modaltitle").html("<b class='red-color'>Upload Failed</b>");
	$("#edit_button_"+event.target.q_no).removeClass('disabled');
	document.getElementById("edit_button_"+event.target.q_no).innerHTML="Save Question";
}
function abortHandlerimgedit(event){
	$("#modaltitle").html("<b class='red-color'>Upload Aborted</b>");
	$("#edit_button_"+event.target.q_no).removeClass('disabled');
	document.getElementById("edit_button_"+event.target.q_no).innerHTML="Save Question";
} 
	</script>
 
 
 
 
 <?php
 $filepath = "../question_image/";
 if(isset($_GET['q_id']))
{
	
	require_once("../../welcome.php");
$q_id=htmlspecialchars(mysqli_real_escape_string($con,$_GET['q_id']), ENT_QUOTES, 'UTF-8');


$q_no=htmlspecialchars(mysqli_real_escape_string($con,$_GET['q_no']), ENT_QUOTES, 'UTF-8');

$x=$q_no;
$sql=mysqli_query($con,"select * from `$q_id` where question_no='$q_no'");
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_assoc($sql))
	{
		$question=$row['question'];
		$solution=$row['solution'];
		$option1=$row['option1'];
		$option2=$row['option2'];
		$option3=$row['option3'];
		$option4=$row['option4'];
		$check_option1=$row['check_option1'];
		$check_option2=$row['check_option2'];
		$check_option3=$row['check_option3'];
		$check_option4=$row['check_option4'];
		$solution_link=$row['solution_link'];
		$positive_mark=$row['positive_mark'];
		$negative_mark=$row['negative_mark'];
		
		$q_img=$row['q_img'];
		
	}
}
else
{
	echo mysqli_error($con);
}
}
?>
 
 
 <div id="edit_mainquestion_<?php echo $x; ?>">
                    <div class="form-group"> 
                        <label>Question No <?php echo $x;?></label>
                        <input type="text" name="que_<?php echo $x; ?>" value="<?php echo $question ?>"id="edit_que_<?php echo $x; ?>" class="form-control"placeholder="Enter Question No <?php echo $x; ?>" >
                    </div>
             
               <?php if($q_img!=0){ ?><img src="<?php echo $filepath.$q_img;?>"class="img img-responsive"style="margin-bottom:20px;"><?php }?>
               
           
			   
					<div class="row">
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option One</label>
                        <input type="text" name="op1_<?php echo $x; ?>" value="<?php echo $option1 ?>"id="edit_op1_<?php echo $x; ?>"class="form-control"placeholder="Option One">
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option Two</label>
                        <input type="text" name="op2_<?php echo $x; ?>" value="<?php echo $option2 ?>"id="edit_op2_<?php echo $x; ?>"class="form-control"placeholder="Option Two">
						</div>
						</div>
			   
					</div>
         			<div class="row">
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option Three</label>
                        <input type="text" name="op3_<?php echo $x; ?>" value="<?php echo $option3 ?>"id="edit_op3_<?php echo $x; ?>"class="form-control"placeholder="Option Three">
                    </div>
						</div>
						<div class="col-md-6">
						<div class="form-group"> 
                        <label>Option Four</label>
                        <input type="text" name="op4_<?php echo $x; ?>"value="<?php echo $option4 ?>"id="edit_op4_<?php echo $x; ?>" class="form-control"placeholder="Option Four">
                    </div>
						</div>
						<div class="col-md-12">
						<div class="form-group"> 
                        <label>Image (Optional)</label>
                        <input type="file" name="img_<?php echo $x; ?>" id="edit_img_<?php echo $x; ?>"class="form-control">
                    </div>
						</div>
			   
					</div>
					<div class="row">
						<div class="col-md-12">
						<table class="table">
						<tr><td>Option One is : </td><td><select name="ans1_<?php echo $x; ?>"id="edit_ans1_<?php echo $x; ?>"><option value='0'>False</option><option value="1"<?php if($check_option1=='1'){?>selected<?php } ?>>True</option></select></td></tr>
						<tr><td>Option Two is : </td><td><select name="ans2_<?php echo $x; ?>"id="edit_ans2_<?php echo $x; ?>"><option value='0'>False</option><option value="1"<?php if($check_option2=='1'){?>selected<?php } ?>>True</option></select></td></tr>
						<tr><td>Option Three is : </td><td><select name="ans3_<?php echo $x; ?>"id="edit_ans3_<?php echo $x; ?>"><option value='0'>False</option><option value="1"<?php if($check_option3=='1'){?>selected<?php } ?>>True</option></select></td></tr>
						<tr><td>Option Four is : </td><td><select name="ans4_<?php echo $x; ?>"id="edit_ans4_<?php echo $x; ?>"><option value='0'>False</option><option value="1"<?php if($check_option4=='1'){?>selected<?php } ?>>True</option></select></td></tr>
						<tr><td>Marks for this question : </td><td><input type="text"name="markque_<?php echo $x; ?>"id="edit_markque_<?php echo $x; ?>"value="<?php echo $positive_mark; ?>"></td></tr>
						<tr><td>Negitive Marks for this question (+ve, eg: 0.25) : </td><td><input type="text"name="edit_nmarkque_<?php echo $x; ?>"id="edit_nmarkque_<?php echo $x; ?>"value="<?php echo $negative_mark; ?>"></td></tr>
										<tr><td>Solution Link(if any) : </td><td><input type="text"name="solution_link_<?php echo $x; ?>"id="edit_solution_link_<?php echo $x; ?>"value="<?php echo $solution_link; ?>"></td></tr>
					</table>
						</div>
						<div class="col-md-12">
						  <div class="form-group"> 
                        <label>Solution (if)</label>
                        <textarea rows="2" name="edit_sol_que_<?php echo $x; ?>" id="edit_sol_que_<?php echo $x; ?>" class="form-control"placeholder="Solution" value="<?php echo $solution; ?>" ><?php echo $solution; ?></textarea>
                    </div>
                    </div>
						</div>
						
					<div class="form-group"> 
                <button class="btn btn-primary" onclick="savequestion2('<?php echo $x; ?>','<?php echo $q_id; ?>','edit_one_question.php','edit_')"id="edit_button_<?php echo $x; ?>"><i class="fa fa-save"></i> Save Question <?php echo $x; ?></button>
               
            </div> 
					
					
               </div>