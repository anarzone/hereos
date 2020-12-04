@extends('front.V2.layout.app')

@section('title', 'test title')

@section('content')
    <div class="main_title_wrapper category_title_section jl_cat_img_bg">
        <div class="category_image_bg_image" style="background-image: url({{asset('storage/'.$category->cover)}});"></div>
        <div class="category_image_bg_ov"></div>
        <div class="jl_cat_title_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 main_title_col">
                        <div class="jl_cat_mid_title">
                            <h3 class="categories-title title">{{$category->translation->name}}</h3>
{{--                            <p>Sample category description goes here</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jl_post_loop_wrapper">
        <div class="container" id="wrapper_masonry">
            <div class="row">
                <div class="col-md-8 grid-sidebar" id="content">
                    <div class="jl_wrapper_cat">
                        <div id="content_masonry" class="pagination_infinite_style_cat ">
                            @foreach($category->posts as $post)
                                <div class="box jl_grid_layout1 blog_grid_post_style post-2970 post type-post status-publish format-gallery has-post-thumbnail hentry category-business tag-inspiration tag-morning tag-racing post_format-post-format-gallery" data-aos="fade-up">
                                    <div class="post_grid_content_wrapper">
                                        <div class="image-post-thumb">
                                            <a href="#" class="link_image featured-thumbnail" title="People are enjoy the job that they love">
                                                <img width="780" height="450" src="{{asset('storage/'.$post->thumbnail_image)}}" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />
                                                <div class="background_over_image"></div>
                                            </a>
                                            <span class="meta-category-small">
                                                <a class="post-category-color-text" style="background:{{$category->color_hex}}" href="#">
                                                    {{$category->translation->name}}
                                                </a>
                                            </span>
                                            @if($post->format != \App\Models\V2\Posts\Post::STANDARD_FORMAT)
                                                <span class="jl_post_type_icon">
                                                    @if($post->format == \App\Models\V2\Posts\Post::AUDIO_FORMAT)
                                                        <i class="la la-volume-up"></i>
                                                    @elseif($post->format == \App\Models\V2\Posts\Post::VIDEO_FORMAT)
                                                        <i class="la la-play"></i>
                                                    @elseif($post->format == \App\Models\V2\Posts\Post::GALLERY_FORMAT)
                                                        <i class="la la-camera"></i>
                                                    @endif
                                                </span>
                                            @endif
                                        </div>
                                        <div class="post-entry-content">
                                            <div class="post-entry-content-wrapper">
                                                <div class="large_post_content">
                                                    <h3 class="image-post-title">
                                                        <a href="{{route('posts.single', $post->slug)}}">{{$post->translation->title}}</a>
                                                    </h3>
                                                    <span class="jl_post_meta">
{{--                                                        <span class="jl_author_img_w">--}}
{{--                                                            <img src="img/favicon.jpg" width="30" height="30" alt="Anna Nikova" class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" />--}}
{{--                                                            <a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>--}}
{{--                                                        </span>--}}
                                                        <span class="post-date">
                                                            <i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($post->created_at))}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           </div>
                        <nav class="jellywp_pagination"></nav>
                    </div>
                </div>
                <!-- start sidebar -->
                <div class="col-md-4" id="sidebar">
{{--                    <div id="socialcountplus-2" class="widget widget_socialcountplus">--}}
{{--                        <div class="social-count-plus">--}}
{{--                            <ul class="default">--}}
{{--                                <li class="count-facebook">--}}
{{--                                    <a class="icon" href="https://www.facebook.com/" rel="nofollow noopener noreferrer" target="_blank"></a><span class="items"><span class="count">20.5k</span><span class="label">likes</span></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span class="jl_none_space"></span>--}}

{{--                    <div id="disto_category_image_widget_register-5" class="widget jellywp_cat_image">--}}
{{--                        <div class="wrapper_category_image">--}}
{{--                            <div class="category_image_wrapper_main">--}}
{{--                                <div class="category_image_bg_image" style="background-image: url('img/400x280.png');"><a class="category_image_link" id="category_color_2" href="#"><span class="jl_cm_overlay"><span class="jl_cm_name">Active</span><span class="jl_cm_count">11</span></span></a>--}}
{{--                                    <div class="category_image_bg_overlay" style="background: #ed1c1c;"></div>--}}
{{--                                </div>--}}
{{--                                <div class="category_image_bg_image" style="background-image: url('img/400x280.png');"><a class="category_image_link" id="category_color_3" href="#"><span class="jl_cm_overlay"><span class="jl_cm_name">Business</span><span class="jl_cm_count">10</span></span></a>--}}
{{--                                    <div class="category_image_bg_overlay" style="background: #0015ff;"></div>--}}
{{--                                </div>--}}
{{--                                <div class="category_image_bg_image" style="background-image: url('img/400x280.png');"><a class="category_image_link" id="category_color_4" href="#"><span class="jl_cm_overlay"><span class="jl_cm_name">Crazy</span><span class="jl_cm_count">5</span></span></a>--}}
{{--                                    <div class="category_image_bg_overlay" style="background: #d1783c;"></div>--}}
{{--                                </div>--}}
{{--                            </div> <span class="jl_none_space"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span class="jl_none_space"></span>--}}
                    @include('front.V2.posts.recent_posts')
                    @include('front.V2.sliders.widget')
                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </div>
    <!-- end content -->
@endsection
