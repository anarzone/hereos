@extends('front.V2.layout.app')

@section('title', 'Marketinq bloqu')

@section('content')
    @include('front.V2.sliders.home_slider')

    @include('front.V2.posts.editor_posts')

    @include('front.V2.posts.top_week_posts')

    <div class="jl_home_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="content">
                    <div class="post_list_medium_widget jl_nonav_margin page_builder_listpost jelly_homepage_builder jl-post-block-725291">
                        @foreach($latestPosts as $latestPost)
                            <div class="blog_list_post_style">
                                <div class="image-post-thumb featured-thumbnail home_page_builder_thumbnial">
                                    <div class="jl_img_container">
                                        <span class="image_grid_header_absolute"
                                              style="background-image: url({{asset('storage/'.$latestPost->thumbnail_image)}})"
                                        ></span>
                                        <a href="{{route('posts.single', $latestPost->slug)}}" class="link_grid_header_absolute"></a>
                                        @if($latestPost->format != \App\Models\V2\Posts\Post::STANDARD_FORMAT)
                                            <span class="jl_post_type_icon">
                                                @if($latestPost->format == \App\Models\V2\Posts\Post::AUDIO_FORMAT)
                                                    <i class="la la-volume-up"></i>
                                                @elseif($latestPost->format == \App\Models\V2\Posts\Post::VIDEO_FORMAT)
                                                    <i class="la la-play"></i>
                                                @elseif($latestPost->format == \App\Models\V2\Posts\Post::GALLERY_FORMAT)
                                                    <i class="la la-camera"></i>
                                                @endif
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="post-entry-content">
                                    <span class="meta-category-small">
                                        <a class="post-category-color-text" style="background:{{$latestPost->category->color_hex}}" href="#">
                                            {{$latestPost->category->translation->name}}
                                        </a>
                                    </span>
                                    <span class="post-meta meta-main-img auto_image_with_date">
                                        <span class="post-date">
                                            <i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($latestPost->created_at))}}
                                        </span>
{{--                                        <span class="meta-comment">--}}
{{--                                            <a href="#">--}}
{{--                                                <i class="fa fa-comment"></i>0--}}
{{--                                            </a>--}}
{{--                                        </span>--}}
                                    </span>
                                    <h3 class="image-post-title">
                                        <a href="{{route('posts.single', $latestPost->slug)}}">
                                            {{$latestPost->translation->title}}
                                        </a>
                                    </h3>
                                    <div class="large_post_content">
                                        <p>{{ strip_tags(\Illuminate\Support\Str::limit($latestPost->translation->body, 100, '...')) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- start sidebar -->
                <div class="col-md-4" id="sidebar">
                    <div id="socialcountplus-2" class="widget widget_socialcountplus">
                        <div class="social-count-plus">
                            <ul class="default">
                                <li class="count-facebook">
                                    <a class="icon" href="https://www.facebook.com/" rel="nofollow noopener noreferrer" target="_blank"></a><span class="items"><span class="count">20.5k</span><span class="label">likes</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="jl_none_space"></span>
                    <div id="disto_category_image_widget_register-5" class="widget jellywp_cat_image">
                        <div class="wrapper_category_image">
                            <div class="category_image_wrapper_main">
                                <div class="category_image_bg_image" style="background-image: url('img/400x280.png');">
                                    <a class="category_image_link" id="category_color_2" href="#">
                                        <span class="jl_cm_overlay"><span class="jl_cm_name">Active</span>
                                            <span class="jl_cm_count">11</span>
                                        </span>
                                    </a>
                                    <div class="category_image_bg_overlay" style="background: #ed1c1c;"></div>
                                </div>
                            </div>
                            <span class="jl_none_space"></span>
                        </div>
                    </div>
                    <span class="jl_none_space"></span>
                    @include('front.V2.posts.recent_posts')
                    @include('front.V2.sliders.widget')

                </div>
                <!-- end sidebar -->
            </div>

{{--            @include('front.V2.posts.footer_posts')--}}
        </div>
    </div>
@endsection
