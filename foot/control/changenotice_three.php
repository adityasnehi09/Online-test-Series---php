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
            
            <h1 class="page-title">Change Notice</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Change Notice</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Change Notice</div>
        <div class="panel-body"> 
		 
        <form action="" method="post" id="fromData">
               
        	<div class="col-md-12">
            	<div class="form-group"> 
                        <label>Notice Message</label>

<textarea name="area2" style="width: 100%; height:200px;"><?php echo $row['noticethree'];?></textarea>
<input name="id" hidden value="$id" />
                    </div>
               </div>
             <div class="col-md-12">
            <div class="form-group"> 
				<input type="submit" class="btn btn-primary" name="updnotice" id="submitForm" value="Update Notice"/>
                <!--<button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> General Notice</button>-->
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
			  <?php 
			  
				$area2=$_POST["area2"];
				echo $row = QueryArray(Query("update member set noticethree='$area2' WHERE `id`='$id'"));  

				?>
            </form>
			<div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
			
            <div class="col-sm-12 col-md-12">
            <div id="msg2"></div> 
            </div>
        </div>
        </div>

<?php include 'footer.php'; ?>