{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" style="  border-radius: 100px;
          background: linear-gradient(277deg, #8A0103 -10.36%, #8A0103 133.23%);
           box-shadow: 0px 4px 7px 0px rgba(0, 0, 0, 0.25) inset!important;
           border:none!important;color:white;width:30%;margin:10px;padding:8px;">Register</button>
        </div>
    </form>
</x-guest-layout> --}}
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    height: 100%;
    }
    .banner-sec{background:url('{{asset('assets/vtsa-background.jpeg')}}')  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
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
    </style>
           <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
@php
    use App\Models\SettingModel;
    $web_config=SettingModel::find(1);
@endphp
  <body class="login-block" >
    <div class="container ">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center" style="color:#8a0103;">Register Now</h2>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

      <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Name</label>
        <input type="text" class="form-control" name="name" placeholder="">
        @error('name')
        <span class="text-danger">{{$message}}</span>

        @enderror
      </div>
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
    <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="">
        @error('password_confirmation')
        <span class="text-danger">{{$message}}</span>

        @enderror
    </div>
        @if($web_config->recaptcha_status === 1)
    <div class="g-recaptcha" data-sitekey="{{$web_config->recaptcha_site_key}}"></div>
    @endif
    <div>

    <small>Already have an account ? <a href="{{route('login')}}" class="fw-bold" style="color:#8A0103;">Sign In</a></small></div>

        <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
          <small>Remember Me</small>
        </label>
        <button type="submit" class="btn btn-login float-right" style="background: #8A0103;">Submit</button>
      </div>

    </form>

            </div>
            <div class="col-md-8 banner-sec">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


