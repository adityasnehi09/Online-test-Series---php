
function changemyemail()
{	
		$(document).ready(function(){
			$("#emailconformationheading").html("Loading");
			$("#conformationemail_body").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			$.ajax({
				type: "POST",
				url: "newemail.php",
				cache: true,
				success: function(result){
						$("#emailconformationheading").html("Enter New Email");
						$("#conformationemail_body").html(result);
				}
			})
			 })
	}
function backtoverifyemail()
{
			$(document).ready(function(){
			$("#emailconformationheading").html("Loading");
			$("#conformationemail_body").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			var a="a";
			var dataString = '&a='+ a;
			$.ajax({
				type: "POST",
				url: "verifymyemail.php",
				data: dataString,
				cache: true,
				success: function(result){
						$("#emailconformationheading").html("Email Verification");
						$("#conformationemail_body").html(result);
				}
			})
			 })
}
function conformmyemail()
{
	$(document).ready(function(){
		$("#emailconformationheading").html("Sending Code..");
			$("#conformationemail_body").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			$.ajax({
			type: "POST",
			url: "verifyemail.php",
			cache: true,
			success: function(result){
			if(result=='0')
			{
				$("#conformationemail_body").html("<p>Error Occur ! Try again...</p>");
	$("#emailconformationheading").html("");
				
			}
			else if(result=='-1')
			{
					$("#emailconformationheading").html("");
					$("#conformationemail_body").html("<p>Error Occur 2! Try again...</p>");

			}
            else{
	                 $.ajax({
		            	type: "POST",
	       		        url: "enterconformationcode.php",
		               	cache: true,
			            success: function(result2){
			        	$("#emailconformationheading").html("Enter Verification Code");
			            $("#conformationemail_body").html(result2);
						}
			        })
                }
             }

          });		 
		
	})
	

}
function verifyconformationcode()
{
	        $("#messageinconformationemail").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			var verificationcode=$("#verificationcode_enter").val();		
			var dataString = '&verificationcode='+ verificationcode;
			$.ajax({
			type: "POST",
			url: "verificationcode.php",
			data: dataString,
			cache: true,
			success: function(result){
			if(result==1)
			{
				$("#emailconformationheading").html("Success Notification");
				$("#conformationemail_body").html("<center><b style='color:green'>You have successfully confirmed your email Id, This page is reloading. You can also <a href=''>click here</a> to reload the page</b></p>");		
				$("#alertforconformemail").hide(700);	
				window.location.reload();
			}
			else if(result==0)
			{
				$("#messageinconformationemail").html("<b style='color:red'>confirmation code does not match</b>");
			}
			else
			{
				$("#messageinconformationemail").html("<b style='color:red'>There is some error please try again...</b>");
			}
			}
			})
}
	
function submitnewemail()
{
	
			var newemail=$("#mynewemail").val();
			
			$("#messageinconformationemail").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

			var dataString = '&newemail='+ newemail;
			$.ajax({
			type: "POST",
			url: "changeemail.php",
			data: dataString,
			cache: true,
			success: function(result){
			if(result=='1')
			{
				conformmyemail();
			}else{
				$("#messageinconformationemail").html(result);
			}
		
			}
			})
}

function printitself(e)
{
	$("#successnotificationboxcounter").html(e);
}




function zoomprofilepic(cost_image,name)
{
	
	$(document).ready(function(){
$("#generalheading").html(name);

$("#generalbody").html("<center><img src='upload_images/real/"+cost_image+"'class='img img-responsive'></center>");


	})
}




$(document).ready(function(){
    $("#menubuttonsnehi").click(function(){
        $("#menuboxsnehi").toggle(300);
    });
	 $("#mobilemenuicon").click(function(){
        $("#menuboxsnehi").toggle(300);
    });
	
	$(".container").click(function(){
        $("#menuboxsnehi").hide(300);
    });
	$(".container-fluid").click(function(){
        $("#menuboxsnehi").hide(300);
    });
	$(".upinner").click(function(){
        $("#menuboxsnehi").hide(300);
    });
	$(".downinner").click(function(){
        $("#menuboxsnehi").hide(300);
    });
});



