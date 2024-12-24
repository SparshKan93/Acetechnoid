@extends('avani.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="smartchoice/styles/contact.css">
<link rel="stylesheet" type="text/css" href="smartchoice/styles/contact_responsive.css">
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
							<div class="home_title">DOWNLOAD</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{url('/')}}">Home</a></li>
									<li>Download</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Courses -->

	<div class="courses">
		<div class="container">
						
			<div class="row courses_row">
				
				<!-- Course -->
				<div class="col-lg-4 col-md-6">
					<div class="course">
						<div class="course_image"><img src="smartchoice/img/order-form-bg.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><h3><a href="courses.html">ORDER FORM</a></h3></div>
							<!-- <div class="course_text">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div> -->
							
						</div>
					</div>
				</div>

			</div>
			<div class="row courses_row">
				
				<!-- Course -->
				<div class="col-lg-12 col-md-12">
					<div class="table-responsive">
						<table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Book Name</th>
                                <th>Publication</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$list)
                              <tr>
                                <td>{{$list->name.'-'.$list->standard}}</td>
                                <td>{{$list->publication}}</td>
                                <td>
                                    <input type="password" name="secret_key" placeholder="Pass Code">
                                    <button class="btn" title="Download" data-href="{{$list->key_link}}" data-code="{{$list->key_code}}">Download</button> 
                                </td>
                              </tr>
                                @endforeach
                            </tbody>
                          </table>
					</div>
				</div>

			</div>
			
		</div>
	</div>


@endsection

@section('js')
<!--<script src="smartchoice/js/courses.js"></script>-->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function() {
              $('.table1').DataTable();
          } );
        </script>

        <script type="text/javascript">
          $(document).ready(function(){

            $('.table').on('click', '.btn', function(e){
            e.preventDefault();
              var link = $(this).data('href');
              var code = $(this).data('code');
              var secret_key = $(this).closest('td').find('input[type=password]').val();
              if (code == secret_key) {
                window.location.replace(link);
              }
              else{
                alert("Sorry! Secret key doesn't match.");
              }
              $(this).closest('td').find('input[type=password]').val('');
            });

          });
        </script>
@endsection