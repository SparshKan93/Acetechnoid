<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="{{ asset('turn/extras/jquery.min.1.7.js') }}"></script>
<script type="text/javascript" src="{{ asset('turn/extras/modernizr.2.5.3.min.js') }}"></script>
</head>
<body>

<div class="flipbook-viewport">
    <div class="container">
        <div class="flipbook">
            @foreach($data->pages as $key => $list)
            <div style="background-image:url({{ asset($list->url.'/'.$list->title) }})"></div>
            @endforeach
        </div>
    </div>
</div>


<script type="text/javascript">

function loadApp() {

    // Create the flipbook

    $('.flipbook').turn({
            // Width

            width:922,
            
            // Height

            height:600,

            // Elevation

            elevation: 50,
            
            // Enable gradients

            gradients: true,
            
            // Auto center this flipbook

            autoCenter: true

    });
}

// Load the HTML4 version if there's not CSS transform

yepnope({
    test : Modernizr.csstransforms,
    yep: ['{{ asset("turn/lib/turn.js") }}'],
    nope: ['{{ asset("turn/lib/turn.html4.min.js") }}'],
    both: ['{{ asset("turn/css/basic.css")}}'],
    complete: loadApp
});

</script>

</body>
</html>