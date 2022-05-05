<?php 
include('dbconnect.php');
session_start();
$var=$_SESSION['uname'];
$sql="select * FROM `tbl_register` where `reg_email` = '$var';";
$data= mysqli_query($con,$sql);
if($res=mysqli_fetch_assoc($data))
{
$ker=$res['reg_id']	;
//echo $ker;
$prod=$_GET["am"];
//echo $prod;

$sql2="INSERT INTO `tbl_cart`( `reg_id`, `product_id`) VALUES ('$ker','$prod');";
if(mysqli_query($con,$sql2))
{
echo "added to cart";
header("location:mycart.php");
}
  else
      {
		echo mysqli_errno($con);
      }
}
?>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>