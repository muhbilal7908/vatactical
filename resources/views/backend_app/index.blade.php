@extends('backend_app.layouts.template')
@section('content')
@push('styles')

<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/plugins/charts/chart-apex.css')}}">

@endpush
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
            <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Welcome 🎉 Sean Bank!</h5>
                                    <p class="card-text font-small-3">Your Total earning on this month</p>
                                    <h3 class="mb-75 mt-2 pt-50">
                                        <a href="#">${{$totalmonthearning}}</a>
                                    </h3>
                                    <a href="{{route('all-transections')}}"  class="btn btn-primary m-0">View All</a>
                                    <img src="{{asset('backend/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic">
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$subscriptioncount}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Subscriptions</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user avatar-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$users}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Customers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$products}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Products</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$orderscount}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                <div class="row match-height">
                    <div class="col-lg-4 col-md-6 col-4 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Orders Overview</h4>
                                <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                            </div>
                            <div class="card-body p-0">
                                <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                                <div class="row border-top text-center mx-0">
                                    <div class="col-6 border-end py-1">
                                        <p class="card-text text-muted mb-0">Delivered</p>
                                        <h3 class="fw-bolder mb-0">{{$orders}}</h3>
                                    </div>
                                    <div class="col-6 py-1">
                                        <p class="card-text text-muted mb-0">In Progress</p>
                                        <h3 class="fw-bolder mb-0">{{$pendingOrders}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row pb-50">
                                    <div class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                                        <div class="mb-1 mb-sm-0">
                                            <h2 class="fw-bolder mb-25">${{$total_earning}}</h2>
                                            <p class="card-text fw-bold mb-2">Total Earning</p>

                                        </div>
                                        <a href="{{route('all-orders')}}" type="button" class="btn btn-primary w-100">View All Orders</a>
                                    </div>
                                    <div class="col-sm-6 col-12 d-flex justify-content-between flex-column text-end order-sm-2 order-1">
                                        {{-- <div class="dropdown chart-dropdown">
                                            <button class="btn btn-sm border-0 dropdown-toggle p-50" type="button" id="dropdownItem5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Last 7 Days
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownItem5">
                                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">Last Year</a>
                                            </div>
                                        </div> --}}
                                        <div id="avg-sessions-chart"></div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row avg-sessions pt-50 pt-5">
                                    @php
                                    $total = $pending_price + $delivered_price; // Calculate the total amount
                                    $delivered_price = $total - $pending_price; // Calculate the delivered amount by subtracting pending from total
                                    $pending_percentage = ($pending_price / $total) * 100; // Calculate the percentage of pending amount
                                    $delivered_percentage = 100 - $pending_percentage; // Calculate the percentage of delivered amount


                                @endphp
                                    <div class="col-6 mb-2">
                                        <p class="mb-50">Pending Count: {{$pending_count}}</p>
                                        <div class="progress progress-bar-primary" style="height: 6px">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width: {{$pending_percentage}}%"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="mb-50">Delivered Count: {{$delivered_count}}</p>
                                        <div class="progress progress-bar-warning" style="height: 6px">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width: {{$delivered_percentage}}%"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <p class="mb-50">Pending Price: {{$pending_price}}</p>
                                        <div class="progress progress-bar-danger" style="height: 6px">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="70" aria-valuemax="100" style="width: {{$pending_percentage}}%"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-50">Delivered Price: {{$delivered_price}}</p>
                                        <div class="progress progress-bar-success" style="height: 6px">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="90" aria-valuemax="100" style="width: {{$delivered_percentage}}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Report Card -->

                    <!--/ Revenue Report Card -->
                </div>
                <div class="row match-height">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header">
                                <div>
                                    <h4 class="card-title">Top Customers</h4>
                                    <p class="card-text font-small-2">Top Customers Who buy most</p>
                                </div>
                                <div class="dropdown chart-dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-3 cursor-pointer" data-bs-toggle="dropdown"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($topUsers as $item)
                                <div class="browser-states">
                                    <div class="d-flex">

                                        <img src="{{ asset('assets/users/'.$item->img) }}" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhtMRbtowke9ZnnGtyYJmIuJaB2Q1y5I-3IA&s'" class="rounded-circle me-1 border" style="height:50px;width:50px;object-fit:cover;" alt="Avatar">



                                    <h6 class="align-self-center mb-0">{{ $item->name }}</h6>

                                    </div>
                                    <div class="d-flex align-items-center" style="position: relative;">
                                        <div class="fw-bold text-body-heading me-1">54.4%</div>

                                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 87px; height: 37px;"></div></div><div class="contract-trigger"></div></div></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header">
                                <div>
                                    <h4 class="card-title">Popular Courses</h4>
                                    <p class="card-text font-small-2">Most Subscribed Courses</p>
                                </div>
                                <div class="dropdown chart-dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-3 cursor-pointer" data-bs-toggle="dropdown"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($topCoursesBySubscriptions as $item)
                                <div class="browser-states">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/courses/'.$item->img) }}" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhtMRbtowke9ZnnGtyYJmIuJaB2Q1y5I-3IA&s'" class="rounded-circle me-1 border" style="height:50px;width:50px;object-fit:cover;" alt="Avatar">
                                        <h6 class="align-self-center mb-0">{{$item->name}}</h6>
                                    </div>
                                    <div class="d-flex align-items-center" style="position: relative;">
                                        <div class="fw-bold text-body-heading me-1">Price:${{$item->price}}</div>

                                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 87px; height: 37px;"></div></div><div class="contract-trigger"></div></div></div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-browser-states">
                                <div class="card-header">
                                    <div>
                                        <h4 class="card-title">Popuplar Products</h4>
                                        <p class="card-text font-small-2">Most Ordered Products</p>
                                    </div>
                                    <div class="dropdown chart-dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-3 cursor-pointer" data-bs-toggle="dropdown"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                @foreach ($topProductsByOrders as $item)
                                    <div class="browser-states">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/featured_images/'.$item->img) }}" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhtMRbtowke9ZnnGtyYJmIuJaB2Q1y5I-3IA&s'" class="rounded-circle me-1 border" style="height:50px;width:50px;object-fit:contain;" alt="Avatar">
                                            <h6 class="align-self-center mb-0">{{$item->name}}</h6>
                                        </div>
                                        <div class="d-flex align-items-center" style="position: relative;">
                                            <div class="fw-bold text-body-heading me-1">Price:${{$item->price}}</div>

                                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 87px; height: 37px;"></div></div><div class="contract-trigger"></div></div></div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                </div>
                <div class="row match-height">
                    <!-- Company Table Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order-ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Price</th>
                                        <th>Delivery Status</th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ordersdata as $item)


                                            <tr>



                                                <td>{{$item->id}}</td>
                                                <td>{{$item->first_name}}</td>
                                                <td>{{$item->email}}</td>

                                                <td>
                                                  ${{$item->total}}
                                                </td>

                                                <td> {{$item->delivery_status}}</td>




                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->

                    <!-- Developer Meetup Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Transactions</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="transaction-item">

                                    <div class="d-flex">
                                        <div class="avatar bg-light-primary rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <a href="{{route('all-transections')}}"><h6 class="transaction-title">Bankful</h6>
                                            <small>Add Money</small></a>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+${{$total_earning}}</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-success rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Bank Transfer</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">Not Available</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-danger rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Paypal</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">Not Available</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-warning rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Mastercard</h6>
                                            <small>Ordered Food</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">Not Available</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-info rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Transfer</h6>
                                            <small>Refund</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">Not Available</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Developer Meetup Card -->

                    <!-- Browser States Card -->

                    <!--/ Browser States Card -->

                    <!-- Goal Overview Card -->

                    <!--/ Goal Overview Card -->

                    <!-- Transaction Card -->

                    <!--/ Transaction Card -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@push('scripts')
  <!-- BEGIN: Vendor JS-->
  <script src="{{asset('backend/js/index.js')}}"></script>
  <!-- BEGIN: Page Vendor JS-->
  <script src="{{asset('backend/vendors/js/charts/apexcharts.min.js')}}"></script>

  <script src="{{asset('backend/vendors/js/extensions/toastr.min.js')}}"></script>
  <!-- END: Page Vendor JS-->

