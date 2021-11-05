<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="assets/img/logo.png">
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="assets/img/logo.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    ...
    <link href="/assets/img/logo.png" rel="icon">
    <title>Shoukat Ali & Sons - Dashboard</title>
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/ruang-admin.min.css" rel="stylesheet">
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.0/socket.io.min.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion mt-5 pt-3" id="accordionSidebar">
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Stock Managment
            </div>
            <li class="nav-item">
                <a class="nav-link " href="/stock/create" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-cart-plus"></i>
                    <span>Add Stock</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/stock" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-database"></i>
                    <span>View Stock</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Employees Managment
            </div>
            <li class="nav-item">
                <a class="nav-link " href="/addworker" aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Add New Worker</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/viewallworkers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>View All Worker's</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Products Managment
            </div>
            <li class="nav-item">
                <a class="nav-link " href="/products/create" aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-folder-plus"></i>
                    <span>Add New Product</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="/products">
                    <i class="fas fa-search"></i>
                    <span>View All Products</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Categories
            </div>
            <li class="nav-item">
                <a class="nav-link " href="/category" aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-sitemap"></i>
                    <span>Categories</span>
                </a>
            </li>
            <hr class="sidebar-divider">

            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar  fixed-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h5 class="text-light my-2"><strong>SHOUKAT ALI & SONS</strong></h5>
                    <button class="add-button" class="btn">Add to home screen</button>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="/assets/#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="/assets/#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/assets/#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/assets/#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="/assets/#">Show All
                                    Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="/assets/#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="/assets/img/boy.png"
                                    style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">User NAME</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/assets/#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/assets/#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="/viewhistory">
                                    <i class="fas fa-history fa-sm fa-fw mr-2 text-gray-400"></i>
                                    View History
                                </a>
                                <a class="dropdown-item" href="/activitylog">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/assets/javascript:void(0);" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                <main style="margin-top: 80px">
                    @yield('content')
                </main>

            </div>

        </div>
    </div>


    <script src="/assets/js/main.js"></script>
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/js/ruang-admin.min.js"></script>
    {{-- <script src="/assets/vendor/chart.js/Chart.min.js"></script> --}}
    {{-- <script src="/assets/js/demo/chart-area-demo.js"></script> --}}
    <!-- Page level plugins -->
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
    @yield('scripts')
</body>

</html>
