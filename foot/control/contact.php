<?php
session_start();
if(!isset($_SESSION['adminaccesspaglu']))
{
header("location: http://www.nightbird.in");
}
else{
	

require_once("welcome.php");
$sql=mysql_query("select * from contact order by s_no desc");
$count=mysql_num_rows($sql);
?>
<a href="member.php"><button>Members</button></a>
	<a href="contact.php"><button>Message</button></a>
	<a href="vis.php"><button>Visitor</button></a>
	<a href="gate1.php"><button>Gate</button></a>
	<a href="email.php"><button>Email</button></a>
<h1>Total Message : <?php echo $count;?></h1>
<?php
while($row=mysql_fetch_assoc($sql))
{
	echo "Name: ".$row['name']; ?> <br><?php
	echo "Email: ".$row['email']; ?> <br><?php
	echo "Mobile Number: ".$row['mobile_no']; ?> <br><?php
	echo "Message: <b>".$row['message']."</b>"; ?> <br><?php
	echo "Browser : ".$row['browser']; ?> <br><?php
	echo "Time".$row['timing']; ?> <br><?php
	echo "Referer".$row['referer']; ?> <br><?php
	
	echo "Date(day,month,year) : ".$row['day'].":".$row['month'].":".$row['year'] ; ?> <br><hr><hr><?php
	
}
}
?>