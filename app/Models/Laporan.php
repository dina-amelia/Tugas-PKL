<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $visiable = ['nama_barang_keluar','tanggal_keluar','pemasukan','pembayaran_id','status'];
    protected $fillable = ['nama_barang_keluar','tanggal_keluar','pemasukan','pembayaran_id','status'];
    public $timestamps = true;

    public function pembayaran()
    {
        return $this->belongsTo('App\Models\Pembayaran', 'pembayaran_id');


    }
}
