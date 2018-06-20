<?php
session_start();
require_once("../welcome.php");
$posted = array();

$posted['surl']="http://nightbird.in/pay/addmembersuccess.php";
$posted['furl']="http://nightbird.in/pay/addmemberfail.php";
$posted['Curl']="http://nightbird.in/pay/addmembercancel.php";
$posted['amount']=$_SESSION['fee'];
$posted['productinfo']="Participation Fee";


$posted['firstname']=$_SESSION['nameX'];
$posted['email']=mysql_real_escape_string($_SESSION['emailX']);
$posted['phone']=mysql_real_escape_string($_SESSION['mobile_noX']);
$posted['udf1']=$_SESSION['user_idX'];
$posted['udf2']=$_SESSION['uidperson'];
$posted['udf3']=$_SESSION['email_reg'];
$posted['key']="ZXGFJpZZ";//

$posted['service_provider']="payu_paisa";

if(!isset($_SESSION['logintemp']))
{
	header("location: http://nightbird.in");
}
else{
	
// Merchant key here as provided by Payu
$MERCHANT_KEY = "ZXGFJpZZ";

// Merchant Salt as provided by Payu
$SALT = "mvkxXp8Raf";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';


if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

  $posted['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$txnid=$posted['txnid'];
$hash = '';

// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email']) 
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <h2>Redirecting to secure payment...</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
        
        </tr>
        <tr>
         
          <td><input type="hidden"name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          
          <td><input type="hidden"name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
        
          <td><input type="hidden"name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
        
          <td><input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          
          <td colspan="3"><input type="hidden" name="productinfo"value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"></td>
        </tr>
        <tr>

          <td colspan="3"><input type="hidden"name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
         
          <td colspan="3"><input type="hidden"name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
        
          <td><input type="hidden"name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
        
          <td><input type="hidden"name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
          <td><input type="hidden"name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
        </tr>
      
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="hidden" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php } ?>