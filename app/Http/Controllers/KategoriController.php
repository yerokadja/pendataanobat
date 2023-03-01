<?php

namespace App\Http\Controllers;

use App\Models\KategorisModel;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Kategori | Dashboard';
        $data = KategorisModel::all();
        $page = 'Data Kategori';
        return view('admin.kategori.index', [
            'title'     => $title,
            'kategori'  => $data,
            'page'      => $page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Kategori | Dashboard';
        $page = 'Tambah Kategori';
        return view('admin.kategori.create', [
            'title'     => $title,
            'page'      => $page,
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
            'nama_kategori'          => 'required',
        ]);
        // dd($validateData);
        KategorisModel::create($validateData);
        return redirect('/dashboard/kategori')->with('success', 'data berhasil ditambahkan');
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
        $data = KategorisModel::where('id_kategori', $id)->first();
        return view('admin.kategori.edit', [
            'title'   => 'Edit Obat | Dashboard',
            'page'    => 'Edit Obat',
            'kategori' => $data,
        ]);
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
            'nama_kategori'          => 'required',
        ]);
        // dd($validateData);
        KategorisModel::find($id)->create($validateData);
        return redirect('/dashboard/kategori')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategorisModel::destroy($id);
        return redirect('/dashboard/kategori')->with('success', 'data berhasil dihapus');
    }
}
