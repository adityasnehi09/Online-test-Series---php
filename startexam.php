<?php
require_once("session.php");
require_once("welcome.php");
require_once("imp/function.php");
if(isset($_REQUEST['id']))
{
	
	
	$examid= htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST['id']), ENT_QUOTES, 'UTF-8');
	$sqq=mysqli_query($con,"select gate from activateseries");
	$series_no=mysqli_num_rows($sqq);
	if($series_no>0)
	{
		while($row=mysqli_fetch_assoc($sqq))
		{
			$activateseries=$row['gate'];
		}
	}
	$sq=mysqli_query($con,"select * from all_test where uid='$examid' and running_status='1' order by s_no desc limit 0,1");
	if(mysqli_num_rows($sq)>0)
	{
		while($row=mysqli_fetch_assoc($sq))
		{
			$exam_name=$row['exam_name'];
			$no_of_question=$row['no_of_question'];
			$s_no=$row['s_no'];
			$time_limit=$row['time_limit'];
			$total_marks=$row['total_marks'];
			$marks_per_question=$row['marks_per_question'];
			$negative_marks=$row['negative_marks'];
			$streams=$row['streams'];
			$starting_time=$row['starting_time'];
			$starting_month=$row['starting_month'];
			$starting_year=$row['starting_year'];
			$starting_day=$row['starting_day'];
			$ending_time=$row['ending_time'];
			$ending_day=$row['ending_day'];
			$ending_month=$row['ending_month'];
			$ending_year=$row['ending_year'];
			$activated=$row['activated'];
			$exam_uid=$row['uid'];
			$instruction=$row['instruction'];
			$start_date   = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
			$now    = new DateTime();
			$end_date = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
			date_default_timezone_set("Asia/Kolkata");
			$start_date = strtotime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
			$end_date = strtotime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
			$today = date("Y-m-d H:i:s");  
			$today_date = strtotime($today);
			$startfromthistime= round(abs($today_date - $end_date ) / 60,2);							
			$d_exp = new DateTime($ending_year.'-'.$ending_month.'-'.$ending_day." ".$ending_time.":00");
			$d_str = new DateTime($starting_year.'-'.$starting_month.'-'.$starting_day." ".$starting_time.":00");
			$today_ = new DateTime(date("Y-m-d H:i:s")); 
			if($d_exp>$today_){
				// exam not ended
			if($today_>$d_str ){
			//exam either started or end;
				$id="question_".$examid;
				$que_ans_list="que_ans_".$examid;
				$myid=$_SESSION['user_idX'];
				$check_user_exist=mysqli_query($con,"select id,exam_end_status from `$que_ans_list` where user_id='$myid'");
				if(mysqli_num_rows($check_user_exist)>0)
				{
					while($ro=mysqli_fetch_assoc($check_user_exist))
					{
						if($ro['exam_end_status']==1)
						{
							header("location: finish.php?id=$examid");
						} 
					}
				}
				else
				{
					if(mysqli_query($con,"insert into `$que_ans_list`(user_id) values('$myid')"))
					{
	
					}
					else
					{
						die("There is a problem in creation your ID in this examination, Please <a href='../../contact.php'>Contact Us</a>");
					}
				}	 
			}else{
            header("location: timetable.php?id=$examid");
			}
			}else{
			header("location: finish.php?id=$examid");
			}
		}
	}
}

	?>

<html>
<head>
<title><?php echo $exam_name; ?></title>
<style>
p{
	font-family: 'Roboto', 'Noto', sans-serif;
	font-size:18px;
}
input[type="radio"]{
	width:15px;
	height:15px;
}
.answersignal{
	width:50px;border-radius:25px;height:50px;background-color:red;outline:none;color:white;font-weight:bold;
}
.answersignal2{
	width:30px;border-radius:25px;height:30px;background-color:red;outline:none;color:white;font-weight:bold;
}
.markletersignal{
	width:50px;border-radius:25px;height:50px;background-color:yellow;outline:none;color:white;font-weight:bold;
}
.filledsignal{
	width:50px;border-radius:25px;height:50px;background-color:green;outline:none;color:white;font-weight:bold;
}
label{
	cursor:pointer;
}
button{
	  
	   transition: all .35s;
}
button:hover{
	   box-shadow: 5px 5px 5px #888888;
	   transition: all .35s;
}
</style>
<script>



