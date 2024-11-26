<x-app-layout>
    @if (auth()->user()->role === 'bendum' || auth()->user()->role === 'anggota')
        {{-- tampilan riwayat pembayaran --}}
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold">Uang Kas</h3>
                    <h6 class="font-weight-normal mb-0">Uang Kas Anggota Himatif 2024</h6>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>Daftar Pembayaran Kas</h3>
                            <table id="dataPemasukan" class="table table-striped table-bordered"
                                style="width: 100%; table-layout: auto;">

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
                                    @foreach ($kas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->anggota->name }}</td>
                                            <td>{{ $item->bulan }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>
                                                @if ($item->bukti)
                                                    <a href="{{ asset('storage/' . $item->bukti) }}"
                                                        target="_blank">Lihat Bukti</a>
                                                @else
                                                    Tidak ada bukti
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status === 'diajukan')
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
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm">Simpan</button>
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
    @endif

    {{-- script data table --}}
    <script>
        $(document).ready(function() {
            $('#dataPemasukan').DataTable();
        });
    </script>
</x-app-layout>
