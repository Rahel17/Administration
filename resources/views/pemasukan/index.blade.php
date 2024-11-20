<x-app-layout>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-body">
                <h3 class="font-weight-bold">Pemasukan</h3>
                <h6 class="font-weight-normal mb-0">Pemasukan yang diterima oleh Kepala Bagian Administrasi dan Keuangan HIMATIF</h6>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <div class="d-flex justify-content-end">
                        @if(auth()->user()->role !== 'anggota, bendum')
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createWebinarModal">
                                <strong>Tambah Pemasukan</strong>
                            </button>
                        @endif
                    </div>
                           
                    <table id="example" class="display expandable-table" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Hari/Tanggal</th>
                          <th>Kategori</th>
                          <th>Uraian</th>
                          <th>Bidang</th>
                          <th>Nominal</th>
                          <th>Penganggungjawab</th>
                          <th></th>
                        </tr>
                      </thead>
                  </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
        </div> 
            
          </div>
        </div>
    </div>
    
</x-app-layout>