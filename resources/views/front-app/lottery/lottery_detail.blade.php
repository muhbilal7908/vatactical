@extends('front-app.layout.template')
@section('content')
<style>
    .slogan{
    font-size: 2.2em;
    margin: 0;
    padding: 0;
    color: #fff;
}

.counters{
    width: 100%;
    display: flex;
}
.items{
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;

}
.items input{
    width: 70%;
    height: 80px;
    border: 0;
    outline: 0;
    border-radius: 50px;
    color: black;
    background: white;
    font-size: 2em;
    text-align: center;
    font-weight: bold;
    border: 10px solid white;
    font-family: 'Oswald', sans-serif;
}
.items label{
    margin-top: 10px;
    font-size: 1.3em;
    font-weight: 300;
    letter-spacing: 3px;
}
@media(max-width:768px){
    .items input{
        padding: 0px;

    height: 40px;
    border: 0;
    outline: 0;
    border-radius: 50px;
    color: black;
    background: white;
    font-size: 2em;
    text-align: center;
    font-weight: bold;
    border: 10px solid white;
    font-family: 'Oswald', sans-serif;
}
.items label{
    margin-top: 10px;
    font-size: 10px;
    font-weight: 300;
    letter-spacing: 3px;
}
}
</style>
<div class="single-product woocommerce woocommerce-page body_transparent article_style_stretch  top_panel_show top_panel_above sidebar_hide">

        <!-- Body wrap -->
        <div class="body_wrap bg_image" style="background: url('{{asset('assets/lottery-bg2.jpg')}}')">
            <!-- Page wrap -->
            <div class="page_wrap">
<div class="top_panel_title top_panel_style_1  title_present navi_present breadcrumbs_present ">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <a class="breadcrumbs_item all" href="{{route('front-lottery')}}">Lottery</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">{{$data->name}}</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="container py-5">
    <div class="row">
        <div class="count_down_wrapper">
            <div class="content text-center mb-3">
                <h4 class="slogan mt-3">🎉 Expire Soon ! </h4>
                <h4 class="bg-warning p-3 rounded-3 w-50 m-auto d-block my-3" id="launchTime"></h4>
            </div>
            <div class="m-auto d-block w-75 mt-5">


            <div class="counters ">
                <div class="items">
                    <input type="text" id="days" class="border border-white border-3 text-white" value="00">
                    <label for="days" class="fw-bold">Days</label>
                </div>
                <div class="items">
                    <input type="text" id="hours" class="border border-white border-3 text-white" value="00">
                    <label for="days" class="fw-bold">Hours</label>
                </div>
                <div class="items">
                    <input type="text" id="min" class="border border-white border-3 text-white" value="00">
                    <label for="days" class="fw-bold">Minutes</label>
                </div>
                <div class="items">
                    <input type="text" id="sec" class="border border-white border-3 text-white" value="00">
                    <label for="days" class="fw-bold">Seconds</label>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
<div class="container py-4">
    <div class="row py-3">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <img src="{{asset('assets/lottery/'.$data->img)}}" class="w-100 m-auto  d-block rounded-3 border border-white border-3" alt="">
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="px-5">
                <h2 class="display-2 text-white fw-bold ">{{$data->name}}</h2>
                <p class="text-white">@php echo $data->description @endphp</p>
                <form action="{{route('lottery-checkout',['slug'=>$data->slug])}}">
                <div class="">
                    <h5>How Lottery Tickets You Want to buy</h5>
                    <input type="number" id="quantity" onchange="add_discount({{$data->id}})" class=" mb-3 bg-white" value="1"  name="quantity">
                    <input type="hidden" id="original"  value="{{$data->price}}">
                    <input type="hidden" id="price" name="price" value="{{$data->price}}">
                </div>
                <h5 class="text-white fw-bold">Price: $<span id="price_text">{{$data->price}}</span></h5>
               <button type="submit" class="rounded-1 ">Participate</button>
            </div>
        </form>
        </div>
    </div>
</div>
            </div>
        </div>
</div>
<script src="https://plugin.credova.com/plugin.min.js"></script>
<script>

function add_discount(id) {
    let qty = $("#quantity").val();
    let original_price = parseFloat($("#original").val()); // Parse original price as float
    if (qty > 1) {
        $.ajax({
            method: "GET",
            url: "{{ route('add-discount') }}",
            data: {
                'id': id,
                'qty': qty
            },
            success: function(response) {
                console.log(response.data);
                let discount = parseFloat(response.data); // Parse discount as float
                let new_price = (original_price * qty) - discount;

                $("#price").val(new_price); // Add missing $ sign before "#price"
                $("#price_text").text(new_price); // Add missing $ sign before "#price_text"
            },
            error: function(xhr, status, error) {
                console.error(error); // Log error to console for debugging
            }
        });

    } else if (qty === '1') {
        let new_price = (original_price * 1);
        $("#price").val(new_price);
        $("#price_text").text(new_price);
    }
}


    Date.prototype.addDays = function(d) {
    this.setTime(this.getTime() + d * 86400000);
    return this;
};

function formatDate(date) {
    const options = {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true,
    };
    return date.toLocaleString('en-US', options);
}

var time = new Date();
time.addDays(2); // you can change the days


var autoExtendedTime = formatDate(time);
//const fixedEndTime = "1 November 2023 6:00 PM";
var exp_val="{{ $data->expire_date }}";

var expireDate = new Date(exp_val);
var autoExtendedTime = formatDate(expireDate);
const launchTime = formatDate(expireDate);
document.getElementById('launchTime').innerText = launchTime;

let daysEl = document.getElementById('days');
let hoursEl = document.getElementById('hours');
let minEl = document.getElementById('min');
let scondsEl = document.getElementById('sec');

function timer(){
    const end = new Date(launchTime);
    const now = new Date();
    const difference = (end - now) / 1000;

    if(difference < 0 ) return;


    const days = Math.floor(difference / 3600 / 24);
    const hours = Math.floor(difference / 3600) % 24;
    const minutes = Math.floor(difference / 60 ) % 60;
    const seconds = Math.floor(difference ) % 60;


    daysEl.value = days;
    hoursEl.value = hours;
    minEl.value = minutes;
    scondsEl.value = seconds;
}


setInterval(
    () => {
        timer()
    },
    1000
);
</script>
@endsection
