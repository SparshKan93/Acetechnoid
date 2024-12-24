@extends('bhumika-prakashan.layout')

@section('content')
<style type="text/css">
   .margin-custom{
        margin-bottom: 35px;
   } 
</style>
   
    <div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>Subjects</h2>
                        <p style="color: white">
                            Teacher Manual Select Subject, 
                        </p>
					</div>
				</div>
			</div>
		</div>
	</div>

     <div id="about" class="section wb">
        <div class="container">
            @if(isset($subjects))
            @foreach($subjects as $key => $list)
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box margin-custom">
                        <!-- <h4>Our Series Books</h4> -->
                        <a href="{{url('download/'.$title.'?subject='.str_replace(' ', '-', $list->name))}}" class="btn btn-light btn-radius btn-brd grd1 btn-block">{{$list->name}}</a>
                        
                    </div><!-- end messagebox -->
                </div><!-- end col -->
                
            </div><!-- end row -->
            @endforeach
            @endif

            @if(isset($book_key))
            @foreach($book_key as $key => $list)
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box margin-custom">
                        <!-- <h4>Our Series Books</h4> -->
                        <a href="{{url('myebook/key/'.$list->id)}}" target="_blank" class="btn btn-light btn-radius btn-brd grd1 btn-block">{{$list->subject.' '.$list->name.'-'.$list->standard}}</a>
                        <!-- <a href="{{$list->key_link}}" target="_blank" class="btn btn-light btn-radius btn-brd grd1 btn-block">{{$list->subject.' '.$list->name.'-'.$list->standard}}</a> -->
                        
                    </div><!-- end messagebox -->
                </div><!-- end col -->
                
            </div><!-- end row -->
            @endforeach
            @endif

        </div><!-- end container -->
    </div><!-- end section -->

   
@endsection