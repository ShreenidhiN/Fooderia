<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Fooderia</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">
		

</head>
<body>
<?php 
session_start();
 error_reporting (E_ALL ^ E_NOTICE); 
?>
<header>
	<div class="container">
                <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="cart.php">CART</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="03_menu.php">YUM YUM</a></li>
						<li><a href="session_clear.php">LOGOUT</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>
<br>  </br>

<section class="counter-section section center-text" id="counter">
        <div style="clear: both"></div>
        <h3 class="title2">Payment &nbsp; Details</h3>
		<br>    </br>
        <div class="table-responsive">
            <table class="table table-bordered" style="border:2px solid black">
            <tr style="border:2px solid black">
                <th style="border:2px solid black"  width="30%">Product Name</th>
                <th style="border:2px solid black" width="30%">Quantity</th>
                <th style="border:2px solid black" width="20%">Price Details</th>
                <th style="border:2px solid black" width="20%">Total Price</th>
            </tr>
			<?php 
			include("toconnect.php");
				
				$result = mysqli_query($connection,"SELECT CURRENT_TIMESTAMP() AS Order_date");
				$row = mysqli_fetch_array($result);
				$_SESSION['order_date'] = $row["Order_date"];
				
			?>
			<?php 
				if(isset($_SESSION['order_date'])){
				$ord_date = $_SESSION['order_date'];
				$result = mysqli_query($connection,"SELECT DATE_ADD('$ord_date', INTERVAL 30 MINUTE) AS Delivery_date");
				$row = mysqli_fetch_array($result);
				$_SESSION['delivery_date'] = $row["Delivery_date"];
				
				}

			?>
			
			
			<?php 
			include("toconnect.php");
				if(isset($_SESSION['delivery_date'])){
					$cust_id = $_SESSION['cust_id'];
					$query = "SELECT * FROM Cart WHERE Customer_id = '$cust_id' ORDER BY Product_id ASC ";
					$result = mysqli_query($connection,$query);
					if(mysqli_num_rows($result) > 0) {
					?>
					<?php
					include("toconnect.php");
					$cust_id = $_SESSION['cust_id'];
					$ord_date = $_SESSION['order_date'];
					$del_date = $_SESSION['delivery_date'];
					$status ='Confirmed';
					mysqli_query($connection,"CALL addToOrders('$cust_id','$ord_date','$del_date','$status')");
							
					$_SESSION['order_entry'] = "true";
					
					}
					
				}
				?>
				
				
			<?php
				if(isset($_SESSION['order_entry'])){
				include("toconnect.php");
				$cust_id = $_SESSION['cust_id'];
				$ord_date = $_SESSION['order_date'];
				$result = mysqli_query($connection,"CALL getOrderID('$cust_id','$ord_date')");
				$row = mysqli_fetch_array($result);
				$_SESSION['order_id'] = $row["Order_id"];
				
				$_SESSION['order_id_entry'] = 'true';
				}
			?>
			<?php
			if(isset($_SESSION['order_id_entry'])){
				include("toconnect.php");
				$cust_id = $_SESSION['cust_id'];
				$order_id = $_SESSION['order_id'];
				$bill_total = $_SESSION['bill_total'];
				$ord_date = $_SESSION['order_date'];
				mysqli_query($connection,"CALL insertIntoBill('$order_id','$cust_id','$bill_total','$ord_date')");
				$_SESSION['bill_entry'] = 'true';
				}
			?>
			<?php
			if(isset($_SESSION['bill_entry'])){
			include("toconnect.php");
			$_SESSION['b_total']=0;
			$cust_id = $_SESSION['cust_id'];
            $query = "SELECT * FROM Cart WHERE Customer_id = '$cust_id' ORDER BY Product_id ASC ";
            $result = mysqli_query($connection,$query);
			
            if(mysqli_num_rows($result) > 0) {
			
                while ($row = mysqli_fetch_array($result)){
					
            ?>
			<tr style="border:2px solid black">
			<td style="border:2px solid black" ><?php echo $row["PRODUCT_NAME"]; ?></td>
            <td style="border:2px solid black" ><?php echo $row["Quantity"]; ?></td>
            <td style="border:2px solid black" ><?php echo $row["Unit_price"]; ?></td>
			<?php
				include("toconnect.php");
				$product_id = $row["Product_id"];
				$total = mysqli_query($connection,"SELECT calculateTotal('$product_id') as total");
				$rtot = mysqli_fetch_array($total);
				$_SESSION['total'] = $rtot["total"];
				$tot = $_SESSION['total'];
				 
			?>
			<?php 
				include("toconnect.php");
				$cust_id = $_SESSION['cust_id'];
				$order_id = $_SESSION['order_id'];
				$ord_date = $_SESSION['order_date'];
				$product_id = $row["Product_id"];
				$product_name = $row["PRODUCT_NAME"];
				mysqli_query($connection,"CALL addToItemsSold('$cust_id','$order_id','$product_id','$product_name','$ord_date')");
				
			?>
			<td style="border:2px solid black" ><?php echo $_SESSION['total']; ?></td>
			</tr>
			<?php 
				}
				$_SESSION['cart_read'] ="true";
				}
				
			}
			?>
			<tr style="border:2px solid black" >
                <th style="border:2px solid black"  colspan="3" align="right">Total</th>
                <th style="border:2px solid black" align="right"><?php echo $_SESSION['bill_total']; ?></th>
                
            </tr>
			</table>
			</div>
			<?php
			if(isset($_SESSION['cart_read'])){
			$delivery_time = $_SESSION['delivery_date'];
			$formatted_time = date('h:i A',strtotime($delivery_time));
			$_SESSION['formatted_delivery_time'] = $formatted_time;
			$cust_id = $_SESSION['cust_id'];
			mysqli_query($connection,"CALL clearCart('$cust_id')");
			}
			
			?>
			<?php 
			if(isset($_SESSION['formatted_delivery_time'])){
			?>
			<p class="plr-20 mtb-10" style="font-size:20px"><strong><b>Your Order is confirmed and will reach you around  <?php echo $_SESSION['formatted_delivery_time']; ?> </strong></b> </p>
			<?php
			}
			elseif(!isset($_SESSION['formatted_delivery_time'])){
			?>
			<p class="plr-20 mtb-10" style="font-size:20px"><strong><b>No order placed </strong></b> </p>
			<?php 
			}
			?>
			<br> </br>
			<form method="post" >
			<div style="width:50%;Text-align:center;float:left;">
			<h6><a  class="plr-20 color-red btn-fill-primary" href="session_clear.php" ><b>Log Out<b></a></h6>
			</div>
			<div style="width:50%;Text-align:center;float:right;">
			<h6><a  class="plr-20 color-red btn-fill-primary" href="feedback.php" ><b>Give a Feedback<b></a></h6>
			</div>
			</form>
		
			</div>
</section>
			
<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p>Bangalore . Mumbai . Chennai . Kolkata</p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Phone:</b></p>
                        <a href="tel:+53 345 7953 32453 ">1234567890 </a>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Email:</b></p>
                        <a href="mailto:yourmail@gmail.com"> yummyfood@gmail.com</a>
                </div>

                <ul class="icon mt-30">
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
                </ul>

                <p class="color-light font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div><!-- container -->
</footer>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>

</body>
</html>