$.fn.followTo = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 0
            });
        }
    });
};

$('#part2').followTo(50);
</script>
<script>
var upgradeTime =  <?php echo $startfromthistime; ?>*60;;
var seconds = upgradeTime;
function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = hours + ":" + minutes + ":" + Math.round(remainingSeconds);
    if (seconds < 1) {
       
        document.getElementById('countdown').innerHTML = "<b style='color:red'>Time Over</b>";
		 var timeenddata = '&id=<?php echo $examid ;?>';
		 $.ajax({
		type: "POST",
		url: "endexam.php",
		data: timeenddata,
		cache: true,
		success: function(result){
			window.location="finish.php?id=<?php echo $examid ;?>";
		}
		 })
    } else {
        seconds--;
    }
	if(seconds==60)
	{
		document.getElementById('countdown').style.color = "red";
	}
	
}
var countdownTimer = setInterval('timer()', 1000);
</script>



<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<script>
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });
  
  function changeanswer(q_no,value)
  {
	  $("#msg_"+q_no).html("Saving...");
	 var dataString = '&q_no='+ q_no+'&value='+value+'&examid=<?php echo $examid; ?>';
   $.ajax({
type: "GET",
url: "saveoneanswer.php",
data: dataString,
cache: true,
success: function(result){
	
		
			
			
			$("#msg_"+q_no).html(result);
		
}
});


}
function savethisanswer(q_no,value)
  {
	  $(".answersignalid_"+q_no).css("background-color","green");
			$(".answersignalid_"+q_no).css("color","white");
			changeanswer(q_no,value)
  }
function eraseanswer(q_no)
{
	
	$(".answersignalid_"+q_no).css("background-color","red");
	$(".answersignalid_"+q_no).css("color","white");
	changeanswer(q_no,"-1");
}
function markleter(q_no)
{
	$(".answersignalid_"+q_no).css("background-color","yellow");
	$(".answersignalid_"+q_no).css("color","black");
	changeanswer(q_no,'-1');
	
}
var windw = this;

$.fn.followTo = function ( pos ) {
    var $this = this,
        $window = $(windw);
    
    $window.scroll(function(e){
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                bottom: 0
            });
        }
    });
};

$('#part2').followTo(250);


	</script>
 <script>
 window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
//alert("h");
    }
	
};
 </script>
</head>
<body>
<div style="position:fixed;top:0;left:0;right:0;background-color:black;height:40px;z-index:10;">
<div id="countdown"style="color:white;font-size:20px;padding:5px;float:right"></div>
<div style="float:left;color:white;font-size:20px;padding:5px;"><?php echo $exam_name; ?></div>
</div>
<div class="container" >


<br>
<br>

<center></center>
<div style="width:100%;margin-bottom:20px;"><p><span style="float:right"><i>Maximum Marks: 100 </i></span>
<span style="float:left;"><i>Max Duration: <?php echo $time_limit; ?> Minutes <span data-toggle="tooltip" data-placement="bottom" title="This exam will stopped exactly at <?php echo time_($ending_time); ?> for all students who is giving this examanation"><a href="#">?</a> </span></i></span></p></div>
<br>
<hr>
<div class="row">

