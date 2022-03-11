<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('barangmasuk')->get();
        return view('admin.pengelola.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangmasuk = BarangMasuk::all();
        return view('admin.pengelola.create', compact('barangmasuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama_barang'=>'required',
        //     'stock'=>'required',
        //     'tanggal_masuk'=>'required',
        //     'harga'=>'required',
        //     'kategori'=>'required',
        //     'deskripsi'=>'required',
        //     'gambar'=>'required|image|max:2048',
        // ]);

        $rules = [
            'barang_id' => 'required',
            'stock' => 'required|numeric|max:2048',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'deskripsi' => 'required|max:255',
            'gambar' => 'required|image|max:2048',
        ];

        $message = [
            'barang_id.required' => 'nama barang harus di isi',
            'stock.numeric' => 'hanya boleh di isi oleh angka',
            'stock.required' => 'stock harus di isi',
            'harga.required' => 'harga harus di isi',
            'harga.numeric' => 'hanya boleh di isi oleh angka',
            'kategori.required' => 'kategori harus di isi',
            'deskripsi.required' => 'deskripsi harus di isi',
            'deskripsi.max' => 'deskripsi maksimal 255 karakter',
            'gambar.required' => 'gambar harus di isi',
            'gambar.image' => 'file harus bersifat foto',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barang = new Barang;
        $barang->kode_barang = mt_rand(1000, 9999);
        $barang->barang_id = $request->barang_id;
        $barang->stock = $request->stock;
        $barang->harga = $request->harga;
        $barang->kategori = $request->kategori;
        $barang->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . "" . $request->gambar->getClientOriginalName();
            $image->move('image/barangs/', $name);
            $barang->gambar = $name;
        }
        $barang->save();
        Alert::success('Bagus Sekali', 'Data berhasil disimpan');
        return redirect()->route('pengelola.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.pengelola.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $barangmasuk = BarangMasuk::all();
        return view('admin.pengelola.edit', compact('barang', 'barangmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'barang_id' => 'required',
            'stock' => 'required|numeric|max:2048',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'deskripsi' => 'required|max:255',
            'gambar' => 'required|image|max:2048',
        ];

        $message = [
            'barang_id.required' => 'nama barang harus di isi',
            'stock.numeric' => 'hanya boleh di isi oleh angka',
            'stock.required' => 'stock harus di isi',
            'harga.required' => 'harga harus di isi',
            'harga.numeric' => 'hanya boleh di isi oleh angka',
            'kategori.required' => 'kategori harus di isi',
            'deskripsi.required' => 'deskripsi harus di isi',
            'deskripsi.max' => 'deskripsi maksimal 255 karakter',
            'gambar.required' => 'gambar harus di isi',
            'gambar.image' => 'file harus bersifat foto',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $barang = new Barang;
        $barang->kode_barang = mt_rand(1000, 9999);
        $barang->barang_id = $request->barang_id;
        $barang->stock = $request->stock;
        $barang->harga = $request->harga;
        $barang->kategori = $request->kategori;
        $barang->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . "" . $request->gambar->getClientOriginalName();
            $image->move('image/barangs/', $name);
            $barang->gambar = $name;
        }
        $barang->save();
        Alert::success('Bagus Sekali', 'Data berhasil diupdate');
        return redirect()->route('pengelola.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Barang::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Bagus Sekali', 'Data berhasil dihapus');
        return redirect()->route('pengelola.index');
    }
}
