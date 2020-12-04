<!DOCTYPE html>
<html lang="en-US">
    @include('back.V2.layout.partials.header')
    <body>
        <div class="loader-bg">
            <div class="loader-bar"></div>
        </div>
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                @include('back.V2.nav.navbar')
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        @include('back.V2.nav.sidebar')
                        <div class="pcoded-content">
                            @yield('content')
                        </div>
                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{asset('V2/admin/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/waves.min.js')}}" ></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/jquery.slimscroll.js')}}"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/modernizr.js')}}"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/css-scrollbars.js')}}"></script>

        @yield('unique-js')


        <script src="{{asset('V2/admin/js/pcoded.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('V2/admin/js/vertical-layout.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('V2/admin/js/script.min.js')}}"></script>

        <script src="{{asset('V2/admin/js/rocket-loader.min.js')}}" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
        </script>
        <script src="{{asset('V2/admin/js/app.js')}}"></script>
        @yield('js')

    </body>
</html>
