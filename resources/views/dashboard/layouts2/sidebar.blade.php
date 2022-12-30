{{-- <nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    {{-- <div class="position-sticky sidebar-sticky"> --}}

    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIMAg <sup>&copy;</sup></div>
    </a>

    <hr class="sidebar-divider my-0">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>

            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/sales*') ? 'active' : '' }}" aria-current="page"
                href="/dashboard/sales">
                <i class="fas fa-fw fa-chart-simple"></i>
                <span>Sale's</span>

            </a>
        </li>


    </ul>

    @can('admin')
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Administrator
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('dashboard/posts*', 'dashboard/categories*') ? 'active' : '' }}">
            <a class="nav-link " aria-current="page" collapsed" href="#" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Post</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/dashboard/posts">Post's</a>
                    <a class="collapse-item" href="/dashboard/categories">Post Categorie's</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" aria-current="page"
                href="/dashboard/users">
                <i class="fas fa-fw fa-user"></i>
                <span>User's</span></a>
        </li>

        <ul class="nav flex-column">

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Human Resource Dev.
            </div>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/employees*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/employees">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Employee's</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/statuses*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/statuses">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Statuses</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/divisions*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/divisions">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Division's</span></a>
            </li>
        </ul>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Information Tech.
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('dashboard/ticketings*', 'dashboard/ticketings/priorities*') ? 'active' : '' }}">
            <a class="nav-link " aria-current="page" collapsed" href="#" data-toggle="collapse"
                data-target="#collapseIT" aria-expanded="true" aria-controls="collapseIT">
                <i class="fas fa-fw fa-book-open"></i>
                <span>IT Ticketing System's</span>
            </a>
            <div id="collapseIT" class="collapse" aria-labelledby="headingIT" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/dashboard/ticketings">Ticket's</a>
                    <a class="collapse-item" href="/dashboard/ticketings/priorities">Prioritie's</a>
                    <a class="collapse-item" href="/dashboard/ticketings/categories">Categorie's</a>
                    <a class="collapse-item" href="/dashboard/ticketings/cats">Cat's</a>
                </div>
            </div>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/ticketings*') ? 'active' : '' }}" aria-current="page"
                href="/dashboard/ticketings">
                <i class="fas fa-fw fa-ticket"></i>
                <span>IT Ticketing System's</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/ticketings/priorities') ? 'active' : '' }}" aria-current="page"
                href="/dashboard/ticketings/priorities">
                <i class="fas fa-fw fa-ticket"></i>
                <span>Priority</span></a>
        </li> --}}
    @endcan

    {{-- </div> --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
{{-- </nav> --}}
