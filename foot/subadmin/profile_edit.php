<?php include 'header.php';


if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        die(redirect('member_list.php'));
    }else{
       $row = QueryArray(Query("SELECT * FROM `member` WHERE `id`='$id'"));
    }
    
}else{
    die(redirect('member_list.php'));
}


?>


<div class="content">
         <div class="header">
            
            <h1 class="page-title">Edit Member</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Edit Member</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Edit Member</div>
        <div class="panel-body">
          
		  <form method="post">
		  
			<div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['fname'];?>"> 
					<input type="hidden" name="id" id="ids" class="form-control" value="<?php echo $row['id'];?>"> 
                </div>  
                
                
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['lname'];?>"> 
                </div> 
                 
                 
                
                <div class="form-group">
                    <label>E-mail Name</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'];?>"> 
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact"  id="contact"  class="form-control" value="<?php echo $row['mobile'];?>"> 
                </div> 



<div class="form-group">
                    <label>Currency:</label>
                    <input type="text" name="currency" id="currency" class="form-control" value="<?php echo $row['currency'];?>"> 
                </div>
				
				<div class="form-group">
                    <label>Billing Address:</label>
                    <textarea type="text" name="billing" id="billing" rows="4" class="form-control"><?php echo $row['billing'];?></textarea>
                </div>
                 

 

<div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" id="file" class="form-control"> 
                </div>

<div class="form-group">
                    <label>File</label>
                    <input type="file" name="files" id="files" class="form-control"> 
                </div>

<div class="form-group">
                    <label>File</label>
                    <input type="file" name="filess" id="filess" class="form-control"> 
                </div>


            
			 <div class="form-group"> 
                <button type="button" class="btn btn-primary" onclick="UpdateInfo()"><i class="fa fa-save"></i> Update</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>   
            </form> 
            <div id="msg"></div> 
			
             
        </div>
        </div>

<?php include 'footer.php'; ?>