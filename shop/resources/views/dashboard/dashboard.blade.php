@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                <span id="test"></span>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. {{$currentMonthSale}}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                    <span>Since Current month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. {{$todaySale}}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                    <span>Since Today</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Workers</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                    <span>Today</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Expenses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. {{$expenseToday}}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-left"></i></span>
                                    <span>Since Morning</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

     

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="/assets/login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
      <!-- Footer -->
            <footer  style=" bottom:0px;" >
                <div class="copyright text-center my-auto">
                    <script>
                        document.write(new Date().getFullYear());
                    </script> - Copyright &copy; 
                    <b><a  target="_blank">SA&S</a></b>
                    </span>
                </div>
            </footer>
            <!-- Footer -->
@endsection
