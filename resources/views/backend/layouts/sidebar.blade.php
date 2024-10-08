


<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Role and Permission</span>
        </a>


        <li class="sidebar-item ">
            <a class="sidebar-link" href="">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>


        <li class="sidebar-item {{ Request::is('articles*') ? 'active' : '' }}">
            <a href="{{ route('articles.index') }}" class="sidebar-link">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Article</span>
            </a>
        </li>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Role and Permission Management
            </li>



            <li class="sidebar-item {{ Request::is('permissions*') ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Permission</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">User Role Assign</span>
                </a>
            </li>




        </ul>


            {{-- <li class="sidebar-item active">
                <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
                    <i class="align-middle" data-feather="sliders"></i> <span
                    class="align-middle">Role Management</span>
                </a>
                <ul id="ui" class="sidebar-dropdown  active collapse " data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('permissions.index')}}">list </a>
                    </li>

                </ul>
            </li> --}}

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div>
    </div>
</nav>
