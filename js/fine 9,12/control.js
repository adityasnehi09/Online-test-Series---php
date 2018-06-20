function accept_couple_request(cuid,req_version_uid,req_comp_uid)
{
			$("#generalheading").hide();
				$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
	var moon="acceptcouplereq";
	
	var dataString = '&acceptcouplereq='+ moon +'&cuid='+ cuid +'&req_v_uid='+ req_version_uid +'&req_c_uid='+ req_comp_uid;
	
	$.ajax({
type: "POST",
data: dataString,
url: "acceptcouplereq.php",
cache: false,
success: function(result){
	$("#generalbody").html(result);
}
	})
	
}


//side noti
function notibox(){
	
	 $(document).ready(function(){
		 $("#smallnotisignal").hide();
         $("#successnotificationbox").show(100);
	});
}
function closenotibox(){
	
	 $(document).ready(function(){
		 $("#smallnotisignal").show();
         $("#successnotificationbox").hide(100);
	});
}
function printitself(e)
{
	$("#successnotificationboxcounter").html(e);
}


//showmynotification
function showmynotification()
{
	$("#showmynotificationbox").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
	
	
	var moon="m";
	var dataString = '&moon='+ moon ;
	$.ajax({
type: "POST",
data: dataString,
url: "showmynotification.php",
cache: false,
success: function(result){
	$("#count_notification").hide();
	$("#showmynotificationbox").html(result);
}
	})
}


// couple entry
function joincouple(comp_uid,version_uid)
{
	$("#partneremailmsg").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
	
	var dataString = '&comp_uid='+ comp_uid +'&version_uid='+ version_uid;
	$.ajax({
type: "POST",
data: dataString,
url: "joincouple.php",
cache: false,
success: function(result){
	
		$("#partneremailmsg").html("<center>"+result+"</center>");
	
}

})
}
function checkemail(comp_uid,version_uid)
{
	var pemail=$("#partneremail").val();
	$("#partneremailmsg").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
	
	var dataString = '&pemail='+ pemail +'&comp_uid='+ comp_uid +'&version_uid='+ version_uid;
$.ajax({
type: "POST",
url: "checkemailexistance.php",
data: dataString,
cache: false,
success: function(result){
	if(result=='01'){
		$("#partneremailmsg").html("Your partner is not at Night Bird, please call your partner and tell him/her to create an account at Night Bird ");
	}
	else if(result=='0'){
		$("#partneremailmsg").html("Enter valid Email Id");
	}
	else if(result=='02'){
		$("#partneremailmsg").html("This is your email dear, Please enter the email of your Partner");
	}
	
	else{
	$("#partneremailmsg").html(result);
	}
	
}
})

	
}
function entrycouple(comp_uid,version_uid)
{
		 $(document).ready(function(){
		$("#generalheading").html("Please Wait...");
				$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
						
var dataString = '&comp_uid='+ comp_uid+'&versionid='+version_uid;
$.ajax({
type: "POST",
url: "couplecheck.php",
data: dataString,
cache: false,
success: function(result){
			$("#generalheading").html("Enter Email Id of your Partner");
				$("#generalbody").html(result);
						
}
})
		 })
		
}


function innerjoin(e,version){

	 $(document).ready(function(){
		$("#generalheading").html("Please Wait...");
				$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			
var dataString = '&joiningid='+ e+'&versionid='+version;
$.ajax({
type: "POST",
url: "joinme.php",
data: dataString,
cache: false,
success: function(result){
	if(result==1){
		
		var dataString = '&idofversion='+ version;
$.ajax({
type: "POST",
url: "joininglist.php",
data: dataString,
cache: false,
success: function(result){
		
		
	$("#generalheading").html("<center style='color:green'>Joining Successful</center>");
	
	$("#generalbody").html(result);
	
}		
		});
		
		
				
	
	}
	else if(result==0){
		$("#generalheading").html("<center style='color:green'>Wrong entry</center>");
$("#generalbody").html("<center style='color:red'>You are allready a member of this competition</center>");
			
	}
	else{
		$("#generalheading").html("<span style='color:red'>Error Occur !Try again..</span>");
				$("#generalbody").html(result);
	}


	
}		
		});
	}); 
}
function zoomprofilepic(cost_image,name)
{
	
	$(document).ready(function(){
$("#generalheading").html(name);

$("#generalbody").html("<center><img src='upload_images/real/"+cost_image+"'class='img img-responsive'></center>");


	})
}
function fulldetail(uidcost){
	$(document).ready(function(){
$("#generalheading").html("loading...");

var dataString = '&uidcost='+uidcost;
$.ajax({
type: "POST",
url: "aboutmevideo.php",
data: dataString,
cache: false,
success: function(result){
$("#generalheading").html(result);
$("#generalbody").html(result);

}
	})
	
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
cache: false,
success: function(result){
if(result==1)
{

	$("#forgetmessagemodal").html("");
	$("#forget1").hide();
	$("#forget2").show();
	$("#Forgotten").html("Enter verification code");
	$("#msgofconform").html("<center>We have sent a verification code in your email "+ emailgoingtoverify+". Please enter that verification code"+ result+"</center>");


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
					
		$("#Forgotten").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

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
					
$("#Forgotten").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

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
					
		$("#Forgotten").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");

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
//comform new account email


$(document).ready(function(){
	$("#conformemailbutton").click(function(){
		$("#conformemailform").html("<center>Loading...</center>");

$.ajax({
type: "POST",
url: "verifyemail.php",
cache: false,
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
			$("#emailconformationheading").html("<b style='font-size:17px;color:green;'>Email Conformed</b><br><center><p>please reload the page<br><a href=''>Reload</a></p></center>")
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
	

function learn(e){
	
	$(document).ready(function(){
		$("#generalheading").html("Loading...");
		$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			
var dataString = '&idofversion='+ e;
$.ajax({
type: "POST",
url: "givedetail.php",
data: dataString,
cache: false,
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
function joinbutton(e){
	
	$(document).ready(function(){
		$("#generalheading").html("Loading...");
		$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			
var dataString = '&idofversion='+ e;
$.ajax({
type: "POST",
url: "joininglist.php",
data: dataString,
cache: false,
success: function(result){
$("#generalheading").html("Join");
		$("#generalbody").html(result);
	
}		
		});
	});
}