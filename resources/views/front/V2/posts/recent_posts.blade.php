<div id="disto_recent_post_widget-7" class="widget post_list_widget">
    <div class="widget_jl_wrapper"><span class="jl_none_space"></span>
        <div class="widget-title">
            <h2>{{__('nav.recentPosts')}}</h2>
        </div>
        <div>
            <ul class="feature-post-list recent-post-widget">
                @foreach($latestThreePosts as $latestPost)
                    <li>
                        <a href="#" class="jl_small_format feature-image-link image_post featured-thumbnail" title="Sitting right here waiting for you come to me">
                            <img width="120" height="120" src="{{ asset('storage/'.$latestPost->carousel_small_image) }}" class="attachment-disto_small_feature size-disto_small_feature wp-post-image" alt="" />
                            <div class="background_over_image"></div>
                        </a>
                        <div class="item-details">
                            <span class="meta-category-small">
                                <a class="post-category-color-text" style="background:{{$latestPost->category->color_hex}}" href="#">
                                    {{$latestPost->category->translation->name}}
                                </a>
                            </span>
                            <h3 class="feature-post-title">
                                <a href="{{route('posts.single', $latestPost->slug)}}">
                                    {{$latestPost->translation->title}}
                                </a>
                            </h3>
                            <span class="post-meta meta-main-img auto_image_with_date">
                                <span class="post-date">
                                    <i class="fa fa-clock-o"></i>
                                    {{date('d M, Y', strtotime($latestPost->created_at))}}
                                </span>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <span class="jl_none_space"></span>
    </div>
</div>
<span class="jl_none_space"></span>
