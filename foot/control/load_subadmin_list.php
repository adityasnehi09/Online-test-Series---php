<?php 
    
include_once 'session.php'; 

if(empty($_POST['search'])){
    $sqlQuery  = mysql_query("SELECT * FROM `subadmin` order by id desc");
}else{
    $sr = $_POST['search']; 
    $sqlQuery  = mysql_query("SELECT * FROM `subadmin`  WHERE `username`='$sr' order by id desc");
}

 

$count  = mysql_num_rows($sqlQuery);


$adjacents = 2;
$records_per_page = 10;

$page = (int) (isset($_POST['page_id']) ? $_POST['page_id'] : 1);
$page = ($page == 0 ? 1 : $page);
$start = ($page-1) * $records_per_page;

$next = $page + 1;
$prev = $page - 1;
$last_page = ceil($count/$records_per_page);
$second_last = $last_page - 1;

$pagination = pagenation($adjacents,$records_per_page,$page,$start,$next,$prev,$last_page,$second_last);
    
?>



<table class="table">
  <thead>
    <tr>
    	<th>Name</th>
      	<th>Username</th> 
      	<th>Contact</th>
      	<th>Email</th>
      	<th>Balance</th> 
<th>Status</th>
		<th style="width: 10em;"></th>		
    </tr>
  </thead>
  <tbody>
  
  
  <?php 
  
  if(empty($_POST['search'])){
      $query = Query("SELECT * FROM `subadmin` order by id desc LIMIT $start, $records_per_page");
  }else{
      $sr = $_POST['search'];
      $query = Query("SELECT * FROM `subadmin`  WHERE `username` = '$sr' order by id desc LIMIT $start, $records_per_page");
  } 
 $status = array('0' => '<span class="label label-success">Active</span>','1' => '<span class="label label-danger">Inactive</span>'); 
$i=1;
    while($row = QueryArray($query)){
       echo '<tr> 
<td>'.$row['fullname'].'</td>       
<td>'.$row['username'].'</td>
<td>'.$row['contact'].'</td>  
<td>'.$row['email'].'</td> 
<td>'.$row['balance'].'</td>
<td>'.$status[$row['status']].'</td> 
<td>
<a href="status_subadmin_update.php?id='.$row['id'].'" title="Active/Inactive"><i class="fa fa-retweet"></i></a>&nbsp;&nbsp;
			<a href="subadminpassword_update.php?id='.$row['id'].'"><i class="fa fa-key"></i></a>&nbsp;&nbsp;
			<a href="profile_view_subadmin.php?id='.$row['id'].'"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
			<a href="profile_edit_subadmin.php?id='.$row['id'].'"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;				
            <a href="user_balance_history.php?id='.$row['id'].'"><i class="fa fa-history"></i></a>&nbsp;&nbsp; 
</td>
</tr>';
    }
   
  ?> 
  </tbody>
</table>
<?php echo $pagination;?>