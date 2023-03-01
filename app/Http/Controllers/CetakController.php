<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CetakController extends Controller
{
    public function cetak()
    {
        $dataobat = DB::table('obats')
            ->join('units', 'obats.unit', '=', 'units.id_unit')
            ->join('pemasoks', 'obats.id_pemasok', '=', 'pemasoks.id')
            ->join('kategoris', 'obats.kategori', '=', 'kategoris.id_kategori')
            ->select('obats.*', 'units.Nama_unit', 'pemasoks.nama_pemasok', 'kategoris.nama_kategori')
            ->get();


        // ddd($dataobat);
        foreach ($dataobat as $obat) {

            $tanggal_kadaluarsa = Carbon::parse($obat->kadaluarsa);
            $now = Carbon::now();
            $sisa_hari = $tanggal_kadaluarsa->diffInDays($now);
            if ($sisa_hari <= 7) {
                $obat->status = ' Obat Sudah Kaduluarsa dalam' . " $sisa_hari " . 'hari';
            } else {
                $obat->status = 'Normal';
            }
        }

        $pdf = PDF::loadView(
            'admin.obat.cetak',
            [
                'obat' => $dataobat,
            ]
        );

        return $pdf->download('Laporan-Data-Barang.pdf');
    }

    public function cetakresep($id)
    {
        $data = DB::table('_permintaan')

            ->join('obats', '_permintaan.obat_id', '=', 'obats.id_obat')
            ->join('pasiens', '_permintaan.pasien_id', '=', 'pasiens.id_pasiens')
            ->join('dokters', '_permintaan.dokter_id', '=', 'dokters.id_dokter')
            ->select('_permintaan.*', 'obats.nama_obat', 'pasiens.nama_pasien', 'dokters.nama_dokter',)
            ->where('id_permintaan', $id)
            ->get();
        // dd($data);

        $pdf = PDF::loadView(
            'admin.permintaan.cetak',
            [
                'data' => $data,
            ]
        );

        return $pdf->download('Resep.pdf');
    }
}
