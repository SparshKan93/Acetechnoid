@extends('layouts.gradient')

@section('content')
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
                                            <a href="{{ url('ebook/create') }}"><span><i class="fa fa-plus-circle"></i></span></a>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id">ID</th>
                                                    <th data-field="name" data-editable="false">Project</th>
                                                    <th data-field="email" data-editable="false">Email</th>
                                                    <th data-field="phone" data-editable="false">Phone</th>
                                                    <th data-field="company" data-editable="false">Company</th>
                                                    <th data-field="complete">Completed</th>
                                                    <th data-field="task" data-editable="false">Task</th>
                                                    <th data-field="date" data-editable="false">Date</th>
                                                    <th data-field="price" data-editable="false">Cost</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td>Web Development</td>
                                                    <td>admin@uttara.com</td>
                                                    <td>+8801962067309</td>
                                                    <td>Aber Ltd.</td>
                                                    <td class="datatable-ct"><span class="pie">1/6</span>
                                                    </td>
                                                    <td>10%</td>
                                                    <td>Jul 14, 2018</td>
                                                    <td>$5455</td>
                                                    <td class="datatable-ct"><i class="fa fa-check"></i>
                                                    </td>
                                                </tr>
                                                @foreach($data as $key => $list)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$list->uid}}</td>
                                                        <td>{{$list->publication}}</td>
                                                        <td>{{$list->series}}</td>
                                                        <td>{{$list->name}}</td>
                                                        <td>{{$list->subject}}</td>
                                                        <td class="datatable-ct"><span class="pie">1/6</span>
                                                        </td>
                                                        <td>{{$list->standard}}</td>
                                                        <td>{{$list->created_at}}</td>
                                                        <td>{{$list->cost}}</td>
                                                        <!-- <td class="datatable-ct"><i class="fa fa-check"></i> 
                                                        </td> -->
                                                        <td style="">
                                                        <div class="btn-group project-list-action">
                                                            <a href="{{ url('ebook/'.$list->id.'/edit') }}" class="btn btn-white btn-action btn-xs"><i class="fa fa-folder"></i></a>
                                                            <a class="btn btn-white btn-xs"><i class="fa fa-pencil"></i></a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
@endsection
