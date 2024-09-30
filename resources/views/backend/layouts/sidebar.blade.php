<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Role and Permission</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.html">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>


            <li class="sidebar-item active">
                <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
                    <i class="align-middle" data-feather="sliders"></i> <span
                    class="align-middle">Role</span>
                </a>
                <ul id="ui" class="sidebar-dropdown  active collapse " data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('permissions.index')}}">list </a>
                    </li>

                </ul>
            </li>






        </ul>

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
