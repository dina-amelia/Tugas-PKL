<?php

namespace App\Models;

use Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $visible = ['pemesan', 'alamat', 'no_telephone', 'jumlah', 'barang_id', 'tanggal_pesan', 'harga', 'total', 'uang', 'kembalian', 'tanggal_bayar'];
    protected $fillable = ['pemesan', 'alamat', 'no_telephone', 'jumlah', 'barang_id', 'tanggal_pesan', 'harga', 'total', 'uang', 'kembalian', 'tanggal_bayar'];
    public $timestamps = true;

    public function barang()
    {
        //data dari model "Pesanan" bisa dimiliki oleh model "Barang"
        //melalui fk "barang_id"
        return $this->belongsTo('App\Models\Barang', 'barang_id');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Models\Pembayaran', 'pesanan_id');

    }

    public function barangkeluar()
    {
        return $this->hasMany('App\Models\BarangKeluar', 'pesanan_id');

    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($pesanan) {
            //mengecek apakah barang masih mempunyai pesanan
            if ($pesanan->pembayaran->count() > 0) {
                Alert::error('Failed', 'Data not deleted because barang have pesanan');
                return false;
            }
        });
    }

}
