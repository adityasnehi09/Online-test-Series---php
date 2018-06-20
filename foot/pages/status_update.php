<?php
require_once("session.php");
if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        $_SESSION['ERROR'] = display_flash("Member Status Update Not Successful");
        die(redirect('member_list.php'));
    }else{
		
		 if(profile_info($id,'status') =="0"){
 $Password = '1';
}else{
$Password = '0';
}


		
		$where = array("id"=>$id);
		
		$delete = UPDATE("member",array("status"=> $Password),$where);
		 
        if ($delete){ 
	 
            $_SESSION['ERROR'] = display_flash("Member Status Update Successful","S");
            die(redirect('member_list.php'));
        }else{
            $_SESSION['ERROR'] = display_flash("Member Status Update Not Successful");
            die(redirect('member_list.php'));
        }
          
        $_SESSION['ERROR'] = display_flash("Member Status Update Not Successful");
        die(redirect('member_list.php')); 
    }
    
}else{
    $_SESSION['ERROR'] = display_flash("Member Status Update Not Successful");
    die(redirect('member_list.php'));
}