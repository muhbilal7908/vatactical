

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lottery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        table, th, td {
      border:1px solid #8A0103;
    }

    @media(max-width:768px){
        .mob-full{
        width: 100%!important;
    }
    }
    </style>
</head>
  <body>
    <div >
        <div class="container-fluid">

            <div class="row">
                <img  src="{{asset('assets/lottery.jpg')}}" style="width:25%; margin:auto; display:block;" alt="logo">
            </div>
        </div>
        <div class="container" style="padding: 20px">
            <div class="row text-center" style="text-align:center;">
                {{-- <h1>T</h1> --}}
                <p class="text-white">Thank You For Your Participating in the Lottery!</p>
                <p class="text-white">
                    Hi :{{$order->first_name}}</p>

                    <p>Your Lottery Tickets #{{ $Lotteris_count }} has been placed successfully, and we will update you via email once your package is on its way. </p>
                    <p>Lottery Tickets No</p>
                    <table>

                        @foreach ($Lotteris as $item)
                        <tr>
                            <td>Lottery Ticket No:</td>
                            <td>{{$item->lottery_no}}</td>
                        </tr>
                        @endforeach
                    </table>

            </div>
        </div>
        {{-- <div class="container" style="padding:20px;">
            <div class="row">

                <div class="col-12">


                            <div class="mob-full" style="width:50%;float:left;">
                            <h2>Billing Infomration</h2>
                            <p>Country:{{$order->country}}</p>
                            <p>State:{{$order->state}}</p>
                            <p>City:{{$order->city}}</p>
                            <p>Address:{{$order->address}}</p>
                            <p>Postal_code:{{$order->postal_code}}</p>
                            <p>email:{{$order->email}}</p>
                        </div>
                        <div class="mob-full" style="width:50%;float:left;">
                            <h2>Pickup Address</h2>
                            <p>5243 S Laburnum Ave Richmood Virginia, United States 232321</p>
                            <h2>Delivery Method</h2>
                            <p>Store PickUp (We Will Send you a 'item is ready for pickup' email)</p>
                        </div>



            </div>
        </div> --}}
    </div>
        {{-- <div class="container" style="padding:20px; display:block;">
            <div class="row">

                <div class="col-12 position-relative">
                    <p style="font-weight: bold">Order Details</h2>

                        <div class="row" style="border:1px solid #8A0103;display:block;">
                            <div style="width:30%;float:left;"><img src="https://www.vatactical.com/assets/gift_cards/{{$products->img}}" width="100%;" alt=""></div>
                            <div style="width:70%;float:left;">
                            <span style="display: block;margin-left:10px" class="d-block">Name{{$products->name}}</span>
                            <span style="display: block;margin-left:10px" class="d-block">Gift Card Number:{{$products->gift_no}}</span>
                            <span style="display: block;margin-left:10px" class="d-block">Quantity:{{$orderitem}}</span>
                            <span style="display: block;margin-left:10px" class="d-block">Sub Total:${{$order->total}}</span>

                            </div>
                        </div>

                </div>
                <div class="col-12 position-relative">
                    <p style="font-weight: bold">Total Prices: {{$order->total}}</h2>
                </div>
            </div>
        </div> --}}
    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>




