<?php
session_start();
if(!isset($_SESSION['adminaccesspaglu']))
{
header("location: http://www.nightbird.in");
}
else{
	?>
	<a href="member.php"><button>Members</button></a>
	<a href="contact.php"><button>Message</button></a>
	<a href="vis.php"><button>Visitor</button></a>
	<a href="gate1.php"><button>Gate</button></a>
	<a href="email.php"><button>Email</button></a>
	
	<?php

require_once("welcome.php");
$sql=mysql_query("select * from advance_visit order by id desc");
$count=mysql_num_rows($sql);
?>
<h1>Total Visit : <?php echo $count;?></h1>
<?php
while($row=mysql_fetch_assoc($sql))
{
	echo "Ip address: ".$row['ip_address']; ?> <br><?php
	echo "Browser : ".$row['browser']; ?> <br><?php
	echo "Time".$row['timing']; ?> <br><?php
	echo "Referer".$row['referer']; ?> <br><?php
	echo "View Times".$row['view_times']; ?> <br><?php
	echo "Date(day,month,year) : >".$row['day'].":".$row['month'].":".$row['year'] ; ?> <br><hr><hr><?php
	
}
}
?>