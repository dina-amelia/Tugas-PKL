<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
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
        $barang = Barang::all();
        return view('admin.pengelola.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengelola.create');
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
            'kode_barang' => 'required',
            'nama_barang' => 'required|max:255|unique:barangs',
            'stock' => 'required|numeric|max:2048',
            'tanggal_masuk' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'deskripsi' => 'required|max:255',
            'gambar' => 'required|image|max:2048',
        ];

        $message = [
            'kode_barang.required' => 'kode barang harus diisi',
            'nama_barang.required' => 'nama barang harus di isi',
            'nama_barang.unique' => 'nama barang sudah digunakan',
            'nama_barang.max' => 'nama barang maksimal 255 karakter',
            'stock.numeric' => 'hanya boleh di isi oleh angka',
            'stock.required' => 'stock harus di isi',
            'tanggal_masuk.required' => 'tanggal masuk harus di isi',
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
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->stock = $request->stock;
        $barang->tanggal_masuk = $request->tanggal_masuk;
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
        Alert::success('Good Job', 'Data successfully');
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
        return view('admin.pengelola.edit', compact('barang'));
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
            'kode_barang' => 'required',
            'nama_barang' => 'required|max:255|unique:barangs',
            'stock' => 'required|numeric|max:2048',
            'tanggal_masuk' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'deskripsi' => 'required|max:255',
            'gambar' => 'required|image|max:2048',
        ];

        $message = [
            'kode_barang.required' => 'kode barang harus diisi',
            'nama_barang.required' => 'nama barang harus di isi',
            'nama_barang.unique' => 'nama barang sudah digunakan',
            'nama_barang.max' => 'nama barang maksimal 255 karakter',
            'stock.numeric' => 'hanya boleh di isi oleh angka',
            'stock.required' => 'stock harus di isi',
            'tanggal_masuk.required' => 'tanggal masuk harus di isi',
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

        $barang = Barang::findOrFail($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->tanggal_masuk = $request->tanggal_masuk;
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
        return redirect()->route('pengelola.index')->with('status', 'Produk Berhasil diupdate');
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
        Alert::success('Good Job', 'Data deleted successfully');
        return redirect()->route('pengelola.index');
    }
}
