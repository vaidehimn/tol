<?php
include ('dbconnect.php');
session_start();
$reg=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link rel="stylesheet" href="css/dashboard.css">
			<title>Tree of Life</title>
			<style>
				div.gallery {
  margin: 5px;
  border: 1px solid white;
  float: left;
  width: 280px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 40%;
}

div.desc {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:25px;
}
</style>
	</head>
	<body>
	<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<br><br>
				<img src="images/logo.png"  height="200" width="250"  align="left">
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="user.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				
				<li>
					<a href="booking.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Booking</span>
					</a>
				</li>

				<li>
					<a href="product.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Products</span>
					</a>
</li>
				<li>
					<a href="mycart.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">My Cart</span>
					</a>
				</li>
				<li>
					<a href="viewassigncus.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Assign</span>
					</a>
				</li>
				<li>
					<a href="feedback.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Feedback</span>
					</a>
				</li>
				<li>
					<a href="updatepassword.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Update Password</span>
					</a>
				</li>
			</ul>
			<ul class="side-menu">
			
				<li>
					<a href="login.php" class="logout">
						<i class='bx bxs-log-out-circle' ></i>
						<span class="text">Logout</span>
					</a>
				</li>
			</ul>
		</section>

		<!-- CONTENT -->
		<section id="content">
			<!-- MAIN -->
			<main>       
			
            <div class="products" id="products">
<center><h2><u>OUR PRODUCTS</u></h5></center>
<div class="row">
  <?php
  $s=mysqli_query($con,"SELECT `product_id`, `product_name`, `product_image`, `product_amount` FROM `tbl_product`");
  while($r=mysqli_fetch_array($s))
  {
   
	
  
  ?>
  <form action="manage_cart.php" method="POST">
  <div class="gallery">
 
 
	 <img src="images/<?php echo $r ['product_image']; ?>" alt="Cinque Terre" width="200px" height="200px" >
	 </a> <div class="prod"><?php echo $r['product_name'];?></div>
		  <div class="Price"> ₹<?php echo $r['product_amount'];?></div>
		  <button type="submit"name="Add_to_cart"  class="btn btn-info">Add to Cart</button>
		  <input type="hidden" name="prod"value="<?php echo $r['product_name'];?>">  
		<input type="hidden" name="Price"value="<?php echo $r['product_amount'];?>"> 
		
	
  </div>
  </form>
<?php
}
?>
			</main>
		</section>
	<script src="js/script.js"></script>
	</body>
</html>
