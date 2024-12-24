@extends('website.layout')

@section('content')


   <!-- Page Header End -->
   <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">E-Books</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                        <li class="breadcrumb-item text-white active" aria-current="page">E-Books</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Books</h1>
                    <p>Select One!</p>
                </div>
                @if(isset($_GET['s']))
                <div class="row">
                <div class="bg-light rounded col-md-6">
                    <div class="row g-0">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <!--<p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>-->
                                    <div class="row g-3">
                                        @foreach($subjects as $key => $list)
                                        <div class="col-12">
                                            <a class="btn btn-primary w-100 py-3" href="{{url('product?sr='.$data.'&sub='.$list->name)}}">{{$list->name}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded col-md-6">
                    <div class="row g-0">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <!--<p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>-->
                                    <div class="row g-3">
                                        @foreach($standard as $key => $list)
                                        <div class="col-12">
                                            <a class="btn btn-primary w-100 py-3" href="{{url('product?sr='.$data.'&std='.$list->name)}}">Class {{$list->name}}</a>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @elseif(isset($_GET['sr']))
                <div class="row">
                    @foreach($books as $key => $list)
                    @if(!empty($list->page))
                    <div class="col-md-4">
                    
                    <div class="testimonial-item bg-light rounded p-5">
                        <!-- <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p> -->
                        <div class=" align-items-center " style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid " src="{{url('uploads/ebook/ebook-'.$list->id.'/1.jpg')}}" onerror="this.src='https://www.wildwood-fl.gov/sites/default/files/imageattachments/building/page/5223/66-668670_board-under-construction-sign.png'">
                            
                            <h3 class="d-block mt-3 mb-4">{{$list->name.'-'.$list->standard}}</h3>
                                <span>A Book of {{$list->subject}}</span>
                                <a class="btn btn-primary w-100 my-1" href="{{route('myebook.show',$list->id)}}">Flipbook</a>
                                <a class="btn btn-primary w-100 my-1" href="{{route('test-paper.create').'?ebook='.$list->id}}">Test Paper</a>        
                                @if(!is_null($list->key_link))
                                <a class="btn btn-primary w-100 my-1" href="{{url('myebook/key/'.$list->id)}}">Teacher Manual</a>        
                                @endif
                            <!-- <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i> -->
                        </div>
                    </div>
                    </a>
                    </div>
                    <!-- end service -->
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <!-- Contact End -->

        @endsection