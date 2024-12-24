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
                                <li><a href="{{ url('') }}">Dashboard</a>
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

<div class="income-order-visit-user-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>Entries</h2>
                            <div class="main-income-phara">
                                <p>Today</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">{{$sql_PG->count()}}</span><span>+</span><span class="counter">{{$sql_HPG->get()->count()}}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline1"><canvas width="27" height="19" style="display: inline-block; width: 27px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range">
                            <p>Total Entries</p>
                            <span class="income-percentange"><span class="counter">
                                {{(($sql_PG->count()+$sql_HPG->count())/8)}}
                            </span>% <i class="fa fa-bolt"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>Chapters</h2>
                            <div class="main-income-phara order-cl">
                                <p>Today</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">{{$eChap = $sql_PG->groupBy('chapter_num')->get()->count()}}</span><span>+</span><span class="counter">{{$hChap = $sql_HPG->groupBy('chapter_num')->get()->count()}}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline6"><canvas width="56" height="19" style="display: inline-block; width: 56px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range order-cl">
                            <p>Target Achieved</p>
                            <span class="income-percentange"><span class="counter">{{(($eChap+$hChap)/0.5)}}</span>% <i class="fa fa-level-up"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>Total Books</h2>
                            <div class="main-income-phara visitor-cl">
                                <p>Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">{{$eBooks_count}}</span><span>+</span><span class="counter">{{$hBooks_count}}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline2"><canvas width="39" height="19" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range visitor-cl">
                            <p>Target Achieved</p>
                            <span class="income-percentange"><span class="counter">{{(($eBooks_count+$hBooks_count)/0.5)}}</span>% <i class="fa fa-level-up"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="income-dashone-total user-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>User activity</h2>
                            <div class="main-income-phara low-value-cl">
                                <p>Low Value</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">88200</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline5"><canvas width="59" height="19" style="display: inline-block; width: 59px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range low-value-cl">
                            <p>In first month</p>
                            <span class="income-percentange"><span class="counter">33</span>% <i class="fa fa-level-down"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashtwo-order-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashtwo-order-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-9">
                           <div class="wrapper">
                                <canvas id="myChartsrs" width="400" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="skill-content-3">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3>2,346</h3>
                                            <p>Total orders in period</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3>9,346</h3>
                                            <p>Orders in last month</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                    </div>
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3>2,34,600</h3>
                                            <p>Monthly income from order</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="93%" style="width: 93%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>93%</span> </div>
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
<div class="feed-mesage-project-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="sparkline9-list shadow-reset mg-tb-30">
                    <div class="sparkline9-hd">
                        <div class="main-sparkline9-hd">
                            <h1>Your Today Login Details</h1>
                            <div class="sparkline9-outline-icon">
                                <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                <span><i class="fa fa-wrench"></i></span>
                                <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline9-graph dashone-comment">
                        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                            <div id="toolbar1">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="false">#</th>
                                        <th data-field="phone" data-editable="false">User</th>
                                        <th data-field="id">Activity</th>
                                        <th data-field="status" data-editable="false">Login</th>
                                        <th data-field="date" data-editable="false">Logout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loginLogs as $key => $list)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{$list->activity}}</td>
                                        @php
                                            $login = $logout = "";
                                            $list->activity == "login"?
                                            $login = date_format(date_create($list->created_at), 'H:i:s'):
                                            $logout = date_format(date_create($list->created_at), 'H:i:s')
                                        @endphp
                                        <td>{{$login}}</td>
                                        <td>{{$logout}}</td>
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
@endsection
