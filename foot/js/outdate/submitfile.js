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
