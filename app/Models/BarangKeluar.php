<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "barangkeluars";
    protected $visible = ['kode_barang', 'nama_barang', 'jumlah', 'pesanan_id'];
    protected $fillable = ['kode_barang', 'nama_barang', 'jumlah', 'pesanan_id'];
    public $timestamps = true;

    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan', 'pesanan_id');
    }
}
