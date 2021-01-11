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
        <style type="text/css">
        label{
                width: 180px;
                display:inline-block;
                text-align:left

        }</style>
</head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<header>
        <div class="container">
                <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a>

              

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="03_menuu.php">YUM YUM</a></li>
						<li><a href="Customer Analysis.php">CUSTOMER ANALYSIS</a></li>
						<li><a href="session_clear.php">LOGOUT</a></li>
                       
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>


<section class="bg-6 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>Employees and Menu</b></h5>
                                <h3 class="mt-30 mb-15">Enter details</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>
<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                       <h3>ADD EMPLOYEE DETAILS </h3> 
                       <form method="POST">
                <p>
					 
                     <label for="empid" class="empid" data-icon="u" > Employee id </label>
                     <input id="empid" name="empid" required="required" type="number" placeholder=""/>
                </p>
                <p>
					 
                     <label for="empname" class="empname" data-icon="u" > Employee name </label>
                     <input id="empname" name="empname" required="required" type="text" placeholder=""/>
                </p>
                 <p> 
                     <label for="password" class="youpasswd" data-icon="p"> Password </label>
                     <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                 </p>
                 <p>
					 
                     <label for="address" class="address" data-icon="u" > Employee address </label>
                     <input id="address" name="address" required="required" type="text" placeholder=""/>
                </p>
                <p>
					 
                     <label for="postcode" class="postcode" data-icon="u" > Postcode</label>
                     <input id="postcode" name="postcode" required="required" type="number" placeholder=""/>
                </p>
                <p>
					 
                     <label for="tel" class="tel" data-icon="u" > Contact</label>
                     <input id="tel" name="tel" required="required" type="number" placeholder=""/>
                </p>
                 <p class="login button"> 
                     <input class="plr-20 color-red btn-fill-primary" type="submit" value="ADD" name="ADD1" /> 
                 </p>
                
                </div>            
                        
        </div><!-- container -->
</section>
<?php
        include ("toconnect.php");
        $eid=$_POST['empid'];
        $ename = $_POST['empname'];
        $pwd = $_POST['password'];
        $address = $_POST['address'];
        $postcode=$_SESSION['postcode'];
        $tel=$_SESSION['tel'];
if(isset($_POST["ADD1"]))
{
      
if(mysqli_query($connection,"CALL enterEmploy('$eid','$ename','$pwd','$address','$postcode','$tel')"))
{
        
        echo "THANK YOU ";
}
}
?>
</form>
<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
<h3>ADD PRODUCT DETAILS </h3> 
                       <form method="POST">
                <p>
					 
                     <label for="pdtid" class="pdtid" data-icon="u" > Product id </label>
                     <input id="pdtid" name="pdtid" required="required" type="number" placeholder=""/>
                </p>
                <p>
					 
                     <label for="pdtname" class="pdtname" data-icon="u" > Product name </label>
                     <input id="pdtname" name="pdtname" required="required" type="text" placeholder=""/>
                </p>
                 <p> 
                     <label for="Category" class="Category" data-icon="p"> Category </label>
                     <input id="Category" name="Category" required="required" type="text" placeholder="" /> 
                 </p>
                 <p>
					 
                     <label for="unitprice" class="unitprice" data-icon="u" > Unit price </label>
                     <input id="unitprice" name="unitprice" required="required" type="float" placeholder=""/>
                </p>
                <p>
					 
                     <label for="qty" class="qty" data-icon="u" > Quantity</label>
                     <input id="qty" name="qty" required="required" type="number" placeholder=""/>
                </p>
               
                 <p class="login button"> 
                     <input class="plr-20 color-red btn-fill-primary" type="submit" value="ADD" name="ADD2" /> 
                 </p>
                
                </div>            
                        
        </div><!-- container -->
</section>
<?php
        include ("toconnect.php");
        $pid=$_POST['pdtid'];
        $pname = $_POST['pdtname'];
        $category = $_POST['Category'];
        $unitprice = $_POST['unitprice'];
        $qty=$_SESSION['qty'];
      
if(isset($_POST["ADD2"]))
{

if(mysqli_query($connection,"CALL INSERTMENU('$pid','$pname','$category','$unitprice','$qty')"))
{
        
        echo "THANK YOU ";
}

}
?>
</form>
<form method="POST">
<div style="width:100%;Text-align:center;float:center;">
<h6><button class="plr-20 color-red btn-fill-primary" name ="logout"><b>LOG OUT<b></button></h6>
</div>
			                       
			<?php
             if(isset($_POST["logout"]))
				{
					session_destroy();
					echo "<script>window.location.href='indexphp.php'</script>";
				}
			?>
                       
</form>
<footer class="pb-50  pt-70 pos-relative footer-bg-1">

        <div class="container-fluid">
                <a href="indexphp.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p>Bangalore . Mumbai . Chennai . Kolkata</p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Phone:</b></p>
                        <a href="tel:+1234567890">1234567890</a>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div><!-- container -->
</footer>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-oEyU88bRR6xcbV1gI_Cahc8ugKC_JPE&callback=initMap"></script>

</body>
</html>