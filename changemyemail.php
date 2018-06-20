<?php 
//chacked security k1
session_start();
require_once("welcome.php");
?>
<?php require_once("start_html_head.php"); ?>
				<title>Change Email - IndoTufan</title>
			<meta name="description" content="You can change your email anytime here but you have to confirm your email by email verification method.">
				<meta name="keywords" content="nightbird,my email ,change email address ,change email,how to change your email ,email change,changing your email ,change,change of email ,email change process ,online competition,competition platform">
				<script>
				function verifiedemailstep2()
				{
					$('#general').modal({
			backdrop: 'static',
			keyboard: false
			})
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
						$("#pass").val("");
						}
					})
				}
				function verifymyemail()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					var newemail=$("#newemail").val();
					var pass=$("#pass").val();
					var dataString = '&newemail='+newemail +'&pass='+pass ;
					$.ajax({
						type: "GET",
						data: dataString,
						url: "verifymynewemail.php",
						cache: false,
						success: function(result){
							if(result==0)
							{
								$("#generalheading").html("Processing Failed, Try again");
								$("#msg1").html("Processing Failed, Try again");
							}
							else if(result==2)
							{
								$("#generalheading").html("Validation Error");
								$("#generalbody").html("Please Enter Valid Email Id");
								$("#msg1").html("Please Enter Valid Email Id");
							}
							else if(result==3)
							{
								$("#generalheading").html("Wrong Password");
								$("#generalbody").html("The password that you've entered is incorrect.");
								$("#msg1").html("The password that you've entered is incorrect");
							}
							else
							{
								$("#generalheading").html("Enter verification code");
								$("#generalbody").html(result);
								$("#msg1").html(" ");
								$('#general').modal({
			backdrop: 'static',
			keyboard: false
			})
								$("#general").modal('show');
							}
						$("#myButton").removeClass("disabled");
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
</div>
  <!-- Tab panes -->
  <div class="container">
  <div class="row">
  <div class="col-md-8"style="margin-top:15px">
    <div class="form-group"> 
			  <div style="">
			  <br>
			 <label for="newemail">Enter new Email</label>
			<input type="email"name="newemail"id="newemail"class="form-control"style="width:100%;height:40px;margin-bottom:10px;border:1px solid gray"placeholder="Enter New Email"/>
			<label for="pass">For your security, you must re-enter your password</label>
			<input type="password"name="pass"id="pass"class="form-control"style="width:100%;height:40px;margin-bottom:10px;border:1px solid gray"placeholder="Password"/>
		<button class="btn btn-success"onclick="verifymyemail()" id="myButton">change Email</button>
		<p style="color:red"><span id="msg1"></span><p>
			</div>
			</div>
  </div>
   <div class="col-md-4"style="margin-top:25px">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2256342899303187"
     data-ad-slot="8242106756"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2256342899303187"
     data-ad-slot="8242106756"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
 </div>
  </div>
  </div>
</div>
			</div>
						</div>
				</div>
				<?php include_once("footer0pad.php"); ?>
		</body>
</html>