@extends('front-app.layout.template')
@section('content')
@php
    $user = Auth::guard()->user();

@endphp
<div class="woocommerce woocommerce-page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_left">
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Shop</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Shop</span>
            </div>
        </div>
    </div>


<style>
  .preloader {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100px; /* Adjust the height as needed */
}
    .wrapper {

  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.filter-price {
  width: 220px;
  border: 0;
  padding: 0;
  margin: 0;
}

.price-title {
  position: relative;
  color: #fff;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
}

.price-field {
  position: relative;
  width: 100%;
  height: 36px;
  box-sizing: border-box;
  background: rgba(248, 247, 244, 0.2);
  padding-top: 15px;
  padding-left: 16px;
  border-radius: 3px;
}

.price-field input[type=range] {
    position: absolute;
}

/* Reset style for input range */

.price-field input[type=range] {
  width: 188px;
  height: 2px;
  border: 0;
  outline: 0;
  box-sizing: border-box;
  border-radius: 5px;
  pointer-events: none;
  -webkit-appearance: none;
}

.price-field input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
}

.price-field input[type=range]:active,
.price-field input[type=range]:focus {
  outline: 0;
}

.price-field input[type=range]::-ms-track {
  width: 188px;
  height: 2px;
  border: 0;
  outline: 0;
  box-sizing: border-box;
  border-radius: 5px;
  pointer-events: none;
  background: transparent;
  border-color: transparent;
  color: transparent;
  border-radius: 5px;
}

/* Style toddler input range */

.price-field input[type=range]::-webkit-slider-thumb {
  /* WebKit/Blink */
    position: relative;
    -webkit-appearance: none;
    margin: 0;
    border: 0;
    outline: 0;
    border-radius: 50%;
    height: 10px;
    width: 10px;
    margin-top: -4px;
    background-color: #fff;
    cursor: pointer;
    cursor: pointer;
    pointer-events: all;
    z-index: 100;
}

.price-field input[type=range]::-moz-range-thumb {
  /* Firefox */
  position: relative;
  appearance: none;
  margin: 0;
  border: 0;
  outline: 0;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  margin-top: -5px;
  background-color: #fff;
  cursor: pointer;
  cursor: pointer;
  pointer-events: all;
  z-index: 100;
}

.price-field input[type=range]::-ms-thumb  {
  /* IE */
  position: relative;
  appearance: none;
  margin: 0;
  border: 0;
  outline: 0;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  margin-top: -5px;
  background-color: #fff;
  cursor: pointer;
  cursor: pointer;
  pointer-events: all;
  z-index: 100;
}

/* Style track input range */

.price-field input[type=range]::-webkit-slider-runnable-track {
  /* WebKit/Blink */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #fff;
  border-radius: 5px;
}

.price-field input[type=range]::-moz-range-track {
  /* Firefox */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #fff;
  border-radius: 5px;
}

.price-field input[type=range]::-ms-track {
  /* IE */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #fff;
  border-radius: 5px;
}

/* Style for input value block */

.price-wrap {
  display: flex;
  justify-content: center;
  color: #fff;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
  margin-bottom: 7px;
}

.price-wrap-1,
.price-wrap-2 {
  display: flex;
}

.price-title {
  margin-right: 5px;
  backgrund: #d58e32;
}

.price-wrap_line {
  margin: 0 10px;
}

.price-wrap #one,
.price-wrap #two {
  width: 30px;
  text-align: right;
  margin: 0;
  padding: 0;
  margin-right: 2px;
  background:  0;
  border: 0;
  outline: 0;
  color: #fff;
  font-family: 'Karla', 'Arial', sans-serif;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
}

.price-wrap label {
  text-align: right;
}

/* Style for active state input */

.price-field input[type=range]:hover::-webkit-slider-thumb {
  box-shadow: 0 0 0 0.5px #fff;
  transition-duration: 0.3s;
}

.price-field input[type=range]:active::-webkit-slider-thumb {
  box-shadow: 0 0 0 0.5px #fff;
  transition-duration: 0.3s;
}
</style>
<!-- /Breadcrumbs -->
<!-- Page Content -->

