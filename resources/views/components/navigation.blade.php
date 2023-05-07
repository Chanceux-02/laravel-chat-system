<nav class="navbar navbar-light border-bottom fixed-top">
    <div class="container n-navbar">
      <a class="navbar-brand" href="#">Chat System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Option</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item mb-2">
                <a class="btn btn-outline-success" href="{{'/'}}">Home</a>
            </li>
            <li class="nav-item mb-2">
                <form action="{{ route('logout') }}" method="post" class="mb-3">
                    @csrf
                    <button class="btn btn-outline-success" type="submit">Log out</button>
                </form>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <div class="mt-3">
            {{-- contacts --}}
            <div class="">
                <a href="http://" class="text-decoration-none text-white">
                  <div class="d-flex align-items-center py-2 border-bottom nav-contacts">
                      <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                      <p class="ms-2 name-font">Johan Wris</p>
                      <span class="nav-active-circle border rounded-circle"></span>
                  </div>
                </a>
                <a href="http://" class="text-decoration-none text-white">
                  <div class="d-flex py-2 align-items-center border-bottom nav-contacts">
                      <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                      <p class="ms-2 name-font">Johan Wris</p>
                      <span class="nav-deactive-circle border rounded-circle"></span>
                  </div>
                </a>
                <a href="http://" class="text-decoration-none text-white">
                  <div class="d-flex py-2 align-items-center border-bottom nav-contacts">
                      <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                      <p class="ms-2 name-font">Johan Wris</p>
                      <span class="nav-active-circle border rounded-circle"></span>
                  </div>
                </a>
                <a href="http://" class="text-decoration-none text-white">
                  <div class="d-flex py-2 align-items-center border-bottom nav-contacts">
                      <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                      <p class="ms-2 name-font">Johan Wris</p>
                      <span class="nav-active-circle border rounded-circle"></span>
                  </div>
                </a>
                <a href="http://" class="text-decoration-none text-white">
                  <div class="d-flex py-2 align-items-center border-bottom nav-contacts">
                      <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                      <p class="ms-2 name-font">Johan Wris</p>
                      <span class="nav-deactive-circle border rounded-circle"></span>
                  </div>
                </a>
            </div>    
        </div>
      </div>
    </div>
  </nav>