<?php
include 'dbconnect.php';
session_start();
$var = $_SESSION['uname'];
if (isset($_POST["submit"]))
{
	
	$feedback=$_POST["feedback"];
	$sql1 = "SELECT * FROM `tbl_register` WHERE `reg_email`= '$var'";
	$data1 = mysqli_query($con, $sql1);
	$row1 = mysqli_fetch_array($data1);
	$id = $row1['reg_id'];
    mysqli_query($con, "INSERT INTO `tbl_feedback`(`feedback_regid`,`feedback`)
	 VALUES ('$id','$feedback')");
	header('location:feedback.php');
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
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">FEEDBACK</h2>
  						<form method="POST" action="#"enctype="multipart/form-data" onsubmit="return validate();" > 
  							 <?php
						   
						   $sql = "SELECT * FROM `tbl_register` WHERE `reg_email`= '$var'";
						   $data = mysqli_query($con, $sql);
						   if($row = mysqli_fetch_array($data))
						   {

						 ?>	
							<br><label>Name:</label>
						  <label><?php ECHO $row['reg_name'] ;?></label><br><br>
							<br><label>Email:</label>
							<label><?php ECHO $row['reg_email'] ;?></label><br><br>
							<br><label>Phone Number:</label>
    						<label><?php ECHO $row['reg_phone'] ;?></label><br><br>
								<?php
				}
				?>
							<br><label>Feedback:</label>
    						<input type="text" id="feedback" name="feedback" placeholder="Enter Feedback">
							<span style="color: red; margin-left:55px; font-size:12px"></span><br>
    						<input type="submit"name="submit" id="mysubmit" value="Submit">
							<span style="color: red; margin-left:55px; font-size:12px"></span>
  						</form>
					</div>
				</table>

				
			</section>
		</main>
		<script src="js/script.js"></script>
	</body>
</html>

<script type="text/javascript">
function validate()
{  
 
if(document.getElementById('feedback').value.length==0)
{
span[8].innerText = "Complete the registration";
  span[8].style.color = 'red';
return false;
}

}
  let span = document.getElementsByTagName('span');
  let feedback = document.getElementById('feedback');


  feedback.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(feedback.value))
  {
  span[7].innerText = "";
  span[7].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[7].innerText = "enter a valid feedback";
  span[7].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }
  
     
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
