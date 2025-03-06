@extends('front-app.layout.template')
@section('content')
@php
    $user = Auth::guard()->user();

@endphp
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Your cart</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <a class="breadcrumbs_item all" href="shop.html">Shop</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Your cart</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_yes" style="background: white;">
    <div class="content_wrap">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single">
                <section class="post_content">
                    <div class="woocommerce">
                        <form class="woocommerce-cart-form" action="#" method="post">
                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Cart Item -->
                                    @foreach ($data as $item)
                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                        <td class="product-remove">
                                            <a href="{{route('delete-item',['id'=>$item->id])}}" class="remove">&times;</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="{{asset('assets/featured_images/'.$item->products->img)}}" alt="" />
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="product-single.html">{{$item->products->name}}</a>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>{{$item->products->price}}
                                            </span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="number" class="input-text qty text" step="1" min="0" name="cart[1][qty]" value="{{$item->quantity}}" title="Qty" size="4" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span><span><?php echo $item->sub_total ?> </span>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>
                        </form>
                        <div class="cart-collaterals ">
                            <div class="cart_totals ">
                                <h2>Cart totals</h2>
                                <table class="shop_table shop_table_responsive border-top border-dark">
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span> <?php
                                                $val = 0;
                                                foreach ($data as $item):
                                                    $val += $item->sub_total;;
                                                endforeach;
                                                echo $val;
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total">
                                            <strong>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                    <?php
                                                    $val = 0;
                                                    foreach ($data as $item):
                                                        $val +=  $item->sub_total;
                                                    endforeach;
                                                    echo $val;
                                                    ?>
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                                <div class="wc-proceed-to-checkout">

                                    <a  href="{{route('checkout',['id'=>$user->id])}}"  class="checkout-button button alt wc-forward">
                                        Proceed to checkout
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>
        <!-- /Content -->
    </div>
</div>
@endsection