<div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap">
        <!-- Content -->
        <div class="sidebar widget_area scheme_original">
            <div class="sidebar_inner widget_area_inner">
                <!-- Widget: Cart -->

                <!-- /Widget: Cart -->
                <!-- Widget: Product Categories -->

                <div class="wrapper">
                    <fieldset class="filter-price mt-3 " id="price_hange" >
                        <form action="{{route("filter-products")}}" id="filter-guns" method="POST">
                      <div class="price-field">
                        <input type="range" name="min"  min="0" max="4000" value="0" id="lower">
                        <input type="range" name="max" min="0" max="4000" value="4000" id="upper">
                      </div>
                       <div class="price-wrap mt-3">
                        <span class="price-title">FILTER</span>
                        <div class="price-wrap-1 ">
                            <label for="one">$</label>
                          <input id="one">

                        </div>
                        <div class="price-wrap_line">-</div>
                        <div class="price-wrap-2">
                          <label for="two">$</label>

                          <input id="two">
                        </div>
                      </div>
                    </fieldset>
                  </div>


                <aside class=" widget_product_categories">
                    <h5 class="widget_title text-center py-2 rounded-3">Categories</h5>
                    <ul class="product-categories">
                        @forelse ($categories as $item)
                        @if ($item->parent_id===null)
                        <li class="px-0">
                            <input type="checkbox" style="margin-top: -3px;" id="checkbox_{{$item->id}}" name="categories[]" value="{{$item->id}}" class="me-2">
                            <a><label for="checkbox_{{$item->id}}">{{$item->name}}</label></a>
                            <i class="fas fa-arrow-down float-end arrow"></i>
                            <div class="inner_categories" style="display: none;">
                                @foreach ($item->subcategories as $subitem)
                                <div class="d-block ms-3 mt-2"><input type="checkbox" name="categories[]" style="margin-top: -3px;" value="{{$subitem->id}}" id="checkbox_{{$subitem->id}}" name="categories[]"><a><label class="mx-1" for="checkbox_{{$subitem->id}}">{{$subitem->name}}</label></a></div>
                                @endforeach
                            </div>
                        </li>
                        @endif
                        @empty
                        <li>
                            <a href="#">Empty</a>
                        </li>
                        @endforelse
                    </ul>
                </aside>


            </div>
        </div>
        <div class="content">
            <div class="list_products shop_mode_thumbs">
                <select name="sorting" class="form-select w-25 ms-auto mb-3 mob-full"  id="">
                    <option value="" disabled selected >Sorting</option>

                    <option value="low">Low To High</option>
                    <option value="high">High To Low</option>
                    <option value="latest">Latest</option>
                </select>

                <!-- Products List -->
                <div class="container">
                <div class="row" id="products-area">
                <!-- Product Item -->
                    @foreach ($data as $item)
                    <div class="col-md-4 col-lg-4 col-12 col-sm-12 position-relative mb-3" >
                        <div class="bg-white rounded-3 mb-3 p-3 shadow position-relative" style="height:420px;">
                        <img src="{{asset('assets/featured_images/'.$item->img)}}" style="width: 350px;height:250px;object-fit:contain;" alt="">
                        <h6 class="fw-bold text-center text-dark">{{Str::words($item->name,'3','...')}}</h6>
                        @if (Auth::check())
                            @php
                            $isFavorited = DB::table("favourites")->where('user_id', $user->id)->where('product_id', $item->id)->exists();
                        @endphp

                        <a href="{{ route('add-to-fav', ['id' => $item->id]) }}" class="text-dark position-absolute top-0 start-0 m-2 @if($isFavorited) fav-hover" style='color: #8A0103!important;' @else" @endif>
                            <i class="fa-solid fa-heart text-center m-auto fs-4"></i>
                        </a>



                        @else
                       <a href="{{route('add-to-fav',['id'=>$item->id])}}" class="text-dark position-absolute top-0 start-0 m-2 fav-hover "><i class="fa-solid fa-heart text-center m-auto  fs-4"></i></a>

                        @endif
                        <small style="background: #8A0103;" class="text-white p-2 position-absolute top-0 end-0"> {{ $item->stock > 0 ? "In Stock" : "Out of stock" }}</small>
                          @if($item->sale_price !== null)


                                <span class="price d-block text-center fs-6">
                                    <del>
                                        <span class="woocommerce-Price-amount amount ">
                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>{{$item->price}}
                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount fs-4 text-dark">
                                            <span class="woocommerce-Price-currencySymbol text-dark fs-3">&#36;</span>{{$item->sale_price}}

                                        </span>
                                    </ins>
                                </span>
                                @else
                                <span class="price d-block text-center">

                                    <ins>
                                        <span class="woocommerce-Price-amount amount fs-4 text-dark">
                                            <span class="woocommerce-Price-currencySymbol text-dark fs-3 mx-2">&#36;</span>{{$item->price}}

                                        </span>
                                    </ins>
                                </span>
                                @endif
                        <a href="{{route('product_detail',['slug'=>$item->slug])}}" class="btn btn-primary m-auto d-block mt-3 border-0">View Detail</a>
                    </div>
                </div>
                    @endforeach
                    <!-- /Product Item -->
            </div>
                </div>
                <!-- /Products List -->
                <!-- Pagination -->
                {{-- <nav class="pagination_wrap pagination_pages">
                    <span class="pager_current active">1</span>
                    <a href="#" class="">2</a>
                    <a href="#" class="pager_next ">&#8250;</a>
                    <a href="#" class="pager_last ">&raquo;</a>
                </nav> --}}
                <!-- /Pagination -->
            </div>
        </div>
        <!-- /Content -->
        <!-- Sidebar -->

        <!-- /Sidebar -->
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        $('.product-categories .arrow').click(function (event) {
            event.stopPropagation(); // Prevents the click event from bubbling up to the parent li
            $(this).toggleClass('fa-arrow-down fa-arrow-up'); // Toggle arrow direction
            $(this).closest('li').find('.inner_categories').slideToggle(); // Toggle inner categories
        });


