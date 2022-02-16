<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Pembayaran;
use App\Models\Pesanan;
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

    // public function laporan()
    // {
    //     $laporan = Pembayaran::all();
    //     return view('admin.transaksi.laporan', compact('laporan'));
    // }

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
            'pesanan_id' => 'required',
            'uang' => 'required',
            // 'kembalian' => 'required',
        ]);

        $pembayaran = new Pembayaran;
        $pembayaran->pesanan_id = $request->pesanan_id;
        $pembayaran->uang = $pembayaran->uang;
        $price = Pesanan::findOrFail($request->pesanan_id);
        $pembayaran->kembalian = $pembayaran->uang - $request->total;
        $pembayaran->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('transaksi.index');
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
        return view('admin.transaksi.edit', compact('pembayaran', 'pesanan'));
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
            'nama_barang' => 'required',
            'no_telephone' => 'required',
            'qty' => 'required',
            'pesanan_id' => 'required',
            'tanggal_bayar' => 'required',
            'total' => 'required',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->nama_barang = $request->nama_barang;
        $pembayaran->no_telephone = $request->no_telephone;
        $pembayaran->qty = $request->qty;
        $pembayaran->pesanan_id = $request->pesanan_id;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $price = Barang::findOrFail($request->pesanan_id);
        $pembayaran->harga = $price->harga;
        $pembayaran->total = $price->harga * $request->qty;
        $pembayaran->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Pembayaran::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Good Job', 'Data deleted successfully');
        return redirect()->route('transaksi.index');
    }
}
