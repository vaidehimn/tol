<?php
include 'dbconnect.php';
if (isset($_POST["submit"]))
{
    $name=$_POST["name"];
	$image=$_FILES["image"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
    $amount=$_POST["amount"];
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"]);
    mysqli_query($con, "INSERT INTO `tbl_product`(`product_name`, `product_image`, `product_amount`,`product_status`) 
	VALUES ('$name','$image','$amount',0)");
	header('location:store.php');
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
						<i class='bx bxs-group' ></i>
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
					  <h2 style="color: #9f8e64;">ADD PRODUCT</h2>
  						<form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data"> 
  							<label>Product Name:</label>
	    					<input type="text" id="name" name="name" placeholder="Add Product name">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label>Image:</label><br>
							<input type="file" id="image" name="image"size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
    						<br><br>
							<label>Amount:</label>
							<input type="text" id="amount" name="amount" placeholder="Enter  cost">
    						<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<input type="submit"name="submit" id="mysubmit" value="Submit">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
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
									<th>Amount</th>
									<th>Manage</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
		  							include('dbconnect.php');
		  					 		$query="SELECT * FROM tbl_product";
									$data = mysqli_query($con,$query);
									while($res=mysqli_fetch_assoc($data))
									{
								?>
								<tr>
									<td><p><?php echo $res['product_name'];?></p></td>
									<td><img src="images/<?php echo $res['product_image'];?>" width="50px" height="50px"></td>
									<td><p><?php echo $res['product_amount'];?></p></td> 						
									<td><a href="editpdt.php?edit_id=<?php echo $res['product_id']; ?>"><span style="background-color:rgb(62, 191, 214);" class="status completed">EDIT</span></a>
									</td>
									<td><?php echo $res['product_status'];?></td>
								<td><a href="inactivepdt.php?aaa=<?php echo $res['product_id'];?>"><input type="button" value="Inactive">
  								<a href="activepdt.php?bbb=<?php echo $res['product_id'];?>"><input type="button" value="active"></td>
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
   const regexn = /^[0-9]{1,8}$/;
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
