<div id="content_nav" class="jl_mobile_nav_wrapper">
    <div id="nav" class="jl_mobile_nav_inner">
        <div class="menu_mobile_icons mobile_close_icons closed_menu"><span class="jl_close_wapper"><span class="jl_close_1"></span><span class="jl_close_2"></span></span>
        </div>
        <ul id="mobile_menu_slide" class="menu_moble_slide">
            @foreach($categories as $category)
                <li class="menu-item">
                    <a href="{{route('category.posts', $category->slug)}}">
                        {{$category->translation->name}}<span class="border-menu"></span>
                    </a>
                </li>
            @endforeach
        </ul>
        <span class="jl_none_space"></span>
        <div id="disto_about_us_widget-2" class="widget jellywp_about_us_widget">
            <div class="widget_jl_wrapper about_widget_content">
                <div class="jellywp_about_us_widget_wrapper">
                    <div class="social_icons_widget">
                        <ul class="social-icons-list-widget icons_about_widget_display">
                            <li>
                                <a href="#" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> <span class="jl_none_space"></span>
            </div>
        </div>
    </div>
</div>
<div class="search_form_menu_personal">
    <div class="menu_mobile_large_close"><span class="jl_close_wapper search_form_menu_personal_click"><span class="jl_close_1"></span><span class="jl_close_2"></span></span>
    </div>
    <form method="get" class="searchform_theme" action="#">
        <input type="text" placeholder="Search..." value="" name="s" class="search_btn" />
        <button type="submit" class="button"><i class="fa fa-search"></i>
        </button>
    </form>
</div>
<div class="mobile_menu_overlay"></div>
