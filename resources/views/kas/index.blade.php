<x-app-layout>
    <style>
        /* Table container for responsive scrolling */
        .table-container {
            overflow-x: auto;
            width: 100%;
            margin: 20px 0;
        }
    
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
    </style>

    @if(!in_array(auth()->user()->role, ['anggota', 'bendum']))
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Uang Kas</h3>
                <h6 class="font-weight-normal mb-0">Uang Kas Anggota Himatif 2024</h6>
                <div class="row mt-4">
                    <div class="col-12">
                        <!-- Kontainer untuk scroll horizontal -->
                        <div style="overflow-x: auto; width: 100%; ">
                            <table id="dataPemasukan" class="table table-striped table-bordered" style="width: 100%; table-layout: auto;">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Nama</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">NPM</th>
                                        <th colspan="10" style="text-align: center;">Bulan</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Total</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Keterangan</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Aksi</th>  
                                    </tr>
                                    <tr>
                                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'] as $month)
                                            <th>{{ $month }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kas as $dt)
                                        @php
                                            $monthly = json_decode($dt->bulan, true) ?? [];
                                            $total = is_array($monthly) ? array_sum($monthly) : 0;
                                            $isPaidOff = $total >= 50000;
                                        @endphp
                                        <tr>
                                            <td>{{ $dt->user?->name ?? 'Tidak Ada Data' }}</td>
                                            <td>{{ $dt->user?->npm ?? 'Tidak Ada Data' }}</td>
                                            @foreach ($monthly as $month => $amount)
                                                <td class="{{ $amount > 0 ? 'paid' : 'unpaid' }}">
                                                    Rp{{ number_format($amount, 0, ',', '.') }}
                                                </td>
                                            @endforeach
                                            <td>Rp{{ number_format($total, 0, ',', '.') }}</td>
                                            <td>{{ $isPaidOff ? 'lunas' : 'belum lunas' }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $dt->id }}">Edit</button>
                                                <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $dt->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    @if(!in_array(auth()->user()->role, ['anggota', 'bendum']))
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPemasukan">
                                            <strong>Tambah Pemasukan</strong>
                                        </button>
                                    @endif
                                </div>
                                <div style="overflow-x: auto; width: 100%;">
                                    <table id="dataPemasukan" class="table table-striped table-bordered" style="width: 100%; table-layout: auto;">
                                        <!-- Tabel -->
                                    </table>
                                </div>                                
                            </table>
                        </div>   
                      </div>
                    </div>
              </div>
        </div>

        {{-- Modal Tambah Data --}}
        <div class="modal fade" id="modalTambahPemasukan" tabindex="-1" role="dialog" aria-labelledby="modalTambahPemasukanLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('kas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahPemasukanLabel">Tambah Pemasukan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama Anggota -->
                            <div class="mb-3">
                                <label for="namaAnggota" class="form-label">Nama Anggota</label>
                                <select class="form-select" id="namaAnggota" name="user_id" required>
                                    <option value="" disabled selected>Pilih Nama</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->npm }})</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <!-- Bulan -->
                            <div class="mb-3">
                                <label for="bulanPemasukan" class="form-label">Bulan</label>
                                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'] as $month)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="bulan_{{ $month }}" name="bulan[{{ $month }}]" value="1">
                                        <label class="form-check-label" for="bulan_{{ $month }}">{{ $month }}</label>
                                    </div>
                                @endforeach
                            </div>
        
                            <!-- Jumlah Pemasukan -->
                            <div class="mb-3">
                                <label for="jumlahPemasukan" class="form-label">Jumlah Pemasukan</label>
                                <input type="number" class="form-control" id="jumlahPemasukan" name="jumlah" placeholder="Masukkan jumlah dalam Rupiah" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
               
    @endif

    @if(!in_array(auth()->user()->role, ['admin']))
    <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Segera Bayar Uang Kas Bulanan Agar Tidak Melulu Ditagih</h4>
            <p class="card-description">
              Bayar Sekarang 
            </p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                  <select class="form-control" id="exampleSelectGender">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">City</label>
                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Textarea</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div> 
    </div>           
    @endif
</x-app-layout>