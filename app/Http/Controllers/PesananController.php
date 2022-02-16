<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::with('barang')->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.pesanan.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::find($request->barang_id);
        $validated = $request->validate([
            'pemesan' => 'required',
            'alamat' => 'required',
            'no_telephone' => 'required',
            'jumlah' => 'required|numeric|min:1|max:' . $barang->stock,
            'barang_id' => 'required',
            'tanggal_pesan' => 'required',
            'uang' => 'required',
            'tanggal_bayar' => 'required',
        ]);

        $pesanan = new Pesanan;
        $pesanan->pemesan = $request->pemesan;
        $pesanan->alamat = $request->alamat;
        $pesanan->no_telephone = $request->no_telephone;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->barang_id = $request->barang_id;
        $pesanan->tanggal_pesan = $request->tanggal_pesan;
        $barang = Barang::findOrFail($request->barang_id = $request->barang_id);
        $barang->stock -= $request->jumlah;
        $barang->save();
        $price = Barang::findOrFail($request->barang_id);
        $pesanan->harga = $price->harga;
        $pesanan->total = $price->harga * $request->jumlah;
        $pesanan->uang = $request->uang;
        $pesanan->kembalian = $pesanan->uang - $pesanan->total;
        $pesanan->tanggal_bayar = $request->tanggal_bayar;
        $pesanan->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('pesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pesanan = Pesanan::findOrFail($id);
        $barang = Barang::all();
        return view('admin.pesanan.edit', compact('pesanan', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pemesan' => 'required',
            'alamat' => 'required',
            'no_telephone' => 'required',
            'jumlah' => 'required',
            'barang_id' => 'required',
            'tanggal_pesan' => 'required',
            'tanggal_bayar' => 'required',

        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->pemesan = $request->pemesan;
        $pesanan->alamat = $request->alamat;
        $pesanan->no_telephone = $request->no_telephone;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->barang_id = $request->barang_id;
        $pesanan->tanggal_pesan = $request->tanggal_pesan;
        $price = Barang::findOrFail($request->barang_id);
        $pesanan->harga = $price->harga;
        $pesanan->total = $price->harga * $request->jumlah;
        $pesanan->tanggal_bayar = $request->tanggal_bayar;
        dd($pesanan);
        $pesanan->save();
        return redirect()->route('pesanan.index')->with('status', 'Pesanan Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Pesanan::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Good Job', 'Data deleted successfully');
        return redirect()->route('pesanan.index');
    }
}
