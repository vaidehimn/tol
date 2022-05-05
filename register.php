<?php
include('dbconnect.php');
if(isset($_POST['submit']))
{    
	$uname=$_POST['name'];
	$mail=$_POST['email'];
	$mobile=$_POST['phone'];
    $cpassword=$_POST['password'];
	 $cpas=md5($cpassword);

		
		$sql="INSERT INTO `tbl_register`( `reg_name`, `reg_email`, `reg_phone`, `password`, `status`) 
        VALUES ('$uname','$mail','$mobile','$cpas',0)";
		if(mysqli_query($con,$sql))
	    {  
        $sql1="SELECT * from `tbl_register` WHERE `reg_email`='$mail'";
        $data = mysqli_query($con,$sql1);
        if($res=mysqli_fetch_assoc($data)){
          $sql2="SELECT * from `tbl_usertype` WHERE `type_name`='user'";
          $data1 = mysqli_query($con,$sql2);
          if($row=mysqli_fetch_assoc($data1)){
            $r = $res['reg_id'];
            $t = $row['type_id'];

            $sql3 = "INSERT INTO `tbl_login` (`reg_id`,`type_id`) VALUES ('$r','$t')";
            if(mysqli_query($con,$sql3))
            {
              echo"registered successfully";
              header('location:login.php');
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

<div id='login-form' class='login-page'>
            <!---creating form box----->
            <div class="form-box">
                <p><center><b>REGISTER HERE</b></center></p>
                <!---creating register form----->
                <form action="#" method="post" onsubmit="return validate();" >
                    <input type='text' id="name" name="name" class='input-field' placeholder='First Name'>
                    <span style="color: red; margin-left:55px; font-size:12px"></span>
                    <input type='email' id="email" name="email" class='input-field' placeholder='Email'>
                    <span style="color: red; margin-left:55px; font-size:12px"></span>
                    <input type='text' id="phone" name="phone" class='input-field' placeholder='Mobile'>
                    <span style="color: red; margin-left:55px; font-size:12px"></span>
                    <input type='password' id="pass1" class='input-field' placeholder='Enter Password'>
                    <input type='password' id="pass2" name="password" class='input-field' placeholder='Confirm Password'><br>
                    <span style="color: red; margin-left:55px; font-size:12px"></span>
                    <button type='submit' class='submit-btn'id="mysubmit" name="submit">Register</button>
                    <span style="color: red; margin-left:12px;"></span>
                    <center><p style="font-size:15px">Already have an account ?<a href="login.php">Signin</a> <p>
                    </center>
                </form> 
            </div>
        </div>




<script type="text/javascript">
function validate()
{  
 
if(document.getElementById('name').value.length==0 || 
document.getElementById('email').value.length==0 || 
document.getElementById('phone').value.length==0 ||
document.getElementById('pass1').value.length==0 || 
document.getElementById('pass2').value.length==0)
{
span[4].innerText = "Complete the registration";
  span[4].style.color = 'red';
return false;
}

}
  let name = document.getElementById('name');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('email');
  let phn = document.getElementById('phone');
  let pass1 = document.getElementById('pass1');
  let pass2 = document.getElementById('pass2');
  
  name.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(name.value))
  {
  span[0].innerText = "";
  span[0].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[0].innerText = "enter a valid name";
  span[0].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }
 
  email.onkeyup = function(){
  const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
  const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
  if(regex.test(email.value) || regexo.test(email.value))
  {
  span[1].innerText = "";
  span[1].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[1].innerText = "your email is invalid";
  span[1].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;
  }
 }
 phn.onkeyup = function(){
   const regexn = /^[0-9]{10}$/;
   if(regexn.test(phn.value))
  {
  span[2].innerText = "";
  span[2].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;
}
  else
  {
  span[2].innerText = "your number is invalid";
  span[2].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;
  }
  }

   pass2.onkeyup = function(){
   if (document.getElementById('pass1').value==document.getElementById('pass2').value)
   
  {
  span[3].innerText = "";
  span[3].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;
  }
  else
  {
  span[3].innerText = "password doesn't match";
  span[3].style.color = 'red';
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

</body>
</html>
