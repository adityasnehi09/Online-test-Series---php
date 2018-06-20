
function change_page(page_id){   

	
	
     var dataString = 'page_id='+ page_id;
	  $("#postofmember").html("Loading...");
     $.ajax({
           type: "POST",
           url: "suggestion.php",
           data: dataString,
           cache: true,
           success: function(result){
           
			     $("#postofmember").html(result);
           }
      });
}

function long_page(page_id){   

     var dataString = 'page_id='+ page_id;
	 $("#loadsug").show();
     $.ajax({
           type: "POST",
           url: "suggestion2.php",
           data: dataString,
           cache: true,
           success: function(result){
			 
            $(".view"+page_id).hide();
            $("#loadsug").hide();
			     $(result).appendTo($('#postofmember'));
           }
      });
}

		
		function parallax()
		{
		
			var an1=document.getElementById('an1');
			var an2=document.getElementById('an2');
			an1.style.bottom=3*window.pageYOffset+'px';
			an2.style.bottom=2*window.pageYOffset+'px';
		}
		window.addEventListener("scroll",parallax,false);
		function changeposttype()
		{
			$("#postofmember").html("<center style='color:white;'><b>Loading...</b></center>");
			var comptype=$("#comptype").val();
			var e=$("#posttype").val();
			if(comptype=='')
			{
				if(e=='new')
				{
				$.ajax({
				url: "new.php",
				success: function(result){
				$("#postofmember").html(result);

				}
				})
				}
				else if(e=='rec')
				{
				$.ajax({
				url: "suggestion.php",
				success: function(result){
				$("#postofmember").html(result);

				}
				})
				}
			}
			else
			{
				if(e=='new')
				{	
					var dataString ="&comptype="+comptype;		
					$.ajax({
					type: "POST",
					url: "newpostbycat.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#postofmember").html(result);
                    }
					})
				}
				else if(e=='rec')
				{
					var dataString ="&comptype="+comptype;		
					$.ajax({
					type: "POST",
					url: "recpostbycat.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#postofmember").html(result);
                    }
					})
					
				}
					
				
				
				
			}
			
		}
	function searchsomeone()
	{
		
		var searchtext=$("#searchtext").val();
		var searchcategory=$("#searchcategory").val();
		if(searchcategory=='u')
		{
			$("#generalheading").html("Search results of users");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchsomeone.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
		else{
			$("#generalheading").html("Search results of Competitions");
		var dataString ="&searchtext="+searchtext;
					$.ajax({
					type: "GET",
					url: "searchcomp.php",
					data: dataString,
					cache: true,
					success: function(result){
					$("#generalbody").html(result);
                    }
					})
		}
		
	}
	function startexam(exam_id)
		{
			var dataString ="&exam_id="+exam_id;
			
			
		$("#generalheading").html("PLease Wait");
		$("#generalbody").html("<b>loading...</b>");
		$("#general").modal('show');
	
			$.ajax({
			type: "POST",
			url: "startexam_verify.php",
			data: dataString,
			cache: true,
			success: function(result){
			$("#generalheading").html("Read instruction and press continue");
			$("#generalbody").html(result);
			}
			})
		}
		function change_page(page_id){   

	
	
     var dataString = 'page_id='+ page_id;
	  $("#postofmember").html("Loading...");
     $.ajax({
           type: "POST",
           url: "suggestion.php",
           data: dataString,
           cache: true,
           success: function(result){
           
			     $("#postofmember").html(result);
           }
      });
}

	
	