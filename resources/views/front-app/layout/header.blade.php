@php
if (Auth::check()) {
    $user=Auth::user();
$cart=App\Models\Cart::where('user_id',$user->id)->count();
$fav=App\Models\Favourite::where('user_id',$user->id)->count();
$cartdata=App\Models\Cart::with('products')->where('user_id',$user->id)->get();
}
$generalSetting=App\Models\SettingModel::where('id',1)->first();
$gift_items=App\Models\GiftCard::where('navbar',1)->get();



@endphp
<style>
.mob-hide{
    display:none;
}

@media(max-width:768px){
    .mob-hide{
    display:block;
}
.desktop-hide{
    display:none;
}
.more-item:hover .fa-sort-down {
    transform: rotate(180deg);
    transition: transform 0.3s ease; /* Optional: Add a smooth transition */
}

}
</style>
<header class="top_panel_wrap top_panel_style_1 scheme_original desktop-hide" >
<div class="top_panel_wrap_inner top_panel_inner_style_1 top_panel_position_above" >
    <!-- Top panel 1 -->
    <div class="top_panel_middle"  >
        <div class="row py-2 container-fluid">
            <div class="col-2" ><img src="{{asset('assets/'.$generalSetting->logo)}}" class="bg-white rounded-circle border" width="80px;" alt=""></div>
            <div class="col-2 d-flex align-items-center text-primary"><i class="fa-solid fa-phone fs-3 mt-2 me-2" ></i>
                <div><small ><a href="tel:{{$generalSetting->phone_no}}">{{ $generalSetting->phone_no }}</a></small>
                <small  style="display: block;margin-top:-6px;"><a href="mailto:support@vatactical.com" >{{ $generalSetting->email }}</a></small></div></div>
            <div class="col-2 d-flex align-items-center position-relative ">   <a href="{{route('favourites')}}" ><i class="fa-solid fa-heart fs-2 me-2 text-primary" ></i>


                @if (Auth::check())
                <span class="cart_item fw-bold rounded-3 position-absolute top-0 p-2"  style="left:48px;"> {{$fav}}</span>
                    @else
                <span class="cart_item text-dark fw-bold"></span>
                @endif
                <small >Favorites</small>
            </a>
        </div>


           <div class="col-2 d-flex align-items-center position-relative ">
            <a href="{{route('show_cart')}}" ><i class="fa-solid fa-cart-shopping fs-3 mt-2 me-2 text-primary"></i>


                @if (Auth::check())
                <span class="cart_item fw-bold rounded-3 position-absolute top-0 p-2"  style="left:50px">{{$cart}}</span>
                    @else
                <span class="cart_item text-dark fw-bold"></span>
                @endif
                <span><small>Your Cart</small></span>

            </a>
        </div>

        <div class="col-2 d-flex align-items-center fw-bold">
            <i class="fa-solid fa-truck-fast fs-3 mt-2 me-2 text-primary"></i>
          <a href="{{route('track-order')}}" class=" mt-3"><small>Track Order</small></a>
        </div>
        <div class="col-2 d-flex align-items-center fw-bold ">
            <div class="dropdown">

                <i class="fas fa-user fs-3 mt-2 me-2 text-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false"  ><small  style="font-size:14px;font-family: 'Roboto';">@if (Auth::check())
                @php
                    $user=Auth::user();
                @endphp
                <small for="" class="text-white">{{$user->name}}</small>
                @else
               <small class="text-white"><a href="#"> Account</a></small>
                @endif</small></i>
                <ul class="dropdown-menu">
                @if (Auth::check())
                @if ($user->role==='admin')
                    <li><a class="dropdown-item text-dark" href="{{route('dashboard')}}">Dashboard</a></li>
                @else
                <li><a class="dropdown-item text-dark" href="{{route('CustomerDashboard')}}">Dashboard</a></li>
                @endif
                  <li><a class="dropdown-item text-dark" href="{{route('logout')}}">Logout</a></li>
                @else
                <li><a class="dropdown-item text-dark" href="{{route('login')}}">Login</a></li>
                <li><a class="dropdown-item text-dark" href="{{route('register')}}">Register</a></li>
                @endif
                </ul>
              </div>
          </div>

        </div>

        {{-- <div class="content_wrap">
            <div class="columns_wrap columns_fluid">
                <!-- Logo -->
                <div class="column-2_5 contact_logo">
                   <a href="{{route('home')}}"> <img src="{{asset('assets/logo.webp')}}" style="width: 25%!important;" alt=""></a>
                </div>

                <div class="column-1_5 contact_field contact_address">
                    <span class="contact_icon icon-iconmonstr-phone-2-icon"></span>
                    <span class="contact_label contact_address_1"><a href="tel:8042343346" style="color:#8A0103;">(804) 234-3346</a></span>
                    <span class="contact_email"><a href="mailto:support@vatactical.com" style="color:#8A0103;">support@vatactical.com</a></span>
                </div>

                <!-- /Logo --><!-- Contact Adress --><div class="column-1_5 contact_field contact_phone " style="width: 15%;">
                   <a href="{{route('favourites')}}"> <span style="    left: 15px;
                    top: -4px;
                    border-radius: 50%;
                    background-color: #8A0103;
                    color: white;
                    /* width: 22px; */
                    position: absolute;
                    padding: 5px 10px;
                    text-align: center;
                }">
                    @auth
                    {{$fav}}
                    @endauth
                </span>
                <span class="contact_icon icon-iconmonstr-shipping-box-12-icon "></span>
                <span class="contact_label contact_phone">Favorites</span>
            </a>

            </div><!-- /Contact Adress --><!-- Contact Phone --><!-- /Contact Phone --><!-- Cart --><div class="column-1_5 contact_field contact_cart">
                <a href="{{route('show_cart')}}" class="top_panel_cart_button" data-items="0" data-summa="&#036;0.00">
                    @if (Auth::check())
                    <span class="cart_item">{{$cart}}</span>
                        @else
                    <span class="cart_item"></span>

                    @endif
                    <span class="contact_icon icon-iconmonstr-shopping-cart-4-icon"></span>
                    <span class="contact_label contact_cart_label">Your cart:</span>

                </a>
                <ul class="widget_area sidebar_cart sidebar">
                    <li>
                        <div class="widget woocommerce widget_shopping_cart">
                            <div class="hide_cart_widget_if_empty">
                                <div class="widget_shopping_cart_content">
                                    <ul class="cart_list product_list_widget ">
                                        <!-- Cart item -->
                                        <li class="mini_cart_item">
                                            <a class="remove" href="#">×</a>
                                            <a href="product-single.html">
                                                Glock Double 9mm 3.4" 6+1 FS Integral
                                            </a>
                                            <span class="quantity">
                                                1 ×
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                    821.00
                                                </span>
                                            </span>
                                        </li>
                                        <!-- /Cart item -->
                                        <!-- Cart item -->
                                            <li class="mini_cart_item">
                                                <a class="remove" href="#">×</a>
                                                <a href="product-single.html">
                                                    Beretta JMN9S15CTC BU9 Nano 6+1 9mm 3.07"
                                                </a>
                                                <span class="quantity">
                                                    1 ×
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                                        120.00
                                                    </span>
                                                </span>
                                            </li>
                                        <!-- /Cart item -->
                                    </ul>
                                    <p class="total">
                                        <strong>Subtotal:</strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>
                                                941.00
                                            </span>
                                    </p>
                                    <p class="buttons">
                                        <a class="button wc-forward" href="cart.html">View cart</a>
                                        <a class="button checkout wc-forward" href="checkout.html">Checkout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
                <!-- /Cart -->
            </div>
        </div> --}}
    </div>
    <!-- /Top panel 1 -->
    <!-- Top panel 2 -->
    <div class="top_panel_bottom">
        <div class="content_wrap clearfix" style="width: 93%;">
            <!-- Menu -->
            <nav class="menu_main_nav_area">
                <ul class="menu_main_nav mt-1">
                    <!-- Home -->
                    <li class="menu-item   {{ Request::routeIs('home')   ? 'current-menu-ancestor' : ''}} ">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                   
                    <li class="menu-item  {{ Request::routeIs('shop')   ? 'current-menu-ancestor' : ''}}">
                        <a href="{{route('shop')}}">Shop</a>
                    </li>
                     <li class="menu-item  {{ Request::routeIs('front-courses')   ? 'current-menu-ancestor' : ''}}">
                        <a class=" border border-warning rounded-1" href="{{route('front-courses')}}">Courses</a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('careers')   ? 'current-menu-ancestor' : ''}}">
                        <a href="{{route('careers')}}">Careers</a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('gallery')   ? 'current-menu-ancestor' : ''}}">
                        <a href="{{route('website.gallery')}}">Gallery</a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('gift-cards/all')   ? 'current-menu-ancestor' : ''}}">
                        <a href="{{route('gift-cards')}}">Memberships</a>
                    </li>

                   
                    <li class="menu-item menu-item-has-children more {{ Request::routeIs('services') || Request::routeIs('front-blogs') || Request::routeIs('VTSA-gaming') || Request::routeIs('all-fame') || Request::routeIs('certificates') || Request::routeIs('custom-gun') ? 'current-menu-ancestor' : ''}}">
                        <a>More  <i class="fas fa-sort-down ms-1"></i></a>
                        <ul class="sub-menu">
                            @foreach ($gift_items as $item)
                            <li class="menu-item  {{ Request::routeIs('gift-detail',['slug'=>$item->slug])   ? 'current-menu-ancestor' : ''}}">
                                <a class="blink text-warning" href="{{route('gift-detail',['slug'=>$item->slug])}}">{{$item->name}}</a>
                            </li>
                            @endforeach
        
                            <li class="menu-item {{ Request::routeIs('gallery') ? 'current-menu-ancestor' : ''}}">
                                <a href="{{route('about')}}">About</a>
                            </li>
                        
                         
                            <li class="menu-item">
                                <a href="{{route('front-lottery')}}">Lottery</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('event-lottery')}}">Lottery Event</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('gift-cards')}}">Memberships</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('services')}}">Services</a>
                            </li>

                            <li class="menu-item">
                                <a href="{{route('front-blogs')}}">Blogs</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('range')}}">Range</a>
                            </li>



                            {{-- <li class="menu-item">
                                <a href="{{route('VTSA-gaming')}}">VTSA world of gaming</a>
                            </li> --}}
                            <li class="menu-item">
                                <a href="{{route('all-fame')}}">Hall of Fame</a>
                            </li>
                            {{-- <li class="menu-item">
                                <a href="{{route('certificates')}}">Certifcations of VTSA</a>
                            </li> --}}
                            <li class="menu-item">
                                <a href="{{route('custom-gun')}}">Customization of Gun</a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item {{ Request::routeIs('contact')   ? 'current-menu-ancestor' : ''}}">
                        <a href="{{route('contact')}}">Contact us</a>
                    </li>


                    {{-- <li class="menu-item menu-item-has-children">
                        <a href="#">Account</a>
                        @if (Auth::check())
                        @php
                            $user=Auth::user();
                        @endphp
                        <ul class="sub-menu">
                            @if ($user->role==='admin')
                            <li class="menu-item">
                                <a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            @else
                            <li class="menu-item">
                                <a href="{{route('CustomerDashboard')}}">Dashboard</a>
                            </li>
                            @endif

                            <li class="menu-item">
                                <a href="{{route('logout')}}">Logout</a>
                            </li>

                        </ul>
                        @else
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('login')}}">Login</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('register')}}">Register</a>
                            </li>

                        </ul>
                        @endif

                    </li> --}}

                </ul>
            </nav>

          <input id="search1" type="text" class="search w-25 m-auto mt-3 cursor form-control rounded-pill border-2 mb-3" style="height:3em!important;"  placeholder="Search Products">
            <div class="position-relative">
            <div id="search-area1" class="rounded-3 w-25 m-auto mt-2  position-absolute"  style="right: 178px;
            z-index: 99;
            height: 350px;
            overflow: hidden auto;
            top: -15px;display:none;"></div>
        </div>
        </div>
    </div>
    <!-- /Top panel 2 -->
