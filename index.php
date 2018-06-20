<?php 
 //chacked security k1
session_start();
if(isset($_SESSION['logintemp']))
{
	require_once("basic2.php");
	$mycrop_pic=$_SESSION['imagepic'];
	$nameX=$_SESSION['nameX'];
	$myprivacy=$_SESSION['mycrop_privacy'];
	$myid=$_SESSION['user_idX'];
	$myuid=$_SESSION['uidperson'];
}
require_once("imp/function.php");
?>
<?php require_once("start_html_head.php"); ?>
		<title>IndoTufan - All India Online Test Series</title>
	    <meta name="description" content="IndoTufan is a platform for test series, Here you can participate in test series in various field, like JEE Main, JEE Advance, Gate ">
	    <meta name="keywords" content="IndoTufan,indotufan,indo tufan,test,series,gate,jee main,jee advance,jee,iit,test series">	 
		<link rel="canonical" href="https://www.indotufan.com/" />
		<script>
function change_page(page_id){   
     var dataString = 'page_id='+ page_id;
	  $("#postofmember").html("Loading...");
     $.ajax({
           type: "POST",
           url: "suggestion.php",
           data: dataString,
           cache: false,
           success: function(result){
			     $("#postofmember").html(result);
           }
      });
}
function long_page(page_id){   
     var dataString = 'page_id='+ page_id;
	 $("#loadsug").show();
     $.ajax({
           type: "POST",
           url: "suggestion2.php",
           data: dataString,
           cache: false,
           success: function(result){
            $(".view"+page_id).hide();
            $("#loadsug").hide();
			     $(result).appendTo($('#postofmember'));
           }
      });
}
</script>
		<script>
		function changeposttype()
		{
			$("#postofmember").html("<center style='color:white;'><b>Loading...</b></center>");
			var comptype=$("#comptype").val();
			var e=$("#posttype").val();
			if(comptype=='')
			{
				if(e=='new')
				{
				$.ajax({
				url: "new.php",
				success: function(result){
				$("#postofmember").html(result);
				}
				})
				}
				else if(e=='rec')
				{
				$.ajax({
				url: "suggestion.php",
				success: function(result){
				$("#postofmember").html(result);
				}
				})
				}
			}
			else
			{
				if(e=='new')
				{	
					var dataString ="&comptype="+comptype;		
					$.ajax({
					type: "POST",
					url: "newpostbycat.php",
					data: dataString,
					cache: false,
					success: function(result){
					$("#postofmember").html(result);
                    }
					})
				}
				else if(e=='rec')
				{
					var dataString ="&comptype="+comptype;		
					$.ajax({
					type: "POST",
					url: "recpostbycat.php",
					data: dataString,
					cache: false,
					success: function(result){
					$("#postofmember").html(result);
                    }
					})
				}
			}
		}
	function searchsomeone()
	{
		var searchtext=$("#searchtext").val();
		var searchcategory=$("#searchcategory").val();
		if(searchcategory=='u')
		{
			$("#generalheading").html("Search results of users");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchsomeone.php",
					data: dataString,
					cache: false,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
		else{
			$("#generalheading").html("Search results of Competitions");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchcomp.php",
					data: dataString,
					cache: false,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
	}
		</script>
	</head>
	<body style="">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3980545586940639",
    enable_page_level_ads: true
  });
</script>
	<!-- <div style="width:100%;height:100%;position:fixed;z-index:-1;">
   <video width="100%" height="100%" id="video_real"style="cursor:pointer;valigh:top;" autoplay loop muted>
  <source src="tufan.MP4" type="video/mp4">
