<div id="disto_recent_large_slider_widgets-5" class="widget jl_widget_slider">
    <div class="slider_widget_post jelly_loading_pro">
        @foreach($widgetPosts as $post)
            <div class="recent_post_large_widget">
                <span class="image_grid_header_absolute" style="background-image: url({{asset('storage/'.$post->thumbnail_image)}})"></span>
                <a href="#" class="link_grid_header_absolute" title="Standing right here and singing until the mid"></a>
                <span class="meta-category-small">
                    <a class="post-category-color-text" style="background:{{$post->category->color_hex}}" href="#">
                        {{$post->category->translation->name}}
                    </a>
                </span>
                <div class="wrap_box_style_main image-post-title">
                    <h3 class="image-post-title">
                        <a href="{{route('posts.single', $post->slug)}}">
                            {{$post->translation->title}}
                        </a>
                    </h3>
                    <span class="jl_post_meta" >
{{--                        <span class="jl_author_img_w">--}}
{{--                            <img src="img/favicon.jpg" width="30" height="30" alt="Anna Nikova" class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" />--}}
{{--                            <a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>--}}
{{--                        </span>--}}
                        <span class="post-date">
                            <i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($post->created_at))}}
                        </span>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
    <span class="jl_none_space"></span>
</div>
