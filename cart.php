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
error_reporting (E_ALL ^ E_NOTICE); 
	session_start();
	include("toconnect.php");
	if(isset($_GET["action"]))
	{
		if ($_GET["action"] == "delete")
		{
			$product_id = $_GET['id'];
			mysqli_query($connection,"CALL removeFromCart('$product_id')");
					
			
		}
		
	}
	
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
<br>   </br>
<section class="counter-section section center-text" id="counter">
        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
		<br>    </br>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
			<?php
			include("toconnect.php");
			$_SESSION['b_total']=0;
			$cust_id = $_SESSION['cust_id'];
            $query = "SELECT * FROM Cart WHERE Customer_id = '$cust_id' ORDER BY Product_id ASC ";
            $result = mysqli_query($connection,$query);
		
            if(mysqli_num_rows($result) > 0) {
				
                while ($row = mysqli_fetch_array($result)){
					
            ?>
			<tr>
			<td><?php echo $row["PRODUCT_NAME"]; ?></td>
            <td><?php echo $row["Quantity"]; ?></td>
            <td><?php echo $row["Unit_price"]; ?></td>
			<?php
				$bill_total = $_SESSION['b_total'];
				$product_id = $row["Product_id"];
				$total = mysqli_query($connection,"SELECT calculateTotal('$product_id') as total");
				$rtot = mysqli_fetch_array($total);
				$_SESSION['total'] = $rtot["total"];
				$tot = $_SESSION['total'];
				$bill_total = $bill_total + $tot;
				$_SESSION['b_total'] = $bill_total;
				$_SESSION['bill_total'] = $bill_total;
				 
			?>
			<td><?php echo $_SESSION['total']; ?></td>
			<td><a href="cart.php?action=delete&id=<?php echo $row["Product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>
			</tr>
			<?php 
				}
				}
			?>
			<tr>
                <th colspan="3" align="right">Total</th>
                <td align="right"><?php echo $_SESSION['bill_total']; ?></td>
                <td></td>
            </tr>
			</table>
			<!--<form action="" method="post"> -->
			<!--<h5><input type="submit" value="Proceed to Payment" name="Submit" /> -->
			<h6><a class="plr-20 color-red btn-fill-primary" href="payment.php">PROCEED TO PAYMENT</a></h6>
			
			</div>
					
</section>


<!--<section class="counter-section section center-text" id="counter">
        <h1>This is</h1>
</section>


<section class="counter-section section center-text" id="counter">
        <h1>my</h1>
</section>

<section class="counter-section section center-text" id="counter">
    <h1>foodilicious cart</h1>
</section> --><!-- counter-section--> 

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