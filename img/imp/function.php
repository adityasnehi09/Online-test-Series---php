<?php
function encrypt_decrypt($action, $string) {
    $output = false;
    $key = '<<<###:::Develop By Aditya Snehi, IndoTufan keyy:::###>>>';
    // initialization vector
    $iv = md5(md5($key));
    if ($action == 'encrypt') {
        $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
        $output = rtrim($output, "");
    }
    return $output;
}
function securedata($x)
{
	return htmlspecialchars(mysql_real_escape_string($x), ENT_QUOTES, 'UTF-8');
}
function month_($x)
{
	switch($x){
		case 01: return "Jan";break;
		case 02: return "Feb";break;
		case 03: return "Mar";break;
		case 04: return "Apr";break;
		case 05: return "May";break;
		case 06: return "Jun";break;
		case 07: return "Jul";break;
		case 08: return "Aug";break;
		case 09: return "Sep";break;
		case 10: return "Oct";break;
		case 11: return "Nov";break;
		case 12: return "Dec";break;
	}
}
function time_($x)
{	
		$cd=explode(":",$x);
		$hour=$cd[0];
		$min=$cd[1];
		if($hour>12)
		{
			$am_pm="PM";
			$hour=$hour-12;
		}else{
			$am_pm="AM";
		}
		return $hour.":".$min." ".$am_pm;;
	
}
function exam_type($x)
{
	switch($x){
		case "gate_series": return "GATE AITS"; break;
		case "gate_support": return "Extra For GATE"; break;
		case "jee_main_support": return "Extra For JEE Main"; break;
		case "jee_advance_support": return "Extra For JEE Advance"; break;
		case "jee_advance_series": return "JEE Advance AITS"; break;
		case "jee_main_series": return "JEE Main AITS"; break;
	}
}
?>