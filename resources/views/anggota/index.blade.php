@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<x-app-layout>
    <div class="content-wrapper">
        <div class="card">
        <div class="mt-1 mr-3 ml-3 mb-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3> Data Anggota </h3>
                
                <!-- Modal Tambah Data -->
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ route('anggota.store') }}" method="POST">
                                @csrf
                                
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTambahLabel">Tambah Data Anggota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="text-center">Form Tambah Anggota</h3>
                                    <div class="container">
                                        <div>
                                            <div class="col font-weight-bold mt-3 mb-2">Nama</div>
                                            <div class="col">
                                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama anggota" required>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col font-weight-bold mt-3 mb-2">NPM</div>
                                            <div class="col">
                                                <input type="text" name="npm" class="form-control" placeholder="Masukkan NPM anggota" required>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col font-weight-bold mt-3 mb-2">Bidang</div>
                                            <div class="col">
                                                <input type="text" name="bidang" class="form-control" placeholder="Masukkan bidang (opsional)">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col font-weight-bold mt-3 mb-2">No HP</div>
                                            <div class="col">
                                                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP anggota (opsional)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <table id="dataAnggota" class="ui celled table" style="width:100%">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    @if(auth()->user()->role !== 'anggota' && auth()->user()->role !== 'bendum')
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <strong>Tambah Anggota</strong>
                    </button>
                    @endif
                    </div>
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Bidang</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $anggota)
                    <tr>
                        <td>{{ $anggota->npm }}</td>
                        <td>{{ $anggota->name }}</td>
                        <td>{{ $anggota->bidang ?? '-' }}</td>
                        <td>{{ $anggota->no_hp ?? '-' }}</td>
                        <td class="d-flex justify-content-between align-items-center" style="gap: 10px;">
                            <!-- Tombol Edit -->
                            <button type="button"
                                class="btn btn-warning justify-content-center align-items-center" 
                                style="width: 35px; height: 35px; border-radius: 10px;"
                                data-toggle="modal" 
                                data-target="#modal{{ $anggota->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        
                            <!-- Tombol Delete -->
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger justify-content-center align-items-center" 
                                    style="width: 35px; height: 35px; border-radius: 10px;" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal untuk setiap baris -->
                    <div class="modal fade" id="modal{{ $anggota->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $anggota->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Form untuk update -->
                                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $anggota->id }}">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="text-center">Edit Data Anggota</h3>
                                        <div class="container">
                                            <div>
                                                <div class="col font-weight-bold mt-3 mb-2">Nama</div>
                                                <div class="col">
                                                    <input type="text" name="name" class="form-control" value="{{ $anggota->name }}">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col font-weight-bold mt-3 mb-2">NPM</div>
                                                <div class="col">
                                                    <input type="text" name="npm" class="form-control" value="{{ $anggota->npm }}">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col font-weight-bold mt-3 mb-2">Bidang</div>
                                                <div class="col">
                                                    <input type="text" name="bidang" class="form-control" value="{{ $anggota->bidang }}">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col font-weight-bold mt-3 mb-2">No HP</div>
                                                <div class="col">
                                                    <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
    </div>
      {{-- datatables --}}
    <script>
        $(document).ready(function() {
            $('#dataAnggota').DataTable();
        });
    </script>
</x-app-layout>