<?php include 'header.php';?>

<div class="content">
         <div class="header">
            
            <h1 class="page-title">Balance Transfer</h1>
                    <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> </li>
            <li class="active">Balance Transfer</li>
        </ul>

        </div>
        <div class="main-content">
            
       
       <div class="panel panel-default">
            <div class="panel-heading">Balance Transfer</div>
        <div class="panel-body">
       
<form method="post">
View request from: 
<input type="submit" value="bKash" name="bKash">
<input type="submit" value="Bank Deposit/Online Bank Transfer" name="bank">
</form>

<?php if(isset($_POST["bKash"])){
?>	

<center>
<div>
<table class="table">

<tr> 
<th> User: </th> 
<th> Your bKash Number (bKash From): </th> 
<th> Our bKash Number (bKash To): </th> 
<th> Exact Amount Paid in TK: </th> 
<th> Exact Date of Payment: </th> 
<th>bKash Transaction ID, If Available: </th> 
<th> BDCard Wallet Username:</th> 
<th> Action </th>
<th> Status </th>

</tr>
<?php


$result = mysql_query("SELECT * FROM `requestrecharge` WHERE type = 'bKash'");
 $num_rows = mysql_num_rows($result);


while ($row = mysql_fetch_array($result)){

?>

<tr> 
<td> <?php echo $row["user"]; ?></td> 
<td> <?php echo $row["from"]; ?></td> 
<td> <?php echo $row["to"]; ?></td> 
<td> <?php echo $row["amount"]; ?></td> 
<td> <?php echo $row["dop"]; ?></td> 
<td> <?php echo $row["bid"]; ?></td> 
<td> <?php echo $row["bwun"]; ?></td>
<td> <a href="balanceTransfer.php">Accept</a> | <a href="reject.php?id=<?php echo $row['id']; ?>"> Reject </a> </td> 
<td> <?php echo $row["status"]; ?></td>
</tr>
<?php

}



?>


</table>
</div>

</center>

<?php }?>


<?php if(isset($_POST["bank"])){
?>	

<center>
<div>
<table class="table">

<tr> 
<th> User: </th>  
<th> Exact Amount Paid in TK: </th> 
<th> Exact Date of Payment: </th> 
<th>Which of our Bank did you Deposit or Transfer to?</th>
<th>File </th>
<th>BDCard Wallet Username: </th> 
<th>Message:</th>
<th>Action:</th> 
<th>Status:</th> 
</tr>
<?php


$result = mysql_query("SELECT * FROM `requestrecharge` WHERE type = 'bank'");
 $num_rows = mysql_num_rows($result);


while ($row = mysql_fetch_array($result)){

?>

<tr> 
<td> <?php echo $row["user"]; ?></td> 
<td> <?php echo $row["amount"]; ?></td> 
<td> <?php echo $row["dop"]; ?></td> 
<td> <?php echo $row["bank"]; ?></td> 
<td> <a href="http://<?php echo $_SERVER['SERVER_NAME'].'/'.$row["file"]; ?>" >View Attachment</td> 
<td> <?php echo $row["bwun"]; ?></td> 
<td> <?php echo $row["message"]; ?></td> 
<td> <a href="balanceTransfer.php">Accept</a> | <a href="reject.php?id=<?php echo $row['id']; ?>"> Reject </a> </td> 
<td> <?php echo $row["status"]; ?></td>
</tr>
<?php
}



?>


</table>
</div>

</center>

<?php }?>
       
            <div class="col-sm-12 col-md-12">
            <div id="msg"></div> 
            </div>
        </div>
        </div>

<?php include 'footer.php'; ?>