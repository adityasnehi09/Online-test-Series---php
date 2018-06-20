<?php include 'header.php';
require_once("session.php");
?>

<div class="content">
         <div class="header">
            
            <h1 class="page-title">Add New Member</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Add New Member</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Add New Member</div>
        <div class="panel-body">
       
       
        <form method="post" enctype="multipart/form-data">
             
             
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" id="name" class="form-control"> 
                </div>  
                
                
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" id="email"  class="form-control"> 
                </div> 
                
                
       
                
                <div class="form-group">
                    <label>Password:</label>
                    <input type="text" name="password" id="password" class="form-control"> 
                </div>
                
               
                <div class="form-group">
                    <label>Mobile Phone Number:</label>
                    <input type="text" name="contact" id="contact" class="form-control"> 
                </div>
				
				<div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="currency" id="currency" class="form-control"> 
                </div>
				
				<div class="form-group">
                    <label>DOB</label>
                    <textarea type="text" name="billing" id="billing" rows="4" class="form-control"> </textarea>
                </div>
                 
				 
		<div class="form-group">
                    <label>ZIP/Postal Code:</label>
                    <input type="text" name="zip" id="zip" class="form-control"> 
                </div>


<div class="form-group">
                    <label>File:</label>
                    <input type="file" name="files" id="files" class="form-control"> 
                </div>


<div class="form-group">
                    <label>File:</label>
                    <input type="file" name="zipss" id="zipss" class="form-control"> 
                </div>


<div class="form-group">
                    <label>File:</label>
                    <input type="file" name="zipsss" id="zipsss" class="form-control"> 
                </div>
            
            <div class="form-group">  
                <button type="button" class="btn btn-primary" onclick="uploadgroup()"><i class="fa fa-save"></i> Register New Member</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>   
            </form> 
            <div id="result"></div> 
        </div>
        </div>

<?php include 'footer.php'; ?>