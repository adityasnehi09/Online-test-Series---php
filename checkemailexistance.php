<?php
session_start();
require_once("welcome.php");
$version_uid=mysqli_real_escape_string($con,$_POST['version_uid']);
$comp_uid=mysqli_real_escape_string($con,$_POST['comp_uid']);
$pemail=mysqli_real_escape_string($con,$_POST['pemail']);
$myuid=$_SESSION['uidperson'];
?>
<table style="padding:10px;">
	<?php
	$sss=mysqli_query($con,"select name,crop_pic,id,privacy,uid,gender,email,mobile_no from allmember where email='$pemail' or mobile_no='$pemail'");
	if(mysqli_num_rows($sss)>0)
	{
		if($_SESSION['emailX']!=$pemail)
		{
			while($row=mysqli_fetch_assoc($sss))
			{
				$pname=$row['name'];
				$pid=$row['id'];
				$pprivacy=$row['privacy'];
				$pcrop_pic=$row['crop_pic'];
				$puid=$row['uid'];
				$pgender=$row['gender'];
				$pemail=$row['email'];
				$pmobile_no=$row['mobile_no'];
				$coupleuid="couple".$puid;
				//my req send
				$mycouplereqsentuid="couple_sent_req".$myuid;
				$sql_check_privious_request=mysqli_query($con,"select approve from `$mycouplereqsentuid` where comp_uid='$comp_uid' and uid='$puid'");
                if(mysqli_num_rows($sql_check_privious_request)==0)
				{
					
					$couple_approve=false;
					$rq=false;
					// req come
					$mycouplereqcomeuid="couple_request".$myuid;
					$sql_check_privious_request2=mysqli_query($con,"select approve from `$mycouplereqcomeuid` where comp_uid='$comp_uid' and uid='$puid'");
					if(mysqli_num_rows($sql_check_privious_request2)==0)
					{
						$coupled2=false;
						$couple_approve2=false;
						$rq=false;
						$st=false;
					}
					else
					{
						while($rrowss2=mysqli_fetch_assoc($sql_check_privious_request2))
						{
							if($rrowss2['approve']==1)
							{
								$couple_approve2=true;
								$rq=false;
								$st=false;
							}
							else
							{
								$rq=true;
								$st=false;
								$couple_approve2=false;
							}	
						}
						$coupled2=true;								  
					}
					
				}
				else
				{
					$couple_approve2=false;
					while($rrowss=mysqli_fetch_assoc($sql_check_privious_request))
					{
						if($rrowss['approve']==1)
						{
							$couple_approve=true;
							$st=false;
							$rq=false;
						}
						else
						{
							$couple_approve=false;
							$st=true;
							$rq=false;
						}
					}
					$coupled=true;  
				}
				
				if($pcrop_pic!='0')
		        {
			        if($pprivacy=='only_me')
			        {
				        $linkofimg= "upload_images/default.jpg";
		            } 
			        else 
			        { 
		                $linkofimg= "upload_images/crop/".$pcrop_pic; 
		            } 
		        }
		        else
		        {
		            $linkofimg= "upload_images/default.jpg";
		        }
		        $_SESSION['coupleuid']=$puid;
		        $_SESSION['coupleemail']=$pemail;
		        $_SESSION['couplename']=$pname;
		        $_SESSION['couplegender']=$pgender;
	             ?>
		        <tr><td>
                <img src="<?php echo $linkofimg; ?>"alt="<?php echo $pname; ?>"height="30"/>
                <a href="profile.php?id=<?php echo $pid ; ?>"style="text-decoration:none;"target="_blank">&nbsp;&nbsp;<?php echo $pname; ?></a>&nbsp;&nbsp;</td><td>
                <?php
                if($pid!=$_SESSION['user_idX'])
                {
                    
					
	                    if($couple_approve==true || $couple_approve2==true)
						{
		                    ?>
	                        <!-- <a href="break-up.php?v=<?php// echo $version_uid; ?>&u=<?php// echo $puid ;?>&c=<?php// echo $comp_uid; ?>" class="btn btn-default">Break Up</a>-->
	                         <a href="#" class="btn btn-default">Coupled with you</a>
							<?php
	                    }
						else if($st==true)
						{
							?>
							<!--<a href="cancel-request.php?v=<?php// echo $version_uid; ?>&u=<?php// echo $puid ;?>&c=<?php// echo $comp_uid; ?>" class="btn btn-default">Cancel Request</a>-->
							<a href="#"class="btn btn-default">Request Sent</a>
							<?php 
						}
						else if($rq==true)
						{
							?>
							<button type="button"class="btn btn-default"onclick="accept_couple_request('<?php echo $puid ; ?>','<?php echo $version_uid ;?>','<?php echo $comp_uid ;?>')" >Conform Request</button>
							<?php 
						}
						else
						{ 
						?>
						<input type="button"class="btn btn-success"onclick="joincouple('<?php echo $comp_uid?>','<?php echo $version_uid ?>','<?php echo $puid ?>')"value="Send Couple Request">
						<?php 
					    }
				}   ?>					
				</td></tr>
					<?php
			}
		}	
		else
		{
			echo "<b class='red-color'>You have entered your email, Please enter your partner's email Id</b>";
		}
	}
	else
	{
		echo "<b class='red-color'>Your partner is not a member of Night Bird</b>";
	}	
?></table>	