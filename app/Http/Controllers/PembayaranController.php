<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->get();
        return view('admin.transaksi.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Pesanan::all();
        return view('admin.transaksi.create', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'=>'required',
            'no_telephone'=>'required',
            'qty'=>'required',
            'pesanan_id'=>'required',
            'tanggal_bayar'=>'required',
            'total'=>'required',
        ]);

        $pembayaran = new Pembayaran;
        $pembayaran->nama_barang = $request->nama_barang;
        $pembayaran->no_telephone = $request->no_telephone;
        $pembayaran->qty = $request->qty;
        $pembayaran->pesanan_id = $request->pesanan_id;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->save();
        return redirect()->route('transaksi.index')->with('status', 'Transaksi Pembayaran Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.transaksi.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pesanan = Pesanan::all();
        return view('admin.transaksi.edit', compact('pembayaran','pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang'=>'required',
            'no_telephone'=>'required',
            'qty'=>'required',
            'pesanan_id'=>'required',
            'tanggal_bayar'=>'required',
            'total'=>'required',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->nama_barang = $request->nama_barang;
        $pembayaran->no_telephone = $request->no_telephone;
        $pembayaran->qty = $request->qty;
        $pembayaran->pesanan_id = $request->pesanan_id;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->save();
        return redirect()->route('transaksi.index')->with('status', 'Transaksi Pembayaran Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('transaksi.index')->with('status', 'Transaksi Pembayaran Berhasil dihapus');
    }
}
