<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Obat extends Model
{
    use HasFactory;
    
    protected $table = 'obat';
    protected $fillable = [
    'kode_obat',
    'nama_obat',
    'merk',
    'jenis',
    'satuan',
    'golongan',
    'kemasan',
    'harga_jual',
    'stok'
    ];
}
