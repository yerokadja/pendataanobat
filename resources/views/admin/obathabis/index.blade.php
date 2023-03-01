@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">{{ $page }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="obat">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama obat</th>
                            <th>Peyimpanan</th>
                            <th>Kategori</th>
                            <th>Unit</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th>tgl kadaluarsa</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($obathampir as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_obat }}</td>
                                <td>{{ $data->penyimpanan }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->Nama_unit }}</td>
                                <td>{{ $data->stock }}</td>
                                <td>{{ $data->nama_pemasok }}</td>
                                <td>{{ $data->kadaluarsa }}</td>
                                <td>

                                    @if ($data->status == 'Kaduluarsa')
                                        <button type="button" class="btn btn-danger btn-sm">
                                            {{ $data->status }}</button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-sm">
                                            {{ $data->status }}</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center"> Tidak ada data .. </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">{{ $page2 }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="obatt">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama obat</th>
                            <th>Peyimpanan</th>
                            <th>Kategori</th>
                            <th>Unit</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th> tgl kadaluarsa</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($obathabis as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_obat }}</td>
                                <td>{{ $data->penyimpanan }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->Nama_unit }}</td>
                                <td>{{ $data->stock }}</td>
                                <td>{{ $data->nama_pemasok }}</td>
                                <td>{{ $data->kadaluarsa }}</td>
                                <td>

                                    @if ($data->status == 'Kaduluarsa')
                                        <button type="button" class="btn btn-danger btn-sm">
                                            {{ $data->status }}</button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-sm">
                                            {{ $data->status }}</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center"> Tidak ada data .. </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#obat').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


    <script>
        jQuery(document).ready(function($) {
            $('#obatt').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
