<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\BarangKeluar;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Validator;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = BarangKeluar::with('pesanan')->get();
        return view('admin.barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Pesanan::all();
        return view('admin.barangkeluar.create', compact('pesanan'));
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
            // 'jumlah' => 'required',
        ];

        $message = [
            'nama_barang.required' => 'nama_barang harus di isi',
            // 'jumlah.required' => 'jumlah harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barangkeluar = new BarangKeluar;
        $barangkeluar->kode_barang = mt_rand(1000, 9999);
        $barangkeluar->nama_barang = $request->nama_barang;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->pesanan_id = $request->pesanan_id;
        $barangkeluar->save();
        Alert::success('Bagus Sekali', 'Data berhasil disimpan');
        return redirect()->route('barangkeluar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        return view('admin.barangkeluar.show', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        return view('admin.barangkeluar.edit', compact('barangkeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ];

        $message = [
            'kode_barang.required' => 'kode_barang harus di isi',
            'nama_barang.required' => 'nama_barang harus di isi',
            'jumlah.required' => 'jumlah harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barangkeluar = new BarangKeluar;
        $barangkeluar->kode_barang = $request->kode_barang;
        $barangkeluar->nama_barang = $request->nama_barang;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->save();
        Alert::success('Bagus Sekali', 'Data berhasil diupdate');
        return redirect()->route('barangkeluar.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!BarangKeluar::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Bagus Sekali', 'Data berhasil dihapus');
        return redirect()->route('barangkeluar.index');
    }
}
