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
                                            $monthly = json_decode($dt->bulan, true); // Gunakan $dt, bukan $kas
                                            $total = array_sum($monthly);
                                            $isPaidOff = $total >= 50000;
                                        @endphp
                                        <tr>
                                            <td>{{ $dt->user->name }}</td>
                                            <td>{{ $dt->user->npm }}</td>
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

        {{-- Modal Tambah Pemasukan --}}
        <div class="modal fade" id="modalTambahPemasukan" tabindex="-1" aria-labelledby="modalTambahPemasukanLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Pemasukan</h4>
                            <p class="card-description">
                                Form untuk menambahkan pemasukan baru
                            </p>
                            <form class="forms-sample" method="POST" action="{{ route('kas.index') }}">
                                @csrf
                                {{-- <div class="form-group">
                                    <label for="namaAnggota">Nama Anggota</label>
                                    <select class="form-control" id="namaAnggota" name="user_id" required>
                                        <option value="" disabled selected>Pilih Nama</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->npm }})</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="bulanPemasukan">Bulan</label>
                                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'] as $month)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="bulan_{{ $month }}" name="bulan[{{ $month }}]" value="1">
                                            <label class="form-check-label" for="bulan_{{ $month }}">{{ $month }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPemasukan">Jumlah Pemasukan</label>
                                    <input type="number" class="form-control" id="jumlahPemasukan" name="jumlah" placeholder="Masukkan jumlah dalam Rupiah" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @endif
</x-app-layout>