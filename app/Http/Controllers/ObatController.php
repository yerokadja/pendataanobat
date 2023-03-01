<?php

namespace App\Http\Controllers;

use App\Models\KategorisModel;
use App\Models\ObatsModel;
use App\Models\PemasokModel;
use App\Models\UnitModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class ObatController extends Controller
{
    public function index()
    {
        $dataobat = DB::table('obats')
            ->join('units', 'obats.unit', '=', 'units.id_unit')
            ->join('pemasoks', 'obats.id_pemasok', '=', 'pemasoks.id')
            ->join('kategoris', 'obats.kategori', '=', 'kategoris.id_kategori')
            ->select('obats.*', 'units.Nama_unit', 'pemasoks.nama_pemasok', 'kategoris.nama_kategori')
            ->get();


        // ddd($dataobat);
        foreach ($dataobat as $obat) {

            $now = Carbon::now();
            $tanggalkadaluarsa = Carbon::parse($obat->kadaluarsa);
            $formatted_expired_date = $tanggalkadaluarsa->format('F Y');
            if ($now->gt($tanggalkadaluarsa)) {
                $obat->status = 'Kadaluarsa';
            } else {
                $obat->status = 'Aman';
            }
        }
        $page = 'obat';
        $title = 'Obat | Dashboard';
        return view('admin.obat.index', [
            'title'     => $title,
            'obat'      => $dataobat,
        ]);
    }

    public function create()
    {
        //mengambil data pemasok
        $pemasok   = PemasokModel::all();
        $unit      = UnitModel::all();
        $kategori  = KategorisModel::all();
        $title     = 'Tambah Obat | Dashboard';
        $page      = 'Tambah obat';
        return view('admin.obat.create', [
            'title'     => $title,
            'page'      => $page,
            'pemasok'   => $pemasok,
            'unit'      => $unit,
            'kategori'  => $kategori
        ]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'nama_obat'          => 'required',
            'penyimpanan'        => 'required',
            'stock'              => 'required',
            'unit'               => 'required',
            'kategori'           => 'required',
            'kadaluarsa'         => 'required',
            'id_pemasok'         => 'required',
            'deskripsi'          => 'required',

        ]);
        // dd($validateData);
        ObatsModel::create($validateData);
        return redirect('/dashboard/obat')->with('success', 'data berhasil di tambahkan');
    }

    public function edit($id)
    {

        $pemasok    = PemasokModel::all();
        $kategori   = KategorisModel::all();
        $unit       = UnitModel::all();

        $obat = ObatsModel::where('id_obat', $id)->first();
        // ddd($obat);
        return view('admin.obat.edit', [

            'title'     => 'Edit Obat | Dashboard',
            'page'      => 'Edit Obat',
            'obatrow'   => $obat,
            'pemasok'   => $pemasok,
            'kategori'  => $kategori,
            'unit'      => $unit,

        ]);
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([

            'nama_obat'          => 'required',
            'penyimpanan'        => 'required',
            'stock'              => 'required',
            'unit'               => 'required',
            'kategori'           => 'required',
            'kadaluarsa'         => 'required',
            'id_pemasok'         => 'required',
            'deskripsi'          => 'required',

        ]);

        ObatsModel::find($id)
            ->update($validateData);
        return redirect('/dashboard/obat')->with('success', 'data berhasil diubah');
    }

    public function delete($id)

    {
        ObatsModel::find($id)
            ->delete();
        return redirect('/dashboard/obat')->with('success', 'data berhasil dihapus');
    }
}
