@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Apoteker/</span> {{ $page }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/apoteker/{{ $data->id_apoteker }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Apoteker </label>
                                <input type="text" class="form-control" @error('nama_apoteker') is-invalid @enderror
                                    value="{{ old('nama_apoteker') ?? $data->nama_apoteker }}" name="nama_apoteker"
                                    placeholder="Masukan unit" />
                                @error('nama_apoteker')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="id_pasien" value="4">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">nip</label>
                                <input type="text" class="form-control" @error('nim') is-invalid @enderror
                                    value="{{ old('nim') ?? $data->nim }}" name="nim" placeholder="Masukan unit" />
                                @error('nim')
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

                            @if (auth()->guard('apoteker')->user()->nama_apoteker == $data->nama_apoteker)
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Username</label>
                                    <input type="text" class="form-control" @error('username') is-invalid @enderror
                                        value="{{ old('username') ?? $data->username }}" name="username"
                                        placeholder="Masukan unit" />
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Password</label>
                                    <input type="text" class="form-control" @error('password') is-invalid @enderror
                                        value="{{ old('password') ?? $data->password }}" name="password"
                                        placeholder="Masukan unit" />
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @else
                            @endif
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
