<?php
include 'dbconnect.php';
$id=$_GET["delete_id"];
//echo $id;
$res=mysqli_query($con,"DELETE from tbl_treatment WHERE `treatment_id`='$id'");
$row=mysqli_fetch_array($res);
header("location:treatment.php");
?>