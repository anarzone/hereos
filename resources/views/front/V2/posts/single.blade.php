@extends('front.V2.layout.app')

@section('title', 'test title')

@section('content')
        <!-- begin content -->
        <section id="content_main" class="clearfix jl_spost">
            <div class="container">
                <div class="row main_content">
                    <div class="col-md-8  loop-large-post" id="content">
                        <div class="widget_container content_page">
                            <!-- start post -->
                            <div class="post-2808 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-gaming tag-morning tag-relaxing" id="post-2808">
                                <div class="single_section_content box blog_large_post_style">
                                    <div class="jl_single_style2">
                                        <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                                            <span class="meta-category-small single_meta_category">
                                                <a class="post-category-color-text" style="background:{{$post->category->color_hex}}" href="#">
                                                    {{$post->category->translation->name}}
                                                </a>
                                            </span>
                                            <h1 class="single_post_title_main">
                                                {{$post->translation->title}}
                                            </h1>
{{--                                            <p class="post_subtitle_text">--}}
{{--                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.                            --}}
{{--                                            </p>--}}
                                            <span class="single-post-meta-wrapper">
{{--                                                <span class="post-author">--}}
{{--                                                    <span>--}}
{{--                                                        <img src="img/favicon.jpg" width="50" height="50" alt="Anna Nikova" class="avatar avatar-50 wp-user-avatar wp-user-avatar-50 alignnone photo" />--}}
{{--                                                        <a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>--}}
{{--                                                    </span>--}}
{{--                                                </span>--}}
                                                <span class="post-date updated">
                                                    <i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($post->created_at))}}
                                                </span>
{{--                                                <span class="meta-comment">--}}
{{--                                                    <i class="fa fa-comment"></i>--}}
{{--                                                    <a href="#">0 Comment</a>--}}
{{--                                                </span>--}}
{{--                                                <a href="#" class="jm-post-like" data-post_id="2808" title="Like">--}}
{{--                                                    <i class="fa fa-heart-o"></i>4--}}
{{--                                                </a>--}}
{{--                                                <span class="view_options">--}}
{{--                                                    <i class="fa fa-eye"></i>4.8k--}}
{{--                                                </span>--}}
                                            </span>
                                        </div>
                                        <div class="single_content_header jl_single_feature_below">
                                            <div class="image-post-thumb jlsingle-title-above">
                                                <img width="1000" height="668" src="{{asset('storage/'.$post->cover)}}" class="attachment-disto_justify_feature size-disto_justify_feature wp-post-image" alt=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post_content">
                                        {!!$post->translation->body!!}
                                    </div>
                                    <div class="clearfix"></div>
{{--                                    <div class="single_tag_share">--}}
{{--                                        <div class="tag-cat">--}}
{{--                                            <ul class="single_post_tag_layout"><li><a href="#" rel="tag">Gaming</a></li><li><a href="#" rel="tag">morning</a></li><li><a href="#" rel="tag">Relaxing</a></li></ul>                                                                    </div>--}}

