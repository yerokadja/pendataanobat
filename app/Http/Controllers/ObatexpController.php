<?php

namespace App\Http\Controllers;

use App\Models\ObatsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ObatexpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataobat = DB::table('obats')
            ->join('units', 'obats.unit', '=', 'units.id_unit')
            ->join('pemasoks', 'obats.id_pemasok', '=', 'pemasoks.id')
            ->join('kategoris', 'obats.kategori', '=', 'kategoris.id_kategori')
            ->select('obats.*', 'units.Nama_unit', 'pemasoks.nama_pemasok', 'kategoris.nama_kategori')
            ->get();


        $hariini = Carbon::today();
        $dataobat = DB::table('obats')
            ->join('units', 'obats.unit', '=', 'units.id_unit')
            ->join('pemasoks', 'obats.id_pemasok', '=', 'pemasoks.id')
            ->join('kategoris', 'obats.kategori', '=', 'kategoris.id_kategori')
            ->select('obats.*', 'units.Nama_unit', 'pemasoks.nama_pemasok', 'kategoris.nama_kategori')
            ->where('kadaluarsa', '<', $hariini)
            ->get();

        $title = 'Exp | Dashboard';
        $page  = 'Data obat Kadaluarsa';
        return view(
            'admin.obatexp.index',
            [
                'title'  => $title,
                'page'   => $page,
                'obat'   => $dataobat,

            ]
        );
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
