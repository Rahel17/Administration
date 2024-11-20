<x-app-layout>
    <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        
                        @if (Auth::user()->role == 'admin')
                            <h3 class="font-weight-bold">Selamat Datang Kepala Administrasi dan Keuangan!</h3>
                        @endif

                        @if (Auth::user()->role == 'bendum')
                            <h3 class="font-weight-bold">Selamat Datang Bendahara Umum!</h3>
                        @endif
                        
                        @if (Auth::user()->role == 'anggota')
                            <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }}!</h3>
                        @endif

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

</x-app-layout>
