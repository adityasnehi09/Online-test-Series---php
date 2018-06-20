<?php 
//chacked security k1
?>
  <?php include_once("model.php"); 
  require_once("loginrequired.php");
  ?>
<div class="container" >
   <div class="row">
  <div class="col-lg-12">


  
  
   <?php if($_SESSION['conform_email']==0){ ?>
   <br>
  <div class="alert alert-info"id="alertforconformemail">
  <strong>Need Email Verification!</strong>  <b><span class="flashit"> <a href="#emailVerification" role="button" data-toggle="modal">Click here</a></span></b> to Verify your Email Id 
   </div><?php } ?>
      <?php if($_SESSION['conform_mobile_no']==0){ ?>
<div class="alert alert-info">
<br>
  <strong>Need Mobile Number Verification!</strong>  <b><a href="#"class="flashit"onclick="verifymyemail()">Click here</a></b> to Verify your Mobile Number
	  </div><?php } ?>
  </div>
  </div><!--/row-->  
<div>
<?php
if($_SESSION['imagepic']=='0')
{
?>
 <div class="alert alert-info"id="alertforconformemail"style="margin-top:10px">
  <strong>Please upload your real visible image</strong><br>We will not share your real image with anyone without your permission <br><b>Note : </b> This image helps us in the verification of your identity.
  <center>
  
  <i><b><p id="message"style="color:white;font-size:19px;"class="flashit"></p></b></i>
<form method="post"enctype="multipart/form-data">
<label for="imageupload"class="btn btn-success"id="imageuploadlabel">
Upload Image
</label> 

<input type="file"name="imageupload"id="imageupload"style="display:none;"accept="image/*"onchange="previewFile()"/>

<br>
<select>
<option>iuhu</option>
<option></option>
<option></option>


</select>
</form>
  </center>
  

   </div>

<?php }  ?>
</li> 
</div>
	   </div>
	