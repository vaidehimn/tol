<?php
include('dbconnect.php');
$y=$_GET['bb'];
$sql="update tbl_register set status=0 where reg_id='$y'";
mysqli_query($con,$sql);
header('location:admin.php');
?>





 