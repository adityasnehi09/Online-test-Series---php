$("#submitForm").click(function(){  

	$("#submitForm").attr('disabled','disabled');
$("#msg").html('<b>Processing....</b>');
$.post($("#fromData").attr("action"),$("#fromData :input").serializeArray(),function(info){
	 	$("#msg").html(info);
		$("#submitForm").removeAttr('disabled');
$.ajax({
type: "POST",
url: "checktransfersession.php",
cache: false,
success: function(result){

if(result=="ok")
{
 input.val('');

}
}
})

	})
});
$("#submitForm1").click(function(){  
	$("#submitForm1").attr('disabled','disabled');
$("#msg1").html('<b>Processing....</b>');
$.post($("#fromData1").attr("action"),$("#fromData1 :input").serializeArray(),function(info){
	 	$("#msg1").html(info);
		$("#submitForm1").removeAttr('disabled');
	})
});
$("#submitForm2").click(function(){  
	$("#submitForm2").attr('disabled','disabled');
$("#msg2").html('<b>Processing....</b>');
$.post($("#fromData2").attr("action"),$("#fromData2 :input").serializeArray(),function(info){
	 	$("#msg2").html(info);
		$("#submitForm2").removeAttr('disabled');
	})
});
$("#fromData").submit( function(){
	return false;
});
$("#fromData1").submit( function(){
	return false;
});
$("#fromData2").submit( function(){
	return false;
});
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

 
$("#valNUM").keyup(function() {
  this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
});

$("#valNUM").keypress(function() {
  this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
});


function showplacement(datas,id){ 
	var data1 = "id="+datas;
	 $("#"+id).val("Searching...");
	$.ajax({
                type: 'POST',
                url:  "showplacement.php",
                data: data1,
                success: function(mes) {
                   $("#"+id).val(mes);
                },
               
            });
	
}


function showplacements(datas,id){ 
	var data1 = "id="+datas;
	 $("#"+id).val("Searching...");
	$.ajax({
                type: 'POST',
                url:  "showplacements.php",
                data: data1,
                success: function(mes) {
                   $("#"+id).val(mes);
                },
               
            });
	
}




function uploadgroup(){

/*var file = document.getElementById("files").files[0];
var files = document.getElementById("zipss").files[0];
var filed = document.getElementById("zipsss").files[0];*/
var fname    = document.getElementById("fname").value;
var lname    = document.getElementById("lname").value;
var password = document.getElementById("password").value;
var email    = document.getElementById("email").value;
var contact  = document.getElementById("contact").value;
var currency = document.getElementById("currency").value;
var billing  = document.getElementById("billing").value;
/*var zip      = document.getElementById("zip").value; 
var username = document.getElementById("username").value;
*/


	 var formdate = new FormData(); 
/*formdate.append("file",file); 
formdate.append("files",files); 
formdate.append("filed",filed);*/ 
formdate.append("fname",fname);
formdate.append("lname",lname);
formdate.append("password",password);
formdate.append("email",email);
formdate.append("contact",contact);
formdate.append("currency",currency);
formdate.append("billing",billing);
/*formdate.append("zip",zip);
formdate.append("username",username); 
	*/
	
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("result").innerHTML=xmlhttp.responseText; 
                          $.ajax({
				type: "POST",
				url: "checksession.php",
				cache: false,
				success: function(result){
						if(result==1)
{
window.location="signin.php";
}
				}
			})
    }
  }
xmlhttp.open("POST","action_addmemeber.php"); 
xmlhttp.send(formdate); 
document.getElementById("result").innerHTML='<b>Processing....</b>'; 


}

 

function UpdateInfo(){ 

var fname    = document.getElementById("name").value;
var ids    = document.getElementById("ids").value; 
var email    = document.getElementById("email").value;
var password_input  = document.getElementById("password_input").value; 
var contact  = document.getElementById("contact").value; 
 

var formdate = new FormData(); 

formdate.append("fname",fname);
formdate.append("email",email);
formdate.append("contact",contact);
formdate.append("password",password_input);
formdate.append("id",ids); 
	
	
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("msg").innerHTML=xmlhttp.responseText; 
    }
  }
xmlhttp.open("POST","action_update.php"); 
xmlhttp.send(formdate); 
document.getElementById("msg").innerHTML='<b>Processing....</b>'; 


}
 
 