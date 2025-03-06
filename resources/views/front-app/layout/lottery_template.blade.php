<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VTSA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
@if(session('success'))
<div id="success" class="myalert py-3  px-2 alert-success justify-content-start w-50 text-white fw-bold shadow" role="alert" style="background:#5F9C4F!important;z-index: 999;
position: absolute;
left: 424px;
right: 100px;
top: 10px;
z-index:1002;">
   <i class="fa-solid fa-circle-exclamation me-2" style="color:white;"></i> {{ session('success') }}

</div>
@elseif(session('error'))
<div id="error" class="myalert px-2 py-3 bg-white  alert-danger justify-content-start w-50 text-dark fw-bold shadow" role="alert" style="z-index: 999;
position: absolute;
left: 424px;
right: 100px;
top: 10px;
z-index:1002;">
   <i class="fa-solid fa-circle-exclamation me-2" style="color:red;"></i> {{ session('error') }}

</div>
@endif
<body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide" style="background: black!important;">

    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">
    @include('front-app.layout.header')
    @yield('content')
    @include('front-app.layout.footer')

    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>




      </body>
</html>
