<?php
include('dbconnect.php');
$y=$_GET['aaaa'];
$sql="update tbl_product set product_status=1 where product_id='$y'";
mysqli_query($con,$sql);
header('location:store.php');
?>
