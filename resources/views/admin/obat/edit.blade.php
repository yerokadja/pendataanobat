@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Obat/</span> {{ $page }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/obat/update/{{ $obatrow->id_obat }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Obat</label>
                                <input type="text" class="form-control" @error('nama_obat') is-invalid @enderror
                                    value="{{ old('nama_obat') ?? $obatrow->nama_obat }}" name="nama_obat"
                                    placeholder="Masukan nama obat" />
                                @error('nama_obat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">penyimpanan</label>
                                <input type="text" class="form-control" @error('penyimpanan') is-invalid @enderror
                                    value="{{ old('penyimpanan') ?? $obatrow->penyimpanan }}" name="penyimpanan"
                                    placeholder="Masukaan" />
                                @error('penyimpanan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">stock</label>
                                <input type="text" class="form-control" @error('stock') is-invalid @enderror
                                    value="{{ old('stock') ?? $obatrow->stock }}" name="stock"
                                    placeholder="Masukan stock obat" />
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Unit</label>
                                <select class="form-select" @error('unit') is-invalid @enderror name="unit"
                                    aria-label="Default select example">
                                    <option selected>Masukan unit obat</option>
                                    @foreach ($unit as $key => $value)
                                        <option value="{{ $value->id_unit }}"
                                            {{ $obatrow->unit == $value->id_unit ? 'selected' : '' }}>
                                            {{ $value->Nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                                <select class="form-select" @error('kategori') is-invalid @enderror name="kategori"
                                    aria-label="Default select example">
                                    <option selected>Masukan Nama Pemasok </option>
                                    @foreach ($kategori as $key => $value)
                                        <option value="{{ $value->id_kategori }}"
                                            {{ $obatrow->kategori == $value->id_kategori ? 'selected' : '' }}>
                                            {{ $value->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="html5-date-input" class="col-md-2 col-form-label">tanggal kadaluarsa</label>
                                <div class="col-md">
                                    <input class="form-control" @error('kadaluarsa') is-invalid @enderror
                                        value="{{ old('kadaluarsa') ?? $obatrow->kadaluarsa }}" name="kadaluarsa"
                                        type="date" />
                                    @error('kadaluarsa')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nama Pemasok</label>
                                <select class="form-select" @error('id_pemasok') is-invalid @enderror name="id_pemasok"
                                    aria-label="Default select example">
                                    <option selected>Masukan Nama Pemasok </option>
                                    @foreach ($pemasok as $key => $value)
                                        <option value="{{ $value->id }}"
                                            {{ $obatrow->id_pemasok == $value->id ? 'selected' : '' }}>
                                            {{ $value->nama_pemasok }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pemasok')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Deskripsi</label>
                                <textarea id="basic-default-message" class="form-control" @error('record') is-invalid @enderror name="deskripsi"
                                    placeholder="Masukan Deskripsi Obat">
                                 {{ old('deskripsi') ?? $obatrow->deskripsi }}
                        </textarea>
                                @error('deskripsi')
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
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection
