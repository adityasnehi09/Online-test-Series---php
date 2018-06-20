<?php

session_start();
if(isset($_POST['submit']))
{
	if($_POST['text23']==1602 && $_POST['text15']==1602 && $_POST['text1']=="!@#admin!@#")
	{		
			$_SESSION['adminloginyes']=true;
			$_SESSION['adminaccesspaglu']=true;
					if($_POST['text2']=="!@#$%AdityaSnehi!@#$%")
					{
						$_SESSION['adityasnehiloginyes']="hubjb";
header("location: dashboard.php?ref=1");
					}
					else{
						header("location: dashboard.php?ref=2");
					}
					
			
	}
	else{
			header("location: http://www.nightbird.in");
		}
}
?>
<?php 
if(isset($_SESSION['adminaccesspaglu'])){
	
//header("location: dashboard.php?ref=3");	?>
	
	
	<a href="vis.php"><button>Visitor</button></a>
	<a href="gate1.php"><button>Gate</button></a>
	
	<a href="lo.php">LOGOUT</a>
	<a href="allevent.php">allevent</a>
	<?php
	
}else{
?>
<form method="post"action="">
<center>Under Construction</center>
<?php for($n=1;$n<30;$n++)
{
	?>
	<input type="text"name="text<?php echo $n ?>"placeholder="Under Construction(Error code:<?php echo $n; ?>)"style="width:100%;height:30px;">
	<?php
}?>
<input type="submit"name="submit"value="Go To Home page">
</form>
<?php } ?>