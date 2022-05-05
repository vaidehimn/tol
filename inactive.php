<?php
include('dbconnect.php');
$y=$_GET['aa'];
$sql="update tbl_register set status=1 where reg_id='$y'";
mysqli_query($con,$sql);
header('location:admin.php');
?>
