@extends('layouts.gradient')

@section('content')
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
                                <li><a href="{{ url('ebook') }}">E-Books</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ url('ebook/'.$data->id) }}">{{$data->name}}</a> <span class="bread-slash">/</span>
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
                                        <form id="form" method="post" action="{{route('ebook.update',$data->id)}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="uid" class="login2 pull-right pull-right-pro">Unique ID (auto)</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="uid" id="uid" value="{{$data->uid}}" type="text" class="form-control" readonly>
                                                    </div>
                                                <!-- </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row"> -->
                                                    <div class="col-lg-3">
                                                        <label for="ref_id" class="login2 pull-right pull-right-pro">Refrence ID (if any)</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="ref_id" id="ref_id" value="{{ $data->ref_id }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="publication" class="login2 pull-right pull-right-pro">Publication</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select name="publication" id="publication" class="form-control custom-select-value">
                                                                <option>Please select...</option>
                                                                <option @if($data->publication == 'Select 1') selected @endif >Select 1</option>
                                                                <option @if($data->publication == 'Select 2') selected @endif >Select 2</option>
                                                                <option @if($data->publication == 'Select 3') selected @endif >Select 3</option>
                                                                <option @if($data->publication == 'Select 4') selected @endif >Select 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="series" class="login2 pull-right pull-right-pro">Series</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select name="series" id="series" class="form-control custom-select-value"  value="{{ old('series') }}">
                                                                <option>Please select...</option>
                                                                <option @if($data->series == 'Select 1') selected @endif >Select 1</option>
                                                                <option @if($data->series == 'Select 2') selected @endif>Select 2</option>
                                                                <option @if($data->series == 'Select 3') selected @endif>Select 3</option>
                                                                <option @if($data->series == 'Select 4') selected @endif>Select 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="subject" class="login2 pull-right pull-right-pro">Subject</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-select-list">
                                                            <select name="subject" id="subject" class="form-control custom-select-value"  value="{{ old('subject') }}">
                                                                <option>Please select...</option>
                                                                <option @if($data->subject == 'Hindi') selected @endif>Hindi</option>
                                                                <option @if($data->subject == 'English') selected @endif>English</option>
                                                                <option @if($data->subject == 'Maths') selected @endif>Maths</option>
                                                                <option @if($data->subject == 'Science') selected @endif>Science</option>
                                                                <option @if($data->subject == 'Social Science') selected @endif>Social Science</option>
                                                                <option @if($data->subject == 'Other') selected @endif>Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <!-- </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row"> -->
                                                    <div class="col-lg-3">
                                                        <label for="standard" class=" pull-right pull-right-pro">Standard/Class</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-select-list">
                                                            <select name="standard" id="standard" class="form-control custom-select-value"  value="{{ old('standard') }}">
                                                                <option>Please select...</option>
                                                                <option @if($data->standard == 'A') selected @endif >A</option>
                                                                <option @if($data->standard == 'B') selected @endif >B</option>
                                                                <option @if($data->standard == 'C') selected @endif >C</option>
                                                                <option @if($data->standard == '1') selected @endif >1</option>
                                                                <option @if($data->standard == '2') selected @endif >2</option>
                                                                <option @if($data->standard == '3') selected @endif >3</option>
                                                                <option @if($data->standard == '4') selected @endif >4</option>
                                                                <option @if($data->standard == '5') selected @endif >5</option>
                                                                <option @if($data->standard == '6') selected @endif >6</option>
                                                                <option @if($data->standard == '7') selected @endif >7</option>
                                                                <option @if($data->standard == '8') selected @endif >8</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="name" class="login2 pull-right pull-right-pro">Book Name</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="name" id="name" value="{{ $data->name }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="author" class=" pull-right pull-right-pro">Author</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="author" id="author" value="{{ $data->author }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="cost" class=" pull-right pull-right-pro">Cost</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="cost" id="cost" value="{{ $data->cost }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                                        <label class="login2 pull-right pull-right-pro" for="file_pdf">File Upload (PDF only)</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                                <label class="icon-right" for="prepend-big-btn">
                                                                    <i class="fa fa-download"></i>
                                                                </label>
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input name="file_pdf" id="file_pdf" type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                </div>
                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="remark">Remark</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <textarea name="remark" id="remark" class="form-control">{{ $data->remark }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update Change</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input id="text" type="hidden" value="{{route('ebook.show',$data->id)}}" style="width:80%" />
                                        <div class="row centre">
                                            <div class="col-lg-3"></div>
                                                <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>
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
</div>


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

$("#text").
    on("blur", function () {
        makeCode();
    }).
    on("keydown", function (e) {
        if (e.keyCode == 13) {
            makeCode();
        }
    });
</script>

@endsection
