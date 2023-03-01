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
                        <form action="/dashboard/obat-keluar/{{ $obatkeluar->id_obat_keluar }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nama Obat</label>
                                <select class="form-select" @error('obat_id') is-invalid @enderror name="obat_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Masukan Daftar obat</option>
                                    @foreach ($dataobat as $data => $d)
                                        {
                                        <option value="{{ $d->id_obat }} "
                                            {{ $obatkeluar->obat_id == $d->id_obat ? 'selected' : '' }}>
                                            {{ $d->nama_obat }} ( Stock
                                            Obat
                                            <b>{{ $d->stock }}</b> Pcs)
                                        </option>
                                        }
                                    @endforeach

                                </select>
                                @error('obat_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Jumlah obat Keluar</label>
                                <input type="number" class="form-control" @error('jumlah') is-invalid @enderror
                                    value="{{ old('jumlah') }}" name="jumlah" placeholder="Masukaan jumlah obat " />
                                @error('jumlah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Alasan</label>
                                <textarea id="basic-default-message" id="alasan" class=" ckeditor form-control" @error('record') is-invalid @enderror
                                    name="alasan" placeholder="Masukan Alasan ">
                                 {{ old('alasan') }}
                             </textarea>
                                @error('alasan')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.alasan').ckeditor();
        });
    </script>
@endsection
