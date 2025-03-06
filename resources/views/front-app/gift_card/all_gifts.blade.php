@extends('front-app.layout.template')
@section('content')
<style>
    .hover_card:hover {
    transform: scale(1.05)!important;
    transition:0.3s ease;
}
</style>
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Memberships</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Memberships</span>
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
                            <h2 class="sc_section_title sc_item_title">All
                                <span class="thin">Memberships</span>
                            </h2>

                        </div>
                    </div>
                </div>
                <div class="empty_space height_3_9em"></div>
                <!-- /Welcome to our store -->
                <!-- Our team -->
                <div class="bg_dark_style_1">
                    <div class="content_wrap">
                        <div class="empty_space height_6_9em"></div>
                        <div class="sc_team_wrap">
                            <div  class="sc_team sc_team_style_team-1">


                                <div class="row">
                                    @forelse ($data as $item)
                                    <div class="col-lg-4 col-md-4 col-12 col-sm-12 my-2 mb-5 px-3">
                                        <a href="{{route('gift-detail',['slug'=>$item->slug])}}" class="w-100 hover_card ">
                                        <div class=" px-3 pb-2 rounded-3 shadow" style="background:url('{{asset('assets/gift_cards/'.$item->img)}}');background-size:cover;padding-top:100px;height:250px;">

                                            <div  class="rounded-3" class="sc_team_item_avatar">

                                            <div class="sc_team_item_info ">





                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                                    @empty
                                </div>
                                    @endforelse






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
