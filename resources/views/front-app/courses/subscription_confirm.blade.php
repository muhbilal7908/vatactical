@extends('front-app.layout.template')
@section('content')

<div class="container mt-5 mb-5">

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="text-left logo p-2 px-5">

                        <img src="{{asset('assets/logojpeg-removebg-preview (1).png')}}" class="w-25">


                    </div>

                    <div class="invoice px-5 pb-3">

                        <h5>Congratulation You have subscribed the Course!</h5>

                        <span class="font-weight-bold d-block mt-4">Hello, {{$order_id->first_name}} {{$order_id->last_name}}</span>
                        <span>Your subscripiton has been confirmed successfully!</span>

                        <div class="payment  mt-3 mb-3 table table-bordered ">

                            <table class="table ">

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted"><strong class="text-dark">Subscription Date</strong></span>
                                            <span>{{$order_id['created_at']->format('j M Y')}}</span>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="py-2">

                                                <span class="d-block  fw-bold text-dark">Subscription No</span>
                                            <span>{{$order_id['id']}}</span>

                                            </div>
                                        </td>




                                    </tr>
                                </tbody>

                            </table>





                        </div>




                            <div class="product table table-borderd">

                                <table class="table ">

                                <tbody>



                                    <tr>
                                        <td width="20%">
                                        <img src="{{asset('assets/courses/'.$order_id->courses->img)}}" width="90">
                                    </td>

                                    <td width="60%">
                                        <span class="font-weight-bold text-capitalize"><strong class="text-dark">Class Name:</strong>{{$order_id->courses['name']}}</span>
                                        <div class="product-qty">
                                            <span class="d-block"><strong class="text-dark">Seats:</strong>{{$order_id['seats']}}</span>
                                            <p class="mb-0"><strong class="fw-bold text-dark">Start Time:</strong>{{$order_id['start_time']}}, <strong class="fw-bold text-dark">End Time:</strong>{{$order_id['end_time']}}</p>
                                            <p class="mb-0"><strong class="fw-bold text-dark">Location:</strong>{{$order_id['location']}}</p>
                                            <p><strong class="text-dark">Seat Names:</strong>{{json_decode($order_id['names'])}}</p>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold"><strong class="text-dark">Total:</strong>${{$order_id['total']}}</span>
                                        </div>
                                    </td>
                                    </tr>


                                </tbody>

                                </table>



                            </div>



                            <div class="product d-flex justify-content-end">

                                <div class="col-md-5 " >

                                    <table class="table ">

                                        <tbody class="totals">

                                            {{-- <tr>
                                                <td>
                                                    <div class="text-left">

                                                        <span class="text-muted">Subtotal</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span>${{$data->total}}</span>
                                                    </div>
                                                </td>
                                            </tr> --}}











                                             <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left">

                                                        <span class="fw-bold text-dark">Subtotal</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span class="font-weight-bold">${{$order_id['total']}}</span>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>



                            </div>


                            <p><strong class="text-dark">Refunds:</strong> Not allowed</p>
                                <p><strong class="text-dark">Reschedule:</strong> Up to 48 hours before the class with notification to VA Tactical (call or email)</p>
                                <p><strong class="text-dark">Reschedule penalty:</strong> No penalty for the first reschedule, but you will need to repay the full price of the class to reschedule if you cancel the day of the class or do not show up.</p>

                            <span>Vatactical Team</span>





                    </div>


                    <div class="d-flex justify-content-between footer p-3">

                        <span>Need Help? visit our <a href="#"> help center</a></span>
                         <span>@php
                            echo now()->format('Y-m-d');
                         @endphp</span>

                    </div>




    </div>

        </div>

    </div>

</div>


@endsection
