@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Obat/</span> {{ $page }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/pemasok/{{ $data->id }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama pemasok</label>
                                <input type="text" class="form-control" @error('nama_pemasok') is-invalid @enderror
                                    value="{{ old('nama_pemasok') ?? $data->nama_pemasok }}" name="nama_pemasok"
                                    placeholder="Masukan unit" />
                                @error('nama_pemasok')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Alamat</label>
                                <input type="text" class="form-control" @error('alamat') is-invalid @enderror
                                    value="{{ old('alamat') ?? $data->alamat }}" name="alamat"
                                    placeholder="Masukan unit" />
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">No.telpon</label>
                                <input type="text" class="form-control" @error('no_telpon') is-invalid @enderror
                                    value="{{ old('no_telpon') ?? $data->no_telpon }}" name="no_telpon"
                                    placeholder="Masukan unit" />
                                @error('no_telpon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
