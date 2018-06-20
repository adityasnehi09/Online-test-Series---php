<?php include 'header.php';?>

<div class="content">
        <div class="header">
     

            <h1 class="page-title">Dashboard</h1>
                    <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li class="active">Dashboard</li>
        </ul>

        </div>
        <div class="main-content">
   
		 
						
<center>
<span class="label label-info" style="font-size:20px;">Balance :  <?php echo admin_info($_SESSION['USERID'], 'balance') ." " .profile_info($_SESSION['USERID'], 'currency');?></span>

</center>

<br><br>

		
		<div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">User</div>
                    <div class="panel-body">
                        <ul class="list-unstyled list-info">
						
						
						
						
						<?php 
                            
                        
                        $total = mysql_num_rows(Query("SELECT * FROM `member`"));
                        
                        
                        ?> 
                            <li>
							<span class="text-info fa fa-check-square-o fa-fw"></span>
                               Total User  <span class="label label-success  pull-right"><?php echo $total;?></span>
                            </li>
							<li class="xxd"></li>
                             
                             
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Balance
                    </div>
                    <div class="panel-body">
					
						
						<ul class="list-unstyled list-info">
						
							<?php 
								
								
								$sql = Query("SELECT * FROM `member` GROUP BY `currency`");
								
								while($row = mysql_fetch_array($sql)){
									
										echo '<li>
							<span class="text-info fa fa-check-square-o fa-fw"></span>
                                '.$row['currency'].' <span class="label label-success  pull-right">'.currencyAmount($row['currency']).'</span>
                            </li><li class="xxd"></li>';
									
								}
							
							
							?>
						
						 
                        </ul>
						
					
					</div>
                </div>
            </div>
			
			
			<div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recharge Card
                    </div>
                    <div class="panel-body">
					
						
						<ul class="list-unstyled list-info">
						
						
						
						
						<?php 
                            
                        
                        $totalcard = mysql_num_rows(Query("SELECT * FROM `pin`"));
                        $usedcard = mysql_num_rows(Query("SELECT * FROM `pin` WHERE `status`='P'"));
						$unusedcard = mysql_num_rows(Query("SELECT * FROM `pin` WHERE `status`='S'"));						
                        ?> 
                            <li>
							<span class="text-info fa fa-check-square-o fa-fw"></span>
                                Total Card  <span class="label label-success  pull-right"><?php echo $totalcard;?></span>
                            </li>
							<li class="xxd"></li>
                            <li>
							<span class="text-info fa fa-check-square-o fa-fw"></span>
                                Used Card  <span class="label label-success  pull-right"><?php echo $usedcard;?></span>
                            </li>
							<li class="xxd"></li>
							<li>
							<span class="text-info fa fa-check-square-o fa-fw"></span>
                                Unused Card  <span class="label label-success  pull-right"><?php echo $unusedcard;?></span>
                            </li>
							
                        </ul>
						
					
					</div>
                </div>
            </div>
			
        </div>
		
<?php include 'footer.php'; ?>