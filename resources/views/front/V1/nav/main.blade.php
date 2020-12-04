<!-- site header
        ================================================== -->
<header class="s-header">

    <div class="header__top">
        <div class="header__logo">
            <a class="site-logo" href="{{route('home')}}">
                <svg width="293" height="70" viewBox="0 0 293 70" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#fff}</style></defs><path fill="none" id="canvas_background" d="M-1-1h295v72H-1z"/><g><g stroke="null" id="Layer_2"><g stroke="null" id="Seom"><g stroke="null" id="on_a_black_background"><path stroke="null" id="svg_1" d="M131.268 30.755c-5.011-1.889-9.716-2.747-15.738-2.747-9.913 0-15.896 3.524-15.896 9.466 0 4.926 4.312 7.854 13.02 8.78l3.086.334c4.354.477 6.258 1.255 6.258 2.658 0 1.702-2.255 2.717-6.956 2.717-5.675 0-9.6-1.193-12.827-2.836l-4.031 5.906c4.915 2.66 11.622 3.405 16.752 3.405 10.92 0 17.294-3.853 17.294-9.824 0-4.897-4.547-7.706-12.708-8.66l-3.332-.381c-3.42-.389-6.142-.81-6.142-2.48 0-1.581 1.946-2.628 5.79-2.628 4.239.03 9.018 1.225 12.01 2.361l3.42-6.07z" class="cls-1"/><path stroke="null" id="svg_2" d="M154.204 27.97c-11.272 0-19.046 6.206-19.046 15.323s8.006 15.14 19.552 15.14c6.32 0 11.777-1.374 16.05-4.39l-5.945-5.016a15.229 11.702 0 01-9.523 2.776c-4.782 0-8.588-1.82-9.677-6.003h26.687a29.236 22.465 0 00.193-2.628c-.025-9.012-7.448-15.201-18.291-15.201zm-.077 6.722c4.35 0 7.268 2.09 8.199 5.793h-16.672c.892-3.578 3.69-5.788 8.473-5.788v-.005z" class="cls-1"/><path stroke="null" id="svg_3" d="M195.73 27.97c-11.697 0-20.324 6.511-20.324 15.232s8.627 15.23 20.323 15.23 20.408-6.51 20.408-15.23-8.67-15.231-20.408-15.231zm0 7.259c5.716 0 10.028 3.286 10.028 7.973s-4.312 7.973-10.029 7.973-9.986-3.287-9.986-7.976 4.273-7.965 9.986-7.965v-.005z" class="cls-1"/><path stroke="null" id="svg_4" d="M265.409 27.97c-4.916 0-9.87 1.285-12.785 4.96-2.528-3.07-6.995-4.96-12.437-4.96-4.277 0-8.396 1.107-11.079 4.183v-3.4h-9.87v28.94h10.144v-15.86c0-4.36 3.614-6.54 7.968-6.54 4.624 0 7.345 2.3 7.345 6.476v15.92h10.145V41.833c0-4.36 3.613-6.54 7.967-6.54 4.586 0 7.346 2.298 7.346 6.475v15.92h10.106v-18.43c0-6.702-5.987-11.288-14.85-11.288z" class="cls-1"/><path stroke="null" id="svg_5" d="M81.35 39.713a36.687 28.19 0 00-1.584-8.216L61.258 45.722a3.448 2.65 0 01-2.36.777H37.324a1.538 1.182 0 01-.575-.084 1.457 1.12 0 01-.812-.618 1.468 1.128 0 01-.108-.44V28.8a3.413 2.623 0 011.004-1.846L55.345 12.73a36.708 28.206 0 10-10.7 55.19c20.935 0 36.705-13.137 36.705-28.206z" fill="#0153ff"/><path stroke="null" id="svg_6" d="M79.76 31.503L61.25 45.724a3.511 2.698 0 01-1.029.54l21.125-6.691a36.904 28.358 0 00-1.588-8.07z" fill="url(#linear-gradient)"/><path stroke="null" id="svg_7" d="M36.735 46.42a1.538 1.182 0 00.575.084h21.574a3.448 2.65 0 002.36-.777l18.508-14.224a36.782 28.263 0 00-24.407-18.774L36.836 26.953a3.413 2.623 0 00-1.004 1.846v16.564a1.464 1.125 0 00.432.81 1.454 1.117 0 00.47.248z" fill="#13bcff"/><path stroke="null" id="svg_8" d="M55.345 12.729a36.782 28.263 0 0124.421 18.768l14.555-11.176a1.324 1.017 0 00.281-.323 1.306 1.004 0 000-.764 1.324 1.017 0 00-.28-.324L71.717 1.55a1.292.993 0 00-1.83 0L55.346 12.73z" fill="#5fecfd" fill-rule="evenodd"/></g></g></g></g></svg>
            </a>
        </div>

        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="{{route('search')}}">
                <label>
                    <input type="search" class="header__search-field" placeholder="Açar sözlər yazın" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="header__search-submit" value="Search">
            </form>

            <a href="" title="Close Search" class="header__search-close">Close</a>

        </div>
        <!-- end header__search -->

        <!-- toggles -->
        <a href="#0" class="header__search-trigger"></a>
        <a href="#0" class="header__menu-toggle"><span>Menu</span></a>

    </div> <!-- end header__top -->

    <nav class="header__nav-wrap">

        <ul class="header__nav">
            <li class="sidebar-element {{strpos(Route::currentRouteName(), 'home') === 0 ? 'current' : '' }}"><a href="{{route('home')}}" title="home">Home</a></li>

            @foreach($categories as $category)
                <li class="sidebar-element {{ request()->path() == 'category/'.$category->slug ? 'current' : '' }}">
                    <a href="{{route('category.single', $category->slug)}}" title="">{{ucfirst($category->name)}}</a>
                </li>
            @endforeach

            @foreach($pages as $page)
                <li class="sidebar-element {{request()->path() == $page->slug ? 'current' : '' }}">
                    <a href="{{ route('page.single', $page->slug )}}">{{$page->title}}</a>
                </li>
            @endforeach
        </ul> <!-- end header__nav -->

        <ul class="header__social">
            <li class="ss-facebook">
                <a href="https://www.facebook.com/seomaz-111220567088538" target="_blank">
                    <span class="screen-reader-text">Facebook</span>
                </a>
            </li>
            <li class="ss-instagram">
                <a href="https://www.instagram.com/seom.az" target="_blank">
                    <span class="screen-reader-text">Instagram</span>
                </a>
            </li>
            <li class="ss-email">
                <a href="mailto:seo-m.az@yandex.com" target="_blank">
                    <span class="screen-reader-text">Email</span>
                </a>
            </li>
        </ul>

    </nav> <!-- end header__nav-wrap -->



</header> <!-- end s-header -->
