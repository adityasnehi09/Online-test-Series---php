<?php include 'header.php';?>

<div class="content">
         <div class="header">
            
            <h1 class="page-title">Add New Subadmin</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Add New Subadmin</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Add New Subadmin</div>
        <div class="panel-body">
       
       
        <form action="action_addsubadmin.php" method="post" id="fromData">
             
             
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fname" class="form-control"> 
                </div>  
                 
                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"> 
                </div> 
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control"> 
                </div>
                
                <div class="form-group">
                    <label>E-mail Name</label>
                    <input type="text" name="email" class="form-control"> 
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control"> 
                </div>
				
				<div class="form-group">
                    <label>Billing Address:</label>
                    <textarea type="text" name="billing" rows="4" class="form-control"> </textarea>
                </div>
                 
				 
				<div class="form-group">
                    <label>ZIP/Postal Code:</label>
                    <input type="text" name="zip" class="form-control"> 
                </div>
				
				  
            
            <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> Added New Subadmin</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>   
            </form> 
            <div id="msg"></div> 
        </div>
        </div>

<?php include 'footer.php'; ?>