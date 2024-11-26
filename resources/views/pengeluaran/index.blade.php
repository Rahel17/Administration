<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Pengeluaran</h3>
                <h6 class="font-weight-normal mb-0">Penegluaran yang diterima oleh Kepala Bagian Administrasi dan
                    Keuangan HIMATIF</h6>
                <div class="row mt-4">
                    <div class="col-12">
                        <!-- Kontainer untuk scroll horizontal -->
                        <div style="overflow-x: auto; width: 100%; ">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if (auth()->user()->role === 'admin')
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalTambahPengeluaran">
                                        <strong>Tambah Pengeluaran</strong>
                                    </button>
                                @endif

                                @if (auth()->user()->role === 'bendum')
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalTambahPengeluaran">
                                        <strong>Ajukan pengeluaran</strong>
                                    </button>
                                @endif

                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table id="dataPengeluaran" class="table table-striped table-bordered" style="width: 100%; table-layout: auto;">
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
                                        @if (auth()->user()->role === 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengeluarans as $index => $pengeluaran)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pengeluaran->tanggal }}</td>
                                            <td>{{ $pengeluaran->kategori }}</td>
                                            <td>{{ $pengeluaran->uraian }}</td>
                                            <td>{{ $pengeluaran->bidang }}</td>
                                            <td>{{ number_format($pengeluaran->nominal, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($pengeluaran->dokumen)
                                                    <a href="{{ asset('storage/' . $pengeluaran->dokumen) }}"
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
                                                    @if ($pengeluaran->status === 'diajukan')
                                                        <button class="btn btn-success btn-sm approve-btn"
                                                            data-id="{{ $pengeluaran->id }}">Setujui</button>
                                                        <button class="btn btn-danger btn-sm reject-btn"
                                                            data-id="{{ $pengeluaran->id }}">Tolak</button>
                                                    @else
                                                        <span
                                                            class="badge {{ $pengeluaran->status === 'disetujui' ? 'bg-success' : 'bg-danger' }}">
                                                            {{ ucfirst($pengeluaran->status) }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span
                                                        class="badge {{ $pengeluaran->status === 'disetujui' ? 'bg-success' : ($pengeluaran->status === 'ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                                        {{ ucfirst($pengeluaran->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                            @if (auth()->user()->role === 'admin')
                                                <td class="d-flex justify-content-center">
                                                    @if ($pengeluaran->status === 'disetujui')
                                                        <p>-</p>
                                                    @else
                                                        {{-- Edit --}}
                                                        {{-- <button 
                                                    class="btn btn-warning mr-2" 
                                                    style="font-size: 10px; padding: 10px 10px;" 
                                                    data-toggle="modal" >
                                                    Edit
                                                </button> --}}
                                                        <!-- Delete -->
                                                        <form
                                                            action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                style="font-size: 10px; padding: 10px 10px;"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            @endif
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
    <!-- Modal Tambah pengeluaran -->
    <div class="modal fade" id="modalTambahPengeluaran" tabindex="-1" aria-labelledby="createPengeluaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPengeluaranModalLabel">Tambah pengeluaran Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Form Tambah pengeluaran</h3>
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
                                        <option value="proker">Proker</option>
                                        <option value="lainnya">Lainnya</option>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- datatables --}}
    <script>
        $(document).ready(function() {
            $('#dataPengeluaran').DataTable();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const approveButtons = document.querySelectorAll('.approve-btn');
            const rejectButtons = document.querySelectorAll('.reject-btn');

            approveButtons.forEach(button => {
                button.addEventListener('click', function() {
                    handleAction(this.dataset.id, 'approve');
                });
            });

            rejectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    handleAction(this.dataset.id, 'reject');
                });
            });

            function handleAction(id, action) {
                const url = `/pengeluaran/${action}/${id}`;
                const confirmMessage = action === 'approve' ?
                    'Apakah Anda yakin ingin menyetujui pengeluaran ini?' :
                    'Apakah Anda yakin ingin menolak pengeluaran ini?';

                if (confirm(confirmMessage)) {
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                alert(
                                `pengeluaran berhasil ${action === 'approve' ? 'disetujui' : 'ditolak'}.`);
                                location.reload();
                            } else {
                                alert('Gagal memproses tindakan: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat memproses tindakan.');
                        });
                }
            }
        });
    </script>
</x-app-layout>
