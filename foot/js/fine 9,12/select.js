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