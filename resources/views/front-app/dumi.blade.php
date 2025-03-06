<div class="content_wrap">
    <div class="widget_area sc_recent_news_wrap">
        <aside class="widget widget_recent_news">
            <div class="sc_recent_news sc_recent_news_style_news-magazine sc_recent_news_with_accented">
                <div class="sc_recent_news_header sc_recent_news_header_split">
                    <div class="sc_recent_news_header_captions">
                        <h3 class="sc_recent_news_title"> WHAT'S TRENDING
                            <span class="thin"></span>
                        </h3>
                    </div>
                </div>
                <div class="columns_wrap">
                    <div class="column-1_2">
                        <!-- Post Item -->
                       @foreach ($latest as $item)
                       <article class="post_item post_accented_on">
                        <div class="post_featured">
                            <div class="post_thumb">
                                <a class="hover_icon hover_icon_link"  href="{{route('detail-blog',['slug'=>$item->slug])}}">
                                    <img alt="" src="{{asset('assets/blogs/'.$item->img)}}">
                                </a>
                            </div>
                        </div>
                        <div class="post_header">
                            <h5 class="post_title">
                                <a href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->name}}</a>
                            </h5>
                            <div class="post_meta">
                                <span class="post_meta_date">Posted
                                    <a  href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->created_at->format("M Y D")}}</a>
                                </span>
                             {{-- <span class="post_meta_author">By Jack Black</span> --}}
                            </div>
                        </div>
                        <div class="post_content">

                        </div>
                        <div class="post_footer">
                            <a class="sc_button sc_button_style_dark rounded-3" href="{{route('front-blogs')}}">Learn More</a>
                        </div>
                    </article>
                       @endforeach

                    </div><div class="column-1_2">
                        <!-- Post Item -->
                        @foreach ($featured as $item)
                        <article class="post_item post_accented_off">
                            <div class="post_featured">
                                <div class="post_thumb">
                                    <a class="hover_icon hover_icon_link" href="{{route('detail-blog',['slug'=>$item->slug])}}">
                                        <img alt="Rental Firearms &#038; Fees" src="{{asset('assets/blogs/'.$item->img)}}">
                                    </a>
                                </div>
                            </div>
                            <div class="post_header">
                                <h6 class="post_title">
                                    <a href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                </h6>
                                <div class="post_meta">
                                    <span class="post_meta_date">Posted
                                        <a  href="{{route('detail-blog',['slug'=>$item->slug])}}">{{$item->created_at->format("M Y D")}}</a>
                                    </span>
                                    {{-- <span class="post_meta_author">By Jack Black</span> --}}
                                </div>
                            </div>
                        </article>
                        @endforeach

                        <!-- /Post Item -->
                        <!-- Post Item -->

                        <!-- /Post Item -->
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
