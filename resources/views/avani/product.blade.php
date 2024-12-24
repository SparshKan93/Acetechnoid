@extends('avani.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="smartchoice/styles/courses.css">
<link rel="stylesheet" type="text/css" href="smartchoice/styles/courses_responsive.css">
@endsection

@section('content')

	<div class="home">
		<!-- Background image artist https://unsplash.com/@thepootphotographer -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="smartchoice/images/courses.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">EBOOK</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{url('/')}}">Home</a></li>
									<li>Ebook</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Courses -->
@if(isset($_GET['s']))
	<div class="courses">
		<div class="container">
						
			<!-- Featured Course -->
			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">Select a subject</a></div>
							<!-- <div class="featured_price ml-auto">Smart Choice Books International: <span>$35</span></div> -->
						</div>
						<div class="featured_title">
							@foreach($subjects as $key => $list)
							<h3><a href="{{url('product?sr='.$data.'&sub='.$list->name)}}">{{$list->name}}</a></h3>
							@endforeach
						</div>
						<!-- <div class="featured_text">English Medium.</div> -->
					</div>
				</div>
				<div class="col-lg-6 featured_col">
					<!-- Background image -->
					<div class="featured_background" style="background-image:url(smartchoice/images/smartchoice.jpg)"></div>
				</div>
			</div>

			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<!-- Background image -->
					<div class="featured_background" style="background-image:url(smartchoice/images/sarthakbooks.jpg)"></div>
				</div>
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">Select a class</a></div>
							<!-- <div class="featured_price ml-auto">Smart Choice Books International: <span>$35</span></div> -->
						</div>
						<div class="featured_title">
							@foreach($standard as $key => $list)
							<h3><a href="{{url('product?sr='.$data.'&std='.$list->name)}}">{{$list->name}}</a></h3>
							@endforeach
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
@elseif(isset($_GET['sr']))
	<div class="courses">
		<div class="container">
						
			<div class="row courses_row">
				@foreach($books as $key => $list)
                @if(!empty($list->page))
				<!-- Course -->
				<div class="col-lg-4 col-md-6">
					<div class="course">
						<div class="course_image"><img src="{{asset('uploads/ebook/ebook-'.$list->id.'/1.jpg')}}" alt=""></div>
						<div class="course_body">
							<div class="course_title"><h3><a href="{{ url('myebook/'.$list->id) }}" target="_blank">{{$list->name}}</a></h3></div>
							<div class="course_text">{{$list->description}}</div>
							
						</div>
					</div>
				</div>
				@endif
				@endforeach

			</div>
			
		</div>
	</div>
@else
	<div class="courses">
		<div class="container">
						
			<!-- Featured Course -->
			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_title"><h3>Avani Publisher</h3></div>
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="{{url('product?s=Smart Choice')}}">Explore English Medium Books</a></div><br>
							<!-- <div class="featured_price ml-auto">Smart Choice Books International: <span>$35</span></div> -->
						</div>
						</br>
						<!--<div class="featured_header d-flex flex-row align-items-center justify-content-start">-->
						<!--	<div class="featured_tag"><a href="{{url('product?s=Hindi Medium')}}">Explore Hindi Medium Boooks</a></div>-->
							<!-- <div class="featured_price ml-auto">Smart Choice Books International: <span>$35</span></div> -->
						<!--</div>-->
						<!--<a href="{{url('product?s=Smart Choice')}}">-->
						<!--<div class="featured_text">English Medium.</div>-->
					 <!--   </a>-->
					</div>
				</div>
				<div class="col-lg-6 featured_col">
					<!-- Background image -->
					<div class="featured_background" style="background-image:url(smartchoice/images/smartchoice.jpg"></div>
				</div>
			</div>

			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<!-- Background image-->
					<div class="featured_background" style="background-image:url(smartchoice/images/sarthakbooks.jpg)"></div>
				</div>
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_title"><h3><a href="{{url('product?s=Sarthak Books')}}">Avani Publisher </a></h3></div>
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">Explore Books</a></div>
							<!-- <div class="featured_price ml-auto">Smart Choice Books International: <span>$35</span></div> -->
						</div>
						<div class="featured_text">Hindi Medium</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>	
@endif

@endsection

@section('css')
<script src="smartchoice/js/courses.js"></script>
@endsection