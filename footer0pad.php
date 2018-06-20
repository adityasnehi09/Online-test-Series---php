<?php include_once("model.php");  ?>
	

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=665795673576992";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5890c0750027be0a6e23e3af/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	<?php include_once("google.php");	?>
<style>
#footdiv a{
	margin-top:20px;
}
</style>

<div style="height:30px;width:100%;background-color:#162630">
<div class="container">
<div class="row"style='color:white'>

<div class="col-xs-10"></div>
<div class="col-xs-2">
<a href="#come_here_from_last"><div style="width:40px;height:30px;background-color:white;"class='pull-right'>
<center><i class="glyphicon glyphicon-chevron-up"style='color:blue;margin:8px'id="bottom_to_top"></i></center>
</div></a>
</div>
</div>
</div>
</div>
<footer class="foot"style="bottom:0px;background-color:#002D3C">




<div class="container">
<div class="row">
<div class="col-md-4">
<h2 style="color:white">Stream</h2>
<a href="gate?type=cs">Computer Science</a><br>
<a href="gate?type=ec">Electronics Engg</a><br>
<a href="gate?type=ee">Electrical Engg</a><br>
<a href="gate?type=ce">Civil Engg</a><br>
<a href="gate?type=me">Mechanical Engg</a><br>
<a href="gate?type=ma">Engineering Mathematics</a><br>
<a href="gate?type=General_Aptitude">General Aptitude</a><br>
<h2 style="color:white">Quick Links</h2>
<?php
if(isset($_SESSION['emailX']))
{
	?>
	<a href="logout.php"target="_blank">Logout .</a>
	<?php
}else{
	?>
	<a href="sign-up.php"target="_blank">Sign Up .</a>
   <a href="loginForm.php"target="_blank">Log In .</a>
	<?php
}
?>

<a href="privacy.php"target="_blank">Privacy .</a>
<a href="terms.php"target="_blank">Terms .</a>
<a href="http://m.me/IndoTufan"target="_blank">Help .</a>
<a href="contact"target="_blank">Contact</a><br><br>
<h2 style="color:white">Invite Your Friends</h2>
<form action="invite.php"method="get"target="_blank">
<?php if(!isset($_SESSION['logintemp'])){?>
<input type="text" class="form-control" placeholder="Your Name"name="mynameis"style="margin-bottom:10px;">
<?php } ?>
    <div class="input-group">
     
      <input type="text" class="form-control" placeholder="Email"name="email_invite">
      <span class="input-group-btn">
	   
	 
        <input type="submit"class="btn btn-success" type="button"value="Invite"name="">
      </span>
    </div><!-- /input-group -->
 </form>

</div>
<div class="col-md-4"id="footdiv">

<h2 style="color:white">Contact Us</h2>
<p>Through <a href="contact.php">Contact Form</a><br>
Email: contact@indotufan.com<br>

Facebook
<div class="fb-page" data-href="https://www.facebook.com/IndoTufan/" data-tabs="timeline" data-width="300" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/IndoTufan/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/IndoTufan/">IndoTufan</a></blockquote></div>
</p>

 <br><br>
<a href="https://www.paypal.me/IndoTufan"><img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_donate_cc_147x47.png" alt="Donate"></a>
</div>
<div class="col-md-4">
<div style="background-color:white;padding:10px;margin-top:20px">
<b>Founder and CEO</b> <br>
Aditya Snehi<br>
Email : aditya.snehi@indotufan.com<br>
<div class="fb-follow" data-href="https://www.facebook.com/ad.snehi" data-layout="button_count" data-size="small" data-show-faces="true"></div>
<hr>
<b>COO</b> <br>
Priyadarshan Kumar<br>
Email : priyadarshan@indotufan.com<br>
<br>
</div><br>
 <b style="color:white">Change Language</b>
 
 <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'hi', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, multilanguagePage: true, gaTrack: true, gaId: 'UA-80422430-1'}, 'google_translate_element');
}

</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	<!-- small --><br>
	<a href="http://www.freepik.com/free-photos-vectors/business"target="_blank">Business vector designed by Freepik</a><br>
   

</div>
</div>
<h3 style='color:white'>Our sister website : <a href="https://nightbird.in">NightBird Online Competition Platform</a></h3>
</div>
 <div class="footinfo">
<div class="container">
<div class="row">
<div class="col-sm-6">

            <span class=""style="background-color: rgb(12, 25, 47);"><a href="http://www.dmca.com/Protection/Status.aspx?ID=5d936f3d-b4f1-41d6-98e3-0547afa67f25" title="DMCA.com Protection Status" class="dmca-badge"> <img src="http://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=5d936f3d-b4f1-41d6-98e3-0547afa67f25" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></span></p>
</div>
<div class="col-sn-6">
  		 <span class="pull-right"style="color:white;font-weight:bold">IndoTufan &copy; 2016, Developed by <a href="https://www.facebook.com/ad.snehi" target="_blank">Aditya Snehi</a></span>
           <!-- <p><span class="pull-right"style="background-color: rgb(12, 25, 47);">Website developed by <a href="https://www.facebook.com/profile.php?id=100009774579152"target="_blank">Aditya Snehi</a></span> -->
</div>
</div>
    </div>
    </div>
  
  
</footer>
<link href="css/font.css"rel="stylesheet" > 
		<link href="ionicons/css/ionicons.min.css"rel="stylesheet" >
		<link href="css/animate.min.css" rel="stylesheet">

	
		<script src="js/jquery.isotope.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/wow.min.js"></script>