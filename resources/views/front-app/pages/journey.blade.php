@extends('front-app.layout.template')
@section('content')
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Journey</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Journey</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_no">
    <!-- Content -->
    <div class="content">
        <article class="post_item post_item_single">
            <section class="post_content">
                <!-- Welcome to our store -->
                <div class="empty_space height_4_8em"></div>
                <div class="sc_section">
                    <div class="content_wrap">
                        <div class="sc_section_inner">
                            <h2 class="sc_section_title sc_item_title">Our
                                <span class="thin"> Journey</span>
                            </h2>
                            <div class="sc_section_descr sc_item_descr">
                               <img src="https://img.freepik.com/free-psd/5-steps-business-infographics-template_47987-13876.jpg?size=338&ext=jpg&ga=GA1.1.87170709.1707609600&semt=sph" class="w-100 mt-3  "  alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty_space height_3_9em"></div>
            </section>
        </article>
    </div>
</div>
@endsection
