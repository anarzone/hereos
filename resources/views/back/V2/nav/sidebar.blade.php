<nav class="pcoded-navbar">
{{--    {{dd(request()->is('manage/dashboard'))}}--}}
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">{{__('nav.navigation')}}</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu {{ request()->is('manage/dashboard', 'manage/dashboard/*') ? 'active pcoded-trigger' : '' }} ">
                    <a href="javascript:void(0)"
                       class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">{{__('nav.dashboard')}}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('manage/dashboard') ? 'active' : '' }}">
                            <a href="{{route('dashboard')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.main')}}</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('manage/dashboard/analytics') ? 'active' : '' }}">
                            <a href="{{route('analytics')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.analytics')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="pcoded-navigation-label">{{__('nav.publishing')}}</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu {{ request()->is('manage/posts', 'manage/posts/*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-edit-1"></i>
                        </span>
                        <span class="pcoded-mtext">{{__('nav.post')}}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('manage/posts') ? 'active' : '' }}">
                            <a href="{{route('manage.posts.all')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.posts')}}</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('manage/posts/create') ? 'active' : '' }}">
                            <a href="{{route('posts.create')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.newPost')}}</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('manage/posts/archive') ? 'active' : '' }}">
                            <a href="{{route('archive')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.archive')}}</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('manage/posts/editor') ? 'active' : '' }}">
                            <a href="{{route('editor')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.editorPosts')}}</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('manage/posts/banner') ? 'active' : '' }}">
                            <a href="{{route('banner')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.bannerPosts')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ request()->is('manage/categories', 'manage/categories/*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-tag"></i>
                        </span>
                        <span class="pcoded-mtext">{{__('nav.category')}}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->is('manage/categories') ? 'active' : '' }}">
                            <a href="{{route('categories.all')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.categories')}}</span>
                            </a>
                        </li>
{{--                        <li class="{{ request()->is('manage/posts/create') ? 'active' : '' }}">--}}
{{--                            <a href="{{route('categories.create')}}" class="waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">{{__('nav.newCategory')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
            </ul>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">{{__('nav.page')}}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.pages')}}</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{__('nav.newPage')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
