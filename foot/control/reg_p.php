<?php
session_start();
 if(!isset($_SESSION['adityasnehiloginyes']))
 {
	 header("location: http://nightbird.in");
 }else{
if(isset($_GET['c']))
{
	require_once("welcome.php");
	$c=mysql_real_escape_string($_GET['c']);
	$mysq=mysql_query("select name,user_id,email,mobile_no,couple_entry,partner_uid from `$c`");
	$count=mysql_num_rows($mysq);
?>
<h1>Total Member : <?php echo $count;?></h1>
<?php
while($row=mysql_fetch_assoc($mysq))
{
	?>
	<img src="../upload_images/crop/<?php echo $row['crop_pic'];?>"height="60"/><br>
	<?php
	echo "ID: ".$row['user_id']; ?> <br><?php
	
	echo "Name: ".$row['name']; ?> <br><?php
	echo "Email: ".$row['email']; ?> <br><?php
	echo "Mobile Number: ".$row['mobile_no']; ?> <br><?php
	if($couple_entry==1){
	echo "Partner uid: ".$row['partner_uid']; ?> <br>
	
	<?php
	
	}
	
	echo "Browser : ".$row['browser']; ?> <br><?php
	echo "Time : ".$row['entry_timing']; ?> <br><?php

	
	echo "Date(day,month,year) : >".$row['entry_day'].":".$row['entry_month'].":".$row['entry_year'] ; ?> <br>
	
	<button>Notification</button>
	<button>Couple Detail</button>
	<button>Verification</button>
	<button>Activity</button>
	<hr><hr><?php
	?>
	
	<?php
}
}
 }

?>