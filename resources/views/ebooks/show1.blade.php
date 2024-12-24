<?php 
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
 ?>

<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>{{$data->name.'-'.$data->standard}} | {{ config('app.name', 'Laravel') }}</title>
<meta name="viewport" content="width = 1050, user-scalable = no" />
    <!--<link rel="shortcut icon" href="https://wellspringpublishinghouse.com/images/logo/ws-logo.png">-->
<script type="text/javascript" src="{{ asset('turn/extras/jquery.min.1.7.js') }}"></script>

<script type="text/javascript" src="{{ asset('turn/extras/jquery-ui-1.8.20.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('turn/extras/modernizr.2.5.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('turn/lib/hash.js') }}"></script>

<style type="text/css">
    
    body{
        background-color: #312f2f;
    }

    .tooltip1 {
        left: 0;
        position: absolute;
        top: 0;
        z-index: 100;
        display: inline-block;
      /*border-bottom: 1px dotted black;*/
    }

    .tooltip1 .tooltiptext1 {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      /* Position the tooltip */
      position: absolute;
      z-index: 1;
      top: 8px;
      left: 110%;
    }

    .tooltip1:hover .tooltiptext1 {
      visibility: visible;
    }

    .tooltip2 {
        left: 0;
        position: absolute;
        top: 10%;
        z-index: 100;
        display: inline-block;
      /*border-bottom: 1px dotted black;*/
    }

    .tooltip2 .tooltiptext2 {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      /* Position the tooltip */
      position: absolute;
      z-index: 1;
      top: 8px;
      left: 110%;
    }

    .tooltip2:hover .tooltiptext2 {
      visibility: visible;
    }
</style>



</head>
<body>
<div id="canvas"></div>

<div class="zoom-icon zoom-icon-in"></div>
<!-- <div class="display">Single/Double Page</div> -->

<div class="magazine-viewport">
    <div class="container">
        <div class="magazine" id="flipbook">
            
            <!-- Next button -->
            <div ignore="1" class="next-button"></div>
            <!-- Previous button -->
            <div ignore="1" class="previous-button"></div>
        </div>
    </div>
</div>

<div class="tooltip1">
    <a href="{{url('test-paper/create?ebook='.$data->id)}}" target="blank">
        <img alt="Generate Test Paper" height="60px" src="{{url('images/quespaper.png')}}">
    </a>
    <span class="tooltiptext1">Generate Test Paper</span>
</div>

@if(!empty($data->key_link))
<div class="tooltip2">
    <a href="{{url('myebook/key/'.$data->id)}}" target="blank">
        <img alt="Generate Test Paper" height="70px" src="{{url('images/key.png')}}">
    </a>
    <span class="tooltiptext2">Download Key</span>
</div>
@endif

<div style="display:none;" >
    <div id="prePage">1</div>
    <div id="curPage">1</div>
    <div id="maxPage">{{$data->pages->count()}}</div>
</div>


<div style="display:none;" >
    @foreach($data->pages as $key => $list)
        <div id="page{{$key}}">{{ asset($list->url.'/'.$list->title) }}</div>
    @endforeach
    @if(count($data->pages)>0)
        <div id="url">{{ asset($list->url.'/') }}</div>
    @endif
</div>

<script type="text/javascript">

