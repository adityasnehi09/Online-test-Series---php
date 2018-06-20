<?php 
//chacked security k1
session_start();
require_once("welcome.php");
?>
<?php require_once("start_html_head.php"); ?>
				<title>Change Profile Picture - IndoTufan</title>
					<meta name="description" content="You can change your profile picture here any time, Your prifile picture is visible to all public, Dont't upload your real image as profile picture if you don't want to share your real image to public.">
				<meta name="keywords" content="IndoTufan,profile picture,profile photo,edit my photo,photo change,add profile picture ,profile images ,my profile picture ,change email address ,change profile picture,how to change your profile picture ,profile pic change,changing your profile picture ,change,change of profile image ,profile image change process ,online competition,competition platform">
			<script>
				function verifiedemailstep2()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					$.ajax({
						type: "GET",
						url: "conformchangeemail.php",
						cache: false,
						success: function(result){
							$("#general").modal('show');
							$("#generalbody").html(result);
							$("#generalheading").html("Nane changing status");
						$("#myButton").removeClass("disabled");
						$("#msg1").html(" ");
						}
					})
				}
				function verifymyemail()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					var newemail=$("#newemail").val();
					var dataString = '&newemail='+newemail ;
					$.ajax({
						type: "GET",
						data: dataString,
						url: "verifymynewemail.php",
						cache: false,
						success: function(result){
							if(result==0)
							{
								$("#generalheading").html("Processing Failed, Try again");
							}
							else if(result==2)
							{
								$("#generalheading").html("Validation Error");
								$("#generalbody").html("Please Enter Valid Email Id");
							}
							else
							{
								$("#generalheading").html("Enter verification code");
								$("#generalbody").html(result);
							}
							$("#general").modal('show');
						$("#myButton").removeClass("disabled");
						$("#msg1").html(" ");
						}
					})
				}
				</script>
		</head>
		<body>
		<?php include_once("headertop.php");?>
			<div style='background-color:white;'>
			<div style="background-color:#002D3C;padding:20px 20px 0px 20px;">
			<div class="container">
			<h2 style='color:white'><b>Change your Email Id<b></h2>
			  		  </p>
		</div>
  <!-- Nav tabs -->
  <div class="container">
</div>
</div>
  <!-- Tab panes -->
  <div class="container">
    <div class="form-group"> 
			  <div style="">
			  <br>
			 <label for="newemail">Enter new Email</label>
			<input type="email"name="newemail"id="newemail"class="form-control"style="width:100%;height:40px;margin-bottom:10px;border:1px solid gray"placeholder="Enter New Email"/>
		<button value="Change Password"class="btn btn-success"onclick="verifymyemail()" id="myButton">change Email</button><span id="msg1"></span>
			</div>
			</div>
  </div>
</div>
</div>
</div>
			</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
						</div>
				</div>
				<?php include_once("footer0pad.php"); ?>
		</body>
</html>