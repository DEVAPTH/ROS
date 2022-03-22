<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown">
          <form action="logout" method="POST">
              @csrf
            <button type="submit" class="btn btn-info">Logout</button>
          </form>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <h2>Logout</h2>
          <a href="#" class="dropdown-item">
              <h2>Logout</h2>
            <!-- Message Start -->
            {{-- <div class="media"> --}}
              {{-- <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div> --}}
            {{-- </div> --}}
            <!-- Message End -->
          </a>

          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
    </ul>
  </nav>
