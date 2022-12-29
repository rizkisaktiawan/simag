<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sales') ? 'active' : '' }}" href="/dashboard/sales">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Sale's
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    My Post's
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                        href="/dashboard/categories">
                        <span data-feather="grid" class="align-text-bottom"></span>
                        Post Categorie's
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
                        <span data-feather="user" class="align-text-bottom"></span>
                        User's
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/employees*') ? 'active' : '' }}"
                        href="/dashboard/employees">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Empoyee's
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/ticketings*') ? 'active' : '' }}"
                        href="/dashboard/ticketings">
                        <span data-feather="cpu" class="align-text-bottom"></span>
                        IT Ticketing System's
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/divisions*') ? 'active' : '' }}"
                        href="/dashboard/divisions">
                        <span data-feather="briefcase" class="align-text-bottom"></span>
                        Division's
                    </a>
                </li>
            </ul>
        @endcan

    </div>
</nav>
