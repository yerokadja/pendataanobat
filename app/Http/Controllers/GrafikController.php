<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function permintaan()
    {
        // permintaanobat
        $datakel = DB::table('_permintaan')->select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as month'))->groupBy(DB::raw('MONTH(created_at)'))->get();
        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $dataArray = array_fill_keys($months, 0);

        foreach ($datakel as $value) {
            $dataArray[$months[$value->month - 1]] = $value->total;
        }

        ddd($datakel);

        $title = 'Chart Permintaan Obat | Dashboard';
        return view('admin.Permintaan.chart', [
            'title'              => $title,
            'data'               => $datakel,
            'months'             => $months,
            'dataArray'          => $dataArray,
        ]);
    }
}
