<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">GerakID</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/events">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/categories">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/about">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>

            <ul class="dropdown-menu">

              {{-- User --}}
              <li>
                <a class="dropdown-item" href="/dashboard">
                  <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/dashboard/events">
                  <i class="bi bi-file-post"></i> My Event
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>

              {{-- Admin --}}
              @can('admin') 
                <h6 class="text-center">
                  <span>Admin</span>
                </h6>
                <li>
                  <a class="dropdown-item" href="/dashboard/users">
                    <i class="bi bi-card-list"></i> Users
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/dashboard/categories">
                    <i class="bi bi-card-list"></i> Categories
                  </a>
                </li>
                <hr class="my-1">
              @endcan

              {{-- Logout --}}
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
          </li>
          @endauth
        </ul>

      </div>
    </div>
  </nav>