<div class="col-xs-8">
<?php
$sql=mysqli_query($con,"select * from `$id`");
$madeq=mysqli_num_rows($sql);
if($madeq>0)
{
	$qno=1;
	while($row=mysqli_fetch_assoc($sql))
	{
		$question=$row['question'];
		$option1=$row['option1'];
		$option2=$row['option2'];
		$option3=$row['option3'];
		$option4=$row['option4'];
		$check_option1=$row['check_option1'];
		$check_option2=$row['check_option2'];
		$check_option3=$row['check_option3'];
		$check_option4=$row['check_option4'];
		
		$q_img=$row['q_img'];
		?>
		<form name="questionform_<?php echo $qno; ?>">
		<p style="color:green"id="questionid_<?php echo $qno; ?>"><b>Q<?php echo $qno; ?> : <?php echo $question; ?></b></p>
		<?php if($q_img!='0' && $q_img!=null){
			?> <img src="foot/question_image/<?php echo $q_img ?>"class="img img-responsive"style="margin-bottom:10px;max-width:100%;">
			<?php
		}
		?>
		
		<div class="row">
		
		<div class="col-md-6 option-que"><p><input type="radio"name="radio_op_<?php echo $qno;?>"id="radio_op_1<?php echo $qno;?>"value="1"onchange="savethisanswer('<?php echo $qno;?>',this.value)"> <label for="radio_op_1<?php echo $qno;?>"> <?php echo $option1;?> </label></p></div>
		<div class="col-md-6 option-que"><p><input type="radio"name="radio_op_<?php echo $qno;?>"id="radio_op_2<?php echo $qno;?>"value="2"onchange="savethisanswer('<?php echo $qno;?>',this.value)"> <label for="radio_op_2<?php echo $qno;?>"> <?php echo $option2;?> </label></p></div>
		</div>
		<div class="row">
		<div class="col-md-6 option-que"><p><input type="radio"name="radio_op_<?php echo $qno;?>"id="radio_op_3<?php echo $qno;?>"value="3"onchange="savethisanswer('<?php echo $qno;?>',this.value)"> <label for="radio_op_3<?php echo $qno;?>"> <?php echo $option3;?> </label></p></div>
		<div class="col-md-6 option-que"><p><input type="radio"name="radio_op_<?php echo $qno;?>"id="radio_op_4<?php echo $qno;?>"value="4"onchange="savethisanswer('<?php echo $qno;?>',this.value)"> <label for="radio_op_4<?php echo $qno;?>"> <?php echo $option4;?></label> </p></div>
		</div>
		<input type="reset"value="Erase Answer"class="btn btn-default"onclick="eraseanswer('<?php echo $qno;?>')">
		<input type="reset"value="Mark Later"class="btn btn-default"onclick="markleter('<?php echo $qno;?>')"> &nbsp;&nbsp;
		<span id="msg_<?php echo $qno; ?>"></span>
		</form>
		<hr>
		<?php
		$qno++;
	}
}
?>
</div>
<div class="col-xs-4"id="part2">
<form action="finish.php"method="get">
<input type="hidden" name="id"value="<?php echo $examid; ?>" />
<input type="submit" class="btn btn-success" value="Finish" /><br><br>
</form>
<table>
<tr>
<td><button class="answersignal"style=""></button></td><td> &nbsp;&nbsp; UnMarked Signal</td>
</tr><tr>
<td><button class="filledsignal"style=""></button></td><td> &nbsp;&nbsp; Marked Signal</td>
</tr><tr>
<td><button class="markletersignal"style=""></button></td><td> &nbsp;&nbsp; Marked Leter Signal</td>

</tr>
</table>
<hr>
<?php
$sql=mysqli_query($con,"select * from `$id`");
if($madeq>0)
{
	
	$qno=1;
	
	while($rowr=mysqli_fetch_assoc($sql))
	{
		?>
		<a href="#questionid_<?php echo $qno; ?>"><button class="answersignal answersignalid_<?php echo $qno; ?>"style=""id="answersignalid_<?php echo $qno; ?>"><?php echo $qno; $qno++; ?></button></a>
		<?php
	}
}
?>

</div>
</div>
</div>
<br><br><br><br>
<div style="width:100%;position:fixed;height:30px;bottom:0;left:0;right:0;background-color:#eeeeee; box-shadow: 0px -5px 5px #888888;">
<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><?php
$sql=mysqli_query($con,"select * from `$id`");
if($madeq>0)
{
	
	$qno=1;
	
	while($rowr=mysqli_fetch_assoc($sql))
	{
		?>
		<a href="#questionid_<?php echo $qno; ?>"><button class="answersignal2 answersignalid_<?php echo $qno; ?>"style=""id="answersignalid_<?php echo $qno; ?>"><?php echo $qno; $qno++; ?></button></a>
		<?php
	}
}
?></marquee>
</div>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/j.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src=".js/bootstrap.min.js"></script>
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
</body>
</html>