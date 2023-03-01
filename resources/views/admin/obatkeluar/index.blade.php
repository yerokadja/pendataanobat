@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Obat Keluar</h5>
            <div class="card-body">
                <div class="demo-inline-spacing">
                    <a class="btn btn-outline-danger btn-sm" href="obat/cetak">
                        <i class='bx bxs-file-pdf'></i>
                        PDF</a>
                    <a class="btn btn-outline-primary btn-sm" href="obat-keluar/create">+
                        Tambah</a>
                </div>
            </div>
            {{-- <div class="float-end m-3">
                <a class="btn btn-outline-primary btn-sm" href="obat/create">+
                    TAMBAH</a>
            </div> --}}
            <div class="table-responsive text-nowrap">
                <table class="table" id="obat">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama obat</th>
                            <th>Jumlah</th>
                            <th>alasan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($obatkeluar as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_obat }} </td>
                                <td>{{ $data->jumlah }} Pcs</td>
                                <td>{{ strip_tags($data->alasan) }}</td>
                                <td>
                                    <form action="/dashboard/obat-keluar/{{ $data->id_obat_keluar }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="" value="{{ $data->id_obat_keluar }}">
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan resep ini?')"><i
                                                class='bx bx-error'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center"> Tidak ada data ..
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="panel">
                <div id="container"></div>
            </div>
        </div>
    </div>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#obat').DataTable({});
        });
        // Code that uses other library's $ can follow here.
    </script>
@endsection
