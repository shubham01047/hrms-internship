<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .navbar-red {
      background-color: #c62828;
    }

    .navbar-red .nav-link, .navbar-red .navbar-brand {
      color: #fff;
    }

    .navbar-red .nav-link:hover {
      color: #ffe0e0;
    }

    .sidebar-desktop {
      position: fixed;
      top: 70px;
      left: 0;
      width: 250px;
      height: 100vh;
      overflow-y: auto;
      padding: 0 10px;
      background-color: #f8f9fa;
      border-right: 1px solid #dee2e6;
      z-index: 1030;
    }

    .main-content {
      padding-top: 90px;
      padding-left: 15px;
      padding-right: 15px;
    }

    @media (min-width: 992px) {
      .main-content {
        margin-left: 250px;
      }
    }

    footer {
      margin-top: 50px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-red fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">HRMS Portal</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Leaves</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">More</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Reports</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

  <!-- Mobile Sidebar -->
  <div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="sidebarOffcanvas">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      @include('partials.sidebar')
    </div>
  </div>

  <!-- Desktop Sidebar -->
  <div class="sidebar-desktop d-none d-lg-block">
    @include('partials.sidebar')
  </div>

  <!-- Main Content -->
  <main class="main-content">
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="footer bg-danger text-white pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5 class="fw-bold">HRMS Portal</h5>
          <p>Empowering your workforce with smarter tools.</p>
        </div>
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-decoration-none">Dashboard</a></li>
            <li><a href="#" class="text-white text-decoration-none">Employees</a></li>
            <li><a href="#" class="text-white text-decoration-none">Leaves</a></li>
            <li><a href="#" class="text-white text-decoration-none">Reports</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Contact</h6>
          <p>Email: support@hrms.com<br>Phone: +91-9876543210</p>
        </div>
      </div>
      <hr class="bg-white" />
      <div class="text-center pb-3">
        &copy; {{ date('Y') }} HRMS Portal. All rights reserved.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
