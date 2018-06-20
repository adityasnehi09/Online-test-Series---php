<?php 
    
include_once 'session.php'; 
include_once '../include/config.php';
include_once '../include/function.php';
if(empty($_POST['search'])){
    $sqlQuery  = mysql_query("SELECT * FROM `allmember` order by id desc");
}else{
    $sr = $_POST['search']; 
    $sqlQuery  = mysql_query("SELECT * FROM `allmember`  WHERE `email`='$sr' or `id`='$sr' or `mobile_no`='$sr' order by id desc");
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
    	<th>Date</th>
    	<th>Id</th>
    	<th>Name</th>
      	<th>Email</th> 
      	<th>Mobile No</th>
      	<th>Sex</th>
      	<th>DOB</th>
		<th>Status</th>
		<th style="width: 15em;"></th>		
    </tr>
  </thead>
  <tbody>
  
  
  <?php 
  
  if(empty($_POST['search'])){
      $query = Query("SELECT * FROM `allmember` order by id desc LIMIT $start, $records_per_page");
  }else{
      $sr = $_POST['search'];
      $query = Query("SELECT * FROM `allmember`  WHERE `email` = '$sr' or `mobile_no`='$sr' or `id` = '$sr' order by id desc LIMIT $start, $records_per_page");
  } 
  

$status = array('0' => '<span class="label label-success">Active</span>','1' => '<span class="label label-danger">Inactive</span>');
$i=1;
    while($row = QueryArray($query)){
       echo '<tr> 
<td>'.$row['sign_up_time'].'-'.$row['sign_up_day'].':'.$row['sign_up_month'].':'.$row['sign_up_year'].'</td>       
<td>'.$row['id'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['email'].'</td>
<td>'.$row['mobile_no'].'</td>
<td>'.$row['gender'].'</td>
<td>'.$row['dob'].'</td>
<td>'.$row['conform_email'].'</td>

<td>
<a target="_blank" href="status_update.php?id='.$row['id'].'" title="Active/Inactive"><i class="fa fa-retweet"></i></a>&nbsp;&nbsp;			
<a target="_blank" href="password_update.php?id='.$row['id'].'"><i class="fa fa-key"></i></a>&nbsp;&nbsp;
			<!--<a target="_blank" href="profile_view.php?id='.$row['id'].'"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;-->
			<a target="_blank" href="changenotice_two.php?id='.$row['id'].'"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;
			<a target="_blank" href="changenotice_three.php?id='.$row['id'].'"><i class="fa fa-envelope-o"></i></a>&nbsp;&nbsp;
			
			<a target="_blank" href="profile_edit.php?id='.$row['id'].'"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;				
            <a target="_blank" href="user_balance_history.php?id='.$row['id'].'"><i class="fa fa-history"></i></a>&nbsp;&nbsp; 
</td>
</tr>';
    }
   
  ?> 
  </tbody>
</table>
<?php echo $pagination;?>