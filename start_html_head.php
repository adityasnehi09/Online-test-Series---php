<?php
date_default_timezone_set('Asia/Kolkata');
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="img/indotufanlogo.png" rel="icon"  type="image/x-icon">
		<link href="css/extra.css" rel="stylesheet">
		<!-- JS -->
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		 <![endif]-->
		 
		 <script>
		 function parallax()
		{
		
			var an1=document.getElementById('an1');
			var an2=document.getElementById('an2');
			an1.style.bottom=window.pageYOffset/2+'px';
			an2.style.bottom=2*window.pageYOffset+'px';
		}
		window.addEventListener("scroll",parallax,false);
		 
		 </script>
		<script src="js/jquery.js"></script>
		<script src="imp/function.js"></script>
		<script src="js/j.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<meta name="google-site-verification" content="sHHhD__ZIR0TjYTlG7jkRG6K2rGLEnAx04JojwYN_SQ" />
	
   
   <style>
	.comp{
		background-color:#f29f6e;
		color:black;
		font-weight:bold;
		font-family: "Times New Roman", Times, serif;
		
		   font-variant: small-caps;
	}
	.part2-noti{
		font-family: "Times New Roman", Times, serif;
		  font-style: italic;
		   font-variant: small-caps;
		   color:gray;margin-bottom:10px;
		   color:white;
	}
	.btn-success,.btn-primary{
		background-color:#f29f6e;
	}
	@media (max-width: 768px) and (min-width:0px)
 {

	.mobilehidden{
		display:none !important;
	}
	.navbar-toggle{
		margin-bottom:16px;
	}
}
	</style>
	<style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #002D3C;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}
.sidenav ul li:hover{
	background-color:white
}
.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
p{
	color:black;
}
h3{
	color:black;
}
</style>
	
	<script>
		
		function hidefrontsearchresult(){
			$("#front-searchresult").hide();
		}
		
		function showfrontsearchresultbox(){
			$("#front-searchresult").show();
		}
		
		</script>
	<script>
	$("#submitForm").click(function(){  

	$("#submitForm").attr('disabled','disabled');
$("#msg").html('<b>Processing....</b>');
$.post($("#fromData").attr("action"),$("#fromData :input").serializeArray(),function(info){
	 	$("#msg").html(info);
		$("#submitForm").removeAttr('disabled');


	})
});
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
	<script>
	function ajaxsendtemp(url, cfunc) {
		$('#general').modal({
    backdrop: 'static',
    keyboard: false
})
		$("#generalheading").html("Loading...");
		$("#generalbody").html("<b>Please wait wile loading</b>");
		$("#general").modal('show');
    var xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            cfunc(xhttp);
        }
    };
xhttp.open("GET", url, true);
xhttp.send();
}

function loadedcompboxforuser(xhttp) {
	$("#generalheading").html("Create Your Own Competition");
  document.getElementById("generalbody").innerHTML = xhttp.responseText;
}
	</script>
	<script>
function aaaa(id_,value_)
{
	var x = document.getElementById(id_).checked;
	if(x)
	{
		$("."+value_).show(300);
	}
	else{
		$("."+value_).hide(300);
	}
	
}


