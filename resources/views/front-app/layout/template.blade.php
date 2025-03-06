<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="hxLRXs55RK6yfZAZB7sFGrfL6t585J1qyFTQFQEGcoI" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {!! SEO::generate() !!}
    {!! OpenGraph::generate() !!}
   {!! Twitter::generate() !!}
   {!! JsonLd::generate() !!}
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-61KB7W2JSK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-61KB7W2JSK');
</script>
   <link rel="stylesheet" href="https://beacon.madeofeffort.de/scss/beacon-settings.css">
   <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('assets/js/vendor/woocommerce/css/woocommerce-layout.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/woocommerce/css/woocommerce-smallscreen.css')}}" type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/woocommerce/css/woocommerce.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/js/vendor/revslider/css/settings.css')}}" type="text/css" media="all" />
    {{-- <link rel="stylesheet" href="{{asset('assets/css/tpl-revslider.css" type="text/css')}}" media="all" /> --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind:300,400,700%7CLato:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext">
    <link rel="stylesheet" href="{{asset('assets/css/fontello/css/fontello.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/animation.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/shortcodes.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/plugin.woocommerce.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/skin.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/messages.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/magnific/magnific-popup.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/swiper/swiper.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '879192430672771');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=879192430672771&ev=PageView&noscript=1"
    /></noscript>
    
    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>
<style>.text-primary{
    color:#830604!important;
}
.bg-background{
    background:#830604!important;
}
.hover:hover{
    transform: scale(1.08)!important;
    transition: 0.3s!important;
}
@keyframes toastDuration {
  from {
    width: 0%;
  }
  to {
    Width: 100%;
  }
}
.toast-container {
  position: fixed;
  top: var(--distance-15);
  right: var(--distance-15);
  z-index: 8888;
  display: block;
  width: auto;
}

.toast {
  display: block;
  width: 100%;
  min-height: var(--distance-375);
  margin-bottom: var(--distance-1);
  border-radius: var(--border-radius);
  box-shadow: var(--control-box-shadow);
  background-color: var(--color-greyscale-10);
  overflow: hidden;
  --color-status: var(--color-greyscale-4);
}
.toast .toast-status-icon {
  display: block;
  float: left;
  height: var(--distance-375);
  width: var(--distance-3);
  padding: var(--distance-1) 0 var(--distance-1) var(--distance-05);
}
.toast .toast-status-icon svg {
  display: block;
  width: 100%;
  height: 100%;
}
.toast .toast-content {
  display: block;
  float: left;
  width: calc(100% - var(--distance-575));
  padding: var(--distance-075) var(--distance-1) var(--distance-075) var(--distance-05);
  line-height: var(--line-height-s);
}
.toast .toast-content span {
  font-size: var(--font-size-s);
  font-weight: var(--font-weight-bold);
  color: var(--color-greyscale-4);
  line-height: inherit;
}
.toast .toast-content p {
  font-size: var(--font-size-xs);
  color: var(--color-greyscale-2);
  line-height: inherit;
  margin-top: 1px;
}
.toast .toast-close {
  display: block;
  float: right;
  clear: right;
  width: var(--distance-225);
  height: var(--distance-225);
  margin-top: var(--distance-025);
  margin-right: var(--distance-05);
  padding: var(--distance-05);
  background: transparent;
  background-color: transparent;
}
.toast .toast-close svg {
  display: block;
  width: 100%;
  height: 100%;
  margin-right: 0;
  margin-left: 0;
  transform: none;
}
.toast .toast-duration {
  position: relative;
  display: block;
  float: none;
  clear: both;
  height: 3px;
  width: 100%;
  background-color: var(--color-greyscale-8);
}
.toast .toast-duration::after {
  display: block;
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 0%;
  height: inherit;
  background-color: var(--color-greyscale-5);
  animation-name: toastDuration;
  animation-duration: 4s;
  animation-timing-function: linear;
}
.toast.info {
  background: var(--color-info-10);
  --color-status: var(--color-info-4);
}
.toast.info svg {
  --color-status: var(--color-info-4);
}
.toast.info span {
  color: var(--color-status);
}
.toast.info p {
  color: var(--color-info-2);
}
.toast.info .toast-duration {
  background-color: var(--color-info-8);
}
.toast.info .toast-duration::after {
  background-color: var(--color-info-4);
}
.toast.success {
  background: var(--color-success-10);
  --color-status: var(--color-success-3);
}
.toast.success svg {
  --color-status: var(--color-success-3);
}
.toast.success span {
  color: var(--color-status);
}
.toast.success p {
  color: var(--color-success-2);
}
.toast.success .toast-duration {
  background-color: var(--color-success-8);
}
.toast.success .toast-duration::after {
  background-color: var(--color-success-3);
}
.toast.alert {
  background: var(--color-alert-10);
  --color-status: var(--color-alert-4);
}
.toast.alert svg {
  --color-status: var(--color-alert-4);
}
.toast.alert span {
  color: var(--color-status);
}
.toast.alert p {
  color: var(--color-alert-2);
}
.toast.alert .toast-duration {
  background-color: var(--color-alert-8);
}
.toast.alert .toast-duration::after {
  background-color: var(--color-alert-4);
}
.toast.error {
  background: var(--color-error-10);
  --color-status: var(--color-error-4);
}
.toast.error svg {
  --color-status: var(--color-error-4);
}
.toast.error span {
  color: var(--color-status);
}
.toast.error p {
  color: var(--color-error-2);
}
.toast.error .toast-duration {
  background-color: var(--color-error-8);
}
.toast.error .toast-duration::after {
  background-color: var(--color-error-4);
}
@media(max-width:768px){
  .fullPreview .wrapper .titulo {
    line-height: 1.5;
    position: absolute;
    top: 0;
    left: 0;
    color: transparent;
    font-size: 32px;
    -webkit-text-stroke: 1px #fff;
    z-index: 1;
    transition: cubic-bezier(0.68, -0.55, 0.27, 1.55) all 0.5s 0.3s;
}
}
</style>

</head>
<div id="toast-container" class="toast-container">
@if(session('success'))
<div id="success" class="toast success "  style="display:block;">
    <div class="toast-status-icon">
        <svg><use xlink:href="#successToastIcon"></svg>
    </div>
    <div class="toast-content">
        <span>Success</span>
        <p> {{ session('success') }}</p>
    </div>
    {{-- <button class="toast-close" onclick="closeToast(event)">
        <svg><use xlink:href="#closeToastIcon"></svg>
    </button> --}}
    <div class="toast-duration"></div>
</div>
@elseif(session('error'))
<div id="error" class="toast error" style="display:block;">
    <div class="toast-status-icon">
        <svg><use xlink:href="#errorToastIcon"></svg>
    </div>
    <div class="toast-content">
        <span>Error</span>
        <p> {{ session('error') }}</p>
    </div>
    {{-- <button class="toast-close" onclick="closeToast(event)">
        <svg><use xlink:href="#closeToastIcon"></svg>
    </button> --}}
    <div class="toast-duration"></div>
</div>
@endif
</div>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="neutralToastIcon">
        <path fill="var(--color-status)" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-144c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="infoToastIcon">
        <path fill="var(--color-status)" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-144c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="successToastIcon">
        <path fill="var(--color-status)" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="alertToastIcon">
        <path fill="var(--color-status)" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zm32 224c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="errorToastIcon">
        <path fill="var(--color-status)" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm97.9-320l-17 17-47 47 47 47 17 17L320 353.9l-17-17-47-47-47 47-17 17L158.1 320l17-17 47-47-47-47-17-17L192 158.1l17 17 47 47 47-47 17-17L353.9 192z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" id="closeToastIcon">
        <path fill="var(--color-status)" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
    </symbol>
</svg>
<body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide" style="background: black!important;">

    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">

    @include('front-app.layout.header')
    @yield('content')
    <div class="toast fixed-bottom" id="toast"  role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img id="p-img"  style="width:80px;object-fit:contain;"  class="rounded me-2" alt="...">
          <strong class="me-auto" id="p-name">Glock 15</strong>
          <small>1 mins ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
         Has Been Purchased By <span id="user-name">Ahmed</span>
        </div>
      </div>


    @include('front-app.layout.footer')

    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <div id="page_preloader"></div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <!-- Add Owl Carousel JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script type="text/javascript" src="{{asset('assets/js/trx_utils.min.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('assets/jsjs/_packed.js')}}"></script> --}}

    <script type="text/javascript" src="{{asset('assets/js/vendor/essential-grid/js/lightbox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/essential-grid/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/revslider/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/revslider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/revslider/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/revslider/js/extensions/revolution.extension.navigation.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/tpl-revslider-general.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/tpl-revslider-1.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/photostack/modernizr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/superfish.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/utils.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/core.init.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/init.js')}}"></script>
 <!-- Add Owl Carousel JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/shortcodes.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/messages.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/magnific/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/swiper/swiper.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
          $(document).ready(function() {
          //  TOASTS
function closeToast(event) {
	let toastClose = event.target;
	toastClose.closest('.toast').remove();
}
function closeToastDuration() {
	if (document.querySelectorAll('.toast')) {
		let toasts = document.querySelectorAll('.toast');
		toasts.forEach(toast => {
			setTimeout(() => {
				toast.remove();
			}, 10000);
		});
	}
}
closeToastDuration();
if (document.getElementById('toast-container')) {
	let mutationObserver = new MutationObserver(function(mutations) {
		mutations.forEach(function(mutation) {
			closeToastDuration();
		});
	});
	mutationObserver.observe(document.getElementById('toast-container'), {
		attributes: true,
		characterData: true,
		childList: true,
		subtree: true,
		attributeOldValue: true,
		characterDataOldValue: true
	});
}

        // Toggle submenu when clicking on the parent menu item
        $('#pages-header').click(function(e) {
            e.preventDefault();
            $(this).next('.sub-menu').slideToggle();
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
    // Check if the modal should be displayed (not shown in this session)

      var myModal = new bootstrap.Modal(document.getElementById('websiteModal'), {
        keyboard: false
      });
      myModal.show();
      // Set the session storage to indicate the modal has been shown


    });

      // Enable pusher logging - don't include this in production
     // Enable logging to console for Pusher
Pusher.logToConsole = true;

// Initialize Pusher with your credentials
var pusher = new Pusher('11fc2779f39097738927', {
  cluster: 'ap2'
});

// Subscribe to the 'my-channel' channel
var channel = pusher.subscribe('my-channel');

// Bind to the 'my-event' event on 'my-channel'
channel.bind('my-event', function(data) {
  // Update elements with received data
  document.getElementById('p-name').innerText = data.message.product.name;
  document.getElementById('user-name').innerText = data.message.user.first_name;

  // Construct image URL
  var imageUrl = 'http://localhost:8000/assets/featured_images/' + data.message.product.img;

  // Set the image source
  document.getElementById('p-img').src = imageUrl;

  // Show toast initially
  $("#toast").show();

  // Hide the toast after 5 seconds
setTimeout(() => {
    $("#toast").hide();
  }, 5000);
});

// Subscribe to the 'lottery-channel' channel


    //   Notification Lottery Event


     // Enable pusher logging - don't include this in production




    </script>
<script>
$("#search-area").hide();

$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
     autoplayTimeout: 3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
        });
// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
// (function(){
// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
// s1.async=true;
// s1.src='https://embed.tawk.to/64eb2fb5a91e863a5c10114b/1h8rb4npi';
// s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
// s0.parentNode.insertBefore(s1,s0);
// })();


      setTimeout(function() {
  var successDiv = document.getElementById('success');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 4000);

setTimeout(function() {
  var successDiv = document.getElementById('error');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 4000);


$(document).ready(function() {

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$('#search1').on('input', function() {
var inputValue = $(this).val();
let formData = new FormData();
formData.append("search_val", inputValue);

$.ajax({
    url: "{{ route('product-filter') }}",
    type: 'POST',
    data: formData,
    processData: false, // Prevent jQuery from processing the data
    contentType: false, // Let jQuery set the content type
    success: function(response) {
       let html ='';
        let search_val=response.results;
        $("#search-area1").show();
        search_val.forEach(element => {

            html +=`  <div class='row border  mx-2' style="background: white;">
                <a class="text-dark text-decoration-none w-100 search-hover" href="/product/${element.slug}">
                    <div class="row">
                <div class='col-3 d-flex align-items-center'><img class="rounded-3" src="{{asset('assets/featured_images/${element.img}')}}" width="100px" height="100px" alt="${element.name}"></div>
                <div class='col-9'><small>${element.name}</small>
                    </div>
                    </div>
                </a>
            </div>`
           $("#search-area1").html(html);
       });
    },
    error: function(error) {
        // Handle errors if any
        console.error(error);
    }
});
});


$('#search').on('input', function() {

var inputValue = $(this).val();
let formData = new FormData();
formData.append("search_val", inputValue);

$.ajax({
    url: "{{ route('product-filter') }}",
    type: 'POST',
    data: formData,
    processData: false, // Prevent jQuery from processing the data
    contentType: false, // Let jQuery set the content type
    success: function(response) {
       let html ='';
        let search_val=response.results;
        $("#search-area").show();
        search_val.forEach(element => {

            html +=`  <div class='row border  mx-2' style="background: white;">
                <a class="text-dark text-decoration-none w-100 search-hover" href="/product/${element.slug}">
                    <div class="row">
                <div class='col-3 d-flex align-items-center'><img class="rounded-3" src="{{asset('assets/featured_images/${element.img}')}}" width="100px" height="100px" alt="${element.name}"></div>
                <div class='col-9'><small>${element.name}</small>
                    </div>
                    </div>
                </a>
            </div>`
           $("#search-area").html(html);
       });
    },
    error: function(error) {
        // Handle errors if any
        console.error(error);
    }
});
});
$('.tawk-branding').hide();

});

</script>
@stack('scripts')
  </body>
</html>
