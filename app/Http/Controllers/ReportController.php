<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function pesanan()
    {
        return view('admin.report.form');
    }

    public function reportPesanan(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        if ($start > $end) {
            Alert::error('Oops', 'Maaf tanggal yang anda masukan tidak sesuai')->autoclose(4000);
            return back();

        } else {
            $pesanan = Pesanan::whereBetween('created_at', [$start, $end])->get();
            $barang = Barang::whereBetween('created_at', [$start, $end])->get();
            $total = 0;

            foreach ($pesanan as $value) {
                $total += $value->total;
            }

            // $total = Pesanan::select('user_id', DB::raw('sum(user_id) as total_pengguna'))->groupBy('user_id')->first();
            // dd($total);
            // dd($pesanan);
            // $pdf = \PDF::loadView('admin.report.pesanan_report', ['pesanan' => $pesanan]);
            // return $pdf->download('pesanan-report.pdf');
            return view('admin.report.cetak_laporan', ['pesanan' => $pesanan, 'barang' => $barang, 'total' => $total]);
        }

    }

    // public function export_excel()
    // {
    //     return Excel::download(new PesananExport . 'pesanan.xlsx');
    // }
}