</div>
</header>
<!-- /Header -->
<!-- Header Mobile -->
<div class="header_mobile mob-hide bg-white fixed-top" style="z-index: 20;">

<div class="d-flex flex-wrap ">


    <!-- Logo -->
    <div class="logo">
        <a href="{{route('home')}}">
            <img style="margin-top: -10px;" src="{{asset('assets/logo.webp')}}" class="logo_main" alt="">
        </a>
    </div>
    <div class="position-relative pad-header">
        <input id="search" type="text" class="search form-control ms-3  mt-4 cursor form-control rounded-pill border-2" style="height:3em!important;"  placeholder="Search Products">
        <div class="position-relative">
        <div id="search-area" class="rounded-3 w-100 m-auto mt-2  position-absolute"  style="right:0px;
        z-index: 99;
        height: 350px;
        overflow: hidden auto;
        top: 0px;display:none;"></div>
    </div>
    </div>
    <div class="menu_button icon-menu text-dark"></div>
    <!-- /Logo -->
    <!-- Cart -->
    <div class="menu_main_cart top_panel_icon">
        <a href="{{route('show_cart')}}" class="top_panel_cart_button text-dark" data-items="0" data-summa="&#036;0.00">
            @if (Auth::check())
            <span class="cart_item">{{$cart}}</span>
                @else
            <span class="cart_item"></span>

            @endif
            <span class="contact_icon icon-iconmonstr-shopping-cart-4-icon"></span>
            <span class="contact_label contact_cart_label">Your cart:</span>

        </a>
        <ul class="widget_area sidebar_cart sidebar">
            <li>
                <div class="widget woocommerce widget_shopping_cart">
                    <div class="hide_cart_widget_if_empty">
                        <div class="widget_shopping_cart_content">
                            @if (Auth::check())
                            <ul class="cart_list product_list_widget ">

                               @foreach ($cartdata as $items)
                               <li class="mini_cart_item">
                                <a class="remove" href="{{route('delete-item',['id'=>$items->id])}}">×</a>
                                <a href="product-single.html">
                                   {{$items->products->name}}
                                </a>
                                <span class="quantity">
                                    {{$items->quantity}} ×
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                       {{$items->sub_total * $items->quantity}}
                                    </span>
                                </span>
                            </li>
                               @endforeach

                            </ul>
                            <p class="total">
                                <?php
                                 $val = 0;
                                foreach ($cartdata as $item):
                                $val += $item->sub_total;;
                            endforeach;
                            echo $val; ?>
                                <strong>Subtotal:</strong>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    {{$val}}
                                </span>
                            </p>

                            <p class="buttons">
                                <a class="button wc-forward" href="{{route('show_cart')}}">View cart</a>
                                <a class="button checkout wc-forward" href="{{route('checkout',['id'=>$user->id])}}">Checkout</a>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- /Cart -->
