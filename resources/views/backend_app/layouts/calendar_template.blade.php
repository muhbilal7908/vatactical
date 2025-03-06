<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vatactical Software">
    <meta name="keywords" content="Firearms Training Courses">
    <meta name="author" content="Sean Bank">
    <title>VTSA Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon float-left" href="{{asset('assets/favicon.ico')}}">
    <link rel="shortcut icon float-left" type="image/x-icon float-left" href="{{asset('assets/favicon.ico')}}">

    <!-- BEGIN: Vendor CSS-->

    <!-- END: Vendor CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/components.css')}}">


    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">


    {{-- Calender --}}


   


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
      body{
    font-family: 'Poppins', sans-serif!important;

  }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
{{-- success alert --}}

<div id="success_toaster" style="display:none;" class="toast-container ">
    <div class="toast basic-toast position-fixed top-0 end-0 m-2 d-block" >
        <div class="toast-header">
            <i class="bg-success text-white rounded-circle fs-3" style="width: 30px;height:30px;" data-feather='check'></i>
            <strong class="me-auto mx-1">Success</strong>
            <small class="text-muted">1 sec ago</small>
            <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="msg"></div>
    </div>
  </div>

@if(session('success'))
<div id="success" class="toast-container ">
  <div class="toast basic-toast position-fixed top-0 end-0 m-2 d-block" >
      <div class="toast-header">
          <i class="bg-success text-white rounded-circle fs-3" style="width: 30px;height:30px;" data-feather='check'></i>
          <strong class="me-auto mx-1">Success</strong>
          <small class="text-muted">1 sec ago</small>
          <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">{{ session('success') }}</div>
  </div>
</div>
      @endif

      @if(session('info'))
      {{-- Info Alert --}}
      <div id="info" class="info alert">
        <div class="content w-100">
          <div class="icon" style="float:left!important;">
            <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="40" height="40" rx="25" fill="white"/>
    <path d="M27 22H23V40H27V22Z" fill="#006CE3"/>
    <path d="M25 18C24.2089 18 23.4355 17.7654 22.7777 17.3259C22.1199 16.8864 21.6072 16.2616 21.3045 15.5307C21.0017 14.7998 20.9225 13.9956 21.0769 13.2196C21.2312 12.4437 21.6122 11.731 22.1716 11.1716C22.731 10.6122 23.4437 10.2312 24.2196 10.0769C24.9956 9.92252 25.7998 10.0017 26.5307 10.3045C27.2616 10.6072 27.8864 11.1199 28.3259 11.7777C28.7654 12.4355 29 13.2089 29 14C29 15.0609 28.5786 16.0783 27.8284 16.8284C27.0783 17.5786 26.0609 18 25 18V18Z" fill="#006CE3"/>
    </svg>
        </div>
          <p class="mt-1"> {{ session('info') }}</p>
        </div>
        <button class="close">
         <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
        </button>
      </div>
      @endif
      @if(session('warning'))
      {{-- Warning Alert --}}
      <div id="warning" class="warning alert">
        <div class="content w-100">
          <div class="icon float-left">
            <svg height="40" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
        </div>
          <p> {{ session('warning') }}</p>
        </div>
        <button class="close">
         <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
        </button>
      </div>
      @endif
      @if(session('error'))
      {{-- danger alert --}}
      <div id="error" class="toast-container ">
        <div class="toast basic-toast position-fixed top-0 end-0 m-2 d-block" >
            <div class="toast-header">
                <i class="bg-danger text-white rounded-circle fs-3" style="width: 30px;height:30px;" data-feather='x-circle'></i>
                <strong class="me-auto mx-1">error</strong>
                <small class="text-muted">1 sec ago</small>
                <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">{{ session('error') }}</div>
        </div>
    </div>
@endif

    @include('backend_app.layouts.header')
@yield('content')
@include('backend_app.layouts.footer')

</body>


</html>
