<?php
include 'dbconnect.php';
$id=$_GET["delete_id"];
//echo $id;
$res=mysqli_query($con,"DELETE from tbl_room WHERE `room_id`='$id'");
$row=mysqli_fetch_array($res);
header("location:rooms.php");
?>