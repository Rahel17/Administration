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
                      <i class="fa-solid fa-user"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="/profile">
                      <i class="ti-settings text-primary"></i>
                      Settings
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       <i class="ti-power-off text-primary"></i>
                      <span>Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
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
                <a class="nav-link" href="{{ route('anggota.index') }}" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-head menu-icon"></i></i>
                    <span class="menu-title">Anggota</span>
                </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('pemasukan.index') }}" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pemasukan</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('pengeluaran.index') }}" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengeluaran</span>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kas" aria-expanded="false" aria-controls="kas">
                  <i class="icon-book menu-icon"></i>
                  <span class="menu-title">Kas Anggota </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kas">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.index') }}">Pembayaran Kas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.riwayat') }}">Riwayat Kas</a></li>
                  </ul>
                </div>
              </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false" aria-controls="ui-basic">
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
                <a class="nav-link" data-toggle="collapse" href="#pemasukan" aria-expanded="false" aria-controls="pemasukan">
                  <i class="icon-columns menu-icon"></i>
                  <span class="menu-title">Pemasukan</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="pemasukan">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('pemasukan.index') }}">Catatan Pemasukan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pemasukan.riwayat') }}">Riwayat Pemasukan</a></li>
                  </ul>
                </div>
              </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#pengeluaran" aria-expanded="false" aria-controls="pengeluaran">
                  <i class="icon-columns menu-icon"></i>
                  <span class="menu-title">Pengeluaran</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="pengeluaran">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('pengeluaran.index') }}">Catatan Pengeluaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pengeluaran.riwayat') }}">Riwayat Pengeluaran</a></li>
                  </ul>
                </div>
              </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kas" aria-expanded="false" aria-controls="kas">
                  <i class="icon-book menu-icon"></i>
                  <span class="menu-title">Kas Anggota </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kas">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.index') }}">Pembayaran Kas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.riwayat') }}">Riwayat Kas</a></li>
                  </ul>
                </div>
              </li>

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
                <a class="nav-link" data-toggle="collapse" href="#kas" aria-expanded="false" aria-controls="kas">
                    <i class="fa-solid fa-book menu-icon"></i>
                  <span class="menu-title">Kas Anggota </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kas">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.index') }}">Pembayaran Kas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kas.riwayat') }}">Riwayat Kas</a></li>
                  </ul>
                </div>
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
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                              <a class="dropdown-item" href="/profile">
                                <i class="ti-settings text-primary"></i>
                                Settings
                              </a>
                              <a class="dropdown-item d-flex align-items-center" href="#"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <i class="ti-power-off text-primary"></i>
                                <span>Log Out</span>
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </div>
                        </li>         
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
 </div>
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Kepala Bagian Administrasi dan Keuangan Himatif<i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
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
  <script src="{{ asset('asset/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('asset/js/dataTables.select.min.js') }}"></script>
  <script>
    const csrfToken = '{{ csrf_token() }}';
  </script>
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
  <script src="{{ asset('asset/js/dashboard.js') }}"></script>
  <script src="{{ asset('asset/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6hCUbhE6gxn7gkaeZMCYxqG2XsEzl4UpvW46pAjQ63VqH59gq" crossorigin="anonymous"></script>

  
</body>
</html>