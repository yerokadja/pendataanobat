<?php

namespace App\Http\Controllers;

use App\Models\ObatsModel;
use App\Models\PemasokModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ObatController extends Controller
{
    public function index()
    {
        $dataobat = DB::table('obats')
            ->join('pemasoks', 'id', '=', 'obats.id_pemasok')
            ->select('obats.*', 'pemasoks.nama_pemasok as nama_pemasok')
            ->get();

        foreach ($dataobat as $obat) {

            $tanggal_kadaluarsa = Carbon::parse($obat->kadaluarsa);
            $now = Carbon::now();
            $sisa_hari = $tanggal_kadaluarsa->diffInDays($now);

            if ($sisa_hari <= 7) {
                $obat->status = 'Kaduluarsa dalam' . $sisa_hari . 'hari';
            } else {
                $obat->status = 'Normal';
            }
        }

        $title = 'Obat | Dashboard';
        return view('admin.obat.index', [
            'title'     => $title,
            'obat'      => $dataobat
        ]);
    }

    public function create()
    {
        //mengambil data pemasok
        $pemasok = PemasokModel::all();
        $title = 'Tambah Obat | Dashboard';
        $page  = 'Tambah obat';
        return view('admin.obat.create', [
            'title' => $title,
            'page' => $page,
            'pemasok' => $pemasok,
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

        return view('admin.obat.edit', [
            'title'   => 'Edit Obat | Dashboard',
            'page'    => 'Edit Obat',
            'obatrow' => ObatsModel::where('obat_id', $id)->first(),
        ]);
    }
}
