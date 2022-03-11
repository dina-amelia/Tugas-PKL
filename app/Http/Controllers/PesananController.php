<?php

namespace App\Http\Controllers;

use Alert;
use App\Exports\PesananExport;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

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
        // $barang = Barang::find($request->barang_id);
        // $validated = $request->validate([
        //     'pemesan' => 'required',
        //     'alamat' => 'required',
        //     'no_telephone' => 'required',
        //     'jumlah' => 'required|numeric|min:1|max:' . $barang->stock,
        //     'barang_id' => 'required',
        //     'tanggal_pesan' => 'required',
        //     'uang' => 'required',
        //     'tanggal_bayar' => 'required',
        // ]);
        $barang = Barang::find($request->barang_id);
        $rules = [
            'pemesan' => 'required',
            'alamat' => 'required',
            'no_telephone' => 'required',
            'jumlah' => 'required',
            'barang_id' => 'required',
            'tanggal_pesan' => 'required',
            'uang' => 'required',
            'tanggal_bayar' => 'required',
        ];

        $message = [
            'pemesan.required' => 'nama pemesan harus di isi',
            'alamat.required' => 'alamat harus di isi',
            'no_telephone.required' => 'no telephone harus di isi',
            'jumlah.required' => 'jumlah harus di isi',
            'jumlah.numeric' => 'hanya boleh di isi oleh angka',
            'tanggal_pesan.required' => 'tanggal pesan harus di isi',
            'uang.required' => 'uang harus di isi',
            'tanggal_bayar' => 'tanggal bayar harus di isi',

        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Maaf', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $pesanan = new Pesanan;
        $pesanan->pemesan = $request->pemesan;
        $pesanan->alamat = $request->alamat;
        $pesanan->no_telephone = $request->no_telephone;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->barang_id = $request->barang_id;
        $pesanan->tanggal_pesan = $request->tanggal_pesan;
        $barangmasuk = BarangMasuk::findOrFail($request->barang_id = $request->barang_id);
        $barangmasuk->jumlah_masuk = $barangmasuk->jumlah_masuk - $request->jumlah;
        $barangmasuk->save();
        $pesanan->harga = $barang->harga;
        $pesanan->total = $barang->harga * $request->jumlah;
        $pesanan->uang = $request->uang;
        $pesanan->kembalian = $pesanan->uang - $pesanan->total;
        $pesanan->tanggal_bayar = $request->tanggal_bayar;
        $pesanan->save();
        Alert::success('Bagus Sekali', 'Data berhasil disimpan');
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
        Alert::success('Bagus Sekali', 'Data berhasil diupdate');
        return redirect()->route('pesanan.index');
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
        Alert::success('Bagus Sekali', 'Data berhasil dihapus');
        return redirect()->route('pesanan.index');
    }

    public function export_excel()
    {
        return Excel::download(new PesananExport . 'pesanan.xlsx');
    }
}
