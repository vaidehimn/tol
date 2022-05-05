<?php
include 'dbconnect.php';
if (isset($_POST["submit"]))
{

	$address=$_POST["address"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
	$city=$_POST["city"];
    $pincode=$_POST["pincode"];
    $treatment=$_POST["treatment"];
	$room=$_POST["room"];
	$date=$_POST["date"];
    mysqli_query($con, "INSERT INTO `tbl_booking`(`book_address`, `book_gender`, `book_dob`, `book_city`, `book_pincode`, `book_treatment`, `book_room`, `book_adate`)
	 VALUES ('$address','$gender','$age','$city','$pincode','$treatment','$room','$date')");
	header('location:success.php');
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
					  <h2 style="color: #9f8e64;">BOOKING</h2>
  						<form method="POST" action="#"enctype="multipart/form-data" onsubmit="return validate();" > 
  							 <?php
						   session_start();
						   $var = $_SESSION['uname'];
						   $sql = "SELECT * FROM `tbl_register` WHERE `reg_email`= '$var'";
						   $data = mysqli_query($con, $sql);
						   if($row = mysqli_fetch_array($data))
						   {

						 ?>	
							<label>Name:</label>
						  <label><?php ECHO $row['reg_name'] ;?></label><br><br>
							<label>Email:</label>
							<label><?php ECHO $row['reg_email'] ;?></label><br><br>
							<label>Phone Number:</label>
    						<label><?php ECHO $row['reg_phone'] ;?></label><br><br>
								<?php
				}
				?>
							<label>Address:</label>
    						<input type="text" id="address" name="address" placeholder="Address">
							<span style="color: red; margin-left:55px; font-size:12px"></span><br>
							<label>City:</label>
    						<input type="text" id="city" name="city" placeholder="City">
							<span style="color: red; margin-left:55px; font-size:12px"></span><br>
							<label>Pincode:</label>
							<input type="text" id="pincode" name="pincode" placeholder="Pincode">
							<span style="color: red; margin-left:55px; font-size:12px"></span><br>
							<label>Ayurvedic Packages:</label>
								<select name="treatment" id="treatment">
								<option value="immun">Immunisation Packet</option>
								<option value="beauty">Beauty Care Package</option>
 								<option value="reju">Rejuvenation Package </option>
 							    <option value="slim">Slimming Package</option>
								</select><br>
							<label>Room Type:</label>
							<select name="room" id="room">
 									<option value="r1">Pool Suite</option>
  									<option value="r2">Garden Suite </option>
 									<option value="r3">Patio Room</option>
 								    <option value="r4">Delux Room</option>
								</select><br>
							<label>Arrival Date:</label>
							<input type="date" id="date" name="date" min="2022-04-06"><br><br>
    						<input type="submit"name="submit" value="Submit">
							<span style="color: red; margin-left:55px; font-size:12px"></span>
  						</form>
					</div>
				</table>

				
			</main>
		</section>
		<script src="js/script.js"></script>
	</body>
</html>

<script type="text/javascript">
function validate()
{  
 
if(document.getElementById('address').value.length==0 ||
document.getElementById('city').value.length==0 || 
document.getElementById('pincodee').value.length==0)
{
span[7].innerText = "Complete the registration";
  span[7].style.color = 'red';
return false;
}

}
  let span = document.getElementsByTagName('span');
  let address = document.getElementById('address');
  let city = document.getElementById('city');
  let pincode = document.getElementById('pincode');

  address.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(address.value))
  {
  span[4].innerText = "";
  span[4].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[4].innerText = "enter a valid address";
  span[4].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }
  city.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,20}$/;
  if(regex.test(city.value))
  {
  span[5].innerText = "";
  span[5].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[5].innerText = "enter a valid city name";
  span[5].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }
  pincode.onkeyup = function()
  {
  var regex = /^[0-9]{6}$/;
  if(regex.test(pincode.value))
  {
  span[6].innerText = "";
  span[6].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[6].innerText = "enter a valid pincode";
  span[6].style.color = 'red';
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