</video>
			</div> -->
	<?php include_once("headertop.php");?>
	<!--main-->
	<div class="container" >
		<?php
		if(!isset($_SESSION['logintemp']))
		{
			?>	
			<div style="position:fixed;width:200px;bottom:0;height:200px;z-index:-1;background-image:url(img/win-944525_1280.png);background-size:200px;"id="an1"></div>
			<div style="position:fixed;width:200px;bottom:0px;right:100px;height:200px;z-index:-1;background-image:url(img/win-944525_1280.png);background-size:200px;"id="an2"></div>
			<div class="row overlay">
				<div class="col-lg-12 ">
					<br><br><br>
					<div class="nightbird">
						<h1>IndoTufan All India Online Test Series</h1>
						<h3>Test Series for Gate, JEE main, JEE Advance</h3>
						<button class="btn-home comp"href="#signupbox" role="button" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Get Started</button>
						<a class="btn-home comp"href="about.php"style="text-decoration:none;transition: all .35s;">Learn more</a>
					</div>
				</div>
			</div>
		    <?php
		} ?>
	</div>
	<?php
	if(!isset($_SESSION['logintemp']))
		{
			?>
			<section style="background-color:#213948;padding-top:50px;padding-bottom:50px; box-shadow: 10px 10px 5px grey;"id="aboutheading">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
					<h1 style=""class="part2-noti"> Latest Tests</h1><hr>
					<div style="background-color:white;padding:0px 20px;">
					<?php
					require_once("welcome.php");
					$sq=mysqli_query($con,"select * from all_test order by s_no desc ");
					if(mysqli_num_rows($sq)>0)
					{
						echo "<table style='width:100%;border-radius:5px;'class='table table-striped table-hover'>";
						while($ro=mysqli_fetch_array($sq))
						{
							$streams=$ro['streams'];
							$exam_type=$ro['exam_type'];
								$starting_time=$ro['starting_time'];
								$starting_month=$ro['starting_month'];
								$starting_year=$ro['starting_year'];
								$starting_day=$ro['starting_day'];
							$exam_uid=$ro['uid'];
							echo "<tr><td rowspan='2'><h3><a href='exam-detail.php?id=$exam_uid'>".$ro['exam_name']."</a></h3></td><td align='right'>".time_($starting_time).", " .month_($starting_month)." $starting_day, $starting_year </td></tr>";
							echo "<tr style='border-bottom:1px solid gray'><td align='right'>".exam_type($exam_type)."</td></tr>";
						}
						echo "</table>";
					}else{
						echo mysqli_error($con);
					}
					?>
					</div>
					</div>
					<div class="col-md-6">
					<h1 style=""class="part2-noti">Latest Toppers </h1><hr>
					<?php
					require_once("welcome.php");
					$sql_rank=mysqli_query($con,"select uid from all_test where rank_status='1' order by s_no desc limit 0,1");
					if(mysqli_num_rows($sql_rank)>0){
						while($row_rank=mysqli_fetch_assoc($sql_rank)){
							makerank($row_rank['uid'],$con);
						}
					}
					?>
					</div>
					</div>
					<div class="row">
					</div>
				</div>
			</section>
  <!--/row-->
   <?php } else {
	   //require_once("basic2.php");
	  ?>
   <div class="container">
   <div class="row">
   <div class="col-md-12" style="background-color:white;">
   <br>
   IndoTufan is organizing All India Test Series for Gate, Jee Mains, Jee Advance Examination. The main objective of this test is to boost your capability to crack Gate examination.
   </div>
   </div>
		<div class="row"id="">
			<div style="margin-top:30px;">
					<div class="col-lg-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>All India Gate Test Series</h3>
        <p>If you would like to join in All India Online test series for Gate Examination then click on 'Go Inside' button below. </p>
        <p><a href="gate.php" class="btn btn-success" role="button">Go Inside</a> </p>
      </div>
    </div>
		</div>
		<div  class="col-lg-4">
		 <div class="thumbnail">
      <div class="caption">
        <h3>All India JEE Main Test Series</h3>
        <p>If you would like to join in All India Online series for JEE Mains Examination then click on 'Go Inside' button below.</p>
        <p><a href="#" class="btn btn-success" role="button">Go Inside</a> </p>
      </div>
    </div>
		</div>
		<div class="col-lg-4">
		 <div class="thumbnail">
      <div class="caption">
        <h3>All India Jee Advance Test series</h3>
        <p>If you would like to join in All India Online test series for JEE Advance Examination then click on 'Go Inside' button below.</p>
       <a href="#" class="btn btn-success" role="button">Go Inside</a> 
      </div>
    </div>
		</div>
		</div>
			</div>
		</div>
	</div>
   <?php } ?>
	<?php 
	include_once("footer0pad.php"); 
	?>
	</body>
</html>