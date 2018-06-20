<?php
if(isset($_SESSION['logintemp'])){
require_once("basic2.php"); 
}
?>
<div id="come_here_from_last"></div>
    <header id="header">
        <div class="top-bar"style="background-color:#213948;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-3">
                        <div class="top-number">
						<span class="input-group comp"style="max-width:400px;">
					 <span class="input-group-btn mobilehidden">
   <select class="form-control comp "id="searchcategory"style="outline:none;min-width:100px;"onchange="searchsomeonedynamic('searchcategory','searchtext','showresult')">
<option value="c">Test</option>
<option value="u"selected>User</option>
</select>
  </span>
  <input type="text" class="form-control mobilehidden" aria-label="Search"id="searchtext"class="searchtext not-hide-list-onclick"onkeyup="searchsomeonedynamic('searchcategory','searchtext','showresult')"onclick="showfrontsearchresultbox()">
  <span class="input-group-btn"onclick="hidefrontsearchresult()" style="width:50px">
    <button type="button"class="form-control comp"href="#general" role="button" data-toggle="modal"type="button"name="searchstd"onclick="searchsomeone('searchcategory','searchtext')"  style="max-width:50px"/><i class="glyphicon glyphicon-search"></i></button>
  </span>
</span></div>
<div style="width:400px;z-index:333666333;position:fixed;top:44px;background-color:white;max-height:70%;overflow-y:scroll;display:none;padding:5px;"id="front-searchresult">
 <div style="float:right;padding:10px;cursor:pointer"onclick="hidefrontsearchresult()">X</div>
 <div class="showresult"style="padding:10px;">Start Typing</div>
 
 </div>
                    </div>
                    <div class="col-sm-6 col-xs-9">
                       <div class="social">
					   
					   
					   
					   
					   <?php	if(isset($_SESSION['logintemp'])){  
						
						?>
						
                               <a href="profile.php?id=<?php echo $_SESSION['user_idX'];?>"><?php if(isset($_SESSION['logintemp'])){?> 
            
	           <?php if(isset($_SESSION['logintemp'])){ if($_SESSION['imagepic']!='0')
              { ?>
                  <img src="upload_images/crop/<?php echo $_SESSION['imagepic']; ?>"alt=" <?php  echo $_SESSION['nameX'];   ?>" width="30px"class="img img-circle"> &nbsp;&nbsp;
							<?php }
		      }?>
			     <?php } ?><span class=""style="color:white;font-weight:bold;">
			  <?php 
			  if(preg_match('/\s/',$_SESSION['nameX']))
			 {
				 $name_short = explode(" ", $nameX);
				 
				 echo $name_short[0]; 
			 }
			 else{
				 echo $_SESSION['nameX'];
			 }
?>

	         </span></a> &nbsp; <a class="btn comp"href="logout">Logout</a>
		   <?php }else {
			   ?>
			  <div style="margin-top:3px"> 
			  <a href="#loginformbox"role="button" data-toggle="modal" style="color:white;border:1px solid white;padding:7px;border-radius:5px;margin-top:10px"><i class="glyphicon glyphicon-log-in"></i> LogIn</a>
			  <a href="#signupbox"role="button" data-toggle="modal" style="color:white;border:1px solid white;padding:7px;border-radius:5px;margin-top:10px"><i class="glyphicon glyphicon-user"></i> Sign Up</a>
			 					
      <!--       <a href="#loginformbox"role="button" data-toggle="modal"class="btn btn-success comp"style="margin-right:0px">Login</a>
          `	<a class="btn btn-success comp"href="#signupbox"role="button" data-toggle="modal">Sign Up</a>
		  <a style="color:#14a9d3;margin-right:20px;cursor:pointer;"id="forgetq"><a href="#forgetpassword" role="button" data-toggle="modal"class="btn btn-success comp"> <span >?</span></a></a>
		-->  
		</div>
		<?php } ?>
					   
					   
					   
					   
					   
					
					   
					   
					   
					   
					   
					   
                            
                                   
                            
                       </div>
                    </div>
					
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner"style="background-color:#162630"style="padding:20px">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="img/indotufan.png"height="50"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){ ?> class="active"<?php } ?>><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li <?php if(basename($_SERVER['PHP_SELF'])=="about.php"){ ?> class="active"<?php } ?>><a href="about">About Us</a></li>
                        <li <?php if(basename($_SERVER['PHP_SELF'])=="services.php"){ ?> class="active"<?php } ?>><a href="services">Services</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Test Series <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                               
                                <li><a href="gate"><i class="fa fa-users"></i> For Gate</a></li>
                                <li><a href="jee-main"><i class="fa fa-users"></i> For Jee Main</a></li>
                                <li><a href="jee-advance"><i class="fa fa-users"></i> For Jee Advance</a></li>
                                <li><a href="bank.php"><i class="fa fa-users"></i> Bank</a></li>
                                <li><a href="ssc.php"><i class="fa fa-users"></i> SSC</a></li>
                               
                            </ul>
                        </li>
						<?php if(isset($_SESSION['logintemp'])){ ?>
                      
						
						<?php } else {?>
							
						<?php }?>
						<?php if(isset($_SESSION['logintemp'])){ ?>
						 <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="change-name"><i class="ion-android-settings"></i> Change Name</a></li>
                                <li><a href="change-password"><i class="ion-android-settings"></i> Change Password</a></li>
                                <li><a href="change-email"><i class="ion-android-settings"></i> Change Email</a></li>
                                <li><a href="#"><i class="ion-android-settings"></i> 
							
<label for="imageupload"id="imageuploadlabel"style="cursor:pointer;">
Change Profile pic
</label> 

<input type="file"name="imageupload"id="imageupload"style="display:none;"accept="image/*"onchange="previewFile()"/>


								
								
								</a></li>
                            </ul>
                        </li>
						
							<?php } ?>
						
						   <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="result"><i class="ion-android-settings"></i> Result</a></li>
                                <li><a href="ranklist"><i class="ion-android-settings"></i> Rank List</a></li>
                                <li><a href="timetable.php"><i class="ion-android-settings"></i> Time Table</a></li>
                                <li><a href="previous-question.php"><i class="ion-android-settings"></i> Previous Questions</a></li>
                                <li><a href="contact"><i class="ion-android-settings"></i> Contact Us</a></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

       <?php
if(isset($_SESSION['logintemp'])){
$myuid=$_SESSION['uidperson'];
$fulldetail="fulldetail".$myuid;
require_once("welcome.php");
$sq=mysqli_query($con,"select myincome,cover_link,cover_type from `allmember`");
if(mysqli_num_rows($sq)>0)
{
	while($row=mysqli_fetch_assoc($sq))
	{
		$myincome=$row['myincome'];
		$cover_link=$row['cover_link'];
		$cover_type=$row['cover_type'];
		$_SESSION['myincome']=$row['myincome'];
	}
}
}

?>
