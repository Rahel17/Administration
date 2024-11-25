<x-app-layout>
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
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">No</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Nama</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">NPM</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Bidang</th>
                                        <th colspan="10" style="text-align: center;">Bulan</th>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Bukti Pembayaran</th>
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
                                    @foreach ($kas as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data['user']->name }}</td>
                                            <td>{{ $data['user']->npm }}</td>
                                            <td>{{ $data['user']->anggota->bidang ?? 'Tidak Diketahui' }}</td>

                                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'] as $month)
                                                <td>
                                                    @php
                                                        // Cek apakah bulan ini ada pada data kas anggota
                                                        $kasBulan = $data['kas']->firstWhere('bulan', $month);
                                                        
                                                    @endphp
                                                    
                                                    @if ($kasBulan)
                                                    {{-- {{  $kasBulan->bulan}} --}}
                                                    @php
echo 'Rp5.000'.'[<a href="' . asset('' . $kasBulan->bukti) . '">BUkti</a>]';
                                                    @endphp
                                                        {{-- Jika ada data untuk bulan tersebut --}}
                                                        {{-- Rp{{ number_format(array_sum(json_decode($kasBulan->bulan, true)), 0, ',', '.') }} --}}
                                                    @else
                                                        {{-- Jika tidak ada data untuk bulan tersebut --}}
                                                        -
                                                    @endif
                                                </td>
                                            @endforeach

                                            <td>{{ $data['total'] > 0 ? 'Ada Pembayaran' : '-' }}</td>
                                            <td>{{ $data['total'] > 0 ? 'Lunas' : 'Belum Lunas' }}</td>
                                            <td>
                                                <!-- Aksi untuk mengedit atau melihat -->
                                                <button class="btn btn-info btn-sm">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    </div>


    @endif

    @if(!in_array(auth()->user()->role, ['admin']))
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <h3>Uang Kas</h3>
                    <h6>Pilih Bulan Pembayaran</h6>
                    <div class="row">
                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'] as $month)
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>{{ $month }}</h5>
                <p>2024</p>
                <p>Rp. 5,000 / bulan</p>
                @if (in_array($month, $databulan))
                    <button class="btn btn-success btn-sm" disabled>
                        <i class="fas fa-check"></i> Sudah Bayar
                    </button>
                @endif
                @if (!in_array($month, $databulan))
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadModal{{ $month }}">
                        <i class="fas fa-upload"></i> Bayar
                    </button>
                @endif
            </div>
        </div>
    </div>

                        <!-- Modal Upload Bukti Pembayaran -->
                        <div class="modal fade" id="uploadModal{{ $month }}" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel{{ $month }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('kas.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="buktiPembayaran">Unggah Bukti Pembayaran</label>
                                                <input type="file" class="form-control" id="buktiPembayaran" name="bukti" required>
                                            </div>
                                            <input type="hidden" name="bulan" value="{{ $month }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif 
</x-app-layout>
