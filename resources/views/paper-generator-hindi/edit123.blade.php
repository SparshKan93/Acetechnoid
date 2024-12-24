@extends('layouts.gradient')

@section('content')

<style type="text/css">
    .center {
        margin: 0 auto;
        width: 100%;
    }
</style>
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
                                <li><a href="{{ url('myebook/'.$data->id) }}">{{$data->name}}</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Edit</span>
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

        @include('layouts.flashmessage')


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
                                        <form id="form" method="post" action="{{route('generate-paper-hindi.update', $data->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="publication" class="login2 pull-right pull-right-pro">Book Name</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select name="ebook_id" id="ebook_id" class="form-control custom-select-value" required="">
                                                                <option value="">Please select...</option>
                                                                @foreach($books as $key=>$list)
                                                                <option value="{{$list->id}}" @if($list->id == $data->ebook_id) selected @endif>{{$list->name.'-'.$list->standard}}</option>
                                                                @endforeach
                                                                <!-- <option>Other</option> -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner hide">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="sections" class=" pull-right pull-right-pro">Question Type</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select name="que_type" id="que_type" class="form-control custom-select-value" required="">
                                                                @foreach($que_type as $key=>$list)
                                                                 <option value="{{$list->id}}" @if($list->id==$data->que_type) selected @endif >{{$list->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="sections" class=" pull-right pull-right-pro">Question Type</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="que_type" id="que_type" value="@if(!empty($data)) {{ $data->que_type }}  @endif" type="text" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="name" class="login2 pull-right pull-right-pro">Chapter Num/Chapter</label>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input name="chapter_num" id="chapter_num" value="@if(!empty($data)) {{ $data->chapter_num }}  @endif" type="text" class="form-control" required="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="chapter" id="chapter" value="{{ old('chapter') }}@if(!empty($data)) {{ $data->chapter }}  @endif" type="text" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="remark">Question</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <textarea rows="2" name="question" id="question" type="text" class="form-control">{{ old('question') }}@if(!empty($data)) {{ $data->question }}  @endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="remark">Option 1</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <textarea rows="1" name="remark" id="remark" value="{{ old('remark') }}" type="text" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label class=" pull-right pull-right-pro" for="remark">Option 2</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <textarea rows="1" name="remark" id="remark" value="{{ old('remark') }}" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="remark">Option 3</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <textarea rows="1" name="remark" id="remark" value="{{ old('remark') }}" type="text" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label class=" pull-right pull-right-pro" for="remark">Option 4</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <textarea rows="1" name="remark" id="remark" value="{{ old('remark') }}" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                                        <label class="login2 pull-right pull-right-pro" for="file_pdf">Diagrams (JPG only)</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-10 col-sm-10 col-xs-10">
                                                        <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                                <label class="icon-right" for="prepend-big-btn">
                                                                    <i class="fa fa-download"></i>
                                                                </label>
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input name="diagrams" id="file_pdf" type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                </div>
                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="remark">Answer</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <textarea rows="3" name="answer" id="answer" type="text" class="form-control">{{ old('answer') }}@if(!empty($data)) {{ $data->answer }}  @endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save And Upload Book</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

<script type="text/javascript" src="{{ asset('gradient/js/barcode/qrcode.js') }}"></script>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 150,
    height : 150
});

function makeCode () {      
    // var elText = document.getElementById("text");
    var elText = document.getElementById("text");
    
    if (!elText.value) {
        alert("Input a text");
        elText.focus();
        return;
    }
    
    qrcode.makeCode(elText.value);
}

makeCode();

// $("#text").
//     on("blur", function () {
//         makeCode();
//     }).
//     on("keydown", function (e) {
//         if (e.keyCode == 13) {
//             makeCode();
//         }
//     });

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


</script>

@endsection
