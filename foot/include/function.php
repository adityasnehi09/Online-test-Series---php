<?php
require_once(__DIR__ ."/../../welcome.php");
date_default_timezone_set("Asia/Kolkata");

Global $connection;
$connection = $con;
function redirect($url) {
    return header("Location: " . $url);
}
function securedata($x)
{
	global $connection;
	return htmlspecialchars(mysqli_real_escape_string($connection,$x), ENT_QUOTES, 'UTF-8');
}

function send_nice_email($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$full_image_url,$image_status){
	
if(isset($f1)){
if(!empty($f1)){
$f1="<p style='margin-bottom:15px;color:gray;'>$f1</p>";
}else{
	$f1="";
}
}else{
	$f1="";
}
if(isset($f2)){
if(!empty($f2)){
$f2="<p>$f2</p>";
}
else{
	$f2="";
}
}else{
	$f2="";
}
if($image_status){

	$dir=dirname($_SERVER['PHP_SELF']);
	$image_here="<img src='$full_image_url' style='width:100%'/>";
}



if(isset($f4)){
if(!empty($f4)){
$f4="<p style='padding:15px;background-color:#ecf8ff;margin-bottom:15px'> $f4 </p>";
}else{
	$f4="";
}
}
else{
	$f4="";
}
if(isset($f6)){
if(!empty($f6)){
$f6="<h3 style='font-weight:200;font-size:27px;font-family:Helvetica,Arial,sans-serif;line-height:1.1;margin-bottom:15px;color:#000'> $f6</h3>";
}else{
	$f6="";
}
}else{
	$f6="";
}
if(isset($f7)){
if(!empty($f7)){
$f7="<p> $f7</p>";
}else{
	$f7="";
}
}else{
	$f7="";
}
if(isset($f9)){
if(!empty($f9)){
	if(empty($f8)){
		$f8="Click Here";
	}
$f9=" <a href='$f9'class='btn'style='text-decoration:none;color: white;background-color:rgb(29, 172, 237);padding:10px 16px;font-weight:bold;margin-right:10px;text-align:center;cursor:pointer;display: inline-block;'>$f8</a>";
}else{
	$f9="";
}
}else{
	$f9="";
}

$message="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
 <html xmlns='http://www.w3.org/1999/xhtml'> 
 <head> <meta name='viewport' content='width=device-width' />
 <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> 
 </head> <body bgcolor='#FFFFFF'style='-webkit-font-smoothing:antialiased;	-webkit-text-size-adjust:none; 	width: 100%!important; 	height: 100%;'>
 <center> <div style='max-width:600px'> 
 <table> <tr> <td></td> <td bgcolor='#FFFFFF'style='width:100%'> <div> 
 <table style='width:100%'> <tr> <td> 
 $f1 $f2 $image_here $f4 $f6 $f7 $f9 
 <br/> <br/> <table class='social' width='100%'style='background-color: #ebebeb;padding: 3px 7px;font-size:12px;margin-bottom:10px;	text-decoration:none;color: #FFF;font-weight:bold;width:100%'> 
 <tr> <td> <table align='left' class='column'style='width:30%'> <tr> <td> 
 <h3 style='color:gray'>Connect with Us:</h3> 
 <p class=''>
 <a href='$f10' class='soc-btn fb'style='display:block;	width:100%;padding: 3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color: #FFF;font-weight:bold;display:block;text-align:center; background-color: #3B5998!important;'>Facebook</a> </p>
 </td> </tr> </table> <table align='right' style='width:50%;padding:0 10px'> <tr> <td>
 <h3 style='color:gray'>Contact Info:</h3> <p style='color:black'>Phone: <strong>$f13</strong><br/> Email: <strong><a href='emailto:$f14'style='color: #2BA6CB;'>$f14</a></strong></p> </td> </tr> 
 </table> <span class='clear'></span> </td> </tr> </table> </td>
 </tr> </table> </div> </td> <td></td> </tr> </table> </div> </center> </body> </html>";
		echo $message;			
$headers = "From: ".$f23."<".$f21.">  \r\n";
								$headers .= "Reply-To: $f21 \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								if(mail($f19,$f18,$message, $headers))
									{
									return true;
								}else{
									return false;
								}


}
function escape_string($stirng) {
	global $connection;
    return mysqli_real_escape_string($connection,$stirng);
}
function display_flash($msg, $type) {
    $mes = "";
    if ($type == "S") {
        $mes = '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&#10006;</button>
        ' . $msg . '
        </div>';
    } else {
        $mes = '<div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&#10006;</button>
        ' . $msg . '
        </div>';
    }
    return $mes;
}
function Query($query) {
	global $connection;

    return mysqli_query($connection,$query);
	echo mysqli_error($connection);
}
function count_row($sql) {
    return mysqli_num_rows($sql);
}
function QueryArray($result) {
    return mysqli_fetch_array($result);
}
function INSERT($table, $arraydata) {
	global $connection;
    if (is_array($arraydata)) {
        $key = implode('`,`', array_keys($arraydata));
        $val = implode("','", array_values($arraydata));
        $query = "INSERT INTO `{$table}`(`{$key}`) VALUES ('{$val}')";
        if (mysqli_query($connection,$query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    return false;
}
function UPDATE($table, $arraydata, $where) {
	global $connection;
    if (is_array($arraydata)) {
        $quee = array();
        foreach ($arraydata as $k => $v) {
            $quee[] = "`$k`='$v'";
        }
        $val = implode(",", $quee);
        $key = array_keys($where);
        $key_val = array_values($where);
        $query = "UPDATE `{$table}` SET $val WHERE `$key[0]` = '$key_val[0]'";
        if (mysqli_query($connection,$query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    return false;
}
function DELETE($table, $where) {
	global $connection;
    if (is_array($where)) {
        $key = array_keys($where);
        $key_val = array_values($where);
        $query = "DELETE FROM `{$table}` WHERE `$key[0]` = '$key_val[0]'";
        if (mysqli_query($connection,$query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    return false;
}
function profile_info($id, $row) {
    $mysql = QueryArray(Query("SELECT * FROM `member` WHERE `id`='$id'"));
    return $mysql[$row];
}
function admin_info($id, $row) {
    $mysql = QueryArray(Query("SELECT * FROM `subadmin` WHERE `id`='$id'"));
    return $mysql[$row];
}
function admin($id, $row) {
    $mysql = QueryArray(Query("SELECT * FROM `admin` WHERE `id`='$id'"));
    return $mysql[$row];
}
function profileID($username) {
    $mysql = QueryArray(Query("SELECT * FROM `member` WHERE `email`='$username'"));
    return $mysql['id'];
}
function profileIDs($username) {
    $mysql = QueryArray(Query("SELECT * FROM `subadmin` WHERE `email`='$username'"));
    return $mysql['id'];
}
function pagenation($adjacents, $records_per_page, $page, $start, $next, $prev, $last_page, $second_last) {
    $pagination = "";
    if ($last_page > 1) {
        $pagination.= '<ul class="pagination pagination-sm">';
        if ($page > 1) $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(1);'>&laquo; First</a></li>";
        else $pagination.= '<li class="disabled"><a href="#">&laquo; First</a></li>';
        if ($page > 1) $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($prev) . ");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else $pagination.= '<li class="disabled"><a href="#">&laquo; Previous&nbsp;&nbsp;</a></li>';
        if ($last_page < 7 + ($adjacents * 2)) {
            for ($counter = 1;$counter <= $last_page;$counter++) {
                if ($counter == $page) $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                else $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($counter) . ");'>$counter</a></li>";
            }
        } elseif ($last_page > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1;$counter < 4 + ($adjacents * 2);$counter++) {
                    if ($counter == $page) $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                    else $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($counter) . ");'>$counter</a></li>";
                }
                $pagination.= '<li class="disabled"><a href="#">...</a></li>';
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($second_last) . ");'> $second_last</a></li>";
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($last_page) . ");'>$last_page</a></li>";
            } elseif ($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(1);'>1</a></li>";
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(2);'>2</a></li>";
                $pagination.= '<li class="disabled"><a href="#">...</a></li>';
                for ($counter = $page - $adjacents;$counter <= $page + $adjacents;$counter++) {
                    if ($counter == $page) $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                    else $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($counter) . ");'>$counter</a></li>";
                }
                $pagination.= '<li class="disabled"><a href="#">...</a></li>';
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($second_last) . ");'>$second_last</a></li>";
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($last_page) . ");'>$last_page</a></li>";
            } else {
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(1);'>1</a></li>";
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(2);'>2</a></li>";
                $pagination.= '<li class="disabled"><a href="#">...</a></li>';
                for ($counter = $last_page - (2 + ($adjacents * 2));$counter <= $last_page;$counter++) {
                    if ($counter == $page) $pagination.= "<li class='active'><a href='#'>$counter</a></li>";
                    else $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($counter) . ");'>$counter</a></li>";
                }
            }
        }
        if ($page < $counter - 1) $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($next) . ");'>Next &raquo;</a></li>";
        else $pagination.= '<li class="disabled"><a href="#">Next &raquo;</a></li>';
        if ($page < $last_page) $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(" . ($last_page) . ");'>Last &raquo;</a></li>";
        else $pagination.= '<li class="disabled"><a href="#">Last &raquo;</a></li>';
        $pagination.= "</ul>";
    }
    return $pagination;
}
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
function pincheckall($pin) {
    $pin_sql = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `pin` WHERE `pin`='$pin'"));
    if ($pin_sql > 0) {
        return true;
    } else {
        return false;
    }
}
function pincheck($pin) {
    $pin_sql = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `pin` WHERE `pin`='$pin' and status='U'"));
    if ($pin_sql > 0) {
        return true;
    } else {
        return false;
    }
}
function pindetails($pin, $row) {
    $pin_sql = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `pin` WHERE `pin`='$pin'"));
    return $pin_sql[$row];
}
function randomNumber($l) {
    $number = "";
    do {
        $r = mt_rand(0, $l);
        $number.= $r;
    } while (strlen($number) < $l);
    return $number;
}
function currencyAmount($dollar) {
    $mega_DR = QueryArray(Query("SELECT SUM(`balance`) as `total` FROM `member` WHERE  `currency` ='$dollar'"));
    return ($mega_DR['total'] == "") ? "0.00" : $mega_DR['total'];
}
function balance_history($id, $type) {
    if ($type == "T") {
        $sql = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`amount`) AS total FROM `balance_transfer` WHERE `uid`='$id'"));
        return $sql['total'];
    } elseif ($type == "A") {
        $sql = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`amount`) AS total FROM `balance_transfer` WHERE `uid`='$id' and `type`='$type'"));
        return $sql['total'];
    } elseif ($type == "R") {
        $sql = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`amount`) AS total FROM `balance_transfer` WHERE `uid`='$id' and `type`='$type'"));
        return $sql['total'];
    } else {
        $sql = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`amount`) AS total FROM `balance_transfer` WHERE `uid`='$id'"));
        return $sql['total'];
    }
}
function sendmail($email, $subject, $message) {
   /* require 'mail/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->setFrom('notreply@login.bdcard.org', 'Reward Management');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->msgHTML($message); */


    if (mail($email, $subject, $message)) {
        return "Not Send";
    } else {
        return "Send";
    }
}
























require_once(__DIR__ ."/../../welcome.php");

Global $myArr;
$myArr = $con;



function month_($x)
{
	switch($x){
		case '01': return "Jan";break;
		case '02': return "Feb";break;
		case '03': return "Mar";break;
		case '04': return "Apr";break;
		case '05': return "May";break;
		case '06': return "Jun";break;
		case '07': return "Jul";break;
		case '08': return "Aug";break;
		case '09': return "Sep";break;
		case '10': return "Oct";break;
		case '11': return "Nov";break;
		case '12': return "Dec";break;
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
function makerank($exam_id,$con){
	require_once(__DIR__ ."/../../welcome.php");
	$examid= htmlspecialchars(mysqli_real_escape_string($con, $exam_id), ENT_QUOTES, 'UTF-8');
	$que_ans_list="que_ans_$examid";
	$question_="question_".$examid;
	$sql1=mysqli_query($con,"select no_of_question,exam_name from all_test where uid='$examid'");
	if(mysqli_num_rows($sql1)>0)
	{
		while($row1=mysqli_fetch_assoc($sql1))
		{
			$no_of_question=$row1['no_of_question'];
			$exam_name=$row1['exam_name'];
		}
	}
	$sql=mysqli_query($con,"select * from `$que_ans_list` order by rank");
	if(mysqli_num_rows($sql)>0)
	{
		
		?>
		<table class="table table-striped table-hover"style="background-color:white">
		<tr><th><?php echo $exam_name;?></th><th>AIR</th></tr>
		<?php
		while($row=mysqli_fetch_assoc($sql))
		{
				
			$illagel_attemp=$row['illagel_attemp'];
			$user_id=$row['user_id'];
			$dismis_reason=$row['dismis_reason'];
			$rank=$row['rank'];
			$marks=$row['marks'];
			$unsolved_que=$row['unsolved_que'];
			$exam_end_status=$row['exam_end_status'];
			$dismis_reason=$row['dismis_reason'];
			$useranswer=array();
			for($i=1;$i<=$no_of_question;$i++)
			{
				$useranswer[$i]=$row["que_no_".$i];
			}
			$sql_get_user=mysqli_query($con,"select name,crop_pic from allmember where id='$user_id'");
			if(mysqli_num_rows($sql_get_user)>0)
			{
				while($row_user=mysqli_fetch_assoc($sql_get_user))
				{
					$user_name=$row_user['name'];
					$crop_pic=$row_user['crop_pic'];
					
			if(isset($crop_pic))
			{
				if($crop_pic=='0')
				{
					$crop_pic="default.jpg";
				}
			}else
			{
				$crop_pic="default.jpg";
			}
		
			
			?>
			<tr><td><img src="upload_images/crop/<?php echo $crop_pic; ?>"height="50"alt="<?php echo $user_name; ?>">&nbsp;&nbsp; <a href="profile.php?id=<?php echo $user_id; ?>"> <?php echo $user_name;?></td><td><?php echo $rank; ?></a></td></tr>
			
			<?php
				}
			}
			
			
		}
		?>
		</table>
		<?php
	}
}
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
?>
