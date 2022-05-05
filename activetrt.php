<?php
include('dbconnect.php');
$y=$_GET['bbbb'];
$sql="update tbl_treatment set treatment_status=0 where tretament_id='$y'";
mysqli_query($con,$sql);
header('location:treatment.php');
?>





 