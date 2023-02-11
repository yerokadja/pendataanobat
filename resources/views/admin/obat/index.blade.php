@extends('layouts.master')
@section('content')


   <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <h5 class="card-header">Data Obat</h5>
                    <div class="float-end m-3">
                        <a class="btn btn-outline-primary btn-sm" href="obat/create">+
                        TAMBAH</a>
                    </div>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="obat">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama obat</th>
                        <th>Peyimpanan</th>
                        <th>Kategori</th>
                        <th>Pemasok</th>
                        <th>Stok</th>
                        <th>kadaluarsa</th>
                        <th>Unit</th>
                        <th>aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($obat as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_obat}}</td>
                            <td>{{$data->penyimpanan}}</td>
                            <td>{{$data->kategori}}</td>
                            <td>{{$data->nama_pemasok }}</td>
                            <td>{{$data->stock}}</td>
                            <td>
                            @if($data->status=="Normal")
                            <button type="button" class="btn btn-primary btn-sm">{{$data->status}}</button>
                            @else
                            <button type="button" class="btn btn-danger btn-sm">{{$data->status}}</button>
                            @endif
                            </td>
                            <td>{{$data->unit}}</td>
                            <td>
                                <form action="">
                                <a href="" class="btn btn-outline-success btn-sm"><i class='bx bx-edit-alt' ></i></a>
                                <a href="" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
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
jQuery( document ).ready(function( $ ) {
    $('#obat').DataTable({
        dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
});
// Code that uses other library's $ can follow here.
</script>


@endsection
