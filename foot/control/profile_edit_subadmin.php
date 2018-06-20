<?php include 'header.php';


if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        die(redirect('subadmin_list.php'));
    }else{
       $row = QueryArray(Query("SELECT * FROM `subadmin` WHERE `id`='$id'"));
    }
    
}else{
    die(redirect('subadmin_list.php'));
}


?>


<div class="content">
         <div class="header">
            
            <h1 class="page-title">Edit Subadmin</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Edit Subadmin</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Edit Subadmin</div>
        <div class="panel-body">
          
		  <form action="action_update_subadmin.php" method="post" id="fromData">
		  
		   <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $row['fullname'];?>" > 
                </div>  
				 
					<input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>"> 
               
                
                
               <div class="form-group">
                    <label>E-mail Name</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>" > 
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'];?>" > 
                </div>
            
			 <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> Update</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>   
            </form> 
            <div id="msg"></div> 
			
             
        </div>
        </div>

<?php include 'footer.php'; ?>