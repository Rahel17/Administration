<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Himatif Administration</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('asset/images/logo-himatif.png') }}" />
</head>
<body>
  <div class="container-scroller">
 
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="{{ url('/dashboard') }}">
                <img src="{{ asset('asset/images/logo-adminkeu.svg') }}" style="width: 200px; height: auto; margin: 10px;" alt="logo"/>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}">
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
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{ asset('asset/images/profil.jpg') }}" alt="profile"/>
                    </a>
                    <a class="dropdown-item" href="/profile">
                        <i class="ti-settings text-primary"></i>
                        <strong>Settings</strong>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>    
            </ul>
            
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.blade.php -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            @if (Auth::user()->role == 'admin')
            <li class="nav-item">   
                <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false" aria-controls="auth">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Beranda</span>
                </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('pemasukan.index') }}" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Pemasukan</span>
            </a>
            </li>

            <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('webinar.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Pengeluaran</span>
            </a>
            </li>

            <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('transaksi.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Kas Anggota</span>
            </a>
            </li>

            <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('transaksi.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Saldo</span>
                </a>
            </li>

            <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('transaksi.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                </a>
            </li>

            @endif

            @if (Auth::user()->role == 'bendum')
            <li class="nav-item">   
                <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false" aria-controls="auth">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Beranda</span>
                </a>
            </li>

            <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('pemateri.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Pemasukan</span>
            </a>
            </li>

            <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('webinar.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Pengeluaran</span>
            </a>
            </li>

            <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('transaksi.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Kas Anggota</span>
            </a>
            </li>

            <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('transaksi.index') }}" aria-expanded="false" aria-controls="ui-basic"> --}}
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Saldo</span>
                </a>
            </li>

            @endif

            @if (Auth::user()->role == 'anggota')
            <li class="nav-item">   
                <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false" aria-controls="auth">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Beranda</span>
                </a>
            </li>

            <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('webinar.index') }}"> --}}
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Kas Anggota</span>
            </a>
            </li>
            @endif

            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                        <img src="{{ asset('asset/images/logo-adminkeu.svg') }}" style="width: 200px; height: auto; margin: 10px;" alt="logo"/>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
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
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <img src="{{ asset('asset/images/profil.jpg') }}" alt="profile"/>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>    
                    </ul>
                    
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </nav>
    </nav>
    <div class="main-panel">    
            <main class="flex-1">     
                {{ $slot }}               
            </main> 
    </div>
        
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. All rights reserved.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Kepala Bagian Administrasi dan Keuangan Himatif<i class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer>
        
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('asset/vendors/chart.js/Chart.min.js') }}"></script>
  {{-- <script src="{{ asset('asset/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> --}}
  <script src="{{ asset('asset/js/dataTables.select.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
  <script src="{{ asset('asset/js/settings.js') }}"></script>
  <script src="{{ asset('asset/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('asset/js/dashboard.js') }}"></script>
  <script src="{{ asset('asset/js/Chart.roundedBarCharts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
