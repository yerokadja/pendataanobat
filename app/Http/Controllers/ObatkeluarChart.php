<?php

namespace App\Http\Controllers;

use App\Models\ObatkeluarModel;
use Illuminate\Http\Request;
use App\Charts\UserChart;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ObatkeluarChart extends Controller
{
    public function index()
    {
        try {
            $obatKeluar = ObatkeluarModel::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
            $bulan = ObatkeluarModel::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

            $grafik = charts::create('bar', 'highcharts')
                ->title('Grafik Obat Keluar per Bulan')
                ->elementLabel('Jumlah')
                ->labels($bulan)
                ->values($obatKeluar)
                ->dimensions(1000, 500)
                ->responsive(true);

            return view('admin.obatkeluar.grafik', ['grafik' => $grafik]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
