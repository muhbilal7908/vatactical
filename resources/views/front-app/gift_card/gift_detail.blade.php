@extends('front-app.layout.template')
@section('content')
<div class="single-product woocommerce woocommerce-page body_transparent article_style_stretch  top_panel_show top_panel_above sidebar_hide">

        <!-- Body wrap -->
        <div class="body_wrap bg_image">
            <!-- Page wrap -->
            <div class="page_wrap">
<div class="top_panel_title top_panel_style_1  title_present navi_present breadcrumbs_present ">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <a class="breadcrumbs_item all" href="{{route('shop')}}">Shop</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">{{$data->name}}</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single post_item_product">
                <div class="product">
                    <!-- Product Image -->
                    <div class=" woocommerce-product-gallery--columns-4 images" data-columns="4" >
                       <img src="{{asset('assets/gift_cards/'.$data->img)}}" class="w-100 rounded-3 " alt="">
                    </div>
                    <!-- /Product Image -->
                    <!-- Product Summary -->
                    <div class="summary entry-summary">
                        <h1 class="product_title">{{$data->name}}</h1>
                        <p class="price">
                            <span class="woocommerce-Price-amount amount">
                                @if ($data->sale_price === null & $data->price !== null)
                                <span class="woocommerce-Price-currencySymbol">&#36;</span>{{$data->price}}
                          
                                @elseif($data->price  && $data->sale_price )
                                <span class="price d-block text-center fs-6">

                                        <span class="woocommerce-Price-amount amount " style="text-decoration:line-through;">
                                            <span class="woocommerce-Price-currencySymbol" >&#36;</span>{{$data->price}}
                                        </span>

                                    <ins>
                                        <span class="woocommerce-Price-amount amount fs-4 text-dark">
                                            <span class="woocommerce-Price-currencySymbol text-dark fs-3">&#36;</span>{{$data->sale_price}}

                                        </span>
                                    </ins>
                                </span>
                                @else
                                <h4>Price: $<span id="price_val"></span></h4>

                                @foreach ($data->variations as $key => $item)

                                    <div class="form-check">
                                        <input class="form-check-input" @if($key === 0) checked @endif type="radio" name="price" value="[{{$item->price}},{{$item->id}}]" id="flexRadioDefault_{{$key}}">

                                        <label class="form-check-label fs-6 fw-bold text-dark" for="flexRadioDefault_{{$key}}">
                                            {{$item->variation_name}}
                                        </label>
                                    </div>
                                @endforeach
                                @endif

                            </span>
                        </p>
                        <div class="woocommerce-product-details__short-description">
                            @php echo $data->description @endphp
                        </div>

                            @if($data->variations)
                                <form method="get" action="{{route('checkout-gift',['slug'=>$data->slug])}}">
                                <input type="hidden" name="variation_id" id="variation_id" >
                                <button type="submit">Buy Now</button>
                                </form>

                            @else
                                <a href="{{route('checkout-gift',['slug'=>$data->slug])}}"><button type="button"  class="button alt rounded-3">Buy Now</button></a>


                            @endif

                        <div class="product_meta">
                            {{-- <span class="posted_in">Categories:
                                <a href="#">Firearms</a>,
                                <a href="#">Semi-Auto Handguns</a>,
                                <a href="#">Shotguns</a>
                            </span>
                            <span class="tagged_as">Tags:
                                <a href="#">Beretta</a>,
                                <a href="#">guns</a>,
                                <a href="#">steel</a>
                            </span> --}}

                        </div>
                    </div>
                    <!-- /Product Summary -->
                    <!-- Tabs -->

                </div>
            </article>
        </div>
        <!-- /Content -->
    </div>
</div>
            </div>
        </div>
</div>
<script src="https://plugin.credova.com/plugin.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
       $(document).ready(function(){
        // Function to update price span
        function updatePrice() {
            // Get the value of the selected radio button
            var selectedValue = $('input[name="price"]:checked').val();
            var values = JSON.parse(selectedValue.replace(/'/g, '"'));
            var selectedPrice = values[0];
            var selectedId = values[1];

            // Update the span with the selected price
            $('#price_val').text(selectedPrice);
            // Update the hidden input with the selected ID
            $("#variation_id").val(selectedId);
        }

        // Attach change event listener to radio buttons
        $('input[name="price"]').on('change', updatePrice);

        // Initial call to set the default price if one is selected by default
        updatePrice();
    });
</script>
@endsection
