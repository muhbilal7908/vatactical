@extends('front-app.layout.template')
@section('content')
@php
    $gift_card = DB::table('gift_cards')->where('id', $order->order_items->first()->gift_card_id)->first();
    $membershipUsers = $order->membershipUsers ? $order->membershipUsers : "" ;
    

@endphp

<div class="container mt-5 mb-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-8">

            <div class="card">


                    <div class="text-left logo p-2 px-5">

                        <img src="{{asset('assets/logojpeg-removebg-preview (1).png')}}" class="w-25">


                    </div>

                    <div class="invoice p-5">

                        <h5>Thank You For Your Order!</h5>
                        <p>Your Order# {{$order->id}} has been placed successfully </p>
                        <span class="font-weight-bold d-block mt-4">Hello, {{$order->first_name}}</span>
                        <span>You Member Ship has been confirmed successfully!</span>

                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                            <table class="table ">

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted">Order Date</span>
                                            <span>{{$order->created_at->format('i M Y')}}</span>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted">Membership Type</span>
                                            <span>{{$gift_card->name}}</span>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted">Payment</span>
                                            <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted">Shiping Address</span>
                                            <span>{{$order->address}}</span>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>





                        </div>




                            <div class="product border-bottom table-responsive">

                                <table class="table ">

                                <tbody>


                                    <tr>
                                        <td width="20%">
                                        <img src="{{asset('assets/gift_cards/'.$gift_card->img)}}" width="90">
                                            {{$gift_card->name}}
                                    </td>


                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold">Total:${{$order->total}}</span>
                                        </div>
                                    </td>
                                    </tr>


                                </tbody>

                                </table>

                                        @if($membershipUsers)
                                        <div class="border p-3">
                                            <h5 class="text-dark">Users Info</h5>
                                        @foreach ($membershipUsers as $key=>$item )
                                        <div class="mb-3"><img src="{{asset('assets/member_ships/'.$item->img)}}" alt="" style="width:50px;height:50px;object-fit:cover;" class="rounded-circle me-2"> {{$item->member_name}}</div>

                                        @endforeach
                                    </div>
                                    @endif
                                


                            </div>







                            <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                            <span>Vatactical Team</span>





                    </div>


                    <div class="d-flex justify-content-between footer p-3">

                        <span>Need Help? visit our <a href="#"> help center</a></span>
                         <span>12 June, 2020</span>

                    </div>




    </div>

        </div>

    </div>

</div>


@endsection
