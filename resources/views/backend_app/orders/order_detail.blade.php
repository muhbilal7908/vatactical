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
                            <h2 class="content-header-title float-start mb-0">Orders</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">Order Detail
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
                                        <th>Items Summary</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Sale-Price</th>


                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                        @if ($item->gift_card_id !== null)
                                        <tr>
                                            <td><img class="w-25 rounded-3 me-2"
                                                    src="{{ asset('assets/gift_cards/' . $item->gift_card->img) }}">
                                                    <span class="mx-2">{{$item->gift_card->name}}</span>
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            @if($item->gift_card->sale_price === null)
                                            <td>{{ $item->gift_card->price }}</td>
                                            @else
                                            <td>{{ $item->gift_card->sale_price }}</td>
                                            @endif
                                            <td>{{ $item->sub_total }}</td>

                                        </tr>
                                        @else
                                        <tr>
                                            <td>
                                                <img class="w-25 rounded-3 me-2"
                                                    src="{{ $item->products ? asset('assets/featured_images/' . $item->products->img) : '' }}">
                                                <span class="mx-2">{{ $item->products ? $item->products->name : 'N/A' }}</span>
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                        
                                            <td>{{ $item->products ? $item->products->price : 'N/A' }}</td>
                                        
                                            <td>{{ $item->products && $item->products->sale_price ? $item->products->sale_price : '0' }}</td>
                                        </tr>
                                        
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                @if($order_detail->membershipUsers !== [])
                                <h5>Users Info</h5>
                                    <table class="table border bg-white ">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Img</th>
                                        </thead>

                                        <tbody>
                                    @foreach ($order_detail->membershipUsers as $key=>$item)
                                            <tr>
                                                <td>
                                                    {{$key}}
                                                </td>
                                                <td>{{ $item->member_name }}</td>
                                                <td><img class="rounded-circle" src="{{asset('assets/member_ships/'.$item->img)}}" style="height: 50px;width:50px;object-fit:cover;" /></td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>

                                @endif



                            </div>
                            <div class="col-4">
                                <table class="bg-white table ">
                                    <tr>
                                        <th colspan="2">Customer Detail</th>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td class="text-center">{{ $order_detail->first_name }}</td>

                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td class="text-center">{{ $order_detail->last_name }}</td>

                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="text-center"><small>{{ $order_detail->email }}</small></td>

                                    </tr>
                                    <tr>
                                        <td>Phone No</td>
                                        <td class="text-center">{{ $order_detail->phone_no }}</td>
                                    </tr>

                                </table>
                                <table class="bg-white table ">
                                    <tr>
                                        <th class="text-start">Order Summary</th>
                                        <th>More</th>
                                    </tr>
                                    <tr>
                                        <td>Order Created</td>
                                        <td>{{ $order_detail->created_at->format('j M Y') }}</td>

                                    </tr>
                                    <tr>
                                        <td>Order Time</td>
                                        <td>{{ $order_detail->created_at->format('H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sub-Total</td>
                                        <td>${{ $order_detail->total }}</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Fee</td>
                                        <td>${{$order_detail->pickup === "delivery" ? $shipping->shipping_price : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>Promocode Discount</td>
                                        <td>{{$order_detail->promocode ? $order_detail->promocode : '0'}}%</td>
                                    </tr>

                                </table>

                                <table class="bg-white table my-2">

                                    <tr>
                                        <th>Total</th>
                                        <th>${{ $order_detail->total  }}</th>
                                    </tr>


                                </table>

                                <table class="bg-white table ">

                                    <tr>

                                        <th colspan="2" class="text-start">Delivery Address</th>

                                    </tr>
                                    <tr>
                                        <td>Province</td>
                                        <td>{{ $order_detail->province }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $order_detail->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $order_detail->city }}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Appartment</td>
                                        <td>{{ $order_detail->appartment }}</td>
                                    </tr>
                                    <td>Postal Code</td>
                                    <td>{{ $order_detail->postal_code }}</td>
                                    </tr>

                                    <tr>
                                        <td>Payment Status</td>
                                        <td>{{ $order_detail->bank_status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Pickup</td>
                                        <td>{{ $order_detail->pickup }}</td>
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