var lowerSlider = document.querySelector('#lower');
var  upperSlider = document.querySelector('#upper');

document.querySelector('#two').value=upperSlider.value;
document.querySelector('#one').value=lowerSlider.value;

var  lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
lowerVal = parseInt(lowerSlider.value);
upperVal = parseInt(upperSlider.value);

if (upperVal < lowerVal + 4) {
lowerSlider.value = upperVal - 4;
if (lowerVal == lowerSlider.min) {
upperSlider.value = 4;
}
}
document.querySelector('#two').value=this.value
};

lowerSlider.oninput = function () {
lowerVal = parseInt(lowerSlider.value);
upperVal = parseInt(upperSlider.value);
if (lowerVal > upperVal - 4) {
upperSlider.value = lowerVal + 4;
if (upperVal == upperSlider.max) {
    lowerSlider.value = parseInt(upperSlider.max) - 4;
}
}
document.querySelector('#one').value=this.value
};


var lowerSlider = document.querySelector('#lower');
var  upperSlider = document.querySelector('#upper');

document.querySelector('#two').value=upperSlider.value;
document.querySelector('#one').value=lowerSlider.value;

var  lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
lowerVal = parseInt(lowerSlider.value);
upperVal = parseInt(upperSlider.value);

if (upperVal < lowerVal + 4) {
lowerSlider.value = upperVal - 4;
if (lowerVal == lowerSlider.min) {
upperSlider.value = 4;
}
}
document.querySelector('#two').value=this.value
};

lowerSlider.oninput = function () {
lowerVal = parseInt(lowerSlider.value);
upperVal = parseInt(upperSlider.value);
if (lowerVal > upperVal - 4) {
upperSlider.value = lowerVal + 4;
if (upperVal == upperSlider.max) {
    lowerSlider.value = parseInt(upperSlider.max) - 4;
}
}
document.querySelector('#one').value=this.value
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('input[type="checkbox"]').change(function () {
    // Call the function to submit the form via Ajax
    submitFormAjax();
});
$('select').change(function () {
            // Call the function to submit the form via Ajax
            submitFormAjax();
        });

        $('#price_hange').change(function () {
            // Call the function to submit the form via Ajax
            submitFormAjax();
        });


function submitFormAjax() {

var formData = $('#filter-guns').serialize();
// Show preloader while waiting for the response
var preloader = '<div class="preloader">Loading...</div>';
document.getElementById('products-area').innerHTML = preloader;

$.ajax({
    "url": "{{ route('filter-products') }}",
    "type": "POST",
    "data": formData,

    success: function (response) {
        var html = '';

        if (response.length > 0) {
            response.forEach(element => {
                html += `<div class="col-md-4 col-lg-4 col-12 col-sm-12">
                            <div class="bg-white rounded-3 mb-3 p-3 shadow">
                                <img src="{{ asset('assets/featured_images/') }}/${element.img}" style="width: 350px; height: 250px; object-fit: contain;" alt="">
                                <h5 class="fw-bold text-center text-dark">${element.name}</h5>`;

                if (element.sale_price !== null) {
                    html += `<span class="price d-block text-center">
                                <del>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">&#36;</span>${element.price}
                                    </span>
                                </del>
                                <ins>
                                    <span class="woocommerce-Price-amount amount fs-3 text-dark">
                                        <span class="woocommerce-Price-currencySymbol text-dark fs-3">&#36;</span>${element.sale_price}
                                    </span>
                                </ins>
                            </span>`;
                } else {
                    html += `<span class="price d-block text-center">
                                <ins>
                                    <span class="woocommerce-Price-amount amount fs-3 text-dark">
                                        <span class="woocommerce-Price-currencySymbol text-dark fs-3">&#36;</span>${element.price}
                                    </span>
                                </ins>
                            </span>`;
                }

                html += `<a href="/product/${element.slug}"  class="btn btn-primary m-auto d-block mt-3">
                        View Detail
                        </a>
                    </div>
                </div>`;
            });
        } else {
            // If the response is empty, you can provide a message or handle it accordingly.
            html = '<p>No products found</p>';
        }

        // Append the generated HTML to the appropriate container or element
        // For example, assuming there is a container with the ID "products-area"
        document.getElementById('products-area').innerHTML = html;
    },
    error: function (error) {
        // Handle errors if any
        console.error(error);
    }
});


}

});
</script>
@endsection
