<?php include 'header.php';?>
 
<div class="content">
         <div class="header">
            
            <h1 class="page-title">Change Notice</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Change Notice</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Change Notice</div>
        <div class="panel-body"> 
		 
        <form action="action_notice.php" method="post" id="fromData">
               
        	<div class="col-md-12">
            	<div class="form-group"> 
                        <label>Notice Message</label>

<textarea name="area2" style="width: 100%; height:200px;"><?php echo admin($_SESSION['USERID'],'notice'); ?></textarea>

                    </div>
               </div>
             <div class="col-md-12">
            <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> General Notice</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
            </form>
			<div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
			
            <div class="col-sm-12 col-md-12">
            <div id="msg2"></div> 
            </div>
        </div>
        </div>

<?php include 'footer.php'; ?>