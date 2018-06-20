$(document).ready(function(){
	$("#forgetpasswordsubmit").click(function(){
		
					var emailgoingtoverify=$("#emailgoingtoverify").val();
					
		$("#Forgotten").html("<center>Loading...</center>");

var dataString = '&emailgoingtoverify='+ emailgoingtoverify;
$.ajax({
type: "POST",
url: "verifyemail2.php",
data: dataString,
cache: false,
success: function(result){
if(result==0)
{
$("#Forgotten").html("<span style='color:red'>Server Down! Try again...</span>");
}
else if(result==-1){
	
$("#Forgotten").html("<span style='color:red'>Enter Valid email</span>");
}
else if(result==-2){
	
$("#Forgotten").html("<center><h3 style='color:red'>You are not registered please <br> <a href='#signupbox'role='button' data-toggle='modal'class='btn-fill btn-large'style='text-decoration:none;'data-dismiss='modal' aria-hidden='true'>Create your account</a></h3></center>");
}
else {
				
$("#Forgotten").html("Unknown error !! Try gain...");
	$("#forget1").hide();
	$("#forget2").show();
	$("#Forgotten").html("Enter verification code");
	$("#msgofconform").html("<center>We have sent a verification code in your email "+ emailgoingtoverify+". Please enter that verification code"+ result+"</center>");

}
}
})
	})
//resent

$("#resendverificationcode").click(function(){
		
					var emailgoingtoverify=$("#emailgoingtoverify").val();
					
		$("#Forgotten").html("<center>Loading...</center>");

var dataString = '&emailgoingtoverify='+ emailgoingtoverify;
$.ajax({
type: "POST",
url: "resend.php",
data: dataString,
cache: false,
success: function(result){
if(result==0)
{
$("#Forgotten").html("<span style='color:red'>Server Down! Try again...</span>");
}
else if(result==-1){
	
$("#Forgotten").html("<span style='color:red'>Enter Valid email</span>");
}
else if(result==-2){
	
$("#Forgotten").html("<center><h3 style='color:red'>You are not registered please <br> <a href='#signupbox'role='button' data-toggle='modal'class='btn-fill btn-large'style='text-decoration:none;'data-dismiss='modal' aria-hidden='true'>Create your account</a></h3></center>");
}
else {
				
$("#Forgotten").html("Unknown error !! Try gain...");
	$("#forget1").hide();
	$("#forget2").show();
	$("#Forgotten").html("Enter verification code");
	$("#msgofconform").html("<center>We have <span style='color:green'>re</span>sent a verification code in your email "+ emailgoingtoverify+". Please enter that verification code"+ result+"</center>");

}
}
})
	})
	//new password
	$("#submitconformation2").click(function(){
		
					var verificationcode=$("#verificationcode").val();
					
		$("#Forgotten").html("<center>Loading...</center>");

var dataString = '&conformationcode='+ verificationcode;
$.ajax({
type: "POST",
url: "conformationcode.php",
data: dataString,
cache: false,
success: function(result){
if(result==1)
{
	$("#forget1").hide();
	$("#forget2").hide();
	$("#forget3").show();
	$("#Forgotten").html("Create New Password");
	$("#msgofconform").html("<center>Email verified, Please create your new password</center>");

}else{
	
		$("#Forgotten").html("<span style='color:red'>Conformation code does't matct</span>");
		
}
}
})
	});
	
	
	
	
	
		$("#submitnewpassword").click(function(){

					var createpass1=$("#createpass1").val();
					var createpass2=$("#createpass2").val();
				var email=$("#emailgoingtoverify").val();
					
		$("#Forgotten").html("<center>Loading...</center>");

var dataString = '&createpass1='+ createpass1 + '&createpass2='+ createpass2 +'&email='+email;
$.ajax({
type: "POST",
url: "setpassword.php",
data: dataString,
cache: false,
success: function(result){
if(result==1)
{
	$("#forget1").hide();
	$("#forget2").hide();
	$("#forget3").hide();
	$("#Forgotten").html("Password Changed Successfully");
	$("#msgofconform").html("<center>Now you can login with your new password</center>");
	
}else {
	
	$("#Forgotten").html(result);	
	
	
}
}
})
	})
	
	//Contact Form
	$("#contactsubmit").click(function(){
		
					var contactname=$("#contactname").val();
					var contactemail=$("#contactemail").val();
					var contactmobile_no=$("#contactmobile_no").val();
					var contactmessage=$("#contactmessage").val();
					
		$("#contactheader").html("<center>Loading...</center>");

var dataString = '&contactname='+ contactname + '&contactemail='+ contactemail + '&contactmobile_no='+ contactmobile_no +'&message='+ contactmessage;
$.ajax({
type: "POST",
url: "contactfast.php",
data: dataString,
cache: false,
success: function(result){
if(result==1)
{
$("#contactheader").html("<span style='color:green'>Message Sent</span>");
$("#contactform").hide();
}else{

$("#contactheader").html("<h3><span style='color:red'>"+result+"</span></h3>");

}
}

})
	})
})



$(document).ready(function(){
	$("#conformemailbutton").click(function(){
		$("#conformemailform").html("<center>Loading...</center>");
			var emailgoingtoverify=$("#emailgoingtoverify").val();
var dataString = '&emailgoingtoverify='+ emailgoingtoverify;
$.ajax({
type: "POST",
url: "verifyemail.php",
data: dataString,
cache: false,
success: function(result){
if(result==0)
{
	
}else{

	$("#conformemailform").html("<p>We have sent a verification code in your email id,Please check your email id and enter that conformation code</p>");
	$("#verifyinputbutton").show();
	$("#messageinconformationemail").html(result);
	
}
}

});		 
		
	})
	$("#submitverificationcode").click(function(){
	
						var verificationcode=$("#verificationcode").val();
				
var dataString = '&verificationcode='+ verificationcode;
$.ajax({
type: "POST",
url: "verificationcode.php",
data: dataString,
cache: false,
success: function(result){

		if(result==1)
		{
			$("#messageinconformationemail").html("<center><b style='color:green'>You have successfully conformed your email Id</b>");
			$("#verifyinputbutton").hide();
			$("#conformemailform").hide()
			$("#emailconformationheading").html("<b style='font-size:17px;color:green;'>Email Conformed</b><br><center><p>please reload the page<br><a href='profile.php'>Reload</a></p></center>")
			$("#alertforconformemail").hide(700);
			
			
			
		}
		else if(result==0){
			$("#messageinconformationemail").html("<b style='color:red'>Conformation code does not match</b>");
		}
		else{
			$("#messageinconformationemail").html("<b style='color:red'>There is some error please try again...</b>");
		}
}
})
	})
})
	 
function previewFile() {
  var preview = document.querySelector('#imgpre');
      preview.src = "img/sel.png";
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
	$("#message").html("<b style='color:red'>Image has selected please press upload</b>");
	$("#uploadimagebutton").css("-webkit-animation","flash linear 1s infinite;");
	$("#uploadimagebutton").css("animation","flash linear 1s infinite;");
	
  } else {
    preview.src = "img/sel.png";
	$("#message").html("Please select an Image");
	$("#uploadimagebutton").css("-webkit-animation","flash linear 0s infinite;");
	$("#uploadimagebutton").css("animation","flash linear 0s infinite;");
  }
}