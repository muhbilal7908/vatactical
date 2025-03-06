@extends('backend_app.layouts.template')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Subscription</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">Subscription Detail
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-8  ">

                                <table class="table border bg-white ">
                                    <thead>
                                        <th>Courses Summary</th>
                                        <th>Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Seats</th>
                                        <th>Date</th>


                                    </thead>
                                    <tbody>

                                            <tr >
                                                <td><img class="w-25 rounded-3 me-2"
                                                        src="{{ asset('assets/courses/' . $data->courses->img) }}">
                                                </td>
                                                <td>{{ $data->courses->name }}</td>
                                                <td>{{ date('h:i A', strtotime($data->start_time)) }}</td>
                                                <td>{{ date('h:i A', strtotime($data->end_time)) }}</td>
                                                <td>{{$data->seats}}</td>
                                                <td>{{$data->date}}</td>


                                            </tr>

                                    </tbody>
                                </table>


                            </div>
                            <div class="col-4">

                                <table class="bg-white table ">
                                    <tr>
                                        <th colspan="2">Seats Names</th>
                                    </tr>


                                    <tr>
                                        <td>Seat Names</td>
                                        <td class="text-center">{{ json_decode($data->names)}}</td>

                                    </tr>



                                </table>


                                <table class="bg-white table ">
                                    <tr>
                                        <th colspan="2">Customer Detail</th>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td class="text-center">{{ $data->first_name }}</td>

                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td class="text-center">{{ $data->last_name }}</td>

                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="text-center"><small>{{ $data->email }}</small></td>

                                    </tr>
                                    <tr>
                                        <td>Phone No</td>
                                        <td class="text-center">{{ $data->phone_no }}</td>
                                    </tr>

                                </table>

                                <table class="bg-white table">
                                <tr>
                                <th class="text-start">Subscription Summary</th>
                                <th>More</th>
                                    </tr>
                                    <tr>
                                        <td>Order Date</td>
                                        <td>{{$data->created_at->format('M D Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Time</td>
                                        <td>{{ date('h:i A', strtotime($data->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Promocode Discount</td>
                                        <td>{{$data->promocode != null ? $data->promocode : "Not Applied"}}%</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>${{ $data->total }}</td>
                                    </tr>


                                </table>


                                <table class="bg-white table ">

                                    <tr>

                                        <th colspan="2" class="text-start">Address</th>

                                    </tr>
                                    <tr>
                                        <td>Province</td>
                                        <td>{{ $data->province }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $data->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $data->city }}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Appartment</td>
                                        <td>{{ $data->appartment }}</td>
                                    </tr>
                                    <td>Postal Code</td>
                                    <td>{{ $data->postal_code }}</td>
                                    </tr>

                                    <tr>
                                        <td>Payment Status</td>
                                        <td>{{ $data->bank_status }}</td>
                                    </tr>

                                </table>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- Basic Tables end -->

                <!-- Dark Tables start -->

            </div>
        </div>
    </div>
    </div>
    <!-- Responsive tables end -->

    </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@endsection
