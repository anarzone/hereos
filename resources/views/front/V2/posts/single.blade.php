@extends('front.V2.layout.app')

@section('title', $post->translation->title)

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
                                            <h1 class="single_post_title_main">
                                                {{$post->translation->title}}
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="post_content">
                                        {!!$post->translation->body!!}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- end post -->
                            <div class="brack_space"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content -->
@endsection
