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
                        <li><a href="indexphp.php">HOME</a></li>
                        <li><a href="menuphp.php">YUM YUM</a></li>
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
                                <h5><b>SAY HELLO</b></h5>
                                <h3 class="mt-30 mb-15">Feedback</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                        <h2>Say hello</h2>
                        <h5 class="mt-10 mb-30">Say hello, send us a feedback</h5>
                        <p class="mx-w-700x mlr-auto">Please describe if you liked our website, service and food.
                                We appreciate all your comments. Thanks for ordering with us.</p>
                </div>

                <form method="POST" class="form-style-1 placeholder-1" >
                        <div class="row">
                               
                                <div>  <label for="rating" class="rating" data-icon="u" > Rate out of 5 </label>
					<input id="rating" name="rating" required="required" type="number" placeholder=""/>				
                                </div>
                                <div>  <label for="feedback" class="feedback" data-icon="u" > Your feedback </label>
					<input id="feedback" name="feedback" required="required" type="text" placeholder="Tell us here"/>				
                                </div>
                                <!-- row -->
                                <p class="center-text mtb-30"> 
                                       
                                        <input type="submit" name="send" value="SEND MESSAGE" /> 
				</p>
                                
        </div><!-- container -->
</section>
<?php
        include("toconnect.php");
        $customer_id=$_SESSION['cust_id'];
        $sql = "CALL getCustomerName('$customer_id')";
        $res=mysqli_query($connection,$sql);
        $row=mysqli_fetch_array($res);
        $_SESSION['cname']=$row["Customer_name"];
        mysqli_free_result($res);
?>

<?php
        include ("toconnect.php");
        $name=$_SESSION['cname'];
        $feedback = $_POST['feedback'];
        $rating = $_POST['rating'];
        $customer_id=$_SESSION['cust_id'];
       
        $orderid=$_SESSION['order_id'];
if(isset($_POST["send"]))
{
        
if(mysqli_query($connection,"CALL enterFeedback('$customer_id','$name','$orderid','$feedback','$rating')"))
{
       echo "<script>window.location.href='thankyou.php'</script>"; 
        
}
else
	echo mysqli_error($connection);

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