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
                                <li><a href="{{ url('myebook/'.$data->id) }}">{{ $data->name.'-'.$data->standard }}</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Edit</span> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ route('myebook.create') }}">New</a> 
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
                                        <form id="form" method="post" action="{{route('myebook.update',$data->id)}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="ref_id" class="login2 pull-right pull-right-pro">Refrence ID (if any)</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="ref_id" id="ref_id" value="{{ $data->ref_id }}" type="text" class="form-control">
                                                    </div>
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
                                                                <option selected>{{ config('app.name', 'Laravel') }}</option>
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
                                                                <option @if($data->series == 'MR. JACK BRAIN BOOKS INTERNATIONAL') selected @endif >MR. JACK BRAIN BOOKS INTERNATIONAL</option>
                                                                <option @if($data->series == 'Other') selected @endif>Other</option>
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
                                                            <select name="subject" id="subject" class="form-control custom-select-value">
                                                                <@foreach($subjects as $key=>$list)
                                                                <option @if($data->subject == $list->name) selected @endif >{{$list->name}}</option>
                                                                @endforeach
                                                                <option>Other</option>
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
                                                            <select name="standard" id="standard" class="form-control custom-select-value">
                                                                <option>Please select...</option>
                                                                <@foreach($classes as $key=>$list)
                                                                <option @if($data->standard == $list->name) selected @endif >{{$list->name}}</option>
                                                                @endforeach
                                                                <option>Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row"> 
                                                    <div class="col-lg-3">
                                                        <label for="standard" class=" pull-right pull-right-pro">Group</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-select-list">
                                                            <select name="group_id" id="group_id" class="form-control custom-select-value"  required="">
                                                                <option value="">Please select...</option>
                                                                @foreach($groups as $key=>$list)
                                                                <option value="{{$list->id}}" @if($data->group_id == $list->id) selected @endif >{{$list->name}}</option>
                                                                @endforeach
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
                                                    <div class="col-lg-3">
                                                        <input name="author" id="author" value="{{ $data->author }}" type="text" class="form-control">
                                                    </div>
                                                <!-- </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row"> -->
                                                    <div class="col-lg-3">
                                                        <label for="cost" class=" pull-right pull-right-pro">Cost</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="cost" id="cost" value="{{ $data->cost }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="cost" class=" pull-right pull-right-pro">Key Code</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="key_code" id="key_code" value="{{ $data->key_code }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="cost" class=" pull-right pull-right-pro">Key Link</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <!-- <input name="key_link" id="key_link" value="{{ $data->key_link }}" type="text" class="form-control"> -->
                                                        <textarea name="key_link" id="key_link" class="form-control">{{ $data->key_link }}</textarea>
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
                                                                    <input name="file_pdf[]" id="file_pdf" type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
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
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update Change</button>
                                                                <a class="btn btn-sm btn-primary login-submit-cs" href="{{url('ebook-pages/'.$data->id.'/edit')}}">Upload Book</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--<input id="text" type="hidden" value="{{route('myebook.show',$data->id)}}" style="width:80%" />-->
                                        <input id="text" type="hidden" value="{{'elearn.aspirebookscompany.com/myebook/'.$data->id}}" style="width:80%" />
                                        <div class="row text-center" id="printableArea">
                                            <div class="center">
                                                <div class="col-lg-6 col-md-6">
                                                    <table class="table table-bordered" style="width:175px;    background: #f5f5f5;">
                                                        <tr>
                                                            <td colspan="2">
                                                                <div id="qrcode" style="width:auto; height:auto;"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th >Name</th>
                                                            <td >{{ $data->name.'-'.$data->standard }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th >Cost</th>
                                                            <td>{{ $data->cost }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <input class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="printDiv('printableArea')" value="print QRCode!" />
                                            </div>
                                        </div><br>
                                        <input id="grouptext" type="hidden" value="{{route('group-myebook.show',$data->group_id.'gp-'.strtolower($data->subject))}}" style="width:80%" />
                                        <div class="row text-center" id="groupqr">
                                            <div class="center">
                                                <div class="col-lg-6 col-md-6">
                                                    <table class="table table-bordered" style="width:175px;    background: #f5f5f5;">
                                                        <tr>
                                                            <td colspan="2">
                                                                <div id="groupedqrcode" style="width:auto; height:auto;"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Standard</th>
                                                            <td>{{ $data->standard }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <td>{{ $data->subject }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <input class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="printDiv('groupqr')" value="print QRCode!" />
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

var groupedqrcode = new QRCode(document.getElementById("groupedqrcode"), {
    width : 150,
    height : 150
});

function makeCode2 () {      
    // var elText = document.getElementById("text");
    var elText = document.getElementById("grouptext");
    
    if (!elText.value) {
        alert("Input a text");
        elText.focus();
        return;
    }
    
    groupedqrcode.makeCode(elText.value);
}

makeCode2();

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
