
 
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
		alert("Fx");
if(txt==""){txt=" <b style='color:green;font-size:19px;'>Please Wait...</b>";
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
	$("#successnotification").html("<h4>Uploaded "+ Math.round(percent )+" % ,Please wait...</h4>");
	
}
function completeHandler(event){
	$("#successnotification").html(event.target.responseText);
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
	$("#successnotification").html("Upload Failed");
}
function abortHandler(event){
	$("#successnotification").html("Upload Aborted");
} 

  
	})
  
  
  
  

  
  
}