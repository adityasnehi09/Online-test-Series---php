<?php include 'header.php';?>
<?php
require_once("session.php");
 if(isset($_POST['update'])){
$query = "update `balance_transfer` set message = '".$_POST['uDesc']."' where id=".$_GET['id'].  "";
if(mysqli_query($con,$query)){
header('Location: transferHistory.php');
}
}
?>
<div class="content">
         <div class="header">
            
            <h1 class="page-title">Balance Transfer</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Balance Transfer</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Balance Transfer</div>
        <div class="panel-body">
       
       
        <form method="post">
             
             
                <div class="form-group">
                    <label class="col-md-12">Update Description</label>
                    <div class="col-md-6">
<textarea  name="uDesc" class="form-control" > </textarea>
</div>
                    
                </div> 
             
               
               
              
                
              
           
             <div class="col-md-12">
            <div class="form-group"> 
                <input type="submit" name="update" value="update" class="btn btn-primary" >
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