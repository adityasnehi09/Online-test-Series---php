 <?php
require_once 'session.php';
?>
 <form class="form col-md-12 center-block"method="post" enctype="multipart/form-data" action="createexam_action.php"class="form col-md-12 center-block" >
            <div class="form-group">
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="exam_name"id="exam_name" placeholder="COMPETITION NAME"required>
            </div>
			
			 <div class="form-group ">
              <label for="comp_name">Exam Type</label>
			  <select class="form-control input-lg"name="exam_type">
			  <option>Select Exam Type</option>
			  <option value="gate_series" selected>GATE Test Series</option>
			  <option value="gate_support">GATE for Support</option>
			  <option value="jee_main_series">JEE Main Test Series</option>
			  <option value="jee_main_support">JEE Main or support</option>
			  <option value="jee_advance_series">JEE Advance</option>
			  <option value="jee_advance_support">JEE Advance For Support</option>
			   <option value="bank_series">Bank</option>
			  <option value="bank_support">Bank Support</option>
			   <option value="bank_series">SSC Advance</option>
			  <option value="bank_support">SSC For Support</option>
			  
			  </select>
			  
            </div>
			 <div class="form-group">
              <label for="no_of_question">No Of Question</label><input type="number" class="form-control input-lg"name="no_of_question"id="no_of_question" placeholder="No Of Question" value="30" required>
            </div>
			 <div class="form-group">
              <label for="time_limit">Time Limit in Minute</label><input type="text" class="form-control input-lg"name="time_limit"id="time_limit" value="90" placeholder="Time Limit">
            </div>
			 <div class="form-group">
              <label for="total_marks">Total Marks</label><input type="text" class="form-control input-lg"name="total_marks"id="total_marks" value="120" placeholder="Total Marks">
            </div>
			<div class="form-group">
              <label for="marks_per_question">Default Marks Per Question</label><input type="text" class="form-control input-lg"name="marks_per_question"id="marks_per_question" value="4" placeholder="Marks Per Question"required>
            </div>
			<div class="form-group">
              <label for="negative_marks">Default Negative Marks (In +ve)</label><input type="text" class="form-control input-lg"name="negative_marks"id="negative_marks" value="1" placeholder="Negative Marks"required>
            </div>
			<div class="form-group">
              <label for="streams">Streams(Only for gate)</label>
			  <select class="form-control input-lg"name="streams"id="streams">
			  <option value="0">Stream</option>
			  <option value="ae">Aerospace Engineering</option>
			  <option value="ag">Agricultural Engineering</option>
			  <option value="ar">Architecture and Planning</option>
			  <option value="bt">Biotechnology</option>
			  <option value="ce">Civil Engineering</option>
			  <option value="ch">Chemical Engineering</option>
			  <option value="cs" selected>Computer Science and Information Technology</option>
			  <option value="cy">Chemistry</option>
			  <option value="ec">Electronics and Communication Engineering</option>
			  <option value="ee">Electrical Engineering</option>
			  <option value="gg">Geology and Geophysics</option>
			  <option value="in">Instrumentation Engineering</option>
			  <option value="ma">Mathematics</option>
			  <option value="me">Mechanical Engineering</option>
			  <option value="mn">Mining Engineering</option>
			  <option value="mt">Metallurgical Engineering</option>
			  <option value="ph">Physics</option>
			  <option value="pi">Production and Industrial Engineering</option>
			  <option value="tf">Textile Engineering and Fibre Science</option>
			  <option value="xe*">Engineering Sciences</option>
			  <option value="xl**">Life Sciences</option>
			  <option value="ey">Ecology and Evolution</option>
			  <option value="ga">General Aptitude</option>
			
			  </select>
			  
			  
            </div>
			<div class="form-group">
              <label for="starting_time">Starting Time</label><input type="time" class="form-control input-lg"name="starting_time"id="starting_time" value="19:00" placeholder="Starting Time"required>
            </div>
			<div class="row">
			<div class="form-group col-md-4">
              <label for="starting_day">Starting Day</label>
			    <select name="starting_day"id="starting_day"class="form-control" required>
			  <option value="">Date</option>
			  <?php for($i=1;$i<32;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="starting_month">Starting Month</label>
			    <select name="starting_month"id="starting_month"class="form-control "required>
			 <option value="">Month</option>
			  <option value="01"<?php if(date('m')=='01'){ echo "selected"; } ?>>Jan</option>
			  <option value="02"<?php if(date('m')=='02'){ echo "selected"; } ?>>Feb</option>
			  <option value="03"<?php if(date('m')=='03'){ echo "selected"; } ?>>Mar</option>
			  <option value="04"<?php if(date('m')=='04'){ echo "selected"; } ?>>Apr</option>
			  <option value="05"<?php if(date('m')=='05'){ echo "selected"; } ?>>May</option>
			  <option value="06"<?php if(date('m')=='06'){ echo "selected"; } ?>>Jun</option>
			  <option value="07"<?php if(date('m')=='07'){ echo "selected"; } ?>>Jul</option>
			  <option value="08"<?php if(date('m')=='08'){ echo "selected"; } ?>>Aug</option>
			  <option value="09"<?php if(date('m')=='09'){ echo "selected"; } ?>>Sep</option>
			  <option value="10"<?php if(date('m')=='10'){ echo "selected"; } ?>>Oct</option>
			  <option value="11"<?php if(date('m')=='11'){ echo "selected"; } ?>>Nov</option>
			  <option value="12"<?php if(date('m')=='12'){ echo "selected"; } ?>>Dec</option>
			  
			  </select>
			  
			 
            </div>
			
			<div class="form-group col-md-4">
              <label for="starting_year ">Starting Year</label>
         
			   <select name="starting_year"id="starting_year" class="form-control col-md-4"required>
			  <option value="">Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option <?php if(date('Y')==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			
            </div>
			</div>
			
			
            
		
				<div class="form-group">
              <label for="result_time">Result Time</label><input type="time" class="form-control input-lg"name="result_time"id="result_time" placeholder="Result Time" value="20:30"required>
            </div>
			<div class="row">
			<div class="form-group col-md-4">
              <label for="result_day">Result Day</label>
			   <select name="result_day"id="result_day" class="form-control"required>
			  <option value="">Date</option>
			  <?php for($i=1;$i<32;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
			<div class="form-group col-md-4">
              <label for="result_month">Result Month</label>
			   <select name="result_month"id="result_month" class="form-control"required >
			 <option value="01"<?php if(date('m')=='01'){ echo "selected"; } ?>>Jan</option>
			  <option value="02"<?php if(date('m')=='02'){ echo "selected"; } ?>>Feb</option>
			  <option value="03"<?php if(date('m')=='03'){ echo "selected"; } ?>>Mar</option>
			  <option value="04"<?php if(date('m')=='04'){ echo "selected"; } ?>>Apr</option>
			  <option value="05"<?php if(date('m')=='05'){ echo "selected"; } ?>>May</option>
			  <option value="06"<?php if(date('m')=='06'){ echo "selected"; } ?>>Jun</option>
			  <option value="07"<?php if(date('m')=='07'){ echo "selected"; } ?>>Jul</option>
			  <option value="08"<?php if(date('m')=='08'){ echo "selected"; } ?>>Aug</option>
			  <option value="09"<?php if(date('m')=='09'){ echo "selected"; } ?>>Sep</option>
			  <option value="10"<?php if(date('m')=='10'){ echo "selected"; } ?>>Oct</option>
			  <option value="11"<?php if(date('m')=='11'){ echo "selected"; } ?>>Nov</option>
			  <option value="12"<?php if(date('m')=='12'){ echo "selected"; } ?>>Dec</option>
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="result_year">Result Year</label>
			   <select name="result_year"id="result_year" class="form-control"required>
			  <option value="">Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option <?php if(date('Y')==$i){ echo "selected"; } ?>><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
            </div>
			
			
	
						            <div class="form-group">
              <label for="fee">Fee in INR</label><input type="text" class="form-control input-lg"name="fee"id="fee" value="0"required>
            </div>
						      
			 
			<div class="form-group">
              <label for="description">Description (optional)</label><textarea class="form-control input-lg"name="description"id="description" rows="10"></textarea>
            </div>
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="gate_submit"value="Create"id="newversion_submit"/>

            </div>
          </form>