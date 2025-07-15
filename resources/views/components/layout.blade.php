<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-red {
            background-color: #c62828;
            /* HRMS deep red */
        }

        .navbar-red .nav-link,
        .navbar-red .navbar-brand {
            color: #fff;
        }

        .navbar-red .nav-link:hover,
        .navbar-red .navbar-brand:hover {
            color: #ffe0e0;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: #c62828;
        }



  .sidebar-desktop {
    position: fixed;
    top: 70px;
    left: 0;
    width: 250px;
    height: 100vh;
    overflow-y: auto;
    z-index: 1030;
    padding: 0 10px;
  }

  @media (max-width: 991.98px) {
    .main-content {
      margin-left: 0 !important;
    }
  }

  @media (min-width: 992px) {
    .main-content {
      margin-left: 250px;
    }
  }

  .custom-red {
    background-color: #c62828;
  }
    </style>

</head>



<body>
    <header>
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
    </header>


    <div class="main-content" style="margin-left: 240px; padding: 20px;">
        <!-- your page content -->
        <!--  Offcanvas Sidebar for mobile -->
        <div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="sidebarOffcanvas">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column fs-5">
                    <li class="nav-item border-bottom py-2">
                        <a class="nav-link text-danger fw-semibold" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item border-bottom py-2">
                        <a class="nav-link text-danger" href="#">Employees</a>
                    </li>
                    <li class="nav-item border-bottom py-2">
                        <a class="nav-link text-danger" href="#">Leave Requests</a>
                    </li>
                    <li class="nav-item border-bottom py-2">
                        <a class="nav-link text-danger" href="#">Projects</a>
                    </li>
                    <li class="nav-item border-bottom py-2">
                        <a class="nav-link text-danger" href="#">Reports</a>
                    </li>
                    <li class="nav-item py-2">
                        <a class="nav-link text-danger" href="#">Settings</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar for desktop (visible from lg and above) -->
        <div class="sidebar-desktop bg-light border-end d-none d-lg-block">
            <ul class="nav flex-column pt-3 fs-5">
                <li class="nav-item border-bottom py-2">
                    <a class="nav-link text-danger fw-semibold" href="#">Dashboard</a>
                </li>
                <li class="nav-item border-bottom py-2">
                    <a class="nav-link text-danger" href="#">Employees</a>
                </li>
                <li class="nav-item border-bottom py-2">
                    <a class="nav-link text-danger" href="#">Leave Requests</a>
                </li>
                <li class="nav-item border-bottom py-2">
                    <a class="nav-link text-danger" href="#">Projects</a>
                </li>
                <li class="nav-item border-bottom py-2">
                    <a class="nav-link text-danger" href="#">Reports</a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link text-danger" href="#">Settings</a>
                </li>
            </ul>
        </div>



    </div>


    <main class="container">
        {{ $slot }}
    </main>


    <footer class="footer bg-danger text-white pt-4 mt-5">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">HRMS Portal</h5>
                    <p>Empowering your workforce with smarter tools.</p>
                </div>

                <!-- Column 2 -->
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Dashboard</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Employees</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Leaves</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Reports</a></li>
                    </ul>
                </div>

                <!-- Column 3 -->
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
    <!-- Bootstrap 5 JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>







</html>
