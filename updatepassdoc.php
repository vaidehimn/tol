<?php
include 'dbconnect.php';
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
  $pas=$_POST['password'];
  $cpas=$_POST['cpassword'];
  
  $query="UPDATE `tbl_register` SET `password`='$cpas' where `reg_email`='$email'";
 $query_run = mysqli_query($con,$query)or die($con);
 if($query_run)
 {

 }

}

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
			<!-- LOGO -->
			<a href="#" class="brand">
				<br><br>
			<img src="images/logo.png"  height="200" width="250"  align="left">	
			</a>
			<!-- SIDEBAR MENUS -->
			<ul class="side-menu top">
				<li class="active">
					<a href="doctor.php">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="viewassigndoc.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Assign</span>
					</a>
				</li>
				<li>
					<a href="prescription.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Prescription</span>
					</a>
				</li>
				<li>
					<a href="doctordetails.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Add Details</span>
					</a>
				</li>
				<li>
					<a href="updatepassdoc.php">
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
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">UPDATE PASSWORD</h2><br>
  						<form method="POST" action="login.php"enctype="multipart/form-data"> 
							<label>Password:</label>
    						<input type="password" id="password" name="password" placeholder="Password">
                            <label>Confirm Password:</label>
    						<input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
    						<input type="submit"name="submit" value="Submit">
  						</form>
					</div>
				</table>
			</main>
		</section>
		<script src="js/script.js"></script>
	</body>
</html>
