<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name', 'Acetechnoid') }}</title>
<!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('smartchoice/img/logo1.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('smartchoice/img/logo1.png')}}">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Publisher in hapur">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="smartchoice/styles/bootstrap4/bootstrap.min.css">
<link href="smartchoice/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="smartchoice/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="smartchoice/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="smartchoice/plugins/OwlCarousel2-2.2.1/animate.css">
<link href="smartchoice/plugins/video-js/video-js.css" rel="stylesheet" type="text/css">

@yield('css')

<style>
	.header.scrolled{
		top: 0 !important;
	}
	.header.scrolled .header_content{
		height: 95px;
	}
</style>

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar d-none">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Have any questions?</div></li>
									<li>
										<div>(+91) 790 614 8828</div>
									</li>
									<li>
										<div>info@avanipublishers.in</div>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<ul>
										<li><a href="#">Register</a></li>
										<li><a href="#">Login</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container" style="background:#ffffff0d">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="#">
									<div class="logo_content d-flex flex-row align-items-end justify-content-start">
										<!-- <div class="logo_img"><img src="smartchoice/images/logo.png" alt=""></div> -->
										<div class="logo_img">
										    <img src="{{asset('smartchoice/img/logo1.png')}}" alt="" style="height:110px;margin-top: 10px;">
										</div>
										<div class="logo_text d-none">learn</div>
									</div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{url('/')}}">home</a></li>
									<li class="{{ Request::is('product') ? 'active' : '' }}"><a href="{{route('product')}}">Ebook</a></li>
									<li class="{{ Request::is('download') ? 'active' : '' }}"><a href="{{route('download')}}">download</a></li>
									<li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{route('about')}}">about us</a></li>
									<li class="{{ Request::is('contact-us') ? 'active' : '' }}"><a href="{{route('contact')}}">contact us</a></li>
								</ul>
								<!-- <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div> -->

								<!-- Hamburger -->

								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container d-none">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

	@yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- About -->
				<div class="col-lg-5 footer_col">
					<div class="footer_about">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-row align-items-end justify-content-start">
									<div class="logo_img"><img class="img-responsive" src="smartchoice/img/logo1.png" alt="" width="100%"></div>
									<!-- <div class="logo_text">learn</div> -->
								</div>
							</a>
						</div>
						<div class="footer_about_text d-none">
							<p>Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar.</p>
						</div>
						<div class="footer_social d-none">
							<ul>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						
					</div>
				</div>

				<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Quick menu</div>
						<ul class="footer_list">
							<li><a href="{{url('/')}}">HOME</a></li>
							<li><a href="{{route('product')}}">EBOOK</a></li>
							<li><a href="{{route('download')}}">DOWNLOAD</a></li>
							<li><a href="{{route('about')}}">ABOUT US</a></li>
							<li><a href="{{route('contact')}}">CONTACT US</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-4 footer_col">
					<div class="footer_contact">
						<div class="footer_title">Contact Us</div>
						<div class="footer_contact_info">
							<div class="footer_contact_item">
								<div class="footer_contact_title">Address:</div>
								<div class="footer_contact_line">XYZ, Delhi - Meerut Expy, near Petrol Pump, Uttar Pradesh 245101</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Phone:</div>
								<div class="footer_contact_line">(+91) 98765 43210</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Email:</div>
								<div class="footer_contact_line">info@avanipublishers.in</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by <a href="https://acetechnoid.com" target="_blank">ACETECHNOID</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="smartchoice/js/jquery-3.2.1.min.js"></script>
<script src="smartchoice/styles/bootstrap4/popper.js"></script>
<script src="smartchoice/styles/bootstrap4/bootstrap.min.js"></script>
<script src="smartchoice/plugins/greensock/TweenMax.min.js"></script>
<script src="smartchoice/plugins/greensock/TimelineMax.min.js"></script>
<script src="smartchoice/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="smartchoice/plugins/greensock/animation.gsap.min.js"></script>
<script src="smartchoice/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="smartchoice/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="smartchoice/plugins/easing/easing.js"></script>
<script src="smartchoice/plugins/video-js/video.min.js"></script>
<script src="smartchoice/plugins/video-js/Youtube.min.js"></script>
<script src="smartchoice/plugins/parallax-js-master/parallax.min.js"></script>

@yield('js')

</body>
</html>