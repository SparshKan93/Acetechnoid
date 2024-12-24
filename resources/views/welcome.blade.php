<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="shortcut icon" href="https://wellspringpublishinghouse.com/images/logo/ws-logo.png">-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('wsph/styles/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('wsph/styles/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('wsph/styles/lightbox.min.css') }}">
    <!-- revoluation -->
    <link rel="stylesheet" type="text/css" href="{{ asset('wsph/js/revolution/css/extralayers.css') }}" media="screen" /> 
    <link rel="stylesheet" type="text/css" href="{{ asset('wsph/js/revolution/rs-plugin/css/settings.css') }}" media="screen" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('wsph/js/wow.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('wsph/js/script.js') }}"></script>
    
</head>
<body>
    <div class="wrapper creative">
        
            
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container-fluid mainmenu-area">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="nav navbar-nav navbar-left" href="#">
                    <div class="contact1">
                        <!-- <img src="https://wellspringpublishinghouse.com/images/logo/ws-logo.png" height="65px"> -->
                        <span style="color: #e0e325;">{{ config('app.name', 'Laravel') }}</span>
                    </div>
                  </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                        <!-- <div class="top-right links"> -->
                            @auth
                                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <!-- <a href="{{ route('register') }}">Register</a> -->
                                @endif
                            @endauth
                        <!-- </div> -->
                    @endif
                        <!-- <li><a href="home.html#work">Login</a></li>                     -->
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            
             
    <div class="container-fluid" >
        <div class="row text-center">
        <h3>Our Products</h3>
              @foreach($data as $key => $list)
                <div class="col-md-3 ">
                  <a class="example-image-link" href="{{ asset($list->url.'/'.$list->title) }}" data-lightbox="example-set" data-title="<a href='{{ url('myebook/'.$list->ebook_id) }}'>Click Here To Open Me</a>">
                    <img class="example-image lazy" data-src="{{ asset($list->url.'/'.$list->title) }}"  alt="" style="height:280px; border: 4px dotted black;padding:5px;margin:5px" />
                  </a>
                </div>
              @endforeach
        </div>
        <br><br>
        
    </div>
        <footer class="text-center">
            <p class=>Copyright &copy; 2017. All rights reserved.</p>
        </footer>   
    </div>
    
    <script src="{{ asset('wsph/js/lightbox-plus-jquery.min.js')}}"></script>
    <script>
              new WOW().init();
    </script>
        <script type="text/javascript" src="{{ asset('lazyload/jquery.lazy.min.js')}}"></script>

    <script type="text/javascript">
         $(function() {
        $('.lazy').lazy();
    });
    </script>


</body>
</html> 