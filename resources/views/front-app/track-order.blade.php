
@extends('front-app.layout.template')
@section('content')
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Track Order</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Track Order</span>
            </div>
        </div>
    </div>
</div>
<section class="container">
    <div class="row py-5">
        <div class="col-12">
            <form  id="form">
                @csrf
            <h2 class="text-center">Track Your Order</h2>
            <input type="text" class="form-control w-75 m-auto d-block rounded-3" name="order_id" placeholder="Enter Your Order Number">
            <button type="button" id="submit-btn" class="m-auto d-block mt-3 px-5 rounded-3">Search</button>
        </form>
        </div>
        <div class="col-12" id="order-detail">

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
  $('#submit-btn').click(function(){
    let formval=$('#form').serialize();
    $.ajax({
        url: "{{ route('track-no') }}",
        method: "POST",
        data:formval,
        beforeSend:function(){
                    $('#loading-indicator').html('<p>Loading...</p>');
        },
        success: function (data) {
                // Handle the success response here
                if (data) {
                   $html=` <table class="w-100 my-3">
                <tr>
                    <th>Name</th>
                    <th>${data.first_name}</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>${data.email}</th>
                </tr>
                <tr>
                    <th>Phone No</th>
                    <th>${data.phone_no}</th>
                </tr>
                <tr>
                    <th>Country</th>
                    <th>${data.country}</th>
                </tr>
                <tr>
                    <th>Province</th>
                    <th>${data.province}</th>
                </tr>
                <tr>
                    <th>Address</th>
                    <th>${data.address}</th>
                </tr>
                <tr>
                    <th>Appartment</th>
                    <th>${data.appartment}</th>
                </tr>
                <tr>
                    <th>Postal Code</th>
                    <th>${data.postal_code}</th>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <th>${data.total}</th>
                    </tr>
                <tr>
                    <th>Delivery Status</th>
                    <th>${data.delivery_status}</th>
                </tr>
                <tr>
                    <th>Bank_status</th>
                    <th>${data.bank_status}</th>
                </tr>
                <tr>
            </table>`
            $('#order-detail').html($html);


                } else {
                    console.log('No Record Found!');
                }
            },
            error: function (error) {
                console.error('Error:', error);
            }
  })

  });});
</script>
@endsection
