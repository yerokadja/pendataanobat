@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dokter/</span> {{ $page }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/dokter" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Dokter</label>
                                <input type="text" class="form-control" @error('nama_dokter') is-invalid @enderror
                                    value="{{ old('nama_dokter') }}" name="nama_dokter" placeholder="Masukan Nama Dokter" />
                                @error('nama_dokter')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="id_pasien" value="4">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nip/Sip</label>
                                <input type="text" class="form-control" @error('nip') is-invalid @enderror
                                    value="{{ old('nip') }}" name="nip" placeholder="Masukan NIP/SIP " />
                                @error('nip')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Alamat</label>
                                <input type="text" class="form-control" @error('alamat') is-invalid @enderror
                                    value="{{ old('alamat') }}" name="alamat" placeholder="Masukan Alamat" />
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
