<?php
include ('dbconnect.php');
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Tree of Life</title>
</head>
<body>

<div class="header">
  <h2>TREE OF LIFE</h2>
  <p>Resorts & Hotels</p>
</div>

<div id="navbar">
  <a class="active" href="#">Home</a>
  <a href="#treatments">Ayurveda Packages</a>
  <a href="#rooms">Accomodations</a>
  <a href="#products">Products</a>
  <a href="#gallery">Gallery</a>
  <a href="login.php">Login</a>
  <img src="images/lll.png" alt="Forest" style="float:right;" width="200" height="50">
</div>

<div class="content">
  <h3><center>Tree of Life</center></h3>
  <p  style="font-size:20px;">Situated in Jaipur and Varanasi, these resorts redefine the word ‘luxury’. Be it Villas with private pools in Jaipur or then 700 sqft junior suites in Varanasi which are custom designed to reflect the essence of the city. Our Expressions level takes attention to detail and personalised service to a whole new level.</p>
  <p  style="font-size:20px;">At the Aryavaidyasala (Ayurveda Spa), the resort offers you authentic ayurveda treatment , naturopathy, marma ,pranic healing and yoga classes. A complete treatment for your mind, body and soul under expert guidance.
For leisure activities you have a beach, world famous backwaters, swimming pool, cycling, village walk and 25 acres of landscape gardens providing you the solace of nature and environment.
We offer spacious exquisitely designed villas, exhibiting a classic fusion of traditional and modern décor.</p>
</div>

<!-- ROOMS-->
<div class="treatments" id="treatments">
<center><h2><u>TREATMENTS</u></h5></center>
<div class="row">
  <?php
  $s=mysqli_query($con,"SELECT `treatment_name`, `treatment_image`, `treatment_day`, `treatment_amount` FROM `tbl_treatment`");
  while($r=mysqli_fetch_array($s))
  {
    echo"<div class='column'>";
    echo"<div class='card'>";
    echo"<h3>".$r["treatment_name"]."</h3>";
    echo"<img src='".$r ['treatment_image']."' width=250 height=100>";
    echo"<p>".$r['treatment_day']."</p>";
    echo"<p>".$r['treatment_amount']."</p>";
	  echo"<p><a href='login.php'><input type='button' value='BOOK NOW'></a></p></div></div>";
  }
  ?>
  
</div>
</div>

<div class="rooms" id="rooms">
<center><h2><u>ACCOMODATIONS</u></h5></center>
<div class="row">
  <?php
  $s=mysqli_query($con,"SELECT `room_name`, `room_image`, `room_amount` FROM `tbl_room`");
  while($r=mysqli_fetch_array($s))
  {
    echo"<div class='column'>";
    echo"<div class='card'>";
    echo"<h3>".$r["room_name"]."</h3>";
    echo"<img src='".$r['room_image']."' width=250 height=100>";
    echo"<p>".$r['room_amount']."</p>";
	  echo"<p><a href='login.php'><input type='button' value='BOOK NOW'></a></p></div></div>";
  }
  ?>
  
</div>
</div>

<div class="products" id="products">
<center><h2><u>OUR PRODUCTS</u></h5></center>
<div class="row">
  <?php
  $s=mysqli_query($con,"SELECT `product_name`, `product_image`, `product_amount` FROM `tbl_product`");
  while($r=mysqli_fetch_array($s))
  {
    echo"<div class='column'>";
    echo"<div class='card'>";
    echo"<img src='".$r ['product_image']."' width=200 height=200>";
    echo"<h3>".$r["product_name"]."</h3>";
    echo"<p>".$r['product_amount']."</p>";
	  echo"<p><a href='login.php'><input type='button' value='BUY NOW'></a></p></div></div>";
  }
  ?>
  
</div>
</div>


<div id="gallery">
 <center><h2><u>GALLERY</u></h5></center>
 </div>
 <div class="g">
 <table cellspacing="0" align="center">
  <tr>
    <th><a href="images/g1.jpg"><img src="images/g1.jpg" style="width:100%" "height:100%" alt=""></a></th>
    <th><a href="images/g2.jpg"><img src="images/g2.jpg" style="width:100%" "height:100%" alt=""></a></th> 
	<th><a href="images/g3.jpg"><img src="images/g3.jpg" style="width:100%" "height:100%" alt=""></a></th> 
	</tr>
	  <tr>
    <th><a href="images/g4.jpg"><img src="images/g4.jpg" style="width:100%" "height:100%" alt=""></a></th>
    <th><a href="images/g5.jpg"><img src="images/g5.jpg" style="width:100%" "height:100%" alt=""></a></th> 
	<th><a href="images/g6.jpg"><img src="images/g6.jpg" style="width:100%" "height:100%" alt=""></a></th> 
	</tr>
	  <tr>
    <th><a href="images/g7.jpg"><img src="images/g7.jpg" style="width:100%" "height:100%" alt=""></a></th>
    <th><a href="images/g8.jpg"><img src="images/g8.jpg" style="width:100%" "height:100%" alt=""></a></th> 
	<th><a href="images/g9.jpg"><img src="images/g9.jpg" style="width:100%" "height:100%" alt=""></a></th> 
	</tr>
	</table>
</div><br><hr>


<div class="footer">
  <br><p>Copyright © 2021 | Tree of Life Resorts & Hotels</p>
</div>


<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>