</div>
<!-- Side wrap -->
<div class="side_wrap">
    <div class="close">Close</div>
    <!-- Top panel -->
    <div class="panel_top">
        <!-- Menu -->
        <nav class="menu_main_nav_area">
            <ul class="menu_main_nav">
                <!-- Home -->
                <li class="menu-item ">
                    <a href="{{route('home')}}">Home</a>

                </li>
                <!-- /Home -->
                <!-- Pages -->
                <li class="menu-item ">
                    <a href="{{route('shop')}}">Shop</a>

                </li>
                <!-- /Pages -->
                <!-- Shop -->
                <li class="menu-item  ">
                    <a  class="text-warning" href="{{route('front-courses')}}">Courses</a>
                </li>
                <li class="menu-item"> <a class="blink text-warning" href="https://www.vatactical.com/course/journey">Journey</a></li>
                @foreach ($gift_items as $item)
                <li class="menu-item  {{ Request::routeIs('gift-detail',['slug'=>$item->slug])   ? 'current-menu-ancestor' : ''}}">
                    <a class="blink text-warning" href="{{route('gift-detail',['slug'=>$item->slug])}}">{{$item->name}}</a>
                </li>
                @endforeach
                <!-- /Shop -->
                <!-- Events -->
                <li class="menu-item">
                    <a href="{{route('about')}}">About</a>
                </li>
                <!-- /Events -->
                <!-- Blog -->
                <li class="menu-item menu-item-has-children">
                    <a id="pages-header" style="cursor: pointer;">More</a>
                    <ul class="sub-menu">
                     
                        <li class="menu-item">
                            <a href="{{route('front-lottery')}}">Lottery</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('event-lottery')}}">Lottery Event</a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('gift-cards')}}">Memberships</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('services')}}">Services</a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('front-blogs')}}">Blogs</a>
                        </li>
                        <li class="menu-item {{ Request::routeIs('gallery')   ? 'current-menu-ancestor' : ''}}">
                            <a href="{{route('website.gallery')}}">Gallery</a>
                        </li>

