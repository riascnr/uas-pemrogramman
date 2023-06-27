<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'tb_barang';
    protected $fillable = [
        'Kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual'
    ];
}
