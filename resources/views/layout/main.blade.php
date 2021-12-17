<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
	<style>
		.cart_quantity .cart_quantity_button #upd {
			justify-content: center;
			background-color: rgb(0, 255, 213);
			margin-left: 5px;
			display: inline-block;
		}

		

		#upd_text {
			color : rgb(177, 30, 30);
			margin-left: -5px;
			justify-content: center;
			margin-top: -40px;
			margin-left: 10px;
		}
		
		
	</style>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/home"><img src="/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if( Auth::user() )
								<li><a href="/logout"><i class="fa fa-user"></i> Logout</a></li>
								@endif
								<li><a href="/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="/transaction"><i class="fa fa-crosshairs"></i> Your transaction</a></li>
								<li><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								@if( !Auth::user() )
								<li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->		
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9 ">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/home">Home</a></li>
								<li><a href="/product">Products</a></li>
								
								<li><a href="/blogg">Blog List</a></li>
							</ul>
							<ul>

							</ul>
						</div>
					</div>
					<div class="navbar-search-inline" style="display: inline-block; margin-right:-200px">
						<form class="form-inline">
						  <div class="input-group input-group-sm">
							<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-navbar" type="submit">
							  Cari
							</button>
						  </div>
						</form>
					  </div>
				</div>
				</div>
			</div>
	</header>
	
	@yield('konten')
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container" >
				<div class="row text-center">
					
					<div class="col-sm-7">
						<div class="single-widget">
							<h2>About Portio.id</h2>
							<ul class="nav nav-pills nav-stacked">
								
								<li><a href="https://www.instagram.com/portio.id/"><i class="nav-item fab fa-instagram" target="_blank"></i> Portio.id</a></li>
								<li><a href=""><i class="fas fa-phone"></i> 085156098532</a></li>
								<li><a href=""><i class="nav-item fas fa-map-marker-alt"></i> Offline Store K3 Adam Malik, Medan, Sumatera Utara</a></li>
								<li><a href=""><i class="nav-item fas fa-map-marker-alt"></i> Jalan Pondok Surya VI A No. 231c, Helvetia Timur, Medan Helvetia,Kota Medan</a></li>
								<li><a href="/faq"><i class="nav-item fas fa-question"></i> FAQ’s</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="single-widget">
							<a href="/home"><img src="/images/home/logoportio.jpg" alt="" style="border-radius: 50%" width="210px"></a>
						</div>
					</div>				
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

  
    <script src="/js/jquery.js"></script>
	<script src="/js/popper.js"></script> 
	<script src="/js/bootstrap.js"></script>
	<script src="/js/price-range.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>

	<!-- Fontawesome JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>
</html>