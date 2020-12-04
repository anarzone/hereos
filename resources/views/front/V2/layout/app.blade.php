<!DOCTYPE html>
<html lang="en-US">
    @include('front.V2.layout.partials.header')

    <body class="mobile_nav_class jl-has-sidebar">
    <div class="options_layout_wrapper jl_radius jl_none_box_styles jl_border_radiuss">
        <div class="options_layout_container full_layout_enable_front">
            <!-- Start header -->
            <header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cusdate_head">
                <!-- Start Main menu -->
                <div class="jl_blank_nav"></div>
                <div id="menu_wrapper" class="menu_wrapper jl_menu_sticky jl_stick ">
                    <div class="container">
                        <div class="row">
                            <div class="main_menu col-md-12">
                                <div class="logo_small_wrapper_table">
                                    <div class="logo_small_wrapper">
                                        <!-- begin logo -->
                                        <a class="logo_link" href="{{route('home')}}">
                                            <img src="{{asset('V2/front/img/seom_logo.png')}}" alt="Seom" />
                                        </a>
                                        <!-- end logo -->
                                    </div>
                                </div>
                                <!-- main menu -->
                                @include('front.V2.nav.main_menu')
                                <!-- end main menu -->
                                @include('front.V2.nav.search_header')
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @include('front.V2.nav.mobile_menu')

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
