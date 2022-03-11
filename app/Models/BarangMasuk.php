<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = "barangmasuks";
    protected $visible = ['kode_barang', 'nama_barang', 'jumlah_masuk', 'tanggal_masuk'];
    protected $fillable = ['kode_barang', 'nama_barang', 'jumlah_masuk', 'tanggal_masuk'];
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany('App\Models\Barang', 'barang_id');
    }
}
