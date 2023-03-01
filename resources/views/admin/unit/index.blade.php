@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">{{ $page }}</h5>
            <div class="float-end m-3">
                <a class="btn btn-outline-primary btn-sm" href="unit/create">+
                    TAMBAH</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table" id="obat">
                    <thead>
                        <tr class="text-center">
                            <th height="20px">No.</th>
                            <th>Nama Unit</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($unit as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->Nama_unit }}</td>
                                <td>
                                    <form action="/dashboard/unit/{{ $data->id_unit }}" method="post">
                                        <a href="/dashboard/unit/{{ $data->id_unit }}/edit"
                                            class="btn btn-outline-success btn-sm"><i class='bx bx-edit-alt'></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button btn btn-outline-danger btn-sm"><i
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
