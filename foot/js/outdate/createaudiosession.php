<?php
session_start();
$song_source=$_POST['song_source'];

if(isset($_COOKIE["song_source_check"])){
	if($_COOKIE["song_source_check"]==1){
		
		setcookie("song_source_check","2");
		echo $_COOKIE["song_source_check"];
	}else{
		echo 0;
	}
}
else
{
	setcookie("song_source_check","1");
	
	echo 0;
}

?>