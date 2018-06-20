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
            
            <h1 class="page-title">View Member</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">View Member</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">View Member</div>
        <div class="panel-body">
          
			
         <div class="form-group">
                    <label>First Name : </label> 
					<p class="form-control"><?php echo profile_info($_SESSION['USERID'],'fname'); ?></p>
                </div>  
                
                
                <div class="form-group">
                    <label>Last Name: </label>
                    <p class="form-control"><?php echo profile_info($_SESSION['USERID'],'lname'); ?></p>
                </div> 
                
                
                <div class="form-group">
                    <label>Customer ID : </label>
                    <p class="form-control"><?php echo profile_info($_SESSION['USERID'],'username'); ?></p>
                </div> 
                

       <div class="form-group">
                    <label>Billing Address : </label>
                    <p class="form-control" style="height:100px;"><?php echo profile_info($_SESSION['USERID'],'billing'); ?></p>
                </div> 
                

             
                
                <div class="form-group">
                    <label>E-mail ID : </label>
                    <p class="form-control"><?php echo profile_info($_SESSION['USERID'],'email'); ?></p> 
                </div>
                
                <div class="form-group">
                    <label>Contact Phone Number : </label>
                    <p class="form-control"><?php echo profile_info($_SESSION['USERID'],'mobile'); ?></p>
                </div>
				
				<div class="form-group">
                    <label>Currency : </label>
                    <p class="form-control"><?php echo profile_info($_SESSION['USERID'],'currency'); ?></p>
                </div>
            
                
            <?php
 $dir = "../upload/".$id;
 

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           $arrayname[] = $file; 
        }
        closedir($dh);
    }
}


?>

<div class="form-group">
                    <a href="<?php echo $dir."/".$arrayname[0]; ?>" target="_blank"><?php echo $arrayname[0]; ?></a>
                </div>


<div class="form-group"> 
                   <a href="<?php echo $dir."/".$arrayname[2]; ?>" target="_blank"><?php echo $arrayname[2]; ?></a>
                </div>


<div class="form-group">
                   <a href="<?php echo $dir."/".$arrayname[3]; ?>" target="_blank"><?php echo $arrayname[3]; ?></a>




                </div>
            
             
        </div>
        </div>

<?php include 'footer.php'; ?>