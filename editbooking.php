<?php
include ('dbconnect.php');
session_start();
$id=$_GET["edit_id"];
//echo "$id";

$edit=mysqli_query($con, "SELECT * FROM `tbl_room` WHERE `room_id`='$id'");
$row=mysqli_fetch_array($edit);

if (isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $amount=$_POST["amount"];
	$description=$_POST["des"];
	if($_FILES["image"]["tmp_name"]!="")
		$i=$_FILES["image"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	else
		$i=$row['image'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);
  mysqli_query($con,"UPDATE `tbl_room` SET `room_name`='$name',`room_image`='$i',`room_amount`='$amount',
  `room_description`='$description' WHERE `room_id`='$id';");
  header("location:rooms.php");
 }


//multipart must be there where img used
 
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
					<a href="admin.php">
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
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">EDIT ROOM</h2>
  						<form method="POST" action="#" enctype="multipart/form-data"> 
  							<label>Name:</label>
	    					<input type="text" id="name" name="name" value="<?php echo $row["room_name"];?> ">
							<label>Email:</label>
							<input type="text" id="amount" name="amount" value="<?php echo $row["room_amount"];?> ">
							<label>Address:</label>
    						<input type="text" id="des" name="des" value="<?php echo $row["room_description"];?> ">
                            <label>Gender:</label>
	    					<input type="text" id="name" name="name" value="<?php echo $row["room_name"];?> ">
							<label>DOB:</label>
							<input type="text" id="amount" name="amount" value="<?php echo $row["room_amount"];?> ">
							<label>City:</label>
    						<input type="text" id="des" name="des" value="<?php echo $row["room_description"];?> ">
                            <label>Ayurvedic Package:</label>
							<input type="text" id="amount" name="amount" value="<?php echo $row["room_amount"];?> ">
							<label>Room:</label>
    						<input type="text" id="des" name="des" value="<?php echo $row["room_description"];?> ">
    						<input type="submit"name="submit" value="Submit">
  						</form>
					</div>
				</table>
			</main>
		</section>
		<script src="js/script.js"></script>
	</body>
</html>
