
 
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