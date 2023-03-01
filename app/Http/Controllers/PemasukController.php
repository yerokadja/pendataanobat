<?php

namespace App\Http\Controllers;

use App\Models\PemasokModel;
use Illuminate\Http\Request;

class PemasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pemasuk = PemasokModel::all();
        $title = 'Pemasok | Dashboard';
        $page = 'Data Pemasok';
        return view('admin.pemasok.index', [
            'title'     => $title,
            'page'      => $page,
            'pemasok'      => $pemasuk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Pemasok | Dashboard';
        $page = 'Tambah Pemasok';
        return view('admin.pemasok.create', [
            'title' => $title,
            'page' => $page,

        ]);
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
            'nama_pemasok'  => 'required',
            'alamat'        => 'required',
            'no_telpon'     => 'required |numeric',
        ]);
        // dd($validateData);
        PemasokModel::create($validateData);
        return redirect('/dashboard/pemasok')->with('success', 'data berhasil ditambahkan');
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


        $title = 'Pemasok | Dashboard';
        $page  = 'Edit Pemasok';
        $data  = PemasokModel::Where('id', $id)->first();

        return view(
            'admin.pemasok.edit',
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
            'nama_pemasok'          => 'required',
            'alamat'                => 'required',
            'no_telpon'             => 'required',
        ]);
        // dd($validateData);
        PemasokModel::find($id)->update($validateData);
        return redirect('/dashboard/pemasok')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PemasokModel::destroy($id);
        return redirect('/dashboard/pemasok')->with('success', 'data berhasil dihapus');
    }
}
