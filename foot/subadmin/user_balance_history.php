<?php include 'header.php';

if (isset($_GET['id'])){
    
    $id = intval($_GET['id']);
    
    if($id < 1){
        die(redirect('member_list.php'));
    }
    
}else{
    die(redirect('member_list.php'));
}




?>
<div class="content">
         <div class="header">
            
            <div class="stats">
    <p class="stat"><span class="label label-info"><?php echo (balance_history($id,'T') != NULL)? balance_history($id,'T') : "0"; ?></span> Total Amount</p>
    <p class="stat"><span class="label label-success"><?php echo (balance_history($id,'A') != NULL)? balance_history($id,'A') : "0";?></span> Added Amount</p>
    <p class="stat"><span class="label label-danger"><?php echo (balance_history($id,'R') != NULL)? balance_history($id,'R') : "0";?></span> Removed Amount</p>
</div>


            <h1 class="page-title">User Payment History</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">User Payment History</li>
        </ul>

        </div>
        <div class="main-content">
            
       
        <div class="panel panel-default">
            <div class="panel-heading">User Payment History</div>
        <div class="panel-body">
        
          <table class="table">
  <thead>
    <tr> 
      <th>UserID</th>
      <th>Name</th>
      <th>Amount</th>
      <th>Date</th>
<th>Description</th>
      <th>Type</th> 
    </tr>
  </thead>
  <tbody>
  
  <?php 
  
    $sql = Query("SELECT * FROM `balance_transfer` WHERE `uid`='$id' order by id DESC");
 
    while($row = QueryArray($sql)){
       echo '<tr>
      <td>'.profile_info($row['uid'], 'username').'</td>
           <td>'.profile_info($row['uid'], 'fname').' '.profile_info($row['uid'], 'lname').'</td>
      <td>'.$row['amount'].'</td>
      <td>'.$row['time'].'</td>
<td>'.$row['message'].'</td>
       <td>';
       echo($row['type'] == "A")?'<span class="label label-success">Added</span>':'<span class="label label-danger">Removed</span>';
       echo '</td> 
    </tr>';
    }
   
  ?> 
  </tbody>
</table>
           
           
           
           
           
        </div>
        </div>

<?php include 'footer.php'; ?>