@extends('front-app.layout.template')
@section('content')

<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner ">
        <div class="content_wrap">
            <h1 class="page_title">Checkout</h1>
            <div class="breadcrumbs">
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

                        <form action="{{route('payment-gift',['slug'=>$data->slug])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col2-set" id="customer_details">
                                <!-- Billing Details -->
                                <div class="col-1">
                                    <div class="">
                                        <h5>Billing details</h5>
                                        <div class="woocommerce-billing-fields__field-wrapper">
                                            <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                                                <label for="billing_first_name" class="">First name
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " name="first_name" id="billing_first_name" placeholder="" value="{{ old('first_name') }}" autofocus="autofocus" />
                                                @error('first_name')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>

                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label for="billing_last_name" class="">Last name
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text"  class="input-text " name="last_name" id="billing_last_name"  value="{{ old('last_name') }}" placeholder="" value="" />
                                            </p>
                                            <p class="form-row form-row-wide" id="billing_company_field">
                                                <label for="billing_company" class="">Company name</label>
                                                <input type="text" class="input-text " name="company_name" id="billing_company" value="{{ old('billing_name') }}" placeholder="" value="" />
                                            </p>
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field">
                                                <label for="billing_country" class="" >Country
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <select name="country" id="billing_country" class="border ">
                                                    <option value="">Select a country&hellip;</option>
                                                    <option value="AX">&#197;land Islands</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="PW">Belau</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo (Brazzaville)</option>
                                                    <option value="CD">Congo (Kinshasa)</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Cura&ccedil;ao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="CI">Ivory Coast</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao S.A.R., China</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia</option>
                                                    <option value="MD">Moldova</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="KP">North Korea</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PS">Palestinian Territory</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Reunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russia</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                                    <option value="BL">Saint Barth&eacute;lemy</option>
                                                    <option value="SH">Saint Helena</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="SX">Saint Martin (Dutch part)</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syria</option>
                                                    <option value="TW">Taiwan</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB" >United Kingdom (UK)</option>
                                                    <option value="US">United States (US)</option>
                                                    <option value="UM">United States (US) Minor Outlying Islands</option>
                                                    <option value="VI" selected='selected'>United States (US) Virgin Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VA">Vatican</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                                @error('country')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                                <label for="billing_address_1" class="">Address
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " value="{{ old('address') }}" name="address" id="billing_address_1" placeholder="Street address" value="" />
                                                @error('address')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
                                                <input type="text" class="input-text " value="{{ old('address_2') }}" name="address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="" />
                                            </p>
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
                                                <label for="billing_city" class="">Town / City
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text" value="{{ old('city') }}" name="city" id="billing_city" placeholder="" value="" />
                                                @error('city')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <p class="form-row form-row-wide address-field validate-validate-state" id="billing_state_field">
                                                <label for="billing_state" class="">State / County
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input  type="text" class="input-text " value="{{ old('state') }}" placeholder="" name="state" id="billing_state"  />
                                                @error('state')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <p class="form-row form-row-wide address-field validate-validate-postcode" id="billing_postcode_field">
                                                <label for="billing_postcode" class="">Postcode / ZIP
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " name="postal_code" id="billing_postcode" placeholder="" value="{{ old('postal_code') }}" />
                                                @error('postal_code')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <p class="form-row form-row-first validate-validate-phone" id="billing_phone_field">
                                                <label for="billing_phone" class="">Phone
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="tel" class="input-text w-100" name="phone" id="billing_phone" style="background:#121215;color:#787678;"  placeholder="" value="{{ old('phone') }}" />
                                                @error('phone')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <p class="form-row form-row-last validate-validate-email" id="billing_email_field" >
                                                <label for="billing_email" class="">Email address
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="email" class="input-text " name="email" id="billing_email" placeholder="" value="{{ old('email') }}"/>
                                                @error('email')
                                                <label class="text-danger">{{$message}}</label>
                                            @enderror
                                            </p>
                                            <div class="form-row place-order">
                                                <button type="submit" class="rounded-3 mt-3 px-5">Submit</button>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Billing Details -->
                                <!-- Additional Information -->
                                <div class="col-2">
                                    <div class="woocommerce-shipping-fields">
                                    </div>

                                    <div class="woocommerce-additional-fields">
                                        <h5>Enter Membership Information</h5>
                                    </div>
                                    @if($variation !== null)

                                    <div
                                        class="table-responsive"
                                    >
                                        <table
                                            class="shop_table woocommerce-checkout-review-order-table"
                                        >
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name <span class="text-danger">*</span></th>
                                                    <th scope="col">Img <span class="text-danger">*</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" value="{{$variation->id}}" name="variation_id">
                                                @for ($i =0 ; $i < $variation['members'] ; $i++)
                                                <tr class="">
                                                    <td scope="row"><input type="text" class="form-control" required placeholder="Enter Name" name="member_name[]">
                                                    </td>
                                                    <td><input type="file" class="form-control" required placeholder="Enter Name" name="images[]"></td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="woocommerce-additional-fields">
                                        <h5>Order Summary</h5>
                                    </div>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total text-white">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tfoot>
                                                    <tr >
                                                        <th class="text-white">Membership Card Price</th>
                                                        <td class="product-total">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol text-white">
                                                                  {{$variation->price}}
                                                            </span>
                                                               <input type="hidden" name="sub_total" id="end_price" value="{{$variation->price}}">
                                                        </td>
                                                    </tr>
                                                <tr >
                                                    <th class="text-white">Quantity</th>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol text-white">@php  echo    $variation->members @endphp
                                                        </span>
                                                    </td>
                                                </tr>





                                            </tbody>





                                            </tfoot>
                                        </table>

                                        {{-- <span>3.4 %fee for using sezzle and credova</span> --}}

                                    </div>
                            </div>
                        </div>

                                    @else
                                    <div class="woocommerce-additional-fields">
                                        <h5>Order Summary</h5>
                                    </div>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-name">Product</th>
                                                                <th class="product-total text-white">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tfoot>
                                                                <tr >
                                                                    <th class="text-white">Membership Price</th>
                                                                    <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol text-white">
                                                                               $@if ($data->sale_price === null)
                                                                                {{$data->price  }}
                                                                                @else
                                                                                {{$data->sale_price }}
                                                                                @endif
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                           





                                                        </tbody>

                                                            <tr>
                                                                <th class="text-white">Sales Tax(5.4%)</th>
                                                                <td class="text-white">
                                                                    @php
                                                                    $price = ($data->sale_price === null) ? ($data->price * $quantity) : ($data->sale_price * $quantity);
                                                                    $tax = $price * (5.4 / 100);
                                                                    $totalPrice = $price + $tax;
                                                                @endphp


                                                               {{$tax}}


                                                                </td>
                                                            </tr>

                                                            <tr class="cart-subtotal">
                                                                <th class="text-white">Subtotal</th>
                                                                <td>
                                                                    <span class="woocommerce-Price-amount amount text-white">


                                                                        <span class="woocommerce-Price-currencySymbol text-white">&#36;</span>
                                                                        @if ($data->sale_price === null)
                                                                        {{$tax +$data->price * $quantity  }}
                                                                        @else
                                                                        {{$tax + $data->sale_price * $quantity }}
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr class="order-total text-white">
                                                                <th class="text-white" id="total_head">Total</th>
                                                                <td>
                                                                    <strong>
                                                                        <span class="woocommerce-Price-amount amount text-white">
                                                                            <span class="woocommerce-Price-currencySymbol text-white" >&#36;</span><span id="end_price_text"> @if ($data->sale_price === null)
                                                                                {{$tax +$data->price * $quantity  }}
                                                                                @else
                                                                                {{$tax + $data->sale_price * $quantity }}
                                                                                @endif</span>
                                                                            <input type="hidden" name="sub_total" id="end_price" value="@if($data->sale_price === null)
                                                                            {{$tax +$data->price * $quantity  }}
                                                                            @else
                                                                            {{$tax + $data->sale_price * $quantity }}
                                                                            @endif">
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

                                                        {{-- <tr>
                                                            <td>Enter Gift Card</td>
                                                            <td><input type="text" class="form-control bg-white py-2" style="height: 40px;"  id="gift_card"></td>
                                                            <td><a class="rounded-3 bg-success" style="padding:10px 20px!important;cursor: pointer;" onclick="getDiscount()">Get Discount</a></td>
                                                        </tr> --}}
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
                                    @endif
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
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
