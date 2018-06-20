<?php
session_start();
include '../include/config.php';
include '../include/function.php';


if(isset($_POST['username'])){
    
    $username = escape_string($_POST['username']);
    $password = escape_string($_POST['password']);

    if(empty($username)){
        die(display_flash("Enter Username",''));
    }
    
    if(empty($password)){
        die(display_flash("Enter Password",''));
    }
    
    $sql = Query("SELECT * FROM `subadmin` WHERE `username`='$username' and `password`='$password' and `status` ='0'");
    
    if(count_row($sql) <1){
        die(display_flash("username or password incorrect",''));
    }else{
          
        $row = QueryArray($sql);
        $_SESSION['USERID'] = $row['id'];
        $_SESSION['USERNAME'] = $row['username'];
		
		$update_data = array(
			
			
		
		);
		
		UPDATE("admin",$update_data,array('id',$row['id']));
		 
		
        echo (display_flash("Login Successful",'S'));
        echo "<script>window.location.replace('dashboard.php')</script>";
    }
    
    
    
    
    
    
}else{
     echo display_flash("All fields are required",''); 
}


?>