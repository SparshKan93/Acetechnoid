@extends('layouts.gradient')

@section('content')

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>    -->    

<style type="text/css">
    .user_datatable td {
        overflow-wrap: anywhere;
    }
    
    .user_datatable{
        width:100%;
    }
</style>

<!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="{{ url('') }}">Dashboard</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">E-Books</span>
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

            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>All <span class="table-project-n">E-Books</span></h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <a href="{{ url('generate-paper-hindi/create') }}"><span><i class="fa fa-plus-circle"></i></span></a>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list">
                                        <table class="table table-bordered user_datatable">
                                            <thead>
                                                <tr>
                                                    <th class="id" data-field="id" data-checkbox="true"></th>
                                                    <!-- <th data-field="id">ID</th> -->
                                                    <th data-field="ebook" data-editable="false">Book Name</th>
                                                    <th data-field="que_type" data-editable="false">que_type</th>
                                                    
                                                    <th data-field="chapter" data-editable="false">Chapter</th>
                                                    <th data-field="question" data-editable="true">Question</th>
                                                    
                                                    
                                                    <th data-field="answer" data-editable="false">Answer</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
            
            <form class="delete-form" style="display: none;" method="post" action="">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button onclick="return confirm('Are you sure you want to Delete?');" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-delete"></i>Remove</button>
            </form>
@endsection

@section('js')

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->

<script type="text/javascript">
  $(function () {
    var table = $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('generate-paper-hindi.show',1) }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'ebook', name: 'ebook'},
            {data: 'que_type', name: 'que_type'},
            {data: 'chapter_num', name: 'chapter_num'},
            {data: 'question', name: 'question'},
            {data: 'answer', name: 'answer'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  
  $('.table').on('click', '.edit-btn', function(e){
      e.preventDefault();
      var id = $(this).closest('tr').find('td:eq(0)').text();
      var url = "{{ url('generate-paper-hindi') }}/";
      location.href = url+id+"/edit";
    });
    
    $('.table').on('click', '.delete-btn', function(e){
      e.preventDefault();
            var id = $(this).closest('tr').find('td:eq(0)').text();
            var url = "{{ url('generate-paper-hindi') }}/"+id;
            $('.delete-form').attr('action', url);
            $('.delete-form').submit();
    });
    
</script>

@endsection
