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
                        <form action="/dashboard/unit/{{ $unit->id_unit }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama unit</label>
                                <input type="text" class="form-control" @error('Nama_unit') is-invalid @enderror
                                    value="{{ old('Nama_unit') ?? $unit->Nama_unit }}" name="Nama_unit"
                                    placeholder="Masukan unit" />
                                @error('Nama_unit')
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
