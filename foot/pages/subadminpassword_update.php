<?php

include_once 'session.php';

if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
        die(redirect('subadmin_list.php'));
    }else{
		
		$Password = rand(11111111,99999999);  
		
		$where = array("id"=>$id);
		
		$delete = UPDATE("subadmin",array("password"=> $Password),$where);
		 
        if ($delete){ 
		$name = admin_info($id,'fname') ." ".admin_info($id,'lname') ;
		$username = admin_info($id,'username');
	
			$message = "Dear $name, <br/><br/>
						<font color='green' size='4'><u>Your Password Successfully Changed</u></font><br/><br/> 
							<b>Your New Login Information </b><br/> <br/> 
							Username : $username <br/>
							Password : $Password <br/><br/> 
							
							Best Regards<br/>International Virtual Voucher";
			 
			 sendmail(admin_info($id,'email'),'Reset Password',$message);
		
		
            $_SESSION['ERROR'] = display_flash("Password Update Successful","S");
            die(redirect('subadmin_list.php'));
        }else{
            $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
            die(redirect('subadmin_list.php'));
        }
          
        $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
        die(redirect('subadmin_list.php')); 
    }
    
}else{
    $_SESSION['ERROR'] = display_flash("Password Update Not Successful");
    die(redirect('member_list.php'));
}