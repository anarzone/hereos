<div class="jl_home_section jl_home_mbg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 jl_mid_main_3col">
                <div class="jl_3col_wrapin">
                    <div class="jl_main_with_right_post jelly_homepage_builder">
                        <div class="homepage_builder_title">
                            <h2 class="builder_title_home_page">
                                {{__('nav.topWeek')}}
                            </h2>
                        </div>
                        @if(isset($topWeek))
                            <div class="jl_main_post_style_padding">
                                <div class="jl_main_post_style">
                                    <span  class="image_grid_header_absolute"
                                           style="background-image: url({{asset('storage/'.$topWeek['main']->carousel_banner_image)}})"
                                    >
                                    </span>
                                    <a href="#" class="link_grid_header_absolute" title="It’s always fun time and smile in the summer"></a>
                                    <div class="post-entry-content"> <span class="meta-category-small">
                                            <a class="post-category-color-text" style="background:{{$topWeek['main']->category->color_hex}}" href="#">
                                                {{$topWeek['main']->category->translation->name}}
                                            </a>
                                        </span>
                                        <h3 class="image-post-title">
                                            <a href="{{route('posts.single', $topWeek['main']->slug)}}">
                                                {{ $topWeek['main']->translation->title }}
                                            </a>
                                        </h3>
                                        <span class="jl_post_meta">
                                            <span class="jl_author_img_w">
    {{--                                            <img src="img/favicon.jpg" width="30" height="30" alt="Anna Nikova" class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" />--}}
    {{--                                            <a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>--}}
                                            </span>
                                            <span class="post-date"><i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($topWeek['main']->created_at))}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($topWeek['right']))
                            @foreach($topWeek['right'] as $post)
                                <div class="jl_list_post_wrapper">
                                    <a href="#" class="jl_small_format feature-image-link image_post featured-thumbnail">
                                        <img width="120" height="120" src="{{asset('storage/'.$post->carousel_small_image)}}" class="attachment-disto_small_feature size-disto_small_feature wp-post-image" alt="" />
                                        <div class="background_over_image"></div>
                                    </a>
                                    <div class="item-details">
                                        <span class="meta-category-small">
                                            <a class="post-category-color-text" style="background:{{$post->category->color_hex}}" href="#">
                                                {{$post->category->translation->name}}
                                            </a>
                                        </span>
                                        <h3 class="feature-post-title">
                                            <a href="{{route('posts.single', $post->slug)}}">
                                                {{ $post->translation->title }}
                                            </a>
                                        </h3>
                                        <span class="post-meta meta-main-img auto_image_with_date">
                                                        <span class="post-date"><i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($post->created_at))}}</span>
                                                    </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                </div>
                    @if(isset($topWeek['bottom']))
                        <div class="jelly_homepage_builder jl_nonav_margin homepage_builder_3grid_post jl_cus_grid_overlay jl_fontsize20 jl_cus_grid3">
                        <div class="jl_wrapper_row jl-post-block-314983">
                            <div class="row">
                                @foreach($topWeek['bottom'] as $index => $bottomPost)
                                    <div class="col-md-4 blog_grid_post_style jl_row_{{$index+1}}">
                                        <div class="jl_grid_box_wrapper">
                                            <span class="image_grid_header_absolute"
                                                  style="background-image: url({{asset('storage/'.$bottomPost->thumbnail_image)}})"
                                            ></span>
                                            <a href="#" class="link_grid_header_absolute" title="">
                                            </a>
                                            <span class="meta-category-small">
                                                <a class="post-category-color-text" style="background:{{$bottomPost->category->color_hex}}" href="#">
                                            {{$bottomPost->category->translation->name}}
                                        </a>
                                            </span>
                                            <div class="post-entry-content">
                                                <h3 class="image-post-title">
                                                    <a href="{{route('posts.single', $bottomPost->slug)}}">
                                                        {{ $bottomPost->translation->title }}
                                                    </a>
                                                </h3>
                                                <span class="jl_post_meta">
{{--                                                    <span class="jl_author_img_w"> --}}
{{--                                                        <img src="img/favicon.jpg" width="30" height="30" alt="Anna Nikova" class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" />--}}
{{--                                                        <a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>--}}
{{--                                                    </span>--}}
                                                    <span class="post-date"><i class="fa fa-clock-o"></i>{{date('d M, Y', strtotime($bottomPost->created_at))}}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clear_line_3col_home"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
