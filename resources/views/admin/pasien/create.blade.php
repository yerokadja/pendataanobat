@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/</span> {{ $page }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/pasien" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Pasien</label>
                                <input type="text" class="form-control" @error('nama_pasien') is-invalid @enderror
                                    value="{{ old('nama_pasien') }}" name="nama_pasien" placeholder="Masukan Nama pasien" />
                                @error('nama_pasien')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="id_pasien" value="4">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Alamat</label>
                                <input type="text" class="form-control" @error('alamat') is-invalid @enderror
                                    value="{{ old('alamat') }}" name="alamat" placeholder="Masukan alamat " />
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Umur</label>
                                <input type="text" class="form-control" @error('umur') is-invalid @enderror
                                    value="{{ old('umur') }}" name="umur" placeholder="Masukan umur" />
                                @error('umur')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Pekerjaan</label>
                                <input type="text" class="form-control" @error('pekerjaan') is-invalid @enderror
                                    value="{{ old('pekerjaan') }}" name="pekerjaan" placeholder="Masukan pekerjaan" />
                                @error('pekerjaan')
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
