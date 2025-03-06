@extends('front-app.layout.template')
@section('content')
<style>
    #model-viewer {
        width: 100%;
        height: 60vh; /* Set the height to fill the viewport */
    }
</style>
<script type="module" src="https://unpkg.com/@google/model-viewer"></script>
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Courses</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Courses</span>
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
                            <h2 class="sc_section_title sc_item_title">Range
                                <span class="thin"> Arena</span>
                            </h2>

                        </div>
                    </div>
                </div>
                <div class="empty_space height_3_9em"></div>
                <!-- /Welcome to our store -->
                <!-- Our team -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 px-0"><img style="height: 350px;object-fit:cover;" class="w-100 border" src="{{asset('assets/range_model/main range 1r-2.jpg')}}" alt=""></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 px-0"><img style="height: 350px;object-fit:cover;" class="w-100 border" src="{{asset('assets/range_model/range sniper-2.jpg')}}" alt=""></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 px-0"><img style="height: 350px;object-fit:cover;" class="w-100 border" src="{{asset('assets/range_model/vtsapistol range.jpg')}}" alt=""></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 px-0"><img style="height: 350px;object-fit:cover;" class="w-100 border" src="{{asset('assets/range_model/range sniper-3.jpg')}}" alt=""></div>
                     </div>
                </div>
                <div class="bg_dark_style_1">
                    <div class="content_wrap">
                        <div class="empty_space height_6_9em"></div>
                        <h2 class="sc_section_title sc_item_title">3D
                            <span class="thin"> Model</span>
                        </h2>
                        <div class="sc_team_wrap">
                            <div class="sc_team sc_team_style_team-1">
                                <div class="row">
                                    <div class="col-12">
                                        <model-viewer class="border w-100" id="model-viewer" src="{{asset('assets/range_model/black_claiber_site.glb')}}" alt="A 3D model" auto-rotate camera-controls camera-orbit="0deg 0deg 50m"></model-viewer>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty_space height_5em"></div>
                    </div>
                </div>
                <!-- /Our team -->
                <!-- Book Right Now -->

                <!-- /Book Right Now -->
            </section>
        </article>
    </div>
</div>
@endsection