function loadApp() {

    $('#canvas').fadeIn(1000);

    var flipbook = $('.magazine');

    // Check if the CSS was already loaded
    
    if (flipbook.width()==0 || flipbook.height()==0) {
        setTimeout(loadApp, 10);
        return;
    }

    // Create the flipbook

    flipbook.turn({
            
            // Magazine width

            // width: 922,

            // Magazine height

            @if(isMobile())
                height: 1200,
                'display': 'single',
            @endif

            // 

            // Duration in millisecond

            duration: 1000,

            // Enables gradients

            gradients: true,
            
            // Auto center this flipbook

            autoCenter: true,

            // Elevation from the edge of the flipbook when turning a page

            elevation: 50,

            // The number of pages

            pages: {{$data->pages->count()}},

            // display: 'single',

            // Events

            when: {
                turning: function(event, page, view) {
                    
                    var book = $(this),
                    currentPage = book.turn('page'),
                    pages = book.turn('pages');
                    console.log(page);
                    // Update the current URI

                    // Hash.go('page/' + page).update();

                    // Show and hide navigation buttons

                    disableControls(page);

                },

                turned: function(event, page, view) {

                    disableControls(page);

                    $(this).turn('center');

                    $('#slider').slider('value', getViewNumber($(this), page));

                    if (page==1) { 
                        $(this).turn('peel', 'br');
                    }

                },

                missing: function (event, pages) {

                    // Add pages that aren't in the magazine
                    for (var i = 0; i < pages.length; i++)
                        addPage(pages[i], $(this));


                }
            }

    });

    // Zoom.js

    $('.magazine-viewport').zoom({
        flipbook: $('.magazine'),

        max: function() { 
            
            return largeMagazineWidth()/$('.magazine').width();

        }, 

        when: {
            swipeLeft: function() {
                
                $('#flipbook').turn('next'); 
                

            },

            swipeRight: function() {
                
                $('#flipbook').turn('previous');

            },

            resize: function(event, scale, page, pageElement) {

                if (scale==1)
                    loadSmallPage(page, pageElement);
                else
                    loadLargePage(page, pageElement);

            },

            zoomIn: function () {

                $('#slider-bar').hide();
                $('.made').hide();
                $('.magazine').removeClass('animated').addClass('zoom-in');
                $('.zoom-icon').removeClass('zoom-icon-in').addClass('zoom-icon-out');
                
                if (!window.escTip && !$.isTouch) {
                    escTip = true;

                    $('<div />', {'class': 'exit-message'}).
                        html('<div>Press ESC to exit</div>').
                            appendTo($('body')).
                            delay(2000).
                            animate({opacity:0}, 500, function() {
                                $(this).remove();
                            });
                }
            },

            zoomOut: function () {

                $('#slider-bar').fadeIn();
                $('.exit-message').hide();
                $('.made').fadeIn();
                $('.zoom-icon').removeClass('zoom-icon-out').addClass('zoom-icon-in');

                setTimeout(function(){
                    $('.magazine').addClass('animated').removeClass('zoom-in');
                    resizeViewport();
                }, 0);

            }
        }
    });

    // Zoom event

    if ($.isTouch){
        $('.magazine-viewport').bind('zoom.doubleTap', zoomTo);
    }


    // else
    //  $('.magazine-viewport').bind('zoom.tap', zoomTo);


    // Using arrow keys to turn the page

    $(document).keydown(function(e){

        var previous = 37, next = 39, esc = 27;

        switch (e.keyCode) {
            case previous:

                // left arrow
                $('.magazine').turn('previous');
                e.preventDefault();

            break;
            case next:

                //right arrow
                $('.magazine').turn('next');
                e.preventDefault();

            break;
            case esc:
                
                $('.magazine-viewport').zoom('zoomOut');    
                e.preventDefault();

            break;
        }
    });

    // URIs - Format #/page/1 

    // Hash.on('^page\/([0-9]*)$', {
    //     yep: function(path, parts) {
    //         var page = parts[1];

    //         if (page!==undefined) {
    //             if ($('.magazine').turn('is'))
    //                 $('.magazine').turn('page', page);
    //         }

    //     },
    //     nop: function(path) {

    //         if ($('.magazine').turn('is'))
    //             $('.magazine').turn('page', 1);
    //     }
    // });


    $(window).resize(function() {
        resizeViewport();
    }).bind('orientationchange', function() {
        resizeViewport();
    });

    // Regions

    if ($.isTouch) {
        $('.magazine').bind('touchstart', regionClick);
    } else {
        $('.magazine').click(regionClick);
    }

    // Events for the next button

    $('.next-button').bind($.mouseEvents.over, function() {
        
        $(this).addClass('next-button-hover');

    }).bind($.mouseEvents.out, function() {
        
        $(this).removeClass('next-button-hover');

    }).bind($.mouseEvents.down, function() {
        
        $(this).addClass('next-button-down');

    }).bind($.mouseEvents.up, function() {
        
        $(this).removeClass('next-button-down');

    }).click(function() {
        
        $('.magazine').turn('next');

    });

    // Events for the next button
    
    $('.previous-button').bind($.mouseEvents.over, function() {
        
        $(this).addClass('previous-button-hover');

    }).bind($.mouseEvents.out, function() {
        
        $(this).removeClass('previous-button-hover');

    }).bind($.mouseEvents.down, function() {
        
        $(this).addClass('previous-button-down');

    }).bind($.mouseEvents.up, function() {
        
        $(this).removeClass('previous-button-down');

    }).click(function() {
        
        $('.magazine').turn('previous');

    });


    // Slider

    $( "#slider" ).slider({
        min: 1,
        max: numberOfViews(flipbook),

        start: function(event, ui) {

            if (!window._thumbPreview) {
                _thumbPreview = $('<div />', {'class': 'thumbnail'}).html('<div></div>');
                setPreview(ui.value);
                _thumbPreview.appendTo($(ui.handle));
            } else
                setPreview(ui.value);

            moveBar(false);

        },

        slide: function(event, ui) {

            setPreview(ui.value);

        },

        stop: function() {

            if (window._thumbPreview)
                _thumbPreview.removeClass('show');
            
            $('.magazine').turn('page', Math.max(1, $(this).slider('value')*2 - 2));

        }
    });

    resizeViewport();

    
    $('.magazine').addClass('animated');

}



