<?php
include('dbconnect.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/logreg.css">
</head>
<body>
<div id="navbar">
  <a class="active" href="index.php">Home</a>
  <a href="index.php#treatments">Ayurvedic Packages</a>
  <a href="index.php#rooms">Accomodations</a>
  <a href="index.php#products">Products</a>
  <a href="index.php#gallery">Gallery</a>
  <a href="#">Login</a>
</div>
<form action="#" method="post" >
<div id='login-form' class='login-page'>
            <!---creating form box----->
            <div class="form-box">
<br><p><center><b>LOGIN HERE</b></center></p><br>
    <input type="text" placeholder="Enter your email id" class='input-field' name="uname" required/>
    
	<br><br>
    <input type="password" placeholder="Enter Password" class='input-field' name="psw" required>
    <br><br>
    <center> <button type='submit' class='submit-btn' name="submit">Login</button></center><br>
    <center><p style="font-size:15px">Don't have an account ?<a href="register.php">Signup</a> <p></center>
    <br>
</div>
        </div>
</div>
        <?php
		
	if(isset($_POST['submit']))
{  
	$us=$_POST['uname'];
	$password=$_POST['psw'];
	
	
	$query=" SELECT * FROM `tbl_register` WHERE `reg_email`='$us' ";
	$res=mysqli_query($con,$query);
	if($data5 = mysqli_fetch_assoc($res))
	{
	if(mysqli_num_rows($res)>0)
{
		$rid = $data5['reg_id'];
		echo $rid;
		$result = "SELECT * FROM `tbl_login` WHERE `reg_id`='$rid' ";
		
		$res1=mysqli_query($con,$result);
	 
		if($data1 = mysqli_fetch_assoc($res1))
	{ 
		$tid = $data1['type_id'];
	                    
            
			 if($tid==3)
					   {
						   header('location:admin.php');
					   }
					   elseif($tid==1)
					   {
						   $_SESSION['uname']=$us;
						   header('location:doctor.php');
					   }
					   elseif($tid==2)
					   {
						   $_SESSION['uname']=$us;
						   header('location:staff.php');
					   }
					   elseif($tid==4)
					   {
						$_SESSION['uname']=$us;
						   header('location:user.php');
					   
					}
				}
                    
                                    }  
									 else
                     {
                       echo '<script type="text/javascript"> alert("invalid user name or password!!")</script>';
                                      } 
									}
									
								}     



?> 
</body>
</html>
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
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 




