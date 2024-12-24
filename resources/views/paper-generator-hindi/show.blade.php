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
            @for($i=0; $i<3; $i++)
            <div style="background-image:url({{ asset($data->pages[$i]->url.'/'.$data->pages[$i]->title) }})"></div>
            @endfor
        </div>
    </div>
</div>

<div style="display:;" >
    <div id="prePage">1</div>
    <div id="curPage">1</div>
    <div id="maxPage">{{$data->pages->count()}}</div>
</div>
<div style="display:;" >
    @foreach($data->pages as $key => $list)
        <div id="page{{++$key}}">{{ asset($list->url.'/'.$list->title) }}</div>
    @endforeach
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

            autoCenter: true,

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
    curPage = parseInt($('#curPage').html()); 
    maxPage = parseInt($('#maxPage').html());
    // var maxPage = maxPage+1;
    allPages = $(".flipbook").turn("pages");
    // console.log(maxPage);
    if((maxPage+1)%2==0){
        if(allPages<maxPage){
            page1 =allPages+1;
            page2 = allPages+2;
            if(curPage>=prePage){
                pageId = page1;
                console.log(pageId);
                url = $('#page'+pageId).html();
                element =  $('<div style="background-image:url('+url+')" />');
                pageId = page2;
                console.log(pageId);
                url2 = $('#page'+pageId).html();
                element2 =  $('<div style="background-image:url('+url2+')" />');
                
                $('.flipbook').turn('addPage', element, page1);
                $('.flipbook').turn('addPage', element2, page2);
            }
        }
    }
    else{
        
    }
    
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