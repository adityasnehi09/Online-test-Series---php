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