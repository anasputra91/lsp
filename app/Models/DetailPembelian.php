<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian';
    protected $fillable = [
        'tgl_kadarluarsa',
        'harga_beli',
        'jumlah_beli',
        'sub_total_beli',
        'persen_margin_jual',
        'id_pembelian',
        'id_obat'
        ];

        public function fpembelian(){
            return $this->belongsTo(Pembelian::class, 'id_pembelian', 'id');
            }

        public function fobat(){
            return $this->belongsTo(Obat::class, 'id_obat', 'id');
            }
}
