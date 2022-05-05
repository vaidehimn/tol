<?php
include 'dbconnect.php';
if (isset($_POST["assign"]))
{
    $doc=$_POST["doctor"];
    $cust=$_POST["customer"];
    $sql4 = "SELECT * FROM `tbl_register` WHERE `reg_name`= '$doc'";
    $row4 = mysqli_query($con, $sql4);
        if($res4 = mysqli_fetch_assoc($row4))
        {

            $docid = $res4['reg_id'];
        }
        $sql5 = "SELECT * FROM `tbl_register` WHERE `reg_name`= '$cust'";
        $row5 = mysqli_query($con, $sql5);
            if($res5 = mysqli_fetch_assoc($row5))
            {
    
                $custid = $res5['reg_id'];
            }    

        $sql6 = "SELECT * FROM `tbl_assign` WHERE `cust_id`= '$custid'";
        $row6 = mysqli_query($con, $sql6);
        if(mysqli_num_rows($row6)>0)
        {
            echo '<script type = "text/javascript">alert("Duplication")</script>';
        }
        else
        {
            $sql7 = "INSERT INTO `tbl_assign`(`doct_id`, `cust_id`) VALUES ('$docid','$custid')";
            if(mysqli_query($con, $sql7))
            {
                echo "Success";
            }
            else
            {
                echo mysqli_errno($con);
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
			<img src="images/logo.png"  height="200" width="250"  align ="left">	
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
					  <h2 style="color: #9f8e64;">ASSIGN</h2>
  						<form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data"> 
  							<label>Doctor Name:</label>
                              <select name="doctor" id="doctor">
                              <option>Select Doctor</option>
                                  <optgroup>
                                    <?php
                                    $sql1 = "SELECT * FROM `tbl_login` WHERE `type_id` = 1";
                                    $row1 = mysqli_query($con, $sql1);
                                    while($res1 = mysqli_fetch_assoc($row1))
                                    {

                                        $did = $res1['reg_id'];
                                        echo $did;

                                    $sql = "SELECT * FROM `tbl_register` WHERE `reg_id` = '$did'";
                                    $row = mysqli_query($con, $sql);
                                    while($res = mysqli_fetch_assoc($row))
                                    {
                                        $dname = $res['reg_name'];
                                        ?>
                                        <option><?php echo $dname; ?></option>
                                        <?php
                                            }

                                        }
                                        ?>
                                    </optgroup>
                                </select>
							<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label for="cars">Customer Name:</label>
                                <select name="customer" id="customer">
                                <option>Select Customer</option>
                                <optgroup>
                                    <?php
                                    $sql2 = "SELECT * FROM `tbl_login` WHERE `type_id` = 4";
                                    $row2 = mysqli_query($con, $sql2);
                                    while($res2 = mysqli_fetch_assoc($row2))
                                    {
                                        $cid = $res2['reg_id'];
                                        echo $cid;
                                    $sql3 = "SELECT * FROM `tbl_register` LEFT JOIN `tbl_assign` ON tbl_register.reg_id = tbl_assign.cust_id WHERE tbl_assign.cust_id IS NULL AND tbl_register.reg_id = '$cid'";
                                    $row3 = mysqli_query($con, $sql3);
                                    while($res3 = mysqli_fetch_assoc($row3))
                                    {
                                        $cname = $res3['reg_name'];
                                        ?>
                                        <option><?php echo $cname; ?></option>
                                        <?php
                                            }

                                        }
                                        ?>
                                    </optgroup>
                                </select>
                                <br><br>
							<input type="submit" name="assign" id="assign" value="Assign">
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
									<th>Doctor</th>
									<th>Customer</th>
								</tr>
							</thead>
                            <?php
                            $query="SELECT * FROM tbl_assign";
                            $data = mysqli_query($con,$query);
                            while($res8=mysqli_fetch_assoc($data))
                            {
                                $doid = $res8['doct_id'];
                                $cuid = $res8['cust_id'];
                                $query1 = "SELECT * FROM `tbl_register` WHERE `reg_id` = '$doid'";
                                $data1 = mysqli_query($con,$query1);
                                while($res9=mysqli_fetch_assoc($data1))
                                {
                                    $doname = $res9['reg_name'];
                                $query2 = "SELECT * FROM `tbl_register` WHERE `reg_id` = '$cuid'";
                                $data2 = mysqli_query($con,$query2);
                                while($res10=mysqli_fetch_assoc($data2))
                                {
                                    $cuname = $res10['reg_name'];
                          ?>

							<tbody>
								<tr>
									<td><p><?php echo $doname;?></p></td>
									<td><p><?php echo $cuname;?></p></td> 						
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
