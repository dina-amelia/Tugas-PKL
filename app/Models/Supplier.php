<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $visible = ['nama_supplier', 'no_telephone', 'alamat'];
    protected $fillable = ['nama_supplier', 'no_telephone', 'alamat'];
    public $timestamps = true;
}
