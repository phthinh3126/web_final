
<?php 
	session_start();
	$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");

	function deleteel(){
		$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
		$quantity = $_POST['quantity'];
		$id = $_POST['id'];
		$array = array_combine($quantity,$id);
		foreach($array as $q => $i)
		{
			$sql = "delete from cart where id='$i'";	
			if ($connect->query($sql) === TRUE) {
				echo "";
			} else {
				echo "";
			}
		}
								
	}

	if(array_key_exists('del',$_POST)){
		deleteel();	
	}					
								
	if(isset($_POST['thanhtoan'])){
		$sql = "delete from cart";
		header('Location: http://localhost/new1/index.php');	
		if ($connect->query($sql) === TRUE) {	
			echo "ok";
		} else {
			echo "";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>product-detail</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
	 crossorigin="anonymous">
	 <link href="css/style123.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
<div class="top_bg">
<div class="wrap">
	<div class="header">
	
		 <div class="log_reg">
				<ul>
					<li><a href="login.php">Login</a> </li>
					<span class="log"> or </span>
					<li><a href="signup.php">Register</a> </li>								   
					<div class="clear"></div>
				</ul>
		</div>	
								
		<div class="clear"></div>
	</div>	
</div>
</div>
<div class="navigation">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img class="navbar-brand" src="./style/pictures/organicLogo.png" width="80px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo 'index.php';?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.php">About</a>
                    </li>
                </ul>
                <form method="post" action="search.php" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="searchproduct" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name= "search" type="submit">Search</button>
					<a class="button custom" href="<?php echo "cart.php";?>" method="get"><i class="fas fa-shopping-cart"></i></a>
                    <span class='badge badge-warning' id='lblCartCount'></span>
                </form>
            </div>
        </nav>
    </div>
	<!------------>
	<div class="container container-cart">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info panel-info-cart">
					<div class="panel-heading panel-heading-cart">
						<div class="panel-title">
							<div class="row">
								<div class="col-md-6">
									<h5><span class="glyphicon glyphicon-shopping-cart"></span> Cart</h5>
								</div>
								<div class="col-md-6"><a href="products.php">
										<button type="button" class="btn btn-primary btn-sm btn-block">
											<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
					<script>
						function delElement(a){
							inames.splice(a,1);
							iqtyp.splice(a,1)
							iprice.splice(a,1)
							
						}
						function calculate(a,b){
							
							var quanti = number("b.value");
							return a * quanti;
						}
					</script>
					<script type="text/javascript">
function tableInputKeyPress(e){
  e=e||window.event;
  var key = e.keyCode;
  if(key==13) 
  {
    
     return true; 
  }
}
</script>
<script>
<!--
function confirmRefresh() {
var okToRefresh = confirm("Do you really want to refresh the page?");
if (okToRefresh)
	{
			setTimeout("location.reload(true);",1500);
	}
}
// -->
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}



//   -->

</script>
					
<?php	
	$query = "SELECT * FROM cart ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	error_reporting(0);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			@$tong += $row['price'] *  $row['quantity'];		
?>
					
					<div class="panel-body panel-body-cart">
						<div class="row">
							<div class="col-md-2"><img class="img-responsive" <?php echo $row["image"]; ?> >
							<?php	echo '<img src='.$row['image'].' />';?>

							</div>
							<div class="col-md-6">
								<h4 class="product-name"><strong>Product</strong></h4>
								<h4><small><?php echo $row["name"];?></small></h4>
							</div>
							<div class="col-md-4 omg">
								<div class="row">
									<div class="col-md-4 align">
										<h6><strong><?php echo $row["price"];?>&#x20AB; </strong></h6>
									</div>
									<div class="col-md-4">
										<form action="cart.php?r=update" method="post" >
										<input type="hidden" name="id[]" value="<?php echo $row['id']?>"/>
											
										<input type="text" class="form-control " name="quantity[]" value="<?php echo $row['quantity']?>"/>
										<input onclick=" timedRefresh(100)" class="btn btn-success" type="submit" value="OK" name="submit">	
										<button type="submit" name="del" class="btn btn-link btn-xs">
											<i class="fas fa-trash-alt"></i>
										</button>	
											</form>	
									</div>
									
									
								</div>
								
								<?php 
								$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
								if(isset($_POST['submit'])){
									if(isset($_POST['quantity']))
									{
										$quantity = $_POST['quantity'];
										$id = $_POST['id'];
										$array = array_combine($quantity,$id);
										foreach($array as $q => $i)
										{
											$sql = "update cart set quantity='$q' where id = '$i'";
											if ($connect->query($sql) === TRUE) {
												echo "";
											} else {
												echo "";
											}
										}
									}
								}
								?>
							</div>
						</div>
						
						<?php
						
						
					}
				}
				?>
						<hr>
						
					</div>
					<form action="cart.php" method="post">
					<div class="panel-footer panel-footer-cart">
						<div class="row text-center">
							
							<div class="col-md-9">
	
								<h4 class="text-right" id="sum">Total <strong><?php echo $tong;?>&#x20AB;</strong></h4>
							
							</div>
							<div class="col-md-3">
								<form action="cart.php" method="post">
							
								<button type="submit" name="thanhtoan" onclick="alert('Thank you for our purchase, the price of your shopping cart is:<?php echo $tong;?>&#x20AB;')" name ="sum" id="sum" onclick="window.location.reload();" class="btn btn-success btn-block">
								payment
								</button>
								
							</form>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	
	<!-- //newsletter-->

	<!-- footer -->
	<div class="footer_agileinfo_w3">
		<div class="footer_inner_info_w3ls_agileits">
			<div class="col-md-3 footer-left">
				<h2><a href="index.php"><span>F</span>ooseshoes </a></h2>
				<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.
</p>
				<ul class="social-nav model-3d-0 footer-social social two">
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 footer-right">
				<div class="sign-grds">
					<div class="col-md-4 sign-gd">
						<h4>Our <span>Information</span> </h4>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="products.php">shop</a></li>
							<li><a href="products.php">Nike</a></li>

							<li><a href="products.php">Adidas</a></li>

							<li><a href="about.php">About</a></li>
							<li><a href="cart.php">Cart</a></li>
						
						</ul>
					</div>

					<div class="col-md-5 sign-gd-two">
						<h4>Store <span>Information</span></h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Phone Number</h6>
									<p>+1 234 567 8901</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Email Address</h6>
									<p>Email :<a href="mailto:alnguyen00000@gmail.com"> fooseshoes@gmail.com</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Location</h6>
									<p>Broome St, NY 10002,California, USA.

									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3 sign-gd flickr-post">
						<h4>Flickr <span>Posts</span></h4>
						<ul>
							<li><a href="single.html"><img src="images/t1.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t3.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t4.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t1.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t3.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t2.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/t4.jpg" alt=" " class="img-responsive" /></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>

			<p class="copy-right-w3ls-agileits">&copy 2020 Foose Shoes. All rights reserved | Design by Thinh&Anh</p>
		</div>
	</div>
	</div>
	<!-- //footer -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<script>
    var countPro = 0;
	
    function AddPro() {
        window.scrollTo(0, 0)
        countPro = countPro + 1;
        document.getElementById("lblCartCount").innerHTML = countPro;
		
	};
</script>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- js for portfolio lightbox -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->

	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>	
	
</body>
</html>