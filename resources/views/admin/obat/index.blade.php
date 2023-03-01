@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Obat</h5>
            <div class="card-body">
                <div class="demo-inline-spacing">
                    <a class="btn btn-outline-danger btn-sm" href="obat/cetak">
                        <i class='bx bxs-file-pdf'></i>
                        PDF</a>
                    <a class="btn btn-outline-primary btn-sm" href="obat/create">+
                        Tambah</a>
                </div>
            </div>
            {{-- <div class="float-end m-3">
                <a class="btn btn-outline-primary btn-sm" href="obat/create">+
                    TAMBAH</a>
            </div> --}}
            <div class="table-responsive text-nowrap">
                <table class="table" id="obat">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama obat</th>
                            <th>Pemasok</th>
                            <th>Kategori</th>
                            <th>Unit</th>
                            <th>Peyimpanan</th>
                            <th>Stok</th>
                            <th>TGL.kadaluarsa</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($obat as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_obat }}</td>
                                <td>{{ $data->nama_pemasok }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->Nama_unit }}</td>
                                <td>{{ $data->penyimpanan }}</td>
                                @if ($data->stock == 0)
                                    <td> <button
                                            type="button"class="btn btn-danger btn-sm">{{ $data->stock = 'Stock habis' }}</button>
                                    </td>
                                @else
                                    <td>{{ $data->stock }} Pcs</td>
                                @endif
                                <td>{{ $data->kadaluarsa }}</td>
                                <td>
                                    @if ($data->status == 'Aman')
                                        <button type="button" class="btn btn-primary btn-sm">{{ $data->status }}</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm">{{ $data->status }}</button>
                                    @endif
                                </td>
                                <td>
                                    <form action="/dashboard/obat/delete/{{ $data->id_obat }}" method="post">
                                        <a href="/dashboard/obat/edit/{{ $data->id_obat }}"
                                            class="btn btn-outline-success btn-sm"><i class='bx bx-edit-alt'></i></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                class='bx bx-trash'></i></button>
                                    </form>
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
                dom: 'Bftrip',
                button: [
                    'copy', 'pdf', 'csv', 'excel', 'print'
                ]
            });
        });
    </script>
@endsection
