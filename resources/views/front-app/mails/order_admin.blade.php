


{{-- New Order Template --}}



<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Order Placed</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */

  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
   body{
    font-family: 'Roboto', sans-serif;
   }
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }

  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;

  }

  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }

  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }

  /**
   * Fix centering issues in Android 4.4.
   */
  /* div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  } */



  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }

  a {
    color: #1a82e2;
  }

  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }

  </style>

</head>


<body style="background-color: #ececec;margin:0;padding:0">

<div style="width:650px;margin:auto; background-color:#ececec;height:50px;">

</div>
<div style="width:650px;margin:auto; background-color:white;margin-top:100px;
            padding-top:40px;padding-bottom:40px;border-radius: 3px;">
    <table style="background-color: rgb(255, 255, 255);width: 90%;margin:auto;height:72px; border-bottom:1px ridge;">
        <tbody>
            <tr>
                <td>
                    <h2>Hi , Admin | {{$order->first_name}} Has Placed Order</h2>
                    <h3 style="color:green;">Your order ID : {{$order->id}}</h3>
                </td>
                <td>
                    <div style="text-align: right; margin-right:15px;">

                        <img style="max-width:250px;border:0;" src="https://www.vatactical.com/assets/logo.webp" title=""
                            class="sitelogo" width="30%"  alt=""/>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>



    <?php
        $subtotal=0;
        $total=0;
        $sub_total=0;
        $total_tax=0;
        $total_shipping_cost=0;
        $total_discount_on_product=0;
        $total_price_product=0;
        $total_sale_price=0;
        $extra_discount=0;
    ?>
   <div style="background-color: rgb(248, 248, 248); width: 90%;margin:auto;margin-top:30px;">
    <div style="padding:20px;">
        <table style="width: 100%; ">
            <tbody style="">
                {{-- <div style="margin-top:100px;"> --}}
                    <tr style="border-bottom: 1px ridge;text-transform: capitalize;">
                        <th style="padding-bottom: 8px;width:10%;">S.No</th>
                        <th style="padding-bottom: 8px;width:40%;" colspan="2">Ordered_Items</th>
                        <th style="padding-bottom: 8px;width:15%">Price</th>
                        <th style="padding-bottom: 8px;width:15%">Sale Price</th>
                        <th style="padding-bottom: 8px;width:15%;">QTY</th>
                        <th style="padding-bottom: 8px;width:20%;">Total</th>
                    </tr>
                    @foreach ($products as $key=>$details)
                    @php
                        $total_sale_price += $details->products->sale_price;
                        $total_price_product +=$details->products->price;
                    @endphp
                        <tr style="text-align: center;">

                            <td style="padding:5px;">{{$key+1}}</td>
                            <td>
                                <img style="width: 30px;height:30px;object-fit:cover;" src="{{asset('assets/featured_images/'.$details->products->img)}}" >
                            </td>
                            <td style="padding:5px;">
                              <span style="font-size: 14px;text-align:left!important;">
                                {{Str::limit($details->products->name,55)}}
                              </span>




                            </td>
                            <td style="padding:5px;">${{$details['products']->price}}</td>
                            <td>${{$details['products']->sale_price}}</td>
                            <td style="padding:5px;">{{$details->quantity}}</td>
                            <td style="padding:5px;">${{$details->sub_total}}</td>
                        </tr>
                        @php
                             $sub_total+=$details->sub_total;
                        @endphp

                    @endforeach
                    @php

                    $total_discount_on_product= $total_price_product - $total_sale_price  ;
                @endphp
                {{-- </div> --}}
            </tbody>
        </table>
    </div>
</div>

    <table style="background-color: rgb(255, 255, 255);width: 90%;margin:auto;margin-top:30px;">
        <tr>
            <th style="text-align: left; vertical-align: auto;">

            </th>

            <td style="text-align: right">
                <table style="width: 46%;margin-left:41%; display: inline;text-transform: capitalize; ">
                    <tbody>
                        <tr>
                            <th><b>sub_total </b></th>
                            <td> ${{$sub_total}}</td>

                        </tr>

                    <tr>
                        <td>Sales tax:</td>
                        <td>{{$sales_tax}}</td>
                    </tr>
                    <tr>
                        <td>Shipping tax:</td>
                        <td>${{$order->pickup === "instore" ? '0' : $shipping->shipping_price}}</td>
                    </tr>



                    <tr class="border-bottom">
                        <td>You have saved: </td>
                        <td>
                          ${{$total_discount_on_product}}</td>
                    </tr>


                    <tr>
                        <td  >Promocode Discount : </td>
                        <td>
                            {{$order->promocode ? $order->promocode : '0'}}%</td>
                    </tr>
                    <tr>
                        <td>Gift Card Discount:</td>
                        <td>0%</td>
                    </tr>


                    <tr class="bg-primary">
                        <th class="text-left"><b class="text-white">total: </b></th>
                        <td class="text-white">
                            ${{$order->total}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <table style="background-color: rgb(255, 255, 255);width: 90%;margin:auto;margin-top:30px;">
        <tbody style="">

                <tr style="">
                    <td>You can track your order by clicking the below button</td>
                </tr>
                <tr>
                    <td>
                      <?php

                            $user_phone = $order->phone_no;

                      ?>

                          <div style="margin-top: 50px; margin-bottom:30px">
                            <a href="{{route('track-order')}}" style="background-color: #8A0103; padding:20px;border:none;
                              margin-top:20px;color:aliceblue;border-radius: 3px; font-size:18px;text-decoration: none; text-transform: capitalize;">
                              Track Your Order
                            </a>
                          </div>
                    </td>
                </tr>

        </tbody>
    </table>

</div>

<div style="padding:5px;width:650px;margin:auto;margin-top:5px; margin-bottom:50px;">

    <table style="margin:auto;width:90%; color:#777777;">
        <tbody>
            <tr>
                <th style="text-align: left;">
                    <h1>
                       Virginia Tactical Shooting Academy
                    </h1>
                </th>
            </tr>
            <tr>

                <th style="text-align: left;">
                    <div>Phone: 0831294821</div>
                    <div>Website: {{ url('/') }}</div>
                    <div>Email: vatactical@gmail.com</div>
                </th>


            </tr>
            {{-- <tr>
                @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())

                @if(isset($social_media))
                    <th style="text-align: left; padding-top:20px;">
                        <div style="width: 100%;display: flex;
                        justify-content: flex-start;">
                          @foreach ($social_media as $item)

                            <div class="" >
                              <a href="{{$item->link}}" target=”_blank”>
                              <img src="{{asset('public/assets/back-end/img/'.$item->name.'.png')}}" alt="" style="height: 50px; width:50px; margin:10px;">
                              </a>
                            </div>

                          @endforeach
                        </div>
                    </th>
                @endif
            </tr> --}}
        </tbody>
    </table>
</div>

</body>
</html>
