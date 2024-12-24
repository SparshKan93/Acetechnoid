@extends('website.layout')

@section('content')


   <!-- Page Header End -->
   <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                        <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Welcome to Aspire Books Company</h1>
                        <p>We thank you for your interest in the books we publish. We try to bring a variety of quality textbooks and activity books for your wards. We know that you expect nothing but the best, but at the same time are conscious about quality and prices.</p>
                        <p class="mb-4">Aspire Books Company features currently available books, a list that will be constantly expanded to cover all subjects taught in the pre - primary, primary and middle level classes. The books we produce speak for themselves. However, listed below are some notable features about our publications.</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <!--<a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>-->
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                                    <div class="ms-3">
                                        <h6 class="text-primary mb-1">Jhon Doe</h6>
                                        <small>CEO & Founder</small>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <!-- <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{asset('website/img/banner1.jpg')}}" alt=""> -->
                                <img class="img-fluid p-3" src="{{asset('website/img/banner1.jpg')}}" alt="">
                            </div>
                            <!-- <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-2.jpg" alt="">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-3.jpg" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Call To Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="{{asset('website/img/banner.jpg')}}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h3 class="mb-4">COMMERCIAL VALUES</h1>
                                <p class="mb-4">Usually the maintenance of high standards in the above
                                     features also translates to high prices, but owing to our high 
                                     volume of sales, we manage to keep our prices low as well, when 
                                     compared with titles of the same nature.
                                </p>
                                <p class="mb-4">Do help our books reach your wards. We assure you of your
                                     full satisfaction with our products or in our commercial interaction.
                                      If you have any queries, or for sample coples of our publications,
                                       please contact any of our offices.
                                </p>
                                <!--<a class="btn btn-primary py-3 px-5" href="">Get Started Now</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call To Action End -->


        <!-- Team Start -->
        <!-- <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Popular Teachers</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                        eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="img/team-1.jpg" alt="">
                            <div class="team-text">
                                <h3>Full Name</h3>
                                <p>Designation</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="img/team-2.jpg" alt="">
                            <div class="team-text">
                                <h3>Full Name</h3>
                                <p>Designation</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="img/team-3.jpg" alt="">
                            <div class="team-text">
                                <h3>Full Name</h3>
                                <p>Designation</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">PRODUCTION QUALITY</h1>
                        <p>The high production that the beauty of text and graphics is brought out to the full. Clear and uniform impressions, with high quality inks on quality paper, all make for an attractive and durable product.</p>
                        <h4 class="mb-4">CONTENTS</h1>
                        <p class="mb-4">The authors, being teachers and educationists, are attracted in their subjects and aware of the latest syllabi prescribed by the Education Boards. Language used in kept simple, grammatically correct and idiomatic. Most of all, the written word reaches out, communicating to young minds. The flow of concepts is graded and grouped systematically under chapters and sub - headings, important topics being reiterated in referring 'point - wise system'.</p>
                        <h4 class="mb-4">ILLUSTRATIONS</h1>
                        <p class="mb-4">A picture is worth a thousand words. All our publications are richly illustrated by leading artists and graphic designers. Pertinent as well as attractive, the illustrations supplement the text, holding the young reader's attention.</p>
                      
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <!--<a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>-->
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                                    <div class="ms-3">
                                        <h6 class="text-primary mb-1">Jhon Doe</h6>
                                        <small>CEO & Founder</small>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <!-- <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{asset('website/img/banner1.jpg')}}" alt=""> -->
                                <img class="img-fluid p-3" src="{{asset('website/img/banner2.jpg')}}" alt="">
                            </div>
                            <!-- <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-2.jpg" alt="">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-3.jpg" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

       <!-- Classes Start -->
       <div class="container-xxl py-5">
            <div class="container">
                <!-- <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Books</h1>
                    <-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> --
                </div> -->
                <div class="row g-4">
                    
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="">
                        <div class="classes-item bg-light ">
                            <a href="">
                            <div class=" mx-auto p-3">
                                <img class="img-fluid" src="{{asset('website/img/classes-1.jpg')}}" alt="">
                            </div>
                            <div class=" rounded p-4 pt-5 mt-n5">
                                <a class="d-block  h4 mt-3 mb-4" href="">Completed Books</a>
                               
                              
                            </div>
                            </a>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="">
                        <div class="classes-item bg-light ">
                            <a href="">
                            <div class=" mx-auto p-3">
                                <img class="img-fluid" src="{{asset('website/img/classes-2.jpg')}}" alt="">
                            </div>
                            <div class=" rounded p-4 pt-5 mt-n5">
                                <a class="d-block  h4 mt-3 mb-4" href="">Happy School?Clients</a>
                                
                               
                            </div>
                            </a>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="">
                    <div class="classes-item bg-light ">
                            <a href="">
                            <div class=" mx-auto p-3">
                                <img class="img-fluid" src="{{asset('website/img/classes-3.jpg')}}" alt="">
                            </div>
                            <div class=" rounded p-4 pt-5 mt-n5">
                                <a class="d-block  h4 mt-3 mb-4" href="">Customer Services</a>
                                
                               
                            </div>
                            </a>
                        </div>
                    </div>
                    </a>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="">
                    <div class="classes-item  bg-light">
                            <a href="">
                            <div class=" mx-auto p-3">
                                <img class="img-fluid" src="{{asset('website/img/classes-4.jpg')}}" alt="">
                            </div>
                            <div class=" rounded p-4 pt-5 mt-n5">
                                <a class="d-block  h4 mt-3 mb-4" href="">Answered Questions</a>
                            
                             
                            </div>
                            </a>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Classes End -->

        @endsection