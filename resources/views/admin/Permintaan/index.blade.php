@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Permintaan obat</h5>
            <div class="card-body">
                <div class="demo-inline-spacing">
                    <a class="btn btn-outline-danger btn-sm" href="obat/cetak">
                        <i class='bx bxs-file-pdf'></i>
                        PDF</a>
                    <a class="btn btn-outline-primary btn-sm" href="permintaan/create">+
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
                            <th>Nama Dokter</th>
                            <th>Nama Pasien</th>
                            <th>Nama obat</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($obatkeluar as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_dokter }} </td>
                                <td>{{ $data->nama_pasien }} </td>
                                <td>{{ $data->nama_obat }} </td>
                                <td>{{ $data->jumlah }} Pcs</td>
                                <td>{{ strip_tags($data->Keterangan) }}</td>
                                <td>
                                    <form action="/dashboard/permintaan/{{ $data->id_permintaan }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-primary btn-sm"
                                            href="/dashboard/permintaan/cetak/{{ $data->id_permintaan }}"><i
                                                class='bx bx-printer'></i></a>
                                        <input type="hidden" name="" value="{{ $data->id_permintaan }}">
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="deleteData()"><i class='bx bx-error'></i></button>
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
