<?php

namespace App\Http\Controllers;

use App\Models\PasienModel;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PasienModel::all();
        $title = 'Pasien | Dashboard';
        $page   = 'Data Pasien';

        return view(
            'admin.pasien.index',
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
        $data = PasienModel::all();
        $title = 'Pasien | Dashboard';
        $page   = 'Tambah Pasien';
        return view(
            'admin.pasien.create',
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
        try {
            $validateData = $request->validate([

                'nama_pasien'       => 'required',
                'alamat'            => 'required',
                'umur'              => 'required',
                'pekerjaan'         => 'required',
            ]);
            // dd($validateData);

            PasienModel::create($validateData);
            return redirect('/dashboard/pasien')->with('success', 'data berhasil ditambahkan');
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
        $data = PasienModel::where('id_pasiens', $id)->first();
        $title = 'Pasien | Dashboard';
        $page   = 'Edit Pasien';
        return view(
            'admin.pasien.edit',
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

                'nama_pasien'   => 'required',
                'alamat'        => 'required',
                'umur'          => 'required',
                'pekerjaan'     => 'required',
            ]);
            // dd($validateData);
            PasienModel::find($id)
                ->update($validateData);
            return redirect('/dashboard/pasien')->with('success', 'data berhasil diubah');
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
        PasienModel::destroy($id);
        return redirect('/dashboard/pasien')->with('success', 'data berhasil dihapus');
    }
}
