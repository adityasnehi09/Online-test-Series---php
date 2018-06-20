
<html>
<head>
<script type="text/javascript"src="jq.js"></script>

<script>
	$(document).ready(function(){
		$("#checkmyemail").click(function(){
			var useremail=$("#useremail").val();
			        var dataString = '&useremail='+ useremail ;
		$("#main_data").hide();
        $("#msg").html("<img src='image/gears.gif'height='200'>");
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "checkemail.php",
data: dataString,
cache: false,
success: function(result){
$("#searchedname").show();
		$("#searchedname").html(result);
		$("#main_data").show();
		$("#msg").html("");
		
		 
}
})
		})
		$("#checkmymobile_no").click(function(){
			var usermobile_no=$("#usermobile_no").val();
			        var dataString = '&usermobile_no='+ usermobile_no ;
		$("#main_data").hide();
        $("#msg").html("<img src='image/gears.gif'height='200'>");
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "checkmobile_no.php",
data: dataString,
cache: false,
success: function(result){
$("#searchedname").show();
		$("#searchedname").html(result);
		$("#main_data").show();
		$("#msg").html("");
		
		 
}
})
		})
		$("#forgotidmy").click(function(){
			$("#checkemailorm").show();
			$("#findfromid").hide();
		})
		$("#paymentbtn").click(function(){
			$("#form_div").show();
			$("#usercancel2").show();
			$("#paymentbtn").hide();
		})
				$("#usercancel2").click(function(){
			$("#form_div").hide();
			$("#usercancel2").hide();
			$("#paymentbtn").show();
		})
				$("#usercancel").click(function(){
			$("#form_div").hide();
						$("#usercancel2").hide();
			$("#paymentbtn").show();
		})
		$("#usernext").click(function(){
			        var userid =$("#userid").val();

        var dataString = '&userid='+ userid ;
		$("#main_data").hide();
        $("#msg").html("<img src='image/gears.gif'height='200'>");
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "checkid.php",
data: dataString,
cache: false,
success: function(result){

		$("#msg").html(result);
		$("#main_data").show();
		
		 
}
})

		
		})
	})	
</script>	
	<script>

	$(document).ready(function(){	
		
$("body").css("background-size",$(window).width()+"px "+$(window).height()+"px")
		$('#relation').on('change', function (e) {
	var s=$("#relation").val();
	if(s=="Married")
	{
		$("#father").hide();
		$("#husband").show(500);
		
	}
	if(s=="Unmarried")
	{
		$("#husband").hide();
		$("#father").show(500);

	}
	if(s==0)
	{
		$("#father").hide();
		$("#husband").hide();

	}
	})
	 
  
	$("#submit").click(function(){
		if($("#relation").val()=="0")
		{
			alert("Please Select your Relationship");
		}
		else if($("#gender").val()=="0")
		{
			alert("Please Select your Gender");
		}
	})
})


</script>
 
<style>
#forgotidmy:hover{
	color:white;
	background-color:blue;
	padding:8px;
	border-radius:5px;
}

#menu li{
	display:inline;
	padding:20px;
	text-decoration:none;
	cursor:pointer;
	margin:0px;
	border-radius:5px;

}
#menu li:hover{
	background-color:blue;
}

