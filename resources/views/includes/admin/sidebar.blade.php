<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="{{route('admin.posts.index')}}" class="nav-link">
                <i class="nav-icon fas fa-solid fa-bars"></i>
                <p>
                    Posts
                    <span class="badge badge-info right">@if(isset($posts)){{$posts->total()}} @endif</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
