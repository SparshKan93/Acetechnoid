@extends('smartchoicebooksinternational.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="smartchoice/styles/about.css">
<link rel="stylesheet" type="text/css" href="smartchoice/styles/about_responsive.css">
@endsection

@section('content')

<!-- Home -->

	<div class="home">
		<!-- Background image  -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="smartchoice/images/about.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">ABOUT US</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{url('/')}}">Home</a></li>
									<li>About Us</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- About -->

	<div class="about">
		<div class="container">
			<div class="row about_row row-lg-eq-height">
				<div class="col-lg-6">
					<div class="about_content">
						<div class="about_title">About Us</div>
						<div class="about_text">
							<p>We thank you for your interest in the books we publish. We try to bring a variety of quality textbooks and activity books for your wards. We know that you expect nothing but the best, but at the same time are conscious about quality and prices.
							Smart Choice Books features currently available, a list that will be constantly expanded to cover all subjects taught in the pre - primary, primary and middle level classes. The books we produce speak for themselves. However, listed below are some notable features about our publications.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_image"><img src="smartchoice/images/about2.jpg" alt="https://unsplash.com/@jtylernix"></div>
				</div>
			</div>
			<div class="row about_row row-lg-eq-height">
				<div class="col-lg-6 order-lg-1 order-2">
					<div class="about_image"><img src="smartchoice/images/about3.jpg" alt=""></div>
				</div>
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="about_content">
						<div class="about_title">Vision</div>
						<div class="about_text">
							<p>Usually the maintenance of high standards in the above features also translates to high prices, but owing to our high volume of sales, we manage to keep our prices low as well, when compared with titles of the same nature.

Do help our books reach your wards. We assure you of your full satisfaction with our products or in our commercial interaction. If you have any queries, or for sample coples of our publications, please contact any of our offices.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('css')
<script src="smartchoice/js/about.js"></script>
@endsection