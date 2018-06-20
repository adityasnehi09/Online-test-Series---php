<?php 
    
include_once 'session.php'; 

if(empty($_POST['search'])){
    $sqlQuery  = mysql_query("SELECT * FROM `pin` order by id desc");
}else{
     $sr = encrypt_decrypt('encrypt',$_POST['search']);
$srs = profileID($_POST['search']);
    $sqlQuery  = mysql_query("SELECT * FROM `pin`  WHERE `pin`='$sr' OR `userid`='$sr' order by id desc");
}

 

$count  = mysql_num_rows($sqlQuery);


$adjacents = 2;
$records_per_page = 30;

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
    	<th>Create Date</th>
      	<th>Expire Date</th> 
      	<th>Use Date</th>
      	<th>PIN</th>
      	<th>Amount</th>
		<th>Status</th>
		
<th>Created By</th>
<th>Use By</th>		
    </tr>
  </thead>
  <tbody>
  
  
  <?php 
 
 if(empty($_POST['search'])){
      $query = Query("SELECT * FROM `pin` order by id desc LIMIT $start, $records_per_page");
  }else{
     $sr = encrypt_decrypt('encrypt',$_POST['search']);
$srs = profileID($_POST['search']);
      $query = Query("SELECT * FROM `pin`  WHERE `pin` = '$sr' OR `userid`='$srs' order by id desc LIMIT $start, $records_per_page");
  } 
  
$i=1;
    while($row = QueryArray($query)){
       echo '<tr> 
<td>'.$row['create_date'].'</td>       
<td>'.$row['expire_date'].'</td>
<td>'.$row['use_date'].'</td> 
<td>'.encrypt_decrypt('decrypt',$row['pin']).'</td>  
<td>'.$row['amount'].'</td>  
<td>';
echo ($row['status'] == 'P')?'<span class="label label-success">UNUSED</span>':'<span class="label label-danger">USED</span>';
echo '</td>
<td>';


echo ($row['userid'] > 0 )? profile_info($row['userid'],'username'):"";

echo '</td><td>'.$row['createby'].'</td>    
    </tr>';
    }
   
  ?> 
  </tbody>
</table>
<?php echo $pagination;?>