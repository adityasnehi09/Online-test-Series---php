<?php

function redirect($url) {
    return header("Location: " . $url);
}
function escape_string($stirng) {
    return mysqli_real_escape_string($con,$stirng);
}
function display_flash($msg, $type = '') {
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
    return mysqli_query($con,$query);
}
function count_row($sql) {
    return mysqli_num_rows($sql);
}
function QueryArray($result) {
    return mysqli_fetch_array($result);
}
function INSERT($table, $arraydata) {
    if (is_array($arraydata)) {
        $key = implode('`,`', array_keys($arraydata));
        $val = implode("','", array_values($arraydata));
        $query = "INSERT INTO `{$table}`(`{$key}`) VALUES ('{$val}')";
        if (mysqli_query($con,$query)) {
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
    if (is_array($arraydata)) {
        $quee = array();
        foreach ($arraydata as $k => $v) {
            $quee[] = "`$k`='$v'";
        }
        $val = implode(",", $quee);
        $key = array_keys($where);
        $key_val = array_values($where);
        $query = "UPDATE `{$table}` SET $val WHERE `$key[0]` = '$key_val[0]'";
        if (mysqli_query($con,$query)) {
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
    if (is_array($where)) {
        $key = array_keys($where);
        $key_val = array_values($where);
        $query = "DELETE FROM `{$table}` WHERE `$key[0]` = '$key_val[0]'";
        if (mysqli_query($con,$query)) {
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
        if ($page > 1) $pagination.= "<li onClick='change_page(1);'><span><a href='javascript:void(0);' >&laquo; First</a></span></li>";
        else $pagination.= '';
        if ($page > 1) $pagination.= "<li onClick='change_page(" . ($prev) . ");'><span><a href='javascript:void(0);' >&laquo;</a></span></li>";
        else $pagination.= '';
        if ($last_page < 7 + ($adjacents * 2)) {
            for ($counter = 1;$counter <= $last_page;$counter++) {
                if ($counter == $page) $pagination.= "<li class='active'><span><a href='#'>$counter</a></span></li>";
                else $pagination.= "<li  onClick='change_page(" . ($counter) . ");'><span><a href='javascript:void(0);'>$counter</a></span></li>";
            }
        } elseif ($last_page > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1;$counter < 4 + ($adjacents * 2);$counter++) {
                    if ($counter == $page) $pagination.= "<li class='active'><span><a href='#'>$counter</a></span></li>";
                    else $pagination.= "<li onClick='change_page(" . ($counter) . ");'><span><a href='javascript:void(0);' >$counter</a></span></li>";
                }
                $pagination.= '<li class="disabled"><span><a href="#">...</a></span></li>';
                $pagination.= "<li onClick='change_page(" . ($second_last) . ");'><span><a href='javascript:void(0);' > $second_last</a></span></li>";
                $pagination.= "<li onClick='change_page(" . ($last_page) . ");'><span><a href='javascript:void(0);' >$last_page</a></span></li>";
            } elseif ($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li onClick='change_page(1);'><span><a href='javascript:void(0);' >1</a></span></li>";
                $pagination.= "<li onClick='change_page(2);'><span><a href='javascript:void(0);' >2</a></span></li>";
                $pagination.= '<li class="disabled"><span><a href="#">...</a></span></li>';
                for ($counter = $page - $adjacents;$counter <= $page + $adjacents;$counter++) {
                    if ($counter == $page) $pagination.= "<li class='active'><span><a href='#'>$counter</a></span></li>";
                    else $pagination.= "<li onClick='change_page(" . ($counter) . ");'><span><a href='javascript:void(0);' >$counter</a></span></li>";
                }
                $pagination.= '<li class="disabled"><span><a href="#">...</a></span></li>';
                $pagination.= "<li onClick='change_page(" . ($second_last) . ");'><span><a href='javascript:void(0);' >$second_last</a></span></li>";
                $pagination.= "<li  onClick='change_page(" . ($last_page) . ");'><span><a href='javascript:void(0);'>$last_page</a></span></li>";
            } else {
                $pagination.= "<li onClick='change_page(1);'><span><a href='javascript:void(0);' >1</a></span></li>";
                $pagination.= "<li  onClick='change_page(2);'><span><a href='javascript:void(0);'>2</a></span></li>";
                $pagination.= '<li class="disabled"><span><a href="#">...</a></li>';
                for ($counter = $last_page - (2 + ($adjacents * 2));$counter <= $last_page;$counter++) {
                    if ($counter == $page) $pagination.= "<li class='active'><span><a href='#'>$counter</a></span></li>";
                    else $pagination.= "<li onClick='change_page(" . ($counter) . ");'><span><a href='javascript:void(0);' >$counter</a></span></li>";
                }
            }
        }
        if ($page < $counter - 1) $pagination.= "<li onClick='change_page(" . ($next) . ");'><span><a href='javascript:void(0);' >&raquo;</a></span></li>";
        else $pagination.= '';
        if ($page < $last_page) $pagination.= "<li  onClick='change_page(" . ($last_page) . ");'><span><a href='javascript:void(0);'>Last &raquo;</a></span></li>";
        else $pagination.= '';
        $pagination.= "</ul>";
    }
    return $pagination;
}

function encrypt_decrypt($action, $string) {
    $output = false;
    $key = '<<<###:::Develop By Aditya Snehi , Good days:::###>>>';
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
?>