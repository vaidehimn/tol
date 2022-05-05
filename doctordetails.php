<?php
include 'dbconnect.php';
if (isset($_POST["submit"]))
{
	$address=$_POST["address"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
	$spec=$_POST["spec"];
	$q=$_FILES["quali"]["name"];
	move_uploaded_file($_FILES["quali"]["tmp_name"],"images/".$_FILES["quali"]["name"]);
	$i=$_FILES["idp"]["name"];
	move_uploaded_file($_FILES["idp"]["tmp_name"],"images/".$_FILES["idp"]["name"]);
	$p=$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"images/".$_FILES["photo"]["name"]);

    mysqli_query($con, "INSERT INTO `tbl_doctdet`(`doctor_address`, `doctor_gender`, `doctor_dob`,
	 `doctor_spec`, `doctor_quali`, `doctor_idp`, `doctor_photo`)
	 VALUES ('$address','$gender','$age','$spec','$q','$i','$p')");
	header('location:doctordetails.php');
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
					  <h2 style="color: #9f8e64;">ADD DETAILS</h2><br>
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
							<span style="color: red; margin-left:55px; font-size:12px"></span>
							<br><label>Gender:</label>
								<input type="radio" id="gender" name="gender" value="Male" >
                            	<label for="male">Male</label>
                            	<input type="radio" id="gender" name="gender" value="Female" >
                            	<label for="age2">Female</label><br>  <br>
							<br><label>DOB:</label>
    						<input type="date" id="age" name="age" max="2022-04-04" placeholder="Age" ><br><br>
							<br><label>Specilization:</label>
    						<input type="text" id="spec" name="spec" placeholder="Specialization">
							<span style="color: red; margin-left:55px; font-size:12px"></span>
							<br><label>Qualification:</label>
    						<input type="file" id="quali" name="quali">
							<br><br><label>Id Proof:</label>
    						<input type="file" id="idp" name="idp"><br>
							<br><label>Photo:</label>
    						<input type="file" id="photo" name="photo" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"><br>
							<br><input type="submit"name="submit" id="mysubmit" value="Submit">
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
document.getElementById('spec').value.length==0)
{
span[7].innerText = "Complete the registration";
span[7].style.color = 'red';
return false;
}

}
  let address = document.getElementById('address');
  let span = document.getElementsByTagName('span');
  let spec = document.getElementById('spec');
  
  address.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(address.value))
  {
  span[7].innerText = "";
  span[7].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;
 

  }
  else
  {
  span[5].innerText = "enter a valid address";
  span[5].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }

  spec.onkeyup = function(){
   const regexn = /^[A-Za-z]{1,8}$/;
   if(regexn.test(spec.value))
  {
  span[6].innerText = "";
  span[6].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

}
  else
  {
  span[6].innerText = "specilization is invalid";
  span[6].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }

</script>


  <script>
     
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
