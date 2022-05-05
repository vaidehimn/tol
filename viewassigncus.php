<?php
include 'dbconnect.php';

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
		<a href="#" class="brand"><br><br>
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
				<!-- EDIT AND DELETE TABLE -->
				<div class="table-data">
					<div class="order">
						<div class="head">
						<h2 style="color: #9f8e64;">YOUR DOCTOR</h2><br>
						</div>
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
                                    <th>Phone</th>
								</tr>
							</thead>
                            <?php
							session_start();
							$us=$_SESSION['uname'];
						
						
                             $query="SELECT * FROM `tbl_register` WHERE `reg_email` = '$us'";
                             $data = mysqli_query($con,$query);
                             while($res=mysqli_fetch_assoc($data))
                             {
									$cuid = $res['reg_id'];
								
                                $query2 = "SELECT * FROM `tbl_assign` WHERE `cust_id` = '$cuid'";
                                $data2 = mysqli_query($con,$query2);
                                while($res10=mysqli_fetch_assoc($data2))
                                {
									$doid = $res10['doct_id'];
                                    
									$query3 = "SELECT * FROM `tbl_register` WHERE `reg_id`='$doid'";
									$data3 = mysqli_query($con,$query3);
									while($res11=mysqli_fetch_array($data3))
									{
										$name = $res11['reg_name'];
										$email = $res11['reg_email'];
										$phone = $res11['reg_phone'];
										
						  ?>

							<tbody>
								<tr>
									<td><p><?php echo $name;?></p></td>
									<td><p><?php echo $email;?></p></td> 
                                    <td><p><?php echo $phone;?></p></td> 						
								</tr>
							
							</tbody>
                            <?php
                                }
                            }
							 }
                        
                                ?>
						</table>
					</div>
				</div>	
			</main>
		</section>
		<script src="js/script.js"></script>
	</body>
</html>
<script type="text/javascript">
function validate()
{  
 
if(document.getElementById('name').value.length==0 || 
document.getElementById('amount').value.length==0)
{
span[7].innerText = "Complete the registration";
  span[7].style.color = 'red';
return false;
}

}
  let name = document.getElementById('name');
  let span = document.getElementsByTagName('span');
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

  amounts.onkeyup = function(){
   const regexn = /^[A-Za-z0-9]{1,8}$/;
   if(regexn.test(amounts.value))
  {
  span[6].innerText = "";
  span[6].style.color = '#28fc7a';
  document.getElementById('mysubmit').disabled=false;

  }
  else
  {
  span[6].innerText = "amount is invalid";
  span[6].style.color = 'red';
  document.getElementById('mysubmit').disabled=true;

  }
  }

</script>
