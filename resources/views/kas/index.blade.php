<x-app-layout>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    {{-- Modal Bayar Kas --}}
    <div class="modal fade" id="modalPembayaranKas" tabindex="-1" aria-labelledby="modalPembayaranKasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('kas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPembayaranKasLabel">Form Pembayaran Kas</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <select name="bulan" id="bulan" class="form-select" required>
                                <option value="" disabled selected>Pilih Bulan</option>
                                @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'] as $bulan)
                                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="bukti">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti" id="bukti" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    {{-- tampilan kas --}}
    
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Uang Kas</h3>
                <h6 class="font-weight-normal mb-0">Uang Kas Anggota Himatif 2024</h6>
                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Daftar Pembayaran Kas</h3>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalPembayaranKas">
                                <strong>Bayar Kas</strong>
                            </button>
                        </div>
                        <table id="dataPemasukan" class="table table-striped table-bordered" style="width: 100%; table-layout: auto;">
                            
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Bulan</th>
                                    <th>Tanggal</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <!-- Ambil nama dari user yang login -->
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        @if($item->bukti)
                                            <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank">Lihat Bukti</a>
                                        @else
                                            Tidak ada bukti
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status === 'diajukan')
                                            <span class="badge bg-warning">Diajukan</span>
                                        @elseif($item->status === 'disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('kas.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select">
                                                <option value="disetujui">Setujui</option>
                                                <option value="ditolak">Tolak</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        </form>
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


    {{-- script data table --}}
    <script>
        $(document).ready(function() {
            $('#dataPemasukan').DataTable();
        });
    </script>
</x-app-layout>
