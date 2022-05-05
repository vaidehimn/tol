<?php
include 'dbconnect.php';
if (isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $age=$_POST["age"];
	$pres=$_POST["pres"];
    $dname=$_POST["dname"];
	$phone=$_POST["phone"];
    mysqli_query($con, "INSERT INTO `tbl_prescription`(`p_name`, `p_age`, `p_pres`, `d_name`, `d_phone`) 
    VALUES ('$name','$age','$pres','$dname','$phone')");
	header('location:prescription.php');
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
            <img src="images/logo.png" height="200" width="250" align="left">
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
                    <h2 style="color: #9f8e64;">PRESCRIPTION</h2><br>
                    <form method="POST" action="makepdf.php" enctype="multipart/form-data" onsubmit="return validate();">
                        <label>Name:</label>
                        <input type="text" id="name" name="name" placeholder="Name">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Age:</label>
                        <input type="text" id="age" name="age" placeholder="Age">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Prescription:</label>
                        <input type="text" id="pres" name="pres" placeholder="Prescription">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Doctor's Name:</label>
                        <input type="text" id="dname" name="dname" placeholder="Doctor Name">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Doctor's Phone:</label>
                        <input type="text" id="phone" name="phone" placeholder="Phone number">
                        <input type="submit" name="submit" id="mysubmit" value="Submit">
                       
                        <span style="color: red; margin-left:250px; font-size:12px"></span><br>
                    </form>
                </div>
            </table>
        </main>
    </section>
    <script src="js/script.js"></script>
</body>

</html>
<script type="text/javascript">
function validate() {
    if (document.getElementById('name').value.length == 0 || 
    document.getElementById('email').value.length == 0 ||
        document.getElementById('phone').value.length == 0 || 
        document.getElementById('cpassword').value.length == 0) {
        span[14].innerText = "Complete the registration";
        span[14].style.color = 'red';
        return false;
    }

}
let name = document.getElementById('name');
let span = document.getElementById('span');
let email = document.getElementById('email');
let phn = document.getElementById('phone');
let pass1 = document.getElementById('cpassword');
name.onkeyup = function() {
    var regex = /^([\.\_a-zA-Z0-9]+)([a-zA-Z0-9 ]+){1,30}$/;
    if (regex.test(name.value)) {
        span[11].innerText = "";
        span[11].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[11].innerText = "enter a valid name";
        span[11].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
email.onkeyup = function() {
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if (regex.test(email.value)) {
        span[12].innerText = "";
        span[12].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[12].innerText = "your email is invalid";
        span[12].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
phn.onkeyup = function() {
    const regexn = /^[0-9]{10}$/;
    if (regexn.test(phn.value)) {
        span[13].innerText = "";
        span[13].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[13].innerText = "your number is invalid";
        span[13].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
window.onscroll = function() {
    myFunction()
};
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
                       
                       