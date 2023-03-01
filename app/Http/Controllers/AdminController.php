<?php

namespace App\Http\Controllers;

use App\Models\PemasokModel;
use App\Models\UnitModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Charts;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {



        $stockobat = 10;
        $dataobat = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->select('obats.*', 'pemasoks.nama_pemasok as nama_pemasok')
            ->where('stock', '<=', $stockobat)
            ->count();

        // hitung jumlah obat
        $dataobatjumlah = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->select('obats.*', 'pemasoks.nama_pemasok as nama_pemasok')
            ->count();

        // hitung obat kadaluarsa
        $hariini = Carbon::today();
        $dataobatt = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->select('obats.*', 'pemasoks.nama_pemasok as nama_pemasok')
            ->where('kadaluarsa', '<', $hariini)
            ->count();

        // obat habis

        $stockobatt = 0;
        $obathabis = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->select('obats.*', 'pemasoks.nama_pemasok as nama_pemasok')
            ->where('stock', '=', $stockobatt)
            ->count();

        // obat hampir habis
        $stockobat = 10;
        $hampirhabis = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->select('obats.*', 'pemasoks.nama_pemasok as nama_pemasok')
            ->where('stock', '<=', $stockobat)
            ->count();

        // data unit
        $dataunit = UnitModel::all()->count();

        // datapemasok
        $pemasuk = PemasokModel::all()->count();
        // permintaanobat
        $data = DB::table('_permintaan')->select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as month'))->groupBy(DB::raw('MONTH(created_at)'))->get();
        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $dataArray = array_fill_keys($months, 0);

        foreach ($data as $value) {
            $dataArray[$months[$value->month - 1]] = $value->total;
        }

        // obatkeluar
        $datakeluar = DB::table('obat_keluars')->select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as month'))->groupBy(DB::raw('MONTH(created_at)'))->get();
        $monthskelaur = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $dataArraykel = array_fill_keys($months, 0);

        foreach ($datakeluar as $k) {
            $dataArraykel[$monthskelaur[$k->month - 1]] = $k->total;
        }

        $title = 'Dashboard | Administrator';
        return view("admin.index", [
            'title'              => $title,
            'Dataobat'           => $dataobat,
            'jumlahobat'         => $dataobatjumlah,
            'obatkadaluarsa'     => $dataobatt,
            'obathabis'          => $obathabis,
            'obathampirhabis'    => $hampirhabis,
            'dataunit'           => $dataunit,
            'pemasuk'            => $pemasuk,
            'datao'              => $data,
            'months'             => $months,
            'dataArray'          => $dataArray,
            'datakeluar'         => $datakeluar,
            'monthskelaur'       => $monthskelaur,
            'dataArraykel'       => $dataArraykel
        ]);
    }
}
