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
                                @php $str = explode("." ,Route::currentRouteName()); @endphp
                                <li><a href="{{ url($str[0]) }}">{{ $str[0] }}</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ url($str[0].'/'.$data->id) }}">{{$data->name}}</a> <span class="bread-slash">/</span>
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
                                        <form id="form" method="post" action="{{route('group-myebook.update',$data->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="name" class="login2 pull-right pull-right-pro">Name</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="name" id="name" value="{{ $data->name }}" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="description">Description</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <textarea name="description" id="description" type="text" class="form-control">{{ $data->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save </button>
                                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input id="text" type="hidden" value="{{route('myebook.show',$data->id)}}" style="width:80%" />
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
                                                            <td >{{ $data->name }}</td>
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