$(document).ready(function(){
	$("#forgetpasswordsubmit").click(function(){
		
					var emailgoingtoverify=$("#emailgoingtoverify").val();
					
		$("#forgetmessagemodal").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

var dataString = '&emailgoingtoverify='+ emailgoingtoverify;
$.ajax({
type: "POST",
url: "verifyemail2.php",
data: dataString,
cache: true,
success: function(result){
if(result==1)
{

	$("#forgetmessagemodal").html("");
	$("#forget1").hide();
	$("#forget2").show();
	$("#Forgotten").html("Enter verification code");
	$("#msgofconform").html("<center>We have sent a verification code in your email "+ emailgoingtoverify+". Please enter that verification code</center>");


}
else {
				
$("#forgetmessagemodal").html(result);
}
}
})
	})
//resent

$("#resendverificationcode").click(function(){
		
					var emailgoingtoverify=$("#emailgoingtoverify").val();
					
		$("#forgetmessagemodal").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

var dataString = '&emailgoingtoverify='+ emailgoingtoverify;
$.ajax({
type: "POST",
url: "resend.php",
data: dataString,
cache: true,
success: function(result){
	
if(result=='no')
{
$("#forgetmessagemodal").html("<center><span style='color:red'>Server Down! Try again...</span></center>");
}
else if(result==-1){
	
$("#forgetmessagemodal").html("<center><span style='color:red'>Enter Valid email</span></center>");
}
else if(result==-2){
	
$("#forgetmessagemodal").html("<center><h3 style='color:red'>You are not registered please <br> <a href='#signupbox'role='button' data-toggle='modal'class='btn-fill btn-large'style='text-decoration:none;'data-dismiss='modal' aria-hidden='true'>Create your account</a></h3></center>");
}
else {
				
$("#Forgotten").html("Unknown error !! Try gain...");
	$("#forget1").hide();
	$("#forget2").show();
	$("#Forgotten").html("Enter verification code");
	$("#msgofconform").html("<center>We have <span style='color:green'>re-</span>sent a verification code in your email "+ emailgoingtoverify+". Please enter that verification code"+ result+"</center>");

}
$("#forgetmessagemodal").html(result);
}
})
	})


	//new password
	$("#submitconformation2").click(function(){
		
var verificationcode=$("#verificationcode").val();
					
$("#Forgotten").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

var dataString = '&conformationcode='+ verificationcode;
$.ajax({
type: "POST",
url: "conformationcode.php",
data: dataString,
cache: true,
success: function(result){
if(result==1)
{
	$("#forget1").hide();
	$("#forget2").hide();
	$("#forget3").show();
	$("#Forgotten").html("Create New Password");
	$("#msgofconform").html("<center>Email verified, Please create your new password</center>");

}else{
	
		$("#Forgotten").html("<span style='color:red'>confirmation code does't matct</span>");
		
}
}
})
	});
	
	
	
	
	
		$("#submitnewpassword").click(function(){

					var createpass1=$("#createpass1").val();
					var createpass2=$("#createpass2").val();
				var email=$("#emailgoingtoverify").val();
					
		$("#Forgotten").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

var dataString = '&createpass1='+ createpass1 + '&createpass2='+ createpass2 +'&email='+email;
$.ajax({
type: "POST",
url: "setpassword.php",
data: dataString,
cache: true,
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
cache: true,
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
//comform new account email


$(document).ready(function(){
	$("#conformemailbutton").click(function(){
		$("#conformemailform").html("<center>Loading...</center>");

$.ajax({
type: "POST",
url: "verifyemail.php",
cache: true,
success: function(result){
if(result=='0')
{
		$("#conformemailform").html("<p>Error Occur ! Try again...</p>");

	$("#messageinconformationemail").html("");
}
else if(result=='-1')
{
	$("#conformemailform").html("<p>Error Occur 2! Try again...</p>");

}
	

else{

	$("#conformemailform").html("<p>We have sent a verification code in your email id,Please check your email id and enter that confirmation code</p>");
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
cache: true,
success: function(result){

		if(result==1)
		{
			$("#messageinconformationemail").html("<center><b style='color:green'>You have successfully confirmed your email Id</b>");
			$("#verifyinputbutton").hide();
			$("#conformemailform").hide()
			$("#emailconformationheading").html("<p><b style='font-size:17px;color:green;'>Email confirmed</b><br>please reload the page <a href=''>Reload</a></p>")
			$("#alertforconformemail").hide(700);
			
			
			
		}
		else if(result==0){
			$("#messageinconformationemail").html("<b style='color:red'>confirmation code does not match</b>");
		}
		else{
			$("#messageinconformationemail").html("<b style='color:red'>There is some error please try again...</b>");
		}
}
})
	})
})
	

function learn(e){
	
	$(document).ready(function(){
		$("#generalheading").html("Loading...");
		$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			
var dataString = '&idofversion='+ e;
$.ajax({
type: "POST",
url: "givedetail.php",
data: dataString,
cache: true,
success: function(result){
$("#generalheading").html("Description");
		$("#generalbody").html(result);
	
}		
		});
	});
}
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//like comment

function loginfirst(){
	 $(document).ready(function(){
		 $("#smallnotisignal").hide();
         $("#successnotificationbox").show(100);
		 $("#successnotification").html("<span style='color:red'>Please Login</span>");
	});

}
