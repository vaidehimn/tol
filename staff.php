<?php
include('dbconnect.php');
session_start();
$us=$_SESSION['uname'];
echo $us;
$result4 = mysqli_query($con,"SELECT * FROM `tbl_register` where `reg_email`='$us' ");
while($row3 = mysqli_fetch_array($result4))
{
$uname=$row3['reg_name'];
$mail=$row3['reg_email'];
$mobile=$row3['reg_phone'];

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
					<a href="staff.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="staffdetails.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Add Details</span>
					</a>
				</li>
                <li>
					<a href="maintenance.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Maintenance</span>
					</a>
				</li>
				<li>
					<a href="updatepassstaff.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Update Password</span>
					</a>
				</li>
				<li>
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
				<ul class="box-info">
					
					
				</ul>
				<div class="table-data">
					<div class="order">

					<div class="head">
						<h2>Welcome  <?php ECHO $us;?></h2>
						</div>
						<table>
								<tr>
									<td valign="top"><b>FirstName</b></td>
									<td valign="top"><?php echo  $uname; ?></td>

								</tr>
								<tr>
									<td><b>Email</b></td>
 									<td><?php echo $mail; ?></td>
								</tr>
								<tr>
									<td><b>Mobile</b></td>
									<td><?php echo $mobile; ?></td>
								</tr>

								<?php
								}
								?>
				
					    </table>
					</div>
				</div>
			</main>
		</section>
	 	<script src="js/script.js"></script>
	</body>
</html>
