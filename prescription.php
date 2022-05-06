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
                        <input type="text" id="name" name="name" placeholder="Name" required>
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Age:</label>
                        <input type="text" id="age" name="age" placeholder="Age" required>
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Prescription:</label>
                        <input type="text" id="pres" name="pres" placeholder="Prescription" required>
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Doctor's Name:</label>
                        <input type="text" id="dname" name="dname" placeholder="Doctor Name" required>
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Doctor's Phone:</label>
                        <input type="text" id="phone" name="phone" placeholder="Phone number" required>
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <input type="submit" name="submit" id="mysubmit" value="Create PDF">
                       
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
        span[12].innerText = "Complete the registration";
        span[12].style.color = 'red';
        return false;
    }

}
let name = document.getElementById('name');
let span = document.getElementById('span');
let age = document.getElementById('age');
let pres = document.getElementById('pres');
let dname = document.getElementById('dname');
let phone = document.getElementById('phone');
name.onkeyup = function() {
    var regex = /^([\.\_a-zA-Z0-9]+)([a-zA-Z0-9 ]+){1,30}$/;
    if (regex.test(name.value)) {
        span[7].innerText = "";
        span[7].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[7].innerText = "enter a valid name";
        span[7].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}

age.onkeyup = function() {
    const regexn = /^[0-9]{2}$/;
    if (regexn.test(phone.value)) {
        span[8].innerText = "";
        span[8].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[8].innerText = "your age is invalid";
        span[8].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
pres.onkeyup = function() {
    var regex = /^([\.\_a-zA-Z0-9]+)([a-zA-Z0-9 ]+){1,30}$/;
    if (regex.test(pres.value)) {
        span[9].innerText = "";
        span[9].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[9].innerText = "enter a valid name";
        span[9].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
dname.onkeyup = function() {
    var regex = /^([\.\_a-zA-Z0-9]+)([a-zA-Z0-9 ]+){1,30}$/;
    if (regex.test(dname.value)) {
        span[10].innerText = "";
        span[10].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[10].innerText = "enter a valid name";
        span[10].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
phone.onkeyup = function() {
    const regexn = /^[0-9]{10}$/;
    if (regexn.test(phone.value)) {
        span[11].innerText = "";
        span[11].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[11].innerText = "your number is invalid";
        span[11].style.color = 'red';
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
                       
                       