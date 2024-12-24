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
                                <li><span class="bread-blod">New</span>
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
                                        <form id="form" method="post" action="{{route('ebook.store')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="uid" class="login2 pull-right pull-right-pro">Unique ID (auto)</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="uid" id="uid" value="{{$uid}}" type="text" class="form-control" readonly>
                                                    </div>
                                                <!-- </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row"> -->
                                                    <div class="col-lg-3">
                                                        <label for="ref_id" class="login2 pull-right pull-right-pro">Refrence ID (if any)</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input name="ref_id" id="ref_id" value="{{ old('ref_id') }}" type="text" class="form-control">
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
                                                            <select name="publication" id="publication" class="form-control custom-select-value"  value="{{ old('publication') }}">
                                                                <option>Please select...</option>
                                                                <option>Select 1</option>
                                                                <option>Select 2</option>
                                                                <option>Select 3</option>
                                                                <option>Select 4</option>
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
                                                                <option>Select 1</option>
                                                                <option>Select 2</option>
                                                                <option>Select 3</option>
                                                                <option>Select 4</option>
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
                                                                <option>Hindi</option>
                                                                <option>English</option>
                                                                <option>Maths</option>
                                                                <option>Science</option>
                                                                <option>Social Science</option>
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
                                                            <select name="standard" id="standard" class="form-control custom-select-value"  value="{{ old('standard') }}">
                                                                <option>Please select...</option>
                                                                <option>A</option>
                                                                <option>B</option>
                                                                <option>C</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
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
                                                        <input name="name" id="name" value="{{ old('name') }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="author" class=" pull-right pull-right-pro">Author</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="author" id="author" value="{{ old('author') }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="cost" class=" pull-right pull-right-pro">Cost</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="cost" id="cost" value="{{ old('cost') }}" type="text" class="form-control">
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
                                                        <textarea name="remark" id="remark" value="{{ old('remark') }}" type="text" class="form-control"></textarea>
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
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
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
