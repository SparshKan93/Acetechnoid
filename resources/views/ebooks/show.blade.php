<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
    version="XHTML+RDFa 1.0"
    xmlns:og="http://ogp.me/ns#"
    xml:lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="monitor-signature" content="monitor:player:html5" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
 
<meta name="Keywords" content="" />
<meta name="Description" content="{{$data->name.'-'.$data->standard}}" />
<meta name="Generator" content="" />
<link rel="image_src" href="files/shot.png" />
 <link rel="shortcut icon" href="files/thumb/1.jpg" />
<link rel="apple-touch-icon" href="files/thumb/1.jpg" />
<meta name="og:image" content="files/shot.png" />
<meta property="og:image" content="files/shot.png" />
<title>{{$data->name.'-'.$data->standard}}</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('flipbookjs/style/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('flipbookjs/style/player.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('flipbookjs/style/phoneTemplate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('flipbookjs/style/template.css') }}" />
<script type="text/javascript" src="{{ asset('flipbookjs/javascript/jquery-1.9.1.min.js') }}"></script>

<script type="text/javascript">
	var bgurl = "files/mobile-ext/backGroundImgURL.jpg";
	var totalPages = {{$data->pages->count()}};
	var ebookUrl = "{{ asset($data->pages[0]->url) }}/";
  var uiBaseURL = "{{ asset($data->pages[0]->url) }}/";
</script>

<script type="text/javascript" src="{{ asset('flipbookjs/javascript/config.js') }}"></script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #242424;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  text-align:center;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover{
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  z-index: 10;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<style>
.btn-group .button {
  background-color: #4CAF50; /* Green */
  border: 1px solid green;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  float: left;
}
.btn-group{
    position:absolute;
    top:10px;
    left:10px;
}

.btn-group .button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #3e8e41;
}
</style>

<style>
* {box-sizing: border-box;}

.container {
  position: relative;
/*  width: 50%;*/
/*  max-width: 300px;*/
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay-text {
    display:block;
    width: 260px;
    text-align: center;
}

.overlay {
  position: absolute; 
  bottom: 0; 
/*  background: rgb(0, 0, 0);*/
/*  background: rgba(0, 0, 0, 0.5); /* Black see-through */*/
  /*background: rgb(2,0,36);*/
/*background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(2,0,36,0.38699229691876746) 35%, rgba(2,0,36,0) 100%);*/
  color: #f1f1f1; 
  /*width: 305px;*/
  margin: 0 30%;
  transition: .5s ease;
  opacity:1;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
  height: 250px;
}
/*
.container:hover .overlay {
  opacity: 1;
}*/

@media only screen and (max-width: 600px) {
  .overlay {
    margin: 0 10%;
  }
}
@media only screen and (min-width: 768px) {
  .overlay {
    margin: 0 40%;
  }
}

</style>


</head>	
<body>
    
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      @if(count($data->videos)>0)
@foreach($data->videos as $key2 => $list)
      <a href="{{$list->Youtube_Embeded}}" target="_blank">
        <div class="container">
          <div class="image">
              
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{str_replace("https://youtu.be/","",$list->Youtube_Embeded)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!--<video width="300" height="200" controls>-->
            <!--  <source src="{{$list->Youtube_Embeded}}" type="video/mp4">-->
            <!--  <source src="{{$list->Youtube_Embeded}}" type="video/ogg">-->
            <!--  Your browser does not support the video tag.-->
            <!--</video>-->
          </div>
          

          <div class="overlay">
              <div class="overlay-text">
                  <!--<img src="{{asset('images/play_btn.gif')}}" style="display:block;    margin:60px 0px 0px 25%;width:120px;"><br>-->
                    {{$list->title}}
              </div>
          </div>
        </div>
        
      </a>
@endforeach
@endif
    
      <!-- <a href="https://www.youtube.com/embed/aAIvmRsPd0c" target="_blank">
        <div class="container">
          <div class="image">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/aAIvmRsPd0c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          

          <div class="overlay">
            <img src="{{asset('images/YouTube_play_button_icon.png')}}" style="display: block;    margin: 25px 45%;"><br>
          My Name is John</div>
        </div>
        
      </a> -->
      

    </div>
  
  <div id="main">
    
    <div class="btn-group">
    @if(!empty($data->key_link))
    <a class="button" href="{{url('myebook/key/'.$data->id)}}" target="blank">Answers</a>
    @endif
    <a href="{{url('test-paper/create?ebook='.$data->id)}}" target="blank" class="button" >Test-paper</a>
    @if(count($data->videos)>0)
    <button class="button" onclick="openNav()">Video Lecture</button>
    @else
        @if(!is_null($data->yt_link))
            <a class="button" target="blank" href="{{$data->yt_link}}">YT Playlist</a>
        @endif
    @endif
    
    
  </div>

@if(isset($data["cur_vid"]->Youtube_Embeded))
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$data["cur_vid"]->title}}</h4>
      </div>
      <div class="modal-body">
          
          <a href="{{$data["cur_vid"]->Youtube_Embeded}}" target="_blank">
            <div class="container">
              <div class="image">
                  
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{str_replace("https://youtu.be/","",$data["cur_vid"]->Youtube_Embeded)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <!--<video width="300" height="200" controls>-->
                <!--  <source src="{{$list->Youtube_Embeded}}" type="video/mp4">-->
                <!--  <source src="{{$list->Youtube_Embeded}}" type="video/ogg">-->
                <!--  Your browser does not support the video tag.-->
                <!--</video>-->
              </div>
              
    
              <div class="overlay">
                  <div class="overlay-text">
                      <!--<img src="{{asset('images/play_btn.gif')}}" style="display:block;    margin:60px 0px 0px 25%;width:120px;"><br>-->
                        <!--{{$list->title}}-->
                  </div>
              </div>
            </div>
          </a>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endif

  </div>  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
@if(isset($_GET["ch"]))
<script>
$(document).ready(function(){
  $("#myModal").modal("show");
    
});
</script>
@endif

<script type="text/javascript" src="{{ asset('flipbookjs/javascript/search_config.js') }}"></script>
<script type="text/javascript" src="{{ asset('flipbookjs/javascript/bookmark_config.js') }}"></script>
<script type="text/javascript" src="{{ asset('flipbookjs/javascript/LoadingJS.js') }}"></script>

<script type="text/javascript" src="{{ asset('flipbookjs/javascript/main.js') }}"></script>

<noscript>
  <div><hr/>
    <ul>
      <li>
        <a href="files/basic-html/index.html">Pages</a>
      </li>
    </ul>
    <hr style="width:80%"/>
  </div>
</noscript>

<script>


function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</body>
</html>
