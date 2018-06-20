<?php include 'header.php';?>

<div class="content">
         <div class="header">
            
            <h1 class="page-title">Subadmin Balance Transfer</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Subadmin Balance Transfer</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Subadmin Balance Transfer</div>
        <div class="panel-body">
       
       
        <form action="action_suadmin_transfer.php" method="post" id="fromData">
             
             
                <div class="form-group">
                    <label class="col-md-12">Username</label>
                    <div class="col-md-6"><input type="text" name="username" class="form-control" onchange="showplacements(this.value,'show_name')"></div>
                    <div class="col-md-6"><input type="text" name="show" class="form-control"  readonly="readonly" id="show_name"></div> 
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                    
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" onkeypress="return isNumberKey(event);">
                    </div>
               </div>
               
               
                <div class="col-md-12">
                    <div class="form-group">
                    
                        <label>Balance Type</label>
                            <select name="type" class="form-control">
                                <option value="A">Account Balance Added</option>
                                <option value="R">Account Balance Removed</option>
                            </select>
                    </div>
               </div>
               
               
                <div class="col-md-12">
                    <div class="form-group">
                    
                        <label>Note</label>
                        <input type="text" name="note" class="form-control">                    
                    </div>
                 </div>
                
              
           
             <div class="col-md-12">
            <div class="form-group"> 
                <button class="btn btn-primary" id="submitForm"><i class="fa fa-save"></i> Transfer</button>
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