<?php
include 'dbconnect.php';
if (isset($_POST["submit"]))
{
    $room=$_POST["room"];
	$description=$_POST["des"];
    mysqli_query($con, "INSERT INTO `tbl_maintenance`(`m_room`,`m_problem`) 
	VALUES ('$room','$description')");
	header('location:maintenance.php');
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
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">ADD MAINTENANCE</h2>
  						<form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data"> 
  							<br><label>Room Number:</label>
	    					<input type="text" id="room" name="room" placeholder="Enter Room Name">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label>Problem Description:</label>
							<input type="text" id="des" name="des" placeholder="Enter Problem">
    						<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<input type="submit"name="submit" id="mysubmit" value="Submit">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
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
 
if(document.getElementById('room').value.length==0 || 
document.getElementById('des').value.length==0)
{
span[7].innerText = "Complete the registration";
  span[7].style.color = 'red';
return false;
}

}
  let room = document.getElementById('room');
  let span = document.getElementsByTagName('span');
  let des = document.getElementById('des');
  
  room.onkeyup = function()
  {
  var regex = /^[0-9]{3}$/;
  if(regex.test(room.value))
  {
  span[5].innerText = "";
  span[5].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;
 

  }
  else
  {
  span[5].innerText = "enter a valid room number";
  span[5].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }

  des.onkeyup = function(){
   const regexn = /^[A-Za-z]{50}$/;
   if(regexn.test(des.value))
  {
  span[6].innerText = "";
  span[6].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

}
  else
  {
  span[6].innerText = "description is invalid";
  span[6].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }

</script>
