<?php

namespace App\Http\Controllers;

use App\Models\ApotekerModel;
use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ApotekerModel::all();
        $title = 'Apoteker | Dashboard';
        $page   = 'Data Apoteker';
        return view(
            'admin.apoteker.index',
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
        $data = ApotekerModel::all();
        $title = 'Apoteker | Dashboard';
        $page   = 'Tambah Apoteker';
        return view(
            'admin.apoteker.create',
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

            'id_pasien'     => 'required',
            'nama_apoteker' => 'required',
            'nim'           => 'required',
            'alamat'        => 'required',
        ]);
        // dd($validateData);
        ApotekerModel::create($validateData);
        return redirect('/dashboard/apoteker')->with('success', 'data berhasil ditambahkan');
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
        $data = ApotekerModel::where('id_apoteker', $id)->first();
        $title = 'Apoteker | Dashboard';
        $page   = 'Edit Dokter';
        return view(
            'admin.apoteker.edit',
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
        $validateData = $request->validate([

            'id_pasien'      => 'required',
            'nama_apoteker'  => 'required',
            'nim'            => 'required',
            'alamat'         => 'required',
            'username'       => 'required',
            'password'       => 'required',
        ]);

        ApotekerModel::find($id)
            ->update($validateData);
        return redirect('/dashboard/apoteker')->with('success', 'data berhasil diubah');
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
