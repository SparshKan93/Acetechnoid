<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="shortcut icon" href="https://wellspringpublishinghouse.com/images/logo/ws-logo.png">-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('wellspring/styles/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('wellspring/styles/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('wellspring/styles/lightbox.min.css') }}">
    <!-- revoluation -->
    <link rel="stylesheet" type="text/css" href="{{ asset('wellspring/js/revolution/css/extralayers.css') }}" media="screen" /> 
    <link rel="stylesheet" type="text/css" href="{{ asset('wellspring/js/revolution/rs-plugin/css/settings.css') }}" media="screen" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('wellspring/js/wow.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('wellspring/js/script.js') }}"></script>

    <script>
        $(document).ready(function(){
          $("#myInput input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".caption *").filter(function() { console.log(this);
              $(this).closest('.image').toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
    <style type="text/css">
        @media only screen and (max-width: 950px){
            .contact1 {
                display: block;
                margin-left: 15px;
            }

            #myInput{
                width: 225px!important;
            }
        }
        #myInput{
            width: 25%;
            position: absolute;
            z-index: 1500;
        }

        .lb-data .lb-details{
            position: absolute;
            top: 45%;
            left: 40%;
            width: 20%;
            /*background-image: url({{url('/images/loading.png')}});*/
            /*background-repeat:no-repeat;*/
            z-index: 15;
            text-align: center;
        }
        .lb-data .lb-caption a{
            color: black;            
        }

        .lightbox a img {
            border: none;
            display: block;
            margin: 0 auto;
        }
    </style>
    
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
                        <!-- <h1 style="color: #e0e325;">{{ config('app.name', 'Laravel') }}</h1> -->
                        <div class="input-group" id="myInput">
                          <input type="text" class="form-control" placeholder="Search" name="search">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit" style="line-height: 1.45"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </div>
                  </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li><!-- <span class="search"><img src="{{url('/images/search.png')}}" width="45px"><input id="myInput" type="text" placeholder="Search Book Name..."></span> -->
                        

                    </li>
                    <!-- <li><a href="{{ url('/order/create') }}">Make Order</a></li> -->
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
        <h1 style="margin-top:70px "><b>Digital Library</b></h1>
            @foreach($data as $key => $list)
                @if(count($list->ebooks) >= 1)<h2><b>{{ ucwords(strtolower($list->name)) }}</b> </h2>
                    @foreach($list->ebooks as $key2 => $list2)
                    @if($list2->page)
                        <div class="col-md-3 image">
                          <a class="example-image-link" href="{{ asset($list2->page->url.'/'.$list2->page->title) }}" data-lightbox="example-set" data-title="<a href='{{ url('myebook/'.$list2->id) }}'><img src='{{url('/images/loading.png')}}' width='75px'> Click Here To Open Me</a>">

                            <img class="example-image lazy" data-src="{{ asset($list2->page->url.'/'.$list2->page->title) }}"  alt="" style="height:280px; border: 4px dotted black;padding:5px;margin:5px" />

                            <div class="caption">
                              <p>{{ trim($list2->name).'-'.$list2->standard }}</p>
                            </div>

                          </a>
                        </div>
                    @endif
                  @endforeach
              @endif
            @endforeach
        </div>
        <br><br>
        
        <footer class="text-center">
            <p class=>Copyright &copy; 2017. All rights reserved.</p>
        </footer>   
    </div>
    
    <script src="{{ asset('wellspring/js/lightbox-plus-jquery.min.js')}}"></script>
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