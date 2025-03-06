@extends('front-app.layout.template')
@section('content')

<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Something Went Wrong</h1>
            <div class="breadcrumbs"></div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_404">
                <div class="post_content">
                    <h1 class="page_title text-white">404<span>Oops!</span></h1>
                    <h2 class="page_subtitle ">We are sorry!
                        <b>Error 404!</b>
                        <span>You can not access our website right now due to maintainance .</span>
                    </h2>
                    <p class="page_description margin_bottom_null">Can't find what you need? Take a moment or</p>
                    <p class="page_description">start from <a href="{{route('home')}}">homepage from below button</a>.</p>
                    <div class="page_search m-auto" >
                        <div class="search_wrap search_style_button search_state_fixed" style="padding:0px!important;"  >
                            <a href="{{route('home')}}"><button class="btn btn-primary px-5 py-2 w-100">Home Page</button></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <!-- /Content -->
    </div>
</div>

@endsection
