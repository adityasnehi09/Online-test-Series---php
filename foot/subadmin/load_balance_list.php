<?php 
    
include_once 'session.php'; 

if(empty($_POST['search'])){
    $sqlQuery  = mysql_query("SELECT * FROM `balance_transfer` order by id desc");
}else{
    $sr = profileID($_POST['search']); 
    $sqlQuery  = mysql_query("SELECT * FROM `balance_transfer`  WHERE `uid`='$sr' order by id desc");
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
      	<th>Username</th> 
      	<th>Amount</th>
      	<th>Type</th>
      	<th>Message</th>       
		<th>Update By</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php 
  
  if(empty($_POST['search'])){
      $query = Query("SELECT * FROM `balance_transfer` order by id desc LIMIT $start, $records_per_page");
  }else{
      $sr = profileID($_POST['search']);
      $query = Query("SELECT * FROM `balance_transfer`  WHERE `uid` = '$sr' order by id desc LIMIT $start, $records_per_page");
  } 
  
$i=1;
    while($row = QueryArray($query)){
       echo '<tr> 
<td>'.$row['time'].'</td>       
<td>'.profile_info($row['uid'],'username').'</td>
<td>'.$row['amount'].'</td>  
<td>';
echo ($row['type'] == "A")?'<span class="label label-success">Credit </span>':'<span class="label label-danger">Debit</span>';
echo '</td> 
<td>'.$row['message'].'</td>
<td>'.$row['addedby'].'</td> 
    </tr>';
    }
   
  ?> 
  </tbody>
</table>
<?php echo $pagination;?>