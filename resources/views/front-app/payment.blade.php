@extends('front-app.layout.template')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<style>
    .exp-wrapper {
  position: relative;
  border: 1px solid #aaa;
  display: flex;
  width: 100%;
  justify-content: space-around;
  height:57px;
  line-height: 36px;
  font-size: 24px;
  background: white;
  border-radius: 10px;
}

.exp-wrapper:after {
  content: '/';
  position: absolute;
  left: 50%;
  margin-left: -4px;
  margin-top: 5px;
  color: #aaa;
  font-size: 30px;
}

input.exp {
  float: left;
  font-family: monospace;
  border: 0;
  width: 90px;
  outline: none;
  appearance: none;
  font-size: 14px;
  background: white!important;
  color:#728080;
}#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    z-index: 9999;
    display: none; /* Initially hidden */
}

#loader {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 8px solid #f3f3f3; /* Light grey */
    border-top: 8px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite; /* Animation to spin the loader */
}

.modal-confirm {
	color: #636363;
	width: 325px;
	font-size: 14px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
}
.modal-confirm .modal-header {
	border-bottom: none;
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -15px;
}
.modal-confirm .form-control, .modal-confirm .btn {
	min-height: 40px;
	border-radius: 3px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -5px;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;
	border-radius: 5px;
	font-size: 13px;
}
.modal-confirm .icon-box {
	color: #fff;
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -70px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #82ce34;
	padding: 15px;
	text-align: center;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-confirm .icon-box i {
	font-size: 58px;
	position: relative;
	top: 3px;
}
.modal-confirm.modal-dialog {
	margin-top: 80px;
}
.modal-confirm .btn {
	color: #fff;
	border-radius: 4px;
	background: #82ce34;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
	background: #6fb32b;
	outline: none;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<div id="preloader">
    <div id="loader"></div>
</div>

<div  class="modal fade " id="successmodal">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<h4 class="modal-title w-100 text-success">Payment Successfull</h4>
			</div>
			<div class="modal-body">
				<p class="text-center">Your Order has been booked successfully</p>
			</div>


		</div>
	</div>
</div>
<div  class="modal fade " id="errormodal">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box bg-danger">
					<i class="material-icons">clear</i>
				</div>
				<h4 class="modal-title w-100 text-danger">Payment Decleared</h4>
			</div>
			<div class="modal-body">
				<p class="text-center">Please Enter Correct Card Detail</p>
			</div>
            <div class="modal-footer">
				<button class="btn btn-danger bg-danger" data-dismiss="modal" data-bs-dismiss="modal">Continue</button>
			</div>
		</div>
	</div>
</div>
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner ">
        <div class="content_wrap">
            <h1 class="page_title "><span  style="color:#728080;">SHIPPING ADDRESS </span> /<span class="text-primary" > Payment </span>/<span style="color:#728080;"> Confirmation</span></h1>
            <div class="breadcrumbs ">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <a class="breadcrumbs_item all" href="{{route('shop')}}">Shop</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Checkout</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_yes ">
    <div class="content_wrap">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single">
                <section class="post_content">
                    <div class="woocommerce">

                        <form id="shop-payment-form" method="POST">
                            <input type="hidden" name="first_name" value="{{$shipping['first_name']}}">
                            <input type="hidden" name="last_name" value="{{$shipping['last_name']}}">
                            <input type="hidden" name="company_name" value="{{$shipping['company_name']}}">
                            <input type="hidden" name="country" value="{{$shipping['country']}}">
                            <input type="hidden" name="address" value="{{$shipping['address']}}">
                            <input type="hidden" name="address_2" value="{{$shipping['address_2']}}">
                            <input type="hidden" name="city" value="{{$shipping['city']}}">
                            <input type="hidden" name="state" value="{{$shipping['state']}}">
                            <input type="hidden" name="postal_code" value="{{$shipping['postal_code']}}">
                            <input type="hidden" name="phone" value="{{$shipping['phone']}}">
                            <input type="hidden" name="email" value="{{$shipping['email']}}">
                            @csrf
                            <div class="col2-set" id="customer_details">
                                <!-- Billing Details -->
                               <div class="col-1">
                                <div class="woocommerce-additional-fields">

                                    <div class="woocommerce-additional-fields__field-wrapper">
                                    <p class="form-row notes" id="order_comments_field" data-priority="">

                                        <h5 for="order_comments" class=""> Pay With Card</h5>
                                            <div class="    ">
                                                {{-- <img src="{{asset('assets/bankful.png')}}" class="w-25" alt=""> --}}
                                                <div class=" ">
                                                    <div class="container-fluid">
                                                        <article class="card bg-dark">
                                                            <div class="card-body p-5">

                                                            <ul class="nav bg-dark nav-pills rounded nav-fill " role="tablist">
                                                                <li class="nav-item " style="background: #8A0103;">
                                                                    <a class="nav-link " data-toggle="pill" href="#nav-tab-card">
                                                                    <i class="fa fa-credit-card"></i> Bankful</a></li>
                                                                <li class="nav-item bg-secondary">
                                                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                                                    <i class="fab fa-paypal"></i>  Credova</a></li>
                                                                <li class="nav-item bg-secondary">
                                                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                                                    <i class="fa fa-university"></i>  Sezzle</a></li>
                                                            </ul>

                                                            <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="nav-tab-card">
                                                                <p class="text-white">This option is to pay with all major credit cards</p>

                                                                <div class="form-group">
                                                                    <label for="username" class="text-white">Full name (on the card)</label>
                                                                    <input type="text" class="form-control bg-white" name="cardname" placeholder="" required="">
                                                                </div> <!-- form-group.// -->

                                                                <div class="form-group">
                                                                    <label for="cardNumber" class="text-white">Card number</label>
                                                                    <div class="input-group">
                                                                        <input type="number" required class="form-control bg-white" name="cardnumber" placeholder="">
                                                                        <div class="input-group-append" style="    border: 1px solid #D4D4D4;
                                                                        padding: 6px;
                                                                        border-radius: 0px;">
                                                                            <span class="input-group-text text-muted">
                                                                                <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>
                                                                                <i class="fab fa-cc-mastercard"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- form-group.// -->

                                                                <div class="row ">
                                                                    <div class="col-sm-6 p-0">
                                                                        <div class="form-group">
                                                                            <label><span class="hidden-xs text-white" >Expiration</span> </label>
                                                                            <div class="exp-wrapper">
                                                                                <input autocomplete="off" name="expire_month" class="exp border-0" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="MM" type="text" data-pattern-validate />
                                                                                <input autocomplete="off" name="expire_year" class="exp border-0" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="YY" type="text" data-pattern-validate />
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="text-white" data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                                                            <input type="number" name="cvv" class="form-control bg-white" required="">
                                                                        </div> <!-- form-group.// -->
                                                                    </div>
                                                                </div> <!-- row.// -->
                                                                <button type="submit" class="px-5 mt-3 rounded-3">Submit</button>
                                                            </div> <!-- tab-pane.// -->





                                                            <div class="tab-pane fade" id="nav-tab-paypal">
                                                            <p>Paypal is easiest way to pay online</p>
                                                            <p>
                                                            <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                                                            </p>
                                                            <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-tab-bank">
                                                            <p>Bank accaunt details</p>
                                                            <dl class="param">
                                                              <dt>BANK: </dt>
                                                              <dd> THE WORLD BANK</dd>
                                                            </dl>
                                                            <dl class="param">
                                                              <dt>Accaunt number: </dt>
                                                              <dd> 12345678912345</dd>
                                                            </dl>
                                                            <dl class="param">
                                                              <dt>IBAN: </dt>
                                                              <dd> 123456789</dd>
                                                            </dl>
                                                            <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                                            </div> <!-- tab-pane.// -->
                                                            </div> <!-- tab-content .// -->

                                                            </div> <!-- card-body.// -->
                                                            </article> <!-- card.// -->

                                                            </aside> <!-- col.// -->

                                                            </div> <!-- row.// -->

                                                            </div>
                                                            <!--container end.//-->

                                                            <br><br>

                                                </div>
                                                </div>
                                            </div>
                               </div>
                                <!-- /Billing Details -->
                                <!-- Additional Information -->
                                <div class="col-2">
                                    <div class="woocommerce-shipping-fields">
                                    </div>


                                                <h5 id="order_review_heading">Order Summary</h5>
                                                <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-name">Product</th>
                                                                <th class="product-total text-white">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($data as $item)
                                                            <tr class="cart_item">
                                                                <td class="product-name">
                                                                   {{$item->products->name}}
                                                                    <strong class="product-quantity">&times; {{$item->quantity}}</strong>
                                                                </td>
                                                                <td class="product-total">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">&#36;</span>@php  echo    $item->sub_total @endphp
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @empty

                                                            @endforelse


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th class="text-white">Sales Tax ({{$shipping_taxes->sales_tax}}%)</th>
                                                                <td class="text-white">
                                                                    @php
                                                                    $total_price=0;
                                                                    foreach ($data as $key => $item) {
                                                                        $total_price +=$item->sub_total;
                                                                    }
                                                                    $sales_tax_percentage = floatval($shipping_taxes->sales_tax); // Convert to float
                                                                    $sales_tax = $total_price * ($sales_tax_percentage / 100);
                                                                        $total_price_with_tax = $total_price + $sales_tax; // Add sales tax to total price


                                                                @endphp
                                                                  ${{ number_format($sales_tax, 2) }}
                                                                  <input type="hidden" value="${{number_format($sales_tax, 2)}}" name="sales_tax">
                                                                </td>
                                                            </tr>

                                                            <tr class="cart-subtotal">
                                                                <th class="text-white">Subtotal</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount text-white">
                                                                        @php
                                                                            $total_price=0;
                                                                            $ids=[];
                                                                            foreach ($data as $key => $item) {
                                                                               $ids[]=$item->product_id;
                                                                                $total_price +=$item->quantity*$item->sub_total;
                                                                            }
                                                                            $all_ids=json_encode($ids);


                                                                        @endphp

                                                                        <span class="woocommerce-Price-currencySymbol text-white">&#36;</span>{{$total_price_with_tax}}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <input type="hidden" value="{{$shipping['shipping']}}" name="pickup">
                                                                <th class="text-white">Shipping and handling</th>
                                                                @php
                                                                    $shipping_value=$shipping['shipping'] === "delivery" ? $shipping_taxes->shipping_price : 0;
                                                                @endphp
                                                                <td class="text-white">${{$shipping_value}}</td>
                                                            </tr>
                                                            <tr class="order-total text-white">
                                                                <th class="text-white" id="total_head">Total</th>
                                                                <td>
                                                                    <strong>
                                                                        <span class="woocommerce-Price-amount amount text-white">
                                                                            <span class="woocommerce-Price-currencySymbol text-white" >&#36;</span><span id="end_price_text">{{$total_price_with_tax + $shipping_value}}</span>
                                                                            <input type="hidden" name="sub_total" id="end_price" value="{{$total_price_with_tax + $shipping_value}}">
                                                                        </span>
                                                                    </strong>
                                                                </td>
                                                            </tr>

                                                        </tfoot>
                                                    </table>
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-name" colspan="3">Other</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>

                                                            <td>Enter PromoCode</td>
                                                            <input type="hidden" name="promocode_val" id="promocode_val">
                                                            <td><input type="text" class="form-control bg-white py-2" style="height: 40px;" id="promocode"></td>
                                                            <td><a class="rounded-3 bg-success" style="padding:10px 20px!important;cursor: pointer;" onclick="getPromo()">Apply</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Apply GiftCard</td>
                                                            <td><input type="text" class="form-control bg-white py-2" style="height: 40px;"  id="gift_card"></td>
                                                            <td><a class="rounded-3 bg-success" style="padding:10px 20px!important;cursor: pointer;" onclick="getDiscount()">Apply</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    {{-- <span>3.4 %fee for using sezzle and credova</span> --}}
                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        {{-- <ul class="wc_payment_methods payment_methods methods">
                                                            <li class="woocommerce-notice woocommerce-notice--info woocommerce-info">Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.</li>
                                                        </ul> --}}

                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /Additional Information -->
                            </div>

                            <!-- Your Order -->

                        </form>
                    </div>
                </section>
            </article>
        </div>
        <!-- /Content -->
    </div>
    <form id="confirm" method="POST" action="{{route('order-confirmation')}}" style="display: none;">
        @csrf
    <input type="hidden" value="" name="order_id" id="response_order">
    <input type="hidden" value="${{number_format($sales_tax, 2)}}" name="sales_tax">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {

// Intercept form submission
$('#shop-payment-form').submit(function(event) {
    // Prevent default form submission
    event.preventDefault();
    $('#preloader').show();

    // Serialize form data
    var formData = $(this).serialize();

    // Send AJAX request
    $.ajax({
        url: "{{route('order-submit')}}", // Your form action URL
        type: "POST",
        data: formData,

        success: function(response) {
            $('#preloader').hide();

            // Handle success response

            if(response.status===200){

            let order_ids = "{{$all_ids}}";
            let order_amount = $("#end_price").val();
            console.log(order_ids);
            console.log(order_amount);
            fbq('track', 'Purchase', {
                content_ids: order_ids,
                value: order_amount,
                currency: 'USD',
                content_type: 'Product'
            });
                $('#successmodal').modal('show');

        // Hide success message after 5 seconds
        setTimeout(function() {
            $('#successmodal').modal('hide');
            $("#response_order").val(response.order_id);
            $("#confirm").submit();
        }, 2000);


}
else{

$('#errormodal').modal('show');

// Hide success message after 5 seconds
setTimeout(function() {
$('#errormodal').modal('hide');
}, 5000);
}




            // You can perform any further actions here, like showing a success message
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
            // You can show an error message to the user
        }
    });
});
});

const monthInput = document.querySelector('#month');
const yearInput = document.querySelector('#year');

const focusSibling = function(target, direction, callback) {
  const nextTarget = target[direction];
  nextTarget && nextTarget.focus();
  // if callback is supplied we return the sibling target which has focus
  callback && callback(nextTarget);
}

// input event only fires if there is space in the input for entry.
// If an input of x length has x characters, keyboard press will not fire this input event.
monthInput.addEventListener('input', (event) => {

  const value = event.target.value.toString();
  // adds 0 to month user input like 9 -> 09
  if (value.length === 1 && value > 1) {
      event.target.value = "0" + value;
  }
  // bounds
  if (value === "00") {
      event.target.value = "01";
  } else if (value > 12) {
      event.target.value = "12";
  }
  // if we have a filled input we jump to the year input
  2 <= event.target.value.length && focusSibling(event.target, "nextElementSibling");
  event.stopImmediatePropagation();
});

yearInput.addEventListener('keydown', (event) => {
  // if the year is empty jump to the month input
  if (event.key === "Backspace" && event.target.selectionStart === 0) {
    focusSibling(event.target, "previousElementSibling");
    event.stopImmediatePropagation();
  }
});

const inputMatchesPattern = function(e) {
  const {
    value,
    selectionStart,
    selectionEnd,
    pattern
  } = e.target;

  const character = String.fromCharCode(e.which);
  const proposedEntry = value.slice(0, selectionStart) + character + value.slice(selectionEnd);
  const match = proposedEntry.match(pattern);

  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    match && match["0"] === match.input; // pattern regex isMatch - workaround for passing [0-9]* into RegExp
};

document.querySelectorAll('input[data-pattern-validate]').forEach(el => el.addEventListener('keypress', e => {
  if (!inputMatchesPattern(e)) {
    return e.preventDefault();
  }
}));

let discountApplied = false;

function applyDiscount(discountData) {
    let value = parseFloat($("#end_price").val());

    if (discountData.success===true && !discountApplied) {

        alert(discountData.discount+"% Discount Added");
        let discountPercentage = parseFloat(discountData.discount);
        let discountValue = (value * discountPercentage) / 100;
        let discountedPrice = value - discountValue;
        let roundedPrice = discountedPrice.toFixed(2);

// Display the rounded price in #end_price input field
$("#end_price").val(roundedPrice);
// Display the rounded price in #end_price_text as text content
$("#end_price_text").text(roundedPrice);
$("#total_head").text(discountData.discount+"% Discount In Total")


        discountApplied = true;
    }
    else if(discountData.success ===false){
        alert("Wrong Card Details");

    }
    else
    {

        alert("Discount Already Applied");
    }
}

function getDiscount() {
    let giftcard = $("#gift_card").val();

    $.ajax({
        url: '{{ route('card-discount') }}',
        method: 'POST',
        data: { giftcard: giftcard },
        success: function(discountData) {
            console.log('Discount received:', discountData);
            applyDiscount(discountData);
        },
        error: function(xhr, status, error) {
            console.error('Failed to get discount. Status:', status, 'Error:', error);
        }
    });
}

let discountpromo = false;
function applypromocode(discountData) {
    let value = parseFloat($("#end_price").val());

    if (discountData.success===true && !discountpromo) {
        $("#promocode_val").val(discountData.discount);
        let discountPercentage = parseFloat(discountData.discount);
        let discountValue = (value * discountPercentage) / 100;
        let discountedPrice = value - discountValue;
        let roundedPrice = discountedPrice.toFixed(2);

// Display the rounded price in #end_price input field
$("#end_price").val(roundedPrice);
// Display the rounded price in #end_price_text as text content
$("#end_price_text").text(roundedPrice);
$("#total_head").text(discountData.discount+"% Discount In Total")


discountpromo = true;
    }
    else if(discountData.success ===false){
        alert(discountData.message);

    }
    else
    {

        alert("Discount Already Applied");
    }
}

function getPromo(){
    let promocode = $("#promocode").val();

$.ajax({
    url: '{{ route('promo-discount') }}',
    method: 'POST',
    data: { promocode: promocode },
    success: function(discountData) {
        console.log('Discount received:', discountData);
        applypromocode(discountData);
    },
    error: function(xhr, status, error) {
        console.error('Failed to get discount. Status:', status, 'Error:', error);
    }
});
}

</script>
@endsection
