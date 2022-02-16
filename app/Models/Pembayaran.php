<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $visible = ['pesanan_id', 'uang', 'kembalian'];
    protected $fillable = ['pesanan_id', 'uang', 'kembalian'];
    public $timestamps = true;

    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan', 'pesanan_id');
    }

    public function laporan()
    {
        $this->hasMany('App\Models\Laporan', 'pembayaran_id');
    }
}
