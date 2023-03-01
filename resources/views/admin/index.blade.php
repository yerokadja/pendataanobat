@extends('layouts.master')
@section('content')
    @php
        use Carbon\Carbon;

        $current_time = Carbon::now('Asia/Jakarta');
        $hour = $current_time->hour;

        if ($hour >= 6 && $hour < 12) {
            // Selamat siang
            $greeting = 'Selamat siang !';
        } elseif ($hour >= 12 && $hour < 18) {
            // Selamat sore
            $greeting = 'Selamat sore!';
        } else {
            // Selamat malam
            $greeting = 'Selamat malam!';
        }
    @endphp
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Hi {{ $greeting }}
                                        {{ auth()->guard('apoteker')->user()->nama_apoteker }} 🎉</h5>
                                    <p class="mb-4">
                                        Apa Kabarmu Hari ini ?
                                    </p>
                                    {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">Cek disini</a> --}}
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Text alignment -->
            <h5 class="pb-1 mb-4">Information</h5>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Obat</h5>
                            <p class="display-5 card-text">{{ $jumlahobat }}</p>
                            <a href="/dashboard/obat" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Obat Kadaluarsa</h5>
                            <p class=" display-5 card-text">{{ $obatkadaluarsa }}</p>
                            <a href="/dashboard/expired" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-end mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total obat habis</h5>
                            <p class=" display-5 card-text">{{ $obathabis }}</p>
                            <a href="/dashboard/habis" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Obat Hampir Habis </h5>
                            <p class=" display-5 card-text">{{ $obathampirhabis }}</p>
                            <a href="/dashboard/habis" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Data Unit Obat</h5>
                            <p class=" display-5 card-text">{{ $dataunit }}</p>
                            <a href="/dashboard/unit" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-end mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Data Pemasok obat</h5>
                            <p class=" display-5 card-text">{{ $pemasuk }}</p>
                            <a href="/dashboard/pemasok" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-6">
                            <div id="chart"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart"></div>
        </div>


        <div id="chart"></div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script>
            Highcharts.chart('chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Permintaan Obat Per Bulan'
                },
                xAxis: {
                    categories: <?php echo json_encode(array_values($months)); ?>,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Permintaan'
                    }
                },
                series: [{
                    name: 'Permintaan Obat',
                    data: <?php echo json_encode(array_values($dataArray)); ?>
                }]
            });
        </script>

        <script>
            Highcharts.chart('chart2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Obat keluar Per Bulan'
                },
                xAxis: {
                    categories: <?php echo json_encode(array_values($monthskelaur)); ?>,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Permintaan'
                    }
                },
                series: [{
                    name: 'Obat Keluar',
                    data: <?php echo json_encode(array_values($dataArraykel)); ?>
                }]
            });
        </script>
    @endsection
