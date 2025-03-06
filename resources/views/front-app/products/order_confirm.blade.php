@extends('front-app.layout.template')
@section('content')

<div class="container mt-5 mb-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-8">

            <div class="card">


                    <div class="text-left logo p-2 px-5">

                        <img src="{{asset('assets/logojpeg-removebg-preview (1).png')}}" class="w-25">


                    </div>

                    <div class="invoice p-5">

                        <h5>Your order Confirmed!</h5>

                        <span class="font-weight-bold d-block mt-4">Hello, {{$order['first_name']}}</span>
                        <span>You order has been confirmed and Take your order form our store!</span>

                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                            <table class="table table-borderless">

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

                                                <span class="d-block text-muted">Order No</span>
                                            <span>{{$order->id}}</span>

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

                                <table class="table table-borderless">

                                <tbody>
                                    @foreach ($order->order_items as $item)


                                    <tr>
                                        <td width="20%">
                                        <img src="{{asset('assets/featured_images/'.$item->products->img)}}" width="90">
                                    </td>

                                    <td width="60%">
                                        <span class="font-weight-bold">{{$item->products->name}}</span>
                                        <div class="product-qty">
                                            <span class="d-block">Quantity:{{$item->quantity}}</span>


                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold">Total:${{$item->sub_total}}</span>
                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                                </table>



                            </div>



                            <div class="row d-flex justify-content-end">

                                <div class="col-md-5">

                                    <table class="table table-borderless">

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


                                             <tr>
                                                <td>
                                                    <div class="text-left">

                                                        <span class="text-muted">Shipping Fee</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        @php
                                                        $shipping_value=$order['pickup'] === "delivery" ? $shipping_taxes->shipping_price : 0;
                                                    @endphp
                                                        <span>${{$shipping_value}}</span>
                                                    </div>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td>
                                                    <div class="text-left">

                                                        <span class="text-muted">Tax Fee</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span>{{$tax_fee}}</span>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left">

                                                        <span class="text-muted">Promocode Discount</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span>{{$order['promocode'] != null ? '%'.$order['promocode'] : "Not Applied" }}</span>
                                                    </div>
                                                </td>

                                            </tr>





                                             <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left">

                                                        <span class="font-weight-bold">Total</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span class="font-weight-bold">${{$order->total}}</span>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>



                            </div>


                            <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
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
