<?php
session_start();
if(!isset($_SESSION['adminaccesspaglu']))
{
header("location: http://www.nightbird.in");
}
else{
	

require_once("welcome.php");
$sql=mysql_query("select * from allmember order by id desc");
$count=mysql_num_rows($sql);
?>
<a href="member.php"><button>Members</button></a>
	<a href="contact.php"><button>Message</button></a>
	<a href="vis.php"><button>Visitor</button></a>
	<a href="gate1.php"><button>Gate</button></a>
	<a href="email.php"><button>Email</button></a>
<h1>Total Member : <?php echo $count;?></h1>
<?php
while($row=mysql_fetch_assoc($sql))
{
	?>
	<img src="../upload_images/crop/<?php echo $row['crop_pic'];?>"height="60"/><br>
	<?php
	echo "ID: ".$row['id']; ?> <br><?php
	echo "UID: ".$row['uid']; ?> <br><?php
	echo "Name: ".$row['name']; ?> <br><?php
	echo "Email: ".$row['email']; ?> <br><?php
	echo "Mobile Number: ".$row['mobile_no']; ?> <br><?php
	echo "Gender: ".$row['gender']; ?> <br>
	
	<?php
	
	
	
	echo "Browser : ".$row['browser']; ?> <br><?php
	echo "Time : ".$row['sign_up_time']; ?> <br><?php

	
	echo "Date(day,month,year) : >".$row['sign_up_day'].":".$row['sign_up_month'].":".$row['sign_up_year'] ; ?> <br>
	
	<button>Notification</button>
	<button>Couple Detail</button>
	<button>Verification</button>
	<button>Activity</button>
	<hr><hr><?php
	?>
	
	<?php
}
}
?>