textarea{
	height:55px;width:400px;border-radius:7px;margin:10px;resize:none;overflow:hidden;outline: none;
}
.btn {
  background: #1cf3ef;
  background-image: -webkit-linear-gradient(top, #1cf3ef, #2980b9);
  background-image: -moz-linear-gradient(top, #1cf3ef, #2980b9);
  background-image: -ms-linear-gradient(top, #1cf3ef, #2980b9);
  background-image: -o-linear-gradient(top, #1cf3ef, #2980b9);
  background-image: linear-gradient(to bottom, #1cf3ef, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #fcfcfc;
  font-size: 20px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;
  cursor:pointer;
  width:100px;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
  cursor:pointer;
}
#termsstyle{
	text-decoration:none;
	color:rgb(0,255,255);
}
#termsstyle:hover{
	
	color:white;
}
</style>
</head>
<body style="background-image:url(image/2.jpg);background-attachment:fixed;">

<div id="header"style="width:100%;height:60px;background-color:black;margin:0px;position:fixed;z-index:10000;top:0;left:0;right:0;">
<img src="image/snehi.png"height="60"/>
<ul id="menu"style="padding:5px 20px;float:right;">
<a href="index.php"style="text-decoration:none;color:white;"><li>HOME</li></a>
<a href="about.php"style="text-decoration:none;color:white;"><li>ABOUT</li></a>
<a href="contact.php"style="text-decoration:none;color:white;"><li>CONTACT</li></a>
<a href="photo.php"style="text-decoration:none;color:white;"><li>PHOTO GALLERY</li></a>
</ul>
</div>
<div style="padding:50px;">

<center><h1 style="color:white;font-waight:200px;">Snehi Sangeetalaya Saharsa</h1></center>
<center><h3>Learn Vocal,dance,Piano and more.</h3></center>
 </div>
 <center>
 
 <div id="form_div"style="display:none;">
 <center><span id="msg"></span></center>
 <div style="background-color:rgb(128,255,255);width:400px;padding:10px 50px;border-radius:5px;display:none;"id="searchedname">
 </div>
<div style="background-color:rgb(128,255,255);width:400px;padding:10px 50px;border-radius:5px;"id="main_data">

<div style="margin:10px;padding:10px;background-color:rgb(36,166,166);"id="findfromid">
<h3>Enter your Id</h3>
<input type="text"placeholder="Enter Your Id"style="height:30px;width:300px;padding:5px;margin:5px;"id="userid"required/>
<input type="button"style="height:30px;width:100px;padding:5px;cursor:pointer;"value="Cancel"id="usercancel"/>
<input type="submit"style="height:30px;width:100px;padding:5px;cursor:pointer;"value="Next"id="usernext"/>
<br><br>
<a href="#" style="font-size:20px;text-decoration:none;margin:10px;color:white;"id="forgotidmy">Forgot ID</a>
</div>
<div id="checkemailorm"style="display:none;">
<div style="margin:10px;padding:10px;background-color:rgb(36,166,166);">
<h3>Enter your Email</h3>
<input type="email"placeholder="Enter Your Email"style="height:30px;width:300px;padding:5px;margin:5px;"id="useremail"required/>

<input type="submit"style="height:30px;width:100px;padding:5px;cursor:pointer;"value="Search"id="checkmyemail"/>
</div>
<center><h3>OR</h3></center>
<div style="margin:10px;padding:10px;background-color:rgb(36,166,166);">
<h3>Enter your Mobile Number</h3>
<input type="text"placeholder="Enter Your Mobile Number"style="height:30px;width:300px;padding:5px;margin:5px;"id="usermobile_no"required/>

<input type="submit"style="height:30px;width:100px;padding:5px;cursor:pointer;"value="Search"id="checkmymobile_no"/>
</div>
</div>
</div>
</div>
</center>
<center><a href="reg.php"><button style="outline:none;cursor:pointer;width:300px;margin:50px;"class="btn">Register Now</button></a><button style="outline:none;cursor:pointer;width:300px;"id="paymentbtn"class="btn">Make Payment</button><button style="outline:none;cursor:pointer;width:300px;display:none;"id="usercancel2"class="btn">Cancel</button></center>

<div style="height:30px;width:100%;float:left;margin:100px 0px 0px 0px;">
<center><div style="padding:20px;">


<a href="https://www.facebook.com/Snehi-Sangeetalaya-781849991919929/"target="_blank"><img src="social/facebook.png"height="60"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="https://plus.google.com/+NightBirdAudition/" target="_blank"><img src="social/googleplus.png"height="60"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://youtube.com/+NightBirdAudition/" target="_blank"><img src="social/youtube.png"height="60"/></a>

</div>
<div style="height:30px;width:100%;float:left;background-color:#242729;position:fixed;left:0; right:0; bottom :0;padding:5px;">
<span style="color:white;margin:10px;padding:20px;font-waight:bold;cursor:pointer;"><a href="terms.php"target="_blank"style="color:white;">Terms and condition</a></span>

<span style="color:white;margin:10px;padding:20px;font-waight:bold;cursor:pointer;"id="feedbackfromlast">Feedback</span><br><br><br>

</div>
</center>
</div>
</body>
</html>