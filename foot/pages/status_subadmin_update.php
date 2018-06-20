<?php
require_once("session.php");
if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        $_SESSION['ERROR'] = display_flash("Subadmin Status Update Not Successful");
        die(redirect('subadmin_list.php'));
    }else{
		
		 if(admin_info($id,'status') =="0"){
 $Password = '1';
}else{
$Password = '0';
}


		
		$where = array("id"=>$id);
		
		$delete = UPDATE("subadmin",array("status"=> $Password),$where);
		 
        if ($delete){ 
	 
            $_SESSION['ERROR'] = display_flash("Subadmin Status Update Successful","S");
            die(redirect('subadmin_list.php'));
        }else{
            $_SESSION['ERROR'] = display_flash("Subadmin Status Update Not Successful");
            die(redirect('subadmin_list.php'));
        }
          
        $_SESSION['ERROR'] = display_flash("Subadmin Status Update Not Successful");
        die(redirect('subadmin_list.php')); 
    }
    
}else{
    $_SESSION['ERROR'] = display_flash("Subadmin Status Update Not Successful");
    die(redirect('subadmin_list.php'));
}