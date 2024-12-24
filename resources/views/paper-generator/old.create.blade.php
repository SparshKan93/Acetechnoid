@extends('layouts.gradient')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<style>
    p {
        margin: 0 0 0px !important;
    }
    
    .sparkline7-graph, .sparkline8-graph, .sparkline9-graph, .sparkline11-graph, .sparkline12-graph, .sparkline13-graph, .sparkline14-graph, .sparkline15-graph, .sparkline16-graph {
        text-align: left !important;
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

        @include('layouts.flashmessage')


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
                                        <form id="form" method="post" action="{{route('generate-paper.store')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
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

                                                                @if(!empty($result))
                                                                <option value="{{$list->id}}" @if($list->id==$result->ebook_id) selected @endif>{{$list->name.'-'.$list->standard}}</option>
                                                                @else
                                                                <option value="{{$list->id}}">{{$list->name.'-'.$list->standard}}</option>
                                                                @endif
                                                                @endforeach
                                                                <!-- <option>Other</option> -->
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
                                                        <div class="form-select-list">
                                                            <select name="que_type" id="que_type" class="form-control custom-select-value" required="">
                                                                @foreach($que_type as $key=>$list)
                                                                @if(!empty($result))
                                                                <option value="{{$list->id}}" @if($list->id==$result->que_type) selected @endif >{{$list->name}}</option>
                                                                @else
                                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="name" class="login2 pull-right pull-right-pro">Chapter Num/Chapter</label>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input name="chapter_num" id="chapter_num" value="@if(!empty($result)) {{ $result->chapter_num }}  @endif" type="text" class="form-control" required="">
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="chapter" id="chapter" value="{{ old('chapter') }}@if(!empty($result)) {{ $result->chapter }}  @endif" type="text" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <!--<div class="row">-->
                                                <!--    <div class="col-lg-7">-->
                                                <!--        <label class=" pull-right pull-right-pro" for="remark">Question</label>-->
                                                <!--    </div>-->
                                                <!--    <div class="col-lg-5">-->
                                                <!--        <label class=" pull-left pull-left-pro" for="remark">Answer</label>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <textarea rows="10" name="question" id="question" type="text" class="form-control" placeholder="Questions">{{ old('question') }}@if(!empty($result)) {{ $result->question }}  @endif</textarea>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea rows="10" name="answer" id="answer" type="text" class="form-control" placeholder="Answers">{{ old('answer') }}@if(!empty($result)) {{ $result->answer }}  @endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="form-group-inner">-->
                                            <!--    <div class="row">-->
                                                    <!--<div class="col-lg-3">-->
                                                    <!--    <label class=" pull-right pull-right-pro" for="remark">Answer</label>-->
                                                    <!--</div>-->
                                                    <!--<div class="col-lg-5">-->
                                                    <!--    <textarea rows="3" name="answer" id="answer" type="text" class="form-control">{{ old('answer') }}@if(!empty($result)) {{ $result->answer }}  @endif</textarea>-->
                                                    <!--</div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
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
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
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
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-right">
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

<script type="text/javascript">
    $( "#subject" ).change(function() {
        var option = '';
        var str = $('#subject :selected').text();
        switch($('#subject :selected').text()){
            case 'English':
                    option={'A (Reading)':'A', 'B (Writing and Grammer)':'B', 'C (Literature)':'C'} ;
            break;

            case 'Hindi':
                    option={'A (Reading)':'A', 'B (Writing and Grammer)':'B', 'C (Literature)':'C'} ;
            break;

            case 'Maths':
                    option={'A (1 Marks)':'A', 'B (2 Marks)':'B', 'C (3 Marks)':'C', 'D (5 Marks)':'D'} ;
            break;

            case 'Science':
                    option={'A (MCQ-1 Marks)':'A', 'B (SAQ-2 Marks)':'B', 'C (SAQ-4 Marks)':'C', 'D (SAQ-5 Marks)':'D'} ;
            break;

            case 'Social Science':
                    option={'A (History)':'A', 'B (Civics)':'B', 'C (Geography)':'C'} ;
            break;

            default: option={'A (Very Short)':'A', 'B (Short)':'B', 'C (Long)':'C', 'D (Very Long)':'D'} ;
        }

        $('#sections').empty();
        $.each( option, function( key, value ) {
            $('#sections').append('<option value="'+value+'">'+key+'</option>');
        });
        // $('#sections').append('<option value="whatever">text</option>');
    });
</script>

@endsection



@section('js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        // $(document).ready(function() {
        //   $('#description').summernote();
        // });


        $('textarea#question1').summernote({
            placeholder: 'Type questions here seperated with ;(semi-colons)........',
            tabsize: 0,
            height: 300,
      toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            //['fontname', ['fontname']],
           // ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            //['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
          ],
        });
        
        
        $('#answer1').summernote({
            placeholder: 'Type answers here seperated with ;(semi-colons)........',
            tabsize: 0,
            height: 300,
      toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            //['fontname', ['fontname']],
           // ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            //['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
          ],
        });
    </script>


@endsection
