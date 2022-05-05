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
					<a href="admin.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="treatment.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Ayurvedic Packages</span>
					</a>
				</li>
				<li>
					<a href="rooms.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Rooms</span>
					</a>
				</li>
				<li>
					<a href="store.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Products</span>
					</a>
				</li>
                <li>
					<a href="assign.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Assign</span>
					</a>
				</li>
                <li>
					<a href="viewfeedback.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Feedback</span>
					</a>
				</li>
                <li>
					<a href="viewmaintenance.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Maintenance</span>
					</a>
				</li>
				<li>
					<a href="adddoctor.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Add Doctor</span>
					</a>
				</li>
                <li>
					<a href="addstaff.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Add Staff</span>
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
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>	
					</div>
				</div>        
				
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Recent Users</h3>
						</div>
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th>E-mail</th>
									<th>Phone</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							<?php
		  					include('dbconnect.php');
		 					$query="SELECT * FROM tbl_register";
							$data = mysqli_query($con,$query);
							while($res=mysqli_fetch_assoc($data))
							{
							?>
							<tr>
								<td><?php echo $res['reg_name'];?></td>
								<td><?php echo $res['reg_email'];?></td>
								<td><?php echo $res['reg_phone'];?></td>
								<td><?php echo $res['status'];?></td>
								<td><a href="inactive.php?aa=<?php echo $res['reg_id'];?>"><input type="button" value="Inactive">
  <a href="active.php?bb=<?php echo $res['reg_id'];?>"><input type="button" value="active"></td>
							</tr>
							<?php
							}
							?>								
						   	</tbody>
					    </table>
					</div>
				</div>
			</main>
		</section>
	 	<script src="js/script.js"></script>
	</body>
</html>
