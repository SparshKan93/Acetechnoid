@extends('layouts.gradient')

@section('content')

<!-- dropzone CSS == -->
    <link rel="stylesheet" href="{{ asset('gradient/css/dropzone.css') }}">

<!-- Breadcome start-->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="breadcome-menu">
                                <li><a href="{{ url('') }}">Dashboard</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ url('myebook') }}">E-Books</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ url('myebook/'.$data->id) }}">{{$data->name.'-'.$data->standard}}</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ url('myebook/'.$data->id.'/edit') }}">Edit</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Pages</span><span class="bread-slash">/</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcome End-->

<div class="basic-form-area mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list shadow-reset mg-t-30">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a target="blank" href="https://www.freepdfconvert.com/pdf-to-jpg">Click Here to convert pdf to images online</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                        
                                        <div class="col-lg-12">
                                            <form action="{{url('upload-pages')}}" class="dropzone dropzone-custom needsclick" id="demo1-upload" enctype="multipart/form-data" method="post">
                                            {{ csrf_field() }}
                                                <input name="ebook_id" type="hidden" value="{{$data->id}}" />
                                                <input name="url" type="hidden" value="uploads/ebook/ebook-{{$data->id}}" />
                                                <!-- <input name="title" type="text" style="position:absolute;top: 150px;left: -175px;" /> -->
                                                
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>

                                                <div class="dz-message needsclick download-custom">
                                                    <span class="adminpro-icon adminpro-cloud-computing-down download-icon"></span>
                                                    <h2>Drop image files here or click to upload.</h2>
                                                    <p>
                                                        <span class="note needsclick">(Please only upload <strong>images</strong>.)
                                                        </span>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="basic-form-area mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list shadow-reset mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Edit</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                       @foreach($data->pages as $key => $list)
                                        <div class="col-lg-2">
                                            <img src="{{ url($list->url.'/'.$list->title)}}" style="height:200px;margin: 2px">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <input name="cost" id="cost" value="{{ $list->title }}" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button onclick="return alert('Working on this...');" type="button" class="btn btn-xs btn-success"><i class="material-icons">Edit</i></button>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <form style="display: inline;" method="post" action="{{route('ebook-pages.destroy',$list->id)}}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button onclick="return confirm('Are you sure you want to Delete?');" type="submit" class="btn btn-xs btn-danger"><i class="material-icons">Delete</i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  dropzone JS ======== -->
    <script src="{{ asset('gradient/js/dropzone.js') }}"></script>

<script type="text/javascript" src="{{ asset('gradient/js/barcode/qrcode.js') }}"></script>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 100,
    height : 100
});

function makeCode () {      
    var elText = document.getElementById("text");
    
    if (!elText.value) {
        alert("Input a text");
        elText.focus();
        return;
    }
    
    qrcode.makeCode(elText.value);
}

makeCode();


</script>

@endsection
