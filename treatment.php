<?php
include 'dbconnect.php';
if (isset($_POST["submit"]))
{
    $name=$_POST["name"];
	$image=$_FILES["image"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	$day=$_POST["day"];
    $amount=$_POST["amount"];
	$description=$_POST["des"];
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);
    mysqli_query($con, "INSERT INTO `tbl_treatment`(`treatment_name`, `treatment_image`, `treatment_day`, `treatment_amount`,`treatment_status`) 
	VALUES ('$name','$image','$day','$amount',0)");
	header('location:treatment.php');
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
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Add Staff</span>
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
					  <h2 style="color: #9f8e64;">ADD PACKAGE</h2>
  						<form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data"> 
  							<label>Package Name:</label>
	    					<input type="text" id="name" name="name" placeholder="Add treatment name">
							<span style="color: red; margin-left:50px; font-size:12px"></span><br>
							<label>Image:</label><br>
							<input type="file" id="image" name="image"size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png">
							<br><br>
   							<label>Days:</label>
							<input type="text" id="day" name="day" placeholder="Enter duration">
							<span style="color: red; margin-left:55px; font-size:12px"></span><br>
							<label>Amount:</label>
							<input type="text" id="amount" name="amount" placeholder="Enter service cost">
    						<span style="color: red; margin-left:55px; font-size:12px"></span><br>
							<input type="submit" id="mysubmit" name="submit" value="Submit">
							<span style="color: red; margin-left:55px; font-size:12px"></span>
  						</form>
					</div>
				</table>

				<!-- EDIT AND DELETE TABLE -->
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3></h3>	
						</div>
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th>Images</th>
									<th>Day</th>
									<th>Amount</th>
									<th>Manage</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
		  							include('dbconnect.php');
		  					 		$query="SELECT * FROM tbl_treatment";
									$data = mysqli_query($con,$query);
									while($res=mysqli_fetch_assoc($data))
									{
								?>
								<tr>
									<td><p><?php echo $res['treatment_name'];?></p></td>
									<td><img src="images/<?php echo $res['treatment_image'];?>" width="50px" height="50px"></td>
									<td><p><?php echo $res['treatment_day'];?></p></td>
									<td><p><?php echo $res['treatment_amount'];?></p></td>  						
									<td><a href="edittreatment.php?edit_id=<?php echo $res['treatment_id']; ?>"><span style="background-color:rgb(62, 191, 214);" class="status completed">EDIT</span></a>
									<td><?php echo $res['treatment_status'];?></td>
									<td><a href="inactivetrt.php?aaaa=<?php echo $res['treatment_id'];?>"><input type="button" value="Inactive">
  									<a href="activetrt.php?bbbb=<?php echo $res['treatment_id'];?>"><input type="button" value="active"></td>
								</tr>
								<?php
								}
								?>
							</tbody>
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
