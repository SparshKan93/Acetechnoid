@extends('layouts.frontapp')

@section('content')

    <!--==========================
      Pricing Section
    ============================-->
    <section id="pricing" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Test Paper</h3>
          <span class="section-divider"></span>
          <p class="section-description">Please select a subject to generate test paper</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box wow fadeInUp">
              <h3>TEST PAPER</h3>
              <!-- <h4><sup>$</sup>0<span> month</span></h4> -->
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> A smart way to learn things with fun.</li>
                <li><i class="ion-android-checkmark-circle"></i> A smart way to learn things with fun.</li>
                <li><i class="ion-android-checkmark-circle"></i> A smart way to learn things with fun.</li>
              </ul>
              <a href="{{route('test-paper.create')}}" class="get-started-btn">Create Now</a>
            </div>
          </div>

          @foreach($data as $key => $list)
          <div class="col-lg-4 col-md-6">
            <div class="box wow fadeInUp">
              <h3>{{ strtoupper($key) }}</h3>
              <!-- <h4><sup>$</sup>0<span> month</span></h4> -->

              <ul>
                @foreach($list as $key => $value)
                <li><i class="ion-android-checkmark-circle"></i> A smart way to learn things with fun.
                  <a href="{{route('test-paper.create')}}?ebook={{$value->id}}" class="get-started-btn">{{ $value->name.'-'.$value->standard}}</a></li>
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

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>Ace Technoid</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>656/6<br>JAGRITI VIHAR, IN 250004</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>acetechnoid@gmail.com.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+91 6398 117 233</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

@endsection
