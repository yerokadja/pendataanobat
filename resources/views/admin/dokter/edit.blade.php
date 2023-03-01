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
                        <form action="/dashboard/dokter/{{ $data->id_dokter }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Dokter</label>
                                <input type="text" class="form-control" @error('nama_dokter') is-invalid @enderror
                                    value="{{ old('nama_dokter') ?? $data->nama_dokter }}" name="nama_dokter"
                                    placeholder="Masukan unit" />
                                @error('nama_dokter')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="id_pasien" value="4">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">nip</label>
                                <input type="text" class="form-control" @error('nip') is-invalid @enderror
                                    value="{{ old('nip') ?? $data->nip }}" name="nip" placeholder="Masukan unit" />
                                @error('nip')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">ALAMAT</label>
                                <input type="text" class="form-control" @error('alamat') is-invalid @enderror
                                    value="{{ old('alamat') ?? $data->alamat }}" name="alamat"
                                    placeholder="Masukan unit" />
                                @error('alamat')
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