{{--
                        <li class="menu-item">
                            <a href="{{route('VTSA-gaming')}}">VTSA world of gaming</a>
                        </li> --}}
                        <li class="menu-item">
                            <a href="{{route('all-fame')}}">Hall of Fame</a>
                        </li>
                        {{-- <li class="menu-item">
                            <a href="{{route('certificates')}}">Certifcations of VTSA</a>
                        </li> --}}
                        <li class="menu-item">
                            <a href="{{route('custom-gun')}}">Customization of Gun</a>
                        </li>

                    </ul>
                </li>
                <!-- /Blog -->
                <!-- Contact Us -->
                <li class="menu-item">
                    <a href="{{route('contact')}}">Contact us</a>
                </li>
                <!-- /Contact Us -->
            </ul>
        </nav>
        <!-- /Menu -->
        <!-- Search -->

        <!-- /Search -->
        <!-- Login -->
        @if(!Auth::check())
        <div class="login">
            <a href="{{route('login')}}" class="popup_link popup_login_link icon-user" title="">Login</a>

        </div>
        <!-- /Login -->
        <!-- Register -->
        <div class="login">
            <a href="{{route('register')}}" class="popup_link popup_register_link icon-pencil" title="">Register</a>

        </div>
        @else
        @if($user->role==="admin")
            <div class="login">
                <a href="{{route('dashboard')}}" class="popup_link popup_register_link icon-pencil" title="">Dashboard</a>

            </div>

        @else
        <div class="login">
            <a href="{{route('CustomerDashboard')}}" class="popup_link popup_register_link icon-pencil" title="">Dashboard</a>

        </div>
        @endif
        @endif
        <!-- /Register -->
    </div>
    <!-- /Top panel -->
    <!-- Middle panel -->
    <div class="panel_middle">
        <div class="contact_field contact_address">
            <span class="contact_icon icon-home"></span>
            <span class="contact_label contact_address_1">{{$generalSetting->address}}</span>

        </div>
        <div class="contact_field contact_phone">
            <span class="contact_icon icon-phone"></span>
            <span class="contact_label contact_phone">{{$generalSetting->phone_no}}</span>
            <span class="contact_email">{{$generalSetting->email}}</span>
        </div>
        <div class="top_panel_top_open_hours icon-clock">
            <span>Open hours: </span>Mon - Sat 9.00am - 6.00pm
        </div>
    </div>
    <!-- /Middle panel -->
    <!-- Bottom panel -->
    <div class="panel_bottom">
        <div class="contact_socials">
            <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                <div class="sc_socials_item">
                    <a href="#" target="_blank" class="social_icons social_facebook">
                        <span class="icon-facebook"></span>
                    </a>
                </div>
                <div class="sc_socials_item">
                    <a href="#" target="_blank" class="social_icons social_gplus">
                        <span class="icon-gplus"></span>
                    </a>
                </div>
                <div class="sc_socials_item">
                    <a href="#" target="_blank" class="social_icons social_twitter">
                        <span class="icon-twitter"></span>
                    </a>
                </div>
                <div class="sc_socials_item">
                    <a href="#" target="_blank" class="social_icons social_linkedin">
                        <span class="icon-linkedin"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Bottom panel -->
</div>
<!-- /Side wrap -->
<div class="mask"></div>
</div>
