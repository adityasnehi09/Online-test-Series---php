<?php include 'header.php';
require_once("session.php");

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
            
            <h1 class="page-title">View Subadmin</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">View Subadmin</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">View Subadmin</div>
        <div class="panel-body">
       
 
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $row['fullname'];?>" disabled> 
                </div>  
                 
                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" disabled>  
                </div>  
                
                <div class="form-group">
                    <label>E-mail Name</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>" disabled> 
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'];?>" disabled> 
                </div>
		 
        </div>
        </div>

<?php include 'footer.php'; ?>