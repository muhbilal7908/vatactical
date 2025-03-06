@extends('front-app.layout.template')
@section('content')
@php
    $categories=App\Models\Category::all();
@endphp
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_right">

    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">

            <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
                <div class="top_panel_title_inner top_panel_inner_style_1">
                    <div class="content_wrap">
                        <h1 class="page_title">Blogs</h1>
                        <div class="breadcrumbs">
                            <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                            <span class="breadcrumbs_delimiter"></span>
                            <span class="breadcrumbs_item current">Blogs</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumbs -->
            <!-- Page Content -->
            <div class="page_content_wrap page_paddings_yes">
                <div class="content_wrap">
                    <!-- Content -->
                    <div class="content">
                        <!-- Post Item -->
                        @foreach ($data as $item)


                        <article class="post_item post_item_excerpt odd">
                            <div class="post_featured">
                                <div class="post_thumb">
                                    <a class="hover_icon hover_icon_link" href="{{route('detail-blog',['slug'=>$item->slug])}}">
                                        <img alt="" src="{{asset('assets/blogs/'.$item->img)}}">
                                    </a>
                                </div>
                            </div>
                            <div class="post_content clearfix">
                                <h3 class="post_title">
                                    <a href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->name}}</a></h3>
                                <div class="post_info">
                                    <span class="post_info_item">
                                        Posted <a href="{{route('detail-blog',['slug'=>$item->slug])}}" class="post_info_date">{{$item->created_at->format('M Y D')}}</a>
                                    </span>
                                    <span class="post_info_item">by
                                        <a href="{{route('detail-blog',['slug'=>$item->slug])}}" class="post_info_author">Admin</a>
                                    </span>
                                </div>
                                <div class="post_descr">
                                    {{strip_tags(Str::words($item->description,'80','...'))}}
                                    <a href="{{route('detail-blog',['slug'=>$item->slug])}}" class="sc_button sc_button_square sc_button_style_dark sc_button_size_large w-25 d-block">Learn more</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <!-- /Post Item -->
                        <!-- Post Item -->

                        <!-- Pagination -->

                        <!-- /Pagination -->
                    </div>
                    <!-- /Content -->
                    <!-- Sidebar -->
                    <div class="sidebar widget_area scheme_original">
                        <div class="sidebar_inner widget_area_inner">
                            <!-- Widget: Categories -->
                            <aside class="widget widget_categories">
                                <h5 class="widget_title">Categories</h5>
                                <ul>
                                    @foreach ($categories as $item)
                                    <li>
                                        <a href="{{route('blog-category',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                    </li>
                                    @endforeach


                                </ul>
                            </aside>
                            <!-- /Widget: Categories -->
                            <!-- Widget: Categories Dropdown -->

                            <!-- /Widget: Categories Dropdown -->
                            <!-- Widget: Meta -->

                            <!-- /Widget: Meta -->
                            <!-- Widget: Archives -->

                            <!-- /Widget: Archives -->
                            <!-- Widget: RSS -->

                            <!-- /Widget: RSS -->
                            <!-- Widget: Search -->

                            <!-- /Widget: Search -->
                            <!-- Widget: Recent Comments -->

                            <!-- /Widget: Recent Comments -->
                            <!-- Widget: Recent Posts -->
                            <aside class="widget widget_recent_entries">
                                <h5 class="widget_title">Recent Posts</h5>
                                <ul>
                                    <li>
                                        <a href="post-single.html">Instructions &#038; Training</a>
                                    </li>
                                    <li>
                                        <a href="post-single.html">Rental Firearms &#038; Fees</a>
                                    </li>
                                    <li>
                                        <a href="post-single.html">Gun Range</a>
                                    </li>
                                </ul>
                            </aside>
                            <!-- /Widget: Recent Posts -->
                            <!-- Widget: Calendar -->

                            <!-- /Widget: Calendar -->
                            <!-- Widget: Text -->

                            <!-- /Widget: Text -->
                            <!-- Widget: Tags -->

                            <!-- /Widget: Tags -->
                        </div>
                    </div>
                    <!-- /Sidebar -->
                </div>
            </div>
            <!-- /Page Content -->
            <!-- Footer 1 -->

            <!-- /Footer 1 -->
            <!-- Footer 2-->

            <!-- /Footer 2-->
            <!-- Copyright -->

            <!-- /Copyright -->
        </div>
        <!-- /Page wrap -->
    </div>
    <!-- /Body wrap -->



</div>
@endsection
