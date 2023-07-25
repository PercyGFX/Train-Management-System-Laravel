<!DOCTYPE html>
<html lang="en">
<head>
<title>About us</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Destino project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="frontend/styles/bootstrap4/bootstrap.min.css">
<link href="frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="frontend/styles/about_styles.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/about_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_container d-flex flex-row align-items-center justify-content-start">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<div>ETrain</div>
								<div>Train Agency</div>
								<div class="logo_image"><img src="frontend/images/logo.png" alt=""></div>
							</div>
						</div>

						<!-- Main Navigation -->
						<nav class="main_nav ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item active"><a href="index.html">Home</a></li>
								<li class="main_nav_item "><a href="#">Trains</a></li>
								<li class="main_nav_item"><a href="offers.html">Loyality</a></li>
								<li class="main_nav_item"><a href="news.html">Login</a></li>
								<li class="main_nav_item"><a href="contact.html">Register</a></li>
							</ul>
						</nav>

						<!-- Search -->
						

						<!-- Hamburger -->
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="index.html">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">Trains</a></li>
					<li class="menu_item menu_mm"><a href="offers.html">Loyality</a></li>
					<li class="menu_item menu_mm"><a href="news.html">Login</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Register</a></li>
				</ul>

				<!-- Menu Social -->
				
			

				
			</div>

		</div>

	</div>
	
	
	@yield('content')


	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Column -->
				<div class="col-lg-4 footer_col">
					<div class="footer_about">
						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<div>ETrain</div>
								<div>travel agency</div>
								<div class="logo_image"><img src="frontend/images/logo.png" alt=""></div>
							</div>
						</div>
						<div class="footer_about_text">About this cpmpany</div>
						<div class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> 
</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-4 footer_col">
					<div class="footer_latest">
						<div class="footer_title">second tab</div>
						<div class="footer_latest_content">

							

						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-4 footer_col">
					<div class="tags footer_tags">
						<div class="footer_title">Third tab</div>
						
					</div>
				</div>

			</div>
		</div>
	</footer>
</div>

<script src="frontend/js/jquery-3.2.1.min.js"></script>
<script src="frontend/styles/bootstrap4/popper.js"></script>
<script src="frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="frontend/plugins/easing/easing.js"></script>
<script src="frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="frontend/js/about_custom.js"></script>
</body>
</html>