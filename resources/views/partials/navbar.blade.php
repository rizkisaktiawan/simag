<nav class="navbar navbar-expand-lg navbar-white bg-info">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="img/agronesia_headLogo.png" alt="SIMAG" width=30 class="img-thumbnail"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ $active === "home" ? 'active' :''}}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active === "posts" ? 'active' :''}}" href="/posts">Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active === "categories" ? 'active' :''}}" href="/categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active === "about" ? 'active' :''}}" href="/about">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Wellcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</a></button>
              </form>
            </li>
          </ul>
        @else        
          <li class="nav-item">
            <a href="/login" class="nav-link {{ $active === "login" ? 'active' :''}}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        </ul>
        @endauth
        
      </div>
    </div>
  </nav>