<?php 
include('dbconnect.php');
session_start();
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
				
				<div class="table-data">
					<div class="order">
                        <center>
<h1>PAYMENT SUCCESS</h1></center>
					</div>
</div>


		

</section>




		
	<script src="js/script.js"></script>
	</body>
</html>

