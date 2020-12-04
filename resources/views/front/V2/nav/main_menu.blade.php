<div class="menu-primary-container navigation_wrapper">
    <ul id="mainmenu" class="jl_main_menu">
        @foreach($categories as $category)
            <li class="menu-item">
                <a href="{{route('category.posts', $category->slug)}}">
                    {{$category->translation->name}}<span class="border-menu"></span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
