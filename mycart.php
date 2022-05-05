<?php 
include('dbconnect.php');
session_start();
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
			<a href="#" class="brand">
				<br><br>
				<img src="images/logo.png"  height="200" width="250"  align="left">
			</a>
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
				
				<div class="table-data">
					<div class="order">
<table id="customers">

<thead>
	<tr>
      <th scope="col">Serial No</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
	  <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
</thead>
<tbody class ="text-center">
<?php
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $key => $value)
{
    $sr=$key+1;
   
    echo"
    <tr>
    <td>$sr</td>
    <td>$value[prod]</td>
    <td>$value[Price]<input type='hidden'class='iprice'value='$value[Price]'></td>
    <td>
    <input class ='text-center iquantity'onchange='subTotal()' type='number' value='$value[Quantity]'min='1' max='10'>
    <input  type='hidden'name='prod'value='$value[prod]'>
    </form>
    </td>
    <td class='itotal'></td>
    <td>
    <form action='manage_cart.php'method='POST'>
    <button  name='Remove_Item'class='btn btn-sm btn-outline-danger'>REMOVE</button>
   <input  type='hidden'name='prod'value='$value[prod]'>
    </form>
    </td>
</tr>
";
}
}
?>
    
    
  </tbody>
</table>
					</div>
</div>
<div class="col-lg-9">
    <div class="border bg-light rounded p-4">
        <h4>
		Grand Total:</h4>
<h5 class="text-right"id="gtotal" ></h5>

</div>
</div>		
			</main>
		</section>
		<section id="content">
			<!-- MAIN -->
			<main>
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">BILLING ADDRESS</h2>
  						<form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data"> 
  							<label>Full Name:</label>
	    					<input type="text" id="fname" name="name" placeholder="Add Full name">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label>Address:</label>
							<input type="text" id="amount" name="amount" placeholder="Enter address">
    						<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label>City:</label>
	    					<input type="text" id="name" name="name" placeholder="Add city">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label>State:</label>
							<input type="text" id="amount" name="amount" placeholder="Enter state">
    						<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<label>Pincode:</label>
	    					<input type="text" id="zip" name="name" placeholder="Add pincode">
							<span style="color: red; margin-left:50px; font-size:12px"></span>
							<br>
							<input type="button" name="btn" class="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
							<span style="color: red; margin-left:50px; font-size:12px"></span>
						</form>
					</div>
				</table>
</main>
</section>




		
	<script src="js/script.js"></script>
	</body>
</html>
<script>

var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
function subTotal()
{
    gt=0;
    for(i=0;i<iprice.length;i++)
    {
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
       
        gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
}


subTotal();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
function pay_now(){
		
		var firstName=document.getElementById("fname");
		if (firstName.value===""){
				alert("Please enter your name");
				firstName.focus();
				return false;
		}
		var postcode=document.getElementById("zip");
		if (postcode.value.length!=6  || isNaN(postcode.value)){
                 alert("Please enter 6 digit pincode");
                 postcode.focus();
                 return false;
            }

	
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_Me1eCw8zr7vVFy", 
                        "amount": gt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
    </script>

<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  


</script>
