<?php
session_start();
//require_once("session.php");
if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
        die(redirect('member_list.php'));
    }else{
		
		$Password = rand(11111111,99999999);  
		
		$where = array("id"=>$id);
		
		$delete = UPDATE("member",array("password"=> $Password),$where);
		 
        if ($delete){ 
		$name = profile_info($id,'fname') ." ".profile_info($id,'lname') ;
		$username = profile_info($id,'username');
	
			$message = "Dear <b>$name</b>, <br/><br/>
						<font color='green' size='4'>Your password has successfully been changed, use the following credentials to login again:</font><br/><br/> 
							 
							Username : $username <br/>
							Password : $Password <br/><br/> 
							
							<b>Best Regards</b><br/>BDCard International Prepaid Services";
			 
			$x = sendmail(profile_info($id,'email'),'Reset Password',$message);
		
		
            $_SESSION['ERROR'] = display_flash("Password Update Successful $x","S");
            die(redirect('member_list.php'));
        }else{
            $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
            die(redirect('member_list.php'));
        }
          
        $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
        die(redirect('member_list.php')); 
    }
    
}else{
    $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
  //  die(redirect('member_list.php'));
}