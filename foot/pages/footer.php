<?php require_once("session.php");?>

<footer>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<form action="member_list.php" method="post">
				<div class="panel-heading-new" id="new"><span class="fa fa-caret-right"></span> Member List
					
						<span class="panel-icon pull-right col-md-8">
							<div class="input-group">
								
								<input type="text" class="form-control input-sm" name="search" placeholder="Search for..." id="search" />
								<span class="input-group-btn">
									<button class="btn btn-default btn-sm" type="submit" name="btnname">Go!</button>
								</span>
							</div><!-- /input-group --> 
						</span>
					
				</div>
				
				</form>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<a href="exam_control.php">
					<div class="panel-heading-new" id="new">
					
						<span class="fa fa-caret-right"></span> Exam Control
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<a href="simplemail.php">
					<div class="panel-heading-new" id="new">
						<span class="fa fa-caret-right"></span> Send Mail
					</div>
				</a>
			</div>
		</div>
	</div>
	<hr>
</footer>
</div>
</div>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../lib/custom.js"></script>
<script type="text/javascript">	
    window.onload  = change_page('0');	
</script>
</body>
</html>


<style>
.panel .panel-heading-new {
	color:#000;
	background: #efefef;
    background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #e2e2e2), color-stop(1, #fafafa));
    background: -ms-linear-gradient(bottom, #e2e2e2, #fafafa);
    background: -moz-linear-gradient(center bottom, #e2e2e2 0%, #fafafa 100%);
    background: -o-linear-gradient(bottom, #e2e2e2, #fafafa);
    filter: progid:dximagetransform.microsoft.gradient(startColorStr='#e3e3e3', EndColorStr='#ffffff');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#fafafa',EndColorStr='#e2e2e2')";
	padding: 10px 15px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
	line-height: 24px;
}
.panel .panel-heading-new:not(.no-collapse):hover {
    border-bottom: 1px solid #ccc;
    border-left: none;
    color: #333;
    display: block;
    margin-bottom: 0px;
    text-shadow: none;
    text-transform: none;
    font-size: 14px;
    line-height: 24px;
    background: #4d5b76;
    background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #4d5b76), color-stop(1, #6f80a1));
    background: -ms-linear-gradient(bottom, #efeff0, #fafafa);
    background: -moz-linear-gradient(center bottom, #efeff0 0%, #fafafa 100%);
    background: -o-linear-gradient(bottom, #efeff0, #fafafa);
    filter: progid:dximagetransform.microsoft.gradient(startColorStr='#e3e3e3', EndColorStr='#ffffff');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#fafafa',EndColorStr='#efeff0')";
    box-shadow: inset 0px 1px 1px white;
	padding: 10px 15px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
	line-height: 24px;
}

#new:hover {
color:#fff;
}

</style>
