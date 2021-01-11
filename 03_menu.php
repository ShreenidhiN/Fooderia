<!DOCTYPE html>
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


<section class="bg-5 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>THE BEST IN TOWN</b></h5>
                                <h2 class="mt-30 mb-15">Menu</h2>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<div class="container">
                   	
				</h3></div>
                <div class="row">
				<?php 
				session_start();
				
                include("toconnect.php");
				if (mysqli_connect_errno())
				{
					echo "Connection Error" ;
							
				}
				
				if(isset($_SESSION['username']))
				{
						
						$username = $_SESSION['username'];
						$results = mysqli_query($connection,"select CUSTOMER_ID from Customer where Customer_name = '$username'");
						if(!$results)
						{
								echo('Invalid Query : ' . mysqli_error($connection));
						}
						
						$row = mysqli_fetch_array($results);
						$_SESSION['cust_id'] = $row["CUSTOMER_ID"];
						
				}
				
				?>
				
</div>

<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading"><h3>Choose from Pizza   	
				</h3></div>
                <div class="row">
                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="ïmg-200x mlr-auto pos-relative">
                                                <h6 class="ribbon-cont color-white"><div class="ribbon primary"></div><b>OFFER</b></h6>
                                                <img src="images/seller-2-200x200.png" alt="">
                                        </div>
                                        <h5 class="mt-20">Pizza Margherita</h5>
										<form action="" method="post">
										<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza1" /> 
                                        <h4 class="mt-5 color-primary"><b>Rs 119.0</b></h4>
										<br> </br>
										<br> Quantity <input type=number name="t1">
                                        <?php
										session_write_close();
																									
										include("toconnect.php");
										$cost=119.0;
										$_SESSION['cost'] = $cost;
										
										if(isset($_POST["pizza1"]))
										{
                                            if(isset($_POST['t1'])) 
											{
                                                $qty=$_POST['t1']; 
												$_SESSION['qty'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty'] = $qty;
												}
											}		
											$food1='Pizza Margherita';
											$_SESSION['product_name'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid']))
									{
										
										
										include("toconnect.php");
										
										$productid = $_SESSION['productid'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost'];
										$qty = $_SESSION['qty'];
										$product_name = $_SESSION['product_name'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
										
										
									}
									
									?>                 
							</form>
							
									
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->

       <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="ïmg-200x mlr-auto pos-relative"><img src="images/seller-2-200x200.png" alt=""></div>
                                        <h5 class="mt-20">Double Cheese</h5>
										<form action="" method="post">
										<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza3" />
                                        <h4 class="mt-5 color-primary"><b>Rs 200.0</b></h4>
										<br> </br>
										<br> Quantity <input type=number name="t2">
										<?php
										session_write_close();
                                        
                                                                                                                                 
										include("toconnect.php");
										$cost=200;
										$_SESSION['cost2'] = $cost;
										
										if(isset($_POST["pizza3"]))
										{
												if(isset($_POST['t2'])) 
											{
                                                $qty=$_POST['t2']; 
												$_SESSION['qty2'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty2'] = $qty;
												}
											}	
											$food1='Double Cheese';
											$_SESSION['product_name2'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid2']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid2']))
									{
		
										include("toconnect.php");
										
										$productid = $_SESSION['productid2'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost2'];
										$qty = $_SESSION['qty2'];
										$product_name = $_SESSION['product_name2'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->
									
                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="ïmg-200x mlr-auto pos-relative"><img src="images/seller-2-200x200.png" alt=""></div>
                                        <h5 class="mt-20">Farm House</h5>
										<form action="" method="post">
										<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza4" />
                                        <h4 class="mt-5 color-primary"><b>Rs 150.0</b></h4>
										<br> </br>
										<br> Quantity <input type=number name="t3">
										<?php
										session_write_close();
                                                                                                                             
										include("toconnect.php");
										$cost=150;
										$_SESSION['cost3'] = $cost;
										
										if(isset($_POST["pizza4"]))
										{
											if(isset($_POST['t3'])) 
											{
                                                $qty=$_POST['t3']; 
												$_SESSION['qty3'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty3'] = $qty;
												}
											}	
											$food1='Farm House';
											$_SESSION['product_name3'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid3']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid3']))
									{
										include("toconnect.php");
										
										$productid = $_SESSION['productid3'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost3'];
										$qty = $_SESSION['qty3'];
										$product_name = $_SESSION['product_name3'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
										
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->

                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="ïmg-200x mlr-auto pos-relative">
                                                <h6  class="ribbon-cont color-white"><div class="ribbon secondary"></div><b>SPECIALITY</b></h6>
                                                <img src="images/seller-2-200x200.png" alt="">
                                        </div>
                                        <h5 class="mt-20">Peppy Paneer</h5>
										<form action="" method="post">
										<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza5" />
                                        <h4 class="mt-5 color-primary"><b>Rs 140.0</b></h4>
										<br> </br>
										<br> Quantity <input type=number name="t4">
										<?php
										session_write_close();
                                                                                                                                  
										include("toconnect.php");
										$cost=140;
										$_SESSION['cost4'] = $cost;
										
										if(isset($_POST["pizza5"]))
										{
											if(isset($_POST['t4'])) 
											{
                                                $qty=$_POST['t4']; 
												$_SESSION['qty4'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty4'] = $qty;
												}
											}	
											$food1='Peppy Paneer';
											$_SESSION['product_name4'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid4']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid4']))
									{
										include("toconnect.php");
										
										$productid = $_SESSION['productid4'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost4'];
										$qty = $_SESSION['qty4'];
										$product_name = $_SESSION['product_name4'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->
                </div><!-- row-->
        </div><!-- container -->
</section>

<section class="bg-lite-blue">
        <div class="container">
                <div class="row">

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-1-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Mexican Green Wave</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 120.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza6" />
												<br> </br>
												<br> Quantity <input type=number name="t5">
												<?php
										session_write_close();
                                                                                                                                 
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost5'] = $cost;
										
										if(isset($_POST["pizza6"]))
										{
											if(isset($_POST['t5'])) 
											{
                                                $qty=$_POST['t5']; 
												$_SESSION['qty5'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty5'] = $qty;
												}
											}	
											$food1='Mexican Green Wave';
											$_SESSION['product_name5'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid5']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid5']))
									{
										include("toconnect.php");
										
										$productid = $_SESSION['productid5'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost5'];
										$qty = $_SESSION['qty5'];
										$product_name = $_SESSION['product_name5'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-2-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Cheese Garlic</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 200.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza11" />
												<br> </br>
												<br> Quantity <input type=number name="t6">
												<?php
										session_write_close();
                                                                                                                               
										include("toconnect.php");
										$cost=200;
										$_SESSION['cost6'] = $cost;
										
										if(isset($_POST["pizza11"]))
										{
											if(isset($_POST['t6'])) 
											{
                                                $qty=$_POST['t6']; 
												$_SESSION['qty6'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty6'] = $qty;
												}
											}	
											$food1='Cheese Garlic';
											$_SESSION['product_name6'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid6']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid6']))
									{
										include("toconnect.php");
										
										$productid = $_SESSION['productid6'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost6'];
										$qty = $_SESSION['qty6'];
										$product_name = $_SESSION['product_name6'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                              
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-3-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Paneer Makhani</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 120.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza7" />
												<br> </br>
												<br> Quantity <input type=number name="t7">
												<?php
										session_write_close();
                                                                                                                                   
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost7'] = $cost;
										
										if(isset($_POST["pizza7"]))
										{
											if(isset($_POST['t7'])) 
											{
                                                $qty=$_POST['t7']; 
												$_SESSION['qty7'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty7'] = $qty;
												}
											}	
											$food1='Paneer Makhani';
											$_SESSION['product_name7'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid7']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid7']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid7'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost7'];
										$qty = $_SESSION['qty7'];
										$product_name = $_SESSION['product_name7'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="images/menu-4-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Brocolli Pizza</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 60.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza12" />
												<br> </br>
												<br> Quantity <input type=number name="t8">
												<?php
										session_write_close();
                                                                                                                                 
										include("toconnect.php");
										$cost=60;
										$_SESSION['cost8'] = $cost;
										
										if(isset($_POST["pizza12"]))
										{
											if(isset($_POST['t8'])) 
											{
                                                $qty=$_POST['t8']; 
												$_SESSION['qty8'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty8'] = $qty;
												}
											}	
											$food1='Brocolli Pizza';
											$_SESSION['product_name8'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid8']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid8']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid8'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost8'];
										$qty = $_SESSION['qty8'];
										$product_name = $_SESSION['product_name8'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="images/menu-5-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Deluxe Veggie</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 120.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza8" />
												<br> </br>
												<br> Quantity <input type=number name="t9">
												<?php
										session_write_close();
                                                                                                                                  
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost9'] = $cost;
										
										if(isset($_POST["pizza8"]))
										{
											if(isset($_POST['t9'])) 
											{
                                                $qty=$_POST['t9']; 
												$_SESSION['qty9'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty9'] = $qty;
												}
											}	
											$food1='Deluxe Veggie';
											$_SESSION['product_name9'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid9']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid9']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid9'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost9'];
										$qty = $_SESSION['qty9'];
										$product_name = $_SESSION['product_name9'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-6-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Veg Paradise</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 200.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza13" />
												<br> </br>
												<br> Quantity <input type=number name="t10">
												<?php
										session_write_close();
                                                                                                                                 
										include("toconnect.php");
										$cost=200;
										$_SESSION['cost10'] = $cost;
										
										if(isset($_POST["pizza13"]))
										{
											if(isset($_POST['t10'])) 
											{
                                                $qty=$_POST['t10']; 
												$_SESSION['qty10'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty10'] = $qty;
												}
											}	
											$food1='Veg Paradise';
											$_SESSION['product_name10'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid10']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid10']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid10'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost10'];
										$qty = $_SESSION['qty10'];
										$product_name = $_SESSION['product_name10'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                               
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="images/menu-7-120x120.jpg"  alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Veg Extravaganza</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 120.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza9" />
												<br> </br>
												<br> Quantity <input type=number name="t11">
												<?php
										session_write_close();
                                                                                                                               
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost11'] = $cost;
										
										if(isset($_POST["pizza9"]))
										{
											if(isset($_POST['t11'])) 
											{
                                                $qty=$_POST['t11']; 
												$_SESSION['qty11'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty11'] = $qty;
												}
											}	
											$food1='Veg Extravaganza';
											$_SESSION['product_name11'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid11']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid11']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid11'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost11'];
										$qty = $_SESSION['qty11'];
										$product_name = $_SESSION['product_name11'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                               
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-8-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Indi Tandoori</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 60.00</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pizza14" />
												<br> </br>
												<br> Quantity <input type=number name="t12">
												<?php
										session_write_close();
                                                                                                                                
										include("toconnect.php");
										$cost=60;
										$_SESSION['cost12'] = $cost;
										
										if(isset($_POST["pizza14"]))
										{
											if(isset($_POST['t12'])) 
											{
                                                $qty=$_POST['t12']; 
												$_SESSION['qty12'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty12'] = $qty;
												}
											}	
											$food1='Indi Tandoori';
											$_SESSION['product_name12'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid12']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid12']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid12'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost12'];
										$qty = $_SESSION['qty12'];
										$product_name = $_SESSION['product_name12'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                               
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
                </div><!-- row -->
        </div><!-- container -->
</section>


<section class="story-area bg-seller color-white pos-relative">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
                <h4 class="font-30 font-sm-20  center-text mb-25">Add a fresh <b>Salad</b> to your order</h4>
        </div><!-- container -->
</section>


<section>
        <div class="container">
                <div class="heading mb-sm-10"><h3>Choose from Pasta</h3></div>
                <div class="row">
                        <div class="col-md-12 col-lg-6">
                                <div class="sided-220x responsive mb-30 left-text center-sm-text">
                                        <div class="s-left mlr-sm-auto"><img  src="images/pasta-1-300x300.png" alt="Menu Image"></div>
                                        <div class="s-right">
                                                <h5>Capellini Pasta</h5>
												<form action="" method="post">
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pasta2" />
                                                <h4 class="mtb-10"><b class="color-primary">Rs 120.0</b></h4>
												<br> </br>
												<br> Quantity <input type=number name="t13">
												<?php
										session_write_close();
                                                                                                                                 
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost13'] = $cost;
										
										if(isset($_POST["pasta2"]))
										{
											if(isset($_POST['t13'])) 
											{
                                                $qty=$_POST['t13']; 
												$_SESSION['qty13'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty13'] = $qty;
												}
											}	
											$food1='Capellini Pasta';
											$_SESSION['product_name13'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid13']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid13']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid13'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost13'];
										$qty = $_SESSION['qty13'];
										$product_name = $_SESSION['product_name13'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- col-md-6 -->

                        <div class="col-md-12 col-lg-6">
                                <div class="sided-220x responsive mb-30 left-text center-sm-text">
                                        <div class="s-left mlr-sm-auto"><img  src="images/pasta-2-300x300.png" alt="Menu Image"></div>
                                        <div class="s-right">
                                                <h5>Fusilli Pasta</h5>
												<form action="" method="post">
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pasta10" />
                                                <h4 class="mtb-10"><b class="color-primary">Rs 120.0</b></h4>
												<br> </br>
												<br> Quantity <input type=number name="t14">
												<?php
										session_write_close();
                                                                                                                                   
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost14'] = $cost;
										
										if(isset($_POST["pasta10"]))
										{
											if(isset($_POST['t14'])) 
											{
                                                $qty=$_POST['t14']; 
												$_SESSION['qty14'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty14'] = $qty;
												}
											}	
											$food1='Fusilli Pasta';
											$_SESSION['product_name14'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid14']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid14']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid14'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost14'];
										$qty = $_SESSION['qty14'];
										$product_name = $_SESSION['product_name14'];
				
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!--col-md-6 -->
                </div><!-- row-->

                <div class="brder-t-light mt-sm-10 mb-60 mb-sm-40"></div>

                <div class="row">
                        <div class="col-md-6">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="images/menu-5-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Macaroni</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 120.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pasta15" />
												<br> </br>
												<br> Quantity <input type=number name="t15">
												<?php
										session_write_close();
                                                                                                                                 
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost15'] = $cost;
										
										if(isset($_POST["pasta15"]))
										{
											if(isset($_POST['t15'])) 
											{
                                                $qty=$_POST['t15']; 
												$_SESSION['qty15'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty15'] = $qty;
												}
											}	
											$food1='Macaroni';
											$_SESSION['product_name15'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid15']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid15']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid15'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost15'];
										$qty = $_SESSION['qty15'];
										$product_name = $_SESSION['product_name15'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                               
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-6-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Italian pasta</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 200.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pasta16" />
												<br> </br>
												<br> Quantity <input type=number name="t16">
												<?php
										session_write_close();
                                                                                                                                
										include("toconnect.php");
										$cost=200;
										$_SESSION['cost16'] = $cost;
										
										if(isset($_POST["pasta16"]))
										{
											if(isset($_POST['t16'])) 
											{
                                                $qty=$_POST['t16']; 
												$_SESSION['qty16'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty16'] = $qty;
												}
											}	
											$food1='Italian Pasta';
											$_SESSION['product_name16'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid16']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid16']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid16'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost16'];
										$qty = $_SESSION['qty16'];
										$product_name = $_SESSION['product_name16'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                               
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="images/menu-7-120x120.jpg"  alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Penne Pasta</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 120.0</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pasta17" />
												<br> </br>
												<br> Quantity <input type=number name="t17">
												<?php
										session_write_close();
                                                                                                                                 
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost17'] = $cost;
										
										if(isset($_POST["pasta17"]))
										{
											if(isset($_POST['t17'])) 
											{
                                                $qty=$_POST['t17']; 
												$_SESSION['qty17'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty17'] = $qty;
												}
											}	
											$food1='Penne Pasta';
											$_SESSION['product_name17'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid17']=$row["Product_id"];
											mysqli_free_result($res);
										}
										
									?>
									<?php 
									
									if(isset($_SESSION['productid17']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid17'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost17'];
										$qty = $_SESSION['qty17'];
										$product_name = $_SESSION['product_name17'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                              
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->

                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/menu-8-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b>Ziti Pasta</b>
												<form action="" method="post">
												<b class="color-primary float-right">Rs 60.00</b></h5>
												<h5><input class="plr-20 color-red btn-fill-primary" type="submit" value="Add to cart" name="pasta18" />
												<br> </br>
												<br> Quantity <input type=number name="t18">
												<?php
										session_write_close();
                                                                                                                                
										include("toconnect.php");
										$cost=120;
										$_SESSION['cost18'] = $cost;
										
										if(isset($_POST["pasta18"]))
										{
											if(isset($_POST['t18'])) 
											{
                                                $qty=$_POST['t18']; 
												$_SESSION['qty18'] = $qty;
                                                echo $qty;
												if($qty ==0){
													$qty = 1;
													$_SESSION['qty18'] = $qty;
												}
											}	
											$food1='Ziti Pasta';
											$_SESSION['product_name18'] = $food1;
											$sql = "CALL getPid('$food1');";
											$res=mysqli_query($connection,$sql);
											$row=mysqli_fetch_array($res);
											$_SESSION['productid18']=$row["Product_id"];
											mysqli_free_result($res);
										}
										

									?>
									<?php 
									
									if(isset($_SESSION['productid18']))
									{
										include("toconnect.php");
										$productid = $_SESSION['productid18'];
										$cust_id = $_SESSION['cust_id'];
										$cost = $_SESSION['cost18'];
										$qty = $_SESSION['qty18'];
										$product_name = $_SESSION['product_name18'];
										
										mysqli_query($connection,"CALL intoCart('$cust_id','$productid','$product_name','$cost','$qty')");
											
									}
									
									?>                 
							</form>
                                                
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
                </div><!-- row -->
        </div><!-- container -->
</section>


<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p> Bangalore . Mumbai . Chennai . Kolkata</p>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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