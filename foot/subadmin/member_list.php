<?php include 'header.php';?>

<script>

function change_page(page_id){   

	var mesd = $("#search").val();
	
     var dataString = 'page_id='+ page_id+'&search='+mesd;
     $.ajax({
           type: "POST",
           url: "load_member_list.php",
           data: dataString,
           cache: false,
           success: function(result){
           
			     $("#page_data").html(result);
           }
      });
}
</script>


<div class="content">
         <div class="header">
            
            <h1 class="page-title">Member List</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Member List</li>
        </ul>

        </div>
        <div class="main-content"> 
       
	   <?php 
           
           if(isset($_SESSION['ERROR'])){
               echo $_SESSION['ERROR'];
                unset($_SESSION['ERROR']);
           };
           
           ?>
		   
       <div class="panel panel-default">
            <div class="panel-heading">Member List
            
                 <span class="panel-icon pull-right col-md-2">
                    
                    <div class="input-group">
      <input type="text" class="form-control input-sm" placeholder="Search for..." id="search">
      <span class="input-group-btn">
        <button class="btn btn-default btn-sm" type="button" onclick="change_page(0)">Go!</button>
      </span>
    </div><!-- /input-group --> 
                    
                </span>
                
            </div>
        <div class="panel-body"> 
       <div id="page_data"></div>  
        </div>
        </div>

<?php include 'footer.php'; ?>