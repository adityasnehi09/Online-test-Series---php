 <?php
require_once 'session.php';
?>
 <form class="form col-md-12 center-block"method="post" enctype="multipart/form-data" action="creategatecomp.php"class="form col-md-12 center-block" >
            <div class="form-group">
              <label for="comp_name">Competition Name</label><input type="text" class="form-control input-lg"name="exam_name"id="exam_name" placeholder="COMPETITION NAME"required>
            </div>
			
			 <div class="form-group">
              <label for="no_of_question">No Of Question</label><input type="number" class="form-control input-lg"name="no_of_question"id="no_of_question" placeholder="No Of Question"required>
            </div>
			 <div class="form-group">
              <label for="time_limit">Time Limit in Minute</label><input type="text" class="form-control input-lg"name="time_limit"id="time_limit" placeholder="Time Limit">
            </div>
			 <div class="form-group">
              <label for="total_marks">Total Marks</label><input type="text" class="form-control input-lg"name="total_marks"id="total_marks" placeholder="Total Marks">
            </div>
			<div class="form-group">
              <label for="marks_per_question">Default Marks Per Question</label><input type="text" class="form-control input-lg"name="marks_per_question"id="marks_per_question" placeholder="Marks Per Question"required>
            </div>
			<div class="form-group">
              <label for="negative_marks">Default Negative Marks</label><input type="text" class="form-control input-lg"name="negative_marks"id="negative_marks" placeholder="Negative Marks"required>
            </div>
			<div class="form-group">
              <label for="streams">Streams</label><input type="text" class="form-control input-lg"name="streams"id="streams" placeholder="Streams"required>
            </div>
			<div class="form-group">
              <label for="starting_time">Starting Time</label><input type="time" class="form-control input-lg"name="starting_time"id="starting_time" placeholder="Starting Time"required>
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
			  <option value="01">Jan</option>
			  <option value="02">Feb</option>
			  <option value="03">Mar</option>
			  <option value="04">Apr</option>
			  <option value="05">May</option>
			  <option value="06">Jun</option>
			  <option value="07">Jul</option>
			  <option value="08">Aug</option>
			  <option value="09">Sep</option>
			  <option value="10">Oct</option>
			  <option value="11">Nov</option>
			  <option value="12">Dec</option>
			  
			  </select>
			  
			 
            </div>
			
			<div class="form-group col-md-4">
              <label for="starting_year ">Starting Year</label>
         
			   <select name="starting_year"id="starting_year" class="form-control col-md-4"required>
			  <option value="">Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			
            </div>
			</div>
				
			<div class="form-group ">
              <label for="ending_time">Ending Time</label><input type="time" class="form-control input-lg"name="ending_time"id="ending_time" placeholder="Ending Time"required>
            </div>
			<div class="row">
			
			<div class="form-group col-md-4">
              <label for="ending_day">Ending Day</label>
			   <select name="ending_day"id="ending_day"class="form-control" required>
			  <option value="">Date</option>
			  <?php for($i=1;$i<32;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
			<div class="form-group col-md-4">
              <label for="ending_month">Ending Month</label>
			   <select name="ending_month"id="ending_month"class="form-control" >
			  <option value="">Month</option>
			  <option value="01">Jan</option>
			  <option value="02">Feb</option>
			  <option value="03">Mar</option>
			  <option value="04">Apr</option>
			  <option value="05">May</option>
			  <option value="06">Jun</option>
			  <option value="07">Jul</option>
			  <option value="08">Aug</option>
			  <option value="09">Sep</option>
			  <option value="10">Oct</option>
			  <option value="11">Nov</option>
			  <option value="12">Dec</option>
			  
			  </select>
			
            </div>
			<div class="form-group col-md-4">
              <label for="ending_year">Ending Year</label>
			  <select name="ending_year"id="ending_year" class="form-control">
			  <option>Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			  
			  
			 
            </div>
			</div>
			<div class="form-group">
              <label for="result_time">Result Time</label><input type="time" class="form-control input-lg"name="result_time"id="result_time" placeholder="Result Time"required>
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
			  <option value="" >Month</option>
			  <option value="01">Jan</option>
			  <option value="02">Feb</option>
			  <option value="03">Mar</option>
			  <option value="04">Apr</option>
			  <option value="05">May</option>
			  <option value="06">Jun</option>
			  <option value="07">Jul</option>
			  <option value="08">Aug</option>
			  <option value="09">Sep</option>
			  <option value="10">Oct</option>
			  <option value="11">Nov</option>
			  <option value="12">Dec</option>
			  </select>
			  
            </div>
			<div class="form-group col-md-4">
              <label for="result_year">Result Year</label>
			   <select name="result_year"id="result_year" class="form-control"required>
			  <option value="">Year</option>
			  <?php for($i=2016;$i<2030;$i++){?><option><?php echo $i; ?></option><?php } ?>
			  </select>
			 
            </div>
            </div>
			
			
	
						            <div class="form-group">
              <label for="fee">Fee in INR</label><input type="text" class="form-control input-lg"name="fee"id="fee" required>
            </div>
						      
			 
			<div class="form-group">
              <label for="description">Description</label><textarea class="form-control input-lg"name="description"id="description" rows="10"required></textarea>
            </div>
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block"name="gate_submit"value="Create"id="newversion_submit"/>

            </div>
          </form>