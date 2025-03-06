@extends('front-app.layout.template')
@section('content')
<div class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_right">
    <div id="page_preloader"></div>
    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">
            <!-- Header -->

            <!-- /Header Mobile -->
            <!-- Breadcrumbs -->
            <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
                <div class="top_panel_title_inner top_panel_inner_style_1">
                    <div class="content_wrap">
                        <h1 class="page_title">{{$data->name}}</h1>
                        <div class="breadcrumbs">
                            <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                            <span class="breadcrumbs_delimiter"></span>
                            <a class="breadcrumbs_item cat_post" href="{{route('front-blogs')}}">Blogs</a>
                            <span class="breadcrumbs_delimiter"></span>
                            <span class="breadcrumbs_item current">{{$data->name}}</span>
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
                        <article class="post_item post_item_single">
                            <!-- Featured Image -->
                            <section class="post_featured">
                                <div class="post_thumb">
                                    <a class=""  title="10 Great Tactical Clothing Options">
                                        <img alt="" src="{{asset('assets/blogs/'.$data->img)}}">
                                    </a>
                                </div>
                            </section>
                            <!-- /Featured Image -->
                            <!-- Post Content -->
                            <section class="post_content">
                                <div class="post_info">
                                    <span class="post_info_item post_info_posted">Posted
                                        <a href="#" class="post_info_date date">{{$data->created_at->format('M Y D')}}</a>
                                    </span>
                                    <span class="post_info_item">by
                                        <a href="#" class="post_info_author">Admin</a>
                                    </span>

                                </div>
                                <p >{{$data->description}}</p>

                                {{-- <div class="post_info post_info_bottom">
                                    <span class="post_info_item post_info_tags">Tags:
                                        <a class="post_tag_link" href="#">protection</a>,
                                        <a class="post_tag_link" href="#">tactical</a>
                                    </span>
                                </div> --}}
                            </section>
                            <!-- /Post Content -->
                            <!-- Post Author -->

                            <!-- /Post Author -->
                            <!-- Related Posts -->
                            <section class="related_wrap">
                                <h3 class="section_title">Related Posts</h3>
                                <div class="row">
                                    @foreach ($related as $item)
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
                                        <article class="post_item post_item_related post_item_1">
                                            <div class="post_content">
                                                <div class="post_featured">
                                                    <div class="post_thumb">
                                                        <a class="hover_icon hover_icon_link" href="{{route('detail-blog',['slug'=>$item->slug])}}">
                                                            <img alt="" style="height: 220px;object-fit:cover;" src="{{asset('assets/blogs/'.$item->img)}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="post_content_wrap">
                                                    <h6 class="post_title">
                                                        <a href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                                    </h6>

                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach

                                </div>
                            </section>
                            <!-- /Related Posts -->
                        </article>
                        <!-- Comments -->

                    </div>
                    <!-- /Content -->
                    <!-- Sidebar -->
                    <div class="sidebar widget_area scheme_original">
                        <div class="sidebar_inner widget_area_inner">
                            <!-- Widget: Categories -->
                            <aside class="widget widget_categories">
                                <h5 class="widget_title">Categories</h5>
                                <ul>
                                    @forelse ($categories as $items)
                                    <li><a href="{{route('blog-category',['slug'=>$items->slug])}}">{{$items->name}}</a></li>

                                    @empty
                                    <li>Empty</li>

                                    @endforelse
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
                            {{-- <aside class="widget widget_search">
                                <form role="search" method="get" class="search_form" action="#">
                                    <input type="text" class="search_field" placeholder="Search &hellip;" value="" name="s" title="Search for:" />
                                    <button type="submit" class="search_button"></button>
                                </form>
                            </aside> --}}
                            <!-- /Widget: Search -->
                            <!-- Widget: Recent Comments -->

                            <!-- /Widget: Recent Comments -->
                            <!-- Widget: Recent Posts -->
                            <aside class="widget widget_recent_entries">
                                <h5 class="widget_title">Recent Posts</h5>
                                <ul>
                                    @foreach ($recent as $item)
                                        <li><a href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                                    @endforeach
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
            <!-- Footer -->
            {{-- <footer class="contacts_wrap scheme_original">
                <div class="contacts_wrap_inner">
                    <div class="content_wrap">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{route('dashboard')}}">
                                <img src="http://placehold.it/164x100.jpg" class="logo_footer" alt="">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <!-- Contact Adress -->
                        <div class="contacts_address">
                            <address class="address_right">
                                <p>Phone: 23-456-789</p>
                                <p>Fax: 098-765-432</p>
                            </address>
                            <address class="address_left">
                                <p>123, New Lenox</p>
                                <p>Chicago, IL 60606</p>
                            </address>
                        </div>
                        <!-- /Contact Adress -->
                        <!-- Socials -->
                        <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_medium">
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_facebook">
                                    <span class="icon-facebook"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_gplus">
                                    <span class="icon-gplus"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_twitter">
                                    <span class="icon-twitter"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_linkedin">
                                    <span class="icon-linkedin"></span>
                                </a>
                            </div>
                        </div>
                        <!-- /Socials -->
                    </div>
                </div>
            </footer> --}}
            <!-- /Footer -->
            <!-- Copyright -->
            {{-- <div class="copyright_wrap copyright_style_text scheme_original">
                <div class="copyright_wrap_inner">
                    <div class="content_wrap">
                        <div class="copyright_text">
                            <a href="#">Kingler</a> &copy; 2017 All Rights Reserved. <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /Copyright -->
        </div>
        <!-- /Page wrap -->
    </div>
    <!-- /Body wrap -->


</div>
@endsection
