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
				<p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
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
<!-- /Breadcrumbs -->
<!-- Page Content -->

<div class="page_content_wrap page_paddings_yes ">
    <div class="content_wrap">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single">
                <section class="post_content">
                    <div class="woocommerce">

                        <form action="{{route('subscription_payment')}}" id="course-payment-form" method="POST">
                            <input type="hidden" name="first_name" value="{{$shipping['first_name']}}">
                            <input type="hidden" name="location" value="{{$shipping['location']}}">
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
                            <input type="hidden" value="{{$date}}" name="date">
                            <input type="hidden" value="{{$slot_id}}" name="slot_id">


                            <input type="hidden" value="{{$start_time}}" name="start_time">
                            <input type="hidden" value="{{$end_time}}" name="end_time">
                            <input type="hidden" value="{{$course->id}}" name="course_id">
                            <input type="hidden" value="{{$seat}}" name="seats">
                                <input type="hidden" value="{{$repeat}}" name="repeat">
                                @if($course->sale_price === null)
                                <?php $price_fix = $course->price; ?>
                            @else
                                <?php $price_fix = $course->sale_price; ?>
                            @endif

                                            <input type="hidden" value="{{$shipping['sub_total']}}" id="end_price" name="sub_total">
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
                                                                    <div class="col-sm-6 mob-0">
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


                                                <h5 id="order_review_heading text-center">Order Summary</h5>
                                                <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-name">Course Name</th>
                                                                <th class="product-total text-white">{{$course->name}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                                <td class="text-white product-name " colspan="2">Subscription Date</td>
                                                            </tr>
                                                            <tr><td>Date</td>
                                                                <td>  {{$date}}</td>
                                                          </tr>
                                                            <tr><td>Time From</td>
                                                            <td>{{date('h:i A', strtotime($start_time))}}</td></tr>
                                                            <tr><td>Time To</td>
                                                                <td>  {{date('h:i A', strtotime($end_time))}}</td>
                                                          </tr>
                                                          <tr>
                                                            <td>Price</td>
                                                            <td>

                                                              
                                                                $<span id="end_price_text">{{$shipping['sub_total']}}</span>

                                                              
                                                             

                                                               
                                                                </td>
                                                          </tr>
                                                          <tr>
                                                            <td>Seats Quantity</td>
                                                            <td>
                                                               {{$seat}}
                                                                </td>
                                                          </tr>
                                                          <input type="hidden" value="{{json_encode($seat_names)}}" name="seat_names">
                                                          <td class="text-white product-name " colspan="2">Seats Names</td>
                                                          @foreach (json_decode($seat_names) as $key=>$name)
                                                          <tr>
                                                            <td>Seat No : {{$key}}</td>
                                                            <td>{{$name}}</td>
                                                          </tr>
                                                          @endforeach




                                                        </tbody>

                                                    </table>

                                                    <table class="w-100">
                                                        <tr>

                                                            <td>Enter PromoCode</td>
                                                            <input type="hidden" name="promocode_val" id="promocode_val">
                                                            <td><input type="text" class="form-control bg-white py-2" style="height: 40px;" id="promocode"></td>
                                                            <td><a class="rounded-3 bg-success" style="padding:10px 20px!important;cursor: pointer;" onclick="getPromo()">Apply</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter GiftCard</td>
                                                            <td><input type="text" class="form-control bg-white py-2" style="height: 40px;"  id="gift_card"></td>
                                                            <td><a class="rounded-3 bg-success" style="padding:10px 20px!important;cursor: pointer;" onclick="getDiscount()">Apply</a></td>
                                                        </tr>
                                                    </table>

                                                    <div id="payment" class="woocommerce-checkout-payment">



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
</div>
<form id="confirm" method="POST" action="{{route('subscription-confirmation')}}" style="display: none;">
    @csrf
<input type="text" value="" name="order_id" id="response_order">
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

$(document).ready(function() {

        // Intercept form submission
        $('#course-payment-form').submit(function(event) {
            // Prevent default form submission
            event.preventDefault();
            $('#preloader').show();

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: "{{ route('subscription_payment') }}", // Your form action URL
                type: "POST",
                data: formData,

                success: function(response) {
                    $('#preloader').hide();

                    // Handle success response

                    if(response.status===200){

                        let order_ids = "{{$course->id}}";
            let order_amount = $("#final_price").val();
            console.log(order_ids);
            console.log(order_amount);
            fbq('track', 'Purchase', {
                content_ids: order_ids,
                value: order_amount,
                currency: 'USD',
                content_type: 'Course'
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
