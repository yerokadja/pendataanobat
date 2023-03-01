<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use App\Models\ObatsModel;
use App\Models\PasienModel;
use App\Models\PermintaanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    protected $obat;
    protected $transaksipermintaan;

    public function __construct()
    {
        $this->obat = app()->make(ObatsModel::class);
        $this->transaksipermintaan = app()->make(PermintaanModel::class);
    }

    public function index()
    {

        $permintaan = PermintaanModel::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(jumlah) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $data = [];
        $labels = [];

        foreach ($permintaan as $item) {
            $data[] = $item->total;
            $labels[] = date('F Y', mktime(0, 0, 0, $item->month, 1, $item->year));
        }
        // dd($obatKeluarPerbulan);
        $data = DB::table('_permintaan')

            ->join('obats', '_permintaan.obat_id', '=', 'obats.id_obat')
            ->join('pasiens', '_permintaan.pasien_id', '=', 'pasiens.id_pasiens')
            ->join('dokters', '_permintaan.dokter_id', '=', 'dokters.id_dokter')
            ->select('_permintaan.*', 'obats.nama_obat', 'pasiens.nama_pasien', 'dokters.nama_dokter',)
            ->get();


        // permintaanobat
        $datakel = DB::table('_permintaan')->select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as month'))->groupBy(DB::raw('MONTH(created_at)'))->get();
        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $dataArray = array_fill_keys($months, 0);

        foreach ($datakel as $value) {
            $dataArray[$months[$value->month - 1]] = $value->total;
        }

        $title = 'Permintaan obat | Dashboard';
        return view('admin.permintaan.index', compact('data', 'labels'), [

            'title'              => $title,
            'obatkeluar'         => $data,
            'data'               => $data,
            'datao'              => $data,
            'months'             => $months,
            'dataArray'          => $dataArray,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataobat        = ObatsModel::all();
        $datadokter      = DokterModel::all();
        $datapasien      = PasienModel::all();

        $title = 'Permintaan Obat | Dashboard';
        $page =  'Tambah Permintaan Obat';
        return view(
            'admin.permintaan.create',
            [
                'page'       => $page,
                'title'      => $title,
                'dataobat'   => $dataobat,
                'datadokter' => $datadokter,
                'datapasien' => $datapasien,
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

        try {
            $validatedData = $request->validate([

                'dokter_id'         => 'required',
                'pasien_id'         => 'required',
                'obat_id'           => 'required',
                'jumlah'            => 'required|numeric',
                'Keterangan'        => 'required'
            ]);

            $obat = $this->obat->where('id_obat', $validatedData['obat_id'])->first();
            // dd($validatedData);
            // exit();
            // Cek ketersediaan stok obat
            $hariini = Carbon::today();
            if ($obat->stock < $validatedData['jumlah']) {
                return back()->with('error', 'Stok obat tidak mencukupi.');
            } elseif ($obat->kadaluarsa < $hariini) {
                return back()->with('error', 'obat sudah kadaluarsa.');
            } else {
            }


            // Mengurangi stok obat yang tersedia
            $obat->stock -= $validatedData['jumlah'];
            $obat->save();

            // Menyimpan data transaksi permintaan obat  ke dalam database
            $loop =  $this->transaksipermintaan->create(
                [
                    'pasien_id'      => $validatedData['pasien_id'],
                    'dokter_id'      => $validatedData['dokter_id'],
                    'obat_id'        => $validatedData['obat_id'],
                    'jumlah'         => $validatedData['jumlah'],
                    'Keterangan'     => $validatedData['Keterangan'],
                ]
            );
            return redirect('/dashboard/permintaan')->with('success', 'Data Permintaan obat berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
        $resep = PermintaanModel::findOrFail($id);
        $obat = ObatsModel::findOrFail($resep->obat_id);
        $obat->stock += $resep->jumlah;
        $obat->save();

        $resep->delete();
        return redirect('/dashboard/permintaan')->with('success', 'Data Permintaan Obat berhasil dihapus.');
    }
}
