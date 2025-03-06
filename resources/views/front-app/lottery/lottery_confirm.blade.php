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

                        <h5>Congratulations Your name has been entered in the lottery !</h5>

                        <span class="font-weight-bold d-block mt-4">Hello, {{$data->first_name}}</span>
                        <span>You Lottery has been confirmed successfully!</span>

                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                            <table class="table table-borderless">

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted">Order Date</span>
                                            <span>{{$data->created_at->format('I M Y')}}</span>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="py-2">

                                                <span class="d-block text-muted">Lottery Tickets</span>
                                            <span>{{$Lotteris_count}}</span>

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
                                            <span>{{$data->address}}</span>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>





                        </div>




                            <div class="product border-bottom table-responsive">

                                <table class="table table-borderless">

                                <tbody>
                                    @foreach ($Lotteris as $item)
                                    <tr>
                                        <td width="20%">
                                        <img src="{{asset('assets/lottery/'.$item->lottery->img)}}" width="90">
                                        Lottery Gift
                                    </td>

                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold">Price:{{$item->total}}</span>
                                        </div>
                                    </td>
                                    <td>  <div class="text-right">
                                        <span class="font-weight-bold">Lottery No:{{$item->lottery_no}}</span>
                                    </div></td>



                                </tr>
                                    @endforeach






                                </tbody>

                                </table>



                            </div>







                            <p class="font-weight-bold mb-0">Thanks for Participating with us!</p>
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
