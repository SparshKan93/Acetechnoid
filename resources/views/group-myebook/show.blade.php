<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://wellspringpublishinghouse.com/images/logo/ws-logo.png">
    
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

                
              </div><!-- /.container-fluid -->
            </nav>
            
             
    <div class="container-fluid" style="min-height: -webkit-fill-available;">
        <div class="row text-center">
            @if(!empty($data[0]->id))
            <h3>{{$data[0]->name}}</h3>
            <img src="{{url('uploads/ebook/ebook-'.$data[0]->id.'/1.jpg')}}" heit="6gh5px" onerror="this.src='{{url('default-img.jpg')}}'" style="min-height: 300px;">
            @endif
            <br><br>
            @foreach($data as $key => $list)
                <a href="{{ url('myebook/'.$list->id) }}" target="_blank" class="btn btn-primary">{{$list->name.' '.$list->standard}}</a>
            @endforeach
        </div>
        
    </div>
        <footer class="text-center">
            <p class=>Copyright &copy; 2017. All rights reserved.</p>
        </footer>   
    </div>
    
    <script src="{{ asset('wsph/js/lightbox-plus-jquery.min.js')}}"></script>
    <script>
              new WOW().init();
    </script>


</body>
</html> 