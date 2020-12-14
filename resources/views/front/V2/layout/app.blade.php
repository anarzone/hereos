<!DOCTYPE html>
<html lang="en-US">
    @include('front.V2.layout.partials.header')

    <body class="mobile_nav_class jl-has-sidebar">
        <div class="options_layout_wrapper jl_radius jl_none_box_styles jl_border_radiuss">
            <div class="options_layout_container full_layout_enable_front">
                <header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style5_custom headcus5_custom">
                    <div class="header_main_wrapper header_style_cus5_opt">
                        <div class="container jl_header_5container">
                            <div class="row header-main-position">
                                <div class="col-md-12 logo-position-top">
                                    <div class="logo_position_wrapper">
                                        <div class="logo_position_table">
                                            <!-- begin logo -->
                                            <a class="logo_link" href="index.html">
                                               Hereos
                                            </a>
                                            <!-- end logo -->
                                            <div class="jl_header_link_subscribe">
                                                <div class="search_header_wrapper jl_menu_search search_form_menu_personal_click"><i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="search_form_menu_personal">
                    <div class="menu_mobile_large_close"><span class="jl_close_wapper search_form_menu_personal_click"><span class="jl_close_1"></span><span class="jl_close_2"></span></span>
                    </div>
                    <form method="get" class="searchform_theme" action="{{ route('posts.search') }}">
                        <input type="text" placeholder="Axtar..." value="" name="term" class="search_btn">
                        <button type="submit" class="button"><i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                @yield('content')

                @include('front.V2.layout.partials.footer')

            </div>
        </div>
        <div id="go-top">
            <a href="#go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>

        <script src="{{asset('V2/front/js/jquery.js')}}"></script>
        <script src="{{asset('V2/front/js/fluidvids.js')}}"></script>
        <script src="{{asset('V2/front/js/infinitescroll.js')}}"></script>
        <script src="{{asset('V2/front/js/justified.js')}}"></script>
        <script src="{{asset('V2/front/js/slick.js')}}"></script>
        <script src="{{asset('V2/front/js/theia-sticky-sidebar.js')}}"></script>
        <script src="{{asset('V2/front/js/aos.js')}}"></script>
        <script src="{{asset('V2/front/js/custom.js')}}"></script>

        @yield('js')
    </body>
</html>
