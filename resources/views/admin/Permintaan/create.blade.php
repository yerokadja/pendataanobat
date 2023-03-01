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
                        <form action="/dashboard/permintaan/" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nama Dokter</label>
                                <select class="form-select" @error('dokter_id') is-invalid @enderror name="dokter_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Masukan Nama Dokter</option>
                                    @foreach ($datadokter as $data => $d)
                                        {
                                        <option value="{{ $d->id_dokter }}">{{ $d->nama_dokter }}
                                        </option>
                                        }
                                    @endforeach
                                </select>
                                @error('dokter_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nama Pasien</label>
                                <select class="form-select" @error('pasien_id') is-invalid @enderror name="pasien_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Masukan Nama Pasien</option>
                                    @foreach ($datapasien as $data => $d)
                                        {
                                        <option value="{{ $d->id_pasiens }}">{{ $d->nama_pasien }}
                                        </option>
                                        }
                                    @endforeach
                                </select>
                                @error('pasien_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nama obat</label>
                                <select class="form-select" @error('obat_id') is-invalid @enderror name="obat_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Masukan Daftar obat</option>
                                    @foreach ($dataobat as $data => $d)
                                        {
                                        <option value="{{ $d->id_obat }}">{{ $d->nama_obat }} ( Stock
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
                                <label class="form-label" for="basic-default-company">Jumlah obat </label>
                                <input type="number" class="form-control" @error('jumlah') is-invalid @enderror
                                    value="{{ old('jumlah') }}" name="jumlah" placeholder="Masukaan jumlah obat " />
                                @error('jumlah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Keterangan</label>
                                <textarea id="basic-default-message" id="Keterangan" class=" ckeditor form-control"
                                    @error('record') is-invalid @enderror name="Keterangan" placeholder="Masukan Keterangan ">
                        {{ old('Keterangan') }}
                             </textarea>
                                @error('Keterangan')
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
            $('.Keterangan').ckeditor();
        });
    </script>
@endsection