function submitcreateusercomp(){
	$("#createcompload").html("<b>Loading...</b>");
	$("#createcompbutton").addClass("disabled");
	$("#successnotificationbox").show(100);
	 $("#smallnotisignal").hide();
	var x = document.getElementById("banner_img");
var txt = "";
    if (x.files.length == 0) {
        txt = "<b style='color:red'>Please Select a Banner Image</b>";

    } else {
	
        for (var i = 0; i < x.files.length; i++) {

            var file = x.files[i];
           if ('name' in file) {
              

				var fileExt = file.name.split('.').pop();
				if(fileExt=="jpg" || fileExt=="jpeg" ||fileExt=="JPG" || fileExt=="JPEG" || fileExt=="png" || fileExt=="PNG" || fileExt=="gif" || fileExt=="GIF")
				{
					
				}
				else{
					 txt=" <b style='color:red;font-size:19px;'>Invalid format</b>";
				}
            }
            if ('size' in file) {
				
				if(file.size > 2971500){
					
                txt=" <b style='color:red;font-size:19px;'>The size of file must be less then 2 MB </b>";
            }

            }
        }
    
}


	$(document).ready(function(){
		
if(txt==""){
	txt=" <b style='color:green;font-size:19px;'>Please Wait...</b>";
var formdata = new FormData();
	formdata.append("banner_img", file);
	formdata.append("comp_name", $("#comp_name").val());
	formdata.append("heading1", $("#heading1").val());
	formdata.append("heading2", $("#heading2").val());
	var x = document.getElementById("actingcompetitioncheckbox").checked;
	if(x)
	{
		formdata.append("actingcompetitioncheckbox", $("#actingcompetitioncheckbox").val());
	}
	var x = document.getElementById("dancecompetitioncheckbox").checked;
	if(x)
	{
		formdata.append("dancecompetitioncheckbox", $("#dancecompetitioncheckbox").val());
	}
	var x = document.getElementById("singingcompetitioncheckbox").checked;
	if(x)
	{
		formdata.append("singingcompetitioncheckbox", $("#singingcompetitioncheckbox").val());
	}
	var x = document.getElementById("modelingcompetitioncheckbox").checked;
	if(x)
	{
		formdata.append("modelingcompetitioncheckbox", $("#modelingcompetitioncheckbox").val());
	}
	var x = document.getElementById("comedycompetitioncheckbox").checked;
	if(x)
	{
		formdata.append("comedycompetitioncheckbox", $("#comedycompetitioncheckbox").val());
	}
	
	
	
	formdata.append("total_seat_acting", $("#total_seat_acting").val());
	formdata.append("total_seat_dance", $("#total_seat_dance").val());
	formdata.append("total_seat_comedy", $("#total_seat_comedy").val());
	formdata.append("total_seat_singing", $("#total_seat_singing").val());
	formdata.append("total_seat_modeling", $("#total_seat_modeling").val());
	formdata.append("fee_acting", $("#fee_acting").val());
	formdata.append("fee_dance", $("#fee_dance").val());
	formdata.append("fee_comedy", $("#fee_comedy").val());
	formdata.append("fee_modeling", $("#fee_modeling").val());
	formdata.append("fee_singing", $("#fee_singing").val());
	
	formdata.append("ending_date", $("#ending_date").val());
	formdata.append("ending_month", $("#ending_month").val());
	formdata.append("ending_year", $("#ending_year").val());
	formdata.append("result_date", $("#result_date").val());
	formdata.append("result_month", $("#result_month").val());
	formdata.append("result_year", $("#result_year").val());
	formdata.append("no_dance", $("#no_dance").val());
	formdata.append("no_acting", $("#no_acting").val());
	formdata.append("no_comedy", $("#no_comedy").val());
	formdata.append("no_singing", $("#no_singing").val());
	
	formdata.append("description_lg", $("#description_lg").val());
	
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlerusercomp, true);
	ajax.addEventListener("load", completeHandlerusercomp, true);
	ajax.addEventListener("error", errorHandlerusercomp, true);
	ajax.addEventListener("abort", abortHandlerusercomp, true);
	ajax.open("POST", "uploadusercomp.php",true);
	ajax.send(formdata);
	
}
else{
	$("#createcompload").html("<b>"+txt+"</b>");
	$("#successnotification").html("<b>"+txt+"</b>");
	$("#createcompbutton").removeClass("disabled");
}
function progressHandlerusercomp(event){
	var percent = (event.loaded / event.total) * 100;
	$("#successnotification").html("<h4 class='white-color'>Uploaded "+ Math.round(percent )+" % ,Please wait...</h4>");
	
		$("#createcompbutton").removeClass("disabled");
}
function completeHandlerusercomp(event){

	$("#successnotification").html("<b class='white-color'>"+event.target.responseText+"</b>");
	$("#createcompload").html("<b>"+event.target.responseText+"</b>");
	$("#createcompbutton").removeClass("disabled");
}
function errorHandlerusercomp(event){
	$("#successnotification").html("<b class='red-color'>Upload Failed</b>");
	$("#createcompbutton").removeClass("disabled");
}
function abortHandlerusercomp(event){
	$("#successnotification").html("<b class='red-color'>Upload Aborted</b>");
	$("#createcompbutton").removeClass("disabled");
} 

  
	})
}

