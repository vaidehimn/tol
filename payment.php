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
					  <h2 style="color: #9f8e64;">PAYMENT</h2>
  						<form method="POST" action="success.php" onsubmit="return validate();" enctype="multipart/form-data"> 
                          <label>Gender:</label><br>
								<input type="radio" id="card" name="card" value="visa">
                            	<label for="visa">VISA</label><br>
                            	<input type="radio" id="card" name="card" value="master">
                            	<label for="master">MASTER</label><br>  <br>
                            <label>Name on Card:</label>
	    					<input type="text" id="name" name="name" placeholder="Add treatment name">
							<span style="color: red; margin-left:50px; font-size:12px"></span><br>
   							<label>Card Number:</label>
							<input type="text" id="day" name="day" placeholder="Enter duration">
							<span style="color: red; margin-left:55px; font-size:12px"></span><br>
							<label>CVV :</label>
							<input type="text" id="amount" name="amount" placeholder="Enter service cost">
    						<span style="color: red; margin-left:55px; font-size:12px"></span><br>
                            <label>Expiry Date:</label>
    						<input type="month" id="date" name="date" placeholder="Expiry Date"><br><br>
							<input type="submit" id="mysubmit" name="submit" value="Submit">
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
 
if(document.getElementById('name').value.length==0 || 
document.getElementById('day').value.length==0 || 
document.getElementById('amount').value.length==0)
{
span[8].innerText = "Complete the registration";
  span[8].style.color = 'red';
return false;
}

}
  let name = document.getElementById('name');
  let span = document.getElementsByTagName('span');
  let days = document.getElementById('day');
  let amounts = document.getElementById('amount');
  
  name.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(name.value))
  {
  span[5].innerText = "";
  span[5].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

 

  }
  else
  {
  span[5].innerText = "enter a valid name";
  span[5].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;



  }
  }
 
 days.onkeyup = function(){
   const regexn = /^[A-Za-z0-9]{1,8}$/;
   if(regexn.test(days.value))
  {
  span[6].innerText = "";
  span[6].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

}
  else
  {
  span[6].innerText = "number of days is invalid";
  span[6].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }


  amounts.onkeyup = function(){
   const regexn = /^[A-Za-z0-9]{1,8}$/;
   if(regexn.test(amounts.value))
  {
  span[7].innerText = "";
  span[7].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;


}
  else
  {
  span[7].innerText = "amount is invalid";
  span[7].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;


  }
  }

</script>
