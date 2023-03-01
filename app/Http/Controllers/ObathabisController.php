<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObathabisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stock = 'Obat habis';
        $t = 'Obat hampir habis';

        $stockobat = 10;
        $dataobathabis = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->join('kategoris', 'obats.kategori', '=', 'kategoris.id_kategori')
            ->join('units', 'obats.unit', '=', 'units.id_unit')
            ->select('obats.*', 'units.Nama_unit', 'pemasoks.nama_pemasok', 'kategoris.nama_kategori')
            ->where('stock', '>', '0')
            ->where('stock', '<', $stockobat)
            ->get();

        foreach ($dataobathabis as $obat) {

            $tanggal_kadaluarsa = Carbon::parse($obat->kadaluarsa);
            $now = Carbon::now();
            $sisa_hari = $tanggal_kadaluarsa->format('F Y');

            if ($now->gt($sisa_hari)) {
                $obat->status = 'Kaduluarsa';
            } else {
                $obat->status = 'Normal';
            }
        }

        $stockobatt = 0;
        $dataobathampir = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->join('kategoris', 'obats.kategori', '=', 'kategoris.id_kategori')
            ->join('units', 'obats.unit', '=', 'units.id_unit')
            ->select('obats.*', 'units.Nama_unit', 'pemasoks.nama_pemasok', 'kategoris.nama_kategori')
            ->where('stock', '=', $stockobatt)
            ->get();

        foreach ($dataobathampir as $obat) {

            $tanggal_kadaluarsa = Carbon::parse($obat->kadaluarsa);
            $now = Carbon::now();
            $sisa_hari = $tanggal_kadaluarsa->format('F Y');

            if ($sisa_hari->gt($sisa_hari)) {
                $obat->status = 'Kaduluarsa ';
            } else {
                $obat->status = 'Normal';
            }
        }

        $title = 'Obat | Dashboard';
        return view('admin.obathabis.index', [

            'title'           => $title,
            'obathabis'       => $dataobathabis,
            'obathampir'      => $dataobathampir,
            'page'            => $stock,
            'page2'           => $t,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