{{--                                        <div class="single_post_share_icons">--}}
{{--                                            Share<i class="fa fa-share-alt"></i></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="single_post_share_wrapper">--}}
{{--                                        <div class="single_post_share_icons social_popup_close"><i class="fa fa-close"></i></div>--}}
{{--                                        <ul class="single_post_share_icon_post">--}}
{{--                                            <li class="single_post_share_facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                            <li class="single_post_share_twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                            <li class="single_post_share_pinterest"><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                                            <li class="single_post_share_linkedin"><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                                            <li class="single_post_share_ftumblr"><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


                                    @if($previousPost)
                                        <div class="postnav_left">
                                            <div class="single_post_arrow_content">
                                                <a href="{{route('posts.single',$previousPost->slug)}}" id="prepost">
                                                    {{$previousPost->translation->title}}
                                                    <span class="jl_post_nav_left">
                                                        {{__('nav.previousPost')}}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if($nextPost)
                                        <div class="postnav_right">
                                            <div class="single_post_arrow_content">
                                                <a href="{{route('posts.single',$nextPost->slug)}}" id="nextpost">
                                                    {{$nextPost->translation->title}}
                                                    <span class="jl_post_nav_left">
                                                         {{__('nav.nextPost')}}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

{{--                                    <div class="auth">--}}
{{--                                        <div class="author-info">--}}
{{--                                            <div class="author-avatar">--}}
{{--                                                <img src="img/favicon.jpg" width="165" height="165" alt="Anna Nikova" class="avatar avatar-165 wp-user-avatar wp-user-avatar-165 alignnone photo" />--}}
{{--                                            </div>--}}
{{--                                            <div class="author-description">--}}
{{--                                                <h5><a href="#">--}}
{{--                                                        Anna Nikova</a>--}}
{{--                                                </h5>--}}
{{--                                                <p>--}}
{{--                                                    welcome Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum.--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="related-posts">
                                        <h4>
                                            {{__('nav.relatedPosts')}}
                                        </h4>
                                        <div class="single_related_post">
                                            @foreach($relatedPosts as $index => $post)
                                                <div class="jl_related_feature_items">
                                                    <div class="jl_related_feature_items_in">
                                                        <div class="image-post-thumb">
                                                            <a href="#" class="link_image featured-thumbnail" title="People are enjoy the job that they love">
                                                                <img width="780" height="450" src="{{asset('storage/'.$post->thumbnail_image)}}" class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image" alt="" />
                                                                <div class="background_over_image"></div>
                                                            </a>
                                                        </div>
                                                        <span class="meta-category-small">
                                                            <a class="post-category-color-text" style="background:{{$post->category->color_hex}}" href="#">
                                                                {{$post->category->translation->name}}
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
                                                        <div class="post-entry-content">
                                                            <h3 class="jl-post-title">
                                                                <a href="{{route('posts.single', $post->slug)}}">
                                                                    {{$post->translation->title}}
                                                                </a>
                                                            </h3>
                                                            <span class="jl_post_meta" >
{{--                                                                <span class="jl_author_img_w">--}}
{{--                                                                    <img src="img/favicon.jpg" width="30" height="30" alt="Anna Nikova" class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" />--}}
{{--                                                                    <a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>--}}
{{--                                                                </span>--}}
                                                                <span class="post-date">
                                                                    <i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($post->created_at))}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($index == 1)
                                                    <div class="clear_2col_related"></div>
                                                @elseif($index == 2)
                                                    <div class="clear_3col_related"></div>
                                                @elseif($index == 3)
                                                    <div class="clear_2col_related"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- comment -->

{{--                                    <div id="respond" class="comment-respond">--}}
{{--                                        <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small></h3>--}}
{{--                                        <form action="#" method="post" id="commentform" class="comment-form">--}}
{{--                                            <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>--}}
{{--                                            </p>--}}
{{--                                            <p class="comment-form-comment">--}}
{{--                                                <textarea class="u-full-width" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment"></textarea>--}}
{{--                                            </p>--}}
{{--                                            <div class="form-fields row"><span class="comment-form-author col-md-4"><input id="author" name="author" type="text" value="" size="30" placeholder="Fullname"></span>--}}
{{--                                                <span class="comment-form-email col-md-4"><input id="email" name="email" type="text" value="" size="30" placeholder="Email Address"></span>--}}
{{--                                                <span class="comment-form-url col-md-4"><input id="url" name="url" type="text" value="" size="30" placeholder="Web URL"></span>--}}
{{--                                            </div>--}}
{{--                                            <p class="form-submit">--}}
{{--                                                <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">--}}
{{--                                            </p>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                    <!-- #respond -->

                                </div>
                            </div>
                            <!-- end post -->
                            <div class="brack_space"></div>
                        </div>
                    </div>

                    <!-- start sidebar -->
                    <div class="col-md-4" id="sidebar">
{{--                        <div id="socialcountplus-2" class="widget widget_socialcountplus">--}}
{{--                            <div class="social-count-plus">--}}
{{--                                <ul class="default">--}}
{{--                                    <li class="count-facebook">--}}
{{--                                        <a class="icon" href="https://www.facebook.com/" rel="nofollow noopener noreferrer" target="_blank"></a><span class="items"><span class="count">20.5k</span><span class="label">likes</span></span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <span class="jl_none_space"></span>--}}
{{--                        <div id="disto_category_image_widget_register-5" class="widget jellywp_cat_image">--}}
{{--                            <div class="wrapper_category_image">--}}
{{--                                <div class="category_image_wrapper_main">--}}
{{--                                    <div class="category_image_bg_image" style="background-image: url('img/400x280.png');"><a class="category_image_link" id="category_color_2" href="#"><span class="jl_cm_overlay"><span class="jl_cm_name">Active</span><span class="jl_cm_count">11</span></span></a>--}}
{{--                                        <div class="category_image_bg_overlay" style="background: #ed1c1c;"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="category_image_bg_image" style="background-image: url('img/400x280.png');"><a class="category_image_link" id="category_color_3" href="#"><span class="jl_cm_overlay"><span class="jl_cm_name">Business</span><span class="jl_cm_count">10</span></span></a>--}}
{{--                                        <div class="category_image_bg_overlay" style="background: #0015ff;"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="category_image_bg_image" style="background-image: url('img/400x280.png');"><a class="category_image_link" id="category_color_4" href="#"><span class="jl_cm_overlay"><span class="jl_cm_name">Crazy</span><span class="jl_cm_count">5</span></span></a>--}}
{{--                                        <div class="category_image_bg_overlay" style="background: #d1783c;"></div>--}}
{{--                                    </div>--}}
{{--                                </div> <span class="jl_none_space"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <span class="jl_none_space"></span>--}}
                        @include('front.V2.posts.recent_posts')
                        @include('front.V2.sliders.widget')
                    </div>
                    <!-- end sidebar -->
                </div>
            </div>
        </section>
        <!-- end content -->
@endsection
