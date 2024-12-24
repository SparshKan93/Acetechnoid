@extends('avani.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="smartchoice/styles/contact.css">
<link rel="stylesheet" type="text/css" href="smartchoice/styles/contact_responsive.css">
@endsection

@section('content')

	<!-- Home -->

	<div class="home">
		<!-- Background image artist https://unsplash.com/@thepootphotographer -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="smartchoice/images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Contact</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{url('/')}}">Home</a></li>
									<li>Contact</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container-fluid">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
				<div class="col-xl-6">
					<div class="contact_content">
						<div class="row">
							<div class="col-xl-6">
								<div class="contact_info_container">
									<div class="contact_info_main_title">Contact Us</div>
									<div class="contact_info">
									<div class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form">
								<div>
									<div class="row">
										<div class="col-lg-6 contact_name_col">
											<input type="text" class="contact_input" placeholder="Name" required="required">
										</div>
										<div class="col-lg-6">
											<input type="email" class="contact_input" placeholder="E-mail" required="required">
										</div>
									</div>
								</div>
								<div><input type="text" class="contact_input" placeholder="Subject" required="required"></div>
								<div><textarea class="contact_input contact_textarea" placeholder="Message"></textarea></div>
								<button class="contact_button"><span>send message</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
							</form>
						</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Address:</div>
											<div class="contact_info_line">9753b, Delhi - Meerut Expy, near Petrol Pump, Sector - 3, Hapur, Uttar Pradesh 245101</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Phone:</div>
											<div class="contact_info_line">(+91) 790 614 8828</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Email:</div>
											<div class="contact_info_line">info@smartchoicebooks.in</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Contact Map -->
				<div class="col-xl-5 map_col">
					<div class="contact_map">

						<!-- Google Map -->
						<div id="google_map" class="google_map">
							<div class="map_container">
								<div id="map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d874.6742728453955!2d77.7668024291625!3d28.72859717492228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390c85bcb78a498b%3A0x683c1dff2dfd6a84!2sSatyam%20publication%20atul!5e0!3m2!1sen!2sin!4v1674525742522!5m2!1sen!2sin"  style="border:0;width:100%;height:100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
				
		</div>
	</div>


@endsection

@section('js')
<script src="smartchoice/js/contact.js"></script>
@endsection