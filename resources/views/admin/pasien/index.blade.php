@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">{{ $page }}</h5>
            <div class="card-body">
                <div class="demo-inline-spacing">
                    <a class="btn btn-outline-danger btn-sm" href="obat/cetak">
                        <i class='bx bxs-file-pdf'></i>
                        PDF</a>
                    <a class="btn btn-outline-primary btn-sm" href="pasien/create">+
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
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Umur</th>
                            <th>Pekerjaan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($d as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_pasien }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->umur }}</td>
                                <td>{{ $data->pekerjaan }}</td>
                                <td>
                                    <form action="/dashboard/pasien/{{ $data->id_pasiens }}" method="post">
                                        <a href="/dashboard/pasien/{{ $data->id_pasiens }}/edit/"
                                            class="btn btn-outline-success btn-sm"><i class='bx bx-edit-alt'></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class='bx bx-trash'></i>
                                        </button>
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