<script>

$(window).on('load', function () {
  'use strict';

  var $barColor = '#f3f3f3';
  var $trackBgColor = '#EBEBEB';
  var $textMutedColor = '#b9b9c3';
  var $budgetStrokeColor2 = '#dcdae3';
  var $goalStrokeColor2 = '#51e5a8';
  var $strokeColor = '#ebe9f1';
  var $textHeadingColor = '#5e5873';
  var $earningsStrokeColor2 = '#28c76f66';
  var $earningsStrokeColor3 = '#28c76f33';

  var $statisticsOrderChart = document.querySelector('#statistics-order-chart');
  var $statisticsProfitChart = document.querySelector('#statistics-profit-chart');
  var $earningsChart = document.querySelector('#earnings-chart');
  var $revenueReportChart = document.querySelector('#revenue-report-chart');
  var $budgetChart = document.querySelector('#budget-chart');
  var $browserStateChartPrimary = document.querySelector('#browser-state-chart-primary');
  var $browserStateChartWarning = document.querySelector('#browser-state-chart-warning');
  var $browserStateChartSecondary = document.querySelector('#browser-state-chart-secondary');
  var $browserStateChartInfo = document.querySelector('#browser-state-chart-info');
  var $browserStateChartDanger = document.querySelector('#browser-state-chart-danger');
  var $goalOverviewChart = document.querySelector('#goal-overview-radial-bar-chart');

  var statisticsOrderChartOptions;
  var statisticsProfitChartOptions;
  var earningsChartOptions;
  var revenueReportChartOptions;
  var budgetChartOptions;
  var browserStatePrimaryChartOptions;
  var browserStateWarningChartOptions;
  var browserStateSecondaryChartOptions;
  var browserStateInfoChartOptions;
  var browserStateDangerChartOptions;
  var goalOverviewChartOptions;

  var statisticsOrderChart;
  var statisticsProfitChart;
  var earningsChart;
  var revenueReportChart;
  var budgetChart;
  var browserStatePrimaryChart;
  var browserStateDangerChart;
  var browserStateInfoChart;
  var browserStateSecondaryChart;
  var browserStateWarningChart;
  var goalOverviewChart;
  var isRtl = $('html').attr('data-textdirection') === 'rtl';

  // On load Toast


  //------------ Statistics Bar Chart ------------
  //----------------------------------------------
  statisticsOrderChartOptions = {
    chart: {
      height: 70,
      type: 'bar',
      stacked: true,
      toolbar: {
        show: false
      }
    },
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0,
        top: -15,
        bottom: -15
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '20%',
        startingShape: 'rounded',
        colors: {
          backgroundBarColors: [$barColor, $barColor, $barColor, $barColor, $barColor],
          backgroundBarRadius: 5
        }
      }
    },
    legend: {
      show: false
    },
    dataLabels: {
      enabled: false
    },
    colors: [window.colors.solid.warning],
    series: [
      {
        name: '2020',
        data: [45, 85, 65, 45, 65]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      show: false
    },
    tooltip: {
      x: {
        show: false
      }
    }
  };
  statisticsOrderChart = new ApexCharts($statisticsOrderChart, statisticsOrderChartOptions);
  statisticsOrderChart.render();

  //------------ Statistics Line Chart ------------
  //-----------------------------------------------
  statisticsProfitChartOptions = {
    chart: {
      height: 70,
      type: 'line',
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    grid: {
      borderColor: $trackBgColor,
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      },
      padding: {
        top: -30,
        bottom: -10
      }
    },
    stroke: {
      width: 3
    },
    colors: [window.colors.solid.info],
    series: [
      {
        data: [0, 20, 5, 30, 15, 45]
      }
    ],
    markers: {
      size: 2,
      colors: window.colors.solid.info,
      strokeColors: window.colors.solid.info,
      strokeWidth: 2,
      strokeOpacity: 1,
      strokeDashArray: 0,
      fillOpacity: 1,
      discrete: [
        {
          seriesIndex: 0,
          dataPointIndex: 5,
          fillColor: '#ffffff',
          strokeColor: window.colors.solid.info,
          size: 5
        }
      ],
      shape: 'circle',
      radius: 2,
      hover: {
        size: 3
      }
    },
    xaxis: {
      labels: {
        show: true,
        style: {
          fontSize: '0px'
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      show: false
    },
    tooltip: {
      x: {
        show: false
      }
    }
  };
  statisticsProfitChart = new ApexCharts($statisticsProfitChart, statisticsProfitChartOptions);
  statisticsProfitChart.render();

  //--------------- Earnings Chart ---------------
  //----------------------------------------------
  earningsChartOptions = {
    chart: {
      type: 'donut',
      height: 120,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [53, 16, 31],
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: ['App', 'Service', 'Product'],
    stroke: { width: 0 },
    colors: [$earningsStrokeColor2, $earningsStrokeColor3, window.colors.solid.success],
    grid: {
      padding: {
        right: -20,
        bottom: -8,
        left: -20
      }
    },
    plotOptions: {
      pie: {
        startAngle: -10,
        donut: {
          labels: {
            show: true,
            name: {
              offsetY: 15
            },
            value: {
              offsetY: -15,
              formatter: function (val) {
                return parseInt(val) + '%';
              }
            },
            total: {
              show: true,
              offsetY: 15,
              label: 'App',
              formatter: function (w) {
                return '53%';
              }
            }
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 1325,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 1200,
        options: {
          chart: {
            height: 120
          }
        }
      },
      {
        breakpoint: 1045,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 120
          }
        }
      }
    ]
  };
  earningsChart = new ApexCharts($earningsChart, earningsChartOptions);
  earningsChart.render();

  //------------ Revenue Report Chart ------------
  //----------------------------------------------
  revenueReportChartOptions = {
    chart: {
      height: 230,
      stacked: true,
      type: 'bar',
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        columnWidth: '17%',
        endingShape: 'rounded'
      },
      distributed: true
    },
    colors: [window.colors.solid.primary, window.colors.solid.warning],
    series: [
      {
        name: 'Earning',
        data: [95, 177, 284, 256, 105, 63, 168, 218, 72]
      },
      {
        name: 'Expense',
        data: [-145, -80, -60, -180, -100, -60, -85, -75, -100]
      }
    ],
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    grid: {
      padding: {
        top: -20,
        bottom: -10
      },
      yaxis: {
        lines: { show: false }
      }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.86rem'
        }
      },
      axisTicks: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.86rem'
        }
      }
    }
  };
  revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
  revenueReportChart.render();

  //---------------- Budget Chart ----------------
  //----------------------------------------------
  budgetChartOptions = {
    chart: {
      height: 80,
      toolbar: { show: false },
      zoom: { enabled: false },
      type: 'line',
      sparkline: { enabled: true }
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 5],
      width: [2]
    },
    colors: [window.colors.solid.primary, $budgetStrokeColor2],
    series: [
      {
        data: [61, 48, 69, 52, 60, 40, 79, 60, 59, 43, 62]
      },
      {
        data: [20, 10, 30, 15, 23, 0, 25, 15, 20, 5, 27]
      }
    ],
    tooltip: {
      enabled: false
    }
  };
  budgetChart = new ApexCharts($budgetChart, budgetChartOptions);
  budgetChart.render();

  //------------ Browser State Charts ------------
  //----------------------------------------------

  // State Primary Chart
  browserStatePrimaryChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.primary],
    series: [54.4],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStatePrimaryChart = new ApexCharts($browserStateChartPrimary, browserStatePrimaryChartOptions);
  browserStatePrimaryChart.render();

  // State Warning Chart
  browserStateWarningChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.warning],
    series: [6.1],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateWarningChart = new ApexCharts($browserStateChartWarning, browserStateWarningChartOptions);
  browserStateWarningChart.render();

  // State Secondary Chart 1
  browserStateSecondaryChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.secondary],
    series: [14.6],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateSecondaryChart = new ApexCharts($browserStateChartSecondary, browserStateSecondaryChartOptions);
  browserStateSecondaryChart.render();

  // State Info Chart
  browserStateInfoChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.info],
    series: [4.2],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateInfoChart = new ApexCharts($browserStateChartInfo, browserStateInfoChartOptions);
  browserStateInfoChart.render();

  // State Danger Chart
  browserStateDangerChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.danger],
    series: [8.4],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateDangerChart = new ApexCharts($browserStateChartDanger, browserStateDangerChartOptions);
  browserStateDangerChart.render();

  //------------ Goal Overview Chart ------------
  //---------------------------------------------
  goalOverviewChartOptions = {
    chart: {
      height: 245,
      type: 'radialBar',
      sparkline: {
        enabled: true
      },
      dropShadow: {
        enabled: true,
        blur: 3,
        left: 1,
        top: 1,
        opacity: 0.1
      }
    },
    colors: [$goalStrokeColor2],
    plotOptions: {
      radialBar: {
        offsetY: -10,
        startAngle: -150,
        endAngle: 150,
        hollow: {
          size: '77%'
        },
        track: {
          background: $strokeColor,
          strokeWidth: '50%'
        },
        dataLabels: {
          name: {
            show: false
          },
          value: {
            color: $textHeadingColor,
            fontSize: '2.86rem',
            fontWeight: '600'
          }
        }
      }
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        type: 'horizontal',
        shadeIntensity: 0.5,
        gradientToColors: [window.colors.solid.success],
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      }
    },
    series: [{{$percentageDelivered}}],
    stroke: {
      lineCap: 'round'
    },
    grid: {
      padding: {
        bottom: 30
      }
    }
  };
  goalOverviewChart = new ApexCharts($goalOverviewChart, goalOverviewChartOptions);
  goalOverviewChart.render();
});


</script>


@endpush

@endsection
