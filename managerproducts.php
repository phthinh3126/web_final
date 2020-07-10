<?php 
	session_start();
	$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
		
	function add(){					
		$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
		$sql = "INSERT INTO cart(id,name,image,price,quantity)
				values('{$_POST['hidden_id']}','{$_POST['hidden_name']}','{$_POST['hidden_img']}','{$_POST['hidden_price']}',1)";
								
		if ($connect->query($sql) === TRUE) {
			echo "";
		} else {
			echo "";
		}
								
	}

	if(array_key_exists('add',$_POST)){
		add();	
	}
?>

<!DOCTYPE html>
<html>

<head>
<style>

</style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible">
    <title>Page Title</title>
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
					<li><a href="add_product.php">Add product</a> </li>
                    <li><a href="del_product.php">Delete products</a> </li>	
                    <li><a href="edit_product.php">Edit product</a> </li>	
                    <li><a href="index.php">Log out</a> </li>	
					
											   
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
                        <a class="nav-link" href="<?php echo 'index.php';?>">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.php">Thông tin</a>
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
	<br>
   <br>
   <div class="index-product">

	<div class="container">
						<div class="row">
						<meta charset="utf-8" />

	<?php
		$query = "SELECT * FROM products ORDER BY id ASC";
		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
			{		
	?>
	<br>

	<div class="col-sm-4 col-md-4 prod">
	<br>

		<form action="quanliorder.php" method="post"<?php echo '<img src='.$row['image'].' />';?>
            <div class="product-index-info">
                <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                <h4 class="text-danger"> <?php echo $row["price"]; ?> &#x20AB; </h4>
                <h4 class="text-danger">mã sản phẩm: <?php echo $row["id"]; ?>  </h4>
				<h4 class="text-info">mô tả sản phẩm <?php echo $row["description"]; ?></h4>
				<input type="hidden" id="hidden_quantity" name="hidden_quantity" value="<?php echo $row["quantity"]; ?>" />
				<input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
					Nhập số lượng sản phẩm nhập kho (0-200):
					<input type="number" id = "quantity" name = "quantity" min= "0" max = "200"/>
					<br/>
					<input type="submit" id="nhap_kho" name="nhap_kho" class="fadeIn fourth" value="Nhập kho">
					<input type="submit" id="xuat_kho" name="xuat_kho" class="fadeIn fourth" value="Xuất kho">
			</div>
        </form>
	<br>
	<br>
	</div>
	<?php
			}
		}
	?>

<?php
	$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
	if(isset($_POST['nhap_kho'])){
		$id = $_POST['hidden_id'];
		$tong = $_POST['hidden_quantity'] + $_POST['quantity'];
		$sql = "update products set quantity = '$tong' where id = '$id'";
		if ($connect->query($sql) === TRUE) {
			echo "ok";
		} else {
			echo "fail";
		}	
	}
?>

<?php
	$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
	if(isset($_POST['xuat_kho'])){
		$id = $_POST['hidden_id'];
		$tong = $_POST['hidden_quantity'] - $_POST['quantity'];
		$sql = "update products set quantity = '$tong' where id = '$id'";
		if ($connect->query($sql) === TRUE) {
			echo "ok";
		} else {
			echo "fail";
		}	
	}
?>

</div>
		</div>
		</div>
        <br>
        <br>
    </footer>
    <!-- Footer -->
	
	
	<!-- /newsletter-->
	<div class="newsletter_w3layouts_agile">
		<div class="col-sm-6 newsleft">
			<h3>Sign up for Newsletter !</h3>
		</div>
		<div class="col-sm-6 newsright">
			<form action="#" method="post">
				<input type="email" placeholder="Enter your email..." name="email" required="">
				<input type="submit" value="Submit">
			</form>
		</div>

		<div class="clearfix"></div>
	</div>
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
</body>

</html>