<x-app-layout>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Pengeluaran</h3>
                <h6 class="font-weight-normal mb-0">Pengeluaran yang dilakukan oleh Kepala Bagian Administrasi dan Keuangan HIMATIF</h6>
                <div class="row mt-4">
                    <div class="col-12">
                        <!-- Kontainer untuk scroll horizontal -->
                        <div style="overflow-x: auto; width: 100%; ">
                            <table id="dataPengeluaran" class="table table-striped table-bordered" style="width: 100%; table-layout: auto;">
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
                                        @if(!in_array(auth()->user()->role, ['anggota', 'bendum']))
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengeluarans as $dt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt->tanggal }}</td>
                                        <td>{{ $dt->kategori }}</td>
                                        <td>{{ $dt->uraian }}</td>
                                        <td>{{ $dt->bidang }}</td>
                                        <td>Rp {{ number_format($dt->nominal, 0, ',', '.') }}</td>
                                        <td>{{ $dt->penanggungjawab }}</td>
                                        <td><a href="{{ asset('storage/' . $dt->dokumen) }}" target="_blank">{{ $dt->dokumen }}</a></td>
                                        @if(!in_array(auth()->user()->role, ['anggota', 'bendum']))
                                        <td>
                                          <!-- Tombol Edit -->
                                          <button 
                                              class="btn btn-warning" 
                                              style="font-size: 10px; padding: 10px 10px;" 
                                              data-toggle="modal" 
                                              data-target="#editPengeluaranModal{{ $dt->id }}">
                                              Edit
                                          </button>

                                      
                                          <!-- Tombol Delete -->
                                          <form action="{{ route('pengeluaran.destroy', $dt->id) }}" method="POST" style="display:inline-block;">
                                              @csrf
                                              @method('DELETE')
                                              <button 
                                                  type="submit" 
                                                  class="btn btn-danger" 
                                                  style="font-size: 10px; padding: 10px 10px;" 
                                                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                  Delete
                                              </button>
                                          </form>
                                         </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                @if(auth()->user()->role !== 'anggota' && auth()->user()->role !== 'bendum')
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengeluaran">
                                    <strong>Tambah Pengeluaran</strong>
                                </button>
                                @endif
                                </div>
                            </table>
                        </div>   
                      </div>
                    </div>
              </div>
        </div>
                <!-- Modal Tambah pengeluaran -->
                <div class="modal fade" id="modalTambahPengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createPengeluaranModalLabel">Tambah Pengeluaran Baru</h5>
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
                                            <option value="proker">Proker</option>
                                            <option value="lainnya">Lainnya</option>
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
                                            <option value="Humas">Kerohanian</option>
                                            <option value="Kominfo">Kominfo</option>
                                            <option value="Danus">Dana Usaha</option>
                                            <option value="Minbak">Minat Bakat</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nominal" class="form-label">Nominal</label>
                                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penanggungjawab" class="form-label">Penanggungjawab</label>
                                        <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" required>
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

                @foreach ($pengeluarans as $dt)
                    <!-- Modal Edit pengeluaran -->
                    <div class="modal fade" id="editPengeluaranModal{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <form action="{{ route('pengeluaran.update', $dt->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editPengeluaranModalLabel{{ $dt->id }}">Edit Pengeluaran</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <!-- Input Form -->
                                      <div class="mb-3">
                                          <label for="tanggal{{ $dt->id }}" class="form-label">Tanggal</label>
                                          <input type="date" class="form-control" id="tanggal{{ $dt->id }}" name="tanggal" value="{{ $dt->tanggal }}" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="kategori{{ $dt->id }}" class="form-label">Kategori</label>
                                          <select class="form-select" id="kategori{{ $dt->id }}" name="kategori" required>
                                              <option value="proker" {{ $dt->kategori === 'proker' ? 'selected' : '' }}>Program Kerja</option>
                                              <option value="lainnya" {{ $dt->kategori === 'proker' ? 'selected' : '' }}>Lainnya</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                        <label for="uraian{{ $dt->id }}" class="form-label">Uraian</label>
                                        <textarea class="form-control" id="uraian{{ $dt->id }}" name="uraian" rows="3" required>{{ $dt->uraian }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bidang{{ $dt->id }}" class="form-label">Bidang</label>
                                        <select class="form-select" id="bidang{{ $dt->id }}" name="bidang" required>
                                            <option value="Inti" {{ $dt->bidang === 'Inti' ? 'selected' : '' }}>Inti</option>
                                            <option value="PSDM" {{ $dt->bidang === 'PSDM' ? 'selected' : '' }}>PSDM</option>
                                            <option value="Humas" {{ $dt->bidang === 'Humas' ? 'selected' : '' }}>Kerohanian</option>
                                            <option value="Kominfo" {{ $dt->bidang === 'Kominfo' ? 'selected' : '' }}>Kominfo</option>
                                            <option value="Danus" {{ $dt->bidang === 'Danus' ? 'selected' : '' }}>Dana Usaha</option>
                                            <option value="Minbak" {{ $dt->bidang === 'Minbak' ? 'selected' : '' }}>Minat Bakat</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nominal{{ $dt->id }}" class="form-label">Nominal</label>
                                        <input type="number" class="form-control" id="nominal{{ $dt->id }}" name="nominal" value="{{ $dt->nominal }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penanggungjawab{{ $dt->id }}" class="form-label">Penanggungjawab</label>
                                        <input type="text" class="form-control" id="penanggungjawab{{ $dt->id }}" name="penanggungjawab" value="{{ $dt->penanggungjawab }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dokumen{{ $dt->id }}" class="form-label">Dokumen Pendukung</label>
                                        <input type="file" class="form-control" id="dokumen{{ $dt->id }}" name="dokumen">
                                        @if($dt->dokumen)
                                        <p class="mt-2">Dokumen saat ini: 
                                          <a href="{{ asset('storage/' . $dt->dokumen) }}" target="_blank">Lihat</a>
                                        </p>
                                        @endif

                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  
                @endforeach

                {{-- Ajukan Pengeluaran (Bendahara Umum) --}}


                {{-- datatables --}}
                <script>
                    $(document).ready(function() {
                        $('#dataPengeluaran').DataTable();
                    });
                </script>
</x-app-layout>
