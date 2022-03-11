<?php

namespace App\Models;

use Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $visible = ['kode_barang', 'barang_id', 'stock','harga', 'kategori', 'deskripsi', 'gambar'];
    protected $fillable = ['kode_barang', 'barang_id', 'stock','harga', 'kategori', 'deskripsi', 'gambar'];
    public $timestamps = true;

    public function pesanan()
    {
        //data model "dataAuthor" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        return $this->hasMany('App\Models\Pesanan', 'barang_id');
    }

    public function barangmasuk()
    {
        return $this->belongsTo('App\Models\BarangMasuk', 'barang_id');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($barang) {
            //mengecek apakah barang masih mempunyai pesanan
            if ($barang->pesanan->count() > 0) {
                Alert::error('Gagal', 'Data tidak dapat dihapus');
                return false;
            }
        });
    }

    public function image()
    {
        if ($this->gambar && file_exists(public_path('image/barangs/' . $this->gambar))) {
            return asset('image/barangs/' . $this->gambar);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('image/barangs/' . $this->gambar))) {
            return unlink(public_path('image/barangs/' . $this->gambar));
        }
    }
}
