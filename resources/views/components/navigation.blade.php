<nav class="navbar navbar-light border-bottom fixed-top">
  <div class="container n-navbar">
    <a class="navbar-brand" href="#">Chat System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Options</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item mb-2">
              <a class="btn btn-outline-success" href="{{'/'}}">Home</a>
          </li>
          <li class="nav-item mb-2">
            <a href="{{route('user-profile')}}" class="btn btn-outline-success">Profile</a>
          </li>
          <li class="nav-item mb-2">
              <form action="{{ route('logout') }}" method="post" class="mb-3">
                  @csrf
                  <button class="btn btn-outline-success" type="submit">Log out</button>
              </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>