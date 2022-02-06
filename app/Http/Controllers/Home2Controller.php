<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $barang = DB::table('barangs')->count();
        $pesanan = DB::table('pesanans')->count();
        $pembayaran = DB::table('pembayarans')->count();
        $laporan = DB::table('laporans')->count();
        return view('home', compact('barang','pesanan','pembayaran','laporan'));
    }

    // public function dashboardUser()
    // {
    //     $pinjam = DB::table('pinjams')->count();
    //     $pengembalian = DB::table('pengembalians')->count();
    //     return view('pengguna.dashboardUser', compact('pinjam','pengembalian'));
    // }

    // public function laporan()
    // {
    //     $pengguna = Pengguna::with('users')->get();
    //     $kegiatan = Kegiatan::all();
    //     $laporan = DB::table('users')->where('role', 'Account User')->get();
    //     return view('layouts.admin.laporan', compact('pengguna','kegiatan','laporan'));
    // }

}
