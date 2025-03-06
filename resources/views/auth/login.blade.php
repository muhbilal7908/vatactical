{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

           <button type="submit" style="border-radius: 100px;
          background: linear-gradient(277deg, #8A0103 -10.36%, #8A0103 133.23%);
           box-shadow: 0px 4px 7px 0px rgba(0, 0, 0, 0.25) inset!important;
           border:none!important;color:white;width:30%;margin:10px;padding:8px;">Login</button>
        </div>
    </form>
</x-guest-layout> --}}


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://beacon.madeofeffort.de/scss/beacon-settings.css">
   <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind:300,400,700%7CLato:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext">
    <link rel="stylesheet" href="{{asset('assets/css/fontello/css/fontello.css')}}" type="text/css" media="all" />


    <link rel="stylesheet" href="{{asset('assets/css/animation.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/shortcodes.css')}}" type="text/css" media="all" />


    <link rel="stylesheet" href="{{asset('assets/css/messages.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/magnific/magnific-popup.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/swiper/swiper.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
    .login-block{
        background: #DE6262;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #000000, #8a0103); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float:left;
    width:100%;
    padding : 50px 0;
    height: 100vh;
    }
    .banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
    .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
    .carousel-inner{border-radius:0 10px 10px 0;}
    .carousel-caption{text-align:left; left:5%;}
    .login-sec{padding: 50px 30px; position:relative;}
    .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
    .login-sec .copy-text i{color:#FEB58A;}
    .login-sec .copy-text a{color:#E36262;}
    .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
    .login-sec h2:after{content:" "; width:100px; height:5px; background:#8A0103; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
    .btn-login{background: #DE6262; color:#fff; font-weight:600;}
    .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
    .banner-text h2{color:#fff; font-weight:600;}
    .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
    .banner-text p{color:#fff;}
    @media(max-width:768px){
        .mob-size{
            padding:40%;
        }
    }
    </style>
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
  animation-duration: 10s;
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
</style>
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
@php
    use App\Models\SettingModel;
    $web_config=SettingModel::find(1);
@endphp
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
  <body class="login-block" >
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center" style="color:#8a0103;">Login Now</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

      <div class="form-group">
        <label for="exampleInputEmail1" class="text-uppercase">Email</label>
        <input type="email" class="form-control" name="email" placeholder="">
        @error('email')
        <span class="text-danger">{{$message}}</span>

        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
        <input type="password" class="form-control" name="password" placeholder="">
        @error('password')
        <span class="text-danger">{{$message}}</span>

        @enderror
    </div>
      @if($web_config->recaptcha_status === 1)
    <div class="g-recaptcha" data-sitekey="{{$web_config->recaptcha_site_key}}"></div>
    @endif
    <div>
        <a class="text-primary text-decoration-none" href="{{route('password.request')}}">Forget Password</a>
    </div>
    <div> <small>Dont have an account? <a href="{{route('register')}}" class="fw-bold text-primary text-decoration-none" >Sign Up</a></small></div>

        <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
          <small>Remember Me</small>

        </label>

        <button type="submit" class="btn btn-login float-right" style="background: #8A0103;">Submit</button>
      </div>

    </form>

            </div>
            <div class="col-md-8 mob-size" style="background:url('{{asset('assets/vtsa-background.jpeg')}}');background-size:cover;">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">


        </div>


                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        setTimeout(function() {
  var successDiv = document.getElementById('success');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 3000);

setTimeout(function() {
  var successDiv = document.getElementById('warning');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 3000);

setTimeout(function() {
  var successDiv = document.getElementById('info');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 3000);
setTimeout(function() {
  var successDiv = document.getElementById('error');
  if (successDiv) {
    successDiv.style.display = 'none';
  }
}, 3000);



        $(".close").click(function(){
    $(this).parent().fadeOut();
 });
        });
 </script>

</body>
</html>


