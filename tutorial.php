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
		<title>IndoTufan - Tutorial Section</title>
	    <meta name="description" content="IndoTufan is a platform for test series, Here you can participate in test series in various field, like JEE Main, JEE Advance, Gate ">
	    <meta name="keywords" content="IndoTufan,indotufan,indo tufan,tutorial,study,jee main,jee advance,jee,iit,test series">	 
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
		function parallax()
		{
			var an1=document.getElementById('an1');
			var an2=document.getElementById('an2');
			an1.style.bottom=3*window.pageYOffset+'px';
			an2.style.bottom=2*window.pageYOffset+'px';
		}
		window.addEventListener("scroll",parallax,false);
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
	<?php include_once("headertop.php");?>
	<!--main-->	<br>
	<div class="container"style="background-color:#162630;padding:10px;" >
	<div class="row">
	<div class="col-lg-12">
	<span class="input-group comp"style="width:100%;">
					 <span class="input-group-btn mobilehidden">
  </span>
  <input type="text" class="form-control mobilehidden" aria-label="Search"id="searchtext">
  <span class="input-group-btn">
    <button type="button"class="form-control comp"href="#general" role="button" data-toggle="modal"type="button"name="searchstd"onclick="searchsomeone('searchcategory','searchtext')" placeholder="Search by Subject Name" /><i class="glyphicon glyphicon-search"></i></button>
  </span>
</span>
	</div>
	</div>
		<div class="row"id="btn-group-study">
		<div class="col-md-4">
		<br>
		<button class="btn btn-primary">B.Tech</button>
		<button class="btn btn-primary">JEE Main</button>
		<button class="btn btn-primary">JEE Advance</button>
		</div>
		<div class="col-md-8">
    <br>
	<!--<script src="./jquery.min.js"></script>-->
	<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script src="./js/youmax.min.js"></script>
	<link rel="stylesheet" href="./css/youmax.css"/>
	<style>
	  #youmax{width:100% !important;}
	  #youmax-video-list-div{background-color:#f29f6e !important;}
	  #youmax-tabs{background-color:rgb(53,53,53) !important;}
	  #youmax-header{background-color:#f29f6e !important;}
	  .youmax-video-list-title{color:black !important;}
	  .youmax-video-list-views{color:green !important;}
	</style>
	</head>
  <body>
<div id="youmax"></div>
	<script>
		$('#youmax').youmax({
			apiKey:'AIzaSyAlhAqP5RS7Gxwg_0r_rh9jOv_5WfaJgXw',
			youTubeChannelURL:"https://www.youtube.com/channel/UCK4rsP38f03WmY8RGJ7iDZA",
			//youTubePlaylistURL:"https://www.youtube.com/playlist?list=PL6CxgvU_Op1ns1LD7tHE8Gm3JFck4anhY",
			youmaxDefaultTab:"PLAYLIST",
			youmaxColumns:3,
			showVideoInLightbox:false,
			maxResults:15,
		});
	</script>
</div>		
		</div>
		<br>
	</div>
	<?php 
	include_once("footer0pad.php"); 
	?>
	</body>
</html>