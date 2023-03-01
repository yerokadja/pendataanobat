<?php

namespace App\Http\Controllers;

use App\Models\PermintaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanPengunaaController extends Controller
{
    public function cetak()
    {

        // dd($obatKeluarPerbulan);

        $data = DB::table('_permintaan')
            ->join('obats', '_permintaan.obat_id', '=', 'obats.id_obat')
            ->join('pasiens', '_permintaan.pasien_id', '=', 'pasiens.id_pasiens')
            ->join('dokters', '_permintaan.dokter_id', '=', 'dokters.id_dokter')
            ->select('_permintaan.*', 'obats.nama_obat', 'pasiens.nama_pasien', 'dokters.nama_dokter',)
            ->get();


        $pdf = PDF::loadView(
            'admin.laporanpengunaa.laporan',
            [
                'data' => $data,
            ]
        );

        return $pdf->download('Laporan-Data-penggunaan-obat.pdf');
    }
}
