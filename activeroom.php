<?php
include('dbconnect.php');
$y=$_GET['bbb'];
$sql="update tbl_room set room_status=0 where room_id='$y'";
mysqli_query($con,$sql);
header('location:rooms.php');
?>





 