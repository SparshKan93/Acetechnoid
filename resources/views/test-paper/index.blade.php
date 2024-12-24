@extends('layouts.frontapp2')

@section('content')

    <!--==========================
    Intro Section
  ============================-->
  <style>
    #intro h2 {
        margin: 25% 0 10px 0;
        color: #242323;
    }
    #intro p {
        color: #242323;
    }
  </style>
  @if(!$_REQUEST)
  <section id="intro" style="background:url(https://vidyauniversitypress.acetechnoid.com/maturita.jpg);background-size: cover;">

    <div class="intro-text">
        <a href="{{url('test-paper?series='.config('app.name', 'Acetechnoid') )}}">
      <h2>
        WELCOME TO <br><b>{{ config('app.name', 'Acetechnoid') }}</b>
      </h2>
      
          <p>Test Paper Generator</p>
        </a>
      <!--<a href="#pricing" class="btn-get-started scrollto">Get Started</a>-->
    </div>
    
    <div class="" style="padding:100px 0px 9px 30px;position:relative;display:none">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
          <a href="{{url('test-paper?series='.config('app.name', 'Acetechnoid') )}}">
                <img src="https://vidyauniversitypress.com/images/logo.png" alt="" style="width:150px;border-radius: 15px;padding: 10px;">
         </a>
      </div>
      
      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
          <a href="{{url('test-paper?series=EDUX BOOKS')}}">
                <img src="https://vidyauniversitypress.com/images/client-logo/4.png" alt="" style="width:150px;border-radius: 15px;padding: 10px;">
         </a>
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <a href="{{url('test-paper?series=AARSH BOOKS')}}">
                <img src="https://vidyauniversitypress.com/images/client-logo/5.png" alt="" style="width:150px;border-radius: 15px;padding: 10px;">
         </a>      
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <a href="{{url('test-paper?series=RITU BOOKS')}}">
                <img src="https://vidyauniversitypress.com/images/client-logo/6.png" alt="" style="width:150px;border-radius: 15px;padding: 10px;">
         </a>      
      </div>

    </div>

    <div class="product-screens" style="display:none">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
          <a href="{{url('test-paper?series=EDUX BOOKS')}}">
                <img src="https://vidyauniversitypress.com/images/client-logo/4.png" alt="">
         </a>
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="https://vidyauniversitypress.com/images/client-logo/5.png" alt="">
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="https://vidyauniversitypress.com/images/client-logo/6.png" alt="">
      </div>

    </div>
        

  </section><!-- #intro -->
@endif
    <!--==========================
      Pricing Section
    ============================-->
    @if(isset($_GET['series']))
    <section id="pricing" class="section-bg" style="min-height:35em">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title"> {{$_GET['series']}}</h3>
          <span class="section-divider"></span>
          <p class="section-description"><a href="{{route('test-paper.index')}}"><i class="fa fa-chevron-left"></i> Back</a></p>
        </div>

        <div class="row">

          @foreach($data as $key => $list)
          <div class="col-lg-4 col-md-6">
            <div class="box wow fadeInUp">
              <h3>{{ strtoupper($key) }}</h3>
              <!-- <h4><sup>$</sup>0<span> month</span></h4> -->

              <ul>
                @foreach($list as $key => $value)
                <li>
                  <a href="{{route('test-paper.create')}}?ebook={{$value->id}}" class="get-started-btn" style="width:100%">{{ $value->name.'-'.$value->standard}}</a></li>
                @endforeach  
              </ul>
            </div>
          </div>
          @endforeach

          <!-- <div class="col-lg-4 col-md-6">
            <div class="box featured wow fadeInUp">
              <h3>Business</h3>
              <h4><sup>$</sup>29<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div> -->

          

        </div>
      </div>
    </section><!-- #pricing -->
@endif
    <!--==========================
      Contact Section
    ============================-->
    
    <script>
        $('#vupLogo').hide();
    </script>

@endsection
