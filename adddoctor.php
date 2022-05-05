<?php
include('dbconnect.php');
session_start();
if(isset($_POST['submit']))
{    
	$uname=$_POST['name'];
	$mail=$_POST['email'];
	$mobile=$_POST['phone'];
    $cpassword=$_POST['cpassword'];
	$cpas=md5($cpassword);
	$sql="INSERT INTO `tbl_register`( `reg_name`, `reg_email`, `reg_phone`, `password`, `status`) VALUES ('$uname','$mail','$mobile','$cpas',0)";
	if(mysqli_query($con,$sql))
	{  
        $sql2= "SELECT * FROM `tbl_register` WHERE `reg_email`='$mail'";
        $data=mysqli_query($con,$sql2);
        if($res=mysqli_fetch_assoc($data))
        {
            $sql3="SELECT * FROM `tbl_usertype` WHERE `type_name`='Doctor'";
            $data1=mysqli_query($con,$sql3);
            if($row=mysqli_fetch_assoc($data1))
            {
                $reg=$res['reg_id'];
                $type=$row['type_id'];
                $sql4="INSERT INTO `tbl_login` (`reg_id`,`type_id`) VALUES ('$reg','$type')";
                if(mysqli_query($con,$sql4))
                {
                    echo "success";
                }
                else
                {
                    echo mysqli_errno($con);
                }
            }
        }
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
            <img src="images/logo.png" height="200" width="250" align="left">
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
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Rooms</span>
					</a>
				</li>
				<li>
					<a href="store.php">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Products</span>
					</a>
				</li>
                <li>
					<a href="assign.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Assign</span>
					</a>
				</li>
                <li>
					<a href="viewfeedback.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Feedback</span>
					</a>
				</li>
                <li>
					<a href="viewmaintenance.php">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Maintenance</span>
					</a>
				</li>
				<li>
					<a href="adddoctor.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Add Doctor</span>
					</a>
				</li>
                <li>
					<a href="addstaff.php">
						<i class='bx bxs-group' ></i>
						<span class="text">Add Staff</span>
					</a>
				</li>
                
			</ul>
        <ul class="side-menu">
            <li>
                <a href="login.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
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
                    <h2 style="color: #9f8e64;">ADD DOCTOR</h2><br>
                    <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return validate();">
                        <label>Name:</label>
                        <input type="text" id="name" name="name" placeholder="Name">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Phone:</label>
                        <input type="text" id="phone" name="phone" placeholder="Phone number">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Password:</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Password">
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