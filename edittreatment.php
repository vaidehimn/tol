<?php
include ('dbconnect.php');
session_start();
$id=$_GET["edit_id"];
//echo "$id";

$edit=mysqli_query($con, "SELECT * FROM `tbl_treatment` WHERE `treatment_id`='$id'");
$row=mysqli_fetch_array($edit);

if (isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $day=$_POST["day"];
    $amount=$_POST["amount"];
	$description=$_POST["des"];
	if($_FILES["image"]["tmp_name"]!="")
		$i=$_FILES["image"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	else
		$i=$row['image'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);
  mysqli_query($con,"UPDATE `tbl_treatment` SET `treatment_name`='$name',
  `treatment_image`='$i',`treatment_day`='$day',`treatment_amount`='$amount',
  `treatment_description`='$description' WHERE `treatment_id`='$id';");
  header("location:treatment.php");
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
		<title>Tree Of Life</title>
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
					<a href="treatment.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Ayurvedic Packages</span>
					</a>
				</li>
				<li>
					<a href="rooms.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Rooms</span>
					</a>
				</li>
				<li>
					<a href="store.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Products</span>
					</a>
				</li>
				<li>
					<a href="adddoctor.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Add Doctor</span>
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
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">EDIT PACKAGES</h2>
  						<form method="POST" action="#" enctype="multipart/form-data"> 
  							<label>Package Name:</label>
	    					<input type="text" id="name" name="name" value="<?php echo $row["treatment_name"];?> ">
							<label>Image:</label><br>
    						<img src="images/<?php echo $row["treatment_image"]?>" height="100" width="100"/>
							<input type="file" name="image" value="images/<?php echo $row["treatment_image"]?>" >
							<br><br>
   							<label>Days:</label>
    						<input type="text" id="day" name="day" value="<?php echo $row["treatment_day"];?> ">
							<label>Amount:</label>
							<input type="text" id="amount" name="amount" value="<?php echo $row["treatment_amount"];?> ">
    						<input type="submit"name="submit" value="Submit">
  						</form>
					</div>
				</table>
			</main>
		</section>
		<script src="js/script.js"></script>
	</body>
</html>
