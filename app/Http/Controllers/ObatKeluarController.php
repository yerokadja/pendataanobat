<?php

namespace App\Http\Controllers;

use App\Models\ObatkeluarModel;
use App\Models\ObatsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OCILob;

class ObatKeluarController extends Controller
{
    protected $obat;
    protected $transaksiObatKeluar;

    public function __construct()
    {
        $this->obat = app()->make(ObatsModel::class);
        $this->transaksiObatKeluar = app()->make(ObatkeluarModel::class);
    }

    public function index()
    {
        // dd($obatKeluarPerbulan);
        $data = DB::table('obat_keluars')
            ->join('obats', 'obat_keluars.obat_id', '=', 'obats.id_obat')
            ->select('obat_keluars.*', 'obats.nama_obat',)
            ->get();

        $title = 'Obat Keluar | Dashboard';
        return view('admin.obatkeluar.index', [
            'title' => $title,
            'obatkeluar' => $data,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ObatkeluarModel::all();
        $dataobat = ObatsModel::all();
        $title = 'Obat Keluar | Dashboard';
        $page = 'Tambah Obat Keluar';
        return view(
            'admin.obatkeluar.create',
            [
                'page'       => $page,
                'title'      => $title,
                'obatkeluar' => $data,
                'dataobat'   => $dataobat,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // try {
        $validatedData = $request->validate([
            'obat_id'   => 'required',
            'jumlah'    => 'required|numeric',
            'alasan'    => 'required'
        ]);

        $obat = $this->obat->where('id_obat', $validatedData['obat_id'])->first();
        // dd($obat);

        // Cek ketersediaan stok obat
        if ($obat->stock < $validatedData['jumlah']) {
            return back()->with('error', 'Stok obat tidak mencukupi.');
        }

        // Mengurangi stok obat yang tersedia
        $obat->stock -= $validatedData['jumlah'];
        $obat->save();

        // Menyimpan data transaksi obat keluar ke dalam database
        $this->transaksiObatKeluar->create([
            'obat_id'        => $validatedData['obat_id'],
            'jumlah'         => $validatedData['jumlah'],
            'alasan'         => $validatedData['alasan'],
        ]);

        return redirect('/dashboard/obat-keluar')->with('success', 'Data transaksi obat keluar berhasil disimpan.');
        // } catch (\Exception $e) {
        //     return back()->with('error', $e->getMessage());
        // }
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



        $title = 'Obat Keluar | Dashboard';
        $page = 'Edit Obat Keluar';
        $data = ObatkeluarModel::where('id_obat_keluar', $id)->first();
        $dataobats = ObatsModel::all();
        // ddd($data);
        return view(
            'admin.obatkeluar.edit',
            [
                'page'       => $page,
                'title'      => $title,
                'obatkeluar' => $data,
                'dataobat'   => $dataobats,
            ]
        );
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

        $validatedData = $request->validate([
            'obat_id'   => 'required',
            'jumlah'    => 'required|numeric',
            'alasan'    => 'required'
        ]);
        return redirect('/dashboard/obat-keluar')->with('success', 'Data transaksi obat keluar berhasil diubah.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $resep = ObatkeluarModel::findOrFail($id);
        $obat = ObatsModel::findOrFail($resep->obat_id);
        $obat->stock += $resep->jumlah;
        $obat->save();

        $resep->delete();
        return redirect('/dashboard/obat-keluar')->with('success', 'Data transaksi obat keluar berhasil diubah.');
    }
}
