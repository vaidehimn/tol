
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link rel="stylesheet" href="css/dashuser.css">
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
					<a href="managebooking.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Manage Booking</span>
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
					<a href="#">
						<i class='bx bxs-cog' ></i>
						<span class="text">Settings</span>
					</a>
				</li>
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
						<div class="head">
						<h2>Welcome</h2>
						</div>
						<table>
						<?php
		  							include('dbconnect.php');
		  					 		$query="SELECT * FROM tbl_register";
									$data = mysqli_query($con,$query);
									while($res=mysqli_fetch_assoc($data))
									{
								?>
								<tr>
									<td valign="top"><b>Name</b></td>
									<td valign="top"><p><?php echo $res['reg_name'];?></p></td>

								</tr>
								<tr>
									<td><b>Email</b></td>
 									<td><p><?php echo $res['room_email'];?></p></td>
								</tr>
								<tr>
									<td><b>Mobile</b></td>
									<td></td>
								</tr>
                                <tr>
									<td valign="top"><b>Address</b></td>
									<td valign="top"><p><?php echo $res['room_phone'];?></p></td>

								</tr>
								<tr>
									<td><b>Gender</b></td>
 									<td></td>
								</tr>
				
                                <tr>
									<td valign="top"><b>City</b></td>
									<td valign="top"></td>

								</tr>
								<tr>
									<td><b>State</b></td>
 									<td></td>
								</tr>
								<tr>
									<td><b>Zip code</b></td>
 									<td></td>
								</tr>
								<tr>
									<td><b>Ayurvedic Package</b></td>
 									<td></td>
								</tr>
								<tr>
									<td><b>Room Type</b></td>
									<td></td>
								</tr>
					    </table>
		
			
						<a href="editbooking.php?edd_id=<?php echo $res['reg_id'];?>"><input type='button' value='BOOK NOW'></a>

					</div>
				</div>
			</main>
		</section>
	<script src="js/script.js"></script>
	</body>
</html>