</script>
<script>		 
function previewFile() {
	

		$('#general').modal({
    backdrop: 'static',
    keyboard: false
})
		$("#generalheading").html("Crop Your Image");
		$("#generalbody").html("<b>Image loading...</b>");
		$("#general").modal('show');
	
	var x = document.getElementById("imageupload");
var txt = "";
    if (x.files.length == 0) {
        txt = "<b style='color:red'>Please Select a Image file</b>";

    } else {
	
        for (var i = 0; i < x.files.length; i++) {

            var file = x.files[i];
           if ('name' in file) {
              

				var fileExt = file.name.split('.').pop();
				if(fileExt=="jpg" || fileExt=="jpeg" ||fileExt=="JPG" || fileExt=="JPEG" || fileExt=="png" || fileExt=="PNG" || fileExt=="gif" || fileExt=="GIF")
				{
					
				}
				else{
					 txt=" <b style='color:red;font-size:19px;'>Invalid format</b>";
				}
            }
            if ('size' in file) {
				
				if(file.size > 2971500){
					
                txt=" <b style='color:red;font-size:19px;'>The size of file must be less then 2 MB </b>";
            }

            }
        }
    
}
	
if(txt==""){
	txt=" <b style='color:green;font-size:19px;'>Please Wait...</b>";
 var formdata = new FormData();
	formdata.append("imageupload", file);
	$("#generalbody").html("<b>Please wait</b>");
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlerimg, true);
	ajax.addEventListener("load", completeHandlerimg, true);
	ajax.addEventListener("error", errorHandlerimg, true);
	ajax.addEventListener("abort", abortHandlerimg, true);
	ajax.open("POST", "uploadimage.php");
	ajax.send(formdata); 
$("#generalbody").html("Loading ... ");

}
else{
	$("#generalbody").html(txt);
}

}
function progressHandlerimg(event){
	var percent = (event.loaded / event.total) * 100;
	$("#generalbody").html("<h4>Uploaded "+ Math.round(percent )+" % ,Please wait...</h4>");
}
function completeHandlerimg(event){
	$("#generalbody").html("<b>"+event.target.responseText+"</b><p>Loading image...</p>");
	$("#progressBar").value = 0;

	 
$.ajax({
type: "POST",
url: "crop.php",

cache: true,
success: function(result){
	$("#generalbody").html(result);
}
})

}
function errorHandlerimg(event){
	$("#generalbody").html("<b class='red-color'>Upload Failed</b>");
}
function abortHandlerimg(event){
	$("#generalbody").html("<b class='red-color'>Upload Aborted</b>");
} 

function searchsomeone(id_of_type,id_of_text)
	{
		
		var searchtext=$("#"+id_of_text).val();
		var searchcategory=$("#"+id_of_type).val();
		if(searchcategory=='u')
		{
			$("#generalheading").html("Search results of users");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchsomeone.php",
					data: dataString,
					cache: true,
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
					cache: true,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
		
		
		
	}
function searchsomeonedynamic(id_of_type,id_of_text,id_to_show)
	{
		
		var searchtext=$("#"+id_of_text).val();
		var searchcategory=$("#"+id_of_type).val();
		$("."+id_to_show).html("Loading...");
		if(searchcategory=='u')
		{
			$("#generalheading").html("Search results of users");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchsomeone_only_bottom.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("."+id_to_show).html(result);
                    }
					})
		}
		else{
			$("#generalheading").html("Search results of Competitions");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchcomp_only_bottom.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("."+id_to_show).html(result);
                    }
					})
		}
		
	}
</script>
 <style>
			
			#aboutheading{
    -webkit-animation-name: noti; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 2s; /* Chrome, Safari, Opera */
    animation-name: headborder;
    animation-duration: 5s;
	 animation-iteration-count: infinite;
	 border-top:10px solid #428bca;
}
#forgetq{
	-webkit-animation-name: rota; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 5s; /* Chrome, Safari, Opera */
    animation-name: rota;
    animation-duration: 5s;
	 animation-iteration-count: infinite;
}
#forgetq:hover{
	-webkit-animation-name: rota; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 5s; /* Chrome, Safari, Opera */
    animation-name: rotahover;
    animation-duration: 5s;
	 animation-iteration-count: infinite;
	
	
}
@keyframes headborder {
    0%   {
		border-top:10px solid #428bca;
	
	
	}
    25%  {border-top:10px solid pink;}
    50%  {border-top:10px solid blue;
	}
    100% {border-top:10px solid orange;}
}
@keyframes rota {
    0%   {
		
	 transform: rotate(360deg); 
	 border-radius:16px;
	}
    25%  {}
    50%  {
	}
    100% {}
}
@keyframes rotahover {
    0%   {
		
 
	
	}
    25%  {}
    50%  {
	}
    100% {}
}


			
		a {
    transition: all .35s;
    color: #F05F40;
}
		</style>

	<link href="css/background.css" rel="stylesheet">
	
	<link href="css/responsive.css" rel="stylesheet">	
			<link href="css/main.css" rel="stylesheet">

	