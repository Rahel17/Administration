<x-app-layout>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
          <div class="card-body">
            <h3> Data Anggota </h3>
            <table id="dataAnggota" class="ui celled table" style="width:100%">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Bidang</th>
                        <th>email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>active</td>
                    </tr>
                </tbody>
            </table>
            {{-- datatables --}}
            <script>
                $(document).ready(function() {
                    $('#dataAnggota').DataTable();
                });
            </script>
        </div>
    </div>
    </div>
</div>
</x-app-layout>