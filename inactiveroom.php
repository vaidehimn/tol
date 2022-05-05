<?php
include('dbconnect.php');
$y=$_GET['aaa'];
$sql="update tbl_room set room_status=1 where room_id='$y'";
mysqli_query($con,$sql);
header('location:rooms.php');
?>
