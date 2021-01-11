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
		label {
		width: 180px;
		display :inline-block;
		text-align : left
		}
		</style>

</head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
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


<section class="bg-1 h-900x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white">

                                <h5><b>BEST IN TOWN</b></h5>
                                <h1 class="mt-30 mb-15">fooderia</h1>
                               
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                        <h2>Login / Sign up</h2>
                </div>

                <div class="row">
                        <div class="col-md-6">
                               <!--  <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse
                                        platea dictumst. Morbi maximus
                                        lobortis ipsum, ut blandit augue ullamcorper vitae.
                                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel convallis
                                        massa. Morbi tellus
                                        tortor, luctus et lacinia non, tincidunt in lacus.
                                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulum id
                                        dapibus dolor, ac
                                        cursus nulla. </p> -->
                        </div><!-- col-md-6 -->

                        <!-- <div class="col-md-6">
                                <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse platea
                                        dictumst.Morbi maximus lobortis ipsum, ut blandit augue ullamcorper vitae.
                                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel
                                        convallismassa. Morbi tellus tortor, luctus et lacinia non, tincidunt in lacus.
                                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulumidda
                                        pibus dolor, accursus nulla. </p>
                        </div><!-- col-md-6 --> 
                </div><!-- row -->
        </div><!-- container -->
		
		
		
		
		<div id="container_demo" >
	<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" style="text-align:center" class="animate form">
			<!--<form style="text-align:center" action="03_menu.php"   autocomplete="on"> -->
			<form  method="POST">
				<h1>Log in</h1>
				<br>      </br>
				<p> 
					<label for="username" class="uname" data-icon="u" > Your email or username </label>
					<input id="username" name="username" required="required" type="text" placeholder="myusername"/>
				</p>
				<p> 
					<label for="password" class="youpasswd" data-icon="p"> Your password </label>
					<input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
				</p>
				<p class="keeplogin"> 
					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
					<label for="loginkeeping">Keep me logged in</label>
				</p>
				<p class="login button"> 
					<input type="submit" name ="loginbutton" value="Login" /> 
				</p>
				<p class="change_link">
					Not a member yet ?
					<a href="#toregister" class="to_register">Join us</a>
				</p>
			</form>
			<?php
                        include("toconnect.php");                        
                        
                        if(isset($_POST["loginbutton"]))
                        {
                                session_start();
                                $username = $_POST["username"];                                
                                $pwd =$_POST["password"];
                                $sql = "CALL logincheck('".$_POST["username"]."','".$_POST["password"]."');";
                                $result = mysqli_query($connection,$sql);
                                if(!$result)
                                {
                                        echo('error :::: '.mysqli_error($connection));
                                }
                                if(mysqli_num_rows($result)==1)
                                {
                                       mysqli_free_result($result);
                                        $_SESSION["username"]=$username;
                                        $admin="admin";
                                        if($_SESSION["username"]==$admin and $pwd=="admin")
                                        {
                                                echo "<script>window.location.href='admin.php'</script>";
                                        }
                                        echo "<script>window.location.href='03_menu.php'</script>";
                                }
                                else{
                                        echo " USERNAME OR PASSWORD IS INCOREECT  ";
                                }
                        }
                      
						?> 
						<?php
                        include("toconnect.php");                        
                        
                        if(isset($_POST["loginbutton"]))
                        {
                                session_start();
                                $username = $_POST["username"];                                
                                $pwd =$_POST["password"];
                                $sql = "CALL empCheck('".$_POST["username"]."','".$_POST["password"]."');";
                                $result = mysqli_query($connection,$sql);
                                if(!$result)
                                {
                                        echo('error :::: '.mysqli_error($connection));
                                }
                                if(mysqli_num_rows($result)==1)
                                {
                                       mysqli_free_result($result);
 
                                        
                                        echo "<script>window.location.href='admin.php'</script>";
                                }
                                
                        }
                      
						?> 

		</div>
						
						
						
		
		<div style="text-align:center" id="register" class="animate form">
			<form  style="text-align:center" action="index.php" autocomplete="on" method ="post"> 
				<h1> Sign up </h1> 
				<br>         </br>
				<p> 
					<label for="usernamesignup" class="uname" data-icon="u">Username</label>
					<input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder=" mysuperusername690" />
				</p>
				<p> 
					<label for="emailsignup" class="youmail" data-icon="e" >Email</label>
					<input id="emailsignup" name="emailsignup" required="required" type="email" placeholder=" mysupermail@mail.com"/> 
				</p>
				<p> 
					<label for="passwordsignup" class="youpasswd" data-icon="p">Password </label>
					<input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder=" eg. X8df!90EO"/>
				</p>
				<p> 
					<label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm Password</label>
					<input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
				</p>
				<p> 
					<label for="addsignup" class="youadd" data-icon="e" >Address</label>
					<input id="addsignup" name="addsignup" required="required" type="text" placeholder="mysuperaddress"/> 
				</p>
				<p> 
					<label for="postcodesignup" class="youpostcode" data-icon="e" >Postcode</label>
					<input id="postcodesignup" name="postcodesignup" required="required" type="text" placeholder="mysuperpostcode"/> 
				</p>
				<p> 
					<label for="telephonesignup" class="youtel" data-icon="e" >Phone</label>
					<input id="telephonesignup" name="telephonesignup" required="required" type="text" placeholder="1111111"/> 
				</p>
				<p class="signin button"> 
					<input type="submit" name ="Signin" value="Sign up"/> 
				</p>
				<p class="change_link">  
					Already a member ?
					<a href="#tologin" class="to_register"> Go and log in </a>
				</p>
			
			</form>
			
			<?php 
