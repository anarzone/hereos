<!-- Main Sidebar Container -->
<style>
    .activeItem{
        background-color: #50606d;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('back/dist/img/seom_128.png')}}" alt="Seom Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="p-2 brand-text font-weight-light">SEOM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="{{asset('back/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">--}}
{{--                    username--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'posts.index') === 0 ? 'activeItem' : '' }}">
                            <a href="{{ route('posts.index')}}" class="nav-link">
                                <i class="fas fa-blog nav-icon"></i>
                                <p>All Posts</p>
                            </a>
                        </li>
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'posts.create') === 0 ? 'activeItem' : '' }}">
                            <a href="{{route('posts.create')}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li>
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'posts.deleted_posts') === 0 ? 'activeItem' : '' }}">
                            <a href="{{route('posts.deleted_posts')}}" class="nav-link">
                                <i class="fas fa-trash-alt nav-icon"></i>
                                <p>Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-hashtag"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'categories.index') === 0 ? 'activeItem' : '' }}">
                            <a href="{{ route('categories.index')}}" class="nav-link">
                                <i class="fas fa-circle-notch nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'categories.create') === 0 ? 'activeItem' : '' }}">
                            <a href="{{route('categories.create')}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
{{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>All users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'pages.index') === 0 ? 'activeItem' : '' }}">
                            <a href="{{route('pages.index')}}" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>All pages</p>
                            </a>
                        </li>
                        <li class="nav-item {{strpos(Route::currentRouteName(), 'pages.create') === 0 ? 'activeItem' : '' }}">
                            <a href="{{route('pages.create')}}" class="nav-link">
                                <i class="fas fa-file-medical nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search-dollar"></i>

                        <p>
                            Seo
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
