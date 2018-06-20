<?php include 'header.php';?>

<div class="content">
         <div class="header">
            
            <h1 class="page-title">Recharge PIN Generation</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Recharge PIN Generation</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Recharge PIN Generation</div>
        <div class="panel-body">
       
       
        <form action="action_pin.php" method="post" id="fromData">
             
             
                
                <div class="col-md-12">
                    <div class="form-group">
                    
                        <label>Recharge Amount</label>
                        <input type="text" name="amount" class="form-control">
                    </div>
               </div>
			   
			   
			   <div class="col-md-12">
                    <div class="form-group">
                    
                        <label>PIN Validaty in days</label>
                        <input type="text" name="day" class="form-control" onkeypress="return isNumberKey(event);">
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group">
                    
                        <label>Number Of PIN</label>
                        <input type="text" name="number" class="form-control" onkeypress="return isNumberKey(event);">
                    </div>
               </div>
			    
              
           
             <div class="col-md-12">
            <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> Generate</button>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
            </form>
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
        </div>
        </div>

<?php include 'footer.php'; ?>