$dbhost='localhost';
$username='root';
$password='';
$name = 'food_ordering_system';
$connection=mysqli_connect("$dbhost","$username","$password","$name");

$name = $_POST['usernamesignup'];
$address = $_POST['addsignup'];
$city = $_POST['citysignup'];
$postcode = $_POST['postcodesignup'];
$state = $_POST['statesignup'];
$telephone = $_POST['telephonesignup'];
$email = $_POST['emailsignup'];
$pass = $_POST['passwordsignup'];

echo $rs;
if(isset($_POST["Signin"]))
{
	if($name == "Admin"){
	$emp_id = 0;
	
	if(mysqli_query($connection,"CALL enterEmploy('$emp_id','$name','$pass','$address','$postcode','$telephone')"))
	{
		echo "SIGN UP SUCCESSFUL . PLEASE GO AND LOG IN ";
	}
?>
<?php 
	}
else{

		if(mysqli_query($connection,"CALL Sign_up('$name','$address','$postcode','$telephone','$pass','$email')"))
		{
			echo "SIGN UP SUCCESSFUL . PLEASE GO AND LOG IN ";
		}
		
	}
}
?>	
		</div>
		
	</div>
</div>  
		
	
		
		
		
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">

                <div class="row">
                        <div class="col-md-6"><img class="mb-30" src="images/about-1-600x400.jpg" alt=""></div>
                        <div class="col-md-6"><img class="mb-30" src="images/about-2-600x400.jpg" alt=""></div>
                        <div class="col-md-12">
                                <div class="mt-50 mt-sm-30 mb-50 mb-sm-30 center-text"> <h2>Welcome to Fooderia</h2> </div>

                                <h5 class="center-text mb-50 mb-sm-30 plr-25">
                                      Taste our Yummy Pizzas and Pastas !! Specially made with rich and tasty Ingredients</h5>
                        </div>
                </div><!-- row -->

                <h6 class="center-text mt-40 mt-sm-30 mb-20">
                        
                </h6>

        </div><!-- container -->
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
                        <a href="mailto:yourmail@gmail.com"> yummyfood@gmail@gmail.com</a>
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