@extends('front-app.layout.template')
@section('content')
<style>.custom-radio input[type="radio"] {
    display: none; /* Hide the radio button */
  }

  .custom-label {
    padding: 10px 15px;
    border: 1px solid #ccc;
    background-color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .custom-radio input[type="radio"]:checked + .custom-label {
    background-color: #8B0102; /* Change the background color when selected */
    color: #fff; /* Change text color when selected */
    border: 1px solid #8B0102;
  }
  @keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.blinking-text {

  animation: blink 2s infinite;
}

  </style>
<div class="single-product woocommerce woocommerce-page body_transparent article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">
        <!-- Body wrap -->
        <div class="body_wrap bg_image">
            <!-- Page wrap -->
            <div class="page_wrap">
<div class="top_panel_title top_panel_style_1  title_present navi_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <a class="breadcrumbs_item all" href="{{route('front-courses')}}">Courses</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">{{$data->name}}</span>
            </div>
        </div>
    </div>
</div>

<div class="py-5" style="background: url('{{asset('assets/backgrounds/header.jpg')}}');background-size:cover;">
<div class="container" >
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
           <div class="d-flex flex-wrap justify-content-between ">
            <img  class="w-75 rounded-1" src="{{asset('assets/courses/'.$data->img)}}" style="height: 350px;object-fit:cover;" alt="">
            <div class="sc_section_inner" style="width: 40%;">


            </div>


        </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">

            <h3 class=" text-start fw-bold mb-4 text-end  ">{{$data->name}}</h3>

            <div class="d-block  justify-content-center ">
                <h4 class="text-start fw-bold mb-4 text-end">Price</h4>
                <p class="price">
                    <span class="woocommerce-Price-amount amount text-white ">

                        @if ($data->sale_price === null)
                        <span class="woocommerce-Price-currencySymbol fs-1 d-block  text-end">&#36;{{$data->price}}</span>

                        @else
                        <span class="price d-block  fs-3 text-end">

                                <span class="woocommerce-Price-amount amount text-white " style="text-decoration:line-through;">
                                    <span class="woocommerce-Price-currencySymbol" >&#36;</span>{{$data->price}}
                                </span>

                            <ins>
                                <span class="woocommerce-Price-amount amount fs-1 text-white ">
                                    <span class="woocommerce-Price-currencySymbol text-white fs-1">&#36;</span>{{$data->sale_price}}

                                </span>
                            </ins>
                        </span>
                        @endif


                          <!-- Modal -->

                    </span>
                </p>
                <a href="{{route('date-picker',['slug'=>$data->slug])}}"> <button  class="fs-6 ms-auto d-block w-auto">Book Now <i class="fa-regular fa-calendar-check fs-6"></i></button></a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <h2 class="sc_section_title sc_item_title text-dark mt-5">More
            <span class="fw-bold">Detail</span>
        </h2>
        <p class="text-center ">@php echo $data->description @endphp</p>
    </div>
    <div class="row py-5">
        <div class="col-12">
            <div class="embed-responsive embed-responsive-16by9">

                <iframe width="1600" height="600" src="https://www.youtube.com/embed/{{$data->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
    </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  $('.custom-label').on('click', function() {
    const radioId = $(this).attr('for');
    $(`#${radioId}`).prop('checked', true);
  });
});
</script>

@endsection
