<?php include 'header.php';?>

<div class="content">
         <div class="header">
            
            <h1 class="page-title">Change Password</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Change Password</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Change Password</div>
        <div class="panel-body"> 
		 
        <form action="action_password.php" method="post" id="fromData">
               
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Old Password</label>
                        <input type="password" name="old" class="form-control" >
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>New Password</label>
                        <input type="password" name="new" class="form-control">
                    </div>
               </div>
			   
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Confirm Password</label>
                        <input type="password" name="confirm" class="form-control">
                    </div>
               </div>
			     
             <div class="col-md-12">
            <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> Change Password</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
            </form>
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
        </div>
        </div>

<?php include 'footer.php'; ?>