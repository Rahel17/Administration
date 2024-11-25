<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Himatif Adminitration</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('asset/images/logo-himatif.png') }}">
        {{-- datatables --}}

        <!-- Bootstrap CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        <!-- Bootstrap JavaScript Bundle -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
        <!-- Fomantic UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    
        <!-- DataTables Semantic UI CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.semanticui.css">
    
        <!-- Fomantic UI JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    
        <!-- DataTables Core JS -->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    
        <!-- DataTables Semantic UI JS -->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.semanticui.js"></script>
    
    </head>
<body>
  <div class="container-scroller">
 
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="{{ url('/dashboardUser') }}">
                <img src="{{ asset('asset/images/logo-adminkeu.svg') }}" style="width: 200px; height: auto; margin: 10px;" alt="logo"/>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboardUser') }}">
                <img src="{{ asset('asset/images/logo-himatif.png') }}" alt="logo"/>
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Hari yang Indah!!</h3>
                        <h6 class="font-weight-normal mb-0">Selamat datang di Sistem Informasi Keuangan HIMATIF</h6>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('asset/images/himatif-holiday.jpg') }}" alt="people" class="card-people">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                  <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-tale">
                        <div class="card-body">
                          <p class="mb-4">Jumlah Pemasukan</p>
                          <p class="fs-30 mb-2">IDR9.000.000</p>
                          <p>10.00% (30 days)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-dark-blue">
                        <div class="card-body">
                          <p class="mb-4">Jumlah Pengeluaran</p>
                          <p class="fs-30 mb-2">IDR5.700.000</p>
                          <p>22.00% (30 days)</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                      <div class="card card-light-blue">
                        <div class="card-body">
                          <p class="mb-4">Kas Anggota</p>
                          <p class="fs-30 mb-2">IDR730.000</p>
                          <p>2.00% (30 days)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                      <div class="card card-light-danger">
                        <div class="card-body">
                          <p class="mb-4">SPJ Diserahkan</p>
                          <p class="fs-30 mb-2">10</p>
                          <p>dari 25 program kerja</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Anggota Himatif</p>
                      <div class="d-flex flex-wrap mb-5">
                        <div class="mr-5 mt-3">
                          <p class="text-muted">Order value</p>
                          <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                        </div>
                        <div class="mr-5 mt-3">
                          <p class="text-muted">Orders</p>
                          <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                        </div>
                        <div class="mr-5 mt-3">
                          <p class="text-muted">Users</p>
                          <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                        </div>
                        <div class="mt-3">
                          <p class="text-muted">Downloads</p>
                          <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                        </div> 
                      </div> 
                      <canvas id="order-chart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <p class="card-title">Grafik Keuangan</p>
                      <a href="#" class="text-info">View all</a>
                     </div>
                      <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                      <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                      <canvas id="sales-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>

</div>
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Kepala Bagian Administrasi dan Keuangan Himatif<i class="ti-heart text-danger ml-1"></i></span>
  </div>
</footer>

 <!-- plugins:js -->
 <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
 <!-- endinject -->
 <!-- Plugin js for this page -->
 <script src="{{ asset('asset/vendors/chart.js/Chart.min.js') }}"></script>
 <script src="{{ asset('asset/vendors/datatables.net/jquery.dataTables.js') }}"></script>
 <script src="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
 <script src="{{ asset('asset/js/dataTables.select.min.js') }}"></script>
 <script src="{{ asset('asset/js/modal.js') }}"></script>


 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
 <script src="{{ asset('asset/js/hoverable-collapse.js') }}"></script>
 <script src="{{ asset('asset/js/template.js') }}"></script>
 <script src="{{ asset('asset/js/settings.js') }}"></script>
 <script src="{{ asset('asset/js/todolist.js') }}"></script>
 <!-- endinject -->
 <!-- Custom js for this page-->
 <script src="{{ asset('asset/js/dashboardUser) }}"></script>
 <script src="{{ asset('asset/js/Chart.roundedBarCharts.js') }}"></script>
 <!-- End custom js for this page-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6hCUbhE6gxn7gkaeZMCYxqG2XsEzl4UpvW46pAjQ63VqH59gq" crossorigin="anonymous"></script>

 
</body>
</html>

