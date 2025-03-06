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
                        <div style="position: sticky;
                        top: 20px!important;
                        bottom: 0;
                        overflow-y: auto;">
                                            <div id="carouselExample" class="carousel slide">
                                                <div class="carousel-inner active">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('assets/featured_images/' . $data->img) }}"
                                                            class="d-block w-100 rounded-3 border" height="400" style="object-fit: cover;"
                                                            width="100%" alt="...">
                                                    </div>
                                                    @foreach ($data->images as $key => $item)
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('assets/product_gallery/' . $item->image) }}"
                                                                class="d-block w-100 rounded-3 border" height="400" style="object-fit: cover;"
                                                                alt="...">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <button class="carousel-control-prev bg-transparent" style="    filter: brightness(0.5);" type="button"
                                                    data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next bg-transparent" style="filter: brightness(0.5);" type="button"
                                                    data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" style="    filter: brightness(0.5);"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>


                                        </div>
                    </div>
                    <!-- /Product Image -->
                    <!-- Product Summary -->
                    <div class="summary entry-summary">
                        <h1 class="product_title">{{$data->name}}</h1>
                        <p class="price">
                            <span class="woocommerce-Price-amount amount">
                                @if ($data->sale_price === null)
                                <span class="woocommerce-Price-currencySymbol">&#36;</span>{{$data->price}}

                                @else
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
                                @endif

                            </span>
                        </p>
                        <div class="woocommerce-product-details__short-description">
                            @php echo $data->excerpt @endphp
                        </div>
                        <form class="cart" method="post" action="{{route('add_to_cart')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="quantity">
                                <input type="hidden" value="{{$data->id}}" name="id">
                                <input type="number" class="input-text qty text" step="1" min="1" name="quantity" value="1" title="Qty" size="4" />
                                @if ($data->sale_price === null)
                                <input type="hidden" class="bg-white" name="price" value="{{$data->price}}">
                                @else
                                <input type="hidden" class="bg-white" name="price" value="{{$data->sale_price}}">
                                @endif
                            </div>
                            <button type="submit" name="add-to-cart" class="button alt rounded-3">Add to cart</button>
                        </form>
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

                            <span class="product_id mt-3">Categories:
                                <span>{{$data->id}}</span>
                            </span>
                            <span class="product_id">Product ID:
                                <span>{{$data->id}}</span>
                            </span>
                            <span class="product_id">Product Stock:
                                <span>{{$data->stock}}</span>
                            </span>
                        </div>
                    </div>
                    <!-- /Product Summary -->
                    <!-- Tabs -->
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active mx-2 rounded-3" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab rounded-3" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews</button>
                            </li>

                          </ul>
                        <!-- Tab: Description -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <h2>Description</h2>
                            @php echo $data->description @endphp

                        </div>
                        <!-- /Tab: Description -->
                        <!-- Tab: Reviews -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div id="comments">
                                    <h2 class="woocommerce-Reviews-title">Reviews</h2>
                                    @foreach ($reviews as $item)
                                    <div class="row my-2">
                                        <div class="col-1">
                                        <img src="{{asset('assets/avatar.avif')}}"  class="rounded-circle w-100">

                                        </div>
                                      <div class="col-9">
                                        <div class="position-relative d-block">
                                          <h6 class="fw-bold">{{$item->user->name}}</h6>
                                          <small class="d-block">{{$item->review_text}}</small>
                                        </div>
                                           <div >
                                            @if($item->rating === 5)
                                            <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i>
                                            @endif
                                            @if($item->rating === 4)
                                            <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-regular fa-star" ></i>
                                            @endif
                                            @if($item->rating === 3)
                                            <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-regular fa-star" style="color:#DEB217;"></i> <i class="fa-regular fa-star" ></i>
                                            @endif
                                            @if($item->rating === 2)
                                            <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-regular fa-star" style="color:#DEB217;"></i> <i class="fa-regular fa-star"></i> <i class="fa-regular fa-star" ></i>
                                            @endif
                                            @if($item->rating === 1)
                                            <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-solid fa-star" style="color:#DEB217;"></i> <i class="fa-regular fa-star"></i> <i class="fa-regular fa-star" ></i> <i class="fa-regular fa-star" ></i>
                                            @endif



                                          </div>

                                      </div>
                                    </div>
                                    @endforeach

                                </div>
                                <form action="{{route('submit-review')}}" method="POST">
                                    @csrf
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">


                                            <p class="comment-notes">
                                                <span id="email-notes">You must be login before submitting reviews<span class="required">*</span>
                                            </p>
                                            <div class="d-block" >
                                                <p for="rating">Your rating</p>
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                  </div>
                                            </div>


                                            <p>Your Review</p>
                                            <textarea id="comment" name="review_text" class="bg-white mb-4" cols="45" rows="8" required></textarea>


                                            <input type="hidden" value="{{$data->id}}" name="product_id">
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                                            </p>
                                        </div><!-- #respond -->
                                    </div>
                                </form>
                                </div>


                                <div class="clear"></div>
                            </div>
                        </div>
                        <!-- /Tab: Reviews -->
                    </div>
                    <!-- /Tabs -->
                    <!-- Related Products -->
                    <section class="related products">

                        <h2>Related products</h2>
                        <ul class="products">
                            <!-- Product Item -->

                            <!-- /Product Item -->
                            <!-- Product Item -->
                            @foreach ($related as $item)
                            <li class="product column-1_4">
                                <div class="post_item_wrap">


                                            <a href="{{route('product_detail',['slug'=>$item->slug])}}">
                                                <img src="{{asset('assets/featured_images/'.$item->img)}}" alt="" class="m-auto d-block" style="object-fit:contain;width:150px!important;height:150px!important;" title="Product" />
                                            </a>


                                    <div class="post_content">
                                        <h2 class="woocommerce-loop-product__title">
                                            <a href="product-single.html">{{$item->name}}</a>
                                        </h2>

                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>{{$item->price}}
                                            </span>
                                        </span>
                                        <a href="{{route('product_detail',['slug'=>$item->slug])}}" class="button add_to_cart_button rounded-3">View Detail</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                            <!-- /Product Item -->
                        </ul>
                    </section>
                    <!-- /Related Products -->
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
@endsection
