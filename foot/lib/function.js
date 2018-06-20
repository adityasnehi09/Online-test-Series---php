function deleteid(x)
{
	var data1 = "id="+x;
   $("#myModal").modal('show');
   $("#modaltitle").html("Loading");
	$.ajax({
                type: 'GET',
                url:  "confirmdeleteid.php",
                data: data1,
                success: function(mes) {
					
                   $("#modaltitle").html("Confirmation");
                   $("#modalbody").html(mes);
                },
               
            });
	
}
function confirmed_delete(x)
{
	
	var data1 = "id="+x;
   //$("#myModal").modal('show');
   $("#modaltitle").html("Loading");
	$.ajax({
                type: 'GET',
                url:  "finaldeletemember.php",
                data: data1,
                success: function(mes) {
                   $("#modaltitle").html(mes);
                   $("#modalbody").html(mes);
                  if(mes=='Deleted') {$(".row_"+x).hide('10');}
                },
               
            });
}