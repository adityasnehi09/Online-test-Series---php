<?php 
//chacked security k1
session_start();
require_once("welcome.php");
?>
<?php require_once("start_html_head.php"); ?>
				<title>Change Name - IndoTufan</title>
				<meta name="description" content="You can change your name anytime here but note that after changing the name, you will lost your balance and you will also rejected from allcompetition in which you have joined">
				<meta name="keywords" content="nightbird,change name,how to change your name ,name change,changing your name ,legal name change,change of name ,name change process ,online competition,competition platform">
				<script>
				function conformchangename()
				{
					$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					var getname=$("#getname").val();
					var password=$("#password").val();
					var dataString = '&getname='+getname +'&password='+password ;
					$.ajax({
						type: "POST",
						data: dataString,
						url: "conformchangename.php",
						cache: false,
						success: function(result){
							$("#general").modal('show');
							$("#generalbody").html(result);
							$("#generalheading").html("Name changing status");
						$("#myButton").removeClass("disabled");
						$("#msg1").html(" ");
						$("#password").val("");
						}
					})
				}
				function pleaseconformnamechange()
				{
				$("#myButton").addClass("disabled");
					$("#msg1").html(" Loading...");
					$("#generalfoot").hide();
					$.ajax({
						type: "GET",
						url: "pleaseconformnamechange.php",
						cache: false,
						success: function(result){
							$("#general").modal('show');
							$("#generalbody").html(result);
							$("#generalheading").html("Conform Your Request");
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
			<h2 style='color:white'><b>Change your Name<b></h2>
			  		  </p>
		</div>
  <!-- Nav tabs -->
  <div class="container">
</div>
</div>
  <!-- Tab panes -->
  <div class="container">
  <div class="row">
  <div class="col-md-8"style="margin-top:15px">
    <div class="form-group"> 
			  <div style="">
			  <br>
			 <label for="getname">New Name</label>
			<input type="text"name="getname"id="getname"class="form-control"style="width:100%;height:40px;margin-bottom:10px;"placeholder="Enter New Name"/>
			<label for="password">For your security, you must re-enter your password </label>
			<input type="password"name="password"id="password"class="form-control"style="width:100%;height:40px;margin-bottom:10px;"placeholder="Enter Your password"/>
		<button value="Change Password"class="btn btn-success"onclick="pleaseconformnamechange()" id="myButton">change Name</button><span id="msg1"></span>
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
						</div>
				</div>
			<?php include_once("footer0pad.php"); ?>
		</body>
</html>