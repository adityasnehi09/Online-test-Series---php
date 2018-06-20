<?php include 'header.php';?>

<div class="content">
        <div class="header">
            <h1 class="page-title">Dashboard</h1>
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a> </li>
				<li class="active">Dashboard</li>
				<div class="pull-right">
				<a href="#general" role="button" data-toggle="modal"style="font-size:20px;">Template</a>
				
				
				</div>
			</ul>
			
        </div>
		<?php
		if(isset($_GET['idcontact']))
		{
			$idcontact=mysql_real_escape_string($_GET['idcontact']);
			$sql=mysql_query("select * from contact where s_no='$idcontact'");
			if(mysql_num_rows($sql)>0)
			{
				while($rows=mysql_fetch_assoc($sql))
				{
					 $nameC=$rows['name'];
					$emailC=$rows['email'];
					$mobile_noC=$rows['mobile_no'];
					$messageC=$rows['message'];
				}
			}
			
		}
		
		
		?>
		
		
        <div class="main-content">

<script>
	function change_page(page_id){   
		var mesd = $("#search").val();
		var dataString = 'page_id='+ page_id+'&search='+mesd;
		$.ajax({
			type: "POST",
			url: "load_balance_list.php",
			data: dataString,
			cache: false,
			success: function(result){
				$("#page_data").html(result);
			}
		});
	}
</script>	
	<div class="main-content"> 
		
        <div class="main-content"> 
			
       

       <div class="panel panel-default">

            <div class="panel-heading">Send Mail

         
                

            </div>

        <div class="panel-body"> 

     

       <form action="sendmailphp.php"method="post"enctype="multipart/form-data">
               
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Heading1 | F1</label>
                        <input type="text" name="f1" class="form-control" placeholder="By default it is 'Welcome Name'"<?php if(isset($nameC)){ ?> value="<?php echo "Welcome ".$nameC; ?>"<?php  }?>>
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Small Description1 | F2 </label>
                       <textarea rows="5" name="f2" class="form-control"required></textarea>
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Image | F3</label>
                        <input type="file" name="f3" class="form-control"required>
                    </div>
               </div>
			   
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Small Description2 | F4</label>
                        <input type="text"  name="f4" class="form-control"<?php if(isset($messageC)){ ?> value="<?php echo "reply of your message <br>".$messageC; ?>"<?php  }?>>
                    </div>
               </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Heading 2 | F6</label>
                        <input type="text" name="f6" class="form-control">
                    </div>
               </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Big Description1 | F7</label>
                        <textarea rows="10" name="f7" class="form-control"></textarea>
                    </div>
               </div>
			   
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Button Text | F8</label>
                        <input type="text" name="f8" class="form-control"value="Click Here"required>
                    </div>
               </div>
			   
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Button Link | F9</label>
                        <input type="text" name="f9" class="form-control"required>
                    </div>
               </div>
			   
			  
			  
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Facebook Link | F10</label>
                        <input type="text" name="f10" class="form-control"value="https://www.facebook.com/nightbirdplatform/">
                    </div>
               </div>
			   
			 
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Contact No | F13</label>
                        <input type="text" name="f13" class="form-control"value="9814916810">
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Email | F14</label>
                        <input type="text" name="f14" class="form-control"value="info@nightbird.com">
                    </div>
               </div>
			    <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Terms Link | F15</label>
                        <input type="text" name="f15" class="form-control"value="http://nightbird.in/terms.php">
                    </div>
               </div>
			      <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Privacy Link | F16</label>
                        <input type="text" name="f16" class="form-control">
                    </div>
               </div> 
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Unsubscribe Link | F17</label>
                        <input type="text" name="f17" class="form-control">
                    </div>
               </div> 
			  
              <hr>
			  <H2>Email Detail</h2>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>Subject | F18</label>
                        <input type="text" name="f18" class="form-control"placeholder="eg. NightBird Customer Support"required>
                    </div>
                </div>
			   <div class="col-md-12">
                    <div class="form-group"> 
                        <label>To (If One person else leave it) | F19</label>
                        <input type="text" name="f19" class="form-control"placeholder="someone@gmail.com"<?php if(isset($emailC)){ ?> value="<?php echo $emailC; ?>"<?php  }?>/>
                    </div>
                </div>
				<div class="col-md-12">
                    <div class="form-group"> 
                        <label>Send To | F20</label>
                        <select name="f20" class="form-control">
						<option value="1">All</option>
						<option value="2">Zero Balance</option>
						<option value="3">Non Zero Balance</option>
						<option value="4">To Single Person</option>
						</select>					
                    </div>
					
					
					
					
                </div> <div class="col-md-12">
                    <div class="form-group"> 
                        <label>From Email | F21</label>
                        <input type="text" name="f21" class="form-control"value="info@nightbird.in"required>
                    </div>
                </div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
             <div class="col-md-12">
            <div class="form-group"> 
                <input type="submit"class="btn btn-primary" value="Send"/>
                <input type="reset" class="btn btn-danger" value="Reset"> 
            </div>  
              </div>
            </form>
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
        </div>
        </div>
                

        </div>

        </div>

	<div class="modal fade col-md-12" tabindex="-1" role="dialog"id="general" style="width:100%">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header generalheadbox ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Template Image</h3>
      </div>
      <div class="modal-body"id="generalbody">
      <img class="img img-responsive"src="../img/qq.PNG">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
	
	
<?php include 'footer.php'; ?>


