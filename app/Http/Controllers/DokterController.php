<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DokterModel::all();
        $title = 'Dokter | Dashboard';
        $page   = 'Data Dokter';
        return view(
            'admin.dokter.index',
            [
                'title' => $title,
                'page'  => $page,
                'd'  => $data,
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
        $data = DokterModel::all();
        $title = 'Dokter | Dashboard';
        $page   = 'Tambah Dokter';
        return view(
            'admin.dokter.create',
            [
                'title' => $title,
                'page'  => $page,
                'd'  => $data,
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


        $validateData = $request->validate([

            'id_pasien'    => 'required',
            'nama_dokter'   => 'required',
            'nip'           => 'required',
            'alamat'        => 'required',
        ]);
        // dd($validateData);
        DokterModel::create($validateData);
        return redirect('/dashboard/dokter')->with('success', 'data berhasil ditambahkan');
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
        $data = DokterModel::where('id_dokter', $id)->first();
        $title = 'Dokter | Dashboard';
        $page   = 'Edit Dokter';
        return view(
            'admin.dokter.edit',
            [
                'title' => $title,
                'page'  => $page,
                'data'  => $data,
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
        try {
            $validateData = $request->validate([

                'id_pasien'    => 'required',
                'nama_dokter'   => 'required',
                'nip'           => 'required',
                'alamat'        => 'required',
            ]);
            // dd($validateData);
            logs('info');
            DokterModel::find($id)
                ->update($validateData);
            return redirect('/dashboard/dokter')->with('success', 'data berhasil diubah');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DokterModel::destroy($id);
        return redirect('/dashboard/dokter')->with('success', 'data berhasil dihapus');
    }
}
