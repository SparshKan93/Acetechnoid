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
                                <li><a href="{{ url('question-categories') }}">Question Categories</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{ url('ebook/'.$data->id) }}">{{$data->id}}</a> <span class="bread-slash">/</span>
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
                            <h1>New</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                        <form id="form" method="post" action="{{route('question-categories.update',$data->id)}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="name" class="login2 pull-right pull-right-pro">Name</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="name" id="name" value="{{$data->name}}" type="text" class="form-control" placeholder="Please write your question type" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="marks" class="login2 pull-right pull-right-pro">Marks</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="marks" id="marks" value="{{ $data->marks }}" type="text" class="form-control" placeholder="Please write marks for each question of this type(optional)" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class=" pull-right pull-right-pro" for="description">Description</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <textarea name="description" id="description" value="{{ old('description') }}" type="text" class="form-control" placeholder="Optional">{{ $data->description }}</textarea>
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
@endsection







