<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Validator;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = BarangMasuk::all();
        return view('admin.barangmasuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barangmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_barang' => 'required',
            'jumlah_masuk' => 'required',
            'tanggal_masuk' => 'required',
        ];

        $message = [
            'nama_barang.required' => 'nama barang harus di isi',
            'jumlah_masuk.required' => 'jumlah masuk harus di isi',
            'tanggal_masuk.required' => 'tanggal masuk harus di isi'
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barangmasuk = new BarangMasuk;
        $barangmasuk->kode_barang = mt_rand(1000, 9999);
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangmasuk->save();
        Alert::success('Bagus Sekali', 'Data berhasil disimpan');
        return redirect()->route('barangmasuk.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        return view('admin.barangmasuk.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        return view('admin.barangmasuk.edit', compact('barangmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_barang' => 'required',
            'jumlah_masuk' => 'required',
            'tanggal_masuk' => 'required',
        ];

        $message = [
            'nama_barang.required' => 'nama barang harus di isi',
            'jumlah_masuk.required' => 'jumlah masuk harus di isi',
            'tanggal_masuk.required' => 'tanggal masuk harus di isi'
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barangmasuk = new BarangMasuk;
        $barangmasuk->kode_barang = mt_rand(1000, 9999);
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangmasuk->save();
        Alert::success('Bagus Sekali', 'Data berhasil diupdate');
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!BarangMasuk::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Bagus Sekali', 'Data berhasil dihapus');
        return redirect()->route('barangmasuk.index');
    }
}
