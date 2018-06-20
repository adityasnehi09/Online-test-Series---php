<?php 
require_once("session.php");

if(empty($_POST['search'])){
    $sqlQuery  = mysqli_query($con,"SELECT * FROM `contact` order by s_no desc");
}else{
    $sr = mysqli_real_escape_string($con,$_POST['search']); 
    $sqlQuery  = mysqli_query($con,"SELECT * FROM `contact`  WHERE `mobile_no`='$sr' or `email`='$sr' order by s_no desc");
}

 

$count  = mysqli_num_rows($sqlQuery);


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
      	<th>Message</th>
      
<th>Action</th>		
    </tr>
  </thead>
  <tbody>
  
  
  <?php 
  
  if(empty($_POST['search'])){
      $query = Query("SELECT * FROM `contact` order by s_no desc LIMIT $start, $records_per_page");
  }else{
      $sr = mysqli_real_escape_string($con,$_POST['search']);
      $query = Query("SELECT * FROM `contact`  WHERE  `email`='$sr' or `mobile_no`='$sr' order by s_no desc LIMIT $start, $records_per_page");
  } 
  
$i=1;
    while($row = QueryArray($query)){
       ?>
	   <tr> 
<td><?php echo $row['timing'].','.$row['day'].':'.$row['month'].':'.$row['year'];?></td>       
<td><?php echo $row['s_no'] ?></td>
<td><?php echo $row['name']; ?></td>  
<td><?php echo $row['email']; ?> </td>  
<td><?php echo $row['mobile_no']; ?></td>  
<td><?php echo $row['message']; ?></td>  

<td> <span onclick="deletecontact('<?php echo $row['s_no']; ?>','<?php echo $row['name']; ?>','<?php echo $row['message']?>')"style="cursor:pointer;color:blue;">Delete</a> | <a href="sendmail.php?idcontact=<?php echo $row['s_no']; ?>"target="_blank">Reply</a>

</td>
 
    </tr>
	<?php
    }
   
  ?> 
  </tbody>
</table>
<?php echo $pagination;?>