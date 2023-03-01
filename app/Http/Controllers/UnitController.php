<?php

namespace App\Http\Controllers;

use App\Models\UnitModel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Unit | Dashboard';
        $data = UnitModel::all();
        $page = 'Data Unit';
        return view('admin.unit.index', [
            'title'     => $title,
            'unit'      => $data,
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
        $title = 'Unit | Dashboard';
        $data = UnitModel::all();
        $page = 'Tambah Unit';
        return view('admin.unit.create', [
            'title'     => $title,
            'unit'      => $data,
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
            'Nama_unit'          => 'required',
        ]);

        // dd($validateData);
        $unit = UnitModel::create($validateData);
        if ($unit) {
            return redirect('/dashboard/unit')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Tambah data gagal atau data sudah ada');
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
        $title = 'Unit | Dashboard';
        $data = UnitModel::Where('id_unit', $id)->first();
        $page = 'Ubah Unit';
        return view('admin.unit.edit', [
            'title'     => $title,
            'unit'      => $data,
            'page'      => $page,
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
            'Nama_unit'          => 'required',
        ]);

        // dd($validateData);
        $unit = UnitModel::find($id)->update($validateData);
        if ($unit) {
            return redirect('/dashboard/unit')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/dashboard/unit')->with('error', 'Tambah data gagal atau data sudah ada');
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
        UnitModel::destroy($id);
        return redirect('/dashboard/unit')->with('success', 'Data berhasil dihapus');
    }
}
