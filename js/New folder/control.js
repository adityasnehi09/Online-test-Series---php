//join in comp
function notibox(){
	
			$(document).ready(function(){
			$("#smallnotisignal").hide();
			$("#successnotificationbox").show(100);
			});
			}
function changemyemail()
{
		
		$(document).ready(function(){
			$("#emailconformationheading").html("Loading");
			$("#conformationemail_body").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
			$.ajax({
				type: "POST",
				url: "newemail.php",
				cache: false,
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
				cache: false,
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
			cache: false,
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
		               	cache: false,
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
			cache: false,
			success: function(result){
			if(result==1)
			{
				$("#emailconformationheading").html("");
				$("#conformationemail_body").html("<center><b style='color:green'>You have successfully conformed your email Id</b><p>please reload the page<br><a href=''>Reload</a></p>");		
				$("#alertforconformemail").hide(700);	
			}
			else if(result==0)
			{
				$("#messageinconformationemail").html("<b style='color:red'>Conformation code does not match</b>");
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
			cache: false,
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

//control

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
//like comment

function loginfirst(){
	 $(document).ready(function(){
		 $("#smallnotisignal").hide();
         $("#successnotificationbox").show(100);
		 $("#successnotification").html("<span style='color:red'>Please Login</span>");
	});

}
function postcomment(makeid,fileid,myname,mycrop_pic,mycrop_privacy)
{
	
	$(document).ready(function(){
	var commentsource=$("#commentsource"+makeid).val();
	var displaycomment=$("#displaycomment"+makeid).val();
	if(commentsource=="" || commentsource==" "){
		alert("You have not written anything in comment Box");
	}else{
	if(mycrop_privacy=="only_me"){mycrop_pic="default.jpg";} 
	
	$("#displaycomment"+makeid).val("<p style='border-bottom:0.5px solid white;border-radius:5px;padding:5px;margin:5px;'><a href='profile.php'><img src='upload_images/crop/"+mycrop_pic+"'height='20'></a>&nbsp;&nbsp;<a href='profile.php'>"+myname+"</a>&nbsp; &nbsp;"+commentsource+"<br><small><span>Just Now</span></small></p>"+displaycomment);
	$("#displaycomment"+makeid).html("<p style='border-bottom:0.5px solid white;border-radius:5px;padding:5px;margin:5px;'><a href='profile.php'><img src='upload_images/crop/"+mycrop_pic+"'height='20'></a>&nbsp;&nbsp;<a href='profile.php'>"+myname+"</a>&nbsp; &nbsp;"+commentsource+"<br><small><span>Just Now</span></small></p>"+displaycomment);

		$("#commentsource"+makeid).val('');
	var dataString = '&commentsource='+ commentsource+'&fileid='+fileid +'&mycrop_pic='+mycrop_pic ;
		$.ajax({
type: "POST",
url: "postcomment.php",
data: dataString,
cache: false,
success: function(result){
	if(result!=1){
	alert(result);
	}
}
	})
	}
	})
}
function displaysomecomment(makeid,fileid,ucost)
{
 $("#displaycomment"+makeid).html("<center>Loading</center>");
	
	var dataString ='&fileid='+fileid +'&ucost='+ucost ;
		$.ajax({
type: "POST",
url: "displaycomment.php",
data: dataString,
cache: false,
success: function(result){
	$("#displaycomment"+makeid).html(result);

}

		})
}












function follow(cost_id,myid,cost_name){

	$("#follow"+cost_id).hide(10);
		var dataString = '&cost_id='+ cost_id+'&myid='+myid+'&cost_name='+cost_name;
		$.ajax({
type: "POST",
url: "follow.php",
data: dataString,
cache: false,
success: function(result){
	alert(result);
}
		})
}
	
function changelikestatus(totalnooflikes,idoflikebutton,like_status,file_id,uid_cost_master)
{
	$(document).ready(function(){
	  	if(like_status==0){
	
			
		
		$("#unlike"+idoflikebutton).html("<span>"+totalnooflikes+" &nbsp; <i class='glyphicon glyphicon-ok'></i> Liked </span>");


		   var dataString = '&newlike='+ totalnooflikes+'&file_id='+file_id +'&uid_cost_master='+ uid_cost_master;
		   $.ajax({
           type: "POST",
           url: "increaselike.php",
           data: dataString,
           cache: false,
           success: function(result){
	
		
	}
	
	})
}
	})
}
//music

 function playaudiosong(playid,song_source){
// Create a new instance of an audio object and adjust some of its properties

var audio = new Audio();
audio.src = 'audio_upload/'+song_source;
audio.controls = true;
audio.loop = true;
audio.autoplay = true;
$(document).ready(function(){
	$("#upstart").css("padding-top","40px");
	$("#headinfo").css("padding-top","40px");
	$(".maintwo").css("margin-top","40px");
	$(".playbutton").click(function(){
		audio.src='audio_upload/'+$(this).attr('value');
		var dataString = '&currentsource='+ song_source;
	})
})
// Establish all variables that your Analyser will use
var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height;
// Initialize the MP3 player after the page loads all of its HTML into the window
	document.getElementById('audio_box').appendChild(audio);
	context = new webkitAudioContext(); // AudioContext object instance
	analyser = context.createAnalyser(); // AnalyserNode method
	canvas = document.getElementById('analyser_render');
	ctx = canvas.getContext('2d');
	// Re-route audio playback into the processing graph of the AudioContext
	source = context.createMediaElementSource(audio); 
	source.connect(analyser);
	analyser.connect(context.destination);
	frameLooper();
// frameLooper() animates any style of graphics you wish to the audio frequency
// Looping at the default frame rate that the browser provides(approx. 60 FPS)
function frameLooper(){
	window.webkitRequestAnimationFrame(frameLooper);
	fbc_array = new Uint8Array(analyser.frequencyBinCount);
	analyser.getByteFrequencyData(fbc_array);
	ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
	ctx.fillStyle = '#00CCFF'; // Color of the bars
	bars = 100;
	for (var i = 0; i < bars; i++) {
		bar_x = i * 3;
		bar_width = 2;
		bar_height = -(fbc_array[i] / 2);
		//  fillRect( x, y, width, height ) // Explanation of the parameters below
		ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
	}
}
}
		function checkpriviousaudiosong(playid,song_source)
	{
		$.ajax({
type: "POST",
url: "checksession.php",
cache: false,
success: function(result3){
		var priviousid=result3;	
		var dataString = '&song_source='+ song_source+'&playid='+playid;
		$.ajax({
type: "POST",
url: "createaudiosession.php",
data: dataString,
cache: false,
success: function(result){
		if(result==0)
		{
			$("#"+playid).html("<p style='cursor:pointer;color:#428bca;'>Now Playing | Restart</p>");
			playaudiosong(playid,song_source);
		}else if(result==21){
		}
		else if(result==31){
$("#"+priviousid).html("<i class='glyphicon glyphicon-play playbutton'style='font-size:29px;cursor:pointer;padding:20px;'></i>");
						$("#"+playid).html("<span style='cursor:pointer;color:#428bca;'>Now Playing | Restart</span>");
		}
	}
		})
		}
		});
}

//script


$(document).ready(function(){/* jQuery toggle layout */
$('#btnToggle').click(function(){
  if ($(this).hasClass('on')) {
    $('#main .col-md-6').addClass('col-md-4').removeClass('col-md-6');
    $(this).removeClass('on');
  }
  else {
    $('#main .col-md-4').addClass('col-md-6').removeClass('col-md-4');
    $(this).addClass('on');
  }
});
});

//select 

function selectcomptype()
{
	var typecomp=$("#comptype").val();
	if(typecomp!=""){
	$("#both_time_line").html("<center><p style='color:white'>Loading...</p></center>");
	var dataString = '&comptype='+ typecomp;
		   $.ajax({
           type: "POST",
           url: "displaypostbycat.php",
           data: dataString,
           cache: false,
           success: function(result){
			   $("#both_time_line").html(result);

		   }
		   })
		   
	}else{
		$("#both_time_line").html("<center><p style='color:white'>Loading...</p></center>");
	
		   $.ajax({
           type: "POST",
           url: "displaypostall.php",
           cache: false,
           success: function(result){
			   $("#both_time_line").html(result);

		   }
		   })
	}
}

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
//alert("h");
    }
};
/* function showusershortdata(e){
		
	$(document).ready(function(){
		$("#"+e).show();
	
	})
} */

function hideusershortdata(e){
		
	$(document).ready(function(){
		$("#"+e).hide(100);
	
	})
}
//submit file

function submitvideolink(comp_uid,video_id)
{
        var regexp = new RegExp("^http(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?");
        var url = $("#"+video_id).val();
		
        if (!regexp.test(url)) {
				$("#successnotification").html("<b style='color:red;'>Invalid URL : - Please Enter Valid URL</b>");
            notibox();
        } else {
           $("#successnotification").html("<b>Loading... Please wait !</b>");
            notibox();
		   var dataString = '&comp_uid='+ comp_uid + '&video_url='+url;
          $.ajax({
          type: "POST",
          url: "submitvideolink.php",
          data: dataString,
          cache: false,
          success: function(result){
           $("#successnotification").html("<b>"+result+"</b>");
            notibox();
	
            }		
		});
		   
		   
		   
		   
		   
        }
    
}
function submitvideolink_couple(comp_uid,video_id,cuid,r_f)
{
        var regexp = new RegExp("^http(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?");
        var url = $("#"+video_id).val();
		
        if (!regexp.test(url)) {
				$("#successnotification").html("<b style='color:red;'>Invalid URL : - Please Enter Valid URL</b>");
            notibox();
        } else {
           $("#successnotification").html("<b>Loading... Please wait !</b>");
            notibox();
		   var dataString = '&comp_uid='+ comp_uid + '&video_url='+url +'&cuid='+ cuid +'&r_f='+r_f;
          $.ajax({
          type: "POST",
          url: "submitvideolink_couple.php",
          data: dataString,
          cache: false,
          success: function(result){
           $("#successnotification").html("<b>"+result+"</b>");
            notibox();
	
            }		
		});
		   
		   
		   
		   
		   
        }
    
}
function getversiondetail(e)
{
		$(document).ready(function(){
		$("#generalheading").html("Loading...");
		$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
		var dataString = '&idofversion='+ e;
$.ajax({
type: "POST",
url: "getversiondetail.php",
data: dataString,
cache: false,
success: function(result){
$("#generalheading").html("");
		$("#generalbody").html(result);
	
}		
		});
		
		})
}
function getcompetitiondetail(e,e_version)
{
	$(document).ready(function(){
		$("#generalheading").html("Loading...");
		$("#generalbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
		var dataString = '&idofcomp='+ e +'&idofversion='+ e_version;
$.ajax({
type: "POST",
url: "getcompetitiondetail.php",
data: dataString,
cache: false,
success: function(result){
$("#generalheading").hide();
$(".generalheadbox").hide();
		$("#generalbody").html(result);
	
}		
		});
		
		})
}
//uplod audio


 
function changefile(u_c,file_css_id) {
	$("#successnotification").html("starting...");
	$("#successnotificationbox").show(100);
	 $("#smallnotisignal").hide();
	var x = document.getElementById(file_css_id);
var txt = "";
    if (x.files.length == 0) {
        txt = "<b style='color:red'>Please Select a Audio file</b>";
    } else {
	
        for (var i = 0; i < x.files.length; i++) {

            var file = x.files[i];
           if ('name' in file) {
              

				var fileExt = file.name.split('.').pop();
				if(fileExt=="MP3" || fileExt=="mp3" ||fileExt=="m4a" || fileExt=="M4A")
				{
					
				}
				else{
					 txt=" <b style='color:red;font-size:19px;'>Invalid format</b>";
				}
            }
            if ('size' in file) {
				
				if(file.size > 20971500){
					
                txt=" <b style='color:red;font-size:19px;'>The size of file must be less then 20 MB </b>";
            }

            }
        }
    
}

	$(document).ready(function(){
if(txt==""){txt=" <b style='color:white;font-size:19px;'>Please Wait...</b>";
var formdata = new FormData();
	formdata.append("audiofile", file);
	formdata.append("uid_comp", u_c);
	$("#successnotification").html("Please Wait...");
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "uploadaudio.php");
	ajax.send(formdata);
$("#generalcropheading").html("Loading ... ");

}
else{
	$("#successnotification").html(txt);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	$("#successnotification").html("<h4>Uploaded "+ Math.round(percent )+" % ,Please wait...</h4>");
	
}
function completeHandler(event){
	$("#successnotification").html("<b style='color:white'>"+event.target.responseText+"</b>");
	$("#progressBar").value = 0;
}
function errorHandler(event){
	$("#successnotification").html("<b style='color:red'>Upload Failed</b>");
}
function abortHandler(event){
	$("#successnotification").html("<b style='color:red'>Upload Aborted</b>");
} 

  
	})
  
  
  
  

  
  
}
//upload images


 
function previewFile() {
	$("#generalcropheading").html("Crop Image");
	$("#generalcropbody").html("<center><img src='img/fancybox_loading@2x.gif'class='img'></center>");
	$("#successnotificationbox").show(100);
	 $("#smallnotisignal").hide();
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


	$(document).ready(function(){
		$("#img_upload_section").hide();
if(txt==""){
	alert();
	txt=" <b style='color:green;font-size:19px;'>Please Wait...</b>";
var formdata = new FormData();
	formdata.append("imageupload", file);
	$("#successnotification").html("starting...");
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "uploadimage.php");
	ajax.send(formdata);
	
$("#cropboxsnehi").show(100);
$("#generalcropheading").html("Loading ... ");

}
else{
	$("#successnotification").html(txt);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	$("#successnotification").html("<h4 class='white-color'>Uploaded "+ Math.round(percent )+" % ,Please wait...</h4>");
	
}
function completeHandler(event){
	$("#successnotification").html("<b class='white-color'>"+event.target.responseText+"</b>");
	$("#progressBar").value = 0;
$("#successnotificationbox").hide(100);
	 $("#smallnotisignal").show();
$.ajax({
type: "POST",
url: "crop.php",

cache: false,
success: function(result){
	$("#generalcropheading").html("Crop Image");
	$("#generalcropbody").html(result);
}
})

}
function errorHandler(event){
	$("#successnotification").html("<b class='red-color'>Upload Failed</b>");
}
function abortHandler(event){
	$("#successnotification").html("<b class='red-color'>Upload Aborted</b>");
} 

  
	})
}