// Zoom icon

 $('.zoom-icon').bind('mouseover', function() { 
    
    if ($(this).hasClass('zoom-icon-in'))
        $(this).addClass('zoom-icon-in-hover');

    if ($(this).hasClass('zoom-icon-out'))
        $(this).addClass('zoom-icon-out-hover');
 
 }).bind('mouseout', function() { 
    
     if ($(this).hasClass('zoom-icon-in'))
        $(this).removeClass('zoom-icon-in-hover');
    
    if ($(this).hasClass('zoom-icon-out'))
        $(this).removeClass('zoom-icon-out-hover');

 }).bind('click', function() {

    if ($(this).hasClass('zoom-icon-in'))
        $('.magazine-viewport').zoom('zoomIn');
    else if ($(this).hasClass('zoom-icon-out')) 
        $('.magazine-viewport').zoom('zoomOut');

 });

 $('#canvas').hide();


// Load the HTML4 version if there's not CSS transform
yepnope({
    test : Modernizr.csstransforms,
    yep: ['{{ asset("turn/lib/turn.min.js") }}'],
    nope: ['{{ asset("turn/lib/turn.html4.min.js") }}', '{{ asset("css/jquery.ui.html4.css") }}'],
    both: ['{{ asset("turn/lib/zoom.min.js") }}', '{{ asset("css/jquery.ui.css") }}', '{{ asset("js/magazine.js") }}', '{{ asset("css/magazine.css") }}'],
    complete: loadApp
});

</script>



<script type="text/javascript">






function loadApp1() {

    // Create the flipbook

    // $('#gozoom').turn('zoom', 0.5, 0);

    $('.flipbook').turn({
            // Width

            width:922,
            
            // Height

            height:600,

            // Elevation

            // elevation: 50,
            
            // Enable gradients

            gradients: true,
            
            // Auto center this flipbook

            autoCenter: true,

            // acceleration: true,

            // display: 'single',
            
            when: {
                turned: function(event, page, pageObj) {
                    // alert('the current page is ' + page);
                    prePage = $('#curPage').html();
                    $('#prePage').html(prePage);
                    $('#curPage').html(page);
                    morePage(page);                 
                }

                
            }
    });
}

function morePage(page){
    prePage = $('#prePage').html();
    curPage = $('#curPage').html(); 
    maxPage = $('#maxPage').html();
    
    allPages = $(".flipbook").turn("pages");

    if (curPage>=prePage ) {
        page1 =allPages+1;
        page2 = allPages+2;
        
        if (page1<maxPage) {
            pageId = page1;
            // console.log(pageId);
            url = $('#page'+pageId).html();
            element =  $('<div style="background-image:url('+url+')" />');
            $('.flipbook').turn('addPage', element, page1);
        }
        if (page2<maxPage) {
            pageId = page2;
            // console.log(pageId);
            url = $('#page'+pageId).html();
            element2 =  $('<div style="background-image:url('+url+')" />');
            $('.flipbook').turn('addPage', element2, page2);    
        }
        
    }
 }

// Load the HTML4 version if there's not CSS transform

// yepnope({
//     test : Modernizr.csstransforms,
//     yep: ['{{ asset("turn/lib/turn.js") }}'],
//     nope: ['{{ asset("turn/lib/turn.html4.min.js") }}'],
//     // both: ['../../lib/zoom.min.js', 'js/magazine.js', 'css/magazine.css'],
//     both: ['{{ asset("turn/css/basic.css")}}','{{ asset("turn/lib/zoom.min.js")}}'],
//     complete: loadApp
// });



</script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3896012864370360"
     crossorigin="anonymous"></script>

</body>
</html>