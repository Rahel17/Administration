<x-app-layout>
    @if (auth()->user()->role === 'bendum')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold">Riwayat Pemasukan</h3>
                    <h6 class="font-weight-normal mb-0">Pemasukan yang diterima oleh Kepala Bagian Administrasi dan
                        Keuangan HIMATIF</h6>
                    <div class="row mt-4">
                        <div class="col-12">
                            <!-- Kontainer untuk scroll horizontal -->
                            <div style="overflow-x: auto; width: 100%; ">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <table id="dataPemasukan" class="table table-striped table-bordered"
                                    style="width: 100%; table-layout: auto;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Uraian</th>
                                            <th>Bidang</th>
                                            <th>Nominal</th>
                                            <th>Dokumen</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemasukans as $index => $pemasukan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pemasukan->tanggal }}</td>
                                                <td>{{ $pemasukan->kategori }}</td>
                                                <td>{{ $pemasukan->uraian }}</td>
                                                <td>{{ $pemasukan->bidang }}</td>
                                                <td>{{ number_format($pemasukan->nominal, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($pemasukan->dokumen)
                                                        <a href="{{ asset('storage/' . $pemasukan->dokumen) }}"
                                                            target="_blank" class="btn btn-info btn-sm"
                                                            style="padding: 10px 10px; font-size: 10px;">
                                                            <i class="fa-regular fa-file-pdf"></i> Lihat Dokumen/SPJ
                                                        </a>
                                                    @else
                                                        <span class="text-muted">Tidak Ada File</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->role === 'admin')
                                                        @if ($pemasukan->status === 'diajukan')
                                                            <button class="btn btn-success btn-sm approve-btn"
                                                                data-id="{{ $pemasukan->id }}">Setujui</button>
                                                            <button class="btn btn-danger btn-sm reject-btn"
                                                                data-id="{{ $pemasukan->id }}">Tolak</button>
                                                        @else
                                                            <span
                                                                class="badge {{ $pemasukan->status === 'disetujui' ? 'bg-success' : 'bg-danger' }}">
                                                                {{ ucfirst($pemasukan->status) }}
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span
                                                            class="badge {{ $pemasukan->status === 'disetujui' ? 'bg-success' : ($pemasukan->status === 'ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                                            {{ ucfirst($pemasukan->status) }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    @if ($pemasukan->status === 'disetujui')
                                                        <p>-</p>
                                                    @else
                                                        {{-- Ajukan Kembali --}}
                                                        {{-- Tombol Ajukan Kembali --}}
                                                        <button 
                                                        class="btn btn-warning mr-2 ajukan-kembali-btn"
                                                        style="font-size: 10px; padding: 10px 10px;"
                                                        data-toggle="modal"
                                                        data-target="#ajukanKembaliForm"
                                                        data-id="{{ $pemasukan->id }}"
                                                        data-tanggal="{{ $pemasukan->tanggal }}"
                                                        data-kategori="{{ $pemasukan->kategori }}"
                                                        data-uraian="{{ $pemasukan->uraian }}"
                                                        data-bidang="{{ $pemasukan->bidang }}"
                                                        data-nominal="{{ $pemasukan->nominal }}"
                                                        data-status="diajukan">
                                                        Ajukan Kembali
                                                        </button>

                                                        <!-- Delete -->
                                                        <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                style="font-size: 10px; padding: 10px 10px;"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    @endif
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
        </div>

        {{-- Modal Edit Pemasukan --}}
        <div class="modal fade" id="ajukanKembaliForm" tabindex="-1" aria-labelledby="ajukanKembaliFormLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ajukanKembaliFormLabel">Edit Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Form Tambah Pemasukan</h3>
                        <div class="container">
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Tanggal</div>
                                <div class="col">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                            </div>
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Kategori</div>
                                <div class="col">
                                    <select class="form-control" id="kategori" name="kategori" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="sisa_proker">Sisa Proker</option>
                                        <option value="inventaris">Iventaris</option>
                                        <option value="lainnya">Proposal</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Uraian</div>
                                <div class="col">
                                    <textarea class="form-control" id="uraian" name="uraian" rows="3" required></textarea>
                                </div>
                            </div>
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Bidang</div>
                                <div class="col">
                                    <select class="form-control" id="bidang" name="bidang" required>
                                        <option value="" disabled selected>Pilih Bidang</option>
                                        <option value="Inti">Inti</option>
                                        <option value="PSDM">PSDM</option>
                                        <option value="Humas">Kerohanian</option>
                                        <option value="Kominfo">Kominfo</option>
                                        <option value="Danus">Dana Usaha</option>
                                        <option value="Minbak">Minat Bakat</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Nominal</div>
                                <div class="col">
                                    <input type="number" class="form-control" id="nominal" name="nominal" required>
                                </div>
                            </div>
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Dokumen Pendukung</div>
                                <div class="col">
                                    <input type="file" class="form-control" id="dokumen" name="dokumen">
                                </div>
                            </div>
                            <div>
                                <div class="col font-weight-bold mt-3 mb-2">Status</div>
                                <div class="col">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="diajukan">Diajukan</option>
                                        @if (auth()->user()->role == 'admin')
                                            <option value="disetujui">Disetujui</option>
                                            <option value="ditolak">Ditolak</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <form id="ajukanKembaliForm" method="POST" action="">
                                @csrf
                                @method('PUT')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Ajukan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#dataPemasukan').DataTable();
            });

            $(document).ready(function() {
        // Ketika tombol Ajukan Kembali diklik
        $('.ajukan-kembali-btn').on('click', function() {
            // Ambil data dari atribut tombol
            const id = $(this).data('id');
            const tanggal = $(this).data('tanggal');
            const kategori = $(this).data('kategori');
            const uraian = $(this).data('uraian');
            const bidang = $(this).data('bidang');
            const nominal = $(this).data('nominal');
            const status = $(this).data('status');

            // Isi form modal dengan data
            $('#ajukanKembaliForm #tanggal').val(tanggal);
            $('#ajukanKembaliForm #kategori').val(kategori);
            $('#ajukanKembaliForm #uraian').val(uraian);
            $('#ajukanKembaliForm #bidang').val(bidang);
            $('#ajukanKembaliForm #nominal').val(nominal);
            $('#ajukanKembaliForm #status').val(status);

            // Set action form untuk pengajuan kembali
            $('#ajukanKembaliForm form').attr('action', `/pemasukan/${id}/ajukan-kembali`);
        });
    }); 
        </script>
    @endif
</x-app-layout>
