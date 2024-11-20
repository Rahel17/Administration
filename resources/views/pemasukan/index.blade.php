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
                      @if(auth()->user()->role !== 'anggota' && auth()->user()->role !== 'bendum')
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPemasukan">
                        <strong>Tambah Pemasukan</strong>
                      </button>

                      @endif
                    </div>
                           
                    <table id="dataPemasukan" class="ui celled table" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kategori</th>
                              <th>Uraian</th>
                              <th>Bidang</th>
                              <th>Nominal</th>
                              <th>Penanggungjawab</th>
                              <th>Dokumen</th>
                              @if(auth()->user()->role !== 'anggota')
                              <th>Aksi</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($pemasukans as $dt)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $dt->tanggal }}</td>
                              <td>{{ $dt->kategori }}</td>
                              <td>{{ $dt->uraian }}</td>
                              <td>{{ $dt->bidang }}</td>
                              <td>{{ $dt->nominal }}</td>
                              <td>{{ $dt->penganggungjawab }}</td>
                              <td><a href="{{ $dt->dokumen }}">{{ $dt->dokumen }}</a></td>
                              <td>
                                @if(auth()->user()->role !== 'anggota')
                                {{-- Tombol Edit --}}
                                <button 
                                    type="button" 
                                    class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editPemasukanModal{{ $dt->id }}">
                                    Edit
                                </button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('peamsukan.destroy', $dt->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                                @endif
                              </td>
                          </tr>
                      </tbody>
                        @endforeach
                  </table>   
                  
                  <!-- Modal Tambah Pemasukan -->
                  <div class="modal fade" id="modalTambahPemasukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form action="{{ route('pemasukan.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-header">
                            <h5 class="modal-title" id="createPemasukanModalLabel">Tambah Pemasukan Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <!-- Input Form -->
                            <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal</label>
                              <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="mb-3">
                              <label for="kategori" class="form-label">Kategori</label>
                              <select class="form-select" id="kategori" name="kategori" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Donasi">Donasi</option>
                                <option value="Sponsor">Sponsor</option>
                                <option value="Lain-lain">Lain-lain</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="uraian" class="form-label">Uraian</label>
                              <textarea class="form-control" id="uraian" name="uraian" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="bidang" class="form-label">Bidang</label>
                              <select class="form-select" id="bidang" name="bidang" required>
                                <option value="" disabled selected>Pilih Bidang</option>
                                <option value="Inti">Inti</option>
                                <option value="PSDM">PSDM</option>
                                <option value="Lain-lain">Lain-lain</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="nominal" class="form-label">Nominal</label>
                              <input type="number" class="form-control" id="nominal" name="nominal" required>
                            </div>
                            <div class="mb-3">
                              <label for="penganggungjawab" class="form-label">Penanggungjawab</label>
                              <input type="text" class="form-control" id="penganggungjawab" name="penganggungjawab" required>
                            </div>
                            <div class="mb-3">
                              <label for="dokumen" class="form-label">Dokumen Pendukung</label>
                              <input type="file" class="form-control" id="dokumen" name="dokumen">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                    {{-- datatables --}}
                  <script>
                      $(document).ready(function() {
                          $('#dataPemasukan').DataTable();
                      });
                  </script>
    
</x-app-layout>