<?php
include('dbconnect.php');
$y=$_GET['aaaa'];
$sql="update tbl_treatment set treatment_status=1 where treatment_id='$y'";
mysqli_query($con,$sql);
header('location:treatment.php');
